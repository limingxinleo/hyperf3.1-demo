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

namespace HyperfTest\Cases;

use App\Service\BarService;
use App\Service\FooService;
use Hyperf\Contract\StdoutLoggerInterface;
use HyperfTest\HttpTestCase;
use Psr\Container\ContainerInterface;

/**
 * @internal
 * @coversNothing
 */
class ProxyTest extends HttpTestCase
{
    public function testProxy()
    {
        $service = make(FooService::class);
        $this->assertInstanceOf(ContainerInterface::class, $service->container);
        $this->assertInstanceOf(BarService::class, $service->service);
        $this->assertInstanceOf(ContainerInterface::class, $service->service->container);
        $this->assertInstanceOf(StdoutLoggerInterface::class, $service->service->logger);
    }
}
