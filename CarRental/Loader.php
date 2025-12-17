<?php

namespace Hubleto\App\Custom\CarRental;

class Loader extends \Hubleto\Framework\App
{

  // Uncomment following if you want a button for app's settings
  // to be rendered next in sidebar, right next to your app's button.
  // public bool $hasCustomSettings = true;

  // init
  public function init(): void
  {
    parent::init();

    // Add app routes.
    // By default, each app should have a welcome dashboard.
    // If your app will have own settings panel, it should be under the `settings/your-app` slug.
    $this->router()->get([
      '/^cars\/?$/' => Controllers\Cars::class,
      '/^cars\/rental-history\/?$/' => Controllers\RentalHistories::class,
    ]);

    // DO NOT DELETE FOLLOWING LINE, OR `php hubleto` WILL NOT GENERATE CODE HERE
    //@hubleto-cli:routes

    // Add placeholder for Custom settings.
    // This will be displayed in the Settings app, under the "All settings" card.
    // $settingsApp = $this->appManager()->getApp(\Hubleto\App\Custom\Settings\Loader::class);
    // $settingsApp->addSetting($this, [
    //   'title' => 'Car Rental', // or $this->translate('CarRental')
    //   'icon' => 'fas fa-table',
    //   'url' => 'settings/car-rental',
    // ]);

    // Uncomment following if your app will provide own calendar.
    // /** @var \Hubleto\App\Custom\Calendar\Manager $calendarManager */
    // $calendarManager = $this->getService(\Hubleto\App\Custom\Calendar\Manager::class);
    // $calendarManager->addCalendar(
    //   $this, // reference to this app
    //   'CarRental-calendar', // UID of your app's calendar. Will be referenced as "source" when fetching app's events.
    //   '#008000', // your app's calendar color
    //   Calendar::class // your app's Calendar class
    // );

    // Uncomment following to configure your app's menu.
    // $appMenu = $this->getService(\Hubleto\App\Community\Desktop\AppMenuManager::class);
    // $appMenu->addItem($this, 'cars', $this->translate('Cars'), 'fas fa-table');
    // $appMenu->addItem($this, 'cars/rental-history', $this->translate('Rental-history'), 'fas fa-list');
  }

  // installTables
  public function installTables(int $round): void
  {
    if ($round == 1) {
      // install your models here
      // Example: $this->getModel(Models\Contact::class)->dropTableIfExists()->install();
      $mCar = $this->getModel(Models\Car::class);
      $mRentalHistory = $this->getModel(Models\RentalHistory::class);

      $mCar->dropTableIfExists()->install();
      $mRentalHistory->dropTableIfExists()->install();

      $mCar->record->recordCreate(["manufacturer" => "Toyota", "model" => "Corolla", "licence_plate" => "ABC-1234", "fuel" => 2, "gearbox" => 1, "seats" => 5, "price_per_day" => 45, "color" => "White", "availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Honda", "model" => "Civic", "licence_plate" => "HDX-2291", "fuel" => 2, "gearbox" => 2, "seats" => 5, "price_per_day" => 50, "color" => "Black", "availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Ford","model" => "Focus","licence_plate" => "FOC-9043","fuel" => 1,"gearbox" => 1,"seats" => 5,"price_per_day" => 48,"color" => "Blue","availability" => false]);
      $mCar->record->recordCreate(["manufacturer" => "BMW","model" => "320i","licence_plate" => "BMW-7742","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 120,"color" => "Grey","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Audi","model" => "A4","licence_plate" => "AUD-5521","fuel" => 1,"gearbox" => 1,"seats" => 5,"price_per_day" => 110,"color" => "White","availability" => false]);
      $mCar->record->recordCreate(["manufacturer" => "Mercedes","model" => "C200","licence_plate" => "MER-1830","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 130,"color" => "Silver","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Volkswagen","model" => "Golf","licence_plate" => "VWG-6249","fuel" => 1,"gearbox" => 2,"seats" => 5,"price_per_day" => 55,"color" => "Red","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Hyundai","model" => "Elantra","licence_plate" => "HYN-9082","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 40,"color" => "Blue","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Kia","model" => "Rio","licence_plate" => "KIA-4312","fuel" => 2,"gearbox" => 2,"seats" => 5,"price_per_day" => 38,"color" => "Black","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Nissan","model" => "Sentra","licence_plate" => "NSN-2943","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 42,"color" => "Grey","availability" => false]);
      $mCar->record->recordCreate(["manufacturer" => "Chevrolet","model" => "Malibu","licence_plate" => "CHV-4410","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 52,"color" => "White","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Tesla","model" => "Model 3","licence_plate" => "TSL-0093","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 150,"color" => "Red","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Volvo","model" => "S60","licence_plate" => "VLV-2290","fuel" => 1,"gearbox" => 1,"seats" => 5,"price_per_day" => 95,"color" => "Black","availability" => false]);
      $mCar->record->recordCreate(["manufacturer" => "Mazda","model" => "Mazda3","licence_plate" => "MZD-7177","fuel" => 2,"gearbox" => 2,"seats" => 5,"price_per_day" => 47,"color" => "Blue","availability" => true]);
      $mCar->record->recordCreate(["manufacturer" => "Subaru","model" => "Impreza","licence_plate" => "SBR-8712","fuel" => 2,"gearbox" => 1,"seats" => 5,"price_per_day" => 60,"color" => "Silver","availability" => true]);


      // DO NOT DELETE FOLLOWING LINE, OR `php hubleto` WILL NOT GENERATE CODE HERE
      //@hubleto-cli:install-tables
    }
    if ($round == 2) {
      // do something in the 2nd round, if required
    }
    if ($round == 3) {
      // do something in the 3rd round, if required
    }
  }

  // generateDemoData
  public function generateDemoData(): void
  {
    // Create any demo data to promote your app.
  }
}
