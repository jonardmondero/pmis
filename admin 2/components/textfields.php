<?php

function textField($label,$labelid,$name){
    echo '<div class = "form-group">';
    echo '<label class = " col-form-label  " > '.$label.'  </label>';
    echo '<input type = "text" class = "form-control  " onkeyup="this.value = this.value.toUpperCase();" required id = "'.$name.'" name = "'.$name.'" >';
    echo '<label id = "'.$labelid.'" style = "font-size:13px;color:red;font:Arial;"></label>';
    echo '</div>';
  }
  ?>