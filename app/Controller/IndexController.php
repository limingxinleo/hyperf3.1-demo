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

use Hyperf\DB\DB;

class IndexController extends Controller
{
    public function index()
    {
        $res = DB::query('SHOW ALL;');

        return $this->response->success($res);
    }
}
