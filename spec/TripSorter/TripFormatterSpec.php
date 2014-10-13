<?php

namespace spec\TripSorter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TripSorter\BoardingCard\FormattableBoardingCardInterface;
use TripSorter\Formatter\BoardingCardFormatterInterface;

class TripFormatterSpec extends ObjectBehavior
{


    function let(BoardingCardFormatterInterface $defaultFormatter, BoardingCardFormatterInterface $customFormatter)
    {
        $this->beConstructedWith($defaultFormatter, ['custom' => $customFormatter]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TripSorter\TripFormatter');
    }

    function it_will_format_trips(BoardingCardFormatterInterface $defaultFormatter, BoardingCardFormatterInterface $customFormatter,
                                  FormattableBoardingCardInterface $card1, FormattableBoardingCardInterface $card2)
    {
        $card1->getTripNumber()->willReturn("78A");
        $card1->getFrom()->willReturn("Madrid");
        $card1->getTo()->willReturn("Barcelona");
        $card1->getType()->willReturn("anything");

        $card2->getTripNumber()->willReturn("123");
        $card2->getFrom()->willReturn("Gerona");
        $card2->getTo()->willReturn("Stockholm");
        $card2->getType()->willReturn("custom");

        $defaultFormatter->format($card1)->shouldBeCalled()->willReturn("From Madrid to Barcelona");
        $customFormatter->format($card2)->shouldBeCalled()->willReturn("From Gerona to Stockholm");

        $this->format([$card1, $card2])->shouldReturn(["From Madrid to Barcelona", "From Gerona to Stockholm"]);
    }

}
