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
namespace App\MQTT\Event;

use Hyperf\HttpMessage\Server\Response;
use Hyperf\MqttServer\Annotation\MQTTConnect;
use Hyperf\MqttServer\Handler\HandlerInterface;
use Psr\Http\Message\ServerRequestInterface;

#[MQTTConnect(priority: 1)]
class MQTTConnectHandler implements HandlerInterface
{
    public function handle(ServerRequestInterface $request, Response $response): Response
    {
        var_dump((string) $response->getBody());
        return $response;
    }
}
