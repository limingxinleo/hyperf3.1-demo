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

namespace App\Schema;

use Hyperf\Swagger\Annotation\Property;
use Hyperf\Swagger\Annotation\Schema;
use JsonSerializable;

#[Schema(title: 'IndexSchema')]
class IndexSchema implements JsonSerializable
{
    public function __construct(
        #[Property(property: 'name', title: '名字', type: 'string')]
        public string $name,
        #[Property(property: 'gender', title: '性别', type: 'integer')]
        public int $gender
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'name' => $this->name,
            'gender' => $this->gender,
        ];
    }
}
