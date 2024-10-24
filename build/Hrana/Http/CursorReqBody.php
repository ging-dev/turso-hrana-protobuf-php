<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/http.proto

namespace Hrana\Http;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.http.CursorReqBody</code>
 */
class CursorReqBody extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>optional string baton = 1;</code>
     */
    protected $baton = null;
    /**
     * Generated from protobuf field <code>.hrana.Batch batch = 2;</code>
     */
    protected $batch = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $baton
     *     @type \Hrana\Batch $batch
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Http::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>optional string baton = 1;</code>
     * @return string
     */
    public function getBaton()
    {
        return isset($this->baton) ? $this->baton : '';
    }

    public function hasBaton()
    {
        return isset($this->baton);
    }

    public function clearBaton()
    {
        unset($this->baton);
    }

    /**
     * Generated from protobuf field <code>optional string baton = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setBaton($var)
    {
        GPBUtil::checkString($var, True);
        $this->baton = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.Batch batch = 2;</code>
     * @return \Hrana\Batch|null
     */
    public function getBatch()
    {
        return $this->batch;
    }

    public function hasBatch()
    {
        return isset($this->batch);
    }

    public function clearBatch()
    {
        unset($this->batch);
    }

    /**
     * Generated from protobuf field <code>.hrana.Batch batch = 2;</code>
     * @param \Hrana\Batch $var
     * @return $this
     */
    public function setBatch($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Batch::class);
        $this->batch = $var;

        return $this;
    }

}

