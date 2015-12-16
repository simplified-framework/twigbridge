<?php


namespace Simplified\TwigBridge;
use Simplified\Core\ViewRendererInterface;

class TwigRenderer implements ViewRendererInterface {
	private $twig;
	public function __construct() {
		
		// TODO load config: set views and cache path from config
		// set file extension from config
		
		$loader = new \Twig_Loader_Filesystem(RESOURCES_PATH . 'views');
		$this->twig = new \Twig_Environment($loader, array(
				'cache' => APP_PATH . 'cache',
				"auto_reload" =>  true,
		));
	}
	
	public function render($template, $data = array()) {
		$value = $this->twig->render($template, $data);
		return $value;
	}
	
}