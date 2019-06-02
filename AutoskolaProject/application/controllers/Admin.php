<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
       private $admin;
       private $employees;
    
       public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idAdmin = $this->session->userdata('userId');
        $this->admin = $this->modelUser->getUserById($idAdmin);
        }
        
        public function getAdmin(){
            $idAdmin = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idAdmin));
        }
        
        public function getUser(){
            $idUser = htmlspecialchars($_POST['idUser']);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idUser));
        }
        
        public function allEmployees(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllEmployees());
        }
        
        public function allStudents(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllStudents());
        }
        
        public function allUsers(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllRegUsers());
        }
        
        
        public function index(){
        $data['msg'] = NULL;
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
        $data['admin'] = $this->admin;
        $this->showViews('admin_page',$data); }
        
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
                    
            else if ($this->modelUser->checkUsernameExists($username) && $username!= $this->admin->username ){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
            }
            else {
                $this->modelUser->updateUser($this->admin->idUser, $name, $surname, $address,
                $phone, $jmbg, $email, $username);
                $this->admin = $this->modelUser->getUserById($this->admin->idUser);
                $response['user']= $this->admin;
                
            }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
        
      public function deleteUser(){
            $idUser = htmlspecialchars($_POST['idUser']);
            $typeUser = htmlspecialchars($_POST['typeUser']);
            $this->db->delete('users', array('idUser' => $idUser));
            $peopleArray = array();
      switch ($typeUser) {
          case 1: {
              $peopleArray = $this->modelUser->getAllEmployees();
          } break;
          case 2: {
              $peopleArray = $this->modelUser->getAllStudents();
          } break;
          case 3: {
               $peopleArray = $this->modelUser->getAllRegUsers();
          } break;
          default: break;
      }
            
            header("Content-Type: application/json");
            echo json_encode($peopleArray);

        }
        
        public function register(){
                $name = htmlspecialchars($_POST['name']);
                $surname = htmlspecialchars($_POST['surname']);
                $phone = htmlspecialchars($_POST['phone']);
                $address = htmlspecialchars($_POST['address']);
                $jmbg = htmlspecialchars($_POST['jmbg']);
                $email = htmlspecialchars($_POST['email']);
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);
                
                $response = array(
                    'code' => 1,
                    'msg' => "",
                    'user' => NULL
                );
                
                if($this->modelUser->checkUsernameExists($username)){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
            }
            else if ($name=="" || $surname=="" || $phone=="" || $address==""
                    || $jmbg=="" || $email=="" || $username=="" || $password==""){
                 $response['code'] = 0;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
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
            
            header("Content-Type: application/json");
            $newUser = json_encode($this->modelUser->getUserByUsername($username));
            $response['user'] = json_decode($newUser);
            echo json_encode($response);
            
            }
            
            
            public function activateUser(){
                $idUser = htmlspecialchars($_POST['idUser']);
                $this->modelUser->activateUser($idUser);
                header("Content-Type: application/json");
                echo json_encode($this->modelUser->getAllRegUsers());
            }
            
     
        
}