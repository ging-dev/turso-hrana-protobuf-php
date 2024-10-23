<?php

namespace Gingdev\TursoHranaPHP\Hrana;

use Amp\Cancellation;
use Amp\Pipeline\ConcurrentIterator;
use Amp\Pipeline\Queue;
use Amp\Websocket\WebsocketClient;
use Hrana\Ws\ClientMsg;
use Hrana\Ws\ServerMsg;
use Revolt\EventLoop;

class Connection
{
    /** @var ConcurrentIterator<ServerMsg> */
    private ConcurrentIterator $iterator;

    public function __construct(
        private WebsocketClient $client,
    ) {
        $queue = new Queue();
        $this->iterator = $queue->iterate();
        EventLoop::queue(static function () use ($client, $queue): void {
            while ($message = $client->receive()) {
                $serverMsg = new ServerMsg();
                $serverMsg->mergeFromString($message->buffer());
                $queue->push($serverMsg);
            }
        });
    }

    public function send(ClientMsg $message): void
    {
        $this->client->sendBinary($message->serializeToString());
    }

    public function receive(?Cancellation $cancellation = null): ?ServerMsg
    {
        if (!$this->iterator->continue($cancellation)) {
            return null;
        }

        return $this->iterator->getValue();
    }

    public function isClosed(): bool
    {
        return $this->client->isClosed();
    }

    public function close(): void
    {
        $this->client->close();
    }
}
