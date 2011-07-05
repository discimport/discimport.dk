<?php
class Frisbeebutik_Newsletter
{
    protected $mailchimp;
    
    function __construct($mailchimp, $list_id)
    {
        $this->mailchimp = $mailchimp;
        $this->list_id = $list_id;
    }
    
    function subscribe($email, $name = '', $ip = '')
    {
        return $this->mailchimp->listSubscribe($this->list_id, $email, NULL, 'html', true, true, false, true);
    }
}

