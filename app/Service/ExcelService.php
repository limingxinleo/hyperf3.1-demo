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

use Han\Utils\Service;
use Psr\Http\Message\ServerRequestInterface;

class ExcelService extends Service
{
    public function export(): string
    {
        $stream = fopen($file = BASE_PATH . '/' . uniqid() . '.csv', 'w');
        if (is_win()) {
            // 解决 Windows 下乱码的问题
            fwrite($stream, chr(0xEF) . chr(0xBB) . chr(0xBF));
        }

        fputcsv($stream, ['用户ID', '姓名', '年龄']);
        fputcsv($stream, [1, '小明', 21]);
        // 增加 "\t" 解决长整被科学计数，且精度丢失的问题
        fputcsv($stream, [PHP_INT_MAX . "\t", '老明', 99]);
        fclose($stream);

        return $file;
    }

    protected function isWin(): bool
    {
        $userAgent = $this->container->get(ServerRequestInterface::class)->getHeaderLine('user-agent');
        if (str_contains(strtolower($userAgent), 'windows')) {
            return true;
        }
        return false;
    }
}
