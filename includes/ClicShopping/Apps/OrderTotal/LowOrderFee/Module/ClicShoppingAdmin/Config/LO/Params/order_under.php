<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO\Params;

  class order_under extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract
  {

    public ?int $sort_order = 30;
    public $default = '50';
    public bool $app_configured = true;

//currencies->format
    protected function init()
    {
      $this->title = $this->app->getDef('cfg_order_total_low_order_fee_order_under_title');
      $this->description = $this->app->getDef('cfg_order_total_low_order_fee_order_under_description');
    }
  }
