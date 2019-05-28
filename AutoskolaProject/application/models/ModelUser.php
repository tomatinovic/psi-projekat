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

 
}
