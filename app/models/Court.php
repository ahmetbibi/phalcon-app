<?php

namespace tennisClub;

class Court extends \Phalcon\Mvc\Model
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
    protected $surface;

    /**
     *
     * @var string
     */
    protected $floodlights;

    /**
     *
     * @var string
     */
    protected $indoor;

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
     * Method to set the value of field surface
     *
     * @param string $surface
     * @return $this
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Method to set the value of field floodlights
     *
     * @param string $floodlights
     * @return $this
     */
    public function setFloodlights($floodlights)
    {
        $this->floodlights = $floodlights;

        return $this;
    }

    /**
     * Method to set the value of field indoor
     *
     * @param string $indoor
     * @return $this
     */
    public function setIndoor($indoor)
    {
        $this->indoor = $indoor;

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
     * Returns the value of field surface
     *
     * @return string
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Returns the value of field floodlights
     *
     * @return string
     */
    public function getFloodlights()
    {
        return $this->floodlights;
    }

    /**
     * Returns the value of field indoor
     *
     * @return string
     */
    public function getIndoor()
    {
        return $this->indoor;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("tennisClub");
        $this->setSource("court");
        $this->hasMany('id', 'tennisClub\Booking', 'courtid', ['alias' => 'Booking']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Court[]|Court|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Court|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
