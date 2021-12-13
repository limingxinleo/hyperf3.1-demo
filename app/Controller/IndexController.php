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

use App\Amqp\Producer\DebugProducer;
use Hyperf\Amqp\Producer;
use Hyperf\Di\Annotation\Inject;

class IndexController extends Controller
{
    #[Inject()]
    protected Producer $producer;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        $this->producer->produce(new DebugProducer(uniqid()), true);
        return $this->response->success([
            'user' => $user,
            'method' => $method,
            'message' => 'Hello Hyperf.',
        ]);
    }
}
