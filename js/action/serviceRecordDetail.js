
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
                action:'update_children'},

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
                
                function fetch_children_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    var dataTable = $('#children_data').DataTable({
                    /* "processing" : true,
                    "serverSide" : true,*/
                    "columnDefs": [{ "orderable": false, "targets":[0,2] }],
                   // "order" : [],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_children'},
                    }
                    });
                }

                function fetch_service_record_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    var dataTable = $('#children_data').DataTable({
                    /* "processing" : true,
                    "serverSide" : true,*/
                    "columnDefs": [{ "orderable": false, "targets":[0,2] }],
                   // "order" : [],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_service_record'},
                    }
                    });
                }

                


                
                function fetch_single() {
                        var employeeiddb = document.getElementById("empID").value;
                        
                        //var email_hidden = $(this).data('email_hidden'); //data id in database
                        //var admin_id = $(this).data('id');
                        //$('#user_form').parsley().reset();

                        $.ajax({
                                url:"view_employee_action.php",
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

                            fetch_children_data();
                          


                    
                }  


                $(document).on('click', '#add_children', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                        //validateData();
                        //var answer = validateData();
                            var fullname = $('#fullname').val();
                            var dob = $('#dob_add').val();              
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    fullname:fullname, 
                                    dob:dob, 
                                    employeeiddb:employeeiddb,
                                    action:'add_children'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#children_data').DataTable().ajax.reload();
                                $('#modalChildrenForm').modal('hide');
                               
                                }     
                            }); 
                });


               

                $(document).on('click', '#submit_update_children', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                        //validateData(); submit_update_educ
                        //var answer = validateData();
                            var fullname = $('#fullname_update').val();
                            var hidden_id = $('#hidden_id').val();
                            var dob = $('#dob_update').val();    

          
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    fullname:fullname, 
                                    dob:dob, 
                                    employeeiddb:employeeiddb,
                                    id:hidden_id,
                                    action:'submit_update_children'
                                },
                                success:function(data){
                                alert("Data Updated");

                                $('#children_data').DataTable().ajax.reload();
                                $('#modalEditChildrenForm').modal('hide');
                               
                                }     
                            }); 
                });



                

            });

            function refreshPage() {
                    location.reload(true);
                }


           


            $(document).on('click', '#cancel_sr', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var cancel_employee = "Success";

                    var empid = $('#employeeid').val();


                 //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            
                            empid:empid, 
                            employeeiddb:employeeiddb,
                            action:'cancel_update'

                        },
                        success:function(data){
                        // $('#add_employee').modal('hide');
                        
                        //COMMENTED FOR THE MEAN TIME
                        // $('#user_data').DataTable().destroy();
                        //fetch_data();
                        //alert("Data Updated");


                        window.location.href="employee_detail";
                        }     
                    }); 
                    //}
            });



            $(document).on('click', '.delete_children', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_children'

                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#children_data').DataTable().ajax.reload();
                        }     
                    }); 

            });

            $(document).on('click', '.update_children', function(){
                     var id = $(this).data('id');
                     //alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                    //
                
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                            action:'fetch_single_children'
                        },
                        success:function(data){
                        var values = $.parseJSON(data);

                       $('#employeeid_update').val(values.employeeid);
                        $('#fullname_update').val(values.fullname);
                        $('#hidden_id').val(values.hidden_id);
                        $('#dob_update').val(values.dob);
                    
                        $('#modalEditChildrenForm').modal('show');

                       
                       

                        
                        }     
                    }); 

            });



            
   