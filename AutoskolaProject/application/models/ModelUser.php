<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModelUser extends CI_Model {
    public $autor;
    
    public function __construct() {
        parent::__construct();
        $this->autor=NULL;
    }
    
    public function getUsersByUsernameAndPass($username, $password){
        $query = $this->db->get_where('users', array('username' => $username, 'password' => $password));
        //$query->result_array();
        return $query;
    }


//    public function dohvatiAutora($korisnicko_ime){
//        $result=$this->db->where('korisnicko_ime',$korisnicko_ime)->get('autor');
//        $autor=$result->row();
//        if ($autor!=NULL) {
//            $this->autor=$autor;
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }
//    public function ispravanPassword($lozinka){
//        if ($this->autor->lozinka == $lozinka) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }
//    
//    public function dohvatiAutore(){
//        return $this->db->get('autor')->result();
//    }
//    
}
