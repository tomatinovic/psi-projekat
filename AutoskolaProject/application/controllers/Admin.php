<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
       private $admin;
    
       public function __construct() {
        parent::__construct();
        $this->load->model("modelAdmin");  
        $this->load->model("modelUser");    
        $idAdmin = $this->session->userdata('userId');
        $this->admin = $this->modelAdmin->getUserById($idAdmin);
        }
        
        public function index(){
       // $data['vesti'] = $this->ModelVest->dohvatiVesti();
        $data['admin'] = $this->admin;
        $this->load->view('admin_page', $data);  
        }
        
        private function showViews($mainPart, $data){
        $data['admin'] = $this->admin;
        $this->load->view($mainPart, $data);
    }
        
        public function changeViewWithMessage($msg=NULL)
        {
        $data=[];
        if ($msg) {
            $data['msg'] = $msg;
        }
        $this->showViews('admin_page',$data); }
        
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
            
            if ($this->modelUser->checkUsernameExists($changeUsername) && $changeUsername!= $this->admin->username ){
                $this->changeViewWithMessage("Zauzeto korisnicko ime!");
            }
            else{
                $trimmedNameSurname = trim($changeNameSurname);
                $arr = explode(' ',trim($trimmedNameSurname));
               
                $this->modelUser->updateUser($this->admin->idUser, $arr[0], $arr[1], $changeAddress,
                $changePhone, $changeJmbg, $changeEmail, $changeUsername);
                $this->admin = $this->modelAdmin->getUserById($this->admin->idUser);
                $this->index();
            }
            
        }
    
        
        
}