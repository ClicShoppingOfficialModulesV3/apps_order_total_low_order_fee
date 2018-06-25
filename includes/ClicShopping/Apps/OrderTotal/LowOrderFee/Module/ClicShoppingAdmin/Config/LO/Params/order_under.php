<?php
/*
 * sort_order.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse

*/

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO\Params;

  class order_under extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {

    public $sort_order = 30;
    public $default = '50';
    public $app_configured = true;
//currencies->format
    protected function init() {
        $this->title = $this->app->getDef('cfg_order_total_low_order_fee_order_under_title');
        $this->description = $this->app->getDef('cfg_order_total_low_order_fee_order_under_description');
    }
  }
