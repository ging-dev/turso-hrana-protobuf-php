<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/websocket.proto

namespace Hrana\Ws;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.ws.GetAutocommitReq</code>
 */
class GetAutocommitReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 stream_id = 1;</code>
     */
    protected $stream_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $stream_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Websocket::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 stream_id = 1;</code>
     * @return int
     */
    public function getStreamId()
    {
        return $this->stream_id;
    }

    /**
     * Generated from protobuf field <code>int32 stream_id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setStreamId($var)
    {
        GPBUtil::checkInt32($var);
        $this->stream_id = $var;

        return $this;
    }

}

