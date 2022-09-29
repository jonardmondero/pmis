<div class="col-8" style="margin-top:10px;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="card bg-light">

                <div class="card-header ">
                    <div class="row  d-flex justify-content-center" style="margin:auto;">
                        <div class="col-6 input-group ">


                            <span class="input-group-text">
                                <label style="padding-right:10px;padding-left: 10px">Date: </label>
                                <div style="padding-right:10px" class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </span>
                            <input style="margin-right:10px;" type="text" class="form-control" style="font-size:13px"
                                autocomplete="off" name="daterange" id="dtefrom" value="<?php echo $dteFrom;?>">



                            <button class="btn btn-primary float-right" type="button" data-toggle="collapse"
                                data-target="#printDtr" aria-expanded="false" aria-controls="multiCollapseExample2"><i
                                    class="fa fa-print"></i>
                            </button>

                        </div>
                    </div>

                    <div class="collapse multi-collapse" id="printDtr" style="margin-top:10px;">
                        <div class="card card-body">
                            <?php include ('modal/print_modal.php');?>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form role="form" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">
                            <div class="row" style="margin-top:5px;">
                                <div class="col-3"></div>
                                <div class="col-6" style="background-color:white-grey;">

                                    <div class="card full_name">
                                        <h4 id="full-name"> </h4>
                                    </div>
                                    <input type="hidden" readonly id="hiddenempno" name="hiddenempno"
                                        value="<?php echo $hidden;?>">
                                    <input type="hidden" readonly id="hiddendeptid" name="hiddendeptid" value="">

                                </div>
                                <div class="col-3"></div>
                            </div>

                            <div class="row col-12">

                                <div style="margin:auto;">
                                    <table id="dtr" class="form__table table-bordered table-responsive table-hover ">
                                        <thead class="table">

                                            <th class="border border-dark ">Date </th>
                                            <th class="border border-dark">Day</th>
                                            <th class="border border-dark">Check In</th>
                                            <th class="border border-dark">Break Out</th>
                                            <th class="border border-dark">Break In</th>
                                            <th class="border border-dark">Check Out</th>
                                            <th class="border border-dark">OT In</th>
                                            <th class="border border-dark">OT Out</th>
                                            <th class="border border-dark">Late</th>
                                            <th class="border border-dark">UT</th>
                                            <th class="border border-dark">Options</th>

                                        </thead>
                                        <tbody id="dtrbody">
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>