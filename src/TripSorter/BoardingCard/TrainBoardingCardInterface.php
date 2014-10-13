<?php

namespace TripSorter\BoardingCard;

interface TrainBoardingCardInterface extends FormattableBoardingCardInterface
{

    /**
     * @return string
     */
    public function getSeat();

}
