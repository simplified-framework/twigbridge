<?php


namespace Simplified\TwigBridge;
use Simplified\Config\Config;
use Simplified\Core\ViewRendererInterface;

class TwigRenderer implements ViewRendererInterface {
	private $twig;
	public function __construct() {

		$userConf = Config::getAll('twig');
		$defaultConf = [
			'template_path' => RESOURCES_PATH . 'views',
			'cache_path' => STORAGE_PATH . 'cache',
			'use_cache' => true
		];

		$config = array_merge($defaultConf, $userConf);

		$loader = new \Twig_Loader_Filesystem($config['template_path']);
		$this->twig = new \Twig_Environment($loader, array(
				'cache' => $config['use_cache'] ? STORAGE_PATH . 'cache' : false,
				"auto_reload" =>  true,
		));
	}
	
	public function render($template, $data = array()) {
		$value = $this->twig->render($template, $data);
		return $value;
	}
	
}