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
namespace App\Controller;

use App\Service\ExcelService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[AutoController(prefix: 'http')]
class HttpController extends Controller
{
    #[Inject]
    protected ExcelService $excel;

    public function index()
    {
        return $this->response->success('Hello World')
            ->withAddedHeader('Test', uniqid())
            ->withAddedHeader('Test', uniqid());
    }

    public function excel(ResponseInterface $response)
    {
        return $response->download(
            $this->excel->export()
        );
    }

    public function incr()
    {
        return $this->response->success(
            di()->get(\Swoole\Table::class)->incr('test', 'number', 1)
        );
    }
}
