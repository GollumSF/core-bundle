#GollumSFCoreBundle

[![Build Status](https://travis-ci.org/GollumSF/core-bundle.svg?branch=master)](https://travis-ci.org/GollumSF/core-bundle)
[![License](https://poser.pugx.org/gollumsf/core-bundle/license)](https://packagist.org/packages/gollumsf/core-bundle)
[![Latest Stable Version](https://poser.pugx.org/gollumsf/core-bundle/v/stable)](https://packagist.org/packages/gollumsf/core-bundle)
[![Latest Unstable Version](https://poser.pugx.org/gollumsf/core-bundle/v/unstable)](https://packagist.org/packages/gollumsf/core-bundle)


##Event on create route


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


##Change routing annotation tag


```yml
parameters:
    gsf_core.routing_annotation_tag: 'gsf_annotation'
```
