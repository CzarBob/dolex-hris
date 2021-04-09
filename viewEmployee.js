
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
    
                //fetch_data();
                fetch_single();
                //document.getElementById("update_eligibility").style.visibility='hidden';
                function fetch_children_data(){
                    //alert('pota');
                    
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

                function fetch_educ_data(){
                    //alert('pota');
                    var employeeiddb = document.getElementById("empID").value;
                    
                    //alert('s');
                    var dataTable = $('#educ_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,8] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_educ'},
                    }
                    });
                    //alert(dataTable);
                }

                function fetch_civil_data(){
                    //alert('pota');
                    var employeeiddb = document.getElementById("empID").value;
                    
                    //alert('s');
                    var dataTable = $('#civil_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,6] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_eligibility'},
                    }
                    });
                    //alert(dataTable);
                } 

                function fetch_work_data(){
                    //alert('pota');
                    var employeeiddb = document.getElementById("empID").value;
                    
                    //alert('s');
                    var dataTable = $('#work_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,6] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_work'},
                    }
                    });
                    //alert(dataTable);
                }

                function fetch_volwork_data(){
  
                    var employeeiddb = document.getElementById("empID").value;
                    

                    var dataTable = $('#volwork_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,4] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_volwork'},
                    }
                    });

                }

                function fetch_landd_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    

                    var dataTable = $('#landd_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1,4] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_landd'},
                    }
                    });

                }

                function fetch_other_skill_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    

                    var dataTable = $('#other_skill_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_other_skill'},
                    }
                    });

                }

                
                function fetch_other_recognition_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    

                    var dataTable = $('#other_recognition_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_other_recognition'},
                    }
                    });

                }


                function fetch_other_membership_data(){
                    
                    var employeeiddb = document.getElementById("empID").value;
                    

                    var dataTable = $('#other_membership_data').DataTable({
                    "columnDefs": [{ "orderable": false, "targets":[1] }],
                    "ajax" : {
                    url:"view_employee_action.php",
                    type:"POST",
                    data:{
                                    employeeiddb:employeeiddb, 
                                    action:'fetch_other_membership'},
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
                                    $('#username').val(data.data.username);
                                    $('#password').val(data.data.password);
                                    $('#confirmpassword').val(data.data.password);

                                    /*$('#slcredit').val(data.data.slcredit);
                                    $('#vlcredit').val(data.data.vlcredit);*/

                                    var genderValue =  data.data_profile.gender;

                                    if (genderValue == 'MALE'){
                                        $("#gender").val("MALE").change();
                                    } else if (genderValue == "") {
                                        $("#gender").val('NA').change();
                                    }
                                    //var civilStatusValue =  'NA';
                                    var civilStatusValue =  data.data_profile.civilstatus;
                                    
                                    $("#civilstatus").val(civilStatusValue).change();
         
                               
                                    
                                    $('#profileid').val(data.data_profile.id);
                                    $('#dob').val(data.data_profile.dob);
                                    $('#placeofbirth').val(data.data_profile.placeofbirth);
                                    $('#height').val(data.data_profile.height);
                                    $('#weight').val(data.data_profile.weight);
                                    $('#gsisno').val(data.data_profile.gsisno);
                                    $('#pagibigno').val(data.data_profile.pagibigno);
                                    $('#phicno').val(data.data_profile.phicno);
                                    $('#sssno').val(data.data_profile.sssno);
                                    $('#tinno').val(data.data_profile.tinno);
                                    $('#agencyemployeeno').val(data.data_profile.agencyemployeeno);
                                   
                                    //$('#citizenship').prop("dual", true)
                                    var citizenValueDB = data.data_profile.citizenship;
                                    //$('#citizenship').attr('checked','checked');
                                    //alert(citizenValueDB);
                                    if (citizenValueDB == 'dual'){
                                        $('#dual').attr('checked','checked');
                                    } else if (citizenValueDB == 'filipino'){
                                        $('#filipino').attr('checked','checked');
                                    }
                                   
                                    var citizenValue = $('input[name="citizenship"]:checked').val();
                                    if (citizenValue == 'dual'){
                                            
                                            document.getElementById("birth").disabled=false;
                                            document.getElementById("naturalization").disabled=false;
                                            //document.getElementById("dualcountry").disabled=false;
                                        } else {
                                           
                                            document.getElementById("birth").disabled=true;
                                            document.getElementById("naturalization").disabled=true;
                                            //document.getElementById("dualcountry").disabled=true;
                                        }


                                    var dualchoiceDB = data.data_profile.dualcitizen;

                                    if (dualchoiceDB == 'dual'){
                                        $('#birth').attr('checked','checked');
                                    } else if (dualchoiceDB == 'filipino'){
                                        $('#naturalization').attr('checked','checked');
                                    }

                                    $('#residentialaddress').val(data.data_profile.residentialaddress);
                                    $('#permanentaddress').val(data.data_profile.permanentaddress);
                                    $('#telephoneno').val(data.data_profile.telephoneno);
                                    $('#mobileno').val(data.data_profile.mobileno);
                                    $('#emailprofile').val(data.data_profile.email);


                                    $('#familyid').val(data.data_family.id);
                                    $('#spouselastname').val(data.data_family.spouselastname);
                                    $('#spousemiddlename').val(data.data_family.spousemiddlename);
                                    $('#spousefirstname').val(data.data_family.spousefirstname);
                                    $('#spouseextension').val(data.data_family.spouseextension);
                                    $('#occupation').val(data.data_family.occupation);
                                    $('#employername').val(data.data_family.employername);
                                    $('#businessaddress').val(data.data_family.businessaddress);
                                    $('#spousetelno').val(data.data_family.spousetelno);
                                    $('#fathersurname').val(data.data_family.fathersurname);
                                    $('#fatherfirstname').val(data.data_family.fatherfirstname);
                                    $('#fathermiddlename').val(data.data_family.fathermiddlename);
                                    $('#fatherext').val(data.data_family.fatherext);
                                    $('#mothermaidenname').val(data.data_family.mothermaidenname);
                                    $('#mothersurname').val(data.data_family.mothersurname);
                                    $('#motherfirstname').val(data.data_family.motherfirstname);
                                    $('#mothermiddlename').val(data.data_family.mothermiddlename);
                                }
                            });

                            fetch_children_data();
                            fetch_educ_data();
                            fetch_civil_data();
                            fetch_work_data();
                            fetch_volwork_data();
                            fetch_landd_data();
                            fetch_other_skill_data();
                            fetch_other_recognition_data();
                            fetch_other_membership_data();


                            $('input[type=radio][name="citizenship"]').change(function() {
                                //alert($(this).val()); // or this.value
                                if ($(this).val() == 'dual'){
                                        document.getElementById("birth").disabled=false;
                                        document.getElementById("naturalization").disabled=false;
                                        document.getElementById("dualcountry").disabled=false;
                                } else {
                                        document.getElementById("birth").disabled=true;
                                        document.getElementById("naturalization").disabled=true;
                                        document.getElementById("dualcountry").disabled=true;
                                }
                               
                            });

                            $("input[type=checkbox][name='addressCheck']").change(function() {
                                
                                var text1 = document.getElementById("residentialaddress").value;
                                var text2 = document.getElementById("permanentaddress").value;
                                if(this.checked) {
                                    document.getElementById("permanentaddress").value = text1;
                                } 
                            });
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


                $(document).on('click', '#add_educ', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                    
                        //validateData();
                        //var answer = validateData();
                            var level = $('#level').val();
                            var school_name = $('#school_name').val(); 
                            var educ = $('#educ').val();
                            var attended_from = $('#attended_from').val();       
                            var attended_to = $('#attended_to').val();
                            var highest_level = $('#highest_level').val();       
                            var year_grad = $('#year_grad').val();
                            var honor_received = $('#honor_received').val();                    
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    level:level, 
                                    school_name:school_name, 
                                    educ:educ,
                                    attended_from:attended_from,
                                    attended_to:attended_to,
                                    highest_level:highest_level,
                                    year_grad:year_grad,
                                    honor_received:honor_received,
                                    action:'add_educ'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#educ_data').DataTable().ajax.reload();
                                $('#modalEducationForm').modal('hide');
                               
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



                $(document).on('click', '#submit_educ', function(){
                    var educid = $('#educid').val();
                    var level = $('#level_update').val();
                    var school_name = $('#school_name_update').val(); 
                    var educ = $('#educ_update').val();
                    var attended_from = $('#attended_from_update').val();       
                    var attended_to = $('#attended_to_update').val();
                    var highest_level = $('#highest_level_update').val();       
                    var year_grad = $('#year_grad_update').val();
                    var honor_received = $('#honor_received_update').val();
                    var employeeiddb = document.getElementById("empID").value;

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            educid:educid,
                            employeeiddb:employeeiddb,
                            level:level, 
                            school_name:school_name, 
                            educ:educ,
                            attended_from:attended_from,
                            attended_to:attended_to,
                            highest_level:highest_level,
                            year_grad:year_grad,
                            honor_received:honor_received,
                            action:'submit_educ'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#educ_data').DataTable().ajax.reload();
                        $('#modalEditEducationForm').modal('hide');
                        
                        }     
                    }); 
            
                });

            });

            function refreshPage() {
                    location.reload(true);
                }


            $(document).on('click', '#update_employee', function(){
                    var employeeiddb = document.getElementById("empID").value;

                    var empid                   = $('#employeeid').val();
                    var firstname               = $('#firstname').val();
                    var middlename              = $('#middlename').val();
                    var lastname                = $('#lastname').val();
                    var extension               = $('#extension').val();
                    var position                = $('#position').val();
                    var datehired               = $('#datehired').val();
                    var username                = $('#username').val();
                    var password                = $('#password').val();
                    var gender                  = $('#gender').val();
                    var civilstatus             = $('#civilstatus').val();

                    var profileid               = $('#profileid').val();
                    var dob                     = $('#dob').val();
                    var placeofbirth            = $('#placeofbirth').val();
                    var height                  = $('#height').val();
                    var weight                  = $('#weight').val();
                    var gsisno                  = $('#gsisno').val();
                    var pagibigno               = $('#pagibigno').val();
                    var phicno                  = $('#phicno').val();
                    var sssno                   = $('#sssno').val();
                    var tinno                   = $('#tinno').val();
                    var agencyemployeeno        = $('#agencyemployeeno').val();
                    var dual                    = $('#dual').val();
                    var filipino                = $('#filipino').val();
                    var birth                   = $('#birth').val();
                    var naturalization          = $('#naturalization').val();
                    var residentialaddress      = $('#residentialaddress').val();
                    var permanentaddress        = $('#permanentaddress').val();
                    var telephoneno             = $('#telephoneno').val();
                    var mobileno                = $('#mobileno').val();
                    var emailprofile            = $('#emailprofile').val();

                    var familyid                = $('#familyid').val();
                    var spouselastname          = $('#spouselastname').val();
                    var spousemiddlename        = $('#spousemiddlename').val();
                    var spousefirstname         = $('#spousefirstname').val();
                    var spouseextension         = $('#spouseextension').val();
                    var occupation              = $('#occupation').val();
                    var employername            = $('#employername').val(); 
                    var businessaddress         = $('#businessaddress').val();
                    var spousetelno             = $('#spousetelno').val();
                    var fathersurname           = $('#fathersurname').val();
                    var fatherfirstname         = $('#fatherfirstname').val();
                    var fathermiddlename        = $('#fathermiddlename').val();
                    var fatherext               = $('#fatherext').val();
                    var mothermaidenname        = $('#mothermaidenname').val();
                    var mothersurname           = $('#mothersurname').val();
                    var motherfirstname         = $('#motherfirstname').val(); 
                    var mothermiddlename        = $('#mothermiddlename').val();

                 //if(answer == 'N'){ //COMMENTED, USED FOR VALIDATION
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            employeeiddb:employeeiddb,
                            empid:empid,        
                            firstname:firstname,       
                            middlename:middlename,      
                            lastname:lastname,       
                            extension:extension,       
                            position:position,        
                            datehired:datehired,       
                            username:username,       
                            password:password,        
                            gender:gender,          
                            civilstatus:civilstatus,     
                            profileid:profileid,       
                            dob:dob,             
                            placeofbirth:placeofbirth,    
                            height:height,          
                            weight:weight,          
                            gsisno:gsisno,          
                            pagibigno:pagibigno,       
                            phicno:phicno,          
                            sssno:sssno,          
                            tinno:tinno,           
                            agencyemployeeno:agencyemployeeno,
                            dual:dual,            
                            filipino:filipino,        
                            birth:birth,           
                            naturalization:naturalization,  
                            residentialaddress:residentialaddress,
                            permanentaddress:permanentaddress,
                            telephoneno:telephoneno,     
                            mobileno:mobileno,       
                            emailprofile:emailprofile,    
                            familyid:familyid,        
                            spouselastname:spouselastname,  
                            spousemiddlename:spousemiddlename,
                            spousefirstname:spousefirstname, 
                            spouseextension:spouseextension,
                            occupation:occupation,      
                            employername:employername,    
                            businessaddress:businessaddress, 
                            spousetelno:spousetelno,     
                            fathersurname:fathersurname,   
                            fatherfirstname:fatherfirstname, 
                            fathermiddlename:fathermiddlename,
                            fatherext:fatherext,       
                            mothermaidenname:mothermaidenname,
                            mothersurname:mothersurname,   
                            motherfirstname:motherfirstname, 
                            mothermiddlename:mothermiddlename,
                            action:'update_employee'

                        },
                        success:function(data){
                        // $('#add_employee').modal('hide');
                        
                        //COMMENTED FOR THE MEAN TIME
                        // $('#user_data').DataTable().destroy();
                        //fetch_data();
                        alert("Data Updated");

                        //$('#addEmployeeForm').modal('hide');
                        }     
                    }); 
                    //}
            });


            $(document).on('click', '#cancel_employee', function(){
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


            $(document).on('click', '.delete_educ', function(){
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
                            action:'delete_education'

                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#educ_data').DataTable().ajax.reload();
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



            $(document).on('click', '.update_educ', function(){
                    var id = $(this).data('id');
                    //alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    var add_employee = "Success";
                    
                
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                            action:'fetch_single_educ'

                        },
                        success:function(data){
                            var values = $.parseJSON(data);
                            //$('#modal_title').text('Update Educational Background Data');
                            //$('#add_education').text('Update Educational Background Children Data');
                            $('#educid').val(values.educid);

                            //var civilStatusValue =  'NA';
                            var levelValue =  values.level;                              
                            $("#level_update").val(levelValue).change();
                            
                           // $('#level_update').val(values.level);
                            $('#school_name_update').val(values.school_name);
                            $('#educ_update').val(values.educ);
                            $('#attended_from_update').val(values.attended_from);
                            $('#attended_to_update').val(values.attended_to);
                            $('#highest_level_update').val(values.highest_level);
                            $('#year_grad_update').val(values.year_grad);
                            $('#honor_received_update').val(values.honor_received);

                            $('#modalEditEducationForm').modal('show');
                            
                        }     
                    });


            });

            //ELIGIBITILY UPDATE FRORM
            $(document).on('click', '.update_eligibility', function(){
                var id = $(this).data('id');
                var action_val =  document.getElementById('eligibility_action_id').value = 'UPDATE';
                var employeeiddb = document.getElementById("empID").value;
                //alert('ss');
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                        action:'fetch_single_eligibility'

                    },
                    success:function(data){
                        var values = $.parseJSON(data);
                        //$('#modal_title').text('Update Educational Background Data');
                        //$('#add_education').text('Update Educational Background Children Data');
                        

                        $('#eligibilityid').val(values.eligibilityid);
                        $('#eligibility_update').val(values.eligibility);
                        $('#rating_update').val(values.rating);
                        $('#date_of_exam_update').val(values.date_of_exam);
                        $('#place_of_exam_update').val(values.place_of_exam);
                        $('#license_no_update').val(values.license_no);
                        $('#license_date_update').val(values.license_date);


                        $('#modalUpdateEligibilityForm').modal('show');
                    
                    }     
                }); 

            });

            $(document).on('click', '#add_eligibility', function(){
                    var employeeiddb = document.getElementById("empID").value;

                        //validateData();
                        //var answer = validateData();
                            var eligibility = $('#eligibility').val();
                            var rating = $('#rating').val(); 
                            var date_of_exam = $('#date_of_exam').val();
                            var place_of_exam = $('#place_of_exam').val();       
                            var license_no = $('#license_no').val();
                            var license_date = $('#license_date').val();                        
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    eligibility:eligibility, 
                                    rating:rating, 
                                    date_of_exam:date_of_exam,
                                    place_of_exam:place_of_exam,
                                    license_no:license_no,
                                    license_date:license_date,
                                    action:'add_eligibility'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#civil_data').DataTable().ajax.reload();
                                $('#modalEligibilityForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#submit_eligibility', function(){
                    var eligibilityid = $('#eligibilityid').val();
                    var eligibility = $('#eligibility_update').val();
                    var rating = $('#rating_update').val(); 
                    var date_of_exam = $('#date_of_exam_update').val();
                    var place_of_exam = $('#place_of_exam_update').val();       
                    var license_no = $('#license_no_update').val();
                    var license_date = $('#license_date_update').val();   

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            eligibilityid:eligibilityid,
                            employeeiddb:employeeiddb,
                            eligibility:eligibility, 
                            rating:rating, 
                            date_of_exam:date_of_exam,
                            place_of_exam:place_of_exam,
                            license_no:license_no,
                            license_date:license_date,
                            action:'submit_eligibility'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#civil_data').DataTable().ajax.reload();
                        //$('#modalEducationForm').modal('hide');
                        
                        }     
                    }); 
            
                });


            // UPDATE WORK FRORM
            $(document).on('click', '.update_work', function(){
                var id = $(this).data('id');
                //var action_val =  document.getElementById('eligibility_action_id').value = 'UPDATE';
                var employeeiddb = document.getElementById("empID").value;
                
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                        action:'fetch_single_work'

                    },
                    success:function(data){
                        var values = $.parseJSON(data);
                        $('#workid').val(values.workid);
                        $('#work_date_from_update').val(values.work_date_from);
                        $('#work_date_to_update').val(values.work_date_to);
                        $('#work_position_update').val(values.work_position);
                        $('#work_company_update').val(values.work_company);
                        $('#work_salary_update').val(values.work_salary);
                        $('#work_salary_grade_update').val(values.work_salary_grade);
                        $('#work_status_update').val(values.work_status);
                        var govtServiceValue =  values.work_govt_service;                              
                        $("#work_govt_service_update").val(govtServiceValue).change();
                        //$('#work_govt_service_update').val(values.license_date);


                        $('#modalUpdateWorkForm').modal('show');
                    
                    }     
                }); 

            });
            //ADD WORK EXPERIENCE
            $(document).on('click', '#add_work', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var work_date_from = $('#work_date_from').val();
                    var work_date_to = $('#work_date_to').val();
                    var work_position = $('#work_position').val(); 
                    var work_company = $('#work_company').val();
                    var work_salary = $('#work_salary').val();       
                    var work_salary_grade = $('#work_salary_grade').val();
                    var work_status = $('#work_status').val();  
                    var work_govt_service = $('#work_govt_service').val();                     
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    work_date_from:work_date_from, 
                                    work_date_to:work_date_to, 
                                    work_position:work_position,
                                    work_company:work_company,
                                    work_salary:work_salary,
                                    work_salary_grade:work_salary_grade,
                                    work_status:work_status,
                                    work_govt_service:work_govt_service,
                                    action:'add_work'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#work_data').DataTable().ajax.reload();
                                $('#modalWorkForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#submit_work', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var workid = $('#workid').val();
                    var work_date_from = $('#work_date_from_update').val();
                    var work_date_to = $('#work_date_to_update').val();
                    var work_position = $('#work_position_update').val(); 
                    var work_company = $('#work_company_update').val();
                    var work_salary = $('#work_salary_update').val();       
                    var work_salary_grade = $('#work_salary_grade_update').val();
                    var work_status = $('#work_status_update').val();  
                    var work_govt_service = $('#work_govt_service_update').val();   

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            workid:workid,
                            employeeiddb:employeeiddb,
                            work_date_from:work_date_from, 
                            work_date_to:work_date_to, 
                            work_position:work_position,
                            work_company:work_company,
                            work_salary:work_salary,
                            work_salary_grade:work_salary_grade,
                            work_status:work_status,
                            work_govt_service:work_govt_service,
                            action:'submit_work'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#work_data').DataTable().ajax.reload();
                        $('#modalEditWorkForm').modal('hide');
                        
                        }     
                    }); 
            
                });



            // UPDATE VOLUNTARY WORK FRORM
            $(document).on('click', '.update_volwork', function(){
                var id = $(this).data('id');
                var employeeiddb = document.getElementById("empID").value;
                
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                        action:'fetch_single_volwork'

                    },
                    success:function(data){
                        var values = $.parseJSON(data);
                        $('#volworkid').val(values.volworkid);
                        $('#volwork_organization_update').val(values.volwork_organization);
                        $('#volwork_date_from_update').val(values.volwork_date_from);
                        $('#volwork_date_to_update').val(values.volwork_date_to);
                        $('#volwork_nohours_update').val(values.volwork_nohours);
                        $('#volwork_position_update').val(values.volwork_position);
                        $('#modalUpdateVolWorkForm').modal('show');
                    
                    }     
                }); 

            });

            //ADD WORK EXPERIENCE
            $(document).on('click', '#add_volwork', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var volwork_organization = $('#volwork_organization').val();
                    var volwork_date_from = $('#volwork_date_from').val();
                    var volwork_date_to = $('#volwork_date_to').val();
                    var volwork_nohours = $('#volwork_nohours').val();
                    var volwork_position = $('#volwork_position').val();                        
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    volwork_organization:volwork_organization, 
                                    volwork_date_from:volwork_date_from, 
                                    volwork_date_to:volwork_date_to,
                                    volwork_nohours:volwork_nohours,
                                    volwork_position:volwork_position,
                                    action:'add_volwork'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#volwork_data').DataTable().ajax.reload();
                                $('#modalVolWorkForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#submit_volwork', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var workid = $('#volworkid').val();
                    var volwork_organization = $('#volwork_organization_update').val();
                    var volwork_date_from = $('#volwork_date_from_update').val();
                    var volwork_date_to = $('#volwork_date_to_update').val();
                    var volwork_nohours = $('#volwork_nohours_update').val();
                    var volwork_position = $('#volwork_position_update').val(); 

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            volworkid:volworkid,
                            employeeiddb:employeeiddb,
                            volwork_organization:volwork_organization, 
                            volwork_date_from:volwork_date_from, 
                            volwork_date_to:volwork_date_to,
                            volwork_nohours:volwork_nohours,
                            volwork_position:volwork_position,
                            action:'submit_volwork'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#volwork_data').DataTable().ajax.reload();
                        $('#modalUpdateWorkForm').modal('hide');
                        
                        }     
                    }); 
            
                });

                $(document).on('click', '.delete_volwork', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_volwork'
                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#volwork_data').DataTable().ajax.reload();
                        }     
                    }); 

            });


            // UPDATE L&D
            $(document).on('click', '.update_landd', function(){
                var id = $(this).data('id');
                var employeeiddb = document.getElementById("empID").value;
                
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                        action:'fetch_single_landd'

                    },
                    success:function(data){
                        var values = $.parseJSON(data);
                        $('#landdid').val(values.landdid);
                        $('#landd_program_update').val(values.landd_program);
                        $('#landd_date_from_update').val(values.landd_date_from);
                        $('#landd_date_to_update').val(values.landd_date_to);
                        $('#landd_nohours_update').val(values.landd_nohours);
                        $('#landd_type_update').val(values.landd_type);
                        //$('#landd_sponsoredby_update').val(values.landd_sponsoredby);

                        var sponsoredbyValue =  values.landd_sponsoredby;                              
                        $("#landd_sponsoredby_update").val(sponsoredbyValue).change();
                        $('#modalUpdateLanddForm').modal('show');
                    
                    }     
                }); 
            });

            //ADD L&D
            $(document).on('click', '#add_landd', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var landd_program = $('#landd_program').val();
                    var landd_date_from = $('#landd_date_from').val();
                    var landd_date_to = $('#landd_date_to').val();
                    var landd_nohours = $('#landd_nohours').val();
                    var landd_type = $('#landd_type').val();
                    var landd_sponsoredby = $('#landd_sponsoredby').val();                        
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    landd_program:landd_program, 
                                    landd_date_from:landd_date_from, 
                                    landd_date_to:landd_date_to,
                                    landd_nohours:landd_nohours,
                                    landd_type:landd_type,
                                    landd_sponsoredby:landd_sponsoredby,
                                    action:'add_landd'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#landd_data').DataTable().ajax.reload();
                                $('#modalLanddForm').modal('hide');
                               
                                }     
                            }); 
                });


                $(document).on('click', '#submit_landd', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var landdid = $('#landdid').val();
                    var landdid_program = $('#landdid_program_update').val();
                    var landdid_date_from = $('#landdid_date_from_update').val();
                    var landdid_date_to = $('#landdid_date_to_update').val();
                    var landdid_nohours = $('#landdid_nohours_update').val();
                    var landd_type = $('#landd_type_update').val(); 
                    var landd_sponsoredby = $('#landd_sponsoredby_update').val(); 

                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            landdid:landdid,
                            employeeiddb:employeeiddb,
                            landdid_program:landdid_program, 
                            landdid_date_from:landdid_date_from, 
                            landdid_date_to:landdid_date_to,
                            landdid_nohours:landdid_nohours,
                            landd_type:landd_type,
                            landd_sponsoredby:landd_sponsoredby,
                            action:'submit_landdid'
                        },
                        success:function(data){
                        alert("Data Updated");

                        $('#landd_data').DataTable().ajax.reload();
                        $('#modalUpdateLanddForm').modal('hide');
                        
                        }     
                    }); 
            
                });

                //DELETE L&D
                $(document).on('click', '.delete_landd', function(){
                     var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_landd'
                        },
                        success:function(data){
                       
                        alert("Data Deleted");
                        $('#landd_data').DataTable().ajax.reload();
                        }     
                    }); 
                });


                //ADD OTHER SKILL
                $(document).on('click', '#add_other_skill', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var other_skill = $('#other_skill').val();
                  
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    other_skill:other_skill, 
                                    action:'add_other_skill'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#other_skill_data').DataTable().ajax.reload();
                                $('#otherSkillForm').modal('hide');
                            
                                }     
                            }); 
                });

                //DELETE OTHER SKILL
                $(document).on('click', '.delete_other_skill', function(){
                    var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_other_skill'
                        },
                        success:function(data){
                    
                        alert("Data Deleted");
                        $('#other_skill_data').DataTable().ajax.reload();
                        }     
                    }); 
                });

                //ADD OTHER RECOGNITION
                $(document).on('click', '#add_other_recognition', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var other_recognition = $('#other_recognition').val();
                  
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    other_recognition:other_recognition, 
                                    action:'add_other_recognition'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#other_recognition_data').DataTable().ajax.reload();
                                $('#otherRecognitionForm').modal('hide');
                            
                                }     
                            }); 
                });

                //DELETE OTHER RECOGNITION
                $(document).on('click', '.delete_other_recognition', function(){
                    var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_other_recognition'
                        },
                        success:function(data){
                    
                        alert("Data Deleted");
                        $('#otherRecognitionForm').DataTable().ajax.reload();
                        }     
                    }); 
                });

                //ADD OTHER RECOGNITION
                $(document).on('click', '#add_other_membership', function(){
                    var employeeiddb = document.getElementById("empID").value;
                    var other_membership = $('#other_membership').val();
                  
                            $.ajax({
                                url:"view_employee_action",
                                method:"POST",
                                data:{
                                    employeeiddb:employeeiddb,
                                    other_membership:other_membership, 
                                    action:'add_other_membership'
                                },
                                success:function(data){
                                alert("Data Added");

                                $('#other_membership_data').DataTable().ajax.reload();
                                $('#otherMembershipForm').modal('hide');
                            
                                }     
                            }); 
                });

                //DELETE OTHER RECOGNITION
                $(document).on('click', '.delete_other_membership', function(){
                    var id = $(this).data('id');
                    // alert(id);
                    var employeeiddb = document.getElementById("empID").value;
                    $.ajax({
                        url:"view_employee_action",
                        method:"POST",
                        data:{
                            id:id, 
                            employeeiddb:employeeiddb,
                            action:'delete_other_membership'
                        },
                        success:function(data){
                    
                        alert("Data Deleted");
                        $('#otherMembershipForm').DataTable().ajax.reload();
                        }     
                    }); 
                });

   