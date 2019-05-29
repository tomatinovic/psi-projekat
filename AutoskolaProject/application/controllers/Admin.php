<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
       private $admin;
       private $employees;
       private $students;
       private $regUsers;
    
       public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idAdmin = $this->session->userdata('userId');
        $this->admin = $this->modelUser->getUserById($idAdmin);
        $this->employees = $this->modelUser->getAllEmployees();
        $this->students = $this->modelUser->getAllStudents();
        $this->regUsers = $this->modelUser->getAllRegUsers();
        }
        
        public function index(){
       // $data['vesti'] = $this->ModelVest->dohvatiVesti();
        $data['msg'] = NULL;
        $data['admin'] = $this->admin;
        $data['employees'] = $this->employees;
        $data['students'] = $this->students;
        $data['regUsers'] = $this->regUsers;
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
        $data['employees'] = $this->employees;
        $data['admin'] = $this->admin;
        $data['students'] = $this->students;
        $data['regUsers'] = $this->regUsers;
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
            
            if ($changeNameSurname=="" || $changeAddress=="" || $changePhone=="" || $changeJmbg==""
                    || $changeEmail=="" || $changeUsername==""){
                $this->changeViewWithMessage("Sva polja moraju biti popunjena!");
                    }
            
            else if ($this->modelUser->checkUsernameExists($changeUsername) && $changeUsername!= $this->admin->username ){
                $this->changeViewWithMessage("Zauzeto korisnicko ime!");
            }
            else{
                $trimmedNameSurname = trim($changeNameSurname);
                $arr = explode(' ',trim($trimmedNameSurname));
               
                $this->modelUser->updateUser($this->admin->idUser, $arr[0], $arr[1], $changeAddress,
                $changePhone, $changeJmbg, $changeEmail, $changeUsername);
                $this->admin = $this->modelUser->getUserById($this->admin->idUser);
                $this->changeViewWithMessage("Uspesno!");
            }
            
        }
        
        public function deleteUser(){
            $idUser = $_GET['idUser'];
            $this->db->delete('users', array('idUser' => $idUser));
            $this->employees = $this->modelUser->getAllEmployees();
            $data['employees'] = $this->employees;
            $this->load->view('admin_page', $data);  

        }
        
         public function register(){
            
            $name = $this->input->post('nameRegA');
            $surname = $this->input->post('surnameRegA');
            $phone = $this->input->post('phoneRegA');
            $address = $this->input->post('addressRegA');
            $jmbg = $this->input->post('jmbgRegA');
            $email = $this->input->post('emailRegA');
            $username = $this->input->post('usernameRegA');
            $password = $this->input->post('passwordRegA');
            
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
                        'type' => 1
                        );  
                   
                   $this->db->insert('users',$data);  
            
            } 
            $this->employees = $this->modelUser->getAllEmployees();
            $this->changeViewWithMessage("Uspesno");
        }
    
        
        
}