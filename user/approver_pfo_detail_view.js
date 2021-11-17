function leaveChange() {
    document.getElementById("partone1").disabled = true;
    document.getElementById("partone2").disabled = true;
    /*document.getElementById("partone1Details").disabled = true;
    document.getElementById("partone2Details").disabled = true;*/
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
    

/*

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
        
    }  */ 
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
        
        var leaveID = document.getElementById("leaveID").value;
        //alert(leaveID);
        var action = 'fetch_leave_application';
        //alert(action);
        $.ajax({

            url:"approver_pfo_detail_view_action.php",
            type:"POST",
            data:{
                leaveID:leaveID, 
                action:action},
          
            dataType:'JSON',
            success:function(data)
            {

                $('#office').val(data.data.fieldofficeid);
                $('#division').val(data.data.divisionid);
                $('#firstname').val(data.data.firstname);
                $('#middlename').val(data.data.middlename);
                $('#lastname').val(data.data.lastname);
                $('#extension').val(data.data.extension);
                $('#dateoffilling').val(data.data.dateoffilling);
                $('#salary').val(data.data.salary);

                var leaveTypeValue =  data.data.leavetype;
                $("#leave_type").val(leaveTypeValue).change();
                $("#workingdays").val(data.data.workingdays);
                $("#inclusivedate").val(data.data.inclusivedate);
                
                var partOneValue =  data.data.partone; //In case of Vacation/Special Privilege Leave
                if (partOneValue != ""){
                    $("input[name=partone][value="+partOneValue+"]").prop('checked', true);
                }
                var partTwoValue = data.data.parttwo; //In case of Sick Leave:
                if (partTwoValue != ""){
                    $("input[name=parttwo][value="+partTwoValue+"]").prop('checked', true);
                }
                var partThreeValue =  data.data.partthree; //In case of Special Leave Benefits for Women
                $('#parthree').val(partThreeValue);
                
                var partFourValue =  data.data.partfour; //In case of Study Leave
                if (partFourValue != ""){
                    $("input[name=partfour][value="+partFourValue+"]").prop('checked', true);
                }
                var partFiveValue =  data.data.partfive; //Other Purpose
                if (partFiveValue != ""){
                    $("input[name=partfive][value="+partFiveValue+"]").prop('checked', true);
                }
                var partSixValue =  data.data.partsix; //Commutation
                if (partSixValue != ""){
                    $("input[name=partsix][value="+partSixValue+"]").prop('checked', true);
                }
               

                $("#chiefremarks").val(data.data.chiefremarks);
                $("#rdremarks").val(data.data.rdremarks);
                $("#applicantremarks").val(data.data.applicantremarks);
                $("#slcredit").val(data.data.slcredit);
                $("#slless").val(data.data.slless);
                $("#slbalance").val(data.data.slbalance);
                $("#vlcredit").val(data.data.vlcredit);
                $("#vlless").val(data.data.vlless);
                $("#vlbalance").val(data.data.vlbalance);
                $("#attachment").val(data.data.attachment);
                $("#position").val(data.data.position);

               
                
            }
        });
    }




    $(document).on('click', '#submit_approve_leave', function(){
        var leaveID = document.getElementById("leaveID").value;
        //alert('approve');

        var chiefremarks = $('#chiefremarks').val();
 
        var messageValidate = "Confirm approval of leave?";
        if (confirm(messageValidate) == true) {
            $.ajax({
                url:"approver_pfo_detail_view_action",
                method:"POST",
                dataType:'JSON',
                data:{
                    chiefremarks:chiefremarks, 
                    leaveID:leaveID, 
                   
                    action:'approve_leave'
                },
                success:function(data){
               
                alert(data.status);
                /*$('#children_data').DataTable().ajax.reload();
                $('#modalEditChildrenForm').modal('hide');
                $('#message2').html(data.status);
                    setTimeout(function(){
                        $('#message2').html('');
                    }, 90000);*/

                    window.location.href = 'approver_pfo';
                }     
            }); 
        
        }
    });


    $(document).on('click', '#submit_reject_leave', function(){
        var leaveID = document.getElementById("leaveID").value;
        //alert('rejected');
                var chiefremarks = $('#chiefremarks').val();
                var leaveID = document.getElementById("leaveID").value;

                var messageValidate = "Confirm disapproval of leave?";
                if (confirm(messageValidate) == true) {
                    $.ajax({
                        url:"approver_pfo_detail_view_action",
                        method:"POST",
                        dataType:'JSON',
                        data:{
                            fullname:fullname, 
                            dob:dob, 
                            employeeiddb:employeeiddb,
                            id:hidden_id,
                            action:'reject_leave'
                        },
                        success:function(data){
                       
                            alert(data.status);
                            /*$('#children_data').DataTable().ajax.reload();
                            $('#modalEditChildrenForm').modal('hide');
                            $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);*/
            
                                window.location.href = 'approver_pfo';
                        }     
                    }); 
                
                }
    });





});
/*
$('#add_name').on('submit', function(event){

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
    


});*/




                


                


