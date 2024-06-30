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
    'hosts' => [
        '127.0.0.1:9200',
    ],
    'update_settings' => [
        'refresh' => true,
        'retry_on_conflict' => 5,
    ],
];
