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

use Han\Utils\Service;
use Psr\Container\ContainerInterface;
use Swoole\Table;

class TableService extends Service
{
    protected Table $table;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);

        $table = new Table(1024 * 1024, 0.2);
        $table->column('id', Table::TYPE_INT);
        $table->column('name', Table::TYPE_STRING, 64);
        $table->column('num', Table::TYPE_FLOAT);
        $table->create();

        $this->table = $table;
    }

    public function getTable(): Table
    {
        return $this->table;
    }
}
