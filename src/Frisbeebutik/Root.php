<?php
class Frisbeebutik_Root extends k_Dispatcher
{
    public $map = array('shop'               => 'Frisbeebutik_Controller_Shop',
    					'frontpage'          => 'Frisbeebutik_Controller_Index',
                        'newsletter'         => 'IntrafacePublic_Newsletter_Controller_Index'
    );
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
        $this->document->body_class = '';
        $this->document->main_class = '';
    }

    function forward($name)
    {
        if ($name == 'newsletter') {
            return '<div style="padding: 1em;">' . parent::forward($name) . '</div>';
        }

        if (!isset($this->map[$name])) {
            $page = $this->getCMS()->getPage($name);

            if (!empty($page['http_header_status']) AND $page['http_header_status'] == 'HTTP/1.0 404 Not Found') {
                throw new k_http_Response(404);
            }

            $html = new IntrafacePublic_CMS_HTML_Parser($page);
            $sections = $html->getSection('body');

            $out = '';

            foreach ($sections['elements'] as $element) {
                $out .= $element['html'];
            }
            return '<div style="padding: 1em;">' . $out . '</div>';
        }

        return parent::forward($name);
    }

    public function execute()
    {
        throw new k_http_Redirect($this->url('frontpage'));
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

    public function getCMS()
    {
        return $this->registry->get('cms');
    }

    public function getBreadcrumpTrail()
    {
        return array(array('name' => 'Shop', 'url' => $this->url('shop')));
    }

    public function getNewProducts()
    {
        $news_id = 265;
        return $this->getShop()->getProductsWithKeywordId($news_id);
    }
}
