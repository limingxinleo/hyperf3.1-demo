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

use App\Annotation\BodyForm;
use App\Annotation\QueryForm;
use App\Middleware\BarMiddleware;
use App\Middleware\FooMiddleware;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Di\Annotation\MultipleAnnotation;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Middleware;

#[AutoController()]
class FooController extends Controller
{
    public function index()
    {
        return $this->response->success('foo');
    }

    #[Middleware(middleware: BarMiddleware::class)]
    #[Middleware(middleware: FooMiddleware::class)]
    public function foo()
    {
        return $this->response->success();
    }

    #[BodyForm(name: 'body')]
    #[QueryForm(name: 'id')]
    #[QueryForm(name: 'name')]
    public function query()
    {
        $res = AnnotationCollector::getClassMethodAnnotation(static::class, 'query');
        foreach ($res as $name => $annotation) {
            if ($annotation instanceof MultipleAnnotation) {
                $annotations = $annotation->toAnnotations();
                var_dump($annotations);
            }
        }
        return $this->response->success();
    }
}
