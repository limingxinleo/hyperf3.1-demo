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
use Hyperf\Snowflake\IdGenerator\SnowflakeIdGenerator;
use Hyperf\Utils\Network;
use Hyperf\Utils\Parallel;
use Psr\Container\ContainerInterface;

#[Command]
class FooCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('test:foo');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Demo Command');
    }

    public function handle()
    {
        $parallel = new Parallel();
        $idGenerator = di()->get(SnowflakeIdGenerator::class);
        $ip = Network::Ip();
        $port = 9501;
        $ip = explode('.', $ip);
        foreach ($ip as &$v) {
            if (strlen($v) !== 3) {
                $v = str_pad($v, 3, '0', STR_PAD_LEFT);
            }
        }
        unset($v);
        ##ip后两位加port
        $workId = ($ip[2] . $ip[3] . $port) % 32;
        $datacenter = ($ip[0] . $ip[1]) % 32;
        for ($i = 0; $i < 10; ++$i) {
            $parallel->add(function () use ($idGenerator, $workId, $datacenter) {
                $meta = $idGenerator->getMetaGenerator()->generate();
                echo 'out_sequence:' . $meta->getSequence() . PHP_EOL;
                $meta->setWorkerId($workId);
                $meta->setDataCenterId($datacenter);
                return $idGenerator->generate($meta);
            });
        }
        $arr = $parallel->wait();
    }
}
