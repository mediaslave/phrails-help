<?php
namespace net\mediaslave\help\lib;
/**
* If the rule does not override the $message var the we will throw an exception.
* @package exceptions
*/
class NoHelpFoundException extends \Exception
{
	
	function __construct()
	{
		parent::__construct('No help file found.');
	}
}