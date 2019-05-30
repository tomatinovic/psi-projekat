<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

       public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");       
        
        //provera da li je korisnik mozda vec ulogovan
        //if (($this->session->userdata('user')) != NULL) {
          //  $user = $this->session->userdata('user');
         //   $this->changeByUserType($user->type);
       // }
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        private function showViews($mainPart, $data){
        $this->load->view($mainPart, $data);
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
                
                $query = $this->modelUser->checkUsernameExists($user);
                if ($query){
                
                $query = $this->modelUser->getUsersByUsernameAndPass($user, $password);
                   if ($query->num_rows()==1){

                       $this->session->set_userdata('userId', $query->row()->idUser);
                       $query = $this->modelUser->getUserType($user);
                       $this->changeByUserType($query->type);
                }
                else {
                     $this->changeViewWithMessage("Netacna sifra");
                }
            }
            else {
                 $this->changeViewWithMessage("Neispravno korisnicko ime!");
            }
                }
            else {
                $this->changeViewWithMessage("Oba polja moraju biti popunjena!");
            }
        }
        
        public function sendMail(){
            
       
            $user = $this->input->post('usernameForgot');
            $email = $this->input->post('emailForgot');
            
            if($this->modelUser->checkUsernameExists($user)){
                
                $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com',
                'smtp_port' => 587,
                'smtp_crypto' => 'ssl', 
                'mailtype' => 'text', 
                'wordwrap' => TRUE
                 );
                
                 $this->email->initialize($config);
                
                $this->email->from('dragfamily@gmail.com', 'Your Name');
                $this->email->to($email);

                $this->email->subject('Email Test');
                $this->email->message('Probaaaaaaaaaaaaaaaaa');

                $this->email->send();
            
                if($this->email->send()){
                    $this->changeViewWithMessage("Uspesno!");
                }
                else{
                    $this->changeViewWithMessage($this->email->print_debugger());
                }
                
            /*$this->email->from('dragfamily@gmail.com', 'Your Name');
            $this->email->to($email);

            $this->email->subject('Email Test');
            $this->email->message('Probaaaaaaaaaaaaaaaaa');
            $this->email->set_mailtype('html');

            $this->email->send();*/}
            else {
                $this->changeViewWithMessage("Pogresno korisnicko ime!");
            }           
               
        }
        
        public function register(){
            
            $name = $this->input->post('nameReg');
            $surname = $this->input->post('surnameReg');
            $phone = $this->input->post('phoneReg');
            $address = $this->input->post('addressReg');
            $jmbg = $this->input->post('jmbgReg');
            $email = $this->input->post('emailReg');
            $username = $this->input->post('usernameReg');
            $password = $this->input->post('passwordReg');
            
            if($this->modelUser->checkUsernameExists($username)){
                 $this->changeViewWithMessage("Korisnicko ime zauzeto!");
            }
            else {
                   $data = array(  
                        'name'     => $name,  
                        'surname' => $surname,
                        'phone' => $phone,
                        'address' => $address,
                        'jmbg' => $jmbg, 
                        'email' => $email,
                        'username' => $username,
                        'password' => $password,
                        'type' => 0
                        );  
                   
                   $this->db->insert('users',$data);  
                   $this->changeViewWithMessage("USPESNO!");
                
            }            
        }
        
        private function changeByUserType($type){
                           switch ($type){
                           case (0) : {redirect("Admin");break;}
                           case (1) : {redirect("Employee");break;}
                           case (2) : {redirect("Student");break;}
                           case (3) : {$this->load->view('employee_page');break;}
                           
                           default : break;
                       }
        }
        
}
