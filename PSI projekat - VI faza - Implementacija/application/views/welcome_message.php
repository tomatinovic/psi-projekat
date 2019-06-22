<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/css_file.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/welcome.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title> Tomatinovic AS </title>	
</head>

<body>         
    <div class="row">
        <div class="block1">
            <img style="text-align: left" src="<?php echo site_url('../public/images/slika.png'); ?>" />
        </div>
        <div class="block2">
            <i> Auto škola - Tomatinović </i>
        </div>
    </div>
    
    <div class = "tab_id">
        <div class="tab">
          <button class="tablinks" onclick="openTab(event, 'O_nama')"> O nama </button>
          <button class="tablinks" onclick="openTab(event, 'Informacije')"> Informacije </button>
          <button class="tablinks" onclick="openTab(event, 'Materijali')"> Materijali </button>
          <button class="tablinks" onclick="openTab(event, 'Časovi')"> Časovi </button>
        </div>

        <div id="O_nama" class="tabcontent">
          <p class = "tab_naslov"> O nama </p>
          <p class="paragraph"> Auto škola Tomatinović je osnovana 2010. godine. Nalazimo se na Vračaru u samom centru grada.
                               Priključite se vozačima koji su već proverili kvalitet obuke u našoj školi. Nudimo Vam visoko kvalifikovane instruktore - predavače. </p>
          <p class = "paragraph"> Obuka se vrši na vozilima, PUNTO, Hyundai Atos, Ford Focus i Fiat seicento, uz mogućnost da čas započnete i završite na lokaciji koja vama odgovara. </p>
          <p class = "paragraph bold_letters"> MUŠKI - ŽENSKI INSTRUKTORI. </p>
          <p class = "paragraph"> Plaćanje kod nas je u mesečnim ratama bez kartica i čekova. </p>
        </div>

        <div id="Informacije" class="tabcontent">
          <p class = "tab_naslov"> Informacije </p>
          <span class="paragraph"><input type="button" class = "button_style bold_letters" id ="button1" value="Zaposleni" onclick="showText('text1', 'text2', 'text3')"/></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button2" class = "button_style bold_letters" value="Kontakt"/></span>
          <div id ="zaposleni_div">
            <p class = "zaposleni bold_letters"> Zaposleni: </p>
            <p class = "zaposleni"> Luka Stefanović - već 10 godina radi kao instruktor vožnje. Veoma je dobar u radu sa ljudima i ima sve najbolje preporuke. </p>
            <p class = "zaposleni"> Marija Radenković - već 10 godina radi kao instruktor vožnje. Veoma je dobra u radu sa ljudima i ima sve najbolje preporuke. </p>
          </div>
          <div id ="kontakt_div" class = "display_none">
            <p class = "paragraph bold_letters"> Kontakt: </p>
            <p class = "paragraph"> Ulica: Beogradska 11a </p>
            <p class = "paragraph"> email: tomatinovic.as@gmail.com </p>
            <p class = "paragraph"> Telefon: 064/12-333-45 </p>
            <p class = "paragraph"> Radno vreme: 09h - 17h, nedelja je neradan dan </p>
            <img class ="image_contact" src="<?php echo site_url('../public/images/mapa.png'); ?>" />
         </div>
        </div>

        <div id="Materijali" class="tabcontent">
          <p class="tab_naslov"> Materijali </p>
          <p class="paragraph"> Ovde možete naći linkove ka zanimljivim tekstovima o saobraćaju. Ukoliko želite da imate pristup materijalima sa predavanja, morate da se prijavite na sistem. </p>
          <p class="paragraph"> 
              <a href="https://parking-servis.co.rs/lat/2015/01/05/nalog-za-bezbedno-ponasanje-u-saobracaju/"> Bezbedno ponašanje u saobraćaju </a><br/>
              <a href="https://ilovezrenjanin.com/vesti-zrenjanin/edukacija-za-najmlade-ponasanje-u-saobracaju/"> Edukacija na najmlađe </a><br/>
              <a href="https://www.zdravlje.org.rs/publikacije/lifleti/AGITKA%20ponasanje%20u%20saobracaju.pdf" download> Ponašanje u saobraćaju - PDF </a><br/>
          </p>
        </div>

        <div id="Časovi" class="tabcontent">
          <p class="tab_naslov"> Časovi </p>
          <p class="paragraph"> Termine časova možete pregledati kada se prijavite na sistem. </p>
        </div>
    </div>
    
    <div class = "login_class">
        
        <?php if(isset($msg)) {
      echo '<div class="form-popup1" id="messages">';
      echo '<form class="form-container-reg" method="post">';
      echo '<p id="poruka" class="prijava bold_letters"><i> Poruka  </i></p>';
      echo '<table>';
      echo '<tr>';
      echo "<td><label id='msgLabel' class = 'registracija'>$msg</label></td>";
      echo '</tr>';
      echo '</table><br/>';
      echo '<input type="button" id="close" class="btn" value = "Ok"></button>';
      echo '</form>';
      echo '</div>'; }  ?>

      
      <form name="loginform" method="post" class = "text_style" action="<?php echo site_url('welcome/login') ?>">
        <label class="title" id = "label_prijava"> Prijava </label><br/><br/><br/>
            Korisnicko ime: <br/><br/>
        <input type="text" name="username" value="<?php echo set_value('username') ?>" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')" /><br/><br/>
            Lozinka: <br/><br/>
        <input type="password" name="password" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"/><br/><br/> 

        <a href ="#" id = "forgot_pass"> Zaboravili ste lozinku? </a><br/><br/>

        <input type="submit" id="login_button" class = "button_style bold_letters" value="Prijava"/>
      </form>
      <hr/>
      <form name="registrationform" method="post" class = "text_style"> 
        <label class="title"> Registracija </label><br/><br/><br/>
        Ukoliko želite da postanete <br/> naš član i dobijete dodatne <br/> pogodnosti, registrujte se! <br/><br/>
        <input type="button" class = "button_style bold_letters" value="Registruj me" onclick="openFormReg()"/>
      </form>
    </div>
    
    <div style="padding-top: 150px"></div>
  
    <div class="form-popup" id="myForm">
      <form action="<?php echo site_url('welcome/sendMail') ?>" class="form-container" method="post">
        <p class = "prijava bold_letters"><i> Zaboravljena lozinka </i></p><br/>

        <label class = "prijava"> Korisničko ime: </label>
        <input type="text" placeholder="Unesite korisničko ime" name="usernameForgot" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')">

        <label class = "prijava"> Email: </label>
        <input type="text" placeholder="Unesite email" name="emailForgot" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')">

        <button type="submit" class="btn"> Pošalji </button>
        <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
      </form>
    </div>
  
    <div class="form-popup" id="myFormReg">
      <form action="<?php echo site_url('welcome/register') ?>" class="form-container-reg" method="post">
        <p class = "prijava bold_letters"><i> Registracija </i></p>
        <table>
            <tr>
              <td><label class="registracija"> Ime: </label> </td>
              <td><input type="text" placeholder="Unesite ime" name="nameReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td>
              <td style="padding-left: 10px; padding-right: 20px"><label class="registracija"> Prezime: </label></td>
              <td><input type="text" placeholder="Unesite prezime" name="surnameReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td><br/>
            </tr>
            <tr>
              <td><label class="registracija"> Telefon: </label></td>
              <td><input type="text" placeholder="Unesite telefon" name="phoneReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td>
              <td style="padding-left: 10px">  <label class="registracija"> Adresa: </label></td>
              <td><input type="text" placeholder="Unesite adresu" name="addressReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td><br/>
            </tr>
            <tr>
              <td><label class="registracija"> JMBG: </label></td>
              <td><input type="text" placeholder="Unesite JMBG" name="jmbgReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td>
              <td style="padding-left: 10px"><label class="registracija"> Email: </label></td>
              <td><input type="text" placeholder="Unesite email" name="emailReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td><br/>
            </tr>
            <tr>
              <td style="padding-right: 10px"><label class="registracija"> Kor. ime: </label></td>
              <td><input type="text" placeholder="Unesite korisničko ime" name="usernameReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td>
              <td style="padding-left: 10px"><label class="registracija"> Lozinka: </label></td>
              <td><input type="password" placeholder="Unesite lozinku" name="passwordReg" required oninvalid="this.setCustomValidity('Ovo polje je obavezno')" oninput="this.setCustomValidity('')"></td><br/>
            </tr>
        </table>
        <button type="submit" class="btn"> Potvrdi </button>
        <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
      </form>
    </div>
    
    <script src="<?php echo site_url('../public/js/welcome.js'); ?>"></script>
    
</body>

</html>