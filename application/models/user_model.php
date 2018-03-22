<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	protected $table = 'user' ;
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
        }
	public function list_user()
	{
		return  $this->db->select('*')
                        ->from($this->table)
                        ->get()
                        ->result();
	}
	public function check_user($data)
	{
		$query = $this->db->get_where($this->table, $data);
		return ($query->num_rows() == 1 )? TRUE : FALSE;				
	}
        public function get_user_by_email($data)
        {
            $query = $this->db->get_where($this->table, $data);
		return ($query->num_rows() == 1 )? $query->row() : FALSE;
        }
        public function get_user_by_id($id)
        {
            $query = $this->db->get_where($this->table, array('id' => $id));
		return ($query->num_rows() == 1 )? $query->row() : FALSE;
        }
        public function check_id($id)
        {
		$query = $this->db->get_where($this->table, array('id' => $id));
		return ($query->num_rows() == 1 )? TRUE : FALSE;
        }
        public function add_user($data)
        {
		return $this->db->insert($this->table, $data);
        }
         
        public function update_user($id,$data)
        {
		$this->db->where('id', $id);
                return $this->db->update($this->table, $data);
        }
        public function delete_user($id)
        {
		return $this->db->delete($this->table, array('id' => $id)); 
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */