<?php

namespace Simplified\TwigBridge;
use Simplified\Core\ViewRendererInterface;

class TwigRenderer implements ViewRendererInterface {
	public function render($template, $data = array()) {
		$loader = new Twig_Loader_Filesystem('/path/to/templates');
		$twig = new Twig_Environment($loader, array(
				'cache' => '/path/to/compilation_cache',
		));
	}
}