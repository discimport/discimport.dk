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

    function __construct()
    {
        parent::__construct();
        $this->document->template = dirname(__FILE__) . '/templates/main-tpl.php';
        $this->document->title = 'Discimport.dk';
    }

    function execute()
    {
        throw new k_http_Redirect($this->url('shop'));
    }

    function __($phrase)
    {
        $translation = new Frisbeebutik_Translation;
        return $translation->get($phrase);
    }
}
