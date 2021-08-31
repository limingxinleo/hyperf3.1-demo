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
namespace App\Nats\Consumer;

use Hyperf\Nats\AbstractConsumer;
use Hyperf\Nats\Annotation\Consumer;
use Hyperf\Nats\Message;

#[Consumer(subject: 'hyperf5', queue: 'hyperf5', name: 'Debug5Consumer', nums: 1)]
class Debug5Consumer extends AbstractConsumer
{
    public function consume(Message $payload)
    {
        var_dump($payload->getBody());
    }
}
