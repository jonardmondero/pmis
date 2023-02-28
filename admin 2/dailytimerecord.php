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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php 
         include('dtrdesign/navbar.php');
        include('dtrdesign/sidebar.php');
   ?>

        <div class="content-wrapper">

            <section class="content">
                <div class="wrapper">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-4">

                                <?php include('elements/employee_table.php');?>
                            </div>

                            <?php include('elements/dtr_table.php');
   
    ?>
                        </div>

                        <?php include('modal/edit_dtr_modal.php');
                         include('modal/update_supervisor_modal.php');
                         include('modal/add_employee_modal.php');
     ?>
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

    <?php include('dtrdesign/footer.php');  
    ?>

    <script src="javascript/dailytimerecord_script.js"></script>

</body>

</html>