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

// Odustajanje od izmene osnovnih informacija o zaposlenom

document.getElementById("exit_button").onclick = function() { 
    document.getElementById("admin_form").style.display = "block";
    document.getElementById("admin_form1").style.display = "none";
};

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

// Zatvaranje dijaloga za odjavu polaznika / promenu termina / zakazivanje termina

function closeForm() {
    document.getElementById("myFormCancelStudent").style.display = "none";
    document.getElementById("myFormChangeAppointment").style.display = "none";  
    document.getElementById("myFormNewAppointment").style.display = "none";
}

// Prikaz dijaloga za odjavu polaznika

function openFormCancelStudent() {
    document.getElementById("myFormCancelStudent").style.display = "block";
}

// Prikaz dijaloga za promenu termina časova teorije
           
function openFormChangeAppointment() {
    document.getElementById("myFormChangeAppointment").style.display = "block";
}

// Prikaz dijaloga za zakazivanje časova vožnje
      
function openFormNewAppointment() {
    document.getElementById("myFormNewAppointment").style.display = "block";
}

$(function (){
    
    // Otvoren prvi tab prilikom učitavanja stranice
    
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
    
    // Prikaz osnovnih informacija o zaposlenom
       
    $.ajax({
        type: 'GET',
        url: 'employee/getEmployee',
        success: function(employee){
          document.getElementById("labelWelcome").append('Dobrodošao/la '+ employee.name);
          document.getElementById("labelNameSurname").append(employee.name + ' ' + employee.surname);
          document.getElementById("labelAddress").append(employee.address);
          document.getElementById("labelPhone").append(employee.phone);
          document.getElementById("labelJmbg").append(employee.jmbg);
          document.getElementById("labelEmail").append(employee.email);
          document.getElementById("labelUsername").append(employee.username);
        }
    });
    
    // Izmena osnovnih informacija o zaposlenom -> prikaz texbox-ova
  
    $('#changeData1').on('click', function(){

        $.ajax({
            type: 'GET',
            url: 'employee/getEmployee',
            success: function(employee){
                  document.getElementById("changeNameSurname").value= employee.name + ' ' + employee.surname;
                  document.getElementById("changeAddress").value=employee.address;
                  document.getElementById("changePhone").value=employee.phone;
                  document.getElementById("changeJmbg").value=employee.jmbg;
                  document.getElementById("changeEmail").value=employee.email;
                  document.getElementById("changeUsername").value=employee.username;

                  document.getElementById("admin_form").style.display = "none";           
                  document.getElementById("admin_form1").style.display = "block";  
            }
        });
    });    
});

// Izmena osnovnih informacija o zaposlenom

$('#confirm_button').on('click', function(){
        
    var $changeNameSurname = $('#changeNameSurname');
    var $namearray = $changeNameSurname.val().split(" ");
    var $name = $namearray[0];
    var $surname = $namearray[1];
    var $adminChangePhone = $('#changePhone');
    var $adminChangeAddress = $('#changeAddress');
    var $adminChangeJmbg = $('#changeJmbg');
    var $adminChangeEmail = $('#changeEmail');
    var $adminChangeUsername = $('#changeUsername');

    var updateUser = {
        name: $name,
        surname: $surname,
        phone: $adminChangePhone.val(),
        address: $adminChangeAddress.val(),
        jmbg: $adminChangeJmbg.val(),
        email: $adminChangeEmail.val(),
        username: $adminChangeUsername.val(),    
    }

    $.ajax({
        type: 'POST',
        url: 'employee/updateUser',
        data: updateUser,
        success: function(response){
            console.log('uspesno pozvan url');
            if(response.code === 0){
                alert(response.msg);
            }
            else{

          document.getElementById("changeNameSurname").value= response.user.name + ' ' + response.user.surname;
          document.getElementById("changeAddress").value=response.user.address;
          document.getElementById("changePhone").value=response.user.phone;
          document.getElementById("changeJmbg").value=response.user.jmbg;
          document.getElementById("changeEmail").value=response.user.email;
          document.getElementById("changeUsername").value=response.user.username;

          $('#labelWelcome').text('Dobrodošao/la '+ response.user.name);
          $('#labelNameSurname').text(response.user.name + ' ' + response.user.surname);
          $('#labelAddress').text(response.user.address);
          $('#labelPhone').text(response.user.phone);
          $('#labelJmbg').text(response.user.jmbg);
          $('#labelEmail').text(response.user.email);
          $('#labelUsername').text(response.user.username);

            document.getElementById("admin_form").style.display = "block";
            document.getElementById("admin_form1").style.display = "none";

            }
        },
        error: function(){
            console.log('fail');
        }
    });
});

// Tabelarni prikaz svih polaznika

