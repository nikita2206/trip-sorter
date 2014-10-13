<?php

namespace TripSorter\BoardingCard;

interface FlightBoardingCardInterface extends FormattableBoardingCardInterface
{

    /**
     * @return string
     */
    public function getGate();

    /**
     * @return string
     */
    public function getSeat();

    /**
     * @return string
     */
    public function getBaggageInformation();

}
