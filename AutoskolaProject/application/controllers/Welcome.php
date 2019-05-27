<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

       public function __construct() {
        parent::__construct();
        $this->load->model("modelUser");
            require_once('C:wamp64/www/AutoskolaProject/class.smtp.php');
            require_once('C:wamp64/www/AutoskolaProject/class.phpmailer.php');   
        
        
        //provera da li je korisnik mozda vec ulogovan
        /*if (($this->session->userdata('autor')) != NULL) {
            if ($this->session->userdata('autor')->admin == 1) {
                redirect("Admin");
            } else {
                redirect("Korisnik");
            }
        }*/
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        private function showViews($mainPart, $data){
        //$this->load->view("sablon/header_gost.php", $data);
        $this->load->view($mainPart, $data);
        //$this->load->view("sablon/footer.php");
    }
        
        
        public function changeViewWithMessage($msg=NULL)
        {
        $data=[];
        if ($msg) {
            $data['msg'] = $msg;
        }
        $this->showViews('welcome_message',$data); }
    
        
        public function login(){
            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run()){
                $user = $this->input->post('username');
                $password =  $this->input->post('password');
                $query = $this->modelUser->getUsersByUsernameAndPass($user, $password);
                   if ($query->num_rows()==1){
                    echo "WELCOME $user";
                }
                else {
                     $this->changeViewWithMessage("Netacno korisnicko ime ili sifra");
                }
            }
            else {
                $this->changeViewWithMessage("Oba polja moraju biti popunjena!");
            }
        }
        
        public function sendMail(){
            
       
          /*  $user = $this->input->post('usernameForgot');
            $email = $this->input->post('emailForgot');
            
            if($this->modelUser->checkUsernameExists($user)){
            
            $this->email->from('dragfamily@gmail.com', 'Your Name');
            $this->email->to($email);

            $this->email->subject('Email Test');
            $this->email->message('Probaaaaaaaaaaaaaaaaa');
            $this->email->set_mailtype('html');


            $this->email->send();}
            else {
                $this->changeViewWithMessage("Pogresno korisnicko ime!");
            }*/           
                $from  = "tacka.1995@gmail.com";
                $namefrom = "Tacka";
                $mail = new PHPMailer();  
                $mail->CharSet = 'UTF-8';
                $mail->isSMTP();   // by SMTP
                $mail->SMTPAuth   = true;   // user and password
                $mail->Host       = "localhost";
                $mail->Port       = 25;
                $mail->Username   = $from;  
                $mail->Password   = "Volimkosarku1995";
                $mail->SMTPSecure = "";    // options: 'ssl', 'tls' , ''  
                $mail->setFrom($from,$namefrom);   // From (origin)
             //   $mail->addCC($from,$namefrom);      // There is also addBCC
                $mail->Subject  = "Proba";
                $mail->Body = "Cao majstore!";
                $mail->isHTML();   // Set HTML type
              //$mail->addAttachment("attachment");  
                $mail->addAddress("tacka.1995@gmail.com", "Tacka");
                return $mail->send();
        }
        
        public function register(){
            
            $name = $this->input->post('nameReg');
            $surname = $this->input->post('surnameReg');
            $phone = $this->input->post('phoneReg');
            $address = $this->input->post('addressReg');
            $jmbg = $this->input->post('jmbgReg');
            $email = $this->input->post('emailReg');
            $username = $this->input->post('usernameReg');
            $password = $this->input->post('passwordReg');
            
            if($this->modelUser->checkUsernameExists($username)){
                 $this->changeViewWithMessage("Korisnicko ime zauzeto!");
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
                        'password' => $password
                        );  
                   
                   $this->db->insert('users',$data);  
                   $this->changeViewWithMessage("USPESNO!");
                
            }            
        }
        
}
