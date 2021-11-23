<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datas {

    //**************************************************************************
    function EnToBr($dt)
    {
		if($dt != '' && $dt != 0)
		{
			$d = explode('-', $dt);
			return ($d[2].'/'.$d[1].'/'.$d[0]);
		}
		else
		{
			return "";
		}
    }//fim EnToBr
    //**************************************************************************
    function BrToEn_1($dt)
    {
        $d = explode('-', $dt);

        return ($d[2].'-'.$d[1].'-'.$d[0]);
    }//fim EnToBr
    //**************************************************************************
	
	function BrToEn($dt)
    {
		if($dt != '' && $dt != 0)
		{
			$d = explode('/', $dt);
			return ($d[2].'-'.$d[1].'-'.$d[0]);
		}
		else
		{
			return "";
		}
    }//fim EnToBr
    //**************************************************************************
	
	function en_br_timestamp($dt)
    {
		if($dt != '' && $dt != 0)
		{
			$datas = explode(' ', $dt);
			$d = explode('-', $datas[0]);
			return ($d[2].'/'.$d[1].'/'.$d[0].' '.$datas[1]);
		}
		else
		{
			return '';
		}
    }//fim EnToBr
	
	function en_br_timestamp2($dt)
    {
		if($dt != '' && $dt != 0)
		{
			$datas = explode(' ', $dt);
			$d = explode('-', $datas[0]);
			return ($d[2].'/'.$d[1].'/'.$d[0]);
		}
		else
		{
			return '';
		}
    }//fim EnToBr
	
	function mesReferencia($dt)
    {
		if($dt != '' && $dt != 0)
		{
			$d = explode('-', $dt);
			return ($d[1].'/'.$d[0]);
		}
		else
		{
			return "";
		}
    }//fim EnToBr
}