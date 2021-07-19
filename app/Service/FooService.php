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
namespace App\Service;

use Hyperf\AsyncQueue\Annotation\AsyncQueueMessage;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;

class FooService
{
    #[Inject()]
    protected ConfigInterface $config;

    public function dump()
    {
        var_dump($this->config->get('test'));
    }

    #[AsyncQueueMessage(delay: 1)]
    public function dumpAsync()
    {
        var_dump(array_merge($this->config->get('test', []), [
            'async' => true,
        ]));
    }
}
