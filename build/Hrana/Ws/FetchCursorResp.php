<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/websocket.proto

namespace Hrana\Ws;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.ws.FetchCursorResp</code>
 */
class FetchCursorResp extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .hrana.CursorEntry entries = 1;</code>
     */
    private $entries;
    /**
     * Generated from protobuf field <code>bool done = 2;</code>
     */
    protected $done = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Hrana\CursorEntry>|\Google\Protobuf\Internal\RepeatedField $entries
     *     @type bool $done
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Websocket::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .hrana.CursorEntry entries = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * Generated from protobuf field <code>repeated .hrana.CursorEntry entries = 1;</code>
     * @param array<\Hrana\CursorEntry>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEntries($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Hrana\CursorEntry::class);
        $this->entries = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool done = 2;</code>
     * @return bool
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Generated from protobuf field <code>bool done = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setDone($var)
    {
        GPBUtil::checkBool($var);
        $this->done = $var;

        return $this;
    }

}

