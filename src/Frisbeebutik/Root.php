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
        $this->document->keywords = 'frisbee, golfdisc, ultimate, disc golf, danmark, sport, freestyle, skoleidræt, frisbeesalg, frisbeekøb, frisbeegolf, køb, salg, flying disc';
        $this->document->description = 'Online salg af, frisbee, golfdisc og udstyr til discgolf og ultimate. Danmarks største udvalg til frisbeegolf og ultimatefrisbee';
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

    public function getNewsletter()
    {
        return $this->registry->get('newsletter');
    }
    
    public function getBreadcrumpTrail()
    {
        return array(array('name' => 'Shop', 'url' => $this->url('shop')));
    }
}
