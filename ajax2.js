
 $(document).ready(function(){
  
  fetch_data2();

  function fetch_data2()
  {
   var dataTable2 = $('#user_data2').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch2.php",
     type:"POST"
    }
   });
  }
  
  function update_data2(id, column_name, value)
  {
   $.ajax({
    url:"update2.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data2').DataTable().destroy();
     fetch_data2();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data2(id, column_name, value);
  });
  
  $('#add2').click(function(){
   var html = '<tr>';
   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td><button type="button" name="insert2" id="insert2" class="btn btn-success btn-xs">Insert2</button></td>';
   html += '</tr>';
   $('#user_data2 tbody').prepend(html);
  });
  
  $(document).on('click', '#insert2', function(){
   var name = $('#data1').text();
   var priority = $('#data2').text();
   var status = $('#data3').text();
   var id = $('#data4').text();
   if(name != '')
   {
    $.ajax({
     url:"insert2.php",
     method:"POST",
     data:{name:name, priority:priority, status:status, id:id},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data2').DataTable().destroy();
      fetch_data2();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Both Fields is required");
   }
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete2.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data2').DataTable().destroy();
      fetch_data2();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });

