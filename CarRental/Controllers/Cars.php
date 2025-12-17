<?php

namespace Hubleto\App\Custom\CarRental\Controllers;

class Cars extends \Hubleto\Erp\Controller
{

  public function getBreadcrumbs(): array
  {
    return array_merge(parent::getBreadcrumbs(), [
      [ 'url' => '', 'content' => 'Cars' ],
    ]);
  }

  public function prepareView(): void
  {
    parent::prepareView();
    $this->setView('@Hubleto:App:Custom:CarRental/Cars.twig');
  }

}