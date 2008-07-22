<?php
class Frisbeebutik_Translation extends IntrafacePublic_Shop_Translation
{
    function get($string)
    {
        return utf8_decode(parent::get($string));
    }
}