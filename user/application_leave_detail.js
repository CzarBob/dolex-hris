function leaveChange() {
   /*
   
    document.getElementById("partone1").disabled = true;
    document.getElementById("partone2").disabled = true;
    //document.getElementById("partone1Details").disabled = true;
    //document.getElementById("partone2Details").disabled = true;
    document.getElementById("parttwo1").disabled = true;
    document.getElementById("parttwo2").disabled = true;
    //document.getElementById("parttwo1details").disabled = true;
    //document.getElementById("parttwo2details").disabled = true;
    //document.getElementById("partthree1").disabled = true;
    //document.getElementById("partthree1details").disabled = true;
    document.getElementById("partfour1").disabled = true;
    document.getElementById("partfour2").disabled = true;
    document.getElementById("partfive1").disabled = true;
    document.getElementById("partfive2").disabled = true;

*/


$('input[name=partone]').attr('checked',false);
$('input[name=parttwo]').attr('checked',false);
$('input[name=partfour]').attr('checked',false);
$('input[name=partfive]').attr('checked',false);


    if ((document.getElementById("leave_type").value == "VACATION") || (document.getElementById("leave_type").value == "SPECIALPRIVILEGE")){
        /*document.getElementById("partone1").disabled = false;
        document.getElementById("partone2").disabled = false;*/
        //document.getElementById("partone1Details").disabled = false;
        //document.getElementById("partone2Details").disabled = false;
        //alert('sfs');
            
        document.getElementById('part1div').style.display = "inline";
        document.getElementById('part2div').style.display = "none";
        document.getElementById('part4div').style.display = "none";
        document.getElementById('part5div').style.display = "none";
    

        document.getElementById("parttwo1").checked = false;
        document.getElementById("parttwo2").checked = false;
        document.getElementById("partfour1").checked = false;
        document.getElementById("partfour2").checked = false;
        document.getElementById("partfive1").checked = false;
        document.getElementById("partfive2").checked = false;
       
        
    }     
    else if (document.getElementById("leave_type").value == "SICK"){
        document.getElementById('part1div').style.display = "none";
        document.getElementById('part2div').style.display = "inline";
        document.getElementById('part4div').style.display = "none";
        
     

        document.getElementById("partone1").checked = false;
        document.getElementById("partone2").checked = false;
        document.getElementById("partfour1").checked = false;
        document.getElementById("partfour2").checked = false;
        document.getElementById("partfive1").checked = false;
        document.getElementById("partfive2").checked = false;
                
     
    
    }
    else if (document.getElementById("leave_type").value == "WOMEN"){
       
        document.getElementById('part1div').style.display = "none";
        document.getElementById('part2div').style.display = "none";
        document.getElementById('part4div').style.display = "none";
       
        document.getElementById("partone1").checked = false;
        document.getElementById("partone2").checked = false;
        document.getElementById("parttwo1").checked = false;
        document.getElementById("parttwo2").checked = false;
        document.getElementById("partfour1").checked = false;
        document.getElementById("partfour2").checked = false;
        document.getElementById("partfive1").checked = false;
        document.getElementById("partfive2").checked = false;

    }   
    else if (document.getElementById("leave_type").value == "STUDY"){
        
        document.getElementById('part1div').style.display = "none";
        document.getElementById('part2div').style.display = "none";
        document.getElementById('part4div').style.display = "inline";
       
    
        document.getElementById("partone1").checked = false;
        document.getElementById("partone2").checked = false;
        document.getElementById("parttwo1").checked = false;
        document.getElementById("parttwo2").checked = false;
        //document.getElementById("partfour1").checked = false;
        //document.getElementById("partfour2").checked = false;
        document.getElementById("partfive1").checked = false;
        document.getElementById("partfive2").checked = false;


    }   
    if ((document.getElementById("leave_type").value == "MONETIZATION") || (document.getElementById("leave_type").value == "TERMINAL")){
        
        document.getElementById('part1div').style.display = "none";
        document.getElementById('part2div').style.display = "none";
        document.getElementById('part4div').style.display = "none";
        document.getElementById('part5div').style.display = "inline";
       


        document.getElementById("partone1").checked = false;
        document.getElementById("partone2").checked = false;
        document.getElementById("parttwo1").checked = false;
        document.getElementById("parttwo2").checked = false;
        document.getElementById("partfour1").checked = false;
        document.getElementById("partfour2").checked = false;
        //document.getElementById("partfive1").checked = false;
        //document.getElementById("partfive2").checked = false;   
    }   
}



