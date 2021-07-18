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

use App\RPC\Foo2ServiceInterface;
use App\RPC\FooServiceInterface;
use HyperfTest\HttpTestCase;

/**
 * @internal
 * @coversNothing
 */
class ExampleTest extends HttpTestCase
{
    public function testExample()
    {
        $res = di()->get(FooServiceInterface::class)->foo();
        var_dump($res);
        $this->assertTrue(str_starts_with($res, 'jsonrpc-http'));
        $res = di()->get(Foo2ServiceInterface::class)->foo();
        var_dump($res);
        $this->assertTrue(str_starts_with($res, 'jsonrpc'));
    }
}
