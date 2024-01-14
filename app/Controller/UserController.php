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

use Hyperf\Swagger\Annotation as SA;
use Hyperf\Swagger\Annotation\HyperfServer;
use Hyperf\Swagger\Request\SwaggerRequest;

#[HyperfServer('http')]
class UserController extends Controller
{
    #[SA\Get(path: '/index', tags: ['用户中心'])]
    #[SA\PathParameter(name: 'id', description: '用户 ID')]
    #[SA\QueryParameter(name: 'name', description: '用户名', rules: 'required')]
    #[SA\RequestBody(content: new SA\JsonContent(properties: [
        new SA\Property(property: 'gender', rules: 'required'),
    ]))]
    #[SA\Response(response: 200, content: new SA\JsonContent(type: 'object', ref: '#/components/schemas/IndexSchema'))]
    public function index(SwaggerRequest $request)
    {
        return $this->response->success([
        ]);
    }
}
