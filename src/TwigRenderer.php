<?php

namespace Simplified\TwigBridge;

class TwigRenderer implements ViewRendererInterface {
	public function render($template, $data = array()) {
		print __CLASS__ . "::" . __METHOD__;
	}
}