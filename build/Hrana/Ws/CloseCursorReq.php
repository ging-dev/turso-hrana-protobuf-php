<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/websocket.proto

namespace Hrana\Ws;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.ws.CloseCursorReq</code>
 */
class CloseCursorReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 cursor_id = 1;</code>
     */
    protected $cursor_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $cursor_id
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Websocket::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 cursor_id = 1;</code>
     * @return int
     */
    public function getCursorId()
    {
        return $this->cursor_id;
    }

    /**
     * Generated from protobuf field <code>int32 cursor_id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setCursorId($var)
    {
        GPBUtil::checkInt32($var);
        $this->cursor_id = $var;

        return $this;
    }

}

