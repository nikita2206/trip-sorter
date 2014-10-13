<?php

namespace TripSorter\BoardingCard;

class TrainBoardingCard extends BoardingCard
    implements TrainBoardingCardInterface
{

    /**
     * @var string
     */
    private $seat;


    public function __construct($from, $to, $tripNumber, $seat)
    {
        parent::__construct(FormattableBoardingCardInterface::TYPE_TRAIN, $from, $to, $tripNumber);

        $this->seat = $seat;
    }

    /**
     * @inheritdoc
     */
    public function getSeat()
    {
        return $this->seat;
    }

}
