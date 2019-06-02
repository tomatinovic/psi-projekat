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
            
            else if ($this->modelUser->checkUsernameExists($changeUsername) && $changeUsername!= $this->student->username ){
                $this->changeViewWithMessage("Zauzeto korisnicko ime!");
            }
            else{
                $trimmedNameSurname = trim($changeNameSurname);
                $arr = explode(' ',trim($trimmedNameSurname));
               
                $this->modelUser->updateUser($this->student->idUser, $arr[0], $arr[1], $changeAddress,
                $changePhone, $changeJmbg, $changeEmail, $changeUsername);
                $this->student = $this->modelUser->getUserById($this->student->idUser);
                $this->changeViewWithMessage("Uspesno!");
            }
            
        }
       
}