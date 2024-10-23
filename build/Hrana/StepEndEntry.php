<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/common.proto

namespace Hrana;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>hrana.StepEndEntry</code>
 */
class StepEndEntry extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 affected_row_count = 1;</code>
     */
    protected $affected_row_count = 0;
    /**
     * Generated from protobuf field <code>optional sint64 last_insert_rowid = 2;</code>
     */
    protected $last_insert_rowid = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $affected_row_count
     *     @type int|string $last_insert_rowid
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Proto\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint64 affected_row_count = 1;</code>
     * @return int|string
     */
    public function getAffectedRowCount()
    {
        return $this->affected_row_count;
    }

    /**
     * Generated from protobuf field <code>uint64 affected_row_count = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAffectedRowCount($var)
    {
        GPBUtil::checkUint64($var);
        $this->affected_row_count = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional sint64 last_insert_rowid = 2;</code>
     * @return int|string
     */
    public function getLastInsertRowid()
    {
        return isset($this->last_insert_rowid) ? $this->last_insert_rowid : 0;
    }

    public function hasLastInsertRowid()
    {
        return isset($this->last_insert_rowid);
    }

    public function clearLastInsertRowid()
    {
        unset($this->last_insert_rowid);
    }

    /**
     * Generated from protobuf field <code>optional sint64 last_insert_rowid = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setLastInsertRowid($var)
    {
        GPBUtil::checkInt64($var);
        $this->last_insert_rowid = $var;

        return $this;
    }

}

