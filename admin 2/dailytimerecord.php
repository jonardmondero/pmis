<?php
//include('update_user.php');
// include ("../php_scripts/showdtr.php");
// include('./plugins/TCPDF/User/printdtr.php');
include ('../config/config.php');
$hiddenempno =$dteFrom=$dteTo='';
$timeIn ='';
$timeoutAm ='';
$timeinPm ='';
$timeoutPm='';
$otIn='';
$otOut='';
// $dteFrom ='';
// $dteTo='';
        include ('dtrdesign/header.php');
                  // if(isset()){
                  //     // function post(){
                  //     $hiddenempno = $_POST['hiddenempno'];
                  //     $dteFrom = $_POST['datefrom'];
                  //     $dteTo = $_POST['dateto'];
                  //   }
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
 <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');


   ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <!-- Brand Logo -->


    <!-- Sidebar -->
    

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
            <div class="row md-6">
          <div class="col-md-6">
            <h1 class="m-0 text-dark">Daily Time Record</h1><br>
              
          </div><!-- /.col -->
            
          <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
            <div class="row">
            <div class="col-4">
          <div class="card card-primary">
               <div class="card-header">
                <h3 class="card-title">Department</h3>
              </div>
                <form role="form" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class="card-body">
                    <div class = "row">
                        <div class = "col-12">
                            <div class = "input-group">
                <select class="form-control select2" style="margin-bottom:20px" name="department" id = "deptId" placeholder="Select" value="<?php echo $department; ?>">
                <?php
             
                     $get_user_sql = "SELECT * FROM department";
                     $user_data = $con->prepare($get_user_sql);  
                     $user_data->execute();
                        while ($result = $user_data->fetch(PDO::FETCH_ASSOC)) {
                        $deptId = $result['deptId'];
                        $deptdesc = $result['departmentDescription'];
                        echo "<option value='".$deptId."'>".$deptdesc."</option>";
                    }
                   ?>
                </select>
            </div>
             </div>
              </div>
                    
             <div class = "row">  
                 <div class = "col-12"  style="overflow-y:auto;height: 500px;">
            <table id = "employees" class = "table table-bordered table-hover" >
            <thead style="font-size:13px" >
            <th> Employee No. </th>
                <th> Full Name </th>
                      </thead>              
                        
                <tbody id = "body"> 
                    <tr id = "row" >              
                  </tr>
       
           </tbody>
                 
                  
             </table>
              </div>
                 </div>   

                     </div>
                </form>
        </div>   
                </div>
        
        
        <!-- Small boxes (Stat box) -->
       <div class="col-8">
          <div class="card card-warning">
               <div class="card-header">
                <h3 class="card-title">Time</h3>
              </div>
                
                      <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>">
                          <div class = "row">
                              <div class= "col-12">
                                 
                              <h4 style ="margin-left:200px;margin-right:200px"id ="full-name"> </h4>
      <input type = "hidden" readonly id = "hiddenempno" name = "hiddenempno" value = "<?php echo $hidden;?>">                               
                              </div>
                          </div>
                      <div class = "row" style="margin-bottom:30px;">
                        <div class = col-10>

                   <div class="input-group date">
                           <label style="padding-right:10px;padding-left: 10px">From:  </label> 
                             <div  style = "padding-right:10px" class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                             </div>
                    
      <input  style="margin-right:10px;"type="text" data-provide="datepicker"class="form-control col-3 " style="font-size:13px" autocomplete="off" name="datefrom" id="dtefrom" value = "<?php echo $dteFrom;?>" >
                                  
                       
                       <label style="padding-right:10px">To:</label>
                            <div style = "padding-right:10px" class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                            </div>
       <input type="text" class="form-control col-3 " data-provide="datepicker"  autocomplete="off" name="dateto" id="dteto" value = "<?php echo $dteTo;?>" >
                       
                       
                       </div>
                        
                     </div>
                     <div class = "col-2">
                      <?php 
                     
                      ?>
                   
                        <button type="button"  class="btn btn-primary" data-toggle = "modal" data-target = "#printreport"   value="Print">PRINT</button>
                      
                     </div>
                 </div>
                       <div class="row">
                        <div class = "col-12" style="overflow-y:auto;height: 500px;">
                            <table id="dtr"  cellpadding="5" cellmargin ="5" class ="table-bordered table-hover">
                                <thead style = "font-size:13px">
                                   
                                        <th>Date </th>
                                        <th>Edit</th>
                                        <th>Check In</th>
                                        <th>Break Out</th>
                                        <th>Break In</th>
                                        <th>Check Out</th>
                                        <th>Overtime In</th>
                                        <th>Overtime Out</th>
                                        <th>Late</th>
                                        <th>Undertime</th>
                                        <th>Options</th>
                                       
                                </thead>
                             <tbody style = "font-size:13px;padding:1px;"id ="dtrbody">
                             </tbody>
                                </table>  
                                <!-- <button id="saveall">SAVE ALL</button> -->
                           </div>
                           </div>
              </div>
           </form>
           </div>
       
         
    </section>
    <!-- /.content -->
  </div>
  <?php include('edit_dtr_modal.php');
      include ('print_modal.php');?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div>
  </footer>

  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/jquery/jquery.js"></script>
