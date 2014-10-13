<?php

namespace TripSorter\Formatter;


use TripSorter\BoardingCard\FormattableBoardingCardInterface;

class DefaultFormatter implements BoardingCardFormatterInterface
{

    /**
     * @param FormattableBoardingCardInterface $card
     * @return string
     */
    public function format(FormattableBoardingCardInterface $card)
    {
        return "Take {$card->getType()} {$card->getTripNumber()} from {$card->getFrom()} to {$card->getTo()}.";
    }

}
