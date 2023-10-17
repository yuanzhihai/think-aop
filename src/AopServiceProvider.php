<?php

namespace Ting\Aop;

use think\Service;

class AopServiceProvider extends Service
{
    public function register()
    {
        // Aop autoload function register
        AopClassLoader::init();
    }

    public function boot()
    {
    }
}