$(document).ready(function(){
    

    $(document).on('click', '.generateEmployeeReport', function(){  
        //alert('test');
        $.ajax({
         url:"export",  
         method:"post",  
         data:{
           export:"export"
           },
         success:function(){
            /*$('#message').html(data.status);
            setTimeout(function(){
                $('#message').html('');
            }, 90000);*/
          
         }
       });  
      
     });



     $('#generate_leave_balance').click(function(){

        //var to_date = '';
        alert('generate leave');
        //window.location.href="export?from_date="+from_date+"&to_date="+to_date+"";
        //window.location.href="export.php", true;
        var employeeiddb = document.getElementById("empID").value;
        window.location.href="exportpds.php?id="+employeeiddb, true;
     
     }); 

     $('#generate_employee_record').click(function(){

      //var to_date = '';
      alert('generate employee');
      //window.location.href="export?from_date="+from_date+"&to_date="+to_date+"";
      //window.location.href="export.php", true;

      var employeeiddb = document.getElementById("empID").value;
      window.location.href="exportpds.php?id="+employeeiddb, true;
   
   }); 

});
