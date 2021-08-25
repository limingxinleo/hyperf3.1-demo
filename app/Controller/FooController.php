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

use Hyperf\CircuitBreaker\Annotation\CircuitBreaker;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'foo')]
class FooController extends Controller
{
    /**
     * @CircuitBreaker(failCounter=1, fallback="App\Controller\FooController::data", timeout=0.01)
     */
    #[CircuitBreaker(failCounter: 1, fallback: 'App\\Controller\\FooController::data', timeout: 0.01)]
    public function index()
    {
        sleep(1);
        return $this->response->success();
    }

    public function data()
    {
        return 'Hello World';
    }
}
