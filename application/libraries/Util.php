<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Util {

    //**************************************************************************
    function tipo_servico($tipo)
	{
		switch ($tipo) 
		{
			case 'Vandalismo':
				$rest = "Vandalismo";
				break;
			case 'Porta':
				$rest = "Porta (regulagem ou mola)";
				break;
			case 'Vidro':
				$rest = "Vidro Quebrado";
				break;
			case 'Infiltracao':
				$rest = "Infiltração";
				break;
			case 'Pintura':
				$rest = "Pintura em Geral";
				break;
			case 'Piso_elevado':
				$rest = "Piso Elevado";
				break;
			case 'Piso_vinilico':
				$rest = "Piso Vinílico";
				break;
			case 'carpete_caparao':
				$rest = "Carpete Caparaó";
				break;
			case 'carpete_durafelt':
				$rest = "Carpete Durafelt";
				break;
			case 'material_banco_mesada':
				$rest = "Material Fornecido Pelo Banco - MESADA";
				break;
			case 'material_banco':
				$rest = "Material Fornecido Pelo Banco - TOTEM OU CVE";
				break;
			case 'ar_condicionado':
				$rest = "Ar Condicionado";
				break;
			case 'eletrica':
				$rest = "Elétrica";
				break;
			case 'hidraulica':
				$rest = "Hidráulica";
				break;
			case 'outros_civil':
				$rest = "Outros Serviços Civil";
				break;
			default: $rest = "Sem tipo de serviço";
		}
		
		return $rest;
	}
	
	function regiao($regiao)
	{
		switch (strtoupper($regiao)) 
		{
			case 'NORTE':
				$rest = "Norte de Minas";
				break;
			case 'GRANDE BH':
				$rest = "Grande BH";
				break;
			case 'TRIANGULO MINEIRO':
				$rest = "Triângulo Mineiro";
				break;
			case 'ESPIRITO SANTO':
				$rest = "Espírito Santo";
				break;
			default: $rest = "Agencia sem rota";
		}
		
		return strtoupper($rest);
	}

	function rota($regiao)
	{
		switch (strtoupper($regiao)) 
		{
			case 'MOC':
				$rest = "Montes Claros";
				break;
			case 'BH':
				$rest = "BH - Antoniel e Paulo Roberto";
				break;
			case '7L':
				$rest = "Sete Lagoas - Paulo Frois";
				break;
			case 'VALE_ACO':
				$rest = "Vale do Aço - Adilson e Vagner";
				break;
			case 'AENDER':
				$rest = "Patos/Unai - Aender";
				break;
			default: $rest = " - ";
		}
		
		return strtoupper($rest);
	}
	
	function eng($eng)
	{
		switch (strtoupper($eng)) 
		{
			case 'DENISE':
				$rest = "Anselmo Franklin";
				break;
			case 'VANESSA':
				$rest = "Luiz Bez";
				break;
			case 'ALEXANDRE':
				$rest = "Alexandre Machado";
				break;
			case 'ALESSANDRO':
				$rest = "Alessandro Bulhões";
				break;
			default: $rest = " - ";
		}
		
		return $rest;
	}
	
	function status_orcamento($status)
	{
		switch ($status) 
		{
			case 'Aguardando':
				$rest = "Aguardando Aprovação";
				break;
			case 'Aprovado':
				$rest = "Aprovado para execução";
				break;
			case 'Concluido':
				$rest = "Concluído";
				break;
			case 'Cancelado':
				$rest = "Cancelado";
				break;
			case 'Questionado':
				$rest = "Questionado";
				break;
			case 'Lote':
				$rest = "Lote de Variável";
				break;
			default: $rest = " - ";
		}
		
		return $rest;
	}
	
	function tipo_orcamento($tipo)
	{
		switch ($tipo) 
		{
			case 'Civil':
				$rest = "Civil";
				break;
			case 'Eletrica':
				$rest = "Elétrica/Iluminação";
				break;
			case 'Hidraulica':
				$rest = "Hidráulica";
				break;
			case 'Ar_cond':
				$rest = "Ar Condicionado";
				break;
			default: $rest = " - ";
		}
		
		return $rest;
	}
	
	function local_lote($local)
	{
		switch ($local) 
		{
			case 'ES':
				$rest = "Espirito Santo";
				break;
			case 'MG':
				$rest = "Minas Gerais";
				break;
			case 'MG_ES':
				$rest = "Minas Gerais e Espirito Santo";
				break;
			default: $rest = "Sem Região";
		}
		
		return $rest;
	}
	
	function tipo_gasto($tipo)
	{
		switch ($tipo) 
		{
			case 'adiantamento':
				$rest = "Adiantamento";
				break;
			case 'imposto':
				$rest = "Imposto";
				break;
			case 'boleto':
				$rest = "Pagamento de Boleto";
				break;
			case 'material':
				$rest = "Transferência de material";
				break;
			case 'mobra':
				$rest = "Pagamento de mão de obra";
				break;
			case 'pedagio':
				$rest = "Pedágio";
				break;
			case 'estacionamento':
				$rest = "Estacionamento";
				break;
			case 'abastecimento':
				$rest = "Abastecimento (gasolina)";
				break;
			case 'diaria':
				$rest = "Diária";
				break;
			case 'almoco':
				$rest = "Almoço";
				break;
			case 'salario':
				$rest = "Salário";
				break;
			case 'ipva':
				$rest = "IPVA/DPVAT";
				break;
			case 'outros':
				$rest = "Outros pagamentos";
				break;
			default: $rest = "Sem Tipo pagamento";
		}
		
		return $rest;
	}
	
	function tipo_boleto($tipo)
	{
		switch ($tipo) 
		{
			case 'eletrica':
				$rest = "Material Elétrica";
				break;
			case 'hidraulica':
				$rest = "Material Hidraulica";
				break;
			case 'ar_condicionado':
				$rest = "Material de Ar Condicionado";
				break;
			case 'civil':
				$rest = "Material Civil";
				break;
			case 'abastecimento':
				$rest = "Abastecimento";
				break;
			case 'fgts':
				$rest = "Imposto - FGTS";
				break;
			case 'irrf':
				$rest = "Imposto - IRRF";
				break;
			case 'abastecimento':
				$rest = "Abastecimento (gasolina)";
				break;
			case 'gps':
				$rest = "Imposto - INSS";
				break;
			case 'gps':
				$rest = "Imposto - INSS";
				break;	
			case 'das':
				$rest = "Imposto - Simples";
				break;
			case 'outros':
				$rest = "Outros boletos";
				break;
			case 'imposto':
				$rest = "Outros Impostos";
				break;
			default: $rest = "Sem Tipo boletos";
			
		}
		
		return $rest;
	}
	
	function cargo($cargo)
	{
		switch($cargo)
		{
			case "meio_oficial":
			$cargo = "Meio Oficial de Manutenção";
			break;
			
			case "Oficial":
			$cargo = "Oficial de Manutenção";
			break;
			
			case "tecnico_refrigeracao":
			$cargo = "Técnico em Refrigeração";
			break;
			
			case "mecanico_refrigeracao":
			$cargo = "Mecânico em Refrigeração";
			break;
			
			case "supervisor":
			$cargo = "Supervisor";
			break;
			
			case "auxiliar":
			$cargo = "Auxiliar Administrativo";
			break;
			
			default: $cargo = "";
		}
	
		return $cargo;
	}
	
	function grau_instrucao($grau_instrucao)
	{
		switch($grau_instrucao)
		{
			case "medio":
			$grau_instrucao = "Ensino Médio";
			break;
			
			case "tecnico_incompleto":
			$grau_instrucao = "Técnico Incompleto";
			break;
			
			case "tecnico_completo":
			$grau_instrucao = "Técnico Completo";
			break;
			
			case "superior_incompleto":
			$grau_instrucao = "Ensino Superior Incompleto";
			break;
			
			case "superior_completo":
			$grau_instrucao = "Ensino Superior Completo";
			break;
			
			default: $grau_instrucao = "";
		}
	
		return $grau_instrucao;
	}

}