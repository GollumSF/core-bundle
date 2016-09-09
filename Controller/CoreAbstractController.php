<?php
namespace GollumSF\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;

/**
 * Abstract class for Controller
 * 
 * @author Damien Duboeuf <smeagolworms4@gmail.com>
 */
abstract class CoreAbstractController extends Controller{
	
	public function formDescribe(Form $form) {
		return $form->createView();
	}
	
	public function formErrors(Form $form) {
		// TODO Stub
		return [];
	}
	
}