<?php

namespace TripSorter\Formatter;

use TripSorter\BoardingCard\FlightBoardingCardInterface;
use TripSorter\BoardingCard\FormattableBoardingCardInterface;

class FlightFormatter implements BoardingCardFormatterInterface
{

    /**
     * @inheritdoc
     */
    public function format(FormattableBoardingCardInterface $card)
    {
        if ( ! $card instanceof FlightBoardingCardInterface) {
            throw new \InvalidArgumentException();
        }

        return "From {$card->getFrom()}, take flight {$card->getTripNumber()} to {$card->getTo()}. " .
               "Gate {$card->getGate()}, seat {$card->getSeat()}. {$card->getBaggageInformation()}";
    }

}
