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
namespace App\Kafka\Consumer;

use Hyperf\Kafka\AbstractConsumer;
use Hyperf\Kafka\Annotation\Consumer;
use Hyperf\Kafka\Result;
use longlang\phpkafka\Consumer\ConsumeMessage;

/**
 * @Consumer(topic="hyperf", groupId="hyperf", autoCommit=true, nums=1)
 */
class KafkaDebugConsumer extends AbstractConsumer
{
    public function consume(ConsumeMessage $message)
    {
        var_dump($message->getValue());

        return Result::ACK;
    }
}
