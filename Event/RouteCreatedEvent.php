<?php
namespace GollumSF\CoreBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Routing\Route;

/**
 * RouteCreatedEvent
 *
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
class RouteCreatedEvent extends Event {
	
	const NAME = 'gsf_core.route_created';
	
	/**
	 * @var Route
	 */
	private $route;
	
	public function __construct(Route $route) {
		$this->route = $route;
	}
	
	public function getRoute() {
		return $this->route;
	}
	
}