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
use Hyperf\Kafka\Producer;

/**
 * @AutoController(prefix="kafka")
 */
class KafkaController extends Controller
{
    /**
     * @Inject
     * @var Producer
     */
    protected $producer;

    public function index()
    {
        $this->producer->send('hyperf', 'xxxx');

        return $this->response->success();
    }
}
