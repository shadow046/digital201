setInterval(dateTime,0)
function dateTime(){
  //Display current date and time
  const d = new Date().toDateString();
  const t = new Date().toLocaleTimeString();
  document.getElementById("date").innerHTML = d + ' ' + t;
}

//Go to top button
var btn = $('#button');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

// Pang Display ng Data Tables with filter
$(document).ready( function () { //The ready() method specifies what happens when a ready event occurs.
    $('#employeesTable').DataTable(
      {
        dom:'lfrtip',
        processing:true,
        serverSide:false,
        ajax: {
        url: '/employees/listOfEmployees',//route-name
      },
      columns: [
          {data: 'employee_number'},//data column name
          {data: 'first_name'},
          {data: 'last_name'},
          {data: 'middle_name'},
          {data: 'suffix'},
          {data: 'position'},
          {data: 'branch'},
          {data: 'action'}
        ]
      }
  );    
});
//Fill all required fields/ Check required fields
setInterval(checkRequired, 0);
function checkRequired(){
    if($('.required_field').filter(function(){ return !!this.value; }).length != 18){//To add required fields
        $('#requiredFields').show();
        $('#btnUpdate').prop('disabled',true);//To disable the id
        $('#btnSave').prop('disabled',true);
    }
    else{
        $('#requiredFields').hide();
        $('#btnUpdate').prop('disabled',false);
        $('#btnSave').prop('disabled',false);
    }
}
//Hide first form
$('#employee_personal_information').hide();

//Hide View Table
$('#masterListTableBtn').hide();

//Create New Button
$('#addEmployeeBtn').on('click',function(){
    $('#employee_personal_information').fadeIn();
    $('#employees_list').hide();
    $('#addEmployeeBtn').hide();
    $('#masterListTableBtn').show();
    $('#btnUpdate').hide();
});

//Show Master List Table
$('#masterListTableBtn').on('click',function(){
    window.location.reload(); 
});

//To add table row in college education table
$(document).ready(function(){
    var countCollegeRow = 1;
    college_field(countCollegeRow);
      function college_field(collegeNumber){
          html = '<tr>';
          html += '<td><input type="text" name="college_name[]" class="form-control" autocomplete="off"></td>'; 
          html += '<td><input type="text" name="college_degree[]" class="form-control" autocomplete="off"></td>'; 
          html += '<td><input type="text" name="college_inclusive_years[]" class="form-control" autocomplete="off"></td>'; 
          
          if(collegeNumber > 1){
              html += '<td><button type="button" name="removeCollegeRow" class="btn btn-danger removeCollegeRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
              $('tbody.college_education_body').append(html);
          }
      }
      $(document).on('click','#addCollegeRow', function(){//Add row onclick base on its id
          $('#college_education_table').fadeIn('slow');
          countCollegeRow++;
          college_field(countCollegeRow);
      });

      $(document).on('click','.removeCollegeRow', function(){//Remove row onclick
          countCollegeRow--;
          $(this).closest("tr").remove();

          if($('#college_education_table tbody tr').length == 0){
              $('#college_education_table').fadeOut('slow');
          }
      });
});

//Saving college form

  $('#educational_and_training_backgrounds_forms').on('submit', function(event){
      event.preventDefault();
      $.ajax({
          url: '/employees/insert', //Route Name (web.php)
          data: $(this).serialize(),
          success:function(data){
              if(data == 'true'){
                  Swal.fire("SAVE SUCCESS","","success");
                  setTimeout(function(){location.reload();}, 2000);
              }
              else{
                  Swal.fire("SAVE FAILED","","error");
              }
          }
      });
  });

