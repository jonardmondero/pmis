<?php

include ('../config/config.php');
$curdate = date("m/d/Y");

include ('dtrdesign/header.php');


$curdate = date("m/d/Y");      
$getLeaveType = "CALL spGetLeaveType()";
$prep_leave_type = $con->prepare($getLeaveType);
$prep_leave_type->execute();
?>




<!DOCTYPE html>
<html>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">


        <?php 
 include('dtrdesign/navbar.php');
 include('dtrdesign/sidebar.php');

  

   ?>




        <div class="content-wrapper">

            <section class="content">
                <div class="container-fluid">
                <div class=" row ">
                            <div class=" col-12">
                                <div class="justify-content-center">
                                    <h1 class="m-0 text-dark ">Application for Leave</h1><br>
                                </div>
                            </div>
                        </div>
                        <div class=" row ">
                    <div class="col-4">
                        
                     
                            <div class="col-12 " style="resize:both;overflow:auto;">
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">Search Employee</h3>
                                    </div>

                                    <?php include("elements/search_employee.php");?>


                                </div>
                        </div>
                             
                            </div>
                            <div class="col-8">
                                <form method="POST" id="leaveform" action=<?php htmlspecialchars("PHP_SELF");?>>
                                    <div class="col-12 no-gutters">
                                        <div class="card card-primary" style="width:100%">
                                            <div class="card-header">
                                                <h3 class="card-title">Details</h3>

                                            </div>
                                            <div class = "card-body">
                                            <div class="row">
                                               
                                                <div class ="col-3"></div>
                                                <div class = "col-6" style = "background-color:white-grey;">
                                                    <input type="text" id="leaveempno" readonly hidden>
                                                    <div class="card full_name">
                                                        <h4 id="fullname"> </h4>
                                                    </div>
                                                </div>
                                                <div class ="col-3"></div>
                                                    <div class="row col-12">

                                                            <div class="input-group date p-2">
                                                                <label
                                                                    style="padding-right:10px;padding-left: 10px">From:
                                                                </label>
                                                                <div style="padding-right:10px"
                                                                    class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>

                                                                <input style="margin-right:10px;" type="text"
                                                                    data-provide="datepicker"
                                                                    class="form-control col-4 " style="font-size:13px"
                                                                    autocomplete="off" name="datefrom" id="dtefrom"
                                                                    val="<?php echo $curdate; ?> ">


                                                                <label style="padding-right:10px">To:</label>
                                                                <div style="padding-right:10px"
                                                                    class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text" class="form-control col-4 "
                                                                    data-provide="datepicker" autocomplete="off"
                                                                    name="dateto" id="dteto"
                                                                    val="<?php echo $curdate; ?> ">

                                                                <div style = "margin-left:20px">
                                                                    <button style = "margin:auto;" type="submit" name="addleave" id="addleave"
                                                                class=" btn btn-warning"><i
                                                                    class="fa fa-plus"></i></button>


                                                                   
                                                                <label>Specific Date:</label>
                                                                <button type="submit" name="specificdate"
                                                                    id="specificdate" class=" btn btn-primary"><i
                                                                        class="fa fa-plus"></i></button>
                                                            </div>
                                                         </div>

                                         
                                                            
                                                     
                                                      
                                                       
                                                    </div>
                                                  
                                                    <div class="row col-12">

                                                        <div class = "col-8">
                                                            <div class="form-group ">
                                                                <label>Leave Type</label>
                                                                <select class="form-control select2 " id="leavetype"
                                                                    name="leavetype" required>
                                                                    <option selected="selected">Select Leave</option>
                                                                    <?php while ($get_result = $prep_leave_type->fetch(PDO::FETCH_ASSOC)) { ?>
                                                                    <option
                                                                        value="<?php echo $get_result['Category']; ?>">
                                                                        <?php echo $get_result['LeaveTypeDescription']; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            </div>
                                                            <div class = "col-4">             
                                                            <div class="form-group">
                                                                <label>Inclusive Date</label>
                                                                <select class="form-control select2 " id="inclusivedate"
                                                                    style="width: 100%;" name="inclusivedate" required>
                                                                    <option selected="selected">Whole Day</option>
                                                                    <option>Morning</option>
                                                                    <option>Afternoon</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                              
                                                    </div>
                                                    <!--
                                          
-->                                               
                                                    </div>
                                               
                                                    </div>
                                                    </div>
                                                    <div class ="card card-warning">
                                                    <div class="card-header">
                                                <h3 class="card-title">Leave Details</h3>
                                            </div>
                                            <div class = "card-body">
                                                    <div class="row" style="margin:auto;">

                                                        <table class="table table-hover table-bordered "
                                                            style="margin:auto;width:100%;margin-top:20px;" id="leavelist">
                                                            <thead style="margin:auto;width:100%;">
                                                                <th>Leave Name</th>
                                                                <th>From</th>
                                                                <th>To</th>
                                                                <th>Inclusive Date</th>
                                                                <th>Remove</th>
                                                            </thead>

                                                        </table>
                                                        </div>

                                                        <div class="row"
                                                        style="margin:auto;padding-top:30px;padding-bottom:30px;">



                                                        <button type="submit" 
                                                            name="save_leave" id="save_leave"
                                                            class=" custom_button btn btn-primary"><i
                                                                class="fa fa-save"></i></button>


                                                    </div>
                                                    <div class="row">
                                                        <label id="save_notification"
                                                            style="text-align:center;margin:auto;"></label>
                                                    </div>

                                                    </div>



                                                    </div>
                                                    </div>
                                                  
                                                </div>
                                            
                                       
                                   
                                </form>
                                           
                                                                  
                                <!-- /.content-wrapper -->
            </section>
        </div>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.0-alpha

    </footer>


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
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="../plugins/sweetalerts/sweetalerts.js"></script>
    <script src="../plugins/sweetalerts/sweetalert.min.js"></script>
    <script src="../plugins/sweetalerts/toastr.js"></script>
    <!-- REFLECT LOGS SCRIPT -->
    <script src="javascript/addlogs.js"></script>
    <!-- PRINT REPORTS  SCRIPT -->
    <script src="javascript/printreport.js"></script>

    <script language="javascript">
        $(document).ready(function () {
            $('.select2').select2();
   


        $("#search").keyup(function () {
            var keyword = $('#search').val();

            $('#tbody').load("ajaxcall/load_employee.php", {
                    keyword: keyword
                },
                function (response, status, xhr) {
                    if (status == "error") {
                        alert(msg + xhr.status + " " + xhr.statusText);
                        console.log(msg + xhr.status + " " + xhr.statusText);
                    }
                });


        })

        $("#tableemp tbody").on('click', '#select', function () {

            var currow = $(this).closest('tr');
            var col1 = currow.find('td:eq(0)').text();
            var col2 = currow.find('td:eq(1)').text();
            $('#leaveempno').val(col1);
            $('#fullname').html(col2);
        });
        $('#addleave').click(function () {
            event.preventDefault();
            var datefrom = $('#dtefrom').val();
            var dateto = $('#dteto').val();
            var inclusivedate = $('#inclusivedate').val();
            var leavetype = $('#leavetype').val();
            var empno = $('#leaveempno').val();
            if (datefrom == '' || dateto == '' || leavetype == 'Select Leave' || empno == '') {
                post_notify("Please complete the information!", "danger");
            } else {

                var table = document.getElementById("leavelist");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = leavetype;
                cell2.innerHTML = datefrom;
                cell3.innerHTML = dateto;
                cell4.innerHTML = inclusivedate;
                cell5.innerHTML =
                    '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
            }
        });

        $('#specificdate').click(function () {
            event.preventDefault();
            var datefrom = $('#dtefrom').val();
            var dateto = $('#dteto').val();
            var inclusivedate = $('#inclusivedate').val();
            var leavetype = $('#leavetype').val();
            var empno = $('#leaveempno').val();
            if (datefrom == '' || dateto == '' || leavetype == 'Select Leave'|| empno == '') {
                post_notify("Please complete the information!", "danger");
            } else {

                var table = document.getElementById("leavelist");
                var row = table.insertRow(1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                cell1.innerHTML = leavetype;
                cell2.innerHTML = datefrom;
                cell3.innerHTML = datefrom;
                cell4.innerHTML = inclusivedate;
                cell5.innerHTML =
                    '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
            }
        })
        $('#save_leave').click(function () {
            //fetch all the data from the table and save it to the database
            var workid = $('#leaveform').serializeArray();
            const success = '';
            event.preventDefault();
            $('#leavelist tr').each(function (row, tr) {
                var empno = $('#leaveempno').val();
                console.log(empno);
                var leavetype = $(tr).find('td:eq(0)').text();
                var from = $(tr).find('td:eq(1)').text();
                var to = $(tr).find('td:eq(2)').text();
                var duration = $(tr).find('td:eq(3)').text();
                var newfrom = formatDate(from);
                var newto = formatDate(to);
                $.ajax({
                    url: 'ajaxcall/save_leave.php',
                    type: 'POST',
                    data: {
                        empno: empno,
                        leavetype: leavetype,
                        from: newfrom,
                        to: newto,
                        duration: duration
                    },
                    error: function (xhr, b, c) {
                        console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                            " c=" + c.responseText);
                        // $('#save_notification').html(xhr.responseText);
                        // notification(xhr.responseText, "","Refresh","success","success");
                        // post_notify(xhr.responseText,"danger");
                        // post_notify(xhr.responseText,'success');

                    }
                }).done(function(message){
                    notification(message, "","Refresh","success","success");
                })

            });
            //reset all the data inside the table;
            // post_notify(success, "success");
            // reset_form_input('travelform');
            // $("#travellist td").parent().remove();
            // post_notify("Record Inserted", "success");
        });

        function notification(title, message,text,value,status) {
      swal(title, message, status, {
          buttons: {
            catch: {
              text: text,
              value: value,
            }

          },
        })
        .then((value) => {
          switch (value) {

            case "success":
              window.location.reload(true);
              break;
              case "error":

              break;

          }
        });

    }

        //FORMAT THE DATE
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [year, month, day].join('-');
        }
        //display notification 
        function post_notify(message, type) {

            if (type == 'success') {

                $.notify({
                    message: message
                }, {
                    type: 'success',
                    delay: 2000
                });

            } else {

                $.notify({
                    message: message
                }, {
                    type: 'danger',
                    delay: 2000
                });

            }

        }



        //reset the all the data inside the form
        function reset_form_input(form_id) {
            $('#' + form_id).each(function () {
                this.reset();
            });
        }

        function deleteRow(r) {
            // DELETE SELECTED ROW
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("leavelist").deleteRow(i);
        }
    });
    </script>

</body>

</html>