<?php

namespace Simplified\TwigBridge;
use Simplified\Core\Provider;

class TwigProvider implements  Provider {
    public function provides() {
        return __NAMESPACE__ . '\\TwigRenderer';
    }

    public function boot() {
    }
}