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

namespace App\Query;

use Fan\ElasticBoolQuery\Document;

class Foo extends Document
{
    public function getIndex(): string
    {
        return 'foo';
    }

    public function getMapping(): array
    {
        return [
            'id' => ['type' => 'long'],
            'name' => ['type' => 'keyword'],
            'summary' => ['type' => 'text'],
        ];
    }
}
