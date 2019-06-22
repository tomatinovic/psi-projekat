<?php

/*
 Model klasa za manipulaciju bazom podataka
 */

class ModelUser extends CI_Model {
  
   
     public function __construct() {
        parent::__construct();
    }
    
    //Dohvatanje korisnika po ID-u
    public function getUserById($idUser){
        $query = $this->db->get_where('users', array('idUser' => $idUser));
        return $query->row();
    }
   
    //Dohvatanje korisnika po korisnickom imenu
    public function getUserByUsername($username){
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }
    
    //Dohvatanje korisnika po korisnickom imenu i sifri
    public function getUsersByUsernameAndPass($username, $password){
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query;
    }
    
    //Provera da li postoji korisnicko ime u bazi
    public function checkUsernameExists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if ($query->num_rows() >= 1) {return TRUE;}
        else {return FALSE;}
    }
    
    //Dohvatanje tipa korisnika - admin, instruktor, polaznik, registrovani korisnik
    public function getUserType($username){
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }
    
    //Update-ovanje novih podataka u bazi
    public function updateUser($idUser, $name, $surname, $address, $phone, $jmbg, $email, $username){
        
        $this->db->set('name', $name);
        $this->db->set('surname', $surname);
        $this->db->set('address', $address);
        $this->db->set('phone', $phone);
        $this->db->set('jmbg', $jmbg);
        $this->db->set('email', $email);
        $this->db->set('username', $username);
        $this->db->where('idUser', $idUser);
        $this->db->update('users'); 
        
    }
    
    //Dohvatanje svih zaposlenih
    public function getAllEmployees(){
        $query = $this->db->get_where('users', array('type' => 1));
        return $query->result();
    }
    
    //Dohvatanje svih studenata
    public function getAllStudents(){
        $query = $this->db->get_where('users', array('type' => 2));
        return $query->result();
    }
    
    //Aktivacija korisnika u polaznika
    public function activateUser($idUser){
        $this->db->set('type', 2);
        $this->db->where('idUser', $idUser);
        $this->db->update('users');
    }
    
    //Dohvatanje svih registrovanih korisnika
    public function getAllRegUsers(){
        $query = $this->db->get_where('users', array('type' => 3));
        return $query->result();
    }
    
    //Dohvatanje studenata dodeljenih profesoru
    public function getStudentsForUser($user){
       $query = $this->db->get_where('teaching', array('idTeacher' => $user->idUser));
       $rows = $query->result();
       $students = array();
       foreach ($rows as $row){
           array_push($students,$this->getUserById($row->idStudent));
       }
       return $students;
    }
    
    //Dohvatanje profesora dodeljenog studentu
    public function getTeacherIdForStudent($student){
       $query = $this->db->get_where('teaching', array('idStudent' => $student->idUser));
       return $query->row();
    }
    
    //Dohvatanje sivh teorijskih casova
    public function getAllTheoryClasses(){
        $string = "SELECT users.name, users.surname, theoryclass.day, theoryclass.time, theoryclass.idTClass".
                 " FROM theoryclass".
                 " INNER JOIN users ON theoryclass.idTeacher=users.idUser";
        $query = $this->db->query($string);
        return $query->result();
    }
    
    //Dohvatanje casova voznje za instruktora
    public function getDrivingLessonsForTeacher($user){
        $string = "SELECT users.idUser, users.name, users.surname, drivinglessons.date, drivinglessons.time, drivinglessons.done, drivinglessons.idLesson".
                 " FROM drivinglessons".
                 " INNER JOIN users ON drivinglessons.idStudent=users.idUser".
                 " WHERE drivinglessons.idTeacher=".$user->idUser;
        $query = $this->db->query($string);
        return $query->result();
    }
    
    //Dohvatanje casova voznje za polaznika
    public function getDrivingLessonsForStudent($user){
        $string = "SELECT users.idUser, users.name, users.surname, drivinglessons.date, drivinglessons.time, drivinglessons.done, drivinglessons.idLesson".
                 " FROM drivinglessons".
                 " INNER JOIN users ON drivinglessons.idStudent=users.idUser".
                 " WHERE drivinglessons.idStudent=".$user->idUser;
        $query = $this->db->query($string);
        return $query->result();
    }
    
    //Dohvatanje dodeljene grupe za polaznika
    public function getGroupForUser($user){
        $query = $this->db->get_where('assignedgroup', array('idStudent' => $user->idUser));
        return $query->row();
    }
    
    //Dohvatanje teorijskog casa dodeljeg polazniku
    public function getTheoryGroupForUser($user){
         $groupId = $this->getGroupForUser($user); 
         $string = "SELECT users.idUser, users.name, users.surname, theoryclass.day, theoryclass.time, theoryclass.idTClass".
                 " FROM theoryclass".
                 " INNER JOIN users ON theoryclass.idTeacher=users.idUser".
                 " WHERE theoryclass.idTClass=".$groupId->idTClass;
          $query = $this->db->query($string);
          return $query->row();
    }
    
    //Dohvatanje svih termina polaganja
    public function getAllExams(){
        $query = $this->db->get_where('exam');
        return $query->result();
    }
    
    //Dohvatanje odabranog termina polaganja
    public function getStudentExamDate($user){
        $query = $this->db->get_where('examlist', array('idStudent' => $user->idUser));
        if ($query->num_rows() >= 1) {
        $exam = $query->row();
        $query = $this->db->get_where('exam', array('idExam' => $exam->idExam));
        return $query->row();}
        return NULL;
    }
    
    //Dohvatanje termina polaganja po ID-ju termina
    public function getExamById($idExam){
        $query = $this->db->get_where('exam', array('idExam' => $idExam));
        return $query->row();
    }
    
    //Provera da li je polaznik vec dodeljen nekom instruktoru
    public function checkIsStudentTaken($user){
        $query = $this->db->get_where('teaching', array('idStudent' => $user->idUser));
        if ($query->num_rows() >= 1) {return TRUE;}
        else {return FALSE;}
    }
    
    //Preuzimanje studenta
    public function takeStudent($user, $teacher){
        $query = $this->db->get_where('teaching', array('idStudent' => $user->idUser));
        if ($query->num_rows() >= 1) {
            $this->updateTeaching($teacher->idUser, $user->idUser);
        }
        else {
             $data = array(  
                        'idTeacher' => $teacher->idUser,  
                        'idStudent' => $user->idUser
                        );  
            $this->db->insert('teaching',$data);
        }
    }
    
    //Update teaching tabele
    public function updateTeaching($idTeacher, $idStudent){
        $this->db->set('idTeacher', $idTeacher);
        $this->db->where('idStudent', $idStudent);
        $this->db->update('teaching'); 
    }
    
    //Odjavljivanje polaznika
    public function leaveStudent($user, $teacher){
           $this->db->delete('teaching', array('idTeacher' => $teacher->idUser,'idStudent' => $user->idUser ));
    }
    
    //Update teorijskog termina
    public function changeTCLass($idTClass, $days, $time){
        $this->db->set('day', $days);
        $this->db->set('time', $time);
        $this->db->where('idTClass', $idTClass);
        $this->db->update('theoryclass'); 
    }
    
    //Provera da li je polaznik dodeljen instruktoru
    public function checkStudentForUser($user, $name, $surname){
        if (!$this->checkExiatsUserByNameAndSurname($name, $surname)) return FALSE;
        $student = $this->getUserByNameAndSurname($name, $surname);
        if (!$this->checkIsTeacher($user, $student))return FALSE;
        return TRUE;
    }
    
    //Provera da li korisnik postoji po imenu i prezimenu
    public function checkExiatsUserByNameAndSurname($name, $surname){
        $query = $this->db->get_where('users', array('name' => $name, 'surname' => $surname));
        if ($query->num_rows() >= 1) return TRUE;
        else return FALSE;
    }
    
    //Dohvatanje korisnika po imenu i prezimenu
    public function getUserByNameAndSurname($name, $surname){
        $query = $this->db->get_where('users', array('name' => $name, 'surname' => $surname));
        return $query->row();
    }
    
    //Provera da li je to instruktor dodeljen studentu
    public function checkIsTeacher($teacher, $student){
        $query = $this->db->get_where('teaching', array('idTeacher' => $teacher->idUser, 'idStudent' => $student->idUser));
        if ($query->num_rows() >= 1) return TRUE;
        else return FALSE;
    }
    
    //Dodavanje casa voznje
    public function addDLesson($teacher, $name, $surname, $date, $time){
        $student = $this->getUserByNameAndSurname($name, $surname);
        $data = array(  
                        'idTeacher'     => $teacher->idUser,  
                        'idStudent' => $student->idUser,
                        'date' => $date,
                        'time' => $time,
                        'done' => 0
                        );  
            $this->db->insert('drivinglessons',$data);
    }
    
    //Brisanje casa voznje
    public function deleteDClass($idDClass){
           $this->db->delete('drivinglessons', array('idLesson' => $idDClass ));
    }
    
    //Promena grupe teorijskog casa
    public function changeGroup($student, $idTClass){
        $query = $this->db->get_where('assignedgroup', array('idStudent' => $student->idUser));
        if ($query->num_rows() >=1){
            $this->db->set('idTClass', $idTClass);
            $this->db->where('idStudent', $student->idUser);
            $this->db->update('assignedgroup'); 
        
        }
        else {
            $data = array(  
                        'idTClass'     => $idTClass,  
                        'idStudent' => $student->idUser
                        );  
            $this->db->insert('assignedgroup',$data);
        }
        
    }
    
    //Promena ili dodavanje termina polaganja
    public function changeUpdateExamDate($student, $exam){
        $query = $this->db->get_where('examlist', array('idStudent' => $student->idUser));
        if ($query->num_rows() >=1){
            $oldExam = $this->getExamById($query->row()->idExam);
            $this->increseFreeSpaceExam($oldExam);
            $this->db->set('idExam', $exam->idExam);
            $this->db->where('idStudent', $student->idUser);
            $this->db->update('examlist'); 
            $this->decreseFreeSpaceExam($exam);
            
        }
        else {
            $data = array(  
                        'idExam'     => $exam->idExam,  
                        'idStudent' => $student->idUser
                        );  
            $this->db->insert('examlist',$data);
            $this->decreseFreeSpaceExam($exam);
        }
    
    }
    
    //Decrement broja slobodnih mesta za polaganje
    public function decreseFreeSpaceExam($exam){
        $this->db->set('free', $exam->free - 1);
        $this->db->where('idExam', $exam->idExam);
        $this->db->update('exam'); 
    }
    
    //Increment broja slobodnih mesta za polaganje
    public function increseFreeSpaceExam($exam){
        $this->db->set('free', $exam->free + 1);
        $this->db->where('idExam', $exam->idExam);
        $this->db->update('exam'); 
    }
    
    //Brisanje termina polaganja
    public function removeSxheduledExam($exam){
        $this->db->delete('examlist', array('idExam' => $exam->idExam));
        $this->increseFreeSpaceExam($exam);
    }

 
}
