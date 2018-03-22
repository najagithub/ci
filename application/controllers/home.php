<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
		$this->load->model('user_model');
                
    }
	public function index()
	{
            $data['user'] = $this->user_model->get_user_by_id($this->session->userdata('id'));
            if(isset($_GET['id']) && $this->user_model->check_id($_GET['id'])){
                $data['edit'] = $this->user_model->get_user_by_id($_GET['id']);
                if(isset($_POST['edit'])){
                    $this->set_form_data();
                    if($this->form_validation->run() == TRUE){
                        $row = $this->get_form_data();
                        $this->user_model->update_user($_GET['id'],$row);
                        redirect('home');
                    }
                }
                
            }
                $data['list'] = $this->user_model->list_user();
		$data['page_title'] = 'Home';
                if(isset($_POST['add'])){
                    $this->set_form_data();
                    if($this->form_validation->run()  == TRUE)
                    {
                        $row = $this->get_form_data();
                        $this->user_model->add_user($row);
                        redirect('home');
                    }
                }
                
		$this->load->view('partials/_header',$data);
		$this->load->view('home/index',$data);
		$this->load->view('partials/_footer');
	}
        public function delete($id)
        {
            if(!isset($id)){
                redirect('home');
            }
            $this->user_model->delete_user($id);
            redirect('home');
        }
        function set_form_data()
        {
            $this->form_validation->set_rules('email', 'Adresse E-mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error"><span class="glyphicon glyphicon-warning-sign "></span> ','</div>');
            
        }
        function get_form_data(){
            $row= array();
                    $row['email'] = $this->input->post('email');
                    $row['password'] = $this->input->post('password'); 
            return $row;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */