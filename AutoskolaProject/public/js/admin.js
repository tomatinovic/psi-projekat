/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function (){
      
  var $table = $('#empTable');
  var $adminStudentTable = $('#adminStudentTable');
  var $adminUserTable = $('#adminUserTable');
  var $adminform = $('#admin_form');
  var $messages = $('#messages');
  
  $.ajax({
      type: 'GET',
      url: 'admin/getAdmin',
      success: function(admin){
        document.getElementById("labelWelcome").append('Dobrodošao/la'+admin.name+' - ADMIN ');
        document.getElementById("labelNameSurname").append(admin.name + ' ' + admin.surname);
        document.getElementById("labelAddress").append(admin.address);
        document.getElementById("labelPhone").append(admin.phone);
        document.getElementById("labelJmbg").append(admin.jmbg);
        document.getElementById("labelEmail").append(admin.email);
        document.getElementById("labelUsername").append(admin.username);
      }
  });
  
  var $adminform1 = $('#admin_form1'); 
  
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
  
   $('#buttonKorisnici').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#adminUserTable tr').remove();
      
           $adminUserTable.append('<tr>\n\
                  <th class = "table1"> Broj </th>\n\
                  <th class = "table1"> Ime </th>\n\
                  <th class = "table1"> Prezime </th>\n\
                  <th class = "table1"> Detalji </th>\n\
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
                <td class="table1"><input type="button" class =\'button_style\' style = "font-weight: bold;" value="Detalji" /></td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });     
  });
  
  
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
      
      var $myFormRegAdmin = $('#myFormRegAdmin');

      $.ajax({
          type: 'POST',
          url: 'admin/register',
          data: employee,
          success: function(response){
              console.log('uspesno pozvan url');
              if(document.getElementById("response") !== null) {
                  document.getElementById("response").remove();
              }
              if(response.code === 0){
                   document.getElementById("messages").style.display = "block";
                   $messages.append('<label id = "response" style = "color: red; padding-left: 10px">'+response.msg+'</label><br>');             
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
           
            $('#labelWelcome').text('Dobrodošao/la'+response.user.name+' - ADMIN ');
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
  
  $('#adminStudentTable').on('click', 'td', function() {
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
  
   $('#adminUserTable').on('click', 'td', function() {
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



});

