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

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\Nats\Driver\DriverInterface;

#[AutoController(prefix: 'nats')]
class NatsController extends Controller
{
    #[Inject]
    protected DriverInterface $nats;

    public function index()
    {
        for ($i = 1; $i <= 10; ++$i) {
            $this->nats->publish('hyperf' . $i, $i . ' ');
        }

        return $this->response->success();
    }
}
