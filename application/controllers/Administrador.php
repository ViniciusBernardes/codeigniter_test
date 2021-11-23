<?php //ob_start();
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class Administrador extends CI_Controller {
    private $tpl; // template
    private $dados;

    public function __construct()
    {
        parent::__construct();
		
		//America/Sao_Paulo
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		
		$this->load->helper(array('form','url','download'));
		$this->load->library('form_validation');
		$this->load->library('session');
		
		//$this->load->database();
		
        //$this->load->model('m_local');
		
		//seta o template a ser utilizado
		$this->tpl = 'template/principal';
		
        $this->dados['css'] = array('assets/css/app.min.css', 'assets/css/style.css', 'assets/css/components.css', 'assets/css/custom.css');
        $this->dados['js'] = array('assets/js/app.min.js', 'assets/bundles/apexcharts/apexcharts.min.js', 'assets/js/page/index.js', 'assets/js/scripts.js', 'assets/js/custom.js');
		
  	
    }//fim do contrutor

    //**************************************************************************
    function index() 
	{
		$this->dados['paginaInterna'] = "dashboard/index";
		$this->load->view($this->tpl, $this->dados);
    }//fim do metodo index

}