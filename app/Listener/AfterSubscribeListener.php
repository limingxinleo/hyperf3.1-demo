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

use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Nats\Event\AfterSubscribe;
use Psr\Container\ContainerInterface;

#[Listener]
class AfterSubscribeListener implements ListenerInterface
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
            AfterSubscribe::class,
        ];
    }

    /**
     * @param AfterSubscribe $event
     */
    public function process(object $event)
    {
        var_dump($event->getConsumer()->getName());
    }
}
