<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/css_file.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/admin.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title> Tomatinovic AS </title>	
</head>

<body>           
    <div class="row">
        <div class="block1">
            <img style="text-align: left" src="<?php echo site_url('../public/images/slika.png'); ?>" />
        </div>
        <div class="block2 bold_letters">
            <i><center> Auto škola - Tomatinović </center></i>
        </div>
    </div>
    
    <div class = "tab_id">
        <div class="tab">
          <button id="buttonZaposleni" class="tablinks" onclick="openTab(event, 'Zaposleni')"> Zaposleni </button>
          <button id="buttonPolaznici"class="tablinks" onclick="openTab(event, 'Polaznici')"> Polaznici </button>
          <button id="buttonKorisnici" class="tablinks" onclick="openTab(event, 'Korisnici')"> Korisnici </button>
        </div>
    
        <div id="Zaposleni" class="tabcontent">
          <p class="tab_naslov"> Svi zaposleni </p>
          <table id="empTable" class = "table1">
            <tr>
                <th class = "table1"> Broj </th>
                <th class = "table1"> Ime </th>
                <th class = "table1"> Prezime </th>
                <th class = "table1"> Detalji </th>
                  
            </tr>
              
                <!--AJAX PRIKAZUJE ZAPOSLENE -->
              
          </table><br/>
          <label class = "paragraph"> Dodaj novog zaposlenog: </label>
          <input id="adminDodaj" type="button" class = "button_style bold_letters" value="Dodaj" onclick="openFormReg()"/><br/><br/>         
          <p class="paragraph"></p>
        </div>

        <div id="Polaznici" class="tabcontent">
          <p class="tab_naslov"> Svi polaznici </p>
          <table id="adminStudentTable" class = "table1">
            <tr>
                <th class = "table1"> Broj </th>
                <th class = "table1"> Ime </th>
                <th class = "table1"> Prezime </th>
                <th class = "table1"> Detalji </th>
            </tr>
            
                <!--AJAX PRIKAZUJE POLAZNIKE -->
      
          </table><br/>
        </div>

        <div id="Korisnici" class="tabcontent">
          <p class="tab_naslov"> Registrovani korisnici </p>
          <table id = "adminUserTable" class = "table1">
            <tr>
                <th class = "table1"> Broj </th>
                <th class = "table1"> Ime </th>
                <th class = "table1"> Prezime </th>
                <th class = "table1"> Detalji </th>
            </tr>
              
                <!--AJAX PRIKAZUJE REGISTROVANE KORISNIKE -->
        
          </table><br/>
        </div>
    </div>
    
    <div class = "register_class">
        <form name="admin_form" id ="admin_form" method="post" class = "text_style" action="<?php echo site_url('admin/logout')?>">
            <label id='labelWelcome' class="title"></label><br/><br/><br/>
                <p id = "labelNameSurname"></p>
                <p id = "labelAddress"></p>
                <p id = "labelPhone"></p>
                <p id = "labelJmbg"></p>
                <p id = "labelEmail"></p>
                <p id = "labelUsername"></p>

            <input type="button" class = "button_style bold_letters" id ="changeData1" style = "width: 150px !important" value="Promeni podatke"/><br/><br/>
            <input type="submit" class = "button_style bold_letters" id ="logout_button" style = "width: 150px !important" value="Odjava"/>
        </form>
      
        <form name="admin_form1" id ="admin_form1" method="post" class = "text_style" style="display: none">    
            <label class="title"></label><br/><br/><br/>
            <input type="text" name="changeNameSurname" id ="changeNameSurname" class="margin_bottom_10"/> 
            <input type="text" name="changeAddress" id ="changeAddress" class="margin_bottom_10"/> 
            <input type="text" name="changePhone" id ="changePhone" class="margin_bottom_10"/> 
            <input type="text" name="changeJmbg" id ="changeJmbg" class="margin_bottom_10"/> 
            <input type="text" name="changeEmail" id ="changeEmail" class="margin_bottom_10"/> 
            <input type="text" name="changeUsername" id ="changeUsername" class="margin_bottom_10"/>

            <input type="button" class = "button_style bold_letters" id = "admin_confirm_button" style = "width: 150px !important" value="Potvrdi"/><br/><br/>
            <input type="button" class = "button_style bold_letters" id ="exit_button" style = "width: 150px !important" value="Odustani"/>
        </form>
    </div>
    
    <div style="padding-top: 300px"></div>
  
    <div class="form-popup" id="myFormRegAdmin">
        <form if="adminRegForm" class="form-container-reg" method="post">
            <p  class="prijava bold_letters"><i> Dodavanje zaposlenog </i></p>
        <table>
            <tr>
                <td><label class="registracija"> Ime: </label></td>
                <td><input id="adminAddName" type="text"  placeholder="Unesite ime" name="nameRegA"></td>
                <td style="padding-left: 10px; padding-right: 20px"> <label class="registracija"> Prezime: </label></td>
                <td><input id="adminAddSurname" type="text" placeholder="Unesite prezime" name="surnameRegA"> </td><br/>
            </tr>
            <tr>
                <td><label class="registracija"> Telefon: </label></td>
                <td><input id="adminAddPhone" type="text" placeholder="Unesite telefon" name="phoneRegA"></td>
                <td style="padding-left: 10px">  <label class="registracija"> Adresa: </label></td>
                <td><input id="adminAddAddress" type="text" placeholder="Unesite adresu" name="addressRegA"></td><br/>
            </tr>
            <tr>
                <td><label class="registracija"> JMBG: </label></td>
                <td><input id="adminAddJmbg" type="text" placeholder="Unesite JMBG" name="jmbgRegA"></td>
                <td style="padding-left: 10px">  <label class="registracija"> Email: </label></td>
                <td><input id="adminAddEmail" type="text" placeholder="Unesite email" name="emailRegA"></td><br/>
            </tr>
            <tr>
                <td style="padding-right: 10px"><label class="registracija"> Kor. ime: </label></td>
                <td><input id="adminAddUsername" type="text" placeholder="Unesite korisničko ime" name="usernameRegA"></td>
                <td style="padding-left: 10px"><label class="registracija"> Lozinka: </label></td>
                <td><input id="adminAddPassword" type="password" placeholder="Unesite lozinku" name="passwordRegA"></td><br/>
            </tr>
        </table>
        <button id="adminAddEmployee" type="button" class="btn"> Potvrdi </button>
        <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
        </form>
    </div>
  

    <div class="form-popup" id="myFormDetails">
        <form class="form-container-reg" method="post">
            <p class="prijava bold_letters"><i> Detalji </i></p>
            <table>
                <tr>
                    <td><label class="registracija"> Ime i prezime: </label></td>
                    <td><label id="detailsNameSurname" class="registracija"><i> IME I PREZIME </i></label></td>
                </tr>
                <tr>
                    <td><label class="registracija"> Adresa: </label></td>
                    <td><label id="detailsAddress" class="registracija"><i> ADRESA </i></label></td>
                </tr>
                <tr>
                    <td><label class="registracija"> Telefon: </label></td>
                    <td><label id="detailsPhone" class="registracija"><i> TELEFON </i></label></td>
                </tr>
                <tr>
                    <td><label class="registracija"> JMBG: </label></td>
                    <td><label id="detailsJmbg" class="registracija"><i> JMBG </i></label></td>
                </tr>
                <tr>
                    <td><label class="registracija"> Email: </label></td>
                    <td><label id="detailsEmail" class="registracija"><i> EMAIL </i></label></td>
                </tr>
                <tr>
                    <td><label class="registracija"> Korisničko ime: </label></td>
                    <td><label id="detailsUsername" class="registracija"><i> KORISNIČKO IME </i></label></td>
                </tr>
            </table><br/>
            <button type="button" class="btn" id = "deleteButton"> Obriši </button>
            <button type="button" class="btn cancel" onclick="closeForm()"> Nazad </button>
        </form>
    </div>
  
    <div class="form-popup" id="myFormActivation">
        <form class="form-container-reg" method="post">
            <p class="prijava bold_letters"><i> Aktivacija korisnika </i></p>
            <p class="prijava"><i> Da li ste sigurni da želite da aktivirate ovog korisnika? </i></p>
            <button type="button" class="btn" id = "activation_button"> Aktiviraj </button>
            <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
        </form>
    </div>
  
    <script src="<?php echo site_url('../public/js/admin.js'); ?>"></script>
    
</body>

</html>