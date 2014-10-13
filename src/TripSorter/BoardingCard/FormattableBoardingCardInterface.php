<?php

namespace TripSorter\BoardingCard;

interface FormattableBoardingCardInterface extends BoardingCardInterface
{

    const TYPE_FLIGHT = 'flight',
          TYPE_BUS    = 'bus',
          TYPE_TRAIN  = 'train',
          TYPE_SHIP   = 'ship';


    /**
     * @return string (one of TYPE_* constants)
     */
    public function getType();

    /**
     * Flight/train/bus number
     *
     * @return string
     */
    public function getTripNumber();

}
