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

use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[AutoController(prefix: 'image')]
class ImageController extends Controller
{
    public function en(ResponseInterface $response)
    {
        return $response->download(BASE_PATH . '/storage/IMG_0003.jpg');
    }

    public function zh(ResponseInterface $response)
    {
        return $response->download(BASE_PATH . '/storage/IMG_0003.jpg', '风景图.jpg');
    }
}
