<?php

namespace TripSorter;

use TripSorter\BoardingCard\BoardingCardInterface;

class TripSorter
{

    /**
     * @param BoardingCardInterface[] $boardingCards
     * @return BoardingCardInterface[]
     */
    public function sort(array $boardingCards)
    {
        $sorted = [array_pop($boardingCards)];

        // let's add $i counter to not enter infinite loop if chain is broken (invalid input)
        for ($i = count($boardingCards); $boardingCards && $i--;) {
            foreach ($boardingCards as $key => $card) {
                if (end($sorted)->getTo() === $card->getFrom()) {
                    array_push($sorted, $card);
                    unset($boardingCards[$key]);
                } elseif (reset($sorted)->getFrom() === $card->getTo()) {
                    array_unshift($sorted, $card);
                    unset($boardingCards[$key]);
                }
            }
        }

        return $sorted;
    }

}
