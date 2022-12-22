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

  class fee extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract
  {

    public ?int $sort_order = 40;
    public $default = '5';
    public bool $app_configured = true;

//  'use_function' => 'currencies->format',
    protected function init()
    {
      $this->title = $this->app->getDef('cfg_order_total_low_order_fee_fee_title');
      $this->description = $this->app->getDef('cfg_order_total_low_order_fee_fee_description');
    }
  }
