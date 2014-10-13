<?php

namespace TripSorter\Formatter;


use TripSorter\BoardingCard\FormattableBoardingCardInterface;
use TripSorter\BoardingCard\TrainBoardingCardInterface;

class TrainFormatter implements BoardingCardFormatterInterface
{

    /**
     * @inheritdoc
     */
    public function format(FormattableBoardingCardInterface $card)
    {
        if ( ! $card instanceof TrainBoardingCardInterface) {
            throw new \InvalidArgumentException();
        }

        return "Take train {$card->getTripNumber()} from {$card->getFrom()} to {$card->getTo()}. Sit in seat {$card->getSeat()}.";
    }

}
