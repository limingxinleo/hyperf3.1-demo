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

namespace App\Command;

use Hyperf\Command\Annotation\Command;
use Hyperf\Command\Command as HyperfCommand;
use Psr\Container\ContainerInterface;
use Docker\Docker;
use Docker\DockerClientFactory;

#[Command]
class TestCommand extends HyperfCommand
{
    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('test');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('测试脚本');
    }

    public function handle()
    {
        $client = DockerClientFactory::create([
            'remote_socket' => 'tcp://127.0.0.1:2375',
            'ssl' => false,
        ]);
        $docker = Docker::create($client);
        $res = $docker->containerList();
        var_dump($res);
    }
}
