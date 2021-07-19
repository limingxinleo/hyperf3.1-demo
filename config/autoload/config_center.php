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
return [
    'enable' => true,
    'driver' => 'etcd',
    'mode' => Hyperf\ConfigCenter\Mode::PROCESS,
    'drivers' => [
        'etcd' => [
            'driver' => Hyperf\ConfigEtcd\EtcdDriver::class,
            'packer' => Hyperf\Utils\Packer\JsonPacker::class,
            'namespaces' => [
                '/application',
            ],
            'mapping' => [
                // etcd key => config key
                '/application/test' => 'test',
            ],
            'interval' => 5,
        ],
    ],
];
