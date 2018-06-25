<?php
  /*
   * status.php
   * @copyright Copyright 2008 - http://www.innov-concept.com
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @license GPL 2 License & MIT Licencse

  */


  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO\Params;

  use ClicShopping\OM\HTML;

  class low_order_fee extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {
    public $default = 'False';
    public $sort_order = 20;

    protected function init() {
      $this->title = $this->app->getDef('cfg_order_total_low_order_fee_low_order_fee_title');
      $this->description = $this->app->getDef('cfg_order_total_low_order_fee_low_order_fee_description');
    }

    public function getInputField()  {
      $value = $this->getInputValue();

      $input =  HTML::radioField($this->key, 'True', $value, 'id="' . $this->key . '1" autocomplete="off"') . $this->app->getDef('cfg_order_total_low_order_fee_low_order_fee_true') . ' ';
      $input .=  HTML::radioField($this->key, 'False', $value, 'id="' . $this->key . '2" autocomplete="off"') . $this->app->getDef('cfg_order_total_low_order_fee_low_order_fee_false');

      return $input;
    }
  }