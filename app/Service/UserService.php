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

namespace App\Service;

use App\Service\DTO\UserDTO;
use Han\Utils\Service;
use Hyperf\Cache\Annotation\Cacheable;

class UserService extends Service
{
    #[Cacheable(prefix: 'user', value: '#{user.hash}')]
    public function first(UserDTO $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'uniqid' => uniqid(),
        ];
    }

    #[Cacheable(prefix: 'test')]
    public function test(string $id): string
    {
        return sprintf('%s:%s', $id, uniqid());
    }
}
