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
namespace App\Controller;

use Hyperf\Contract\OnCloseInterface;
use Hyperf\Contract\OnMessageInterface;
use Hyperf\Contract\OnOpenInterface;
use Hyperf\WebSocketServer\Context;
use Swoole\Http\Request;
use Swoole\WebSocket\Frame;

class WebSocketController implements OnMessageInterface, OnCloseInterface, OnOpenInterface
{
    public function onClose($server, int $fd, int $reactorId): void
    {
        var_dump('closed');
    }

    public function onMessage($server, Frame $frame): void
    {
        var_dump(Context::get('username'));
    }

    public function onOpen($server, Request $request): void
    {
        Context::set('username', 'test');
        var_dump('open');
    }
}
