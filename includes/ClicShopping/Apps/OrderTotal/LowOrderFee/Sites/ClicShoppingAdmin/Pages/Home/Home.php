<?php
/*
 * Home.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse

*/

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\OrderTotal\LowOrderFee\LowOrderFee;

  class Home extends \ClicShopping\OM\PagesAbstract {
    public $app;

    protected function init() {
      $CLICSHOPPING_LowOrderFee = new LowOrderFee();
      Registry::set('LowOrderFee', $CLICSHOPPING_LowOrderFee);

      $this->app = $CLICSHOPPING_LowOrderFee;

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