<script src="../plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  // $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../plugins/moments/moments.js"> </script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<!-- <script src="../plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="../plugins/knob/jquery.knob.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="../dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
 
  
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap4.js"></script>

    <script language="javascript">
    //  $(function () {
  //          $("#employees").DataTable();

  // });
   
  $(document).ready(function(){
     var deptId = $('#deptId').val();
  $('#body').load("get_employee_department.php",{
    dept:deptId

  })
     
 $('#deptId').change(function(){
  var deptId = $('#deptId').val();
  $('#body').load("get_employee_department.php",{
    dept:deptId

  })

 });
 });
    function loadDtr(empnum,datefr,dateto){
          $("#dtrbody").load("frm_dtr.php",{
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

} else{

  $.notify({
    message: message
  },{
    type: 'danger',
    delay: 2000
  }); 

}

}
$('#dtr tbody').on('keyup','.tr',function(){
  event.preventDefault();
     //  $('#edit-dtr').modal('show');
       var id = $(this).data('id');
        var empno = $('#hiddenempno').val();
     //  console.log(id);
     //  getSelectedDtr(id);
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();
     var col3 = currow.find('td:eq(2)').text();
     var col4 = currow.find('td:eq(3)').text();
     var col5 = currow.find('td:eq(4)').text();
     var col6 = currow.find('td:eq(5)').text();
     var col7 = currow.find('td:eq(6)').text();
     var col8 = currow.find('td:eq(7)').text();
     var col9 = currow.find('td:eq(8)').text();
     var col10 = currow.find('td:eq(9)').text();
     var datefr = $('#dtefrom').val();
     var dateto = $('#dteto').val();
      // console.log(col1,col2,col3);
     $.ajax({
      url:'update_dtr.php',
      type:'POST',
      data:{idpost:id,
            empno:empno,
            date:col1,
            checkin:col3,
            breakout:col4,
            breakin:col5,
            checkout:col6,
            overtimein:col7,
            overtimeout:col8,
            late:col9,
            undertime:col10
      },
      dataType:'json',
      // success:post_notify('Successfully saved', 'success'),
      error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

     })

})
  $(document).ready(function(){
     $('#dtr tbody').on( 'click', '.editdtr', function(){
     event.preventDefault();
     //  $('#edit-dtr').modal('show');
       var id = $(this).data('id');
        var empno = $('#hiddenempno').val();
     //  console.log(id);
     //  getSelectedDtr(id);
     var currow=  $(this).closest('tr');
     var col1 = currow.find('td:eq(0)').text();
     var col3 = currow.find('td:eq(2)').text();
     var col4 = currow.find('td:eq(3)').text();
     var col5 = currow.find('td:eq(4)').text();
     var col6 = currow.find('td:eq(5)').text();
     var col7 = currow.find('td:eq(6)').text();
     var col8 = currow.find('td:eq(7)').text();
     var col9 = currow.find('td:eq(8)').text();
     var col10 = currow.find('td:eq(9)').text();
     var datefr = $('#dtefrom').val();
     var dateto = $('#dteto').val();
      // console.log(col1,col2,col3);
     $.ajax({
      url:'update_dtr.php',
      type:'POST',
      data:{idpost:id,
            empno:empno,
            date:col1,
            checkin:col3,
            breakout:col4,
            breakin:col5,
            checkout:col6,
            overtimein:col7,
            overtimeout:col8,
            late:col9,
            undertime:col10
      },
      dataType:'json',
     
      error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }

     })
    
    })
     $('#dtr tr').on( 'change','.tr', function(){
      // $('#editdtr').prop('enabled');

        $(this).closest('tr').prop("disabled", false);
      console.log("hello");
     })

     $('#dtrbody').change(function(){
      console.log("i am jonard");
     })
   });
   // function onchange(){
   //   $('#editdtr').removeAttr('disabled','disabled');
   //   console.log("hello");
   // }
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
     $('#empdate').val(col1);
     $("#findlogs").load("loadlogs.php",{
      empno:empnum,
      date:col1},
      function(response, status, xhr) {
  if (status == "error") {
      alert(msg + xhr.status + " " + xhr.statusText);
      console.log(msg + xhr.status + " " + xhr.statusText);
  }




   })
   });
 
 $('#print').click(function(){
     var hiddenempno = $('#hiddenempno').val();
    // var datefrom = $('#dtefrom').datepicker({dateFormat: 'yy-mm-dd'}).val();
    // var dateto = $('#dteto').val();
    var month = $('#months').val();
    var year = $('#year').val();
    var period = $('#period').val();
    var finalmonth = '';
    if(month == 'January'){
      finalmonth ='01';
    }
    if(month == 'February'){
      finalmonth ='02';
    } 
    if(month == 'March'){
      finalmonth ='03';
    } 
    if(month == 'April'){
      finalmonth ='04';
    } 
    if(month == 'May'){
      finalmonth ='05';
    } 
    if(month == 'June'){
      finalmonth ='06';
    } 
    if(month == 'July'){
      finalmonth ='07';
    } 
    if(month == 'August'){
      finalmonth ='08';
    } 
    if(month == 'September'){
      finalmonth ='09';
    } 
    if(month == 'October'){
      finalmonth ='10';
    } 
    if(month == 'November'){
      finalmonth ='11';
    } 
    if(month == 'December'){
      finalmonth ='12';
    } 

    var param = "empno="+hiddenempno+"&year="+year+"-"+finalmonth+"-%";
    var secondhalf = "empno="+hiddenempno+"&year="+year+"-"+finalmonth+"";
    if(period == 'All Period'){
    $('#printlink').attr("href","../plugins/jasperreport/dtrreport.php?"+param,'_parent');
  } else if(period =='16-31'){
     $('#printlink').attr("href","../plugins/jasperreport/dtrreport2nd.php?"+secondhalf,'_parent');
  }
  else if(period =='1-15'){
     $('#printlink').attr("href","../plugins/jasperreport/dtrreport1st.php?"+secondhalf,'_parent');
  }
    })
    $('#findtable tbody').on( 'click', '.addlogs', function(){
      event.preventDefault();
      var currow=  $(this).closest('tr');
      const state = currow.find('select').val();
      const dte =  $('#empdate').val();
      var datefr = $('#dtefrom').val();
        var dateto = $('#dteto').val();
        var empno = $('#hiddenempno').val();
      // const state = $('#insert').val();
     $.ajax({
       url:'update_logs.php',
       data:{empno:empno,date:dte,state:state},
       type:"POST",
       success:function(){
         loadDtr(empno,datefr,dateto);
         post_notify("You successfully inserted the logs", 'success');

       },
       error: function (xhr, b, c) {
     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       }
     })


     })
    
     });
        
    </script>
   
</body>
</html>
