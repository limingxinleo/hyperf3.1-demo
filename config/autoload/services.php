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
    'consumers' => [
        [
            'name' => 'FooService',
            'service' => App\RPC\FooServiceInterface::class,
            'id' => App\RPC\FooServiceInterface::class,
            'protocol' => 'jsonrpc-http',
            'load_balancer' => 'random',
            'registry' => [
                'protocol' => 'consul',
                'address' => 'http://' . env('UBUNTU_HOST') . ':8500',
            ],
            'nodes' => [
                // ['host' => '127.0.0.1', 'port' => 9504],
            ],
            'options' => [
                'connect_timeout' => 5.0,
                'recv_timeout' => 5.0,
                // 重试次数，默认值为 2，收包超时不进行重试。暂只支持 JsonRpcPoolTransporter
                'retry_count' => 2,
                // 重试间隔，毫秒
                'retry_interval' => 100,
                // 当使用 JsonRpcPoolTransporter 时会用到以下配置
                'pool' => [
                    'min_connections' => 1,
                    'max_connections' => 32,
                    'connect_timeout' => 10.0,
                    'wait_timeout' => 3.0,
                    'heartbeat' => -1,
                    'max_idle_time' => 60.0,
                ],
            ],
        ],
        [
            'name' => 'Foo2Service',
            'service' => App\RPC\Foo2ServiceInterface::class,
            'id' => App\RPC\Foo2ServiceInterface::class,
            'protocol' => 'jsonrpc-tcp-length-check',
            'load_balancer' => 'random',
            'registry' => [
                'protocol' => 'consul',
                'address' => 'http://' . env('UBUNTU_HOST') . ':8500',
            ],
            'nodes' => [
                // ['host' => '127.0.0.1', 'port' => 9503],
            ],
            'options' => [
                'connect_timeout' => 5.0,
                'recv_timeout' => 5.0,
                'settings' => [
                    'open_length_check' => true,
                    'package_length_type' => 'N',
                    'package_length_offset' => 0,
                    'package_body_offset' => 4,
                ],
                // 重试次数，默认值为 2，收包超时不进行重试。暂只支持 JsonRpcPoolTransporter
                'retry_count' => 2,
                // 重试间隔，毫秒
                'retry_interval' => 100,
            ],
        ],
    ],
];
