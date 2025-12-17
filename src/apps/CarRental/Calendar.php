<?php

namespace Hubleto\App\Custom\CarRental;

class Calendar extends \Hubleto\App\Custom\Calendar\Calendar {

  public array $calendarConfig = [
    "title" => "CarRental",
    "addNewActivityButtonText" => "Add new activity linked to CarRental",
    "icon" => "fas fa-calendar",
    "formComponent" => "CarRentalFormActivity"
  ];

  public function loadEvent(int $id): array
  {
    // Implement your functionality for loading single calendar event.
    return [];
  }

  public function loadEvents(string $dateStart, string $dateEnd, array $filter = [], $idUser = 0): array
  {
    // Implement your functionality for loading multiple calendar events.
    return [];
  }

}