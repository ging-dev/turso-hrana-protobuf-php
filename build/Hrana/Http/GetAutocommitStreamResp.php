<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/http.proto

namespace Hrana\Http;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.http.GetAutocommitStreamResp</code>
 */
class GetAutocommitStreamResp extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>bool is_autocommit = 1;</code>
     */
    protected $is_autocommit = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $is_autocommit
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Http::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>bool is_autocommit = 1;</code>
     * @return bool
     */
    public function getIsAutocommit()
    {
        return $this->is_autocommit;
    }

    /**
     * Generated from protobuf field <code>bool is_autocommit = 1;</code>
     * @param bool $var
     * @return $this
     */
    public function setIsAutocommit($var)
    {
        GPBUtil::checkBool($var);
        $this->is_autocommit = $var;

        return $this;
    }

}
