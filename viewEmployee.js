
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

               // "responsive": true,
                "columnDefs": [{ "orderable": false, "targets":[1,2] }],
                
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

            function fetch_attachment_data(){
                
                var employeeiddb = document.getElementById("empID").value;
                

                var dataTable = $('#attachment_data').DataTable({
                "columnDefs": [{ "orderable": false, "targets":[1] }],
                "ajax" : {
                url:"view_employee_action.php",
                type:"POST",
                data:{
                                employeeiddb:employeeiddb, 
                                action:'fetch_attachment'},
                }
                });

            }

            function fetch_signature_data(){
                    //alert('sdasdoigieij');
                var employeeiddb = document.getElementById("empID").value;
           

                var dataTable = $('#signature_data').DataTable({
                "columnDefs": [{ "orderable": false, "targets":[1] }],
                "ajax" : {
                url:"view_employee_action.php",
                type:"POST",
                data:{
                                employeeiddb:employeeiddb, 
                                action:'fetch_signature'},
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

                                var officeValue =  data.data.fieldofficeid;
                                $("#office").val(officeValue).change();
                               
                                var divisionValue =  data.data.divisionid;
                                $("#division").val(divisionValue).change();

                               // alert($("#division").val());

                                $('#vlcredit').val(data.data.vlcredit);
                                $('#slcredit').val(data.data.slcredit);
    

                                var genderValue =  data.data_profile.gender;

                                if (genderValue == 'MALE'){
                                    $("#gender").val("MALE").change();
                                } else if (genderValue == "") {
                                    $("#gender").val("NA").change();
                                }
                                //var civilStatusValue =  'NA';
                                var civilStatusValue =  data.data_profile.civilstatus;
                                
                                $("#civilstatus").val(civilStatusValue).change();
      
                                $('#profileid').val(data.data_profile.id);
                                $('#dob').val(data.data_profile.dob);
                                $('#placeofbirth').val(data.data_profile.placeofbirth);
                                $('#height').val(data.data_profile.height);
                                $('#weight').val(data.data_profile.weight);
                                $('#bloodtype').val(data.data_profile.bloodtype);
                                $('#gsisno').val(data.data_profile.gsisno);
                                $('#pagibigno').val(data.data_profile.pagibigno);
                                $('#phicno').val(data.data_profile.phicno);
                                $('#sssno').val(data.data_profile.sssno);
                                $('#tinno').val(data.data_profile.tinno);
                                $('#agencyemployeeno').val(data.data_profile.agencyemployeeno);
                               
                                var citizenValueDB = data.data_profile.citizenship;
                                $("#citizenship").val(citizenValueDB).change();

                                var dualchoiceDB = data.data_profile.dualcitizen;
                                $("#dualchoice").val(dualchoiceDB).change();

                                $('#res_blockno').val(data.data_profile.res_blockno);
                                $('#res_street').val(data.data_profile.res_street);
                                $('#res_subdivision').val(data.data_profile.res_subdivision);
                                $('#res_barangay').val(data.data_profile.res_barangay);
                                $('#res_city').val(data.data_profile.res_city);
                                $('#res_province').val(data.data_profile.res_province);
                                $('#res_zipcode').val(data.data_profile.res_zipcode);
                                $('#perm_blockno').val(data.data_profile.perm_blockno);
                                $('#perm_street').val(data.data_profile.perm_street);
                                $('#perm_subdivision').val(data.data_profile.perm_subdivision);
                                $('#perm_barangay').val(data.data_profile.perm_barangay);
                                $('#perm_city').val(data.data_profile.perm_city);
                                $('#perm_province').val(data.data_profile.perm_province);
                                $('#perm_zipcode').val(data.data_profile.perm_zipcode);
                                
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
                        fetch_attachment_data();
                        fetch_signature_data();
                        //alert('asdasd');
            }  


            $(document).on('click', '#add_children', function(){
                var employeeiddb = document.getElementById("empID").value;
                var add_employee = "Success";
                        var fullname = $('#fullname').val();
                        var dob = $('#dob_add').val();              
                        $.ajax({
                            url:"view_employee_action",
                            method:"POST",
                            dataType:'JSON',
                            data:{
                                fullname:fullname, 
                                dob:dob, 
                                employeeiddb:employeeiddb,
                                action:'add_children'
                            },
                            success:function(data){

                            $('#children_data').DataTable().ajax.reload();
                            $('#modalChildrenForm').modal('hide');
                            $('#fullname').val('');
                            $('#dob_add').val('');
                            $('#message2').html(data.status);
                            setTimeout(function(){
                                $('#message2').html('');
                            }, 90000);

                           
                            }     
                        }); 
            });


            $(document).on('click', '#add_educ', function(){
                var employeeiddb = document.getElementById("empID").value;
                var add_employee = "Success";
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
                            dataType:'JSON',
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
                                //alert("Data Added");
                                $('#educ_data').DataTable().ajax.reload();
                                $('#modalEducationForm').modal('hide');
                                $('#school_name').val('');
                                $('#educ').val('');
                                $('#school_name').val('');
                                $('#attended_from').val('');
                                $('#attended_to').val('');
                                $('#highest_level').val('');
                                $('#year_grad').val('');
                                $('#honor_received').val('');
                                $("#level")[0].selectedIndex = 0;
                                $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
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
                            dataType:'JSON',
                            data:{
                                fullname:fullname, 
                                dob:dob, 
                                employeeiddb:employeeiddb,
                                id:hidden_id,
                                action:'submit_update_children'
                            },
                            success:function(data){
                            //alert("Data Updated");

                            $('#children_data').DataTable().ajax.reload();
                            $('#modalEditChildrenForm').modal('hide');
                            $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
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
                    dataType:'JSON',
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
                    //alert("Data Updated");

                    $('#educ_data').DataTable().ajax.reload();
                    $('#modalEditEducationForm').modal('hide');
                    $('#message2').html(data.status);
                        setTimeout(function(){
                            $('#message2').html('');
                        }, 90000);
                    }     
                }); 
        
            });

    

            $("#citizenship_update").change (function () { 

              var selectedVal = $(this).find(':selected').val();
                if (selectedVal == 'dual'){
                    $("#dualchoice_update").prop("disabled", false);
                   
                    
                } else {
                    $("#dualchoice_update").prop("disabled", true);
                    $("#dualchoice_update").val("NA");

                }
           
            });

        // UPDATE PERSONAL DETAILS FORM
        $(document).on('click', '.update_personal_details', function(){
            var employeeiddb = document.getElementById("empID").value;
            var id = document.getElementById("profileid").value;
            $.ajax({
                url:"view_employee_action",
                method:"POST",
                data:{
                    id:id, 
                    employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                    action:'fetch_single_personal_details'

                },
                success:function(data){
                    var values = $.parseJSON(data);

                    //alert(data.data.office);
                    $('#employeeidmain_update').val(values.data.employeeid);
                    $('#hiddenid_emp').val(values.data.id);
                    $('#firstname_update').val(values.data.firstname);
                    $('#middlename_update').val(values.data.middlename);
                    $('#lastname_update').val(values.data.lastname);
                    $('#extension_update').val(values.data.extension);
                    $('#position_update').val(values.data.position);
                    $('#datehired_update').val(values.data.datehired);
                    $('#username_update').val(values.data.username);
                    $('#password_update').val(values.data.password);
                    $('#confirmpassword_update').val(values.data.password);
                   
                    var officeValue =  values.data.fieldofficeid;
                    //alert(officeValue);
                    $("#office_update").val(officeValue).change();
                   
                    var divisionValue =  values.data.divisionid;
                    $("#division_update").val(divisionValue).change();
                   
                    $('#vlcredit_update').val(values.data.vlcredit);
                    $('#slcredit_update').val(values.data.slcredit);

                    var genderValue =  values.data_profile.gender;

                    if (genderValue == 'MALE'){
                        $("#gender_update").val("MALE").change();
                    } else if (genderValue == "") {
                        $("#gender_update").val('NA').change();
                    }
                    
                    var civilStatusValue =  values.data_profile.civilstatus;
                    
                    $("#civilstatus_update").val(civilStatusValue).change();

                    $('#dobprofile_update').val(values.data_profile.dob);
                    $('#placeofbirth_update').val(values.data_profile.placeofbirth);
                    $('#height_update').val(values.data_profile.height);
                    $('#weight_update').val(values.data_profile.weight);
                    $('#gsisno_update').val(values.data_profile.gsisno);
                    $('#pagibigno_update').val(values.data_profile.pagibigno);
                    $('#phicno_update').val(values.data_profile.phicno);
                    $('#sssno_update').val(values.data_profile.sssno);
                    $('#tinno_update').val(values.data_profile.tinno);
                    $('#agencyemployeeno_update').val(values.data_profile.agencyemployeeno);
                    
                    //alert(values.data_profile.dob);
                    var citizenValueDB = values.data_profile.citizenship;
                    
                    $("#citizenship_update").val(citizenValueDB).change();
                    if (citizenValueDB == 'dual'){
                        $("#dualchoice_update").prop("disabled", false);
                        var dualchoiceDB = values.data_profile.dualcitizen;
                        $("#dualchoice_update").val(dualchoiceDB).change();
                    } else {
                        $("#dualchoice_update").prop("disabled", true);
                    }
                
                    $('#res_blockno_update').val(values.data_profile.res_blockno);
                    $('#res_street_update').val(values.data_profile.res_street);
                    $('#res_subdivision_update').val(values.data_profile.res_subdivision);
                    $('#res_barangay_update').val(values.data_profile.res_barangay);
                    $('#res_city_update').val(values.data_profile.res_city);
                    $('#res_province_update').val(values.data_profile.res_province);
                    $('#res_zipcode_update').val(values.data_profile.res_zipcode);
                    $('#perm_blockno_update').val(values.data_profile.perm_blockno);
                    $('#perm_street_update').val(values.data_profile.perm_street);
                    $('#perm_subdivision_update').val(values.data_profile.perm_subdivision);
                    $('#perm_barangay_update').val(values.data_profile.perm_barangay);
                    $('#perm_city_update').val(values.data_profile.perm_city);
                    $('#perm_province_update').val(values.data_profile.perm_province);
                    $('#perm_zipcode_update').val(values.data_profile.perm_zipcode);

                    
                    $('#telephoneno_update').val(values.data_profile.telephoneno);
                    $('#mobileno_update').val(values.data_profile.mobileno);
                    $('#emailprofile_update').val(values.data_profile.email);

                   
                    $('#modal_title').text('Edit Profile Data');
                    $('#profile_action').val('submit_profile');
                    $('#submit_button').val('Edit');

                    $('#modalEditPersonalDetailsForm').modal('show');
                        
                }     
            }); 

        });


        // UPDATE FAMILY BACKGROUND FORM
        $(document).on('click', '.update_family_background', function(){
            //var id = $(this).data('id');
            var employeeiddb = document.getElementById("empID").value;
            var id = document.getElementById("familyid").value;
            
            $.ajax({
                url:"view_employee_action",
                method:"POST",
                data:{
                    //id:id, 
                    employeeiddb:employeeiddb, //THIS IS AN ID FROM tbl_employee
                    action:'fetch_single_family_background'

                },
                success:function(output){
                    var values = $.parseJSON(output);
                    //$('#familyid').val(data.data_family.id);
                    $('#spouselastname_update').val(values.data_family.spouselastname);
                    $('#spousemiddlename_update').val(values.data_family.spousemiddlename);
                    $('#spousefirstname_update').val(values.data_family.spousefirstname);
                    $('#spouseextension_update').val(values.data_family.spouseextension);
                    $('#occupation_update').val(values.data_family.occupation);
                    $('#employername_update').val(values.data_family.employername);
                    $('#businessaddress_update').val(values.data_family.businessaddress);
                    $('#spousetelno_update').val(values.data_family.spousetelno);
                    $('#fathersurname_update').val(values.data_family.fathersurname);
                    $('#fatherfirstname_update').val(values.data_family.fatherfirstname);
                    $('#fathermiddlename_update').val(values.data_family.fathermiddlename);
                    $('#fatherext_update').val(values.data_family.fatherext);
                    $('#mothermaidenname_update').val(values.data_family.mothermaidenname);
                    $('#mothersurname_update').val(values.data_family.mothersurname);
                    $('#motherfirstname_update').val(values.data_family.motherfirstname);
                    $('#mothermiddlename_update').val(values.data_family.mothermiddlename);

                    $('#modalEditFamilyBackgroundForm').modal('show');
                
                }     
            }); 

        });


        $(document).on('click', '#submit_family_background', function(){
                var employeeiddb = document.getElementById("empID").value;

                var familyid                = $('#familyid').val();
                var spouselastname          = $('#spouselastname_update').val();
                var spousemiddlename        = $('#spousemiddlename_update').val();
                var spousefirstname         = $('#spousefirstname_update').val();
                var spouseextension         = $('#spouseextension_update').val();
                var occupation              = $('#occupation_update').val();
                var employername            = $('#employername_update').val(); 
                var businessaddress         = $('#businessaddress_update').val();
                var spousetelno             = $('#spousetelno_update').val();
                var fathersurname           = $('#fathersurname_update').val();
                var fatherfirstname         = $('#fatherfirstname_update').val();
                var fathermiddlename        = $('#fathermiddlename_update').val();
                var fatherext               = $('#fatherext_update').val();
                var mothermaidenname        = $('#mothermaidenname_update').val();
                var mothersurname           = $('#mothersurname_update').val();
                var motherfirstname         = $('#motherfirstname_update').val(); 
                var mothermiddlename        = $('#mothermiddlename_update').val();
                var usernameid              = $('#loginID').val();
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    dataType: 'json',
                    data:{
                        employeeiddb:employeeiddb,
                        usernameid:usernameid,
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
                        action:'submit_family_background'

                    },
                    success:function(data){
                        $('#modalEditFamilyBackgroundForm').modal('hide');
                        $('#confirmFamilyBackgroundModal').modal('hide');                    
                        fetch_single_input();
                    
                        $('#message').html(data.status);
                        //alert(data.status);
                        setTimeout(function(){
                            $('#message').html('');
                        }, 30000);
                    }     
                }); 
                
        });



        $(document).on('click', '#submit_personal_details', function(){
            var employeeiddb = document.getElementById("empID").value;

            var usernameid              = $('#loginID').val();
            var empid                   = $('#employeeidmain_update').val();
            var firstname               = $('#firstname_update').val();
            var middlename              = $('#middlename_update').val();
            var lastname                = $('#lastname_update').val();
            var extension               = $('#extension_update').val();
            var position                = $('#position_update').val();
            var divisionid                = $('#division_update').val();
            var fieldofficeid                  = $('#office_update').val();
            var datehired               = $('#datehired_update').val();
            var username                = $('#username_update').val();
            var password                = $('#password_update').val();
            var gender                  = $('#gender_update').val();
            var civilstatus             = $('#civilstatus_update').val();
            
            var profileid               = $('#profileid').val();
            var dob                     = $('#dobprofile_update').val();
            var placeofbirth            = $('#placeofbirth_update').val();
            var height                  = $('#height_update').val();
            var weight                  = $('#weight_update').val();
            var bloodtype               = $('#bloodtype_update').val();    
            var gsisno                  = $('#gsisno_update').val();
            var pagibigno               = $('#pagibigno_update').val();
            var phicno                  = $('#phicno_update').val();
            var sssno                   = $('#sssno_update').val();
            var tinno                   = $('#tinno_update').val();
            var agencyemployeeno        = $('#agencyemployeeno_update').val();
            var citizenship             = $('#citizenship_update').val();
            if ($('#dualchoice_update').prop("disabled") == false){
                var dualchoice                = $('#dualchoice_update').val();
            } else {
                var dualchoice                = "NA";
            }
            /*var residentialaddress      = $('#residentialaddress_update').val();
            var permanentaddress        = $('#permanentaddress_update').val();*/
            var res_blockno             = $('#res_blockno_update').val();
            var res_street              = $('#res_street_update').val();
            var res_subdivision         = $('#res_subdivision_update').val();
            var res_barangay            = $('#res_barangay_update').val();
            var res_city                = $('#res_city_update').val();
            var res_province            = $('#res_province_update').val();
            var res_zipcode             = $('#res_zipcode_update').val();
            var perm_blockno            = $('#perm_blockno_update').val();
            var perm_street             = $('#perm_street_update').val();
            var perm_subdivision        = $('#perm_subdivision_update').val();
            var perm_barangay           = $('#perm_barangay_update').val();
            var perm_city               = $('#perm_city_update').val();
            var perm_province           = $('#perm_province_update').val();
            var perm_zipcode            = $('#perm_zipcode_update').val();
            var telephoneno             = $('#telephoneno_update').val();
            var mobileno                = $('#mobileno_update').val();
            var emailprofile            = $('#emailprofile_update').val();

            $.ajax({
                url:"view_employee_action",
                method:"POST",
                dataType: 'json',
                data:{
                    usernameid:usernameid,
                    employeeiddb:employeeiddb,
                    empid:empid,        
                    firstname:firstname,       
                    middlename:middlename,      
                    lastname:lastname,       
                    extension:extension,       
                    position:position,
                    divisionid:divisionid,
                    fieldofficeid:fieldofficeid,
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
                    bloodtype:bloodtype,          
                    gsisno:gsisno,          
                    pagibigno:pagibigno,       
                    phicno:phicno,          
                    sssno:sssno,          
                    tinno:tinno,           
                    agencyemployeeno:agencyemployeeno,
                    citizenship:citizenship,
                    dualchoice:dualchoice,
                    res_blockno:res_blockno,     
                    res_street:res_street,      
                    res_subdivision:res_subdivision, 
                    res_barangay:res_barangay,    
                    res_city:res_city,        
                    res_province:res_province,    
                    res_zipcode:res_zipcode,     
                    perm_blockno:perm_blockno,    
                    perm_street:perm_street,     
                    perm_subdivision:perm_subdivision,
                    perm_barangay:perm_barangay,   
                    perm_city:perm_city,       
                    perm_province:perm_province,
                    perm_zipcode:perm_zipcode,   
                    telephoneno:telephoneno,     
                    mobileno:mobileno,       
                    emailprofile:emailprofile,    
                    //action:'update_employee'
                    action:'submit_personal_details'

                },
                success:function(data){                  
                    $('#modalEditPersonalDetailsForm').modal('hide');
                    $('#confirmPersonalDetailsModal').modal('hide');
                    fetch_single_input();
                   
                    
                    $('#message').html(data.status);
                    setTimeout(function(){
                        $('#message').html('');
                    
                    }, 30000);
                

                }     
            }); 
            
        });


        //function for reloading main data after update
        function fetch_single_input() {
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
                        $('#bloodtype').val(data.data_profile.bloodtype);
                        $('#gsisno').val(data.data_profile.gsisno);
                        $('#pagibigno').val(data.data_profile.pagibigno);
                        $('#phicno').val(data.data_profile.phicno);
                        $('#sssno').val(data.data_profile.sssno);
                        $('#tinno').val(data.data_profile.tinno);
                        $('#agencyemployeeno').val(data.data_profile.agencyemployeeno);
                       
                        //$('#citizenship').prop("dual", true)
                        var citizenValueDB = data.data_profile.citizenship;

                        $("#citizenship").val(citizenValueDB).change();
                    

                        var dualchoiceDB = data.data_profile.dualcitizen;

                        $("#dualchoice").val(dualchoiceDB).change();
                           

                        //$('#residentialaddress').val(data.data_profile.residentialaddress);
                        //$('#permanentaddress').val(data.data_profile.permanentaddress);
                        $('#res_blockno_update').val(data.data_profile.residentialaddress);
                        $('#res_street_update').val(data.data_profile.residentialaddress);
                        $('#res_subdivision_update').val(data.data_profile.residentialaddress);
                        $('#res_barangay_update').val(data.data_profile.residentialaddress);
                        $('#res_city_update').val(data.data_profile.residentialaddress);
                        $('#res_province_update').val(data.data_profile.residentialaddress);
                        $('#res_zipcode_update').val(data.data_profile.residentialaddress);
                        $('#perm_blockno_update').val(data.data_profile.residentialaddress);
                        $('#perm_street_update').val(data.data_profile.residentialaddress);
                        $('#perm_subdivision_update').val(data.data_profile.residentialaddress);
                        $('#perm_barangay_update').val(data.data_profile.residentialaddress);
                        $('#perm_city_update').val(data.data_profile.residentialaddress);
                        $('#perm_province_update').val(data.data_profile.residentialaddress);
                        $('#perm_zipcode_update').val(data.data_profile.residentialaddress);
                        
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

               
    }  



        $(document).on('click', '#cancel_employee', function(){
                window.location.href="employee_detail";
               
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
                            dataType: 'JSON',
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
                            //alert("Data Added");

                            $('#civil_data').DataTable().ajax.reload();
                                $('#modalEligibilityForm').modal('hide');
                                    $('#eligibilityid').val('');
                                    $('#eligibility').val('');
                                    $('#rating').val('');
                                    $('#date_of_exam').val('');
                                    $('#place_of_exam').val('');
                                    $('#license_no').val('');
                                    $('#license_date').val('');
                                $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);                           
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
                var employeeiddb = document.getElementById("empID").value;  

                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    dataType:'JSON',                  
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
                    //alert("Data Updated");

                    $('#civil_data').DataTable().ajax.reload();
                    $('#message2').html(data.status);
                    setTimeout(function(){
                        $('#message2').html('');
                    }, 90000);
                    
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
                            dataType:'JSON', 
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
                            //alert("Data Added");

                                $('#work_data').DataTable().ajax.reload();
                                $('#modalWorkForm').modal('hide');
                                $('#workid').val('');
                                $('#work_date_from').val('');
                                $('#work_date_to').val('');
                                $('#work_position').val('');
                                $('#work_company').val('');
                                $('#work_salary').val('');
                                $('#work_salary_grade').val('');
                                $('#work_status').val('');
                                $('#work_govt_service').val('');

                                $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
                            
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
                    dataType:'JSON', 
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
                    //alert("Data Updated");

                        $('#work_data').DataTable().ajax.reload();
                        $('#modalUpdateWorkForm').modal('hide');
                        $('#message2').html(data.status);
                        setTimeout(function(){
                            $('#message2').html('');
                        }, 90000);
                
                    
                    }     
                }); 
        
            });

            $(document).on('click', '.delete_work', function(){
                var id = $(this).data('id');
               // alert(id);
               var employeeiddb = document.getElementById("empID").value;
               $.ajax({
                   url:"view_employee_action",
                   method:"POST",
                   data:{
                       id:id, 
                       employeeiddb:employeeiddb,
                       action:'delete_work'
                   },
                   success:function(data){
                  
                   alert("Data Deleted");
                   $('#work_data').DataTable().ajax.reload();
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
 
                    $('#volWorkid').val(id);
                    //alert(data.volworkid);
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
                            dataType:'JSON', 
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
                            //alert("Data Added");

                                $('#volwork_data').DataTable().ajax.reload();
                                $('#modalVolWorkForm').modal('hide');
                                $('#message2').html(data.status);
                                $('#volwork_organization').val('');
                                $('#volwork_date_from').val('');
                                $('#volwork_date_to').val('');
                                $('#volwork_nohours').val('');
                                $('#volwork_position').val('');
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
                           
                            }     
                        }); 
            });


            $(document).on('click', '#submit_volwork', function(){
                var employeeiddb = document.getElementById("empID").value;
                //var volworkid = $('#volWorkid').val();
                var volworkid = document.getElementById("volWorkid").value;
                var volwork_organization = $('#volwork_organization_update').val();
                var volwork_date_from = $('#volwork_date_from_update').val();
                var volwork_date_to = $('#volwork_date_to_update').val();
                var volwork_nohours = $('#volwork_nohours_update').val();
                var volwork_position = $('#volwork_position_update').val(); 
                //alert(volworkid);
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    dataType:'JSON', 
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
                    //alert("Data Updated");

                    $('#volwork_data').DataTable().ajax.reload();
                    $('#modalUpdateVolWorkForm').modal('hide');
                    $('#message2').html(data.status);
                    setTimeout(function(){
                        $('#message2').html('');
                    }, 90000);
                    
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
            //alert(id);
            
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
                            dataType:'JSON', 
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
                            //alert("Data Added");

                            $('#landd_data').DataTable().ajax.reload();
                            $('#modalLanddForm').modal('hide');

                            $('#message2').html(data.status);
                                $('#landd_program').val('');
                                $('#landd_date_to').val('');
                                $('#landd_nohours').val('');
                                $('#landd_type').val('');
                                $('#landd_sponsoredby').val('');
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
                           
                            }     
                        }); 
            });


            $(document).on('click', '#submit_landd', function(){
                var employeeiddb = document.getElementById("empID").value;
                var landdid = $('#landdid').val();
                var landd_program = $('#landd_program_update').val();
                var landd_date_from = $('#landd_date_from_update').val();
                var landd_date_to = $('#landd_date_to_update').val();
                var landd_nohours = $('#landd_nohours_update').val();
                var landd_type = $('#landd_type_update').val(); 
                var landd_sponsoredby = $('#landd_sponsoredby_update').val(); 

                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    dataType:'JSON', 
                    data:{
                        landdid:landdid,
                        employeeiddb:employeeiddb,
                        landd_program:landd_program, 
                        landd_date_from:landd_date_from, 
                        landd_date_to:landd_date_to,
                        landd_nohours:landd_nohours,
                        landd_type:landd_type,
                        landd_sponsoredby:landd_sponsoredby,
                        action:'submit_landd'
                    },
                    success:function(data){
                    //alert("Data Updated");

                        $('#landd_data').DataTable().ajax.reload();
                        $('#modalUpdateLanddForm').modal('hide');
                        $('#message2').html(data.status);
                        setTimeout(function(){
                            $('#message2').html('');
                        }, 90000);
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
                            dataType:'JSON', 
                            data:{
                                employeeiddb:employeeiddb,
                                other_skill:other_skill, 
                                action:'add_other_skill'
                            },
                            success:function(data){
                                $('#other_skill_data').DataTable().ajax.reload();
                                $('#otherSkillForm').modal('hide');
                                $('#other_skill').val('');

                                $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
                        
                            }     
                        }); 
            });

            //DELETE OTHER SKILL
            $(document).on('click', '.delete_other_skill', function(){
                var id = $(this).data('id');
                 //alert(id);
                var employeeiddb = document.getElementById("empID").value;
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb,
                        action:'delete_other_skill'
                    },
                    success:function(){
                
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
                            dataType:'JSON', 
                            data:{
                                employeeiddb:employeeiddb,
                                other_recognition:other_recognition, 
                                action:'add_other_recognition'
                            },
                            success:function(data){
                            //alert("Data Added");

                            $('#other_recognition_data').DataTable().ajax.reload();
                            $('#otherRecognitionForm').modal('hide');
                            $('#other_recognition').val('');

                            $('#message2').html(data.status);
                            setTimeout(function(){
                                $('#message2').html('');
                            }, 90000);
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
                    success:function(){
                
                    alert("Data Deleted");
                    $('#other_recognition_data').DataTable().ajax.reload();
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
                            dataType:'JSON', 
                            data:{
                                employeeiddb:employeeiddb,
                                other_membership:other_membership, 
                                action:'add_other_membership'
                            },
                            success:function(){
                            //lert("Data Added");

                                $('#other_membership_data').DataTable().ajax.reload();
                                $('#otherMembershipForm').modal('hide');
                                $('#other_membership').val('');

                                $('#message2').html(data.status);
                                setTimeout(function(){
                                    $('#message2').html('');
                                }, 90000);
                        
                            }     
                        }); 
            });

            //DELETE OTHER MEMBERSHIP
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
                    success:function(){
                
                    alert("Data Deleted");
                    $('#other_membership_data').DataTable().ajax.reload();
                    }     
                }); 
            });



            //DELETE ATTACHMENT
            $(document).on('click', '.delete_attachment', function(){
                var id = $(this).data('id');
                // alert(id);
                var employeeiddb = document.getElementById("empID").value;
                $.ajax({
                    url:"view_employee_action",
                    method:"POST",
                    data:{
                        id:id, 
                        employeeiddb:employeeiddb,
                        action:'delete_attachment'
                    },
                    success:function(){
                
                    alert("Data Deleted");
                    $('#attachment_data').DataTable().ajax.reload();
                    }     
                }); 
            });



        });

                    //ADD ATTACHMENT
                    $(document).on('click', '#add_attachment', function(){
                        var employeeiddb = document.getElementById("empID").value;
                    
                        var filename = $('#filename').val();
                        var file = $('#file').val();  
                      
                                $.ajax({
                                    url:"view_employee_action",
                                    method:"POST",
                                    dataType:'JSON', 
                                    data:{
                                        employeeiddb:employeeiddb,
                                        filename:filename,
                                        file:file, 
                                        action:'add_attachment'
                                    },
                                    success:function(){
        
                                       /* $('#other_membership_data').DataTable().ajax.reload();
                                        $('#otherMembershipForm').modal('hide');
                                        $('#other_membership').val('');
        
                                        $('#message2').html(data.status);
                                        setTimeout(function(){
                                            $('#message2').html('');
                                        }, 90000);*/
                                
                                    }     
                                }); 
                    });


                    $('#addattachment_form').on('submit', function(){
                        event.preventDefault();
	
                            var extension = $('#user_image').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['pdf','png','jpg','jpeg']) == -1)
                                {
                                    alert("Invalid File");
                                    $('#user_image').val('');
                                    return false;
                                }
                            }
                            $.ajax({
                                url:"view_employee_action.php",
                                method:"POST",
                                data:new FormData(this),
                                contentType:false,
                                processData:false,
                                dataType:"JSON",
                                /*beforeSend:function()
                                {
                                    $('#submit_button').attr('disabled', 'disabled');
                                    $('#submit_button').html('wait...');
                                },*/
                                success:function(data)
                                {
                                        $('#attachment_data').DataTable().ajax.reload();
                                        $('#attachmentForm').modal('hide');
                                        $('#filename').val('');
        
                                        $('#message2').html(data.status);
                                        setTimeout(function(){
                                            $('#message2').html('');
                                        }, 90000);
                                }
                            })
                        
                    });

                    //add electronic signature
                    $('#addsignature_form').on('submit', function(){
                        event.preventDefault();
                        //alert('sdsd');
	
                            var extension = $('#user_image').val().split('.').pop().toLowerCase();
                            if(extension != '')
                            {
                                if(jQuery.inArray(extension, ['pdf','png','jpg','jpeg']) == -1)
                                {
                                    alert("Invalid File");
                                    $('#user_image').val('');
                                    return false;
                                }
                            }
                            $.ajax({
                                url:"view_employee_action.php",
                                method:"POST",
                                data:new FormData(this),
                                contentType:false,
                                processData:false,
                                dataType:"JSON",
                                /*beforeSend:function()
                                {
                                    $('#submit_button').attr('disabled', 'disabled');
                                    $('#submit_button').html('wait...');
                                },*/
                                success:function(data)
                                {
                                        $('#signature_data').DataTable().ajax.reload();
                                        $('#signatureForm').modal('hide');
                                        $('#filename').val('');
        
                                        $('#message2').html(data.status);
                                        setTimeout(function(){
                                            $('#message2').html('');
                                        }, 90000);
                                }
                            })
                        
                    });

        
        $('#generateReport').click(function(){

            //var to_date = '';
            //window.location.href="export?from_date="+from_date+"&to_date="+to_date+"";
            var employeeiddb = document.getElementById("empID").value;
            window.location.href="exportpds.php?id="+employeeiddb, true;
        
        }); 

        /*$('#attachmentForm').on('submit', function(event){
            event.preventDefault();
              $.ajax({
                  url:"view_employee_action",
                  method:"POST",
                  data:{
                  $(this).serialize(),
                  action:'add_other_membership'
                    },
                  success:function(data)
                  {
                    alert('data uploaded');
                    $('#attachment_data').DataTable().ajax.reload();
            
                  }
              });
          
        });*/

        //ADD OTHER RECOGNITION
        /*$(document).on('click', '#generateReport', function(){
            var employeeiddb = document.getElementById("empID").value;
            window.location.href="export.php", true;
        });*/