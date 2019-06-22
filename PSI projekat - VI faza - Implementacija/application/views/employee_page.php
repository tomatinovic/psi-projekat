<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<html lang="en">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/css_file.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('../public/css/employee.css'); ?>">
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
          <button class="tablinks" onclick="openTab(event, 'O_nama')"> O nama </button>
          <button class="tablinks" onclick="openTab(event, 'Informacije')"> Informacije </button>
          <button class="tablinks" onclick="openTab(event, 'Materijali')"> Materijali </button>
          <button class="tablinks" onclick="openTab(event, 'Časovi')"> Časovi </button>
        </div>

        <div id="O_nama" class="tabcontent">
          <p class="tab_naslov"> O nama </p>
          <p class="paragraph"> Auto škola Tomatinović je osnovana 2010. godine. Nalazimo se na Vračaru u samom centru grada.
                               Priključite se vozačima koji su već proverili kvalitet obuke u našoj školi. Nudimo Vam visoko kvalifikovane instruktore - predavače. </p>
          <p class = "paragraph"> Obuka se vrši na vozilima, PUNTO, Hyundai Atos, Ford Focus i Fiat seicento, uz mogućnost da čas započnete i završite na lokaciji koja vama odgovara. </p>
          <p class = "paragraph bold_letters"> MUŠKI - ŽENSKI INSTRUKTORI. </p>
          <p class = "paragraph"> Plaćanje kod nas je u mesečnim ratama bez kartica i čekova. </p>
        </div>

        <div id="Informacije" class="tabcontent">
          <p class="tab_naslov"> Informacije </p>
          <span class="paragraph"><input type="button" class = "button_style bold_letters" id ="button1" value="Zaposleni" onclick="showText('text1', 'text2', 'text3')"/></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button2" class = "button_style bold_letters" value="Kontakt"/></span>
          <div id ="zaposleni_div">
              <p class="zaposleni bold_letters"> Zaposleni:  </p>
            <p class="zaposleni"> Luka Stefanović - već 10 godina radi kao instruktor vožnje. Veoma je dobar u radu sa ljudima i ima sve najbolje preporuke. </p>
            <p class="zaposleni"> Marija Radenković - već 10 godina radi kao instruktor vožnje. Veoma je dobra u radu sa ljudima i ima sve najbolje preporuke. </p>
          </div>
          <div id ="kontakt_div" class="display_none">
            <p class = "paragraph bold_letters"> Kontakt:  </p>
            <p class = "paragraph"> Ulica: Beogradska 11a </p>
            <p class = "paragraph"> email: tomatinovic.as@gmail.com </p>
            <p class = "paragraph"> Telefon: 064/12-333-45 </p>
            <p class = "paragraph"> Radno vreme: 09h - 17h, nedelja je neradan dan </p>
            <img class="image_contact" src="<?php echo site_url('../public/images/mapa.png'); ?>" />
          </div>
        </div>

        <div id="Materijali" class="tabcontent">
          <p class="tab_naslov"> Materijali </p>
          <p class="paragraph"> Ovde možete naći linkove ka zanimljivim tekstovima o saobraćaju. Ukoliko želite da imate pristup materijalima sa predavanja, morate da se prijavite na sistem. </p>
          <p class="paragraph"> 
              <a href="https://parking-servis.co.rs/lat/2015/01/05/nalog-za-bezbedno-ponasanje-u-saobracaju/"> Bezbedno ponašanje u saobraćaju </a><br/>
              <a href="https://ilovezrenjanin.com/vesti-zrenjanin/edukacija-za-najmlade-ponasanje-u-saobracaju/"> Edukacija na najmlađe </a><br/>
              <a href="https://www.zdravlje.org.rs/publikacije/lifleti/AGITKA%20ponasanje%20u%20saobracaju.pdf" download> Ponašanje u saobraćaju - PDF </a><br/><br/><br/>
              
              <a href="<?php echo site_url('../public/images/slide1.jpg'); ?>" download> Bezbednost saobracaja - JPG 1 </a><br/>
              <a href="<?php echo site_url('../public/images/slide17.jpg'); ?>" download> Najčešći uzroci saobraćajnih nesreća - JPG 2 </a><br/>
              <a href="<?php echo site_url('../public/images/slide24.jpg'); ?>" download> Praktični ispit - JPG 3 </a><br/>
              <a href="<?php echo site_url('../public/images/slide27.jpg'); ?>" download> Vidljivost iz vozila - JPG 4 </a><br/>
              <a href="<?php echo site_url('../public/images/slide8.jpg'); ?>" download> Kazneni poeni - JPG 5 </a><br/>
          </p>
        </div>

        <div id="Časovi" class="tabcontent">
          <p id = "classes1_label" class="tab_naslov"> Svi polaznici </p>
          <p id = "classes2_label" class="tab_naslov display_none"> Moji polaznici </p>
          <p id = "classes3_label" class="tab_naslov display_none"> Časovi teorije </p>
          <p id = "classes4_label" class="tab_naslov display_none"> Časovi vožnje </p>
          <span class="paragraph"><input type="button" class = "button_style bold_letters" id ="button3" style = "width: 120px !important" value="Svi polaznici" /></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button4" class = "button_style bold_letters" style = "width: 120px !important" value="Moji polaznici"/></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button5" class = "button_style bold_letters" style = "width: 90px !important" value="Teorija"/></span>
          <span class="paragraph" style="padding-left: 0px !important"><input type="button" id ="button6" class = "button_style bold_letters" style = "width: 90px !important" value="Vožnja"/></span><br/><br/>
          <div id = "classes1">
            <table class = "table1" id = "table1">
                <tr>
                    <th class = "table1"> Broj </th>
                    <th class = "table1"> Ime </th>
                    <th class = "table1"> Prezime </th>
                    <th class = "table1"> Preuzmi </th>
                </tr>
            </table><br/>
          </div>
          
          <div id = "classes2" class="display_none">
            <table class = "table1" id = "table2">
                <tr>
                    <th class = "table1"> Broj </th>
                    <th class = "table1"> Ime </th>
                    <th class = "table1"> Prezime </th>
                    <th class = "table1"> Odjava </th>
                </tr>                   
            </table><br/>                   
          </div>
          
          <div id = "classes3" class="display_none">
            <table class = "table1" id = "table3">
                <tr>
                    <th class = "table1"> Broj </th>
                    <th class = "table1"> Profesor </th>
                    <th class = "table1"> Dani </th>
                    <th class = "table1"> Vreme </th>
                    <th class = "table1"> Promeni </th>
                </tr>
            </table><br/>
          </div>
          
          <div id = "classes4" class="display_none">
            <table class = "table1" id = "table4">
                <tr>
                    <th class = "table1"> Broj </th>
                    <th class = "table1"> Polaznik </th>
                    <th class = "table1"> Datum </th>
                    <th class = "table1"> Vreme </th>
                    <th class = "table1"> Odrađen </th>
                </tr>             
            </table><br/>
            <label class = "paragraph"> Zakaži novi čas vožnje: </label>
            <input type="button" id = "zakazi_cas1" class = "button_style bold_letters" value="Zakaži" onclick="openFormNewAppointment()" /><br/><br/>
          </div>
          
        </div>
    </div>
    
    <div class = "register_class">
        <form name="admin_form" id ="admin_form" method="post" class = "text_style" action="<?php echo site_url('employee/logout')?>">
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

        <form name="admin_form1" id ="admin_form1" method="post" class = "text_style display_none">    
            <label class="title"> Dobrodošao/la <?php echo $employee->name ?></label><br/><br/><br/>
            <input type="text" id ="changeNameSurname" name="changeNameSurname"  class="margin_bottom_10" /> 
            <input type="text" id ="changeAddress" name="changeAddress" class="margin_bottom_10" /> 
            <input type="text" id ="changePhone" name="changePhone" class="margin_bottom_10" /> 
            <input type="text" id ="changeJmbg" name="changeJmbg" class="margin_bottom_10" /> 
            <input type="text" id ="changeEmail" name="changeEmail" class="margin_bottom_10" /> 
            <input type="text" id ="changeUsername" name="changeUsername" class="margin_bottom_10" />

            <input type="button" class = "button_style bold_letters" id = "confirm_button" style = "width: 150px !important" value="Potvrdi"/><br/><br/>
            <input type="button" class = "button_style bold_letters" id ="exit_button" style = "width: 150px !important" value="Odustani"/>
        </form>
    </div> 
       
    <div class="form-popup" id="myFormChangeAppointment">
        <form class="form-container-reg" method="post">
            <p class="prijava bold_letters"><i> Promena termina </i></p>
            <table>
                <tr>
                    <td><label class="registracija"> Datum: </label></td>
                    <td><input type="text" id ="date1" name="date1" class="margin_bottom_10" placeholder="Format: dan/dan" /> </td>
                </tr>    
                <tr>
                    <td><label class="registracija"> Vreme: </label></td>
                    <td><input type="text" id ="time1" name="time1" class="margin_bottom_10" placeholder="Format: hh:mm - hh:mm" /> </td>
                </tr>         
            </table><br/>
            <button type="button" id="promeni_grupu" class="btn"> Promeni </button>
            <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
        </form>
    </div>
    
    <div class="form-popup" id="myFormNewAppointment">
        <form class="form-container-reg" method="post">
            <p class="prijava bold_letters"><i> Zakazivanje termina </i></p>
            <table>
                <tr>
                    <td><label class="registracija"> Ime polaznika: </label></td>
                    <td><input type="text" id ="polaznik_name" name="polaznikName" class="margin_bottom_10" placeholder="Ime" /> </td>
                </tr>
                <tr>
                    <td><label class="registracija"> Prezime polaznika: </label></td>
                    <td><input type="text" id ="polaznik_surname" name="polaznikName" class="margin_bottom_10" placeholder="Prezime" /> </td>
                </tr>
                <tr>
                    <td><label class="registracija"> Datum: </label></td>
                    <td><input type = "text" id ="datum" name="datum" class="margin_bottom_10" placeholder="Format: dd.mm.yyyy." /></td>
                </tr>
                <tr>
                    <td><label class="registracija"> Vreme: </label></td>
                    <td><input type = "text" id ="vreme" name="vreme" class="margin_bottom_10" placeholder="Format: hh:mm"/></td>
                </tr>         
            </table><br/>
            <button type="button" id ="zakazi_cas" class="btn"> Zakaži </button>
            <button type="button" class="btn cancel" onclick="closeForm()"> Odustani </button>
        </form>
    </div>
    
    <div style="padding-top: 300px"></div>
    
    <div class="form-popup" id="myFormMsgs">
        <form class="form-container-reg" method="post">
            <p id='poruka' class="prijava bold_letters"><i> Poruka  </i></p>
            <table>
                <tr>
                    <td><label id="msgLabel" class = "registracija"></label></td>
                </tr>
            </table><br/>
            <button type="button" id="closeMsgBtn" class="btn"> Ok </button>
        </form>
    </div>

    <script src="<?php echo site_url('../public/js/employee.js'); ?>"></script>
    
</body>

</html>