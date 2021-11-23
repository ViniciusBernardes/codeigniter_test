<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Remove{

    function  __construct()
    {

    }//fim construtor


	function apaga_files_all($dir, $name)
	{
		$dir = substr($_SERVER['SCRIPT_FILENAME'],0,-9).$dir;
		if(is_dir($dir))
		{
			if($handle = opendir($dir))
			{
				while(($file = readdir($handle)) !== false)
				{
					if($file != '.' && $file != '..')
					{
						unlink($dir.$file);
					}
				}
			}
			return true;
		}
		else
		{
			//die("Erro ao abrir dir: $dir");
			return false;
		}
	}
	
	function apaga_files($dir, $name)
	{
		$dir = substr($_SERVER['SCRIPT_FILENAME'],0,-9).$dir.'/';
		//echo $dir.$name;
		if(is_file($dir.$name))
		{
			if(is_dir($dir))
			{
				
				if(unlink($dir.$name))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				//die("Erro ao abrir dir: $dir");
				return false;
			}
		}
	}

}
?>