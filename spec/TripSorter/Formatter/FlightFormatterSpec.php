<?php

namespace spec\TripSorter\Formatter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TripSorter\BoardingCard\FlightBoardingCardInterface;

class FlightFormatterSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('TripSorter\Formatter\FlightFormatter');
    }

    function it_will_format_flight_boarding_card(FlightBoardingCardInterface $card)
    {
        $card->getType()->willReturn("flight");
        $card->getFrom()->willReturn("Moscow");
        $card->getTo()->willReturn("Dubai");
        $card->getTripNumber()->willReturn("Q123");
        $card->getGate()->willReturn("F9");
        $card->getSeat()->willReturn("A3");
        $card->getBaggageInformation()->willReturn("Baggage drop at ticket counter 344.");

        $this->format($card)->shouldReturn("From Moscow, take flight Q123 to Dubai. Gate F9, seat A3. Baggage drop at ticket counter 344.");
    }

}
