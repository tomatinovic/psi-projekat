<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
        private $student;
        private $tclasses;
        private $myGroup;
        private $dlessons;
        private $allExams;
        private $examDate;

        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idStudent = $this->session->userdata('userId');
        $this->student = $this->modelUser->getUserById($idStudent);
        $this->tclasses = $this->modelUser->getAllTheoryClasses();
        $this->myGroup = $this->modelUser->getTheoryGroupForUser($this->student);
        $this->dlessons = $this->modelUser->getDrivingLessonsForStudent($this->student);
        $this->allExams = $this->modelUser->getAllExams();
        $this->examDate = $this->modelUser->getStudentExamDate($this->student);
        }
        
        public function getStudent(){
            $idStudent = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idStudent));
        }
        
        public function getAllTheoryClasses(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllTheoryClasses());
        }
        
        public function getStudentGroup(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getTheoryGroupForUser($user));
        }
        
        public function getStudentDrivingLessons(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getDrivingLessonsForStudent($user));
        }
        
        public function getAllExams(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllExams());
        }
        
        public function getStudentExamDate(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getStudentExamDate($user));
        }
        
        public function index(){
        $data['msg'] = NULL;
        $data['student'] = $this->student;
        $data['tclasses'] = $this->tclasses;
        $data['myGroup'] = $this->myGroup;
        $data['dlessons'] = $this->dlessons;
        $data['allExams'] = $this->allExams;
        $data['examDate'] = $this->examDate;

        $this->load->view('register_confirm_page', $data);  
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
        $data['student'] = $this->student;
        $data['tclasses'] = $this->tclasses;
        $data['myGroup'] = $this->myGroup;
        $data['dlessons'] = $this->dlessons;
        $data['allExams'] = $this->allExams;
        $data['examDate'] = $this->examDate;
        $this->showViews('register_confirm_page',$data); }
        
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
                    
            else if ($this->modelUser->checkUsernameExists($username) && $username!= $this->student->username ){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
            }
            else {
                $this->modelUser->updateUser($this->student->idUser, $name, $surname, $address,
                $phone, $jmbg, $email, $username);
                $this->student = $this->modelUser->getUserById($this->student->idUser);
                $response['user']= $this->student;
                
            }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
       
}