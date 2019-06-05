<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
        private $curUser;

        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idEmployee = $this->session->userdata('userId');
        $this->curUser = $this->modelUser->getUserById($idEmployee);
        }
       
        //Funkcija za dohvatanje trenutnog korisnika - instruktora
         public function getEmployee(){
            $idEmployee = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idEmployee));
        }
        
        //Funkcija za dohvatanje svih studenata
        public function allStudents(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllStudents());
        }
        
        //Funkcija za dohvatanje svih teorijskih casova
         public function getAllTheoryClasses(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllTheoryClasses());
        }
        
        //Funkcija za dohvatanje studenata(polaznika) trenutnog instruktora
        public function getMyStudents(){
            $idEmployee = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idEmployee);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getStudentsForUser($user));
        }
        
        //Funkcija za dohvatanje casova voznje za trenutnog instruktora
        public function getDrivingLessons(){
            $idEmployee = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idEmployee);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getDrivingLessonsForTeacher($user));
        }

        //Prikaz employee view prozora
       public function index(){
        $data['msg'] = NULL;
        $data['employee'] = $this->curUser;
        $this->load->view('employee_page', $data);  
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
        
        //Provera da li student vec ima casove kod nekoga
        public function checkIsStudentTaken(){
            $idUser = htmlspecialchars($_POST['idUser']);
            $taken = $this->modelUser->checkIsStudentTaken($this->modelUser->getUserById($idUser));
              $response = array(
                    'taken' => $taken
                );
            header("Content-Type: application/json");
            echo json_encode($response);
        }
        
        //Preuzimanje studenta
        public function takeStudent(){
        $idUser = htmlspecialchars($_POST['idUser']);
        $this->modelUser->takeStudent($this->modelUser->getUserById($idUser), $this->curUser);
        
        $response = array(
                    'code' => 0,
                    'msg' => "Uspesno!"
                );
        header("Content-Type: application/json");
            echo json_encode($response);
        }
        
        //Odjava studenta(polaznika)
        public function leaveStudent(){
            $idUser = htmlspecialchars($_POST['idUser']);
            $this->modelUser->leaveStudent($this->modelUser->getUserById($idUser), $this->curUser);

            $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'students' => NULL
                    );
            $response['students'] = $this->modelUser->getStudentsForUser($this->curUser);
            header("Content-Type: application/json");
            echo json_encode($response);
        }
        
        //Funkcija za promenu casa teorije
        public function changeTClasses(){
            $idTClass = htmlspecialchars($_POST['idTClass']);
            $days = htmlspecialchars($_POST['days']);
            $time = htmlspecialchars($_POST['time']);
            
             $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'classes' => NULL
                    );
             
              $class = array(
                'days' => $days,
                'time' => $time
            );
             
             if (!validateChangeTClassEmpty($class)){
                 $response['code'] = 1;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
             }
             else{
                 $this->modelUser->changeTCLass($idTClass, $days, $time);
                 $response['classes'] = $this->modelUser->getAllTheoryClasses();
             }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
        
        //Funkcija za dodavanje novog casa voznje
        public function addDClass(){
            $name = htmlspecialchars($_POST['name']);
            $surname = htmlspecialchars($_POST['surname']);
            $date = htmlspecialchars($_POST['date']);
            $time = htmlspecialchars($_POST['time']);
            
             $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'classes' => NULL
                    );
             
              $class = array(
                'name' => $name,
                'surname' => $surname,
                'date' => $date,
                'time' => $time
            );
             
             if (!validateAddDClassEmpty($class)){
                 $response['code'] = 1;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
             }
             else if (!$this->modelUser->checkStudentForUser($this->curUser, $name, $surname)){
                 $response['code'] = 1;
                 $response['msg'] = "Nije pronadjen vas student po zadatom imenu i prezimenu";
             }
             else{
                 $this->modelUser->addDLesson($this->curUser, $name, $surname, $date, $time);
                 $response['classes'] = $this->modelUser->getDrivingLessonsForTeacher($this->curUser);
             }
            
            header("Content-Type: application/json");
            echo json_encode($response);
            
        }
        
        
        //Uklanjanje casa voznje
        public function removeDClass(){
            $idDClass = htmlspecialchars($_POST['idDClass']);
            $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'classes' => NULL
                    );
            $this->modelUser->deleteDClass($idDClass);
            $response['classes'] = $this->modelUser->getDrivingLessonsForTeacher($this->curUser);
            
            header("Content-Type: application/json");
            echo json_encode($response);
        }
        
        
       
}