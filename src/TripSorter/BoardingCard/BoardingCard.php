<?php

namespace TripSorter\BoardingCard;

class BoardingCard implements FormattableBoardingCardInterface
{

    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $tripNumber;


    /**
     * @param string $type
     * @param string $from
     * @param string $to
     * @param string $tripNumber
     */
    public function __construct($type, $from, $to, $tripNumber)
    {
        $this->to = $to;
        $this->type = $type;
        $this->from = $from;
        $this->tripNumber = $tripNumber;;
    }

    /**
     * @inheritdoc
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @inheritdoc
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    public function getTripNumber()
    {
        return $this->tripNumber;
    }

}
