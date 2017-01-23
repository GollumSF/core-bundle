<?php
namespace GollumSF\CoreBundle\Test;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * AbstractWebTestCase
 *
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
abstract class AbstractWebTestCase extends WebTestCase {
	
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
	 * Invoke the private or protected static method
	 * @param string  $className
	 * @param string $methodName
	 * @param mixed  $parameter...
	 * @return mixed
	 */
	public function invokeStaticMethod($className, $methodName) {
		
		$parameters = func_get_args();
		array_shift($parameters);
		array_shift($parameters);
		
		$reflection = new \ReflectionClass($className);
		$method = $reflection->getMethod($methodName);
		$method->setAccessible(true);
		
		return $method->invokeArgs(NULL, $parameters);
	}
	
}