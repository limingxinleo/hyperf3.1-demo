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
namespace App\Amqp\Consumer;

use Hyperf\Amqp\Annotation\Consumer;
use Hyperf\Amqp\Message\ConsumerMessage;
use Hyperf\Amqp\Result;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * @Consumer(exchange="hyperf2", routingKey="hyperf", queue="hyperf.debug", name="DebugRPCConsumer", nums=1)
 */
class DebugConsumer extends ConsumerMessage
{
    protected $qos = [
        'prefetch_size' => 0,
        'prefetch_count' => 2,
        'global' => false,
    ];

    public function consumeMessage($data, AMQPMessage $message): string
    {
        var_dump('sleep 60');
        sleep(60);
        var_dump($data);
        return Result::ACK;
    }
}
