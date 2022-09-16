<div class="col-12">
    <div class="form-group">
        <label> Select Department: </label>
        <!--  $list_desc = $get_result['departmentDescription'];
          $list_deptid= $get_result['depId']; -->
        <select class="form-control select2" name="selectdep" id="selectdep" multiple="multiple">
            <option value=""></option>
            <?php
          while($get_result = $prep_dep->fetch(PDO::FETCH_ASSOC)){
            $list_depid = $get_result['deptId'];
            $list_desc = $get_result['departmentDescription'];

          echo '<option value ="'.$list_depid.'">'.$list_desc.'</option>';
          }
          ?>
        </select>
    </div>

</div>


<input style="margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;" type="submit" class="btn btn-primary"
    name="import_dep" id="import_dep" value="GENERATE DEPARTMENT">