<?php

/* 

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

class M_colecao extends CI_Model
{
   
    //**************************************************************************

	public function cadastrar($array)
	{
		$data = array(
        'nome' 		=> $array['colecao'],
		'descricao' => $array['descricao']
		);

        $retorno = $this->db->insert('colecao', $data); 
		$id = $this->db->insert_id();
		if($retorno)
		{
			return $id;
		}
		else
		{
			return false;
		}
	}

	public function cadastraProdutoCategoria($array)
	{
		$data = array(
			'colecao' 		=> $array['colecao'],
			'categoria'		=> $array['categoria'],
			'produto'		=> $array['produto']
			);
	
			$retorno = $this->db->insert('categoria_produto', $data); 
			//$id = $this->db->insert_id();
			if($retorno)
			{
				return true;
			}
			else
			{
				return false;
			}
	}

	public function alterar($array)
	{
		$data = array(
        'nome' =>  		   $array['nome'],
		'descricao' =>     $array['descricao']
		);
		
		$this->db->where('id',$array['id']);
	    $retorno = $this->db->update('colecao', $data); 
		if($retorno)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getProdutoCategoriaId($id)
	{
		$query = " colecao, categoria, produto from categoria_produto where colecao = ".$id;
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		$i = 0;
		foreach ($query1->result() as $row)
		{
			$result[$i]['colecao'] = $row->colecao;
			$result[$i]['categoria'] = $row->categoria;
			$result[$i]['produto'] = $row->produto;
			$i++;
		}
		if(!isset($result))
		{
			return '0';
		}
		else
		{
			return $result;
		}	
	}

	public function excluirColecaoCategoriaProduto($id)
	{
		$this->db->where('colecao',$id, false);
        $retorno = $this->db->delete('categoria_produto'); 
        
        if($retorno)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function excluir($id)
	{
		$this->db->where('id',$id, false);
        $retorno = $this->db->delete('colecao'); 
        
        if($retorno)
        {
            return true;
        }
        else
        {
            return false;
        }
	}

	public function getAll()
	{
		$query = " id, nome, descricao from colecao";
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		$i = 0;
		foreach ($query1->result() as $row)
		{
			$result[$i]['id'] = $row->id;
			$result[$i]['colecao'] = $row->nome;
			$result[$i]['descricao'] = $row->descricao;
			$i++;
		}
		if(!isset($result))
		{
			return '0';
		}
		else
		{
			return $result;
		}	
	}

	public function getId($id)
	{
		$query = " id, nome, descricao from colecao where id = ".$id;
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		foreach ($query1->result() as $row)
		{
			$result['id'] = $row->id;
			$result['colecao'] = $row->nome;
			$result['descricao'] = $row->descricao;
		}
		if(!isset($result))
		{
			return '0';
		}
		else
		{
			return $result;
		}	
	}

	public function totalColecao()
	{
		$query = " count(*) as qnt from colecao ";
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		foreach ($query1->result() as $row)
		{
			$result = $row->qnt;
		}
		if(!isset($result))
		{
			return '0';
		}
		else
		{
			return $result;
		}	
	}

}
