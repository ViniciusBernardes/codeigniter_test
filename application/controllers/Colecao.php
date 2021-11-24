<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Colecao extends CI_Controller {
    private $tpl; // template
    private $dados;

    public function __construct()
    {
        parent::__construct();
		
       //America/Sao_Paulo
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		
		$this->load->helper(array('form','url','download'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('datas');
		$this->load->library('util');
		$this->load->library('remove');
        $this->load->library('moeda');
        
		
		$this->load->database();
		
        $this->load->model('m_colecao');
        $this->load->model('m_categoria');
        $this->load->model('m_produto');
		
		//seta o template a ser utilizado
		$this->tpl = 'template/principal';
		
        $this->dados['css'] = array('assets/css/app.min.css', 'assets/css/style.css', 'assets/css/components.css', 'assets/css/custom.css');
        $this->dados['js'] = array('assets/js/app.min.js', 'assets/bundles/apexcharts/apexcharts.min.js', 'assets/js/page/index.js', 'assets/js/scripts.js', 'assets/js/custom.js','assets/js/jquery.maskMoney.js');
		
  	
    }//fim do contrutor

    //**************************************************************************
    function cadastrar() 
	{
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/js/script_img.js'));

        $this->dados['categoria'] = $this->m_categoria->getAll();
        $this->dados['produto'] = $this->m_produto->getAll();

		$this->dados['paginaInterna'] = "colecao/cadastrar";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo 

    function cad()
    {
        $array['colecao'] = $this->input->post('colecao');
        $array['descricao'] = $this->input->post('descricao');
        $array['categoria'] = $this->input->post('categoria');
        $qnt = $this->input->post('qnt');

        $id = $this->m_colecao->cadastrar($array);
        
        if($id != false)
        {
            $array['colecao'] = $id;
            for($i = 0; $i < $qnt; $i++)
            {
                if($this->input->post('check_'.$i))
                {
                    $array['produto'] = $this->input->post('check_'.$i);
                    $retorno = $this->m_colecao->cadastraProdutoCategoria($array);
                }
            }
            if($retorno)
            {
                $this->session->set_tempdata('message_ok', 'Coleção cadastrada com sucesso!', 2);
				redirect('colecao/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao cadastrar coleção!', 2);
			    redirect('colecao/gerenciar');
            }
        }
        else
        {
            $this->session->set_tempdata('message_erro','Erro ao cadastrar coleção!', 2);
			redirect('colecao/gerenciar');
        }
        
    }

    function gerenciar() 
	{
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/bundles/jquery-ui/jquery-ui.min.js', 'assets/bundles/datatables/datatables.min.js', 'assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js', 'assets/js/page/datatables.js', 'assets/bundles/sweetalert/sweetalert.min.js'));
        $this->dados['css'] = array_merge($this->dados['css'], array('assets/bundles/datatables/datatables.min.css', 'assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'));

        $this->dados['colecao'] = $this->m_colecao->getAll();

        $this->dados['paginaInterna'] = "colecao/gerenciar";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo 

    function editar($id)
    {
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/js/script_img.js'));
        
        $this->dados['categoria'] = $this->m_categoria->getAll();
        $this->dados['produto'] = $this->m_produto->getAll();
        $this->dados['cat_prod'] = $this->m_colecao->getProdutoCategoriaId($id);
        $this->dados['colecao'] = $this->m_colecao->getId($id);

		$this->dados['paginaInterna'] = "colecao/editar";
		$this->load->view($this->tpl, $this->dados);
    }

    function edit($id)
    {
        $array['id']      = $id;
        $array['nome'] = $this->input->post('colecao');
        $array['descricao'] = $this->input->post('descricao');
        $array['categoria'] = $this->input->post('categoria');
        $qnt = $this->input->post('qnt');

        $ret = $this->m_colecao->alterar($array);
        
        if($ret)
        {
            $this->m_colecao->excluirColecaoCategoriaProduto($id);
            $array['colecao'] = $id;
            for($i = 0; $i < $qnt; $i++)
            {
                if($this->input->post('check_'.$i))
                {
                    $array['produto'] = $this->input->post('check_'.$i);
                    $retorno = $this->m_colecao->cadastraProdutoCategoria($array);
                }
            }
            if($retorno)
            {
                $this->session->set_tempdata('message_ok', 'Coleção alterada com sucesso!', 2);
				redirect('colecao/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao cadastrar coleção!', 2);
			    redirect('colecao/gerenciar');
            }
        }
        else
        {
            $this->session->set_tempdata('message_erro','Erro ao alterar coleção!', 2);
			redirect('colecao/gerenciar');
        }
       
    }

    function excluir($id)
    {
        if($this->m_colecao->excluirColecaoCategoriaProduto($id))
        {
            if($this->m_colecao->excluir($id))
            {
                $this->session->set_tempdata('message_ok', 'Coleção excluída com sucesso!', 2);
                redirect('colecao/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao tentar excluir Coleção', 2);
                redirect('colecao/gerenciar');
            }
        }
        else
        {
            $this->session->set_tempdata('message_erro','Erro ao tentar excluir Coleção', 2);
            redirect('colecao/gerenciar');
        }
    }

}