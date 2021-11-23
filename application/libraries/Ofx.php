<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ofx
{    
	public $ofxFile;   
	public function __construct($ofxFile = array()) 
	{      
		//parent::__construct();  
		$this->ofxFile = $ofxFile['url'];  
		//print_r($this->ofxFile);  
		//exit();
	}    
	/*     * Converte o arquivo OFX para XML     */   
	public function getOfxAsXML() 
	{        
		$content = utf8_decode(file_get_contents($this->ofxFile));        
		$line = strpos($content, "<OFX>");        
		$ofx = substr($content, $line - 1);        
		$buffer = $ofx;        
		$count = 0;   

		while ($pos = strpos($buffer, '<')) 
		{            
			$count++;            
			$pos2 = strpos($buffer, '>');            
			$element = substr($buffer, $pos + 1, $pos2 - $pos - 1);            
			if (substr($element, 0, 1) == '/')                
				$sla[] = substr($element, 1);            
			else                
				$als[] = $element;            
				$buffer = substr($buffer, $pos2 + 1);        
		}        
		$adif = array_diff($als, $sla);        
		$adif = array_unique($adif);        
		$ofxy = $ofx;        
		foreach ($adif as $dif) 
		{            
			$dpos = 0;            
			while ($dpos = strpos($ofxy, $dif, $dpos + 1)) 
			{                
				$npos = strpos($ofxy, '<', $dpos + 1);                
				$ofxy = substr_replace($ofxy, "</$dif>\n<", $npos, 1);               
				$dpos = $npos + strlen($element) + 3;            
			}        
		}        
		$ofxy = str_replace('&', '&', $ofxy);        
		return $ofxy; 
	}    
	
	/*     * Retorna o Saldo da conta na data de exportação do extrato     */    
	public function getBalance() 
	{        
		$xml = new SimpleXMLElement($this->getOfxAsXML());        
		$balance = $xml->BANKMSGSRSV1->STMTTRNRS->STMTRS->LEDGERBAL->BALAMT;        
		$dateOfBalance = $xml->BANKMSGSRSV1->STMTTRNRS->STMTRS->LEDGERBAL->DTASOF;        
		$date = strtotime(substr($dateOfBalance, 0, 8));        
		$dateToReturn = date('Y-m-d', $date);        
		return Array('date' => $dateToReturn, 'balance' => $balance);    
	} 
	
	public function closeTags($ofx=null) {
        $buffer = '';
        $source = fopen($ofx, 'r') or die("Unable to open file!");
        while(!feof($source)) {
            $line = trim(fgets($source));
            if ($line === '') continue;

            if (substr($line, -1, 1) !== '>') {
                list($tag) = explode('>', $line, 2);
                $line .= '</' . substr($tag, 1) . '>';
            }
            $buffer .= $line ."\n";
        }


        $xmlOut =   explode("<OFX>", $buffer);

        //$name = realpath(dirname($ofx)) . '/' . date('Ymd') . '.ofx';
        //$file = fopen($name, "w") or die("Unable to open file!");
        //fwrite($file, $buffer);
        //fclose($file);

        return isset($xmlOut[1])?"<OFX>".$xmlOut[1]:$buffer;
    }
	
	/*     * Retora um array de objetos com as transações     *      
		   * DTPOSTED => Data da Transação     
		   * TRNAMT   => Valor da Transação     
		   * TRNTYPE  => Tipo da Transação (Débito ou Crédito)     
		   * MEMO     => Descrição da transação     
	*/    
	
	public function getTransactions() 
	{        
		//$xml = new SimpleXMLElement($this->getOfxAsXML());    
		$retorno = new SimpleXMLElement(utf8_encode($this->closeTags($this->ofxFile)));    
		
		$transactions = $retorno->BANKMSGSRSV1->STMTTRNRS->STMTRS->BANKTRANLIST->STMTTRN;        
		return $transactions;    
	}
}