<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/css_file.css'); ?>">
    <script type="text/javascript" src="<?php echo site_url('../public/js/javascript_file.js'); ?>"></script>
    <title> Tomatinovic AS </title>
        
    <style>
        * {box-sizing: border-box;}

        /* The popup form - hidden by default */
        .form-popup {
          display: none;
          position: fixed;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          border: 3px solid #f1f1f1;
          z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
          max-width: 300px;
          padding: 10px;
          background-color: lightgray;
        }
        
        .form-container-reg {
            max-width: 100%;
            padding: 10px;
            background-color: lightgray;
        }

        /* Full-width input fields */
        .form-container input[type=text], .form-container input[type=password] {
          width: 100%;
          height: 10px;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
          border-radius: 5px;
        }

        /* When the inputs get focus, do something */
        .form-container input[type=text]:focus, .form-container input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }

        /* Set a style for the submit/login button */
        .form-container .btn {
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
        .form-container .cancel {
          background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
          opacity: 1;
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
          <button class="tablinks" onclick="openTab(event, 'O_nama')">O nama</button>
          <button class="tablinks" onclick="openTab(event, 'Informacije')">Informacije</button>
          <button class="tablinks" onclick="openTab(event, 'Materijali')">Materijali</button>
          <button class="tablinks" onclick="openTab(event, 'Časovi')">Časovi</button>
        </div>

        <div id="O_nama" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">O nama</p>
          <p class="paragraph">Auto škola Tomatinović je osnovana 2010. godine. Nalazimo se na Vračaru u samom centru grada.
              Priključite se vozačima koji su već proverili kvalitet obuke u našoj školi. Nudimo Vam visoko kvalifikovane instruktore - predavače. </p>
          <p class = "paragraph"> Obuka se vrši na vozilima, PUNTO, Hyundai Atos, Ford Focus i Fiat seicento, uz mogućnost da čas započnete i završite na lokaciji koja vama odgovara. </p>
          <p class = "paragraph" style = "font-weight: bold"> MUŠKI - ŽENSKI INSTRUKTORI. </p>
          <p class = "paragraph">Plaćanje kod nas je u mesečnim ratama bez kartica i čekova.</p>
        </div>

        <div id="Informacije" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Informacije</p>
          <span class="paragraph"><input type="button" class = "button_style" id ="button1" style = "font-weight: bold" value="Zaposleni" onclick="showText('text1', 'text2', 'text3')"/></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button2" class = "button_style" style = "font-weight: bold" value="Kontakt"/></span>
          <p id = "text1" style = "display: none; font-weight: bold; padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Zaposleni:  </p>
          <p id = "text2" style = "display: none; padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Luka Stefanović - već 10 godina radi kao instruktor vožnje. Veoma je dobar u radu sa ljudima i ima sve najbolje preporuke. </p>
          <p id = "text3" style = "display: none; padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Marija Radenković - već 10 godina radi kao instruktor vožnje. Veoma je dobra u radu sa ljudima i ima sve najbolje preporuke. </p>
          
         
          <p class = "paragraph" id = "kontakt1" style = "font-weight: bold; display: none"> Kontakt:  </p>
          <p class = "paragraph" id = "kontakt2" style = "display: none"> Ulica: Beogradska 11a </p>
          <p class = "paragraph" id = "kontakt3" style = "display: none"> email: tomatinovic.as@gmail.com </p>
          <p class = "paragraph" id = "kontakt4" style = "display: none"> Telefon: 064/12-333-45 </p>
          <p class = "paragraph" id = "kontakt5" style = "display: none"> Radno vreme: 09h - 17h, nedelja je neradan dan </p>
            <img id = "kontakt_slika" style="text-align: left; display: none; padding-left: 50px; padding-top: 30px; padding-bottom: 30px" src="<?php echo site_url('../public/images/mapa.png'); ?>" />
        </div>

        <div id="Materijali" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Materijali</p>
          <p class="paragraph">Ovde možete naći linkove ka zanimljivim tekstovima o saobraćaju. Ukoliko želite da imate pristup materijalima sa predavanja, morate da se prijavite na sistem. </p>
          <p class="paragraph"> 
              <a href="https://parking-servis.co.rs/lat/2015/01/05/nalog-za-bezbedno-ponasanje-u-saobracaju/"> Bezbedno ponašanje u saobraćaju </a><br/>
              <a href="https://ilovezrenjanin.com/vesti-zrenjanin/edukacija-za-najmlade-ponasanje-u-saobracaju/"> Edukacija na najmlađe </a><br/>
              <a href="https://www.zdravlje.org.rs/publikacije/lifleti/AGITKA%20ponasanje%20u%20saobracaju.pdf" download> Ponašanje u saobraćaju - PDF </a><br/>
          </p>
        </div>

        <div id="Časovi" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Časovi</p>
          <p class="paragraph"> Termine časova možete pregledati kada se prijavite na sistem. </p>
        </div>
    </div>
    
  <div class = "login_class">
      <?php if(isset($msg)){
       echo "<font color='red'>$msg</font><br>";} ?>
      <form name="loginform" method="post" class = "text_style" action="<?php echo site_url('welcome/login') ?>">
        <label class="title"> Prijava </label><br/><br/><br/>
        Korisnicko ime:<br/><br/>
        <input type="text" name="username" value="<?php echo set_value('username') ?>" /><br/><br/>
        Lozinka:<br/><br/>
        <input type="password" name="password"/><br/><br/> 
 
        <a href ="#" id = "forgot_pass"> Zaboravili ste lozinku? </a><br/><br/>
  
        <input type="submit" class = "button_style" style = "font-weight: bold" value="Prijava"/>
    </form>
    <hr/>
    <form name="registrationform" method="post" class = "text_style"> 
        <label class="title"> Registracija </label><br/><br/><br/>
        Ukoliko želite da postanete <br/> naš član i dobijete dodatne <br/> pogodnosti, registrujte se!<br/><br/>
        <input type="button" class = "button_style" style = "font-weight: bold" value="Registruj me" onclick="openFormReg()"/>
    </form>
  </div> 
  <div style="padding-top: 150px"></div>
  
  <div class="form-popup" id="myForm">
      <form action="<?php echo site_url('welcome/sendMail') ?>" class="form-container" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Zaboravljena lozinka </i></p><br/>

      <label style="font-family: Arial; font-size: 14px; text-align: center"> Korisničko ime: </label>
      <input type="text" placeholder="Unesite korisničko ime" name="usernameForgot" required>

      <label style="font-family:Arial; font-size: 14px; text-align: center"> Email: </label>
      <input type="text" placeholder="Unesite email" name="emailForgot" required>

    <button type="submit" class="btn"> Pošalji </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
  </form>
</div>
  
  <div class="form-popup" id="myFormReg">
      <form action="<?php echo site_url('welcome/register') ?>" class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Registracija </i></p>
      <table>
          <tr>
              <td> <label style="font-family: Arial; font-size: 14px"> Ime: </label> </td>
              <td>  <input type="text" placeholder="Unesite ime" name="nameReg" required> </td>
             <td style="padding-left: 10px; padding-right: 20px"> <label style="font-family:Arial; font-size: 14px"> Prezime: </label> </td>
             <td>   <input type="text" placeholder="Unesite prezime" name="surnameReg" required> </td><br/>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Telefon: </label> </td>
            <td>    <input type="text" placeholder="Unesite telefon" name="phoneReg" required> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Adresa: </label> </td>
            <td>    <input type="text" placeholder="Unesite adresu" name="addressReg" required> </td><br/>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> JMBG: </label> </td>
            <td>      <input type="text" placeholder="Unesite JMBG" name="jmbgReg" required> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Email: </label> </td>
            <td>      <input type="text" placeholder="Unesite email" name="emailReg" required> </td><br/>
          </tr>
          <tr>
            <td style="padding-right: 10px">  <label style="font-family:Arial; font-size: 14px"> Kor. ime: </label> </td>
            <td>      <input type="text" placeholder="Unesite korisničko ime" name="usernameReg" required> </td>
            <td style="padding-left: 10px">  <label style="font-family:Arial; font-size: 14px"> Lozinka: </label> </td>
            <td>      <input type="password" placeholder="Unesite lozinku" name="passwordReg" required> </td><br/>
          </tr>
      </table>
    <button type="submit" class="btn"> Potvrdi </button>
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
  </script>
  <script>
       document.getElementById("forgot_pass").onclick = function() { 
         document.getElementById("myForm").style.display = "block";
};

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("myFormReg").style.display = "none";
}

function openFormReg() {
     document.getElementById("myFormReg").style.display = "block";
}
</script>
</body>
</html>