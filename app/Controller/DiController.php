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
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'di')]
class DiController extends Controller
{
    public function set()
    {
        di()->set('foo', make(BarService::class));
        $bar = di()->get('foo');

        di()->set('foo', make(BarService::class));
        $bar2 = di()->get('foo');

        return $this->response->success([$bar->id, $bar2->id]);
    }

    public function define()
    {
        di()->define('foo', BarService::class);
        $bar = di()->get('foo');
        $bar1 = di()->make('foo');

        di()->define('foo', FooService::class);
        $bar2 = di()->get('foo');
        $bar3 = di()->make('foo');

        return $this->response->success([get_class($bar), get_class($bar1), get_class($bar2), get_class($bar3)]);
    }
}
