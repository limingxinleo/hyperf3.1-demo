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

namespace App\Service\DTO;

use InvalidArgumentException;

class UserDTO
{
    public function __construct(public int $id, public string $name)
    {
    }

    public function __get(string $name)
    {
        if ($name === 'hash') {
            return md5(serialize($this));
        }

        throw new InvalidArgumentException("The argument {$name} is invalid.");
    }

    public function __isset(string $name): bool
    {
        return $name === 'hash';
    }
}
