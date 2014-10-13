
Trip sorter solution
====================

In order to sort boarding cards you need to use TripSorter\TripSorter::sort() method and pass it an array
 of BoardingCardInterface instances:
```php
$sorter = new TripSorter();

var_dump($sorter->sort([
    new BoardingCard("flight", "Stockholm", "New York JFK", "SK22"),
    new BoardingCard("train",  "Madrid",    "Barcelona",    "78A"),
    new BoardingCard("flight", "Gerona",    "Stockholm",    "SK455"),
    new BoardingCard("bus",    "Barcelona", "Gerona",       "Q66")
]));
```

To sort the elements we first pop one element from the array (and put it in `$sorted` array that we are going to return later)
  and then search for its predecessor and successor. When we find one - we remove it from the array and put it in
  `$sorted` (either to the beginning or ending). After first iteration we do the same thing but now we are trying to
  find predecessor for the first element in `$sorted` and successor for the last one.

The worst case scenario can be when the element that we pop in the beginning is actually first or last leg of the trip
  and all other elements are ordered how they actually should be but in the descended way. In this case outer loop will
  make exactly `(N - 1)` iterations and inner loop will make `(N - 1 - NumberOfOuterLoopIteration)`. Which means that on
  each outer iteration inner loop will make one less iteration, so big O complexity is:
  [`(N - 1)^2 - TriangularNumber(N - 1) = (N - 1)^2 - ((N - 1)^2 + (N - 1))/2 = ((N - 1)^2 - (N - 1))/2`](http://www.wolframalpha.com/input/?i=%28%28N+-+1%29%5E2+-+%28N+-+1%29%29%2F2)


TripSorter is separated from TripFormatter, if you want to format a list of boarding cards as a list of strings you
  need to call TripSorter\TripFormatter::format() and pass it an array of FormattableBoardingCardInterface instances.

Tests
-----

To run the tests first initialize vendor libraries `composer install --prefer-dist --dev` and then run `./bin/phpspec run`.
