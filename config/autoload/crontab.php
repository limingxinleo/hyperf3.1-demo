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
use Hyperf\Crontab\Crontab;

return [
    'enable' => true,
    'crontab' => [
        (new Crontab())->setName('Foo')->setRule('* * * * * *')->setCallback([App\Task\FooTask::class, 'execute'])->setMemo('这是一个示例的定时任务'),
    ],
];