//To add table row in vocational table
$(document).ready(function(){
    var countVocationalRow = 1;
    vocational_field(countVocationalRow);
      function vocational_field(vocationalNumber){
          html = '<tr>';
          html += '<td><input type="text" name="vocational_name[]" class="form-control" autocomplete="off"></td>'; 
          html += '<td><input type="text" name="vocational_course[]" class="form-control" autocomplete="off"></td>'; 
          html += '<td><input type="text" name="vocational_inclusive_years[]" class="form-control" autocomplete="off"></td>'; 
        
          if(vocationalNumber > 1){
            html += '<td><button type="button" name="removeVocationalRow" class="btn btn-danger removeVocationalRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
            $('tbody.vocational_body').append(html);//This element will add in tr
          }
      }
      $(document).on('click','#addVocationalRow', function(){
          $('#vocational_table').fadeIn('slow');
          countVocationalRow++;
          vocational_field(countVocationalRow);
      });
      $(document).on('click','.removeVocationalRow' ,function(){
          countVocationalRow--;
          $(this).closest("tr").remove();
          if($('#vocational_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
              $('#vocational_table').fadeOut('slow');
          }
      });
});

//To add table row in training table
$(document).ready(function(){
  var countTrainingRow = 1;
  training_field(countTrainingRow);
    function training_field(trainingNumber){
        html = '<tr>';
        html += '<td><input type="text" name="training_name[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="training_title[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="training_inclusive_years[]" class="form-control" autocomplete="off"></td>'; 
      
        if(trainingNumber > 1){
          html += '<td><button type="button" name="removeTrainingRow" class="btn btn-danger removeTrainingRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
          $('tbody.training_body').append(html);
        }
    }
    $(document).on('click','#addTrainingRow', function(){
        $('#trainings_table').fadeIn('slow');
        countTrainingRow++;
        training_field(countTrainingRow);
    });
    $(document).on('click','.removeTrainingRow' ,function(){
        countTrainingRow--;
        $(this).closest("tr").remove();
        if($('#trainings_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
            $('#trainings_table').fadeOut('slow');
        }
    });
});

//To add table row in job history table
$(document).ready(function(){
  var countJobRow = 1;
  job_field(countJobRow);
    function job_field(jobNumber){
        html = '<tr>';
        html += '<td><input type="text" name="job_inclusive_years[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="job_position[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="job_name[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="job_address[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="text" name="job_phone[]" class="form-control" autocomplete="off"></td>'; 
      
        if(jobNumber > 1){
          html += '<td><button type="button" name="removeJobRow" class="btn btn-danger removeJobRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
          $('tbody.job_body').append(html);
        }
    }
    $(document).on('click','#addJobRow', function(){
        $('#job_table').fadeIn('slow');
        countJobRow++;
        job_field(countJobRow);
    });
    $(document).on('click','.removeJobRow' ,function(){
        countJobRow--;
        $(this).closest("tr").remove();
        
        if($('#job_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
            $('#job_table').fadeOut('slow');
        }
    });
});

//To add table row in memos table

$(document).ready(function(){
  var memoRow = 1;
  memo_field(memoRow);
    function memo_field(memoNumber){
        html = '<tr>';
        html += '<td><input type="text" name="memo_subject[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><input type="date" name="memo_date[]" class="form-control" autocomplete="off"></td>'; 
        html += '<td><select class="form-select">'+ 
                '<option disabled selected> Select </option>'+
                '<option>Verbal</option>'+
                '<option>Written</option>'+
                '<option>2nd Offense</option>'+
                '<option>3rd Offense</option>'+
                '<option>Final</option>'+
                '</select></td>';
        html += '<td><input type="file" name="memo_file[]" class="form-control" autocomplete="off"></td>'; 
      
        if(memoNumber > 1){
          html += '<td><button type="button" name="removeMemoRow" class="btn btn-danger removeMemoRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
          $('tbody.memos_body').append(html);
        }
    }
    $(document).on('click','#addMemoRow', function(){
        $('#memos_table').fadeIn('slow');
        memoRow++;
        memo_field(memoRow);
    });
    $(document).on('click','.removeMemoRow' ,function(){
        memoRow--;
        $(this).closest("tr").remove();
        if($('#memos_table tbody tr').length == 0){//If the table row doesn't have row the table will hide
          $('#memos_table').fadeOut('slow');
        }
    });
});

//To add table row in evaluation table

$(document).ready(function(){
    var evaluationRow = 1;
    evaluation_field(evaluationRow);
      function evaluation_field(evaluationNumber){
          html = '<tr>';
          html += '<td><input type="text" name="evaluation_name[]" class="form-control" autocomplete="off"></td>';
          html += '<td><input type="date" name="evaluation_date[]" class="form-control" autocomplete="off"></td>';
          html += '<td><input type="text" name="evaluation_evaluated_by[]" class="form-control" autocomplete="off"></td>';
          html += '<td><input type="file" name="evaluation_file[]" class="form-control" autocomplete="off"></td>';
      
          if(evaluationNumber > 1){
            html += '<td><button type="button" name="removeEvaluationRow" class="btn btn-danger removeEvaluationRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
            $('tbody.evaluation_body').append(html);
          }
      }
      $(document).on('click','#addEvaluationRow', function(){
          $('#evaluation_table').fadeIn('slow');
          evaluationRow++;
          evaluation_field(evaluationRow);
      });
      $(document).on('click','.removeEvaluationRow', function(){
          evaluationRow--;
          $(this).closest("tr").remove();

          if($('#evaluation_table tbody tr').length == 0){
              $('#evaluation_table').fadeOut('slow');
          }
      });
});

//To add table row in evaluation table

$(document).ready(function(){
  var contractsRow = 1;
  contracts_field(contractsRow);
    function contracts_field(contractsNumber){
        html = '<tr>';
        html += '<td><input type="text" name="contracts_type[]" class="form-control" autocomplete="off"></td>';
        html += '<td><input type="date" name="contracts_date[]" class="form-control" autocomplete="off"></td>';
        html += '<td><input type="file" name="contracts_file[]" class="form-control" autocomplete="off"></td>';
    
        if(contractsNumber > 1){
          html += '<td><button type="button" name="removeContractsRow" class="btn btn-danger removeContractsRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
          $('tbody.contracts_body').append(html);
        }
    }
    $(document).on('click','#addContractsRow', function(){
        $('#contracts_table').fadeIn('slow');
        contractsRow++;
        contracts_field(contractsRow);
    });
    $(document).on('click','.removeContractsRow', function(){
        contractsRow--;
        $(this).closest("tr").remove();

        if($('#contracts_table tbody tr').length == 0){
            $('#contracts_table').fadeOut('slow');
        }
    });
});

//To add table row in resignation letter

$(document).ready(function(){
  var resignationRow = 1;
  resignation_field(resignationRow);
    function resignation_field(resignationNumber){
      html = '<tr>';
      html += '<td><input type="text" name="resignation_letter[]" class="form-control" autocomplete="off"></td>';
      html += '<td><input type="date" name="resignation_date[]" class="form-control" autocomplete="off"></td>';
      html += '<td><input type="file" name="resignation_file[]" class="form-control" autocomplete="off"></td>';
    
      if(resignationNumber > 1){
          html += '<td><button type="button" name="removeResignationRow" class="btn btn-danger removeResignationRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
            $('tbody.resignation_body').append(html);
      }
    }
      $(document).on('click','#addResignationRow', function(){
        $('#resignation_table').fadeIn('slow');
        resignationRow++;
        resignation_field(resignationRow);
      });
      $(document).on('click','.removeResignationRow', function(){
        resignationRow--;
        $(this).closest("tr").remove();

        if($('#resignation_table tbody tr').length == 0){
            $('#resignation_table').fadeOut('slow');
        }
      });
});

//To add table row in termination table

$(document).ready(function(){
    var terminationRow = 1;
    termination_field(terminationRow);
      function termination_field(terminationNumber){
        html = '<tr>';
        html += '<td><input type="text" name="termination_letter[]" class="form-control" autocomplete="off"></td>';
        html += '<td><input type="date" name="termination_date[]" class="form-control" autocomplete="off"></td>';
        html += '<td><input type="file" name="termination_file[]" class="form-control" autocomplete="off"></td>';

        if(terminationNumber > 1){
            html += '<td><button type="button" name="removeTerminationRow" class="btn btn-danger removeTerminationRow" title="DELETE"><i class="fas fa-minus"></i></button></td></tr>';
            $('tbody.termination_body').append(html);
        }
      }
        $(document).on('click','#addTerminationRow', function(){
            $('#termination_table').fadeIn('slow');
            terminationRow++;
            termination_field(terminationRow);
        });
        $(document).on('click','.removeTerminationRow', function(){
            $('#termination_table').fadeOut('slow');
            terminationRow--;
            $(this).closest("tr").remove();

            if($('#termination_table tbody tr').length == 0){
              $('#termination_table').fadeOut('slow');
            }
        });
});

//Saving Data from Work,Personal Information
//This function is to Save/Insert Data into Database
$('#btnSave').on('click', function(){
      var employee_number = $.trim($('#employee_number').val());//.trim()function removes all newlines, spaces (including non-breaking spaces)
      var date_hired = $.trim($('#date_hired').val());
      // var status = $.trim($('#status').val());
      var position = $.trim($('#position').val());
      var branch = $.trim($('#branch').val());
      var shift = $.trim($('#shift').val());
      var tin_number = $.trim($('#tin_number').val());
      var pagibig_number = $.trim($('#pagibig_number').val());
      var philhealth_number = $.trim($('#philhealth_number').val());
      var account_number = $.trim($('#account_number').val());
      var first_name = $.trim($('#first_name').val());
      var last_name = $.trim($('#last_name').val());
      var middle_name = $.trim($('#middle_name').val());
      var suffix = $.trim($('#suffix').val());
      var gender = $.trim($('#gender').val());
      var email_address = $.trim($('#email_address').val());
      var contact_number = $.trim($('#contact_number').val());
      var home_address = $.trim($('#home_address').val());
      var emergency_contact_name = $.trim($('#emergency_contact_name').val());
      var emergency_contact_relation = $.trim($('#emergency_contact_relation').val());
      var emergency_contact_number = $.trim($('#emergency_contact_number').val());

      $.ajax({
          url:"/employees/save", //route name (web.php)
          type:"POST",//requests data from the server
          headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')//For anti forgery
          },
          data:{
              employee_number:employee_number,
              date_hired:date_hired,
              position:position,
              branch:branch,
              shift:shift,
              tin_number:tin_number,
              pagibig_number:pagibig_number,
              philhealth_number:philhealth_number,
              account_number:account_number,
              first_name:first_name,
              last_name:last_name,
              middle_name:middle_name,
              suffix:suffix,
              gender:gender,
              email_address:email_address,
              contact_number:contact_number,
              home_address:home_address,
              emergency_contact_name:emergency_contact_name,
              emergency_contact_relation:emergency_contact_relation,
              emergency_contact_number:emergency_contact_number
          },
          success: function(data){
              if(data == 'true'){
                  Swal.fire("SAVE SUCCESS","","success");//Alert when the statement is true
                  setTimeout(function(){window.location.reload()},2000);//It will reload the page
              }
              else{
                  Swal.fire("SAVE FAILED","","error");
                  setTimeout(function(){window.location.reload()},2000);//It will reload the page
              }
          },
          error: function(data){
              if(data.status == 401){
                window.location.reload();
              }
              alert(data.responseText);
          }
      });
});

//This Function is to fetch data

$(document).on('click','.edit', function(){
    var id = $(this).attr('id');
    $.ajax({
        url: "/employees/fetch",
        method: 'get',
        data:{id:id},
        dataType:'json',

        success:function(data){
          //Work Information
            $('#employee_number').val(data.employee_number);
            $('#date_hired').val(data.date_hired);
            $('#status').val(data.status);
            $('#position').val(data.position);
            $('#branch').val(data.branch);
            $('#shift').val(data.shift);
            $('#tin_number').val(data.tin_number);
            $('#pagibig_number').val(data.pagibig_number);
            $('#philhealth_number').val(data.philhealth_number);
            $('#account_number').val(data.account_number);
          //Personal Information
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#middle_name').val(data.middle_name);
            $('#suffix').val(data.suffix);
            $('#gender').val(data.gender);
            $('#email_address').val(data.email_address);
            $('#contact_number').val(data.contact_number);
            $('#home_address').val(data.home_address);
            $('#emergency_contact_name').val(data.emergency_contact_name);
            $('#emergency_contact_relation').val(data.emergency_contact_relation);
            $('#emergency_contact_number').val(data.emergency_contact_number);

            $('#hidden_id').val(id);
            $('#employee_personal_information').show();
            $('#employees_list').hide();
            $('#addEmployeeBtn').hide();
            $('#btnSave').hide();
        }
    })
});