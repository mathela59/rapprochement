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
    error_log("Date en entree : ".$date);
    $tab = explode("/",$date);
    error_log("Tableau en sortie : ".print_r($tab,true));
    return $tab[2]."-".$tab[1]."-".$tab[0];
}

function convert_money($montant)
{
    return floatval(str_replace(',','.',$montant));
}