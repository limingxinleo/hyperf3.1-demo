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

use App\Middleware\ParamMiddleware;
use Hyperf\HttpServer\Annotation\Controller as AController;
use Hyperf\HttpServer\Annotation\GetMapping;
use Hyperf\HttpServer\Annotation\Middleware;

#[AController(prefix: '/param')]
#[Middleware(ParamMiddleware::class)]
class ParamController extends Controller
{
    #[GetMapping('index', ['rate' => 4])]
    public function index()
    {
        return $this->response->success();
    }
}
