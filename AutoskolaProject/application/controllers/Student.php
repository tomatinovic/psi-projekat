<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
        private $curUser;

        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idStudent = $this->session->userdata('userId');
        $this->curUser = $this->modelUser->getUserById($idStudent);
        }
        
        //Funkcija za dohvatanje trenutnog korisnika - polaznika
        public function getStudent(){
            $idStudent = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idStudent));
        }
        
        //Funkcija za dohvatanje svih teorijskih casova
        public function getAllTheoryClasses(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllTheoryClasses());
        }
        
        //Funkcija za dohvatanje grupe za trenutnog studenta
        public function getStudentGroup(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getTheoryGroupForUser($user));
        }
        
        //Funkcija za dohvatanje casova voznje za trenutnog studenta
        public function getStudentDrivingLessons(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getDrivingLessonsForStudent($user));
        }
        
        //Funcija za dohvatanje svih termina ispita
        public function getAllExams(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllExams());
        }
        
        //Funkcija za dohvatanje odabranog termina ispita za studenta
        public function getStudentExamDate(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getStudentExamDate($user));
        }
        
        //Prikazivanje stranice studenta/polaznika
        public function index(){
        $data['msg'] = NULL;
        $data['student'] = $this->curUser;

        $this->load->view('register_confirm_page', $data);  
        }
        
        //Unistavanje sesija i povratak na pocetnu stranicu
        public function logout(){
            $this->session->sess_destroy();
            $this->load->view('welcome_message'); 
        }
        
        //Funcija koja osvezava podatke o bazi o korisniku
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
            
            $user = array(
                'name' => $name,
                'surname' => $surname,
                'phone' => $phone,
                'address' => $address,
                'jmbg' => $jmbg,
                'email'=> $email,
                'username' => $username
            );
            
            if (!validateUpdateUserEmpty($user)){
                 $response['code'] = 0;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
                    }
                    
            else if (!validateUpdateUsername($user, $this->modelUser, $this->curUser) ){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
            }
            else {
                $this->modelUser->updateUser($this->curUser->idUser, $name, $surname, $address,
                $phone, $jmbg, $email, $username);
                $this->curUser = $this->modelUser->getUserById($this->curUser->idUser);
                $response['user']= $this->curUser;    
            }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
       
}