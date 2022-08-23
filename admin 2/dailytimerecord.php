<?php

include ('../config/config.php');
include('session.php');



$hiddenempno =$dteFrom=$dteTo='';
$timeIn ='';
$timeoutAm ='';
$timeinPm ='';
$timeoutPm='';
$otIn='';
$otOut='';
$titlename = 'Daily Time Record';
include ('dtrdesign/header.php');
          
?>
<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php 
 include('dtrdesign/sidebar.php');


   ?>

  <div class="content-wrapper">
    
    <section class="content">
      <div class = "wrapper">
        <div class="container-fluid">
            
            <div class="row">
            <div class="col-4" >
            
            <?php include('elements/employee_table.php');?>
                </div>
          
    <?php include('elements/dtr_table.php');
   
    ?>
  </div>

  <?php include('modal/edit_dtr_modal.php');
      include('modal/update_supervisor_modal.php');
      include ('modal/print_modal.php');?>
        </div>

  </section>
  </div>
</div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    
  </footer>

  </div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('dtrdesign/footer.php'); ?>
    <script language="javascript">
    var date = '';
  
  $(document).ready(function(){
   $("#deptId").select2();
  
     var deptId = $('#deptId').val();
     var empstatus = $('#emp_status').val();   
  // $('#body').load("get_employee_department.php",{
  //   dept:deptId,
  //   empstatus:empstatus
    getEmployees(deptId,empstatus);
  });

     function getEmployees(dept,status){
var dataTable = $('#employees').DataTable({

paging: true,
destroy: true,
stateSave: true,
processing: true,
serverSide: true,
scrollX: false,
ajax: {
  dataType:"JSON",
  url: "ajaxcall/get_employee_department.php",
  type: "POST",
  data:function (d){
    d.department = dept,
    d.empstatus = status
  },
  error: function(xhr, b, c) {
    console.log(
      "xhr=" +
      xhr.responseText +
      " b=" +
      b.responseText +
      " c=" +
      c.responseText
    );
  }
}
});


     }



 $('#deptId').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  getEmployees(deptId,empstatus);
  $('#hiddendeptid').val(deptId);

 });

 $('#emp_status').change(function(){
  var deptId = $('#deptId').val();
  var empstatus = $('#emp_status').val();
  getEmployees(deptId,empstatus);

 });

    function loadDtr(empnum,datefr,dateto){
          $("#dtrbody").load("ajaxcall/frm_dtr.php",{
           employeeno: empnum,
           dtfr: datefr,
           dtto: dateto
           
  
      }, function(response, status, xhr) {
    if (status == "error") {
        alert(msg + xhr.status + " " + xhr.statusText);
        console.log(msg + xhr.status + " " + xhr.statusText);
    }
});

      }
var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];

    tbody.onclick = function (e) {
    e = e || window.event;
    var empno = [];
   var fullname = [];
    var target = e.srcElement || e.target;
    while (target && target.nodeName !== "TR") {
        target = target.parentNode;
    }
    if (target) { 
        var cells = target.getElementsByTagName("td");
        var datefr = $('#dtefrom').val();
        var dateto = $('#dteto').val();
        
            empno.push(cells[0].innerHTML);
       fullname.push(cells[1].innerHTML); 
        var empnum = empno.toString();
        var fullname2= fullname.toString();
        $('#hiddenempno').val(empnum);
        $('#full-name').html(fullname2);
        // $('#empinfo').html(fullname2);
    loadDtr(empnum,datefr,dateto);
    }
   
  }
 


function post_notify(message, type){

if (type == 'success') {

  $.notify({
    message: message
  },{
    type: 'success',
    delay: 2000
  });

} else {

  $.notify({
    message: message
  },{
    type: 'danger',
    delay: 2000
  }); 

}

}
$('#dtr tbody').on('keyup','.tr',function(){
  //UPDATE THE DTR WHEN THE USER CHANGES THE DATA.
  event.preventDefault();
 
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();
     date = col1;
    
})

function updateInAm(value){

  const field = 'inAM';
  const empno = $('#hiddenempno').val();
  
  updateDTR(empno,date,field,value);

};

function updateInAm(value){

const field = 'inAM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOutAm(value){

const field = 'outAM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateInPm(value){

const field = 'inPM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOutPm(value){

const field = 'outPM';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOtIn(value){

const field = 'otIn';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};

function updateOtOut(value){

const field = 'otOut';
const empno = $('#hiddenempno').val();

updateDTR(empno,date,field,value);

};


function updateLate(value){

const field = 'late';
const empno = $('#hiddenempno').val();

updateLateUT(empno,date,field,value);

};


function updateUndertime(value){

const field = 'undertime';
const empno = $('#hiddenempno').val();

updateLateUT(empno,date,field,value);

};



function updateDTR(empno,date,field,value){

  $.ajax({
      url:'ajaxcall/update_dtr.php',
      type:'POST',
      data:{
            empno:empno,
            dateofupdate:date,
            field:field,
            value:value
         
      },
      dataType:'json',
      error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

     })

}

function updateLateUT(empno,date,field,value){

$.ajax({
    url:'ajaxcall/updateLateUT.php',
    type:'POST',
    data:{
          empno:empno,
          dateofupdate:date,
          field:field,
          value:value
       
    },
    dataType:'json',
    // success:post_notify('Successfully saved', 'success'),
    error: function (xhr, b, c) {
   console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
     }

   })

}

    $(document).ready(function(){
    $('#dtr tbody').on( 'click', '.addlogs', function(){
    event.preventDefault();
    $('#edit-dtr').modal('show');
     var id = $(this).data('id');
     var empnum = $('#hiddenempno').val();
     //date column on dtr
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();


     $('#empdate').html(col1);
     $("#findlogs").load("ajaxcall/loadlogs.php",{
      empno:empnum,
      date:col1},
      function(response, status, xhr) {
  if (status == "error") {
      alert(msg + xhr.status + " " + xhr.statusText);
      console.log(msg + xhr.status + " " + xhr.statusText);
  }




   })
   });


   $('#dtr tbody').on( 'click', '.col', function(){

event.preventDefault();


});


   $('#dtr tbody').on( 'click', '.removeut', function(){
     event.preventDefault();
     var empnum = $('#hiddenempno').val();
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();

     $.ajax({
                    url: 'ajaxcall/remove_undertime.php',
                    type: 'POST',
                    data: {
                        empno: empnum,
                        date: col1
                    },
                    error: function (xhr, b, c) {
                        console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                            " c=" + c.responseText);

                    }
                }).done(function(){
                  var datefr = $('#dtefrom').val();
                  var dateto = $('#dteto').val();
                  $('#hiddenempno').val(empnum);
                loadDtr(empnum,datefr,dateto);
                })
            
     });
    });
     $(document).keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
   return false;
  }
});




$('#btn_update_supervisor').click(function () {

const department = $("#update_supervisor_department").val();
const supervisor_name = $("#supervisor_name").val();
console.log(department,supervisor_name);
$.ajax({
  type:"POST",
  url: "ajaxcall/update_supervisor.php",
  data: {
    dept: department,
    supervisor: supervisor_name
  },
  success: function (message) {
      notification(message, "","Refresh","success","success");
  },
  error: function (xhr, b, c) {
    console.log(
      "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
    );

  },
});
});



       
    </script>
   
</body>
</html>
