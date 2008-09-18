<?php
class Frisbeebutik_Root extends k_Dispatcher
{
    public $map = array('shop'               => 'IntrafacePublic_Shop_Controller_Index',
                        'handelsbetingelser' => 'Frisbeebutik_Controller_Handelsbetingelser',
                        'kontakt'            => 'Frisbeebutik_Controller_Kontakt',
                        'help'               => 'Frisbeebutik_Controller_Help');
    public $debug = true;
    public $i18n = array(
        'basket' => 'Indkøbskurv'
    );

    public function __construct()
    {
        parent::__construct();
        $this->document->template = dirname(__FILE__) . '/templates/main-tpl.php';
        $this->document->title = 'Discimport.dk';
        $this->document->company_name = 'Discimport.dk I/S';        
    }

    public function execute()
    {
        throw new k_http_Redirect($this->url('shop'));
    }

    public function __($phrase)
    {
        $translation = new Frisbeebutik_Translation;
        return $translation->get($phrase);
    }
    
    public function getShop()
    {
        return $this->registry->get('shop');
    }
}
