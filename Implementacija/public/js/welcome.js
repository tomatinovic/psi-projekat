/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Funkcija koja na klik tab-a menja tab content

function openTab(evt, tabName) {   
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";    
}

// Otvoren prvi tab prilikom učitavanja stranice

$(function (){
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById('O_nama').style.display = "block";
    event.currentTarget.className += " active";
});

// Menjanje tab content-a klikom na dugme Zaposleni

document.getElementById("button1").onclick = function() {    
    document.getElementById("zaposleni_div").style.display = "block";
    document.getElementById("kontakt_div").style.display = "none";       
}; 

// Menjanje tab content-a klikom na dugme Kontakt

 document.getElementById("button2").onclick = function() {    
    document.getElementById("zaposleni_div").style.display = "none";           
    document.getElementById("kontakt_div").style.display = "block";       
};

// Prikaz dijaloga za zaboravljenu lozinku

document.getElementById("forgot_pass").onclick = function() { 
    document.getElementById("myForm").style.display = "block";
};

// Zatvaranje dijaloga za prikaz grešaka

document.getElementById("close").onclick = function() { 
    document.getElementById("messages").style.display = "none";
};

// Zatvaranje dijaloga za zaboravljenu lozinku / registraciju
    
function closeForm() {    
    document.getElementById("myForm").style.display = "none";
    document.getElementById("myFormReg").style.display = "none";   
}

// Prikaz dijaloga za registraciju

function openFormReg() {
    document.getElementById("myFormReg").style.display = "block";
}