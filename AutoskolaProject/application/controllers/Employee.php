<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
        private $employee;

        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idEmployee = $this->session->userdata('userId');
        $this->employee = $this->modelUser->getUserById($idEmployee);
        }
        
        public function index(){
       // $data['vesti'] = $this->ModelVest->dohvatiVesti();
        $data['msg'] = NULL;
        $data['employee'] = $this->employee;

        $this->load->view('employee_page', $data);  
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
        $data['employee'] = $this->employee;
        $this->showViews('employee_page',$data); }
        
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
            
            else if ($this->modelUser->checkUsernameExists($changeUsername) && $changeUsername!= $this->employee->username ){
                $this->changeViewWithMessage("Zauzeto korisnicko ime!");
            }
            else{
                $trimmedNameSurname = trim($changeNameSurname);
                $arr = explode(' ',trim($trimmedNameSurname));
               
                $this->modelUser->updateUser($this->employee->idUser, $arr[0], $arr[1], $changeAddress,
                $changePhone, $changeJmbg, $changeEmail, $changeUsername);
                $this->employee = $this->modelUser->getUserById($this->employee->idUser);
                $this->changeViewWithMessage("Uspesno!");
            }
            
        }
       
}