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

            url:"application_leave_view_only_action.php",
            type:"POST",
            data:{
                leaveID:leaveID, 
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
            
               
                
            }
        });
    }




  




});





                


                


