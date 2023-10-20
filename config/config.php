<?php
return [
    'aspects'     => [],
    'proxy_dirs'  => [
        app_path(),
    ],
    'proxy_all'   => false,
    'except_dirs' => [],
    'cacheable'   => true,
    'storage_dir' => runtime_path('aop'),
];