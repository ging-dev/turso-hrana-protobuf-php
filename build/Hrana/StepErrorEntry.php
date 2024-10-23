<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/common.proto

namespace Hrana;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.StepErrorEntry</code>
 */
class StepErrorEntry extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint32 step = 1;</code>
     */
    protected $step = 0;
    /**
     * Generated from protobuf field <code>.hrana.Error error = 2;</code>
     */
    protected $error = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $step
     *     @type \Hrana\Error $error
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint32 step = 1;</code>
     * @return int
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Generated from protobuf field <code>uint32 step = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setStep($var)
    {
        GPBUtil::checkUint32($var);
        $this->step = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>.hrana.Error error = 2;</code>
     * @return \Hrana\Error|null
     */
    public function getError()
    {
        return $this->error;
    }

    public function hasError()
    {
        return isset($this->error);
    }

    public function clearError()
    {
        unset($this->error);
    }

    /**
     * Generated from protobuf field <code>.hrana.Error error = 2;</code>
     * @param \Hrana\Error $var
     * @return $this
     */
    public function setError($var)
    {
        GPBUtil::checkMessage($var, \Hrana\Error::class);
        $this->error = $var;

        return $this;
    }

}
