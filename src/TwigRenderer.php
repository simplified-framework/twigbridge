<?php


namespace Simplified\TwigBridge;
use Simplified\Core\ViewRendererInterface;

class TwigRenderer implements ViewRendererInterface {
	private $twig;
	public function __construct() {
		$loader = new \Twig_Loader_Filesystem(RESOURCES_PATH . 'views');
		$this->twig = new \Twig_Environment($loader, array(
				'cache' => APP_PATH . 'cache',
		));
	}
	
	public function render($template, $data = array()) {
		$this->twig->render($template, $data);
	}
}