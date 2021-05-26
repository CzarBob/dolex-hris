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



     $('#generateReport').click(function(){

        //var to_date = '';

        //window.location.href="export?from_date="+from_date+"&to_date="+to_date+"";
        window.location.href="export.php", true;
     
     }); 

});
