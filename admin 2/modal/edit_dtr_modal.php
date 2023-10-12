      <div class="modal fade" id="edit-dtr">
          <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                  <div class="modal-header bg-dark text-center ">
                      <h4 class="modal-title text-center text-bold">VIEW MACHINE RECORD</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body bg-white">
                      <div class="container-fluid">
                          <div class="row ">
                              <div class="col-12 d-flex justify-content-center">
                                  <label style="margin:auto;font-size:30px" id="emp_name" name="emp_name"></label>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-12">
                                  <table style="margin:auto;width:100%" id="findtable"
                                      class="table-hover table-bordered border-secondary text-center border border-dark">

                                      <thead>
                                          <th>Date</th>
                                          <th>Punch State</th>
                                          <th>Location</th>
                                          <th>Time</th>
                                          <th> State </th>
                                       
                                      </thead>
                                      <tbody id="findlogs">


                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>