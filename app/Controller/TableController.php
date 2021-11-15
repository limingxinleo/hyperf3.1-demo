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

use App\Service\TableService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'table')]
class TableController extends Controller
{
    #[Inject]
    protected TableService $table;

    public function set()
    {
        $key = 'test';

        $ret = $this->table->getTable()->set($key, [
            'name' => uniqid(),
        ]);

        return $this->response->success([
            'data' => $ret,
            'pid' => getmypid(),
        ]);
    }

    public function get()
    {
        $key = 'test';

        $ret = $this->table->getTable()->get($key);

        return $this->response->success([
            'data' => $ret,
            'pid' => getmypid(),
        ]);
    }
}
