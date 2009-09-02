<?php
class Frisbeebutik_Root extends k_Dispatcher
{
    public $map = array('shop'               => 'Frisbeebutik_Controller_Shop',
                        'handelsbetingelser' => 'Frisbeebutik_Controller_Handelsbetingelser',
                        'kontakt'            => 'Frisbeebutik_Controller_Kontakt',
                        'help'               => 'Frisbeebutik_Controller_Help');
    public $debug = true;
    public $i18n = array(
        'basket' => 'Indk�bskurv'
    );

    public function __construct()
    {
        parent::__construct();
        $this->document->template = dirname(__FILE__) . '/templates/main-tpl.php';
        $this->document->title = 'Discimport.dk';
        $this->document->company_name = 'Discimport.dk I/S';
        $this->document->keywords = 'frisbee, golfdisc, ultimate, disc golf, danmark, sport, freestyle, skoleidr�t, frisbeesalg, frisbeek�b, frisbeegolf, k�b, salg, flying disc';
        $this->document->description = 'Online salg af, frisbee, golfdisc og udstyr til discgolf og ultimate. Danmarks st�rste udvalg til frisbeegolf og ultimatefrisbee';
        $this->document->body_class = '';
        $this->document->main_class = '';
    }

    function forward($name)
    {
        if ($name == 'kontakt' OR $name == 'help' OR $name == 'handelsbetingelser') {
            $class = $this->map[$name];
            $next = new $class($this, $name);
            $content = '<div style="padding: 1em;">'  . $next->handleRequest() . '</div>';
            $this->document->body_class = 'side';
            $this->document->main_class = 'cols3';
            return $this->render('Frisbeebutik/templates/shop-sidebar.tpl.php', array('content' => $content));
        }
        return parent::forward($name);
    }

    public function execute()
    {
        throw new k_http_Redirect($this->url('shop'));
    }

    public function __($phrase)
    {
        if ($this->getLanguage() == 'en') {
            return $phrase;
        }

        if (empty($this->translation)) {

            $this->translation = new Ilib_Translation_Collection;
            $translator = IntrafacePublic_Shop_Translation::factory();
            if (PEAR::isError($translator)) {
                throw new Exception($translator->getMessage());
            }
            $translator->setLang('da');
            $translator = $translator->getDecorator('DefaultText');
            $translator = $translator->getDecorator('UTF8');
            $this->translation->addTranslator($translator);

        }
        // Translation files is in utf-8. Decorator UTF-8 make sure it is returnes in iso-8859-1
        return $this->translation->get(utf8_encode($phrase));
    }

    public function getLanguage()
    {
    	return 'da';
    }

    public function getShop()
    {
        return $this->registry->get('shop');
    }

    public function getNewsletter()
    {
        return $this->registry->get('newsletter');
    }

    public function getOnlinePayment()
    {
        return $this->registry->get('onlinepayment');
    }

    public function getOnlinePaymentAuthorize()
    {
        return $this->registry->get('onlinepayment:authorize');
    }

    public function getBreadcrumpTrail()
    {
        return array(array('name' => 'Shop', 'url' => $this->url('shop')));
    }
}
