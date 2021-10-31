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

use Hyperf\HttpMessage\Stream\SwooleFileStream;
use Hyperf\HttpServer\Router\Dispatched;
use Hyperf\Utils\Context;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ResourceMiddleware implements MiddlewareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    protected $direction = BASE_PATH . '/public';

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /** @var Dispatched $dispatched */
        $dispatched = $request->getAttribute(Dispatched::class);
        if ($dispatched->status) {
            return $handler->handle($request);
        }

        $path = $request->getUri()->getPath();
        if ($ext = $this->getEndWith($path, ['.html', '.js'])) {
            if (is_file($this->direction . $path)) {
                $response = Context::get(ResponseInterface::class)
                    ->withBody(new SwooleFileStream($this->direction . $path));

                return match ($ext) {
                    '.js' => $response->withAddedHeader('Content-Type', 'application/javascript'),
                    '.html' => $response->withAddedHeader('Content-Type', 'text/html; charset=utf-8'),
                };
            }
        }

        return $handler->handle($request);
    }

    protected function getEndWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if (substr($haystack, -strlen($needle)) === (string) $needle) {
                return $needle;
            }
        }

        return false;
    }
}
