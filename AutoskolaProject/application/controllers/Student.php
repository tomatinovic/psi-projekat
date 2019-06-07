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
        
        //Funckija za dohvatanje trenutnog korisnika - studenta/polaznika
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
        
        //Funkcija za dohvatanje grupe trenutnog polaznika
        public function getStudentGroup(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getTheoryGroupForUser($user));
        }
        
        //Funkcija za dohvatanje casova voznje trenutnog polaznika
        public function getStudentDrivingLessons(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getDrivingLessonsForStudent($user));
        }
        
        //Funkcija za dohvatanje svih ispita
        public function getAllExams(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllExams());
        }
        
        //Funkcija za dohvatanje odabranog termina polaganja za studenta
        public function getStudentExamDate(){
            $idStudent = $this->session->userdata('userId');
            $user = $this->modelUser->getUserById($idStudent);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getStudentExamDate($user));
        }
        
        //Otvaranje stranice register_confirm_page
        public function index(){
        $data['msg'] = NULL;
        $data['student'] = $this->curUser;
        $this->load->view('register_confirm_page', $data);  
        }
        
        //Unistavanje sesije i povratak na prvu stranicu
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
        
        //Funkcija promene grupe polaznika
        public function changeGroup(){
            $idTClass = htmlspecialchars($_POST['idTClass']);
            $response = array(
                    'code' => 1,
                    'msg' => "",
                    'group' => NULL
                );
        if ($idTClass == ""){
            $response['code'] = 0;
            $response['msg'] = "Molimo upisite broj grupe koju birate!";
        }
        else{
            $this->modelUser->changeGroup($this->curUser, $idTClass);
            $response['group'] = $this->modelUser->getTheoryGroupForUser($this->curUser);
        }
        header("Content-Type: application/json");
        echo json_encode($response);
        }
        
        
         //Funkcija za dodavanje novog casa voznje
        public function addDClass(){
            $date = htmlspecialchars($_POST['date']);
            $time = htmlspecialchars($_POST['time']);
            
             $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'classes' => NULL
                    );
             
              $class = array(
                'date' => $date,
                'time' => $time
            );
             
             if (!validateDateTimeEmpty($class)){
                 $response['code'] = 1;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
             }
             else if($this->modelUser->getTeacherIdForStudent($this->curUser) == null){
                 $response['code'] = 1;
                 $response['msg'] = "Jos uvek niste dodeljeni instruktoru!";
             }
             else{
                 $teacher = $this->modelUser->getUserById($this->modelUser->getTeacherIdForStudent($this->curUser)->idTeacher);
                 $this->modelUser->addDLesson($teacher, $this->curUser->name, $this->curUser->surname, $date, $time);
                 $response['classes'] = $this->modelUser->getDrivingLessonsForStudent($this->curUser);
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
            $response['classes'] = $this->modelUser->getDrivingLessonsForStudent($this->curUser);
            
            header("Content-Type: application/json");
            echo json_encode($response);
        }
        
        //Funckija za prijavljivanje ispita
        public function registerForExam(){
            $idExam = htmlspecialchars($_POST['idExam']);
            
            $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'exams' => NULL,
                        'myExam' => NULL
                    );
          
            if($this->modelUser->getTeacherIdForStudent($this->curUser) == null){
                 $response['code'] = 1;
                 $response['msg'] = "Jos uvek niste dodeljeni instruktoru!";
             }
            else {
                $exam = $this->modelUser->getExamById($idExam);
                if ($exam->free == 0){
                    $response['code'] = 1;
                    $response['msg'] = "Za ovaj termin nema vise slobodnih mesta";
                }
                else{
                    $this->modelUser->changeUpdateExamDate($this->curUser, $exam);
                    $myExam = $this->modelUser->getStudentExamDate($this->curUser);
                    $exams = $this->modelUser->getAllExams();
                    $response['exams'] = $exams;
                    $response['myExam'] = $myExam;
            }
            
       }
           header("Content-Type: application/json");
            echo json_encode($response);
        }
        
        //Funkcija otkazivanja ispita
        public function removeExamDate(){            
            $response = array(
                        'code' => 0,
                        'msg' => "Uspesno!",
                        'exams' => NULL,
                        'myExam' => NULL
                    );
            $myExam = $this->modelUser->getStudentExamDate($this->curUser);
            if ($myExam != NULL){
                $this->modelUser->removeSxheduledExam($myExam);
                $exams = $this->modelUser->getAllExams();
                $response['exams'] = $exams;
                
            }
            else {
                 $response['code'] = 1;
                 $response['msg'] = "Za pocetak odaberite termin polaganja!";
            }
            
            header("Content-Type: application/json");
            echo json_encode($response);
        }
       
}