function add_dynamic_input_field(count)
{

    var button = '';
    if(count > 1)
    {
        button = '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">x</button>';
    }
    else
    {
        button = '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
    }
    output = '<tr id="row'+count+'">';
    output += '<td><input type="date" name="inclusive_date[]"  class="form-control name_list" /></td>';
    output += '<td align="center">'+button+'</td></tr>';
    $('#dynamic_field').append(output);
}

$(document).on('click', '#add_more', function(){
    count = count + 1;
    add_dynamic_input_field(count);
});

$(document).on('click', '.remove', function(){
    var row_id = $(this).attr("id");
    $('#row'+row_id).remove();
});


$(document).ready(function(){
    count = 1;
    add_dynamic_input_field(count);
    //document.getElementById('dateoffilling').value = new Date().toDateInputValue();


    fetch_employee_data();   
    
    

});

function fetch_employee_data(){
    //alert('zz');
    var loginID = document.getElementById("loginID").value;
    //alert(leaveID);
    var action = 'fetch_leave_application';
    //alert(action);
    $.ajax({

        url:"application_leave_detail_action.php",
        type:"POST",
        data:{
            loginID:loginID, 
            action:action},
      
        dataType:'JSON',
        success:function(data)
        {

            $('#office').val(data.data.office);
            $('#division').val(data.data.division);
            $('#firstname').val(data.data.firstname);
            $('#middlename').val(data.data.middlename);
            $('#lastname').val(data.data.lastname);
            $('#extension').val(data.data.extension);
            //$('#dateoffilling').val(data.data.dateoffilling);
            //$('#salary').val(data.data.salary);
            $("#position").val(data.data.position);
           
            
        }
    });
}

function validateLeave(){
    var leaveType        =    $('#leavetype').val();
    var fillingdate        =    document.getElementById("dateoffilling").value;
    var dataArr = [];

    var inclusive_date = document.getElementsByName('inclusive_date[]');
    //alert(inclusive_date[0].value);
    
     // The number of milliseconds in one day
     var date1, date2;  
     //define two date object variables with dates inside it  
     date1 = new Date(fillingdate);  
     date2 = new Date(inclusive_date[0].value);  

     //calculate time difference  
     var time_difference = date2.getTime() - date1.getTime();  

     //calculate days difference by dividing total milliseconds in a day  
     var days_difference = time_difference / (1000 * 60 * 60 * 24);  
       
     /*document.write("Number of days between dates <br>" +   
                     date1 + " and <br>" + date2 + " are: <br>"   
                     + days_difference + " days");*/

    
        return days_difference;
    
    
}



$('#add_name').on('submit', function(event){
    //alert('etst');
    event.preventDefault();
    var dataArr = [];
    var daysdifference = validateLeave();
    var leave_type          = $('#leave_type').val();
    var workingdays        = $('#workingdays').val();
    alert($('#dateoffilling').val());
    //alert(daysdifference);
    if ((leave_type == 'SICK') && (daysdifference + 1 < 0)){
        alert('Application is '+ Math.abs(daysdifference+1)+' days late upon filling of leave application');

    }
    var inclusive_date = document.getElementsByName('inclusive_date[]');

    for(key=0; key < inclusive_date.length; key++)  {

        dataArr.push(inclusive_date[key].value);
    }
    var dataArr_joined = dataArr.join();
    var messageValidate = "Confirm "+leave_type+" leave on inclusive day/s "+dataArr_joined+" ?";
    if (confirm(messageValidate) == true) {
        
        var total_dates = 0;
        $('.name_list').each(function(){
            if($(this).val() != '')
            {
                total_dates = total_dates + 1;
            }
        });
        
        if (leave_type != "NA"){

            if((total_dates > 0) && (total_dates == workingdays))
            {
                var form_data = $(this).serialize();
    
                var action = $('#action').val();

                $.ajax({
                    url:"application_leave_detail_action",
                    method:"POST",
                    data:form_data,
                    dataType: 'JSON',
                    success:function(data)
                    {
                        if(action == 'add_leave')
                        {
                            alert("Application Successfully Submitted");
                            window.location.href = "application_leave";
                            
    
                        }
                        if(action == 'edit')
                        {
                            alert("Data Edited");
                        }
                        add_dynamic_input_field(0);
                        
                        $('#add_name')[0].reset();
                    }
                });
            }
            else
            {
                alert("Inclusive date is blank or is not equal to working days specified");
            }
        } else {
            alert("Please indicate leave type");
        }
        

    } 
    


});


                


                


