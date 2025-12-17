<?php

namespace Hubleto\App\Custom\CarRental\Extendibles;

class AppMenu extends \Hubleto\Framework\Extendible
{

  // Add your app's menu items here

  public function getItems(): array
  {
    return [
      [
        'app' => $this->app,
        'url' => 'cars',
        'title' => $this->app->translate('Cars'),
        'icon' => 'fas fa-car',
      ],
      [
        'app' => $this->app,
        'url' => 'cars/rental-history',
        'title' => $this->app->translate('Rental History'),
        'icon' => 'fas fa-clock-rotate-left',
      ],
    ];
  }

  // Hint: Search for 'collectExtendibles' in the codebase to learn
  // what kind of integrations are available.

}