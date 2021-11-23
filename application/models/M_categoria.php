<?php

/* 

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

class M_categoria extends CI_Model
{
   
    //**************************************************************************

	public function cadastrar($array)
	{
		$data = array(
        'nome' 		=> $array['categoria'],
		'descricao' => $array['descricao']
        );

        $retorno = $this->db->insert('categoria', $data); 
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
        'nome' =>  		   $array['categoria'],
		'descricao' =>     $array['descricao'],
		'foto' =>     $array['foto']
		);
		
		$this->db->where('id',$array['id']);
	    $retorno = $this->db->update('categoria', $data); 
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
	    $retorno = $this->db->update('categoria', $data); 
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
        $retorno = $this->db->delete('categoria'); 
        
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
		$query = " id, nome, descricao, data, foto from categoria";
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		$i = 0;
		foreach ($query1->result() as $row)
		{
			$result[$i]['id'] = $row->id;
			$result[$i]['categoria'] = $row->nome;
			$result[$i]['descricao'] = $row->descricao;
			$result[$i]['data'] = $row->data;
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
		$query = " id, nome, descricao, data, foto from categoria where id = ".$id;
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		foreach ($query1->result() as $row)
		{
			$result['id'] = $row->id;
			$result['categoria'] = $row->nome;
			$result['descricao'] = $row->descricao;
			$result['data'] = $row->data;
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

	public function teste()
	{
		return 1;
	}
}
