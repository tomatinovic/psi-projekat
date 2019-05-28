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
        .form-container-reg input[type=text], .form-container-reg input[type=password], textarea {
          width: 100%;
          height: 10px;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
          border-radius: 5px;
        }

        /* When the inputs get focus, do something */
        .form-container-reg input[type=text]:focus, .form-container-reg input[type=password]:focus, textarea:focus {
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
          <p id = "text1" style = "font-weight: bold; padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Zaposleni:  </p>
          <p id = "text2" style = "padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Luka Stefanović - već 10 godina radi kao instruktor vožnje. Veoma je dobar u radu sa ljudima i ima sve najbolje preporuke. </p>
          <p id = "text3" style = "padding-left: 50px; padding-right: 50px; text-align: justify; text-justify: inter-word; font-family: Arial; font-size: 14px"> Marija Radenković - već 10 godina radi kao instruktor vožnje. Veoma je dobra u radu sa ljudima i ima sve najbolje preporuke. </p>
          
         
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
              <a href="https://www.zdravlje.org.rs/publikacije/lifleti/AGITKA%20ponasanje%20u%20saobracaju.pdf" download> Ponašanje u saobraćaju - PDF </a><br/><br/><br/>
              
              <a href="<?php echo site_url('../public/images/slide1.jpg'); ?>" download> Bezbednost saobracaja - JPG 1</a><br/>
              <a href="<?php echo site_url('../public/images/slide17.jpg'); ?>" download> Najčešći uzroci saobraćajnih nesreća - JPG 2</a><br/>
              <a href="<?php echo site_url('../public/images/slide24.jpg'); ?>" download> Praktični ispit - JPG 3</a><br/>
              <a href="<?php echo site_url('../public/images/slide27.jpg'); ?>" download> Vidljivost iz vozila - JPG 4</a><br/>
              <a href="<?php echo site_url('../public/images/slide8.jpg'); ?>" download> Kazneni poeni - JPG 5</a><br/>
          </p>
        </div>

        <div id="Časovi" class="tabcontent">
          <p id = "classes1_label" style="padding-left: 50px; font-family: Arial; font-size: 20px">Časovi</p>
          <p id = "classes2_label" style="padding-left: 50px; font-family: Arial; font-size: 20px; display: none">Odrađeni časovi</p>
          <p id = "classes3_label" style="padding-left: 50px; font-family: Arial; font-size: 20px; display: none">Polaganje</p>
          <span class="paragraph"><input type="button" class = "button_style" id ="button3" style = "font-weight: bold" value="Grupe" /></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button4" class = "button_style" style = "font-weight: bold; width: 150px !important" value="Termini vožnje"/></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button5" class = "button_style" style = "font-weight: bold" value="Polaganje"/></span><br/><br/>
          <div id = "classes1">
          <table class = "table1">
              <tr>
                  <th class = "table1"> Broj </th>
                  <th class = "table1"> Profesor </th>
                  <th class = "table1"> Dani </th>
                  <th class = "table1"> Vreme </th>
              </tr>
              <tr>
                  <td class = "table1"> 1 </td>
                  <td class = "table1"> IME I PREZIME PROFESORA </td>
                  <td class = "table1"> DANI NASTAVE </td>
                  <td class = "table1"> VREME NASTAVE </td>
              </tr>
          </table><br/>
          <label class = "paragraph"> Moja grupa: </label>
          <label class = "paragraph" style = "padding-left: 0px !important"> Broj, Ime i Prezime profesora, Dani, Vreme </label>
          <input type="button" class = "button_style" style = "font-weight: bold; width: 150px !important" value="Promeni grupu" onclick="openFormChangeGroup()" /><br/><br/>
          </div>
          
          <div id = "classes2" style="display:none">
          <table class = "table1">
              <tr>
                  <th class = "table1"> Broj </th>
                  <th class = "table1"> Datum </th>
                  <th class = "table1"> Vreme </th>
                  <th class = "table1"> Odrađen </th>
              </tr>
              <tr>
                  <td class = "table1"> 1 </td>
                  <td class = "table1"> DATUM </td>
                  <td class = "table1"> VREME </td>
                  <td class = "table1"> Da </td>
              </tr>
              <tr>
                  <td class = "table1"> 2 </td>
                  <td class = "table1"> DATUM </td>
                  <td class = "table1"> VREME </td>
                  <td class = "table1"> <input type="button" class ='button_style' style = "font-weight: bold;" value="Otkaži" onclick = "openFormCancel()"/> </td>
              </tr>
          </table><br/>         
          <input type="button" class = "button_style" style = "font-weight: bold; width: 150px !important; margin-left: 20px" value="Zakaži čas" onclick="openFormAppointment()" /><br/><br/>
          </div>
          
          <div id = "classes3" style = "display:none">
          <table class = "table1">
              <tr>
                  <th class = "table1"> Termin </th>
                  <th class = "table1"> Datum </th>
                  <th class = "table1"> Vreme </th>
                  <th class = "table1"> Preostalo mesta </th>
                  <th class = "table1"> Prijava </th>
              </tr>
              <tr>
                  <td class = "table1"> TERMIN </td>
                  <td class = "table1"> DATUM </td>
                  <td class = "table1"> VREME </td>
                  <td class = "table1"> 15 </td>
                  <td class = "table1"> <input type="button" class ='button_style' style = "font-weight: bold;" value="Prijava" /> </td>
              </tr>
          </table><br/>
          <label class = "paragraph"> Vaš odabrani termin polaganja: </label>
          <label class = "paragraph" style = "padding-left: 0px !important"> Datum i vreme </label>
          <input type="button" class = "button_style" style = "font-weight: bold" value="Otkaži" /><br/><br/>
          </div>
        </div>
    </div>
    
  <div class = "register_class">
      <form name="admin_form" id ="admin_form" method="post" class = "text_style">
        <label class="title"> Dobrodošao/la IME </label><br/><br/><br/>
        <p id = "label1"> IME I PREZIME </p> 
        <p id = "label2"> ULICA </p> 
        <p id = "label3"> TELEFON </p> 
        <p id = "label4"> JMBG </p> 
        <p id = "label5"> EMAIL </p>
        <p id = "label6"> KORISNIČKO IME </p>
   
        <input type="button" class = "button_style" id ="changeData" style = "font-weight: bold; width: 150px !important" value="Promeni podatke"/><br/><br/>
        <input type="submit" class = "button_style" id ="logout_button" style = "font-weight: bold; width: 150px !important" value="Odjava"/>
    </form>

    <form name="admin_form1" id ="admin_form1" method="post" class = "text_style" style="display: none">    
        <label class="title"> Dobrodošao/la IME </label><br/><br/><br/>
        <input type="text" id ="textbox1" value ="IME I PREZIME" style="margin-bottom: 10px" /> 
         <input type="text" id ="textbox2" value = "ULICA" style="margin-bottom: 10px" /> 
          <input type="text" id ="textbox3" value = "TELEFON" style="margin-bottom: 10px" /> 
           <input type="text" id ="textbox4" value = "JMBG" style="margin-bottom: 10px" /> 
            <input type="text" id ="textbox5" value = "EMAIL" style="margin-bottom: 10px" /> 
             <input type="text" id ="textbox6" value = "KORISNIČKO IME" style="margin-bottom: 10px" />
   
        <input type="submit" class = "button_style" id = "confirm_button" style = "font-weight: bold; width: 150px !important" value="Potvrdi"/><br/><br/>
        <input type="button" class = "button_style" id ="exit_button" style = "font-weight: bold; width: 150px !important" value="Odustani"/>
    </form>
  </div> 
    
  <div class="form-popup" id="myFormChangeGroup">
      <form class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Promena grupe </i></p>
      <table>
          <tr>
              <td> <label style="font-family: Arial; font-size: 14px"> Razlog: </label> </td>
              <td> <textarea rows="4" cols="50" style="margin-bottom: 10px; height: 50px !important" id="textarea"></textarea>  </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Nova grupa: </label> </td>
            <td>  <input type="text" style="margin-bottom: 10px" />  </td>
          </tr>         
      </table><br/>
    <button type="submit" class="btn"> Pošalji </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
  </form>
</div>
    
  <div class="form-popup" id="myFormCancel">
      <form class="form-container-reg" method="post">
        <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Otkazivanje termina </i></p>
        <p style="font-family:Arial; font-size: 14px; text-align: center"><i> Da li ste sigurni da želite da otkažete termin? </i></p>
      <button type="submit" class="btn"> Otkaži </button>
      <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
     </form>
    </div>
    
    <div class="form-popup" id="myFormAppointment">
      <form class="form-container-reg" method="post">
      <p style="font-family:Arial; font-size: 14px; font-weight: bold; text-align: center"><i> Zakaži čas </i></p>
      <table>
          <tr>
              <td> <label style="font-family: Arial; font-size: 14px"> Datum: </label> </td>
              <td> <input type = "date" style="margin-bottom: 10px" />  </td>
          </tr>
          <tr>
            <td>  <label style="font-family:Arial; font-size: 14px"> Vreme: </label> </td>
            <td>  <input type = "time" style="margin-bottom: 10px" />  </td>
          </tr>         
      </table><br/>
    <button type="submit" class="btn"> Zakaži </button>
    <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
  </form>
</div>
    
  <div style="padding-top: 300px"></div>
     
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
      
      document.getElementById("button3").onclick = function() { 
            document.getElementById("classes1").style.display = "block";
            document.getElementById("classes1_label").style.display = "block"; 
            
            document.getElementById("classes2").style.display = "none"; 
            document.getElementById("classes2_label").style.display = "none"; 
            document.getElementById("classes3").style.display = "none"; 
            document.getElementById("classes3_label").style.display = "none"; 
      }; 
      
       document.getElementById("button4").onclick = function() { 
            document.getElementById("classes2").style.display = "block";
            document.getElementById("classes2_label").style.display = "block"; 
            
            document.getElementById("classes1").style.display = "none"; 
            document.getElementById("classes1_label").style.display = "none";
            document.getElementById("classes3").style.display = "none"; 
            document.getElementById("classes3_label").style.display = "none"; 
      }; 
      
      document.getElementById("button5").onclick = function() { 
            document.getElementById("classes3").style.display = "block";
            document.getElementById("classes3_label").style.display = "block"; 
            
            document.getElementById("classes1").style.display = "none"; 
            document.getElementById("classes1_label").style.display = "none";
            document.getElementById("classes2").style.display = "none"; 
            document.getElementById("classes2_label").style.display = "none"; 
      }; 
      
       document.getElementById("changeData").onclick = function() { 
            document.getElementById("admin_form").style.display = "none";           
            document.getElementById("admin_form1").style.display = "block";          
      };
      
       document.getElementById("exit_button").onclick = function() { 
            document.getElementById("admin_form").style.display = "block";
            document.getElementById("admin_form1").style.display = "none";
      };
      
      function closeForm() {
            document.getElementById("myFormChangeGroup").style.display = "none";
            document.getElementById("myFormCancel").style.display = "none";
            document.getElementById("myFormAppointment").style.display = "none";          
      }

      function openFormChangeGroup() {
            document.getElementById("myFormChangeGroup").style.display = "block";
      }
      
      function openFormCancel() {
            document.getElementById("myFormCancel").style.display = "block";
      }
      
      function openFormAppointment() {
            document.getElementById("myFormAppointment").style.display = "block";
      }
      
  </script>
</body>
</html>