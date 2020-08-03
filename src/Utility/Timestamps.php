<?php

namespace MOTA9100\ODM\Utility;

use DateTime;
use MongoDB\BSON\UTCDateTime;
use MOTA9100\ODM\Mapping\Annotations as ODM;

trait Timestamps {

    /**
     * @var UTCDateTime $created_at
     * @ODM\Field(
     *     type="date"
     * )
     */
    protected $created_at;

    /**
     * @var UTCDateTime $updated_at
     * @ODM\Field(
     *     type="date"
     * )
     */
    protected $updated_at;

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime {

        return $this->created_at ? $this->created_at->toDateTime() : null;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime {

        return $this->updated_at ? $this->updated_at->toDateTime() : null;
    }

    /**
     * @param DateTime $created_at
     */
    public function setCreatedAt(DateTime $created_at): void {

        $this->created_at = new UTCDateTime($created_at->getTimestamp() * 1000);
    }

    /**
     * @param DateTime $updated_at
     */
    public function setUpdatedAt(DateTime $updated_at): void {

        $this->updated_at = new UTCDateTime($updated_at->getTimestamp() * 1000);
    }
}