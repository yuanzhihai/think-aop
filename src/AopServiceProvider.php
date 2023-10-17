<?php

namespace Ting\Aop;

use think\Service;

class AopServiceProvider extends Service
{
    public function register()
    {
        // 服务注册
        ClassLoader::reload(app()->config->get('aop'));
        ClassLoader::init();
    }

    public function boot()
    {
        // 服务启动
    }
}