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
namespace App\Task;

use Carbon\Carbon;
use Hyperf\Contract\StdoutLoggerInterface;

class FooTask
{
    public function execute()
    {
        di()->get(StdoutLoggerInterface::class)->info($now = Carbon::now()->toDateTimeString());

        var_dump($now . '|' . (memory_get_usage(true)) . 'b');
    }
}
