<?php

require_once _PS_MODULE_DIR_ . "/modframework/framework.php";

class Question extends Object
{
	public $min = 1;
	public $max = 1;

	protected static $object_definition = false;
	protected static $description = array(
		'table'  => 'samplemod_question',
		'fields' => array(
			'introduction' => 'text lang ?',
			'text'		   => 'text lang  ',
			'explanation'  => 'text lang ?',
			'type'		   => 'string (64)',
			'min'		   => 'int',
			'max'		   => 'int'
		),
		'autodate' => true
	);

	public function optionsForTypeSelect()
	{
		return array( 0 => $this->l('Select'),
					  1 => $this->l('Scale'), 
					  2 => $this->l('Free Form')
			);
	}

	public function getListFields($options = array())
	{
		return array('id_samplemod_question', 'type', 'introduction', 'text', 'explanation');
	}

	public function typeOverride($field)
	{
		if($field == 'type')
		{
			return array(
				'type' => 'select',
				'options_with_values' => $this->optionsForTypeSelect(),
				'listen' => true,
				'legend' => $this->l('Type of question.')
			);
		} 
	}

	public function formTypeOverride($field)
	{
		if($field == 'min')
		{
			if($this->type == 0)
			{
				return array('title' => $this->l('Minimum number of answers'));
			}
			else if($this->type == 1)
			{
				return array('title' => $this->l('From'));
			}
		}
		else if($field == 'max')
		{
			if($this->type == 0)
			{
				return array('title' => $this->l('Maximum number of answers'));
			}
			else if($this->type == 1)
			{
				return array('title' => $this->l('To'));
			}
		}
		else if($field == 'introduction')
		{
			return array('legend' => $this->l('This will be displayed before the question.'));
		}
		else if($field == 'text')
		{
			return array('legend' => $this->l('This is the actual text of your question.'));
		}
		else if($field == 'explanation')
		{
			return array('legend' => $this->l('Enter any hint, advice, or explanation about your question here.'));
		}
	}

	public function getFormFields($options = array())
	{
		if($this->type == $this->l('Free Form'))
		{
			return array('introduction', 'text', 'explanation', 'type');
		}
		else return parent::getFormFields($options);
	}

}