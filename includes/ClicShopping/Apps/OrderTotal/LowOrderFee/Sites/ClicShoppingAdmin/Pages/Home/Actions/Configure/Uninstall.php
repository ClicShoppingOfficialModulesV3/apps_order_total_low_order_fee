<?php
/*
 * Uninstall.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
*/

  namespace ClicShopping\Apps\OrderTotal\LowOrderFee\Sites\ClicShoppingAdmin\Pages\Home\Actions\Configure;

  use ClicShopping\OM\Registry;

  class Uninstall extends \ClicShopping\OM\PagesActionsAbstract {

    public function execute() {

      $CLICSHOPPING_MessageStack = Registry::get('MessageStack');
      $CLICSHOPPING_LowOrderFee = Registry::get('LowOrderFee');

      $current_module = $this->page->data['current_module'];

      $m = Registry::get('LowOrderFeeAdminConfig' . $current_module);
      $m->uninstall();

      $CLICSHOPPING_MessageStack->add($CLICSHOPPING_LowOrderFee->getDef('alert_module_uninstall_success'), 'success', 'LowOrderFee');

      $CLICSHOPPING_LowOrderFee->redirect('Configure&module=' . $current_module);
    }
  }