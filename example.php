<?php

use TripSorter\TripSorter;
use TripSorter\TripFormatter;
use TripSorter\Formatter as F;
use TripSorter\BoardingCard as B;

require __DIR__ . "/vendor/autoload.php";


$sorter = new TripSorter();
$formatter = new TripFormatter(new F\DefaultFormatter(), [
    B\FormattableBoardingCardInterface::TYPE_FLIGHT => new F\FlightFormatter(),
    B\FormattableBoardingCardInterface::TYPE_TRAIN  => new F\TrainFormatter()
]);

$cards = [
    new B\FlightBoardingCard("Stockholm", "New York JFK", "SK22", "22", "7B", "Baggage will be automatically transferred from your last leg."),
    new B\BoardingCard(B\FormattableBoardingCardInterface::TYPE_BUS, "Barcelona", "Gerona", "Q56"),
    new B\FlightBoardingCard("Gerona", "Stockholm", "SK455", "45B", "3A", "Baggage drop at ticket counter 344."),
    new B\TrainBoardingCard("Madrid", "Barcelona", "78A", "45B")
];

$sorted = $sorter->sort($cards);
$formatted = $formatter->format($sorted);

echo " * " . implode("\n * ", $formatted);
