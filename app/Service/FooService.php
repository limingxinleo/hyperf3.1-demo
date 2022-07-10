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

use Han\Utils\Service;
use Hyperf\AsyncQueue\Annotation\AsyncQueueMessage;
use Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;

class FooService extends Service
{
    #[Inject()]
    protected ConfigInterface $config;

    #[AsyncQueueMessage(delay: 1)]
    public function dumpAsync()
    {
        var_dump($this->config->get('nacos_config'));
    }

    public function dump()
    {
        var_dump($this->config->get('nacos_config'));
    }
}
