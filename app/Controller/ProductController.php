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

use App\GraphQL\Product;
use TheCodingMachine\GraphQLite\Annotations\Query;

class ProductController extends Controller
{
    #[Query]
    public function product(int $id): Product
    {
        return new Product(['name' => 'name_' . $id]);
    }
}
