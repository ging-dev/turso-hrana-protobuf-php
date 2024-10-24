<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/common.proto

namespace Hrana;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.BatchResult</code>
 */
class BatchResult extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>map<uint32, .hrana.StmtResult> step_results = 1;</code>
     */
    private $step_results;
    /**
     * Generated from protobuf field <code>map<uint32, .hrana.Error> step_errors = 2;</code>
     */
    private $step_errors;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array|\Google\Protobuf\Internal\MapField $step_results
     *     @type array|\Google\Protobuf\Internal\MapField $step_errors
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>map<uint32, .hrana.StmtResult> step_results = 1;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getStepResults()
    {
        return $this->step_results;
    }

    /**
     * Generated from protobuf field <code>map<uint32, .hrana.StmtResult> step_results = 1;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setStepResults($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::UINT32, \Google\Protobuf\Internal\GPBType::MESSAGE, \Hrana\StmtResult::class);
        $this->step_results = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>map<uint32, .hrana.Error> step_errors = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getStepErrors()
    {
        return $this->step_errors;
    }

    /**
     * Generated from protobuf field <code>map<uint32, .hrana.Error> step_errors = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setStepErrors($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::UINT32, \Google\Protobuf\Internal\GPBType::MESSAGE, \Hrana\Error::class);
        $this->step_errors = $arr;

        return $this;
    }

}

