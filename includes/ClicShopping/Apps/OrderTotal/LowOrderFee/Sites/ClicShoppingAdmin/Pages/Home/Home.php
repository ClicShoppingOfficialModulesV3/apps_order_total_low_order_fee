<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\OrderTotal\LowOrderFee\LowOrderFee;

  class Home extends \ClicShopping\OM\PagesAbstract
  {
    public mixed $app;

    protected function init()
    {
      $CLICSHOPPING_LowOrderFee = new LowOrderFee();
      Registry::set('LowOrderFee', $CLICSHOPPING_LowOrderFee);

      $this->app = $CLICSHOPPING_LowOrderFee;

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
