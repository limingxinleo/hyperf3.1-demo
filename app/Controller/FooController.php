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

use App\RPC\FooInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[AutoController(prefix: 'foo')]
class FooController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        $id = di()->get(FooInterface::class)->getId();

        return $this->response->success([
            'id' => $id,
            'name' => di()->get(FooInterface::class)->getName(),
        ]);
    }
}
