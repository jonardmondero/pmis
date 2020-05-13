      <div class="modal fade" id="edit-dtr">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Find Record</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class = "container-fluid">
                <div class = "row " >
                <div class = "col-12 d-flex justify-content-center" >
                 <label style ="margin:auto;font-size:30px" id = "empdate" name = "empdate"></label>
                 </div>
                </div>
                <div class ="row">
                  <div class = "col-12">
             <table style ="margin:auto;width:100%;"id = "findtable" class = "table-hover table-bordered">

               <thead>
                 <th>Date</th>
                 <th>Time</th>
                 <th> State </th>
                 <th>Insert To </th>
                 <th> Save </th>

               </thead>
               <tbody id="findlogs">
                 

               </tbody>
             </table>
           </div>
           </div>
            </div>
          </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>