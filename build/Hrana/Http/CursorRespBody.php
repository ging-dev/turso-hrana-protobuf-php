<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/http.proto

namespace Hrana\Http;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.http.CursorRespBody</code>
 */
class CursorRespBody extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>optional string baton = 1;</code>
     */
    protected $baton = null;
    /**
     * Generated from protobuf field <code>optional string base_url = 2;</code>
     */
    protected $base_url = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $baton
     *     @type string $base_url
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
     * Generated from protobuf field <code>optional string base_url = 2;</code>
     * @return string
     */
    public function getBaseUrl()
    {
        return isset($this->base_url) ? $this->base_url : '';
    }

    public function hasBaseUrl()
    {
        return isset($this->base_url);
    }

    public function clearBaseUrl()
    {
        unset($this->base_url);
    }

    /**
     * Generated from protobuf field <code>optional string base_url = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setBaseUrl($var)
    {
        GPBUtil::checkString($var, True);
        $this->base_url = $var;

        return $this;
    }

}

