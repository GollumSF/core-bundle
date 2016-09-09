
Event on create route
=

```php
<?php
namespace MyBundle\EventListener;

use GollumSF\CoreBundle\Event\RouteCreatedEvent;

class RouteListener {
	
	public function onGSFCoreRouteCreated(RouteCreatedEvent $event) {
		$route = $event->getRoute();
		/* Instructions */
	}

}
```

```yml
services:
    my_bundle.listener.route:
        class: MyBundle\EventListener
        tags:
            - { name: kernel.event_listener, event: gsf_rest.route_created }
```


Change routing annotation tag
=

```yml
parameters:
    gsf_core.routing_annotation_tag: 'gsf_annotation'
```
