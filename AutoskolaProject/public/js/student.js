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

// Odustajanje od izmene osnovnih informacija o polazniku

document.getElementById("exit_button").onclick = function() { 
    document.getElementById("admin_form").style.display = "block";
    document.getElementById("admin_form1").style.display = "none";
};

// Zatvaranje dijaloga za promenu grupe / otkazivanja časa / prijavu za polaganje

function closeForm() {
    document.getElementById("myFormChangeGroup").style.display = "none";
    document.getElementById("myFormCancel").style.display = "none";
    document.getElementById("myFormAppointment").style.display = "none";          
}

// Prikaz dijaloga za promenu grupe za časove teorije

function openFormChangeGroup() {
    document.getElementById("myFormChangeGroup").style.display = "block";
}

// Prikaz dijaloga za otkazivanje časa vožnje

function openFormCancel() {
    document.getElementById("myFormCancel").style.display = "block";
}

// Prikaz dijaloga za prijavu za polaganje vozačkog ispita

function openFormAppointment() {
    document.getElementById("myFormAppointment").style.display = "block";
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
    
    // Prikaz osnovnih informacija o polazniku
       
    $.ajax({
        type: 'GET',
        url: 'student/getStudent',
        success: function(student){
          document.getElementById("labelWelcome").append('Dobrodošao/la'+student.name);
          document.getElementById("labelNameSurname").append(student.name + ' ' + student.surname);
          document.getElementById("labelAddress").append(student.address);
          document.getElementById("labelPhone").append(student.phone);
          document.getElementById("labelJmbg").append(student.jmbg);
          document.getElementById("labelEmail").append(student.email);
          document.getElementById("labelUsername").append(student.username);
        }
    });
    
    // Izmena osnovnih informacija o polazniku -> prikaz texbox-ova
  
    $('#changeData1').on('click', function(){

        $.ajax({
            type: 'GET',
            url: 'student/getStudent',
            success: function(student){
                  document.getElementById("changeNameSurname").value= student.name + ' ' + student.surname;
                  document.getElementById("changeAddress").value=student.address;
                  document.getElementById("changePhone").value=student.phone;
                  document.getElementById("changeJmbg").value=student.jmbg;
                  document.getElementById("changeEmail").value=student.email;
                  document.getElementById("changeUsername").value=student.username;

                  document.getElementById("admin_form").style.display = "none";           
                  document.getElementById("admin_form1").style.display = "block";  
            }
        });          
    });
});

// Izmena osnovnih informacija o polazniku

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
          url: 'student/updateUser',
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
           
            $('#labelWelcome').text('Dobrodošao/la'+response.user.name);
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

// Tabelarni prikaz svih grupa za časove teorije
  
$('#button3, #casovi').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table1 tr').remove();
        $('#table1').append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Profesor </th>\n\
                  <th class = "table1"> Dani </th>\n\
                  <th class = "table1"> Vreme </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
      $.ajax({
          type: 'GET',
          url: 'student/getAllTheoryClasses',
          datatype: 'json',
          success: function(groups){
              console.log('uspesno pozvan url');
              $.each(groups, function(i, group){
                 $('#table1').append('<tr>\n\
                <td class="table1">'+group.idTClass+'</td>\n\
                <td class="table1">'+group.name+' '+group.surname+'</td>\n\
                <td class="table1">'+group.day+'</td>\n\
                <td class="table1">'+group.time+'</td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });         
});

// Tabelarni prikaz svih zakazanih i odrađenih časova vožnje za prijavljenog korisnika

$('#button4').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table2 tr').remove();
        $('#table2').append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Datum </th>\n\
                  <th class = "table1"> Vreme </th>\n\
                  <th class = "table1"> Odrađen </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
         $.ajax({
          type: 'GET',
          url: 'student/getStudentDrivingLessons',
          datatype: 'json',
          success: function(groups){
              console.log('uspesno pozvan url');
              $.each(groups, function(i, group){
                  
                 var $addRow;
                      if (group.done == 0){
                   $addRow ='<td class = "table1"> <input type="button" class ="button_style" style = "font-weight: bold;" value="Otkazi"/> </td>';
                }
                   else {
                  $addRow = '<td class = "table1"> da </td>';   
                    }   
                $('#table2').append('<tr>\n\
                <td class="table1">'+group.idLesson+'</td>\n\
                <td class="table1">'+group.date+'</td>\n\
                <td class="table1">'+group.time+'</td>'+$addRow+'</tr>');
           
              });
          },
          error: function(){
              console.log('fail');
          }
      });          
});

// Tabelarni prikaz termina polaganja vožnje na koje prijavljeni korisnik može da se prijavi
  
  $('#button5').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#table3 tr').remove();
        $('#table3').append('<tr>\n\
                  <th class = "table1"> Datum </th>\n\
                  <th class = "table1"> Vreme </th>\n\
                  <th class = "table1"> Preostalo mesta </th>\n\
                  <th class = "table1"> Prijava </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
         $.ajax({
          type: 'GET',
          url: 'student/getAllExams',
          datatype: 'json',
          success: function(groups){
              console.log('uspesno pozvan url');
              $.each(groups, function(i, group){
                 $('#table3').append('<tr>\n\
                <td class="table1">'+group.date+'</td>\n\
                <td class="table1">'+group.time+'</td>\n\
                <td class="table1">'+group.free+'</td>\n\
                <td class="table1">'+group.time+'</td>\n\
                <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Prijava" /></td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });           
});

// Prikaz tabele sa svim grupama za teorijske časove na klik dugmeta "Grupe"

document.getElementById("button3").onclick = function() { 
    document.getElementById("classes1").style.display = "block";
    document.getElementById("classes1_label").style.display = "block"; 

    document.getElementById("classes2").style.display = "none"; 
    document.getElementById("classes2_label").style.display = "none"; 
    document.getElementById("classes3").style.display = "none"; 
    document.getElementById("classes3_label").style.display = "none"; 
}; 

// Prikaz tabele sa časovima vožnje za prijavljenog polaznika na klik dugmeta "Termini vožnje"

document.getElementById("button4").onclick = function() { 
    document.getElementById("classes2").style.display = "block";
    document.getElementById("classes2_label").style.display = "block"; 

    document.getElementById("classes1").style.display = "none"; 
    document.getElementById("classes1_label").style.display = "none";
    document.getElementById("classes3").style.display = "none"; 
    document.getElementById("classes3_label").style.display = "none"; 
}; 

// Prikaz tabele sa terminima polaganja vožnje na klik dugmeta "Polaganje"

document.getElementById("button5").onclick = function() { 
    document.getElementById("classes3").style.display = "block";
    document.getElementById("classes3_label").style.display = "block"; 

    document.getElementById("classes1").style.display = "none"; 
    document.getElementById("classes1_label").style.display = "none";
    document.getElementById("classes2").style.display = "none"; 
    document.getElementById("classes2_label").style.display = "none"; 
}; 