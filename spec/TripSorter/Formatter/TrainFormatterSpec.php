<?php

namespace spec\TripSorter\Formatter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TripSorter\BoardingCard\TrainBoardingCardInterface;

class TrainFormatterSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('TripSorter\Formatter\TrainFormatter');
    }

    function it_will_format_train_boarding_card(TrainBoardingCardInterface $card)
    {
        $card->getType()->willReturn("train");
        $card->getFrom()->willReturn("Dublin");
        $card->getTo()->willReturn("London");
        $card->getTripNumber()->willReturn("ABC");
        $card->getSeat()->willReturn("A12");

        $this->format($card)->shouldReturn("Take train ABC from Dublin to London. Sit in seat A12.");
    }

}
