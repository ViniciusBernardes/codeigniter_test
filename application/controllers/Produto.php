<?php //ob_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Produto extends CI_Controller {
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
		$this->dados['paginaInterna'] = "produto/cadastrar";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo 

    function cad()
    {
        $array['produto'] = $this->input->post('produto');
        $array['descricao'] = $this->input->post('descricao');
        $array['valor'] = $this->moeda->trata_valor($this->input->post('valor'));
        $array['img_upload'] = $_FILES['img_upload']['name'];

        
        $id = $this->m_produto->cadastrar($array);
        echo "id = ".$id;
        if($id != false)
        {
            $config['upload_path']          = './arquivo/produto';
            $config['allowed_types']	    = 'jpg|png|jpeg|jpe';
            $config['detect_mime'] 		    = true;
            $config['max_size']             = 90000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['file_name']            = $id;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img_upload')){
                $arr['foto'] = $id.substr($array['img_upload'], -4); 
                $arr['id'] = $id;
                $this->m_produto->cadastrarFoto($arr);

                $this->session->set_tempdata('message_ok', 'Produto cadastrado com sucesso!', 2);
				redirect('produto/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao cadastrar foto '.$this->upload->display_errors(), 2);
				redirect('produto/gerenciar');
            }
            
        }
        else
        {
            $this->session->set_tempdata('message_erro','Erro ao cadastrar produto!', 2);
			redirect('produto/gerenciar');
        }
    }

    function gerenciar() 
	{
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/bundles/jquery-ui/jquery-ui.min.js', 'assets/bundles/datatables/datatables.min.js', 'assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js', 'assets/js/page/datatables.js', 'assets/bundles/sweetalert/sweetalert.min.js'));
        $this->dados['css'] = array_merge($this->dados['css'], array('assets/bundles/datatables/datatables.min.css', 'assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'));

        $this->dados['produto'] = $this->m_produto->getAll();
        
        $this->dados['paginaInterna'] = "produto/gerenciar";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo 

    function editar($id)
    {
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/js/script_img.js'));
        $this->dados['produto'] = $this->m_produto->getId($id);
		$this->dados['paginaInterna'] = "produto/editar";
		$this->load->view($this->tpl, $this->dados);
    }

    function edit($id)
    {
        $array['id']        = $id;
        $array['produto'] = $this->input->post('produto');
        $array['descricao'] = $this->input->post('descricao');
        $array['valor'] = $this->moeda->trata_valor($this->input->post('valor'));
        $array['foto'] = $this->input->post('foto');
        
        $fotoantiga = $this->input->post('foto');
        $foto = substr($this->input->post('foto'), 0, -4);
        
        $array['img_upload'] = $_FILES['img_upload']['name'];
        
        if($array['img_upload'] != null)
        {
            $this->load->library('remove');
			$this->remove->apaga_files("arquivo/produto", $fotoantiga);
            
            $array['foto'] = "1".$foto.substr($array['img_upload'], -4);
            $novafoto = 

            $config['upload_path']          = './arquivo/produto';
            $config['allowed_types']	    = 'jpg|png|jpeg|jpe';
            $config['detect_mime'] 		    = true;
            $config['max_size']             = 90000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['file_name']            = "1".$foto;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img_upload')){
                
                $this->m_produto->alterar($array);

                $this->session->set_tempdata('message_ok', 'Produto Alterado com sucesso!', 2);
				redirect('produto/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao alterar foto '.$this->upload->display_errors(), 2);
				redirect('produto/gerenciar');
            }
        }
        else
        {
            if($this->m_produto->alterar($array))
            {
                $this->session->set_tempdata('message_ok', 'Produto Alterado com sucesso!', 2);
				redirect('produto/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao alterar produto!', 2);
			    redirect('produto/gerenciar');
            }
        }
       
    }

    function excluir($id)
    {
        if($this->m_produto->excluir($id))
        {
            $this->session->set_tempdata('message_ok', 'Produto excluído com sucesso!', 2);
            redirect('produto/gerenciar');
        }
        else
        {
            $this->session->set_tempdata('message_erro','Erro ao tentar excluir Produto', 2);
            redirect('produto/gerenciar');
        }

    }

}