/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function (){
    
       
  $.ajax({
      type: 'GET',
      url: 'registered/getRegistered',
      success: function(registred){
        document.getElementById("labelWelcome").append('Dobrodošao/la'+registred.name);
        document.getElementById("labelNameSurname").append(registred.name + ' ' + registred.surname);
        document.getElementById("labelAddress").append(registred.address);
        document.getElementById("labelPhone").append(registred.phone);
        document.getElementById("labelJmbg").append(registred.jmbg);
        document.getElementById("labelEmail").append(registred.email);
        document.getElementById("labelUsername").append(registred.username);
      }
  });
  
  $('#changeData1').on('click', function(){
    
       $.ajax({
      type: 'GET',
      url: 'registered/getRegistered',
      success: function(registred){
            document.getElementById("changeNameSurname").value= registred.name + ' ' + registred.surname;
            document.getElementById("changeAddress").value=registred.address;
            document.getElementById("changePhone").value=registred.phone;
            document.getElementById("changeJmbg").value=registred.jmbg;
            document.getElementById("changeEmail").value=registred.email;
            document.getElementById("changeUsername").value=registred.username;
         
            document.getElementById("admin_form").style.display = "none";           
            document.getElementById("admin_form1").style.display = "block";  
      }
  });
           
  });
    });

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
          url: 'registered/updateUser',
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

$('#casovi').on('click', function(){
      
      //da se ne bi appendovali elemnenti konstantno i pravili duplikati
      $('#casovi1 tr').remove();
        $('#casovi1').append('<tr>\n\
                  <th class = "table1"> Profesor </th>\n\
                  <th class = "table1"> Dani </th>\n\
                  <th class = "table1"> Vreme </th>\n\
              </tr>');
      
      console.log('pritisnuto dugme');
      
      $.ajax({
          type: 'GET',
          url: 'registered/getAllTheoryClasses',
          datatype: 'json',
          success: function(casovi){
              console.log('uspesno pozvan url');
              $.each(casovi, function(i, cas){
                 $('#casovi1').append('<tr>\n\
                <td class="table1">'+cas.name+' '+cas.surname+'</td>\n\
                <td class="table1">'+cas.day+'</td>\n\
                <td class="table1">'+cas.time+'</td>\n\
                </tr>');
              });
          },
          error: function(){
              console.log('fail');
          }
      });         
  });
