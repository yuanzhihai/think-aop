<?php

namespace Ting\Aop\Concerns;

use Ting\Aop\Aop;
use Ting\Aop\Points\ProceedingJoinPoint;
use Closure;

trait MethodTrait
{
    use AopTrait;

    /**
     * Proxy call
     *
     * @param string $className
     * @param string $method
     * @param Closure $target
     * @param mixed ...$args
     * @return mixed
     * @throws \Ting\Aop\Exceptions\AopException
     * @throws \ReflectionException
     */
    public static function __proxyCall(string $className, string $method, Closure $target, &...$args): mixed
    {
        $pipeline  = self::__pipeline(Aop::getAspectMapping($className, $method));
        $joinPoint = new ProceedingJoinPoint($className, $method, $target, ...$args);

        return $pipeline($joinPoint);
    }
}