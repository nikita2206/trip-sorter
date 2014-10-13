<?php

namespace spec\TripSorter\Formatter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TripSorter\BoardingCard\FormattableBoardingCardInterface;

class DefaultFormatterSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('TripSorter\Formatter\DefaultFormatter');
    }

    function it_will_format_boarding_card(FormattableBoardingCardInterface $card)
    {
        $card->getType()->willReturn("flight");
        $card->getFrom()->willReturn("Manchester");
        $card->getTo()->willReturn("London");
        $card->getTripNumber()->willReturn("A45");

        $this->format($card)->shouldReturn("Take flight A45 from Manchester to London.");
    }

}
