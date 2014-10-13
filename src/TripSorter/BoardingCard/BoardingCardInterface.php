<?php

namespace TripSorter\BoardingCard;

interface BoardingCardInterface
{

    /**
     * @return string
     */
    public function getFrom();

    /**
     * @return string
     */
    public function getTo();

}
