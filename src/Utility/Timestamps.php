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

        return $this->created_at;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt(): ?DateTime {

        return $this->updated_at;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void {

        $this->created_at = new UTCDateTime($createdAt->getTimestamp() * 1000);
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt): void {

        $this->updated_at = new UTCDateTime($updatedAt->getTimestamp() * 1000);
    }
}
