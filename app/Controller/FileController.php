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

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use League\Flysystem\Filesystem;

#[AutoController(prefix: 'file')]
class FileController extends Controller
{
    #[Inject()]
    protected Filesystem $filesystem;

    public function foo()
    {
        $file = BASE_PATH . '/Dockerfile';
        $stream = fopen($file, 'r+');

        $this->filesystem->writeStream(
            uniqid(),
            $stream
        );

        fclose($stream);

        return $this->response->success();
    }
}
