<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
       private $admin;
       private $curUser;
    
       public function __construct() {
        parent::__construct();
        $this->load->model("modelUser"); 
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idAdmin = $this->session->userdata('userId');
        $this->curUser = $this->modelUser->getUserById($idAdmin);
        }
        
        //Funkcija koja vraca trenutnog korisnika - admina
        public function getAdmin(){
            $idAdmin = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idAdmin));
        }
        
        //Funkcija koja vraca korisnika sa prosledjenim ID-jem 
        public function getUser(){
            $idUser = htmlspecialchars($_POST['idUser']);
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idUser));
        }
        
        //Funkcija koja vraca sve zaposlene u vidu JSON niza
        public function allEmployees(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllEmployees());
        }
        
        //Funkcija koja vraca sve studente
        public function allStudents(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllStudents());
        }
        
        //Funkcija koja vraca sve registrovane korisnike
        public function allUsers(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllRegUsers());
        }
        
        //Otvaranje admin view strane
        public function index(){
        $data['msg'] = NULL;
        $data['admin'] = $this->curUser;
        $this->load->view('admin_page', $data);  
        }
    
        //Unistavanje svih sesija i povratak na pocetnu stranu
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
        
      //Funkcija za brisanje korisnika sa zadatim ID-jem i vracanje niza u zavisnosti od tipa obrisanog korisnika
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
        
        //Funkcija za registraciju novog zaposlenog
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
                
                $user = array(
                'name' => $name,
                'surname' => $surname,
                'phone' => $phone,
                'address' => $address,
                'jmbg' => $jmbg,
                'email'=> $email,
                'username' => $username, 
                'password' => $password
            );
           
            if (!validateRegisterEmployeeEmpty($user)){
                 $response['code'] = 0;
                 $response['msg'] = "Sva polja moraju biti popunjena!";
                    }
            else if($this->modelUser->checkUsernameExists($username)){
                 $response['code'] = 0;
                 $response['msg'] = "Zauzeto korisnicko ime!";
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
            
            
            //Aktivacija registrovanih korisnika u studente
            public function activateUser(){
                $idUser = htmlspecialchars($_POST['idUser']);
                $this->modelUser->activateUser($idUser);
                header("Content-Type: application/json");
                echo json_encode($this->modelUser->getAllRegUsers());
            }
            
     
        
}