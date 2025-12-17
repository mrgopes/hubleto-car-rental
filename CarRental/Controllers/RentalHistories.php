<?php

namespace Hubleto\App\Custom\CarRental\Controllers;

class RentalHistories extends \Hubleto\Erp\Controller
{

  public function getBreadcrumbs(): array
  {
    return array_merge(parent::getBreadcrumbs(), [
      [ 'url' => '', 'content' => 'Rental History' ],
    ]);
  }

  public function prepareView(): void
  {
    parent::prepareView();
    $this->setView('@Hubleto:App:Custom:CarRental/RentalHistories.twig');
  }

}