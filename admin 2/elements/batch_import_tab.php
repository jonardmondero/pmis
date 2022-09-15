<div class="card">
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label> Select Department: </label>
                        <!--  $list_desc = $get_result['departmentDescription'];
          $list_deptid= $get_result['depId']; -->
                        <select class="form-control select2" style="width:100%" name="select_batch" id="select_batch">
                            <option value=""></option>
                            <?php
                            $prep_dep->execute();
          while($get_result = $prep_dep->fetch(PDO::FETCH_ASSOC)){
            $list_depid = $get_result['deptId'];
            $list_desc = $get_result['departmentDescription'];

          echo '<option value ="'.$list_depid.'">'.$list_desc.'</option>';
          }
          ?>
                        </select>
                    </div>
                    <table class="table table-hover" style="width: 100%" id="tblBatchImport">
                        <thead>
                            <th>Office Code</th>
                            <th>Office Name</th>
                            <th>Date From</th>
                            <th>Date To</th>
                            <th>Options</th>


                        </thead>
                    </table>
                </div>



                <input style="margin:auto; width:100%;margin-bottom:10px; margin-top:1rem;" type="submit"
                    class="btn btn-primary" name="import_dep_batch" id="import_dep_batch" value="GENERATE DEPARTMENTS">
            </div>
        </div>
    </div>
</div>