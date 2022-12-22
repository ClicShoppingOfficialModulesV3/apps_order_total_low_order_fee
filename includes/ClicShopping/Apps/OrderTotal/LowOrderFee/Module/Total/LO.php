<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\Total;

  use ClicShopping\OM\Registry;

  use ClicShopping\Sites\Common\B2BCommon;

  use ClicShopping\Apps\OrderTotal\LowOrderFee\LowOrderFee as LowOrderFeeApp;

  use ClicShopping\Sites\Shop\Tax;

  class LO implements \ClicShopping\OM\Modules\OrderTotalInterface
  {
    public string $code;
    public $title;
    public $description;
    public $enabled;
    public $group;
    public $output;
    public ?int $sort_order = 0;
    public mixed $app;
    public $surcharge;
    public $maximum;
    public $signature;
    public $public_title;
    protected $api_version;

    public function __construct()
    {

      if (!Registry::exists('LowOrderFee')) {
        Registry::set('LowOrderFee', new LowOrderFeeApp());
      }

      $this->app = Registry::get('LowOrderFee');
      $this->app->loadDefinitions('Module/Shop/LO/LO');

      $this->signature = 'Low Order Fee|' . $this->app->getVersion() . '|1.0';
      $this->api_version = $this->app->getApiVersion();

      $this->code = 'LO';
      $this->title = $this->app->getDef('module_lo_title');
      $this->public_title = $this->app->getDef('module_lo_public_title');

      $this->enabled = \defined('CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_STATUS') && (CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_STATUS == 'True') ? true : false;

      $this->sort_order = \defined('CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_SORT_ORDER') && ((int)CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_SORT_ORDER > 0) ? (int)CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_SORT_ORDER : 0;

      $this->output = [];
    }

    public function process()
    {

      $CLICSHOPPING_Currencies = Registry::get('Currencies');
      $CLICSHOPPING_Order = Registry::get('Order');
      $CLICSHOPPING_Tax = Registry::get('Tax');

      if (CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_LOW_ORDER_FEE == 'True') {
        switch (CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_DESTINATION) {
          case 'national':
            if ($CLICSHOPPING_Order->delivery['country_id'] == STORE_COUNTRY) $pass = true;
            break;
          case 'international':
            if ($CLICSHOPPING_Order->delivery['country_id'] != STORE_COUNTRY) $pass = true;
            break;
          case 'both':
            $pass = true;
            break;
          default:
            $pass = false;
            break;
        }

        if (($pass === true) && (($CLICSHOPPING_Order->info['total'] - $CLICSHOPPING_Order->info['shipping_cost']) < CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_ORDER_UNDER)) {
          $tax = $CLICSHOPPING_Tax->getTaxRate(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_TAX_CLASS, $CLICSHOPPING_Order->delivery['country']['id'], $CLICSHOPPING_Order->delivery['zone_id']);
          $tax_description = $CLICSHOPPING_Tax->getTaxRateDescription(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE, $CLICSHOPPING_Order->delivery['country']['id'], $CLICSHOPPING_Order->delivery['zone_id']);

          $CLICSHOPPING_Order->info['tax'] += $CLICSHOPPING_Tax->calculate(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE, $tax);
          $CLICSHOPPING_Order->info['tax_groups']["$tax_description"] += $CLICSHOPPING_Tax->calculate(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE, $tax);
          $CLICSHOPPING_Order->info['total'] += CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE + $CLICSHOPPING_Tax->calculate(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE, $tax);

          $this->output[] = array('title' => $this->title . ':',
            'text' => $CLICSHOPPING_Currencies->format(Tax::addTax(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE, $tax), true, $CLICSHOPPING_Order->info['currency'], $CLICSHOPPING_Order->info['currency_value']),
            'value' => Tax::addTax(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_FEE, $tax));
        }
      }
    }

    public function check()
    {
      return \defined('CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_STATUS') && (trim(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_STATUS) != '');
    }

    public function install()
    {
      $this->app->redirect('Configure&Install&module=LO');
    }

    public function remove()
    {
      $this->app->redirect('Configure&Uninstall&module=LO');
    }

    public function keys()
    {
      return array('CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_SORT_ORDER');
    }
  }
