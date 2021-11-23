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

use EasySwoole\Task\Task;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'task')]
class TaskController extends Controller
{
    #[Inject]
    protected Task $task;

    public function sync()
    {
        $name = $this->request->input('name');

        $ret = $this->task->sync(static function () use ($name) {
            sleep(1);
            var_dump($name);
            return uniqid();
        });

        return $this->response->success($ret);
    }

    public function async()
    {
        $name = $this->request->input('name');

        $ret = $this->task->async(static function () use ($name) {
            sleep(1);
            var_dump($name);
            return uniqid();
        });

        return $this->response->success($ret);
    }
}
