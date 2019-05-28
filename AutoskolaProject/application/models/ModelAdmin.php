<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelAdmin extends CI_Model {
    public $autor;
    
    public function __construct() {
        parent::__construct();
        $this->autor=NULL;
    }
    
    public function getUserById($idUser){
        $query = $this->db->get_where('users', array('idUser' => $idUser));
        return $query->row();
    }
    
    
}