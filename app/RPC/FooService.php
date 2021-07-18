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

#[RpcService(name: 'FooService', server: 'jsonrpc-http', protocol: 'jsonrpc-http', publishTo: 'consul')]
class FooService implements FooServiceInterface
{
    public function foo(): string
    {
        return 'jsonrpc-http.' . uniqid();
    }
}
