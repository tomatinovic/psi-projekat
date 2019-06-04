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

// Odustajanje od izmene osnovnih informacija o adminu

document.getElementById("exit_button").onclick = function() { 
    document.getElementById("admin_form").style.display = "block";
    document.getElementById("admin_form1").style.display = "none";
};

// Zatvaranje dijaloga za detalje / aktivaciju / registraciju zaposlenog

function closeForm() {
    document.getElementById("myFormRegAdmin").style.display = "none";
    document.getElementById("myFormDetails").style.display = "none";
    document.getElementById("myFormActivation").style.display = "none";
}

// Prikaz dijaloga za registraciju zaposlenih

function openFormReg() {
    document.getElementById("myFormRegAdmin").style.display = "block";
}

// Prikaz dijaloga za pregled detalja o zaposlenom / polazniku

function openFormDetails() {
    document.getElementById("myFormDetails").style.display = "block";
}

// Prikaz dijaloga za aktivaciju registrovanog korisnika

function openFormActivation() {
    document.getElementById("myFormActivation").style.display = "block";
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
    document.getElementById('Zaposleni').style.display = "block";
    event.currentTarget.className += " active";
    
    // Promenljive
     
    var $table = $('#empTable');
    var $adminStudentTable = $('#adminStudentTable');
    var $adminUserTable = $('#adminUserTable');
    var $global_user;
    
    // Prikaz svih zaposlenih u tabeli pri učitavanju stranice
  
    $('#empTable tr').remove();
    $table.append('<tr>\n\
               <th class = "table1"> Broj </th>\n\
               <th class = "table1"> Ime </th>\n\
               <th class = "table1"> Prezime </th>\n\
               <th class = "table1"> Detalji </th>\n\
           </tr>');

    console.log('pritisnuto dugme');

    $.ajax({
        type: 'GET',
        url: 'admin/allEmployees',
        datatype: 'json',
        success: function(employees){
            console.log('uspesno pozvan url');
            $.each(employees, function(i, employee){
               $table.append('<tr>\n\
              <td class="table1">'+employee.idUser+'</td>\n\
              <td class="table1">'+employee.name+'</td>\n\
              <td class="table1">'+employee.surname+'</td>\n\
              <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
              </tr>');
            });
        },
        error: function(){
            console.log('fail');
        }
    }); 
    
    // Prikaz osnovnih informacija o adminu
  
    $.ajax({
        type: 'GET',
        url: 'admin/getAdmin',
        success: function(admin){
          document.getElementById("labelWelcome").append('Dobrodošao/la '+admin.name+' - ADMIN ');
          document.getElementById("labelNameSurname").append(admin.name + ' ' + admin.surname);
          document.getElementById("labelAddress").append(admin.address);
          document.getElementById("labelPhone").append(admin.phone);
          document.getElementById("labelJmbg").append(admin.jmbg);
          document.getElementById("labelEmail").append(admin.email);
          document.getElementById("labelUsername").append(admin.username);
        }
    });
  
    // Izmena osnovnih informacija o adminu -> prikaz texbox-ova
  
    $('#changeData1').on('click', function(){
        $.ajax({
            type: 'GET',
            url: 'admin/getAdmin',
            success: function(admin){
                  document.getElementById("changeNameSurname").value= admin.name + ' ' + admin.surname;
                  document.getElementById("changeAddress").value=admin.address;
                  document.getElementById("changePhone").value=admin.phone;
                  document.getElementById("changeJmbg").value=admin.jmbg;
                  document.getElementById("changeEmail").value=admin.email;
                  document.getElementById("changeUsername").value=admin.username;

                  document.getElementById("admin_form").style.display = "none";           
                  document.getElementById("admin_form1").style.display = "block";  
            }
        });
    });
    
    // Prikaz svih zaposlenih u tabeli pri promeni tab-a
         
    $('#buttonZaposleni').on('click', function(){

        //da se ne bi appendovali elemnenti konstantno i pravili duplikati
        $('#empTable tr').remove();
         $table.append('<tr>\n\
                    <th class = "table1"> Broj </th>\n\
                    <th class = "table1"> Ime </th>\n\
                    <th class = "table1"> Prezime </th>\n\
                    <th class = "table1"> Detalji </th>\n\
                </tr>');

        console.log('pritisnuto dugme');

        $.ajax({
            type: 'GET',
            url: 'admin/allEmployees',
            datatype: 'json',
            success: function(employees){
                console.log('uspesno pozvan url');
                $.each(employees, function(i, employee){
                   $table.append('<tr>\n\
                  <td class="table1">'+employee.idUser+'</td>\n\
                  <td class="table1">'+employee.name+'</td>\n\
                  <td class="table1">'+employee.surname+'</td>\n\
                  <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                  </tr>');
                });
            },
            error: function(){
                console.log('fail');
            }
        });         
    });
    
    // Prikaz svih polaznika u tabeli pri promeni tab-a
  
    $('#buttonPolaznici').on('click', function(){

        //da se ne bi appendovali elemnenti konstantno i pravili duplikati
        $('#adminStudentTable tr').remove();

         $adminStudentTable.append('<tr>\n\
                    <th class = "table1"> Broj </th>\n\
                    <th class = "table1"> Ime </th>\n\
                    <th class = "table1"> Prezime </th>\n\
                    <th class = "table1"> Detalji </th>\n\
                </tr>');

        console.log('pritisnuto dugme');

        $.ajax({
            type: 'GET',
            url: 'admin/allStudents',
            datatype: 'json',
            success: function(students){
                console.log('uspesno pozvan url');
                $.each(students, function(i, student){
                   $adminStudentTable.append('<tr>\n\
                  <td class="table1">'+student.idUser+'</td>\n\
                  <td class="table1">'+student.name+'</td>\n\
                  <td class="table1">'+student.surname+'</td>\n\
                  <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                  </tr>');
                });
            },
            error: function(){
                console.log('fail');
            }
        });            
    });
    
    // Prikaz svih registrovanih korisnika u tabeli pri promeni tab-a
  
    $('#buttonKorisnici').on('click', function(){

       //da se ne bi appendovali elemnenti konstantno i pravili duplikati
       $('#adminUserTable tr').remove();

            $adminUserTable.append('<tr>\n\
                   <th class = "table1"> Broj </th>\n\
                   <th class = "table1"> Ime </th>\n\
                   <th class = "table1"> Prezime </th>\n\
                   <th class = "table1"> Aktivacija </th>\n\
               </tr>');

       console.log('pritisnuto dugme');

       $.ajax({
           type: 'GET',
           url: 'admin/allUsers',
           datatype: 'json',
           success: function(users){
               console.log('uspesno pozvan url');
               $.each(users, function(i, user){
                  $adminUserTable.append('<tr>\n\
                 <td class="table1">'+user.idUser+'</td>\n\
                 <td class="table1">'+user.name+'</td>\n\
                 <td class="table1">'+user.surname+'</td>\n\
                 <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Aktivacija" /></td>\n\
                 </tr>');
               });
           },
           error: function(){
               console.log('fail');
           }
       });     
    });
  
    // Dodavanje novog zaposlenog
  
    $('#adminAddEmployee').on('click', function(){

        var $adminAddName = $('#adminAddName');
        var $adminAddSurname = $('#adminAddSurname');
        var $adminAddPhone = $('#adminAddPhone');
        var $adminAddAddress = $('#adminAddAddress');
        var $adminAddJmbg = $('#adminAddJmbg');
        var $adminAddEmail = $('#adminAddEmail');
        var $adminAddUsername = $('#adminAddUsername');
        var $adminAddPassword = $('#adminAddPassword');

        var employee = {
            name: $adminAddName.val(),
            surname: $adminAddSurname.val(),
            phone: $adminAddPhone.val(),
            address: $adminAddAddress.val(),
            jmbg: $adminAddJmbg.val(),
            email: $adminAddEmail.val(),
            username: $adminAddUsername.val(),
            password: $adminAddPassword.val(),      
        }

        $.ajax({
            type: 'POST',
            url: 'admin/register',
            data: employee,
            success: function(response){
                console.log('uspesno pozvan url');
            //    if(document.getElementById("response") !== null) {
            //        document.getElementById("response").remove();
            //    }
                if(response.code === 0){
                    alert(response.msg);
            //         document.getElementById("messages").style.display = "block";
            //         $messages.append('<label id = "response" style = "color: red; padding-left: 10px">'+response.msg+'</label><br>');             
                } else{
                  $table.append('<tr>\n\
                  <td class="table1">'+response.user.idUser+'</td>\n\
                  <td class="table1">'+response.user.name+'</td>\n\
                  <td class="table1">'+response.user.surname+'</td>\n\
                  <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                  </tr>');

                  document.getElementById("myFormRegAdmin").style.display = "none";
                  $adminAddName.val('');
                  $adminAddSurname.val('');
                  $adminAddPhone.val('');
                  $adminAddAddress.val('');
                  $adminAddJmbg.val('');
                  $adminAddEmail.val('');
                  $adminAddUsername.val('');
                  $adminAddPassword.val('');
                }
            },
            error: function(){
                console.log('fail');
            }
        });
    });
   
    // Izmena osnovnih informacija o adminu

    $('#admin_confirm_button').on('click', function(){

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
            url: 'admin/updateUser',
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

              $('#labelWelcome').text('Dobrodošao/la '+response.user.name+' - ADMIN ');
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
    
    // Prikazivanje detalja o svakom zaposlenom posebno
  
    $('#empTable').on('click', 'td', function() {
      var row_num = parseInt( $(this).parent().index() )+1;   
      var column_num = parseInt( $(this).index() ) + 1;
      if (column_num === 4)
      {
          $selectedId = parseInt($(this).closest('tr').find('td:first').text());

          var userId = {
            idUser: $selectedId,  
        }

        $.ajax({
            type: 'POST',
            url: 'admin/getUser',
            data: userId,
            success: function(user){
                $global_user = user;
                console.log(user.name);

                $('#detailsNameSurname').text(user.name + ' ' + user.surname);
                $('#detailsAddress').text(user.address);
                $('#detailsPhone').text(user.phone);
                $('#detailsJmbg').text(user.jmbg);
                $('#detailsEmail').text(user.email);
                $('#detailsUsername').text(user.username);

                document.getElementById("myFormDetails").style.display = "block";
            }
        });
      }
    });
    
    // Prikazivanje detalja o svakom polazniku posebno
  
    $('#adminStudentTable').on('click', 'td', function() {
      var row_num = parseInt( $(this).parent().index() )+1;   
      var column_num = parseInt( $(this).index() ) + 1;
      if (column_num === 4) {
          $selectedId = parseInt($(this).closest('tr').find('td:first').text());

          var userId = {
            idUser: $selectedId,  
        }

        $.ajax({
            type: 'POST',
            url: 'admin/getUser',
            data: userId,
            success: function(user){
                $global_user = user;
                console.log(user.name);

                $('#detailsNameSurname').text(user.name + ' ' + user.surname);
                $('#detailsAddress').text(user.address);
                $('#detailsPhone').text(user.phone);
                $('#detailsJmbg').text(user.jmbg);
                $('#detailsEmail').text(user.email);
                $('#detailsUsername').text(user.username);

                document.getElementById("myFormDetails").style.display = "block";
            }
        });
      }
    });
    
    // Prikazivanje detalja o svakom registrovanom korisniku posebno
  
    $('#adminUserTable').on('click', 'td', function() {
     var row_num = parseInt( $(this).parent().index() )+1;   
     var column_num = parseInt( $(this).index() ) + 1;
     if (column_num === 4) {
         $selectedId = parseInt($(this).closest('tr').find('td:first').text());

        var userId = {
           idUser: $selectedId };

        $.ajax({
           type: 'POST',
           url: 'admin/getUser',
           data: userId,
           success: function(user){
              $global_user =  user;

              document.getElementById("myFormActivation").style.display = "block";
           } 
        }); 
     }
    });
    
    // Aktivacija registrovanog korisnika -> prebacivanje u polaznika
  
    $('#activation_button').on('click', function() {

         var userId = {
            idUser: $global_user.idUser };

          $.ajax({
            type: 'POST',
            url: 'admin/activateUser',
            data: userId,
            success: function(users){

                $('#adminUserTable tr').remove();
                   $('#adminUserTable').append('<tr>\n\
                    <th class = "table1"> Broj </th>\n\
                    <th class = "table1"> Ime </th>\n\
                    <th class = "table1"> Prezime </th>\n\
                    <th class = "table1"> Detalji </th>\n\
                </tr>');
                $.each(users, function(i, user){
                   $('#adminUserTable').append('<tr>\n\
                  <td class="table1">'+user.idUser+'</td>\n\
                  <td class="table1">'+user.name+'</td>\n\
                  <td class="table1">'+user.surname+'</td>\n\
                  <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                  </tr>');
                });                    
                document.getElementById("myFormActivation").style.display = "none";
            }
        });
    });
    
    // Brisanje zaposlenog ili polaznika
  
    $('#deleteButton').on('click', function() {

         var userId = {
           idUser: $global_user.idUser,
           typeUser: $global_user.type };

       $.ajax({
           type: 'POST',
           url: 'admin/deleteUser',
           data: userId,
           success: function(users){
               console.log(userId.typeUser);
               if (userId.typeUser == 1) {
                $('#empTable tr').remove();
                   $table.append('<tr>\n\
                   <th class = "table1"> Broj </th>\n\
                   <th class = "table1"> Ime </th>\n\
                   <th class = "table1"> Prezime </th>\n\
                   <th class = "table1"> Detalji </th>\n\
               </tr>');
               $.each(users, function(i, user){
                  $table.append('<tr>\n\
                 <td class="table1">'+user.idUser+'</td>\n\
                 <td class="table1">'+user.name+'</td>\n\
                 <td class="table1">'+user.surname+'</td>\n\
                 <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                 </tr>');
               });      }
           else  {
                $('#adminStudentTable tr').remove();
                  $('#adminStudentTable').append('<tr>\n\
                   <th class = "table1"> Broj </th>\n\
                   <th class = "table1"> Ime </th>\n\
                   <th class = "table1"> Prezime </th>\n\
                   <th class = "table1"> Detalji </th>\n\
               </tr>');
               $.each(users, function(i, user){
                  $('#adminStudentTable').append('<tr>\n\
                 <td class="table1">'+user.idUser+'</td>\n\
                 <td class="table1">'+user.name+'</td>\n\
                 <td class="table1">'+user.surname+'</td>\n\
                 <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                 </tr>');
               });      }

               document.getElementById("myFormDetails").style.display = "none";
           }, 
           error:function() {
               console.log("greska");
           }
       });
   });

});


