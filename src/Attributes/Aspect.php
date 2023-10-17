<?php

namespace Ting\Aop\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::IS_REPEATABLE)]
final class Aspect
{
    private array $pointcuts;
    private int $priority;

    /**
     * Aop constructor.
     * @param string|array $pointcuts
     * @param int $priority
     * @example [
     *      app\\Http\\UserController::class,
     *      'app\\Http\\PostController::index',
     *      'app\\Http\\CommentController::get*',
     * ]
     */
    public function __construct(string|array $pointcuts, int $priority = 0)
    {
        $this->pointcuts = (array)$pointcuts;
        $this->priority  = $priority;
    }

    /**
     * @return array
     */
    public function getPointcuts(): array
    {
        return $this->pointcuts;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }
}