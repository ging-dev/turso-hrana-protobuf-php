<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/http.proto

namespace Hrana\Http;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.http.StreamRequest</code>
 */
class StreamRequest extends \Google\Protobuf\Internal\Message
{
    protected $request;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Hrana\Http\CloseStreamReq $close
     *     @type \Hrana\Http\ExecuteStreamReq $execute
     *     @type \Hrana\Http\BatchStreamReq $batch
     *     @type \Hrana\Http\SequenceStreamReq $sequence
     *     @type \Hrana\Http\DescribeStreamReq $describe
     *     @type \Hrana\Http\StoreSqlStreamReq $store_sql
     *     @type \Hrana\Http\CloseSqlStreamReq $close_sql
     *     @type \Hrana\Http\GetAutocommitStreamReq $get_autocommit
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Http::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.CloseStreamReq close = 1;</code>
     * @return \Hrana\Http\CloseStreamReq|null
     */
    public function getClose()
    {
        return $this->readOneof(1);
    }

    public function hasClose()
    {
        return $this->hasOneof(1);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.CloseStreamReq close = 1;</code>
     * @param \Hrana\Http\CloseStreamReq $var
     * @return $this
     */
    public function setClose($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\CloseStreamReq::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.ExecuteStreamReq execute = 2;</code>
     * @return \Hrana\Http\ExecuteStreamReq|null
     */
    public function getExecute()
    {
        return $this->readOneof(2);
    }

    public function hasExecute()
    {
        return $this->hasOneof(2);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.ExecuteStreamReq execute = 2;</code>
     * @param \Hrana\Http\ExecuteStreamReq $var
     * @return $this
     */
    public function setExecute($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\ExecuteStreamReq::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.BatchStreamReq batch = 3;</code>
     * @return \Hrana\Http\BatchStreamReq|null
     */
    public function getBatch()
    {
        return $this->readOneof(3);
    }

    public function hasBatch()
    {
        return $this->hasOneof(3);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.BatchStreamReq batch = 3;</code>
     * @param \Hrana\Http\BatchStreamReq $var
     * @return $this
     */
    public function setBatch($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\BatchStreamReq::class);
        $this->writeOneof(3, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.SequenceStreamReq sequence = 4;</code>
     * @return \Hrana\Http\SequenceStreamReq|null
     */
    public function getSequence()
    {
        return $this->readOneof(4);
    }

    public function hasSequence()
    {
        return $this->hasOneof(4);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.SequenceStreamReq sequence = 4;</code>
     * @param \Hrana\Http\SequenceStreamReq $var
     * @return $this
     */
    public function setSequence($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\SequenceStreamReq::class);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.DescribeStreamReq describe = 5;</code>
     * @return \Hrana\Http\DescribeStreamReq|null
     */
    public function getDescribe()
    {
        return $this->readOneof(5);
    }

    public function hasDescribe()
    {
        return $this->hasOneof(5);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.DescribeStreamReq describe = 5;</code>
     * @param \Hrana\Http\DescribeStreamReq $var
     * @return $this
     */
    public function setDescribe($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\DescribeStreamReq::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.StoreSqlStreamReq store_sql = 6;</code>
     * @return \Hrana\Http\StoreSqlStreamReq|null
     */
    public function getStoreSql()
    {
        return $this->readOneof(6);
    }

    public function hasStoreSql()
    {
        return $this->hasOneof(6);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.StoreSqlStreamReq store_sql = 6;</code>
     * @param \Hrana\Http\StoreSqlStreamReq $var
     * @return $this
     */
    public function setStoreSql($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\StoreSqlStreamReq::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.CloseSqlStreamReq close_sql = 7;</code>
     * @return \Hrana\Http\CloseSqlStreamReq|null
     */
    public function getCloseSql()
    {
        return $this->readOneof(7);
    }

    public function hasCloseSql()
    {
        return $this->hasOneof(7);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.CloseSqlStreamReq close_sql = 7;</code>
     * @param \Hrana\Http\CloseSqlStreamReq $var
     * @return $this
     */
    public function setCloseSql($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\CloseSqlStreamReq::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.http.GetAutocommitStreamReq get_autocommit = 8;</code>
     * @return \Hrana\Http\GetAutocommitStreamReq|null
     */
    public function getGetAutocommit()
    {
        return $this->readOneof(8);
    }

    public function hasGetAutocommit()
    {
        return $this->hasOneof(8);
    }

    /**
     * Generated from protobuf field <code>.hrana.http.GetAutocommitStreamReq get_autocommit = 8;</code>
     * @param \Hrana\Http\GetAutocommitStreamReq $var
     * @return $this
     */
    public function setGetAutocommit($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Http\GetAutocommitStreamReq::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getRequest()
    {
        return $this->whichOneof("request");
    }

}

