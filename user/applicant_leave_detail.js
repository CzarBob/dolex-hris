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
    output += '<td><input type="text" name="programming_languages[]" placeholder="Add Programming Languages" class="form-control name_list" /></td>';
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

});

$('#add_name').on('submit', function(event){
    event.preventDefault();
    if($('#name').val() == '')
    {
        alert("Enter Your Name");
        return false;
    }
    var total_languages = 0;
    $('.name_list').each(function(){
        if($(this).val() != '')
        {
            total_languages = total_languages + 1;
        }
    });

    if(total_languages > 0)
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
                add_dynamic_input_field(1);
                //load_data();
                $('#add_name')[0].reset();
                $('#dynamic_field_modal').modal('hide');
            }
        });
    }
    else
    {
        alert("Please Enter at least one programming languages");
    }
});


                


                


