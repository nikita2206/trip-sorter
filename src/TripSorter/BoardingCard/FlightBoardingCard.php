<?php

namespace TripSorter\BoardingCard;

class FlightBoardingCard extends BoardingCard
    implements FlightBoardingCardInterface
{

    /**
     * @var string
     */
    private $gate;

    /**
     * @var string
     */
    private $seat;

    /**
     * @var string
     */
    private $baggageInformation;


    public function __construct($from, $to, $tripNumber, $gate, $seat, $baggageInformation)
    {
        parent::__construct(FormattableBoardingCardInterface::TYPE_FLIGHT, $from, $to, $tripNumber);

        $this->gate = $gate;
        $this->seat = $seat;
        $this->baggageInformation = $baggageInformation;
    }

    /**
     * @inheritdoc
     */
    public function getGate()
    {
        return $this->gate;
    }

    /**
     * @inheritdoc
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @inheritdoc
     */
    public function getBaggageInformation()
    {
        return $this->baggageInformation;
    }

}
