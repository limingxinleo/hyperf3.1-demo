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

use App\Constants\ErrorCode;
use App\Exception\BusinessException;
use Han\Utils\Service;
use Hyperf\Crontab\Annotation\Crontab;
use Hyperf\Redis\Redis;

class CrontabService extends Service
{
    #[Crontab(rule: '* * * * * *', name: 'foo')]
    public function foo()
    {
        var_dump('foo');
    }

    #[Crontab(rule: '* * * * * *', name: 'failed')]
    public function failed()
    {
        throw new BusinessException(ErrorCode::SERVER_ERROR, 'Crontab 执行报错');
    }

    public function listenCreated()
    {
        $key = 'lock:node:' . di()->get(Node::class)->getId();
        // 判断此进程是否正在运行，如果正在运行，则不在此进程调度
        if (di()->get(Redis::class)->exists($key)) {
            return;
        }

        if (! di()->get(Redis::class)->set('lock:once', '1', ['EX' => 50, 'NX'])) {
            return;
        }

        $ts = microtime(true);
        try {
            di()->get(Redis::class)->set($key, '1', ['EX' => 600]);

            // TODO: somethings...
        } finally {
            $ts = microtime(true) - $ts;
            if ($ts < 600) {
                di()->get(Redis::class)->del($key);
            }
        }
    }
}