$('#button3').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table1 tr').remove();
        $('#table1').append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Ime </th>\n\
                  <th class = "table1"> Prezime </th>\n\
                  <th class = "table1"> Preuzmi </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
      $.ajax({
          type: 'GET',
          url: 'employee/allStudents',
          datatype: 'json',
          success: function(students){
              console.log('uspesno pozvan url');
              $.each(students, function(i, student){
                 $('#table1').append('<tr>\n\
                <td class="table1">'+student.idUser+'</td>\n\
                <td class="table1">'+student.name+'</td>\n\
                <td class="table1">'+student.surname+'</td>\n\
                <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Preuzmi" /></td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });         
});

// Tabelarni prikaz polaznika koji su dodeljeni prijavljenom zaposlenom

$('#button4').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table2 tr').remove();
        $('#table2').append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Ime </th>\n\
                  <th class = "table1"> Prezime </th>\n\
                  <th class = "table1"> Odjava </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
      $.ajax({
          type: 'GET',
          url: 'employee/getMyStudents',
          datatype: 'json',
          success: function(students){
              console.log('uspesno pozvan url');
              $.each(students, function(i, student){
                 $('#table2').append('<tr>\n\
                <td class="table1">'+student.idUser+'</td>\n\
                <td class="table1">'+student.name+'</td>\n\
                <td class="table1">'+student.surname+'</td>\n\
                <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Odjava" /></td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });         
});

// Tabelarni prikaz svih teorijskih časova
  
$('#button5').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table3 tr').remove();
        $('#table3').append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Profesor </th>\n\
                  <th class = "table1"> Dani </th>\n\
                  <th class = "table1"> Vreme </th>\n\
                  <th class = "table1"> Promeni </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
      $.ajax({
          type: 'GET',
          url: 'employee/getAllTheoryClasses',
          datatype: 'json',
          success: function(classes){
              console.log('uspesno pozvan url');
              $.each(classes, function(i, classs){
                 $('#table3').append('<tr>\n\
                <td class="table1">'+classs.idTClass+'</td>\n\
                <td class="table1">'+classs.name+' '+classs.surname+'</td>\n\
                <td class="table1">'+classs.day+'</td>\n\
                <td class="table1">'+classs.time+'</td>\n\
                <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Promeni" /></td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });         
});

// Tabelarni prikaz svih časova vožnje prijavljenog zaposlenog
  
$('#button6').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table4 tr').remove();
        $('#table4').append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Polaznik </th>\n\
                  <th class = "table1"> Datum </th>\n\
                  <th class = "table1"> Vreme </th>\n\
                  <th class = "table1"> Odrađen </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
      $.ajax({
          type: 'GET',
          url: 'employee/getDrivingLessons',
          datatype: 'json',
          success: function(classes){
              console.log('uspesno pozvan url');
              $.each(classes, function(i, classs){
                  var $addRow;
                      if (classs.done == 0){
                   $addRow ='<td class = "table1"> <input type="button" class ="button_style" style = "font-weight: bold;" value="Otkazi" onclick="openFormChangeAppointment()" /> </td>';
                }
                   else {
                  $addRow = '<td class = "table1"> da </td>';   
                    }   
                  
                 $('#table4').append('<tr>\n\
                <td class="table1">'+classs.idLesson+'</td>\n\
                <td class="table1">'+classs.name+' '+classs.surname+'</td>\n\
                <td class="table1">'+classs.date+'</td>\n\
                <td class="table1">'+classs.time+'</td>'+$addRow+'</tr>');                                            
              });
          },
          error: function(){
              console.log('fail');
          }
      });         
});
  
// Prikaz tabele sa svim polaznicima na klik dugmeta "Svi polaznici"
  
document.getElementById("button3").onclick = function() { 
    document.getElementById("classes1").style.display = "block";
    document.getElementById("classes1_label").style.display = "block"; 

    document.getElementById("classes2").style.display = "none"; 
    document.getElementById("classes2_label").style.display = "none"; 
    document.getElementById("classes3").style.display = "none"; 
    document.getElementById("classes3_label").style.display = "none"; 
    document.getElementById("classes4").style.display = "none"; 
    document.getElementById("classes4_label").style.display = "none";
};

// Prikaz tabele sa polaznika koji pohađaju nastavu kod prijavljenog profesora na klik dugmeta "Moji polaznici"
      
document.getElementById("button4").onclick = function() { 
    document.getElementById("classes2").style.display = "block";
    document.getElementById("classes2_label").style.display = "block"; 

    document.getElementById("classes1").style.display = "none"; 
    document.getElementById("classes1_label").style.display = "none";
    document.getElementById("classes3").style.display = "none"; 
    document.getElementById("classes3_label").style.display = "none";
    document.getElementById("classes4").style.display = "none"; 
    document.getElementById("classes4_label").style.display = "none";
}; 

// Prikaz tabele sa podacima o svim časovima teorije na klik dugmeta "Teorija"
      
document.getElementById("button5").onclick = function() { 
    document.getElementById("classes3").style.display = "block";
    document.getElementById("classes3_label").style.display = "block"; 

    document.getElementById("classes1").style.display = "none"; 
    document.getElementById("classes1_label").style.display = "none";
    document.getElementById("classes2").style.display = "none"; 
    document.getElementById("classes2_label").style.display = "none";
    document.getElementById("classes4").style.display = "none"; 
    document.getElementById("classes4_label").style.display = "none";
}; 

// Prikaz časova vožnje onih polaznika koji su dodeljeni prijavljenom profesoru na klik dugmeta "Vožnja"
      
document.getElementById("button6").onclick = function() { 
    document.getElementById("classes4").style.display = "block";
    document.getElementById("classes4_label").style.display = "block"; 

    document.getElementById("classes1").style.display = "none"; 
    document.getElementById("classes1_label").style.display = "none";
    document.getElementById("classes2").style.display = "none"; 
    document.getElementById("classes2_label").style.display = "none";
    document.getElementById("classes3").style.display = "none"; 
    document.getElementById("classes3_label").style.display = "none";
};     
