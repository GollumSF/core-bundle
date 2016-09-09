<?php

namespace GollumSF\CoreBundle\Routing;

use Doctrine\Common\Annotations\Reader;
use GollumSF\CoreBundle\Event\RouteCreatedEvent;
use Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * AnnotationGSFLoaderClass
 *
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
class AnnotationGSFLoaderClass extends AnnotatedRouteControllerLoader {
	
	/**
	 * @var EventDispatcherInterface
	 */
	private $dispatcher;
	
	private $annotationTag;
	
	public function __construct(Reader $reader, EventDispatcherInterface $dispatcher, $annotationTag) {
		parent::__construct($reader);
		$this->dispatcher = $dispatcher;
		$this->annotationTag = $annotationTag;
	}
	
	public function load($resource, $type = null) {
		
		$routes = parent::load($resource, $type);
		foreach ($routes as $key => $route) {
			$event = new RouteCreatedEvent($route);
			$this->dispatcher->dispatch(RouteCreatedEvent::NAME, $event);
			
			if ($event->isPropagationStopped()) {
				$routes->remove($key);
			}
		}
		return $routes;
	}
	
	public function supports($resource, $type = null) {
		return $type == $this->annotationTag && parent::supports($resource, 'annotation');
	}
}