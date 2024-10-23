<?php

namespace Gingdev\TursoHranaPHP\Hrana;

use Amp\Cancellation;
use Amp\Websocket\Client\WebsocketHandshake;
use Gingdev\TursoHranaPHP\LibSQLException;
use Hrana\Ws\ClientMsg;
use Hrana\Ws\HelloMsg;

use function Amp\Websocket\Client\connect;

class Connector
{
    public function __construct(
        private string $uri,
        private string $jwt,
    ) {
    }

    public function connect(
        ?Cancellation $cancellation = null,
    ): Connection {
        $handshake = (new WebsocketHandshake($this->uri))
            ->withAddedHeader('Sec-WebSocket-Protocol', 'hrana3-protobuf')
        ;
        $client = connect($handshake);
        $connection = new Connection($client);
        $helloMsg = (new HelloMsg())->setJwt($this->jwt);
        $connection->send((new ClientMsg())->setHello($helloMsg));
        $response = $connection->receive($cancellation);
        if ($response->hasHelloError()) {
            $message = $response->getHelloError()->getError()->getMessage();
            throw new LibSQLException($message);
        }

        return $connection;
    }
}
