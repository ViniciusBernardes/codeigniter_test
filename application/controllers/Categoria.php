<?php //ob_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Categoria extends CI_Controller {
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
		$this->load->library('moeda');
        
		
		$this->load->database();
		
        $this->load->model('m_categoria');
		
		//seta o template a ser utilizado
		$this->tpl = 'template/principal';
		
        $this->dados['css'] = array('assets/css/app.min.css', 'assets/css/style.css', 'assets/css/components.css', 'assets/css/custom.css');
        $this->dados['js'] = array('assets/js/app.min.js', 'assets/bundles/apexcharts/apexcharts.min.js', 'assets/js/page/index.js', 'assets/js/scripts.js', 'assets/js/custom.js');
		
  	
    }//fim do contrutor

    //**************************************************************************
    function cadastrar() 
	{
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/js/script_img.js'));
		$this->dados['paginaInterna'] = "categoria/cadastrar";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo 

    function cad()
    {
        $array['categoria'] = $this->input->post('categoria');
        $array['descricao'] = $this->input->post('descricao');
        $array['img_upload'] = $_FILES['img_upload']['name'];

        $id = $this->m_categoria->cadastrar($array);
        echo "id = ".$id;
        if($id != false)
        {
            $config['upload_path']          = './arquivo/categoria';
            $config['allowed_types']	    = 'jpg|png|jpeg|jpe';
            $config['detect_mime'] 		    = true;
            $config['max_size']             = 90000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = $id;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('img_upload')){
                $arr['foto'] = $id.substr($array['img_upload'], -4); 
                $arr['id'] = $id;
                $this->m_categoria->cadastrarFoto($arr);

                //$this->session->set_flashdata('message_ok','Categoria cadastrada com sucesso!');
                $this->session->set_tempdata('message_ok', 'Categoria cadastrada com sucesso!', 5);
				redirect('categoria/gerenciar');
            }
            else
            {
                $this->session->set_tempdata('message_erro','Erro ao cadastrar foto '.$this->upload->display_errors(), 5);
				redirect('categoria/gerenciar');
            }
            
        }
        else
        {
            $this->session->set_tempdata('message_erro','Erro ao cadastrar categoria!', 5);
			redirect('categoria/gerenciar');
        }
    }

    function gerenciar() 
	{
        $this->dados['js'] = array_merge($this->dados['js'], array('assets/bundles/jquery-ui/jquery-ui.min.js', 'assets/bundles/datatables/datatables.min.js', 'assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js', 'assets/js/page/datatables.js'));
        $this->dados['css'] = array_merge($this->dados['css'], array('assets/bundles/datatables/datatables.min.css', 'assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'));

        $this->dados['categoria'] = $this->m_categoria->getAll();
        
        $this->dados['paginaInterna'] = "categoria/gerenciar";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo 

}