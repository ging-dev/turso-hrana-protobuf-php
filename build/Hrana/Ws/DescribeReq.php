<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/websocket.proto

namespace Hrana\Ws;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.ws.DescribeReq</code>
 */
class DescribeReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 stream_id = 1;</code>
     */
    protected $stream_id = 0;
    /**
     * Generated from protobuf field <code>optional string sql = 2;</code>
     */
    protected $sql = null;
    /**
     * Generated from protobuf field <code>optional int32 sql_id = 3;</code>
     */
    protected $sql_id = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $stream_id
     *     @type string $sql
     *     @type int $sql_id
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

    /**
     * Generated from protobuf field <code>optional string sql = 2;</code>
     * @return string
     */
    public function getSql()
    {
        return isset($this->sql) ? $this->sql : '';
    }

    public function hasSql()
    {
        return isset($this->sql);
    }

    public function clearSql()
    {
        unset($this->sql);
    }

    /**
     * Generated from protobuf field <code>optional string sql = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setSql($var)
    {
        GPBUtil::checkString($var, True);
        $this->sql = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional int32 sql_id = 3;</code>
     * @return int
     */
    public function getSqlId()
    {
        return isset($this->sql_id) ? $this->sql_id : 0;
    }

    public function hasSqlId()
    {
        return isset($this->sql_id);
    }

    public function clearSqlId()
    {
        unset($this->sql_id);
    }

    /**
     * Generated from protobuf field <code>optional int32 sql_id = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setSqlId($var)
    {
        GPBUtil::checkInt32($var);
        $this->sql_id = $var;

        return $this;
    }

}

