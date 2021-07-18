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
namespace App\RPC;

use Hyperf\RpcServer\Annotation\RpcService;

#[RpcService(name: 'Foo2Service', server: 'jsonrpc', protocol: 'jsonrpc-tcp-length-check', publishTo: 'consul')]
class Foo2Service implements Foo2ServiceInterface
{
    public function foo(): string
    {
        return 'jsonrpc.' . uniqid();
    }
}
