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

use App\Amqp\Producer\Debug2Producer;
use App\Amqp\Producer\DelayDirectProducer;
use Carbon\Carbon;
use Hyperf\Amqp\Producer;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController()]
class AmqpController extends Controller
{
    #[Inject()]
    protected Producer $producer;

    public function push()
    {
        $exchange = $this->request->input('exchange', 'hyperf');
        $key = $this->request->input('key', 'hyperf');

        $this->producer->produce(new Debug2Producer($exchange, $key, '123123'), true);
        return $this->response->success();
    }

    public function delay()
    {
        $message = (new DelayDirectProducer(Carbon::now()->toDateTimeString()))->setDelayMs(
            (int) $this->request->input('ms', 10000)
        );

        $this->producer->produce($message);

        return $this->response->success();
    }
}
