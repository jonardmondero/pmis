<?php
            echo '<td class ="border border-dark" >
            <button class = "btn btn-warning addlogs"  > <i class = "fa fa-search"></i></button>

            
              <button class="btn btn-danger" type="button" data-toggle="collapse"
           data-target="#showOptions'.$result3['Date'].'" aria-expanded="false" ><i class = "fa fa-edit"></i></button>
            <div class="collapse multi-collapse" id="showOptions'.$result3['Date'].'">
           <div class="card shadow-none card-body"  style = "width:100px;">
            <div class = "row">
            <button class = "btn btn-danger btn-sm removelate" style = "margin-right:2px;margin-bottom:2px"><b>L</b></button> 
            <button class = "btn btn-warning btn-sm removeundertime" style = "margin-right:2px;margin-bottom:2px" ><b>UT</b></button> 
            <button class = "btn btn-success btn-sm removelateundertime" style = "margin-right:2px;margin-bottom:2px "><b>L/UT</b></button> 
            <button class = "btn btn-success btn-sm removedayoff" style = "margin-right:2px;margin-bottom:2px "><b>D. OFF</b></button> 
            <button class = "btn btn-info btn-sm recompute" style = "margin-right:2px;margin-bottom:2px "><b>RECMPT</b></button> 
             </div>
             </div>
             </div>
           </td>';

            ?>