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

use Hyperf\HttpServer\Annotation\Controller as BaseController;
use Hyperf\HttpServer\Annotation\GetMapping;

#[BaseController(prefix: 'bar')]
class BarController extends Controller
{
    #[GetMapping('test/{id}/{name}')]
    public function index(int $id, string $name)
    {
        return $this->response->success([$id, $name]);
    }
}
