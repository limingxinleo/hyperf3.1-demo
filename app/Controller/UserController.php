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

use Hyperf\DbConnection\Annotation\Transactional;
use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[AutoController(prefix: 'user')]
class UserController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }

    public function trans()
    {
        Db::transaction(function () {
            // Do something...
            Db::transaction(function () {
                // Do something...
            });
            // Do something...
        });

        return $this->response->success('Hello Hyperf!');
    }

    public function trans2()
    {
        $this->foo();
        return $this->response->success('Hello Hyperf!');
    }

    #[Transactional]
    protected function foo()
    {
        // Do something...
        $this->bar();
        // Do something...
    }

    #[Transactional]
    protected function bar()
    {
        // Do something...
    }
}
