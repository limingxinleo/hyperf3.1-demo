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
use Hyperf\Di\Annotation\Inject;
use Hyperf\WebSocketServer\Context;
use Hyperf\WebSocketServer\Sender;

class WebSocketController implements OnMessageInterface, OnCloseInterface, OnOpenInterface
{
    #[Inject]
    protected Sender $sender;

    public function onClose($server, int $fd, int $reactorId): void
    {
        var_dump('closed');
    }

    public function onMessage($server, $frame): void
    {
        var_dump(Context::get('username'));
        $this->sender->push($frame->fd, 'Received: ' . $frame->data);
    }

    public function onOpen($server, $request): void
    {
        Context::set('username', 'test');
        var_dump('open');
    }
}
