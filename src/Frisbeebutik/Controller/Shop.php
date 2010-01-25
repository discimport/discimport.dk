<?php
class Frisbeebutik_Controller_Shop extends IntrafacePublic_Shop_Controller_Index
{
    function GET()
    {
        throw new k_Http_Redirect($this->url('products'));
    }

    function forward($name)
    {
       if ($name == 'products') {
            $this->document->body_class = 'side';
            $this->document->main_class = 'cols3';
            $next = new IntrafacePublic_Shop_Controller_Products($this, $name);
            $content = $next->handleRequest();
            $data = array('content' => $content, 'products' => $this->context->getNewProducts());
            return $this->render('Frisbeebutik/templates/shop-sidebar.tpl.php', $data);
       } elseif ($name == 'product') {
            $this->document->body_class = 'side';
            $this->document->main_class = 'cols3';
            $next = new IntrafacePublic_Shop_Controller_Product($this, $name);
            $content = $next->handleRequest();
            $data = array('content' => $content, 'products' => $this->context->getNewProducts());

            return $this->render('Frisbeebutik/templates/shop-sidebar.tpl.php', $data);
       } elseif ($name == 'basket') {
            $this->document->body_class = 'cart';
            $this->document->main_class = 'cols3';
            $next = new IntrafacePublic_Shop_Controller_Basket($this, $name);
            $content = $next->handleRequest();
            $data = array('content' => $content, 'products' => $this->context->getNewProducts());

            return $this->render('Frisbeebutik/templates/shop-basket-sidebar.tpl.php', $data);
       }

       return parent::forward($name);
    }
}
