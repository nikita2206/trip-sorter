<?php

namespace TripSorter\Formatter;

use TripSorter\BoardingCard\FormattableBoardingCardInterface;

interface BoardingCardFormatterInterface
{

    /**
     * @param FormattableBoardingCardInterface $card
     * @return string
     * @throws \InvalidArgumentException
     */
    public function format(FormattableBoardingCardInterface $card);

}
