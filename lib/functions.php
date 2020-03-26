<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 23/01/20
 * Time: 16:57
 */

function convert( $str ) {
    return iconv( "Windows-1252", "UTF-8", $str );
}

function convert_date($date)
{
    $tab = explode("/",$date);
    return $tab[2]."-".$tab[1]."-".$tab[0];
}

function convert_money($montant)
{
    return floatval(str_replace(',','.',$montant));
}