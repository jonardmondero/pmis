<div class="col-8" style = "resize:both;overflow:auto;" >
          <div class="card card-warning">
               <div class="card-header">
                <h3 class="card-title">Time</h3>
              </div>
                
                      <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>">
                          <div class = "row">
                              <div class= "col-12">
                                 
                              <h4 style ="margin-left:200px;margin-right:200px margin:auto;"id ="full-name"> </h4>
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
                       <div class = "col-12">
                        <div  style="overflow-y:auto;height:auto;display: inline-block;margin:auto;">
                            <table id="dtr"  cellpadding="5" cellmargin ="5" class ="table-bordered table-hover "style ="position: relative;">
                                <thead style ="font-size:15px;position:sticky;">
                                   
                                        <th>Date </th>
                                        <th>Day</th>
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
                             <tbody style = "font-size:15px;padding:15px;"id ="dtrbody">
                             </tbody>
                                </table>  
                                <!-- <button id="saveall">SAVE ALL</button> -->
                           </div>
                           </div>
                           </div>
              </div>
           </form>
           </div>