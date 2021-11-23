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
namespace App\Listener;

use EasySwoole\Task\MessageQueue;
use EasySwoole\Task\Task;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\BeforeMainServerStart;
use Psr\Container\ContainerInterface;

/**
 * @Listener
 */
#[Listener]
class BindESTaskListener implements ListenerInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function listen(): array
    {
        return [
            BeforeMainServerStart::class,
        ];
    }

    /**
     * @param BeforeMainServerStart $event
     */
    public function process(object $event)
    {
        $server = $event->server;

        $task = new Task();
        $queue = new MessageQueue();
        $task->getConfig()->setTaskQueue($queue);
        $task->attachToServer($server);

        if ($this->container instanceof \Hyperf\Contract\ContainerInterface) {
            $this->container->set(Task::class, $task);
        }
    }
}
