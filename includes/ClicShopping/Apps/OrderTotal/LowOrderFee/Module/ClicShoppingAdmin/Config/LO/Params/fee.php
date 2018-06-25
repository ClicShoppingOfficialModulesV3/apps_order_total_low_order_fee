<?php
/*
 * sort_order.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
 
*/

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO\Params;

  class fee extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {

    public $sort_order = 40;
    public $default = '5';
    public $app_configured = true;

//  'use_function' => 'currencies->format',
    protected function init() {
        $this->title = $this->app->getDef('cfg_order_total_low_order_fee_fee_title');
        $this->description = $this->app->getDef('cfg_order_total_low_order_fee_fee_description');
    }
  }
