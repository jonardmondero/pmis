

 <div class="modal fade" id="printreport">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">PRINT DTR</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
           
            <div class="modal-body">
               <form class="form-horizontal" method = "post" action = "<?php htmlspecialchars("PHP_SELF");?>" id = "employee-form">
              
                <div class ="col-12">
                  <div class = "row">
               <div class = "form-group col-4">
                <label>Month</label>
                <select id ="months" class ="form-control">
                  <option val ="01">January</option>
                  <option val ="02">February</option>
                  <option val ="03">March</option>
                  <option val ="04">April</option>
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

            <div class ="form-group col-4">
              <label>Period</label>
              <select id = "period" class = "form-control">
                <option val = "1">1-15</option>
                <option val = "2">16-31</option>
                <option val = "All">All Period</option>
                
              </select>
            </div>
              <div class ="form-group col-4">
              <label>Year</label>
              <select id = "year" class = "form-control">
                <option val ="2014">2014</option>
                <option val ="2015">2015</option>
                <option val ="2016">2016</option>
                <option val ="2017">2017</option>
                <option val ="2018">2018</option>
                <option val ="2019">2019</option>
                <option val ="2020">2020</option>
                <option val ="2021">2021</option>
                <option val ="2022">2022</option>
                <option val ="2023">2023</option>
                <option val ="2024">2024</option>
                <option val ="2025">2025</option>
                <option val ="2026">2026</option>

                
              </select>
            </div>
        </div>
        <div class ="row">
             <a style = "margin:auto;"target="blank" id = "printlink" href="../plugins/jasperreport/dtrreport.php?empno=<?php echo $hiddenempno;?>&datefrom=<?php echo $dteFrom;?>&dateto=<?php echo $dteTo;?>">
              <button type="button"  class="btn btn-primary"  name = "print" id = "print" value="Print">PRINT</button>
                      
             </a>
          
          </div>
           
             </form>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
        <!-- /.modal-dialog -->
      </div>
      <style>
        .label {
          margin-right:10px;
        }
      </style>