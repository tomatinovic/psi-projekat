<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

       public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");
        
        
        //provera da li je korisnik mozda vec ulogovan
        /*if (($this->session->userdata('autor')) != NULL) {
            if ($this->session->userdata('autor')->admin == 1) {
                redirect("Admin");
            } else {
                redirect("Korisnik");
            }
        }*/
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        private function showViews($mainPart, $data){
        //$this->load->view("sablon/header_gost.php", $data);
        $this->load->view($mainPart, $data);
        //$this->load->view("sablon/footer.php");
    }
        
        
        public function changeViewWithMessage($msg=NULL)
        {
        $data=[];
        if ($msg) {
            $data['msg'] = $msg;
        }
        $this->showViews('welcome_message',$data); }
    
        
        public function login(){
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run()){
                $user = $this->input->post('username');
                $password =  $this->input->post('password');
                $query = $this->modelUser->getUsersByUsernameAndPass($user, $password);
                   if ($query->num_rows()==1){
                    echo "WELCOME $user";
                }
                else {
                     $this->changeViewWithMessage("Netacno korisnicko ime ili sifra");
                }
            }
            else {
                $this->changeViewWithMessage("Oba polja moraju biti popunjena!");
            }
        }
        
}
