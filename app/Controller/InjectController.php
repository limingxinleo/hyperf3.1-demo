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

use App\Service\BarService;
use App\Service\FooService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Redis\Redis;

#[AutoController(prefix: 'inject')]
class InjectController extends Controller
{
    #[Inject(lazy: true)]
    protected BarService $bar;

    #[Inject]
    protected FooService $foo;

    #[Inject()]
    protected Redis $redis;

    public function lazy()
    {
        return $this->response->success($this->bar->bar());
    }

    public function traitValue()
    {
        return $this->response->success($this->foo->getTraitValue());
    }
}
