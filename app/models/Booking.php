<?php

namespace tennisClub;

class Booking extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $bookingdate;

    /**
     *
     * @var string
     */
    protected $starttime;

    /**
     *
     * @var string
     */
    protected $endtime;

    /**
     *
     * @var integer
     */
    protected $memberid;

    /**
     *
     * @var integer
     */
    protected $courtid;

    /**
     *
     * @var double
     */
    protected $fee;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field bookingdate
     *
     * @param string $bookingdate
     * @return $this
     */
    public function setBookingdate($bookingdate)
    {
        $this->bookingdate = $bookingdate;

        return $this;
    }

    /**
     * Method to set the value of field starttime
     *
     * @param string $starttime
     * @return $this
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Method to set the value of field endtime
     *
     * @param string $endtime
     * @return $this
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;

        return $this;
    }

    /**
     * Method to set the value of field memberid
     *
     * @param integer $memberid
     * @return $this
     */
    public function setMemberid($memberid)
    {
        $this->memberid = $memberid;

        return $this;
    }

    /**
     * Method to set the value of field courtid
     *
     * @param integer $courtid
     * @return $this
     */
    public function setCourtid($courtid)
    {
        $this->courtid = $courtid;

        return $this;
    }

    /**
     * Method to set the value of field fee
     *
     * @param double $fee
     * @return $this
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field bookingdate
     *
     * @return string
     */
    public function getBookingdate()
    {
        return $this->bookingdate;
    }

    /**
     * Returns the value of field starttime
     *
     * @return string
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Returns the value of field endtime
     *
     * @return string
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Returns the value of field memberid
     *
     * @return integer
     */
    public function getMemberid()
    {
        return $this->memberid;
    }

    /**
     * Returns the value of field courtid
     *
     * @return integer
     */
    public function getCourtid()
    {
        return $this->courtid;
    }

    /**
     * Returns the value of field fee
     *
     * @return double
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("tennisClub");
        $this->setSource("booking");
        $this->belongsTo('memberid', 'tennisClub\Member', 'id', ['alias' => 'Member']);
        $this->belongsTo('courtid', 'tennisClub\Court', 'id', ['alias' => 'Court']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Booking[]|Booking|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Booking|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
