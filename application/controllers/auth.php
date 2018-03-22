<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

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
            if($this->session->userdata('logged_in'))
            {
            redirect('home');
            }
            
		if(isset($_POST['login'])){
                    $this->form_validation->set_rules('email', 'Adresse E-mail', 'trim|required|valid_email');
                    $this->form_validation->set_rules('password', 'Mot de passe', 'trim|required');
                    $this->form_validation->set_error_delimiters('<div class="error"><span class="glyphicon glyphicon-warning-sign "></span> ','</div>');
            
                if($this->form_validation->run() == TRUE)
                {
                    $auth = array();
                    $auth['email'] = $this->input->post('email');
                    $auth['password'] = $this->input->post('password');
                    if($this->user_model->check_user($auth) == FALSE){
                        $this->form_validation->set_message('required', 'Your custom message here');
                    }
                    else {
                        $user = $this->user_model->get_user_by_email($auth);
                        $session_data = array(
                            'id' => $user->id,
                            'logged_in' => 1
                        );
                        $this->session->set_userdata($session_data);
                        redirect('home');
                    }
                }
		}
		$data['page_title'] = 'Authentification';
		$this->load->view('auth/index',$data);
	}
        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth');
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */