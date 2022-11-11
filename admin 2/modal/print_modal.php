<div id="printreport">

    <form class="form-horizontal" method="post" action="<?php htmlspecialchars("PHP_SELF");?>" id="employee-form">

        <div class="col-12">
            <div class="row">
                <div class="form-group col-4">
                    <label>Month</label>
                    <select id="months" class="form-control">
                        <option val="01">January</option>
                        <option val="02">February</option>
                        <option val="03">March</option>
                        <option val="04">April</option>
                        <option val="05">May</option>
                        <option val="06">June</option>
                        <option val="07">July</option>
                        <option val="08">August</option>
                        <option val="09">September</option>
                        <option val="10">October</option>
                        <option val="11">November</option>
                        <option val="12">December</option>

                    </select>
                </div>

                <div class="form-group col-4">
                    <label>Period</label>
                    <select id="period" class="form-control">
                        <option val="1">1-15</option>
                        <option val="2">16-31</option>
                        <option val="All">All Period</option>

                    </select>
                </div>
                <div class="form-group col-4">
                    <label>Year</label>
                    <select class="form-control" id="year">
                        <?php for($x = 2018; $x < 2050; $x++) { ?>
                        <option <?php if($x == date("Y")){
                                                echo 'selected';} ?> val='<?php echo $x; ?>'> <?php echo $x; ?>
                        </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="row">
                <a style="margin:auto;" target="_blank" id="printlink" 
                    href="../plugins/jasperreport/dtrreport.php?empno=<?php echo $hiddenempno;?>&datefrom=<?php echo $dteFrom;?>&dateto=<?php echo $dteTo;?>">
                    <button type="button" class="btn btn-primary" name="print" id="print" value="Print">PRINT</button>

                </a>

                <a style="margin:auto;" target="_blank" id="printlink_all"
                    href="../plugins/jasperreport/dtrreport.php?dept=<?php echo $hiddenempno;?>&datefrom=<?php echo $dteFrom;?>&dateto=<?php echo $dteTo;?>">
                    <button type="button" class="btn btn-warning" name="print" id="printAll" value="Print">PRINT
                        ALL</button>

                </a>

            </div>

    </form>


    <!-- /.modal-content -->
</div>
</div>
<!-- /.modal-dialog -->
</div>
<style>
.label {
    margin-right: 10px;
}
</style>