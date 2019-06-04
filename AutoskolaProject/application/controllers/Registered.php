<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registered extends CI_Controller {
        private $curUser;
 
        public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");  
        
        if ($this->session->userdata('userId') == NULL) redirect ("Welcome");
        
        $idUser = $this->session->userdata('userId');
        $this->curUser = $this->modelUser->getUserById($idUser);

        }
        
        //Otvaranje prikaza register_page
        public function index(){
        $data['msg'] = NULL;
        $data['user'] = $this->curUser;

        $this->load->view('register_page', $data);  
        }
       
        //Dohvatanje trenutnog korisnika - registrovanog korisnika
        public function getRegistered(){
            $idEmployee = $this->session->userdata('userId');
            header("Content-Type: application/json");
            echo json_encode($this->modelUser->getUserById($idEmployee));
        }
    
        //Dohvatanje svih casova teorije
        public function getAllTheoryClasses(){
         header("Content-Type: application/json");
         echo json_encode($this->modelUser->getAllTheoryClasses());
        }
  
        //Unistavanje sesija i povratak na pocetnu stranu
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