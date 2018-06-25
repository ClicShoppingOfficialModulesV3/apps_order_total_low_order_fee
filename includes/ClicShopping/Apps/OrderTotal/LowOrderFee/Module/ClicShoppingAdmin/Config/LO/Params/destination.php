<?php
  /*
   * destination.php
   * @copyright Copyright 2008 - http://www.innov-concept.com
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @license GPL 2 License & MIT Licencse

  */


  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO\Params;

  use ClicShopping\OM\HTML;

  class destination extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {
    public $default = 'True';
    public $sort_order = 60;
//    public $set_func = 'clic_cfg_set_tax_classes_pull_down_menu';

    protected function init() {
      $this->title = $this->app->getDef('cfg_order_total_low_order_fee_destination_title');
      $this->description = $this->app->getDef('cfg_order_total_low_order_fee_destination_description');
    }

    public function getInputField() {

      $dropdown = array(array('id' =>'national', 'text' => $this->app->getDef('cfg_order_total_low_order_fee_destination_national')),
                       array('id' =>'international', 'text' => $this->app->getDef('cfg_order_total_low_order_fee_destination_international')),
                       array('id' =>'both' , 'text' => $this->app->getDef('cfg_order_total_low_order_fee_destination_both')),
                      );

      $input = HTML::selectField($this->key, $dropdown, $this->getInputValue());

      return $input;
    }
  }