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
    
         public function getRegistered(){
            $idEmployee = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idEmployee));
        }
    
         public function getAllTheoryClasses(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllTheoryClasses());
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
            
            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);
            $phone = htmlspecialchars($_POST['phone']);
            $address = htmlspecialchars($_POST['address']);
            $jmbg = htmlspecialchars($_POST['jmbg']);
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            
            $response = array(
                    'code' => 1,
                    'msg' => "",
                    'user' => NULL
                );
            
            if ($name=="" || $surname=="" || $phone=="" || $address==""
                    || $jmbg=="" || $email=="" || $username==""){
                 $response['code'] = 0;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
                    }
                    
            else if ($this->modelUser->checkUsernameExists($username) && $username!= $this->user->username ){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
            }
            else {
                $this->modelUser->updateUser($this->user->idUser, $name, $surname, $address,
                $phone, $jmbg, $email, $username);
                $this->user = $this->modelUser->getUserById($this->user->idUser);
                $response['user']= $this->user;
                
            }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
       
}