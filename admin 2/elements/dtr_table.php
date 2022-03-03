<div class="col-8" style = "resize:both;overflow:auto;margin-top:10px;" >
          <div class="card card-warning" style = "height:98%">
               <div class="card-header">
                 <div class ="row" style ="margin:auto;">
                <div class="input-group date">
                           <label style="padding-right:10px;padding-left: 10px">From:  </label> 
                             <div  style = "padding-right:10px" class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                             </div>
                    
      <input  style="margin-right:10px;"type="text" data-provide="datepicker"class="form-control  " style="font-size:13px" autocomplete="off" name="datefrom" id="dtefrom" value = "<?php echo $dteFrom;?>" >
                                  
                       
                       <label style="padding-right:10px">To:</label>
                            <div style = "padding-right:10px" class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                            </div>
       <input type="text" class="form-control  " data-provide="datepicker"  autocomplete="off" name="dateto" id="dteto" value = "<?php echo $dteTo;?>" >
                       
                       
                       <button type="button"  class="btn btn-primary" style = "margin-left:50px;"data-toggle = "modal" data-target = "#printreport"   value="Print">PRINT</button>
                        
                     </div>
                     </div>

              </div>

                
                      <form role="form" method="POST"  action="<?php htmlspecialchars("PHP_SELF");?>">
                          <div class = "row" style="margin-top:10px;">
                              <div class ="col-3"></div>
                                 <div class = "col-6" style = "background-color:white-grey;">
                           
                           <div class = "card " style="height:40px;">
                              <h4 id ="full-name" align="center" style= "margin-top:5px;"> </h4>
                              </div>
                              <input type = "hidden" readonly id = "hiddenempno" name = "hiddenempno" value = "<?php echo $hidden;?>">                               
                           
                          </div>
                          <div class ="col-3"></div>
                          </div>
                  
                       <div class="row col-12">
                       
                        <div  style="overflow-y:auto;height:auto;display: inline-block;margin:auto;">
                            <table id="dtr" class ="form__table table-bordered table-responsive table-hover ">
                                <thead class = "table" >
                                   
                                        <th class = "border border-dark ">Date </th>
                                        <th class = "border border-dark">Day</th>
                                        <th class = "border border-dark">Check In</th>
                                        <th class = "border border-dark">Break Out</th>
                                        <th class = "border border-dark">Break In</th>
                                        <th class = "border border-dark">Check Out</th>
                                        <th class = "border border-dark">OT In</th>
                                        <th class = "border border-dark">OT Out</th>
                                        <th class = "border border-dark">Late</th>
                                        <th class = "border border-dark">UT</th>
                                        <th class = "border border-dark">Options</th>
                                       
                                </thead>
                             <tbody style = "font-size:15px;padding:15px;border-width:3px"id ="dtrbody">
                             </tbody>
                                </table>  
                                <!-- <button id="saveall">SAVE ALL</button> -->
                          
                           </div>
                           </div>
              </div>
           </form>
           </div>