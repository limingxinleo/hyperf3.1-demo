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

class CrontabService extends Service
{
    #[Crontab(name: 'foo', rule: '*/2 * * * * *')]
    public function foo()
    {
        var_dump('foo');
    }

    #[Crontab(name: 'failed', rule: '* * * * * *')]
    public function failed()
    {
        throw new BusinessException(ErrorCode::SERVER_ERROR, 'Crontab 执行报错');
    }
}
