function leaveChange() {
    document.getElementById("partone1").disabled = true;
    document.getElementById("partone2").disabled = true;
    document.getElementById("partone1Details").disabled = true;
    document.getElementById("partone2Details").disabled = true;
    document.getElementById("parttwo1").disabled = true;
    document.getElementById("parttwo2").disabled = true;
    document.getElementById("parttwo1details").disabled = true;
    document.getElementById("parttwo2details").disabled = true;
    document.getElementById("partthree1").disabled = true;
    document.getElementById("partthree1details").disabled = true;
    document.getElementById("partfour1").disabled = true;
    document.getElementById("partfour2").disabled = true;
    document.getElementById("partfive1").disabled = true;
    document.getElementById("partfive2").disabled = true;
    



    if ((document.getElementById("leave_type").value == "VACATION") || (document.getElementById("leave_type").value == "SPECIALPRIVILEGE")){
        //document.getElementById("message").innerHTML = "Common message";
        document.getElementById("partone1").disabled = false;
        document.getElementById("partone2").disabled = false;
        document.getElementById("partone1Details").disabled = false;
        document.getElementById("partone2Details").disabled = false;
        
    }     
    else if (document.getElementById("leave_type").value == "SICK"){
        document.getElementById("parttwo1").disabled = false;
        document.getElementById("parttwo2").disabled = false;
        document.getElementById("parttwo1details").disabled = false;
        document.getElementById("parttwo2details").disabled = false;
    }
    else if (document.getElementById("leave_type").value == "WOMEN"){
        document.getElementById("partthree1").disabled = false;
        document.getElementById("partthree1details").disabled = false;
       
    }   
    else if (document.getElementById("leave_type").value == "STUDY"){
        document.getElementById("partfour1").disabled = false;
        document.getElementById("partfour2").disabled = false;

    }   
    if ((document.getElementById("leave_type").value == "MONETIZATION") || (document.getElementById("leave_type").value == "TERMINAL")){
        document.getElementById("partfive1").disabled = false;
        document.getElementById("partfive2").disabled = false;
        
    }   
}



function add_dynamic_input_field(count)
{
    //alert('pota');
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

    fetch_leave_data();   
    
    function fetch_leave_data(){
        
        var employeeiddb = document.getElementById("empID").value;
        var action = 'fetch_leave_application';
        alert(action);
        $.ajax({

            url:"approver_pfo_detail_view_action.php",
            type:"POST",
            data:{
                employeeiddb:employeeiddb, 
                action:action},
          
            dataType:'JSON',
            success:function(data)
            {

                $('#office').val(data.data.firstname);
                $('#division').val(data.data.middlename);
                $('#firstname').val(data.data.firstname);
                $('#middlename').val(data.data.middlename);
                $('#lastname').val(data.data.lastname);
                $('#extension').val(data.data.extension);
                $('#dateoffilling').val(data.data_leave.dateoffilling);
                $('#salary').val(data.data_leave.salary);

                var leaveTypeValue =  data.data_leave.leavetype;
                $("#leave_type").val(leaveTypeValue).change();
                $("#dateoffilling").val(data.data_leave.lastname);
                $("#workingdays").val(data.data_leave.workingdays);
                
                /*var genderValue =  values.data_profile.gender;

                if (genderValue == 'MALE'){
                    $("#gender_update").val("MALE").change();
                } else if (genderValue == "") {
                    $("#gender_update").val('NA').change();
                }*/




                /**
                 * 
                 * 
                 * 
                 * 
                 * 
                 * 
                 * $sub_array_query_leave['partone']                  
$sub_array_query_leave['parttwo']                  
$sub_array_query_leave['partthree']                
$sub_array_query_leave['partfour']                 
$sub_array_query_leave['partfive']                 
$sub_array_query_leave['partsix']                  
$sub_array_query_leave['recommendation']           
$sub_array_query_leave['recommendationdetails']    
$sub_array_query_leave['approveddayswithpay']      
$sub_array_query_leave['approveddayswithoutpay']   
$sub_array_query_leave['approveddaysothers']       
$sub_array_query_leave['disapproveddue']           
$sub_array_query_leave['daterdupdated']            
$sub_array_query_leave['rdapprovedstatus']         
$sub_array_query_leave['headapprovestatus']        
$sub_array_query_leave['dateheadupdated']          
      
                 */
               
                
            }
        });
    }

});

$('#add_name').on('submit', function(event){
    //alert('etst');
    event.preventDefault();
    var dataArr = [];

    var leave_type          = $('#leave_type').val();
    var workingdays        = $('#workingdays').val();

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

        if(total_dates > 0)
        {
            var form_data = $(this).serialize();

            var action = $('#action').val();
            $.ajax({
                url:"applicant_leave_detail_action.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    if(action == 'add_leave')
                    {
                        alert("Data Inserted");

                    }
                    if(action == 'edit')
                    {
                        alert("Data Edited");
                    }
                    add_dynamic_input_field(0);
                    
                    $('#add_name')[0].reset();
                    //$('#dynamic_field_modal').modal('hide');
                }
            });
        }
        else
        {
            alert("Please provide inclusive dates for leave");
        }
    } 
    


});


                


                


