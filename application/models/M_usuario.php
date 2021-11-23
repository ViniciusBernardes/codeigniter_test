<?php

/* 

 * To change this template, choose Tools | Templates

 * and open the template in the editor.

 */

class M_usuario extends CI_Model
{
   
    //**************************************************************************

    function autenticar($login, $senha)
    {
        $senha = md5($senha);
        $login = $login;

        $query = " u.id, u.nome, u.isAdmin, u.empresa
					FROM usuarios u 
				  WHERE u.senha = '$senha' and upper(u.login) = upper('$login')";

        $result = $this->db->select($query) or die( $this->db->error() );
		$query1 = $this->db->get();
		
		foreach ($query1->result() as $row)
		{
			$rest['id'] = $row->id;
			$rest['nome'] = $row->nome;
			$rest['isAdmin'] = $row->isAdmin;
			$rest['empresa'] = $row->empresa;
		}

       if(!isset($rest['id']))
		{
			return 'FALHA';
		}
		else
		{
			return $rest;
		}	

    }//fim autenticar
	
	function autenticarReact($login, $senha)
    {
        $senha = md5($senha);
        $login = $login;

        $query = " u.id, u.nome, u.isAdmin, u.empresa
					FROM usuarios u 
				  WHERE u.senha = '$senha' and upper(u.login) = upper('$login')";

        $result = $this->db->select($query) or die( $this->db->error() );
		$query1 = $this->db->get();
		
		foreach ($query1->result() as $row)
		{
			$rest['id'] = $row->id;
			$rest['nome'] = $row->nome;
			$rest['isAdmin'] = $row->isAdmin;
			$rest['empresa'] = $row->empresa;
			$rest['user'] = $row->nome;
			$rest['token'] = md5($row->nome);
		}

       if(!isset($rest['id']))
		{
			return 'FALHA';
		}
		else
		{
			return $rest;
		}	

    }//fim autenticar

	public function getAll()
	{
		$query = "		  u.id as id_usuario,
						  u.nome as usuario,
						  u.login,
						  u.isAdmin,
						  e.nome as rota,
						  p.nome as permissao
					from usuarios u
					inner join permissao p on p.id = u.isAdmin
					left join empresa e on e.id = u.empresa
					
					order by u.nome";
		$this->db->select($query, FALSE);
		$query1 = $this->db->get();
		$i = 0;
		foreach ($query1->result() as $row)
		{
			$result[$i]['id_usuario'] = $row->id_usuario;
			$result[$i]['usuario'] = $row->usuario;
			$result[$i]['rota'] = $row->rota;
			$result[$i]['login'] = $row->login;
			$result[$i]['isAdmin'] = $row->isAdmin;
			$result[$i]['permissao'] = $row->permissao;
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

	public function getPermissao()
	{
		$query = "	nome, id
					from permissao
					order by nome";
		$this->db->select($query, FALSE);
        $query1 = $this->db->get();
        $i = 0;
        foreach ($query1->result() as $row)
        {
            $result[$i]['id'] = $row->id;
			$result[$i]['nome'] = $row->nome;
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
	
	public function cadUsuario($array)
	{
		$senha = md5($array['senha']);
		$data = array(
        'nome' => $array['usuario'],
		'login' => $array['login'],
		'senha' => $senha,
		'isAdmin' => $array['permissao'],
		'empresa' => $array['empresa']
        );

        $retorno = $this->db->insert('usuarios', $data); 
		if($retorno)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function excluirUsuario($id)
	{
		$this->db->where('id',$id, false);
        $retorno = $this->db->delete('usuarios'); 
        
        if($retorno)
        {
            return true;
        }
        else
        {
            return false;
        }
	}
}
