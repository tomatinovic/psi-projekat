<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelUser extends CI_Model {
  
   
     public function __construct() {
        parent::__construct();
    }
    
    public function getUserById($idUser){
        $query = $this->db->get_where('users', array('idUser' => $idUser));
        return $query->row();
    }
    
    public function getUserByUsername($username){
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }
    
    public function getUsersByUsernameAndPass($username, $password){
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        return $query;
    }
    
    public function checkUsernameExists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if ($query->num_rows() >= 1) {return TRUE;}
        else {return FALSE;}
    }
    
    public function getUserType($username){
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }
    
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
    
    public function getAllEmployees(){
        $query = $this->db->get_where('users', array('type' => 1));
        return $query->result();
    }
    
    public function getAllStudents(){
        $query = $this->db->get_where('users', array('type' => 2));
        return $query->result();
    }
    
    public function activateUser($idUser){
        $this->db->set('type', 2);
        $this->db->where('idUser', $idUser);
        $this->db->update('users');
    }
    
    public function getAllRegUsers(){
        $query = $this->db->get_where('users', array('type' => 3));
        return $query->result();
    }
    
    public function getStudentsForUser($user){
       $query = $this->db->get_where('teaching', array('idTeacher' => $user->idUser));
       $rows = $query->result();
       $students = array();
       foreach ($rows as $row){
           array_push($students,$this->getUserById($row->idStudent));
       }
       return $students;
    }
    
    public function getAllTheoryClasses(){
        $string = "SELECT users.name, users.surname, theoryclass.day, theoryclass.time, theoryclass.idTClass".
                 " FROM theoryclass".
                 " INNER JOIN users ON theoryclass.idTeacher=users.idUser";
        $query = $this->db->query($string);
        return $query->result();
    }
    
    public function getDrivingLessonsForTeacher($user){
        $string = "SELECT users.idUser, users.name, users.surname, drivinglessons.date, drivinglessons.time, drivinglessons.done, drivinglessons.idLesson".
                 " FROM drivinglessons".
                 " INNER JOIN users ON drivinglessons.idStudent=users.idUser".
                 " WHERE drivinglessons.idTeacher=".$user->idUser;
        $query = $this->db->query($string);
        return $query->result();
    }
    
    public function getDrivingLessonsForStudent($user){
        $string = "SELECT users.idUser, users.name, users.surname, drivinglessons.date, drivinglessons.time, drivinglessons.done, drivinglessons.idLesson".
                 " FROM drivinglessons".
                 " INNER JOIN users ON drivinglessons.idStudent=users.idUser".
                 " WHERE drivinglessons.idStudent=".$user->idUser;
        $query = $this->db->query($string);
        return $query->result();
    }
    
    public function getGroupForUser($user){
        $query = $this->db->get_where('assignedgroup', array('idStudent' => $user->idUser));
        return $query->row();
    }
    
    public function getTheoryGroupForUser($user){
         $groupId = $this->getGroupForUser($user); 
         $string = "SELECT users.idUser, users.name, users.surname, theoryclass.day, theoryclass.time, theoryclass.idTClass".
                 " FROM theoryclass".
                 " INNER JOIN users ON theoryclass.idTeacher=users.idUser".
                 " WHERE theoryclass.idTClass=".$groupId->idTClass;
          $query = $this->db->query($string);
          return $query->row();
    }
    
    public function getAllExams(){
        $query = $this->db->get_where('exam');
        return $query->result();
    }
    
    public function getStudentExamDate($user){
        $query = $this->db->get_where('examlist', array('idStudent' => $user->idUser));
        $exam = $query->row();
        $query = $this->db->get_where('exam', array('idExam' => $exam->idExam));
        return $query->row();
    }

 
}
