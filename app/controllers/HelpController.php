<?php
/**
 * PageBlock
 */
/**
 * Namespace for the controllers
 */
namespace net\mediaslave\help\app\controllers;

use net\mediaslave\help\lib\NoHelpFoundException;
/**
 * Use the models.
 */
/**
 * ClassBlock
 */
class HelpController extends \Controller{
	static public $extension = 'markdown';
	static private $paths = array();
		
	/**
	 * Get the help markdown and display it
	 *
	 * @return void
	 * @author Justin Palmer
	 **/
	public function get()
	{
		$boolean = false;
		foreach(self::$paths as $path){
			if(is_file($path . '/' . $this->params('route') . '.' . self::$extension)){
				$boolean = true;
				break;
			}
		}
		
		if($boolean == false){
			throw new NoHelpFoundException;
		}
		
		ob_start();
			include $this->params('route') . '.' . self::$extension;
			$this->file_contents = ob_get_contents();
		ob_clean();
	}
	/**
	 * Set the paths to where the help files live
	 *
	 * @return void
	 * @author Justin Palmer
	 **/
	static public function setPaths(array $array)
	{
		self::$paths = $array;
	}

}