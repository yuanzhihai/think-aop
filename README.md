# think-aop
 Perfect compatibility thinkphp6+

# 安装
```
composer require yuanzhihai/think-aop
```

AOP 相关配置
config/aop.php 配置
```
<?php
return [
    'scans'        => [
        base_path('aspect') => 'app\aspect',
    ],
    'storage_path' => runtime_path('aop') . 'aopProxyClasses',
    'aspect' => [
        \app\aspect\UserAspect::class,
    ],
];
```
首先让我们编写待切入类
```
<?php
namespace app\service;

class UserService
{
    public function info()
    {
        echo 'UserService info' . PHP_EOL;
    }
}
```
其次新增对应的 UserAspect

```

namespace app\aspect;

use app\service\UserService;
use Ting\Aop\AbstractAspect;
use Ting\Aop\interfaces\ProceedingJoinPointInterface;

/**
 * Class UserAspect
 * @package app\aspect
 */
class UserAspect extends AbstractAspect
{
    public $classes = [
        UserService::class . '::info',
    ];

    /**
     * @param ProceedingJoinPointInterface $entryClass
     * @return mixed
     */
    public function process(ProceedingJoinPointInterface $entryClass)
    {
        echo 'UserAspect before <br>';
        $res = $entryClass->process();
        echo '<br> UserAspect after';
        return $res;
    }
}
```

测试,在app\controller\Index 修改代码 eg：

```

    public function index()
    {
        /** @var UserService $userService */
        $userService = app()->get(UserService::class);
        $userService->info();
    }

```
# 输出结果
```
UserAspect before 
UserService info
UserAspect after 
```
#切入顺序
如果有多个切面类对同一个类方法进行切入， 会按照配置文件中顺序执行
