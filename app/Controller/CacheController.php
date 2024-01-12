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

use App\Service\DTO\UserDTO;
use App\Service\UserService;
use Hyperf\HttpServer\Annotation\AutoController;

#[AutoController(prefix: 'cache')]
class CacheController extends Controller
{
    public function index()
    {
        $user = new UserDTO(1, 'Hyperf');
        return $this->response->success(
            di()->get(UserService::class)->first($user)
        );
    }

    public function test()
    {
        return $this->response->success(
            di()->get(UserService::class)->test('id_name'),
        );
    }
}
