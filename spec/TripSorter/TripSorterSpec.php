<?php

namespace spec\TripSorter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TripSorter\BoardingCard\BoardingCardInterface;

class TripSorterSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('TripSorter\TripSorter');
    }

    function it_should_sort_based_on_the_destinations_chain(BoardingCardInterface $card1, BoardingCardInterface $card2,
                                                            BoardingCardInterface $card3, BoardingCardInterface $card4)
    {
        $card1->getFrom()->willReturn("Stockholm");
        $card1->getTo()->willReturn("London");

        $card2->getFrom()->willReturn("London");
        $card2->getTo()->willReturn("Mexico");

        $card3->getFrom()->willReturn("Mexico");
        $card3->getTo()->willReturn("Brasil");

        $card4->getFrom()->willReturn("Brasil");
        $card4->getTo()->willReturn("Dubai");

        $this->sort([$card3, $card1, $card4, $card2])->shouldReturn([$card1, $card2, $card3, $card4]);
    }

}
