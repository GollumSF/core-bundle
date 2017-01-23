<?php
namespace Swabbl\CoreBundle\Test;
use Swabbl\OrganisationBundle\Context\OrganisationContext;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * AbstractWebTestCase
 *
 * @author Damien Duboeuf <damien@swabbl.com>
 */
abstract class AbstractWebTestCase extends WebTestCase {

    protected $client = null;

	/**
	 * Invoke the private or protected method
	 * @param mixed  $object
	 * @param string $methodName
	 * @param mixed  $parameter...
	 * @return mixed
	 */
	public function invokeMethod(&$object, $methodName) {
		
		$parameters = func_get_args();
		array_shift($parameters);
		array_shift($parameters);
		
		$reflection = new \ReflectionClass(get_class($object));
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);
		
		return $method->invokeArgs($object, $parameters);
	}

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        self::bootKernel();
        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager()
        ;

        $this->client = static::createClient(array(), array(
            'HTTP_USER_AGENT' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36',
        ));
    }

    /**
     * @param $username
     * @param $password
     */
    public function doLogin($username, $password)
    {
        $crawler = $this->client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form(array(
            '_username'  => $username,
            '_password'  => $password,
        ));

        $this->client->submit($form);

        // $this->assertEquals(302, $this->client->getResponse()->getStatusCode());
        $crawler = $this->client->followRedirect();
    }

    /**
     * Do logout
     */
    public function doLogout()
    {
        $this->client->request('GET', '/logout');
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->client->getResponse();
    }

    /**
     * @return mixed
     */
    public function getRequest()
    {
        return $this->client->getRequest();
    }

    /**
     * @return OrganisationContext
     */
    public function getOrganisationContext() {
        static::$kernel->getContainer()->get('swabbl_organisation.context');
    }

}