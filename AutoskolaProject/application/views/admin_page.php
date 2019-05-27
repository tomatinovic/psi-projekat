<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/css_file.css'); ?>">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('../public/js/javascript_file.js'); ?>"></script>
    <title> Tomatinovic AS </title>
        
    <style>
        * {box-sizing: border-box;}
        
        .register_class {
            margin-left: 70%;
            width: 20%;
            border-style: solid;
            border-width: 5px 5px 5px 5px;
            background-color: #C0C0C0;
        }
        
        table.table1 {
            font-family: Arial;
            border-collapse: collapse;
            width: 80%;
            margin-left: 20px;
        }

        th.table1, td.table1 {
            font-family: Arial;
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
         .form-popup {
          display: none;
          position: fixed;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          border: 3px solid #f1f1f1;
          z-index: 9;
        }
        
        .form-container-reg {
            max-width: 100%;
            padding: 10px;
            background-color: lightgray;
        }
        
        .form-popup1 {
          display: block;
          position: fixed;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          border: 3px solid #f1f1f1;
          z-index: 9;
        }
        
        /* Full-width input fields */
        .form-container-reg input[type=text], .form-container-reg input[type=password] {
          width: 100%;
          height: 10px;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
          border-radius: 5px;
        }

        /* When the inputs get focus, do something */
        .form-container-reg input[type=text]:focus, .form-container-reg input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container-reg .btn {
          background-color: black;
          border-radius: 5px;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          width: 100%;
          margin-bottom:10px;
          opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container-reg .cancel {
          background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container-reg .btn:hover, .open-button:hover {
          opacity: 1;
        }
    </style>
	
</head>
<body>           
    <div class="row">
        <div class="block1" style="margin-top:20px; margin-left: 50px; margin-bottom: 100px">
            <img style="text-align: left" src="<?php echo site_url('../public/images/slika.png'); ?>" />
        </div>
        <div class="block2" style="margin-top:20px; margin-bottom: 160px; font-family: Arial; font-size: 48px; color:white; font-weight: bold">
            <i><center> Auto škola - Tomatinović </center></i>
        </div>
    </div>
    
    <div class = "tab_id">
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'Zaposleni')">Zaposleni</button>
          <button class="tablinks" onclick="openTab(event, 'Polaznici')">Polaznici</button>
          <button class="tablinks" onclick="openTab(event, 'Korisnici')">Korisnici</button>
        </div>

        <div id="Zaposleni" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Svi zaposleni</p>
          <table class = "table1">
              <tr>
                  <th class = "table1"> Broj </th>
                  <th class = "table1"> Ime </th>
                  <th class = "table1"> Prezime </th>
                  <th class = "table1"> Detalji </th>
              </tr>
              <tr>
                  <td class = "table1"> 1 </td>
                  <td class = "table1"> IME </td>
                  <td class = "table1"> PREZIME </td>
                  <td class = "table1"> <input type="button" class ='button_style' style = "font-weight: bold;" value="Detalji" onclick="openFormDetails()"/> </td>
              </tr>
          </table><br/>
          <label class = "paragraph"> Dodaj novog zaposlenog: </label>
          <input type="button" class = "button_style" style = "font-weight: bold;" value="Dodaj" onclick="openFormReg()"/><br/><br/>
          
          <p class="paragraph"></p>
        </div>

        <div id="Polaznici" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Svi polaznici</p>
          <table class = "table1">
              <tr>
                  <th class = "table1"> Broj </th>
                  <th class = "table1"> Ime </th>
                  <th class = "table1"> Prezime </th>
                  <th class = "table1"> Detalji </th>
              </tr>
              <tr>
                  <td class = "table1"> 1 </td>
                  <td class = "table1"> IME </td>
                  <td class = "table1"> PREZIME </td>
                  <td class = "table1"> <input type="button" class ='button_style' style = "font-weight: bold;" value="Detalji" onclick="openFormDetails()"/> </td>
              </tr>
          </table><br/>
        </div>

        <div id="Korisnici" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Registrovani korisnici</p>
          <table class = "table1">
              <tr>
                  <th class = "table1"> Broj </th>
                  <th class = "table1"> Ime </th>
                  <th class = "table1"> Prezime </th>
                  <th class = "table1"> Detalji </th>
              </tr>
              <tr>
                  <td class = "table1"> 1 </td>
                  <td class = "table1"> IME </td>
                  <td class = "table1"> PREZIME </td>
                  <td class = "table1"> <input type="button" class ='button_style' style = "font-weight: bold;" value="Aktiviraj" onclick="openFormActivation()"/> </td>
              </tr>
          </table><br/>
        </div>
    </div>
    
  <div class = "register_class">
      <form name="student_form" method="post" class = "text_style">
        <label class="title"> Dobrodošao/la IME - ADMIN </label><br/><br/><br/>
        <p id = "label1"> IME I PREZIME </p> 
        <p id = "label2"> ULICA </p> 
        <p id = "label3"> TELEFON </p> 
        <p id = "label4"> JMBG </p> 
        <p id = "label5"> EMAIL </p>
        <p id = "label6"> KORISNIČKO IME </p>
        <input type="text" id ="textbox1" value ="IME I PREZIME" style="display:none; margin-bottom: 10px" /> 
         <input type="text" id ="textbox2" value = "ULICA" style="display:none; margin-bottom: 10px" /> 
          <input type="text" id ="textbox3" value = "TELEFON" style="display:none; margin-bottom: 10px" /> 
           <input type="text" id ="textbox4" value = "JMBG" style="display:none; margin-bottom: 10px" /> 
            <input type="text" id ="textbox5" value = "EMAIL" style="display:none; margin-bottom: 10px" /> 
             <input type="text" id ="textbox6" value = "KORISNIČKO IME" style="display:none; margin-bottom: 10px" />
   
        <input type="button" class = "button_style" id ="changeData" style = "font-weight: bold; width: 150px !important" value="Promeni podatke"/><br/><br/>
        <input type="button" class = "button_style" id ="logout_button" style = "font-weight: bold; width: 150px !important" value="Odjava"/>
        <input type="button" class = "button_style" id ="exit_button" style = "font-weight: bold; width: 150px !important; display: none" value="Odustani"/>
    </form>
  </div> 
  <div style="padding-top: 300px"></div>
  
  <div class="form-popup" id="myFormRegAdmin">
      <form action="<?php echo site_url('welcome/register') ?>" class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Dodavanje zaposlenog </i></p>
      <table>
          <tr>
              <td> <label style="font-family: Arial; font-size: 14px"> Ime: </label> </td>
              <td>  <input type="text" placeholder="Unesite ime" name="nameReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
             <td style="padding-left: 10px; padding-right: 20px"> <label style="font-family:Arial; font-size: 14px"> Prezime: </label> </td>
             <td>   <input type="text" placeholder="Unesite prezime" name="surnameReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Telefon: </label> </td>
            <td>    <input type="text" placeholder="Unesite telefon" name="phoneReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Adresa: </label> </td>
            <td>    <input type="text" placeholder="Unesite adresu" name="addressReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> JMBG: </label> </td>
            <td>      <input type="text" placeholder="Unesite JMBG" name="jmbgReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Email: </label> </td>
            <td>      <input type="text" placeholder="Unesite email" name="emailReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
          <tr>
            <td style="padding-right: 10px">  <label style="font-family:Arial; font-size: 14px"> Kor. ime: </label> </td>
            <td>      <input type="text" placeholder="Unesite korisničko ime" name="usernameReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Lozinka: </label> </td>
            <td>      <input type="password" placeholder="Unesite lozinku" name="passwordReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
      </table>
    <button type="submit" class="btn"> Potvrdi </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
  </form>
</div>
  
<div class="form-popup" id="myFormDetails">
      <form class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Detalji </i></p>
      <table>
          <tr>
              <td> <label style="font-family: Arial; font-size: 14px"> Ime i prezime: </label> </td>
              <td> <label style="font-family: Arial; font-size: 14px"><i> IME I PREZIME </i></label> </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Adresa: </label> </td>
            <td> <label style="font-family: Arial; font-size: 14px"><i> ADRESA </i></label> </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Telefon: </label> </td>
            <td> <label style="font-family: Arial; font-size: 14px"><i> TELEFON </i></label> </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> JMBG: </label> </td>
            <td> <label style="font-family: Arial; font-size: 14px"><i> JMBG </i></label> </td>
          </tr>
           <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Email: </label> </td>
            <td> <label style="font-family: Arial; font-size: 14px"><i> EMAIL </i></label> </td>
          </tr>
           <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Korisničko ime: </label> </td>
            <td> <label style="font-family: Arial; font-size: 14px"><i> KORISNIČKO IME </i></label> </td>
          </tr>
      </table><br/>
    <button type="submit" class="btn"> Obriši </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Nazad </button>
  </form>
</div>
  
<div class="form-popup" id="myFormActivation">
      <form class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Aktivacija korisnika </i></p>
      <p style="font-family:Arial; font-size: 14px; text-align: center"><i> Da li ste sigurni da želite da aktivirate ovog korisnika? </i></p>
    <button type="submit" class="btn"> Aktiviraj </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
  </form>
</div>
  
        
  <script>
      
      document.getElementById("button1").onclick = function() { 
            document.getElementById("text1").style.display = "block";
            document.getElementById("text2").style.display = "block"; 
            document.getElementById("text3").style.display = "block";
            
            document.getElementById("kontakt1").style.display = "none"; 
            document.getElementById("kontakt2").style.display = "none"; 
            document.getElementById("kontakt3").style.display = "none"; 
            document.getElementById("kontakt4").style.display = "none"; 
            document.getElementById("kontakt5").style.display = "none";
            document.getElementById("kontakt_slika").style.display = "none"; 
      }; 
      
       document.getElementById("button2").onclick = function() { 
            document.getElementById("text1").style.display = "none";
            document.getElementById("text2").style.display = "none"; 
            document.getElementById("text3").style.display = "none";
            
            document.getElementById("kontakt1").style.display = "block"; 
            document.getElementById("kontakt2").style.display = "block"; 
            document.getElementById("kontakt3").style.display = "block"; 
            document.getElementById("kontakt4").style.display = "block"; 
            document.getElementById("kontakt5").style.display = "block";
            document.getElementById("kontakt_slika").style.display = "block"; 
      }; 
      
       document.getElementById("changeData").onclick = function() { 
            document.getElementById("label1").style.display = "none";
            document.getElementById("label2").style.display = "none";
            document.getElementById("label3").style.display = "none";
            document.getElementById("label4").style.display = "none";
            document.getElementById("label5").style.display = "none";
            document.getElementById("label6").style.display = "none";
            
            document.getElementById("textbox1").style.display = "block";
            document.getElementById("textbox2").style.display = "block";
            document.getElementById("textbox3").style.display = "block";
            document.getElementById("textbox4").style.display = "block";
            document.getElementById("textbox5").style.display = "block";
            document.getElementById("textbox6").style.display = "block";
            
            document.getElementById("exit_button").style.display = "block";
            document.getElementById("logout_button").style.display = "none";
            

      };
      
       document.getElementById("exit_button").onclick = function() { 
            document.getElementById("label1").style.display = "block";
            document.getElementById("label2").style.display = "block";
            document.getElementById("label3").style.display = "block";
            document.getElementById("label4").style.display = "block";
            document.getElementById("label5").style.display = "block";
            document.getElementById("label6").style.display = "block";
            
            document.getElementById("textbox1").style.display = "none";
            document.getElementById("textbox2").style.display = "none";
            document.getElementById("textbox3").style.display = "none";
            document.getElementById("textbox4").style.display = "none";
            document.getElementById("textbox5").style.display = "none";
            document.getElementById("textbox6").style.display = "none";
            
            document.getElementById("exit_button").style.display = "none";
            document.getElementById("logout_button").style.display = "block";
            

      };
      
          
function closeForm() {
    document.getElementById("myFormRegAdmin").style.display = "none";
    document.getElementById("myFormDetails").style.display = "none";
    document.getElementById("myFormActivation").style.display = "none";
}

function openFormReg() {
    document.getElementById("myFormRegAdmin").style.display = "block";
}

function openFormDetails() {
    document.getElementById("myFormDetails").style.display = "block";
}

function openFormActivation() {
    document.getElementById("myFormActivation").style.display = "block";
}
      
  </script>
</body>
</html>