<?php


namespace Simplified\TwigBridge;
use Simplified\Config\Config;
use Simplified\View\ViewRendererInterface;

class TwigRenderer implements ViewRendererInterface {
	private $twig;
	private static $extensions = array();

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
		$this->twig->addExtension(new \Twig_Extensions_Extension_Intl());

		foreach (self::$extensions as $ext) {
			$this->twig->addExtension($ext);
		}
	}
	
	public function render($template, $data = array()) {
		$template = strstr($template, ".twig") !== false ||
			strstr($template, ".html") !== false ||
			strstr($template, ".tpl") !== false ?
				$template : $template . ".twig";

		$value = $this->twig->render($template, $data);
		return $value;
	}

	public static function registerExtension($ext) {
		self::$extensions[] = $ext;
	}
}