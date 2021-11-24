<?php

/* 

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

class M_produto extends CI_Model
{
   
    //**************************************************************************

	public function cadastrar($array)
	{
		$data = array(
        'nome' 		=> $array['produto'],
		'descricao' => $array['descricao'],
		'valor' => $array['valor']
        );

        $retorno = $this->db->insert('produto', $data); 
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

	public function alterar($array)
	{
		$data = array(
        'nome' =>  		   $array['produto'],
		'descricao' =>     $array['descricao'],
		'valor' =>  	   $array['valor'],
		'foto' =>     	   $array['foto']
		);
		
		$this->db->where('id',$array['id']);
	    $retorno = $this->db->update('produto', $data); 
		if($retorno)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function cadastrarFoto($array)
	{
		$data = array(
        'foto' =>  		   $array['foto']
		);
		
		$this->db->where('id',$array['id']);
	    $retorno = $this->db->update('produto', $data); 
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
        $retorno = $this->db->delete('produto'); 
        
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
		$query = " id, nome, descricao, valor, foto from produto";
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		$i = 0;
		foreach ($query1->result() as $row)
		{
			$result[$i]['id'] = $row->id;
			$result[$i]['produto'] = $row->nome;
			$result[$i]['descricao'] = $row->descricao;
			$result[$i]['valor'] = $row->valor;
			$result[$i]['foto'] = $row->foto;
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
		$query = " id, nome, descricao, valor, foto from produto where id = ".$id;
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		foreach ($query1->result() as $row)
		{
			$result['id'] = $row->id;
			$result['produto'] = $row->nome;
			$result['descricao'] = $row->descricao;
			$result['valor'] = $row->valor;
			$result['foto'] = $row->foto;
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

	public function totalProdutos()
	{
		$query = " count(*) as qnt from produto ";
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

	public function verificarProduto($produto)
	{
		$query = " count(*) as qnt from categoria_produto where produto = ".$produto;
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
