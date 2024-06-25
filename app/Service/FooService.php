<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Service;

use Hyperf\Di\Annotation\Inject;
use Psr\Container\ContainerInterface;

class FooService
{
    #[Inject]
    public ContainerInterface $container;

    public function __construct(public BarService $service)
    {
    }
}
