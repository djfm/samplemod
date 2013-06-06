<?php

require_once _PS_MODULE_DIR_ . "modframework/framework.php";

/**
* Rename this class, and:
* - rename this file to this classe's name (all lowercase)
* - rename the folder this file is in to the same name as this file (without the .php of course!)
*/
class SampleMod extends ModuleBase
{
	public function __construct()
	{
		/**
		* Change the name here to be the name of the folder
		*/
		$this->name 		= "samplemod";
		/**
		* Put anything you want here
		*/
		$this->displayName 	= $this->l("This is a sample module");
		
		/**
		* Activating devmode gives you some extra goodies while developing, set to false when deploying!
		*/
		$this->devmode 		= true;

		parent::__construct();
	}

	/**
	* Renders the view named 'default.tpl' in the views folder
	*/
	public function getDefaultAction()
	{
		return array("name" => "John Doe");
	}

	/**
	* Renders the view named 'currentDate.tpl' in the views folder
	*/
	public function getCurrentDateAction()
	{
		return array("date" => date("Y-m-d H:i:s"));
	}

}