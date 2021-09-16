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
namespace App\Middleware;

use App\Controller\IndexController;
use Hyperf\HttpServer\Router\Dispatched;
use Hyperf\HttpServer\Router\Handler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RewriteMiddleware implements MiddlewareInterface
{
    public function __construct(protected ContainerInterface $container, protected bool $dump = false)
    {
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var Dispatched $dispatched */
        $dispatched = $request->getAttribute(Dispatched::class);
        if ($dispatched->status === 0 && $request->getUri()->getPath() === '/foo/index2') {
            $dispatched->status = 1;
            $dispatched->handler = new Handler(
                [
                    IndexController::class, 'index',
                ],
                '/foo/index2',
                []
            );
        }

        if ($dispatched->handler?->route === '/foo/index') {
            $dispatched->handler->callback = [
                IndexController::class, 'index',
            ];
        }

        if ($this->dump) {
            dump($dispatched);
        }

        return $handler->handle($request);
    }
}
