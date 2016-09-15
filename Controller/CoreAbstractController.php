<?php
namespace GollumSF\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * Abstract class for Controller
 * 
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
abstract class CoreAbstractController extends Controller{
	
	/**
	 * @return Request
	 */
	protected function getRequest() {
		return $this->container->get('request_stack')->getCurrentRequest();
	}
	
	public function formDescribe(Form $form) {
		return $form->createView();
	}
	
	public function formErrors(Form $form) {
		// TODO Stub
		return [];
	}
	
}