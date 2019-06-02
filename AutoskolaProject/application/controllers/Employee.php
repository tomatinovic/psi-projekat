<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
        private $employee;
        private $allStudents;
        private $myStudents;
        private $tclasses;
        private $dlessons;

        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idEmployee = $this->session->userdata('userId');
        $this->employee = $this->modelUser->getUserById($idEmployee);
        $this->allStudents = $this->modelUser->getAllStudents();
        $this->myStudents = $this->modelUser->getStudentsForUser($this->employee);
        $this->tclasses = $this->modelUser->getAllTheoryClasses();
        $this->dlessons = $this->modelUser->getDrivingLessonsForTeacher($this->employee);
        }
        
         public function getEmployee(){
            $idEmployee = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idEmployee));
        }
        
        public function allStudents(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllStudents());
        }
        
         public function getAllTheoryClasses(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllTheoryClasses());
        }
        
        public function getMyStudents(){
            $idEmployee = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idEmployee);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getStudentsForUser($user));
        }
        
        public function getDrivingLessons(){
            $idEmployee = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idEmployee);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getDrivingLessonsForTeacher($user));
        }

                public function index(){
        $data['msg'] = NULL;
        $data['employee'] = $this->employee;
        $data['allStudents'] = $this->allStudents;
        $data['myStudents'] = $this->myStudents;
        $data['tclasses'] = $this->tclasses;
        $data['dlessons'] = $this->dlessons;

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
        $data['allStudents'] = $this->allStudents;
        $data['myStudents'] = $this->myStudents;
        $data['tclasses'] = $this->tclasses;
        $data['dlessons'] = $this->dlessons;
        $this->showViews('employee_page',$data); }
        
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
                    
            else if ($this->modelUser->checkUsernameExists($username) && $username!= $this->employee->username ){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
            }
            else {
                $this->modelUser->updateUser($this->employee->idUser, $name, $surname, $address,
                $phone, $jmbg, $email, $username);
                $this->employee = $this->modelUser->getUserById($this->employee->idUser);
                $response['user']= $this->employee;
                
            }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
       
}