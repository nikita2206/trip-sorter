<?php

namespace TripSorter;

use TripSorter\BoardingCard\FormattableBoardingCardInterface;
use TripSorter\Formatter\BoardingCardFormatterInterface;

class TripFormatter
{

    /**
     * @var BoardingCardFormatterInterface
     */
    private $defaultFormatter;

    /**
     * @var BoardingCardFormatterInterface[]
     */
    private $formatters;

    /**
     * @param BoardingCardFormatterInterface $defaultFormatter
     * @param BoardingCardFormatterInterface[] $formatters
     */
    public function __construct(BoardingCardFormatterInterface $defaultFormatter, array $formatters = [])
    {
        $this->defaultFormatter = $defaultFormatter;
        $this->formatters = $formatters;
    }

    /**
     * @param FormattableBoardingCardInterface[] $boardingCards
     * @return string[]
     */
    public function format(array $boardingCards)
    {
        $formatted = [];

        foreach ($boardingCards as $card) {
            $formatted[] = $this->getFormatter($card)->format($card);
        }

        return $formatted;
    }

    /**
     * @param FormattableBoardingCardInterface $card
     * @return BoardingCardFormatterInterface
     */
    private function getFormatter(FormattableBoardingCardInterface $card)
    {
        if (isset($this->formatters[$card->getType()])) {
            return $this->formatters[$card->getType()];
        }

        return $this->defaultFormatter;
    }

}
