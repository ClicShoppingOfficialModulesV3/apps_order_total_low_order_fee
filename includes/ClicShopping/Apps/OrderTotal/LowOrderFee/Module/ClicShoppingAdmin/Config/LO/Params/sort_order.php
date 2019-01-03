<?php
/**
 *
 *  @copyright 2008 - https://www.clicshopping.org
 *  @Brand : ClicShopping(Tm) at Inpi all right Reserved
 *  @Licence GPL 2 & MIT
 *  @licence MIT - Portion of osCommerce 2.4
 *  @Info : https://www.clicshopping.org/forum/trademark/
 *
 */

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO\Params;

  class sort_order extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {

    public $default = '1000';
    public $app_configured = false;

    protected function init() {
        $this->title = $this->app->getDef('cfg_order_total_low_order_fee_sort_order_title');
        $this->description = $this->app->getDef('cfg_order_total_low_order_fee_sort_order_description');
    }
  }
