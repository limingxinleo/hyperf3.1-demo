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

use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'http')]
class HttpController extends Controller
{
    public function index()
    {
        return $this->response->success('Hello World')
            ->withAddedHeader('Test', uniqid())
            ->withAddedHeader('Test', uniqid());
    }
}
