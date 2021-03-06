<?php

namespace GollumSF\CoreBundle\Routing;

use Symfony\Component\Config\FileLocatorInterface;
use Symfony\Component\Routing\Loader\AnnotationClassLoader;
use Symfony\Component\Routing\Loader\AnnotationDirectoryLoader;

/**
 * AnnotationGSFLoaderDir
 *
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
class AnnotationGSFLoaderDir extends AnnotationDirectoryLoader {
	
	private $annotationTag;
	
	public function __construct(FileLocatorInterface $locator, AnnotationClassLoader $loader, $annotationTag) {
		parent::__construct($locator, $loader);
		$this->annotationTag = $annotationTag;
	}
	
	public function supports($resource, $type = null) {
		return $type == $this->annotationTag && parent::supports($resource, 'annotation');
	}
}