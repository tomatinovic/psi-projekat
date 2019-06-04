<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/css_file.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/user.css'); ?>">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url('../public/js/javascript_file.js'); ?>"></script>
    <title> Tomatinovic AS </title>	
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
          <button class="tablinks" id ="casovi" onclick="openTab(event, 'Časovi')">Časovi</button>
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
          <div id ="zaposleni_div">
          <p style = "font-weight: bold; padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Zaposleni:  </p>
          <p style = "padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Luka Stefanović - već 10 godina radi kao instruktor vožnje. Veoma je dobar u radu sa ljudima i ima sve najbolje preporuke. </p>
          <p style = "padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Marija Radenković - već 10 godina radi kao instruktor vožnje. Veoma je dobra u radu sa ljudima i ima sve najbolje preporuke. </p>
          </div>
          <div id ="kontakt_div" style="display:none">
          <p class = "paragraph" style = "font-weight: bold"> Kontakt:  </p>
          <p class = "paragraph"> Ulica: Beogradska 11a </p>
          <p class = "paragraph"> email: tomatinovic.as@gmail.com </p>
          <p class = "paragraph"> Telefon: 064/12-333-45 </p>
          <p class = "paragraph"> Radno vreme: 09h - 17h, nedelja je neradan dan </p>
            <img style="text-align: left; padding-right: 50px; padding-left: 50px; padding-top: 30px; padding-bottom: 30px; max-width: 100%" src="<?php echo site_url('../public/images/mapa.png'); ?>" />
          </div>
          </div>

        <div id="Materijali" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Materijali</p>
          <p class="paragraph">Ovde možete naći linkove ka zanimljivim tekstovima o saobraćaju. Ukoliko želite da imate pristup materijalima sa predavanja, morate da se prijavite na sistem. </p>
          <p class="paragraph"> 
              <a href="https://parking-servis.co.rs/lat/2015/01/05/nalog-za-bezbedno-ponasanje-u-saobracaju/"> Bezbedno ponašanje u saobraćaju </a><br/>
              <a href="https://ilovezrenjanin.com/vesti-zrenjanin/edukacija-za-najmlade-ponasanje-u-saobracaju/"> Edukacija na najmlađe </a><br/>
              <a href="https://www.zdravlje.org.rs/publikacije/lifleti/AGITKA%20ponasanje%20u%20saobracaju.pdf" download> Ponašanje u saobraćaju - PDF </a><br/><br/><br/>
              
              <a href="<?php echo site_url('../public/images/slide1.jpg'); ?>" download> Bezbednost saobracaja - JPG 1</a><br/>
              <a href="<?php echo site_url('../public/images/slide17.jpg'); ?>" download> Najčešći uzroci saobraćajnih nesreća - JPG 2</a><br/>
              <a href="<?php echo site_url('../public/images/slide24.jpg'); ?>" download> Praktični ispit - JPG 3</a><br/>
              <a href="<?php echo site_url('../public/images/slide27.jpg'); ?>" download> Vidljivost iz vozila - JPG 4</a><br/>
              <a href="<?php echo site_url('../public/images/slide8.jpg'); ?>" download> Kazneni poeni - JPG 5</a><br/>
          </p>
        </div>

        <div id="Časovi" class="tabcontent">
          <p style="padding-left: 50px; font-family: Arial; font-size: 20px">Časovi</p>
          <table class = "table1" id ="casovi1">
              <tr>
                  <th class = "table1"> Profesor </th>
                  <th class = "table1"> Dani </th>
                  <th class = "table1"> Vreme </th>
              </tr>     
          </table><br/>
        </div>
    </div>
    
   <div class = "register_class">
    <form name="admin_form" id ="admin_form" method="post" class = "text_style" action="<?php echo site_url('registered/logout')?>">
        <label id='labelWelcome' class="title"></label><br/><br/><br/>
            <p id = "labelNameSurname"></p>
            <p id = "labelAddress"></p>
            <p id = "labelPhone"></p>
            <p id = "labelJmbg"></p>
            <p id = "labelEmail"></p>
            <p id = "labelUsername"></p>
 
       <input type="button" class = "button_style" id ="changeData1" style = "font-weight: bold; width: 150px !important" value="Promeni podatke"/><br/><br/>
       <input type="submit" class = "button_style" id ="logout_button" style = "font-weight: bold; width: 150px !important" value="Odjava"/>
    </form>

    <form name="admin_form1" id ="admin_form1" method="post" class = "text_style" style="display: none">    
        <label class="title"> Dobrodošao/la <?php echo $user->name ?> </label><br/><br/><br/>
        <input type="text" id ="changeNameSurname" name="changeNameSurname"  value ="" style="margin-bottom: 10px" /> 
         <input type="text" id ="changeAddress" name="changeAddress" value = "" style="margin-bottom: 10px" /> 
          <input type="text" id ="changePhone" name="changePhone" value = "" style="margin-bottom: 10px" /> 
           <input type="text" id ="changeJmbg" name="changeJmbg" value = "" style="margin-bottom: 10px" /> 
            <input type="text" id ="changeEmail" name="changeEmail" value = "" style="margin-bottom: 10px" /> 
             <input type="text" id ="changeUsername" name="changeUsername" value = "" style="margin-bottom: 10px" />
   
        <input type="button" class = "button_style" id = "confirm_button" style = "font-weight: bold; width: 150px !important" value="Potvrdi"/><br/><br/>
        <input type="button" class = "button_style" id ="exit_button" style = "font-weight: bold; width: 150px !important" value="Odustani"/>
    </form>
  </div> 
  <div style="padding-top: 300px"></div>
  
  <script>
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
</script>
  
        
  <script>
      
       document.getElementById("button1").onclick = function() { 
            document.getElementById("zaposleni_div").style.display = "block";
            document.getElementById("kontakt_div").style.display = "none"; 
      }; 
      
       document.getElementById("button2").onclick = function() { 
            document.getElementById("zaposleni_div").style.display = "none";           
            document.getElementById("kontakt_div").style.display = "block"; 
      }; 
      
       document.getElementById("exit_button").onclick = function() { 
            document.getElementById("admin_form").style.display = "block";
            document.getElementById("admin_form1").style.display = "none";
      };
      
  </script>
        <script src="<?php echo site_url('../public/js/user.js'); ?>"></script>
</body>
</html>