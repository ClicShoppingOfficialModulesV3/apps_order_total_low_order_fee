<?php
  /**
   *
   * @copyright 2008 - https://www.clicshopping.org
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @Licence GPL 2 & MIT

   * @Info : https://www.clicshopping.org/forum/trademark/
   *
   */

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\LO;

  class LO extends \ClicShopping\Apps\OrderTotal\LowOrderFee\Module\ClicShoppingAdmin\Config\ConfigAbstract
  {

    protected $pm_code = 'LowOrderFee';

    public bool $is_uninstallable = true;
    public ?int $sort_order = 400;

    protected function init()
    {
      $this->title = $this->app->getDef('module_lo_title');
      $this->short_title = $this->app->getDef('module_lo_short_title');
      $this->introduction = $this->app->getDef('module_lo_introduction');
      $this->is_installed = \defined('CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_STATUS') && (trim(CLICSHOPPING_APP_ORDER_TOTAL_LOW_ORDER_FEE_LO_STATUS) != '');
    }

    public function install()
    {
      parent::install();

      if (\defined('MODULE_ORDER_TOTAL_INSTALLED')) {
        $installed = explode(';', MODULE_ORDER_TOTAL_INSTALLED);
      }

      $installed[] = $this->app->vendor . '\\' . $this->app->code . '\\' . $this->code;

      $this->app->saveCfgParam('MODULE_ORDER_TOTAL_INSTALLED', implode(';', $installed));
    }

    public function uninstall()
    {
      parent::uninstall();

      $installed = explode(';', MODULE_ORDER_TOTAL_INSTALLED);
      $installed_pos = array_search($this->app->vendor . '\\' . $this->app->code . '\\' . $this->code, $installed);

      if ($installed_pos !== false) {
        unset($installed[$installed_pos]);

        $this->app->saveCfgParam('MODULE_ORDER_TOTAL_INSTALLED', implode(';', $installed));
      }
    }
  }