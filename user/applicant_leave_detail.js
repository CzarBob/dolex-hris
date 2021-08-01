
 function myFunction() {
        //alert(document.getElementById("children_data").rows[1].cells[0].innerHTML);
        var children_data = document.getElementById('children_data');
        var employeeiddb = document.getElementById("empID").value;
        var TableData = new Array();

        $('#children_data tr').each(function(row, tr){
            TableData[row]={
                "fullName" : $(tr).find('td:eq(0)').text()
                , "dob" :$(tr).find('td:eq(1)').text()
               
            }
        }); 
        TableData.shift();

        $.ajax({
                url: 'view_employee_action.php',
                type: 'post',
                data: 
                {
                    children_data:TableData,
                    employeeiddb:employeeiddb, 
                    action:'update_children'
                },

                dataType: 'json',
                success:function(response){

                    var len = response.length;

                    if(len > 0){

                    alert("Exito");

                    }

                }
            });

            return false;

        }

            $(document).ready(function(){
                fetch_single();   
                
                function fetch_empoloyee_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    var dataTable = $('#service_record_data').DataTable({
                    /* "processing" : true,
                    "serverSide" : true,*/
                    //"columnDefs": [{ "orderable": false, "targets":[1] }],
                   // "order" : [],
                    "ajax" : {
                    url:"applicant_leave_detail_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_employee_record'},
                    }
                    });
                }

                


                
                function fetch_single() {
                        var employeeiddb = document.getElementById("empID").value;
                        
                        //var email_hidden = $(this).data('email_hidden'); //data id in database
                        //var admin_id = $(this).data('id');
                        //$('#user_form').parsley().reset();

                        $.ajax({
                                url:"applicant_leave_detail_action.php",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_single'},
                                dataType:'JSON',
                                success:function(data)
                                {
                                    $('#employeeid').val(data.data.employeeid);
                                    $('#firstname').val(data.data.firstname);
                                    $('#middlename').val(data.data.middlename);
                                    $('#lastname').val(data.data.lastname);
                                    $('#extension').val(data.data.extension);
                                    $('#position').val(data.data.position);
                                    $('#datehired').val(data.data.datehired);
                                    
                                }
                            });

                            fetch_service_record_data();
                          


                    
                }  
                


                $(document).on('click', '#add_service_record', function(){
                    var employeeiddb = document.getElementById("empID").value;
                        //validateData();
                        //var answer = validateData();
                            //alert('e');
                            var usernameid = $('#loginID').val();
                            var service_from = $('#service_from').val();
                            var service_to = $('#service_to').val();   
                            var designation = $('#designation').val();
                            var status = $('#status').val(); 
                            var salary = $('#salary').val(); 
                            var office = $('#office').val(); 
                            var branch = $('#branch').val(); 
                            var abs = $('#abs').val();   
                            var separation_date = $('#separation_date').val();    
                            var amount_received = $('#amount_received').val();     
                            var details = $('#details').val(); 
                           // alert(details);
                            $.ajax({
                                url:"serviceRecord_action",
                                method:"POST",
                                dataType:'JSON',
                                data:{
                                    usernameid:usernameid,
                                    service_from:service_from, 
                                    service_to:service_to, 
                                    designation:designation, 
                                    status:status, 
                                    salary:salary, 
                                    office:office, 
                                    branch:branch, 
                                    abs:abs, 
                                    separation_date:separation_date,
                                    amount_received:amount_received,
                                    details:details,
                                    employeeiddb:employeeiddb,
                                    action:'add_service_record'
                                },
                                success:function(data){
                                    //alert("Data Added");
                                    $('#service_from').val('');
                                    $('#service_to').val('');
                                    $('#designation').val('');
                                    $('#status').val('');
                                    $('#salary').val('');
                                    $('#office').val('');
                                    $('#branch').val('');
                                    $('#abs').val('');
                                    $('#separation_date').val('');
                                    $('#amount_received').val('');
                                    $('#details').val('');
                                    $('#service_record_data').DataTable().ajax.reload();
                                    $('#modalServiceRecordForm').modal('hide');
                                    $('#message').html(data.status);
                                    setTimeout(function(){
                                        $('#message').html('');
                                    }, 90000);
                                   
                               
                                }     
                            }); 
                });


               

                $(document).on('click', '#submit_update_service_record', function(){
                    var employeeiddb = document.getElementById("empID").value;
                            var srid = $('#srid').val();
                            var service_from = $('#service_from_update').val();
                            var service_to = $('#service_to_update').val();   
                            var designation = $('#designation_update').val();
                            var status = $('#status_update').val(); 
                            var salary = $('#salary_update').val(); 
                            var office = $('#office_update').val(); 
                            var branch = $('#branch_update').val(); 
                            var abs = $('#abs_update').val();   
                            var separation_date = $('#separation_date_update').val();
                            var amount_received = $('#amount_received_update').val();     
                            var details = $('#details_update').val();          
                            var usernameid = $('#loginID').val();

                            $.ajax({
                                url:"serviceRecord_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    srid:srid, 
                                    service_from:service_from, 
                                    service_to:service_to,
                                    designation:designation,
                                    status:status,
                                    salary:salary,
                                    office:office,
                                    branch:branch,
                                    abs:abs,
                                    separation_date:separation_date,
                                    amount_received:amount_received,
                                    details:details,
                                    usernameid:usernameid,
                                    action:'submit_update_sr'
                                },
                                success:function(data){
                                //alert("Data Updated");

                                $('#service_record_data').DataTable().ajax.reload();
                                $('#modalUpdateServiceRecordForm').modal('hide');
                                $('#message').html(data.status);
                                    setTimeout(function(){
                                        $('#message').html('');
                                    }, 90000);
                               
                                }     
                            }); 
                });
            });

            function refreshPage() {
                    location.reload(true);
                }
                
            $(document).on('click', '#cancel_sr', function(){
                     window.location.href="serviceRecord";
                     
            });



            $(document).on('click', '.delete_sr', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";

                    $.ajax({
                        url:"serviceRecord_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_sr'

                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#service_record_data').DataTable().ajax.reload();
                        }     
                    }); 

            });

            $(document).on('click', '.update_sr', function(){
                     var id = $(this).data('id');
                     //alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                
                    $.ajax({
                        url:"serviceRecord_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                            action:'fetch_single_sr'
                        },
                        success:function(data){
                            var values = $.parseJSON(data);

                            $('#srid').val(values.srid);
                            $('#service_from_update').val(values.service_from);
                            $('#service_to_update').val(values.service_to);
                            $('#designation_update').val(values.designation);
                            $('#status_update').val(values.status);
                            $('#salary_update').val(values.salary);
                            $('#office_update').val(values.office);
                            $('#branch_update').val(values.branch);
                            $('#abs_update').val(values.abs);
                            $('#separation_date_update').val(values.separation_date);
                            $('#amount_received_update').val(values.amount_received);
                            $('#details_update').val(values.details);
    
                            $('#modalUpdateServiceRecordForm').modal('show'); 
                            //$('#modalServiceRecordForm').modal('show');
      
                        }     
                    }); 
            });

            $('#generateReport').click(function(){

                //var to_date = '';
                //window.location.href="export?from_date="+from_date+"&to_date="+to_date+"";
                var employeeiddb = document.getElementById("empID").value;
                window.location.href="export2.php?id="+employeeiddb, true;
            
            }); 



            
   