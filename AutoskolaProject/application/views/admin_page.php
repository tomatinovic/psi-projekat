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
        
         .form-container {
          max-width: 300px;
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
          <table id="empTable" class = "table1">
              <tr>
                  <th class = "table1"> Broj </th>
                  <th class = "table1"> Ime </th>
                  <th class = "table1"> Prezime </th>
                  <th class = "table1"> Detalji </th>
              </tr>
              
              <?php
                foreach ($employees as $emp) {
                    echo "<tr><td>".$emp->idUser."</td><td>".$emp->name."</td><td>".$emp->surname."</td>";
                    echo "<td class = \"table1\"> <input type=\"button\" class ='button_style' style = \"font-weight: bold;\" value=\"Detalji\"";
                    echo "onclick=\"show('$emp->name','$emp->surname','$emp->address','$emp->phone','$emp->jmbg','$emp->email','$emp->username','$emp->idUser')\"/> </td>";
                }
              ?>
              <script>
                var idUser;
            function show(name, surname, address, phone, jmbg, email, username, idUsr) {
                idUser = idUsr;
                document.getElementById("detailsNameSurname").innerHTML = name.toString().concat(' ').concat(surname.toString());
                document.getElementById("detailsAddress").innerHTML = address.toString();
                document.getElementById("detailsPhone").innerHTML = phone.toString();
                document.getElementById("detailsJmbg").innerHTML = jmbg.toString();
                document.getElementById("detailsEmail").innerHTML = email.toString();
                document.getElementById("detailsUsername").innerHTML = username.toString();
        
                $(document).ready(function () {
                createCookie("userId", idUsr, "10");
            });
                openFormDetails();
            }
            
            function createCookie(name, value, days) {
            var expires;
            if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
            } else {
            expires = "";
            }
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
            }
            
            function deleteUser(){
                //alert('Will delete '+idUser);
                
                 if (window.XMLHttpRequest) {
                    objekat = new XMLHttpRequest();
                } else {
                    objekat = new ActiveXObject("Microsoft.XMLHTTP");
                }
                objekat.open("GET", "admin/deleteUser?idUser=" + idUser, true);
                objekat.send();
                var table = document.getElementById("Zaposleni");
                alert(table);
                closeForm();
                
            }
        </script>
              
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
               <?php
                foreach ($students as $emp) {
                    echo "<tr><td>".$emp->idUser."</td><td>".$emp->name."</td><td>".$emp->surname."</td>";
                    echo "<td class = \"table1\"> <input type=\"button\" class ='button_style' style = \"font-weight: bold;\" value=\"Detalji\"";
                    echo "onclick=\"show('$emp->name','$emp->surname','$emp->address','$emp->phone','$emp->jmbg','$emp->email','$emp->username','$emp->idUser')\"/> </td>";
                }
              ?>
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
              <?php
                foreach ($regUsers as $emp) {
                    echo "<tr><td>".$emp->idUser."</td><td>".$emp->name."</td><td>".$emp->surname."</td>";
                    echo "<td class = \"table1\"> <input type=\"button\" class ='button_style' style = \"font-weight: bold;\" value=\"Detalji\"";
                    echo "onclick=\"show('$emp->name','$emp->surname','$emp->address','$emp->phone','$emp->jmbg','$emp->email','$emp->username','$emp->idUser')\"/> </td>";
                }
              ?>
          </table><br/>
        </div>
    </div>
    
  <div class = "register_class">
      <form name="admin_form" id ="admin_form" method="post" class = "text_style" action="<?php echo site_url('admin/logout')?>">
        <label class="title"> Dobrodošao/la <?php echo $admin->name ?> - ADMIN </label><br/><br/><br/>
        <p id = "label1"> <?php echo $admin->name.' '.$admin->surname ?> </p> 
        <p id = "label2"> <?php echo $admin->address ?> </p> 
        <p id = "label3"> <?php echo $admin->phone ?> </p> 
        <p id = "label4"> <?php echo $admin->jmbg ?> </p> 
        <p id = "label5"> <?php echo $admin->email ?> </p>
        <p id = "label6"> <?php echo $admin->username ?> </p>
   
        <input type="button" class = "button_style" id ="changeData1" style = "font-weight: bold; width: 150px !important" value="Promeni podatke"/><br/><br/>
        <input type="submit" class = "button_style" id ="logout_button" style = "font-weight: bold; width: 150px !important" value="Odjava"/>
    </form>

     <?php if(isset($msg)) {
      echo '<div class="form-popup1 form-container" id="messages">';
      echo '<input type = "button" id = "close" style = "font-weight: bold; width: 30px; height: 30px" value="X"/>';
      echo "<label style = 'color: red; padding-left: 10px'>$msg</label><br>";
      echo "</div>"; }  ?>
      
    <form name="admin_form1" id ="admin_form1" method="post" class = "text_style" style="display: none" action="<?php echo site_url('admin/updateUser')?>">    
        <label class="title"> Dobrodošao/la <?php echo $admin->name ?> - ADMIN </label><br/><br/><br/>
        <input type="text" name="changeNameSurname" id ="textbox1" value ="<?php echo $admin->name.' '.$admin->surname ?>" style="margin-bottom: 10px" /> 
         <input type="text" name="changeAddress" id ="textbox2" value = "<?php echo $admin->address ?>" style="margin-bottom: 10px" /> 
          <input type="text" name="changePhone" id ="textbox3" value = "<?php echo $admin->phone ?>" style="margin-bottom: 10px" /> 
           <input type="text" name="changeJmbg" id ="textbox4" value = "<?php echo $admin->jmbg ?>" style="margin-bottom: 10px" /> 
            <input type="text" name="changeEmail" id ="textbox5" value = "<?php echo $admin->email ?>" style="margin-bottom: 10px" /> 
             <input type="text" name="changeUsername" id ="textbox6" value = "<?php echo $admin->username ?>" style="margin-bottom: 10px" />
   
        <input type="submit" class = "button_style" id = "confirm_button" style = "font-weight: bold; width: 150px !important" value="Potvrdi"/><br/><br/>
        <input type="button" class = "button_style" id ="exit_button" style = "font-weight: bold; width: 150px !important" value="Odustani"/>
    </form>
  </div> 
  <div style="padding-top: 300px"></div>
  
  <div class="form-popup" id="myFormRegAdmin">
      <form action="<?php echo site_url('admin/register') ?>" class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Dodavanje zaposlenog </i></p>
      <table>
          <tr>
              <td> <label style="font-family: Arial; font-size: 14px"> Ime: </label> </td>
              <td>  <input type="text"  placeholder="Unesite ime" name="nameRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
             <td style="padding-left: 10px; padding-right: 20px"> <label style="font-family:Arial; font-size: 14px"> Prezime: </label> </td>
             <td>   <input type="text" placeholder="Unesite prezime" name="surnameRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Telefon: </label> </td>
            <td>    <input type="text" placeholder="Unesite telefon" name="phoneRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Adresa: </label> </td>
            <td>    <input type="text" placeholder="Unesite adresu" name="addressRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> JMBG: </label> </td>
            <td>      <input type="text" placeholder="Unesite JMBG" name="jmbgRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Email: </label> </td>
            <td>      <input type="text" placeholder="Unesite email" name="emailRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
          </tr>
          <tr>
            <td style="padding-right: 10px">  <label style="font-family:Arial; font-size: 14px"> Kor. ime: </label> </td>
            <td>      <input type="text" placeholder="Unesite korisničko ime" name="usernameRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Lozinka: </label> </td>
            <td>      <input type="password" placeholder="Unesite lozinku" name="passwordRegA" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"> </td><br/>
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
              <td> <label id="detailsNameSurname" style="font-family: Arial; font-size: 14px"><i> IME I PREZIME </i></label> </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Adresa: </label> </td>
            <td> <label id="detailsAddress" style="font-family: Arial; font-size: 14px"><i> ADRESA </i></label> </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Telefon: </label> </td>
            <td> <label id="detailsPhone" style="font-family: Arial; font-size: 14px"><i> TELEFON </i></label> </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> JMBG: </label> </td>
            <td> <label id="detailsJmbg" style="font-family: Arial; font-size: 14px"><i> JMBG </i></label> </td>
          </tr>
           <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Email: </label> </td>
            <td> <label id="detailsEmail" style="font-family: Arial; font-size: 14px"><i> EMAIL </i></label> </td>
          </tr>
           <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Korisničko ime: </label> </td>
            <td> <label id="detailsUsername" style="font-family: Arial; font-size: 14px"><i> KORISNIČKO IME </i></label> </td>
          </tr>
      </table><br/>
      <button type="button" class="btn" onclick="deleteUser('aaa')"> Obriši </button>
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
           
       document.getElementById("changeData1").onclick = function() { 
            document.getElementById("admin_form").style.display = "none";           
            document.getElementById("admin_form1").style.display = "block";          
      };
      
       document.getElementById("exit_button").onclick = function() { 
            document.getElementById("admin_form").style.display = "block";
            document.getElementById("admin_form1").style.display = "none";
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

document.getElementById("close").onclick = function() { 
     document.getElementById("messages").style.display = "none";
};
      
  </script>
</body>
</html>