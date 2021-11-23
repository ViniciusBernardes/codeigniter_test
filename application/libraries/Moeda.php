<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moeda
{
	public function format_valor($valor)
	{
		return number_format($valor, 2, ',','.');
	}
	
	public function trata_valor($valor)
	{
		return str_replace(",",".",str_replace(".","",$valor));;
	}
}