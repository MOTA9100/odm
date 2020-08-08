<?php


namespace MOTA9100\ODM\Utility;

use DateTime;
use MongoDB\BSON\UTCDateTime;
use MOTA9100\ODM\Mapping\Annotations as ODM;

trait SoftDelete {

    /**
     * @var UTCDateTime $deleted_at
     * @ODM\SoftDelete()
     * @ODM\Index
     */
    protected $deleted_at;

    /**
     * @return DateTime|null
     */
    public function getDeletedAt(): ?DateTime {

        return $this->deleted_at ? $this->deleted_at->toDateTime() : null;
    }

    /**
     * @param DateTime $deleted_at
     */
    public function setDeletedAt(DateTime $deleted_at): void {

        $this->deleted_at = new UTCDateTime($deleted_at->getTimestamp() * 1000);
    }

    /**
     *
     */
    public function unsetDeletedAt() : void {

        $this->deleted_at = null;
    }
}
