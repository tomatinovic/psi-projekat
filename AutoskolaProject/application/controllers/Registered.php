<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registered extends CI_Controller {
        private $user;
        private $tclasses;
 
        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idUser = $this->session->userdata('userId');
        $this->user = $this->modelUser->getUserById($idUser);
        $this->tclasses = $this->modelUser->getAllTheoryClasses();

        }
        
        public function index(){
        $data['msg'] = NULL;
        $data['user'] = $this->user;
        $data['tclasses'] = $this->tclasses;

        $this->load->view('register_page', $data);  
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
        $data['user'] = $this->user;
        $data['tclasses'] = $this->tclasses;
  
        $this->showViews('register_page',$data); }
        
        public function logout(){
            $this->session->sess_destroy();
            $this->load->view('welcome_message'); 
        }
        
        public function updateUser(){
            
            $changeNameSurname = $this->input->post('changeNameSurname');
            $changeAddress = $this->input->post('changeAddress');
            $changePhone = $this->input->post('changePhone');
            $changeJmbg = $this->input->post('changeJmbg');
            $changeEmail = $this->input->post('changeEmail');
            $changeUsername = $this->input->post('changeUsername');
            
            if ($changeNameSurname=="" || $changeAddress=="" || $changePhone=="" || $changeJmbg==""
                    || $changeEmail=="" || $changeUsername==""){
                $this->changeViewWithMessage("Sva polja moraju biti popunjena!");
                    }
            
            else if ($this->modelUser->checkUsernameExists($changeUsername) && $changeUsername!= $this->user->username ){
                $this->changeViewWithMessage("Zauzeto korisnicko ime!");
            }
            else{
                $trimmedNameSurname = trim($changeNameSurname);
                $arr = explode(' ',trim($trimmedNameSurname));
               
                $this->modelUser->updateUser($this->user->idUser, $arr[0], $arr[1], $changeAddress,
                $changePhone, $changeJmbg, $changeEmail, $changeUsername);
                $this->user = $this->modelUser->getUserById($this->user->idUser);
                $this->changeViewWithMessage("Uspesno!");
            }
            
        }
       
}