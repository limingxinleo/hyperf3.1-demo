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
namespace App\Annotation;

use Attribute;
use Hyperf\Di\Annotation\AbstractAnnotation;

#[Attribute(Attribute::TARGET_METHOD | Attribute::IS_REPEATABLE)]
class BodyForm extends AbstractAnnotation
{
    public function __construct(public string $name)
    {
    }
}
