<?php

namespace Simplified\TwigBridge;
use Simplified\Core\ViewRendererInterface;

class TwigRenderer implements ViewRendererInterface {
	public function render($template, $data = array()) {
		print __CLASS__ . "::" . __METHOD__;
	}
}