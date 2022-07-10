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
use Hyperf\ConfigCenter\Mode;

return [
    'enable' => true,
    'driver' => 'nacos',
    'mode' => Mode::PROCESS,
    'drivers' => [
        'nacos' => [
            'driver' => Hyperf\ConfigNacos\NacosDriver::class,
            'merge_mode' => Hyperf\ConfigNacos\Constants::CONFIG_MERGE_APPEND,
            'interval' => 3,
            'default_key' => 'nacos_config',
            'listener_config' => [
                // dataId, group, tenant, type, content
                'nacos_config' => [
                    'tenant' => '004bc819-d34b-4cce-b02d-bf286005a4be',
                    'data_id' => 'hyperf-service-config',
                    'group' => 'DEFAULT_GROUP',
                    'type' => 'json',
                ],
                'nacos_config.data' => [
                    'tenant' => '004bc819-d34b-4cce-b02d-bf286005a4be',
                    'data_id' => 'hyperf-service-config-yml',
                    'group' => 'DEFAULT_GROUP',
                    'type' => 'json',
                ],
            ],
        ],
    ],
];
