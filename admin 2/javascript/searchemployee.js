var dataTable = $('#tableemp').DataTable( {
    "page"      : true,
     "stateSave" :true,
               "processing": true,
     "serverSide": true,
     'scrollX'   : true,
               "ajax":{
                   url :"javascript/search_employee.php", // json datasource
                   type: "post",  // method  , by default get
                   error: function (xhr, b, c) {
           console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
  }
       // error: function (xhr, b, c) {
       //     console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
       // }
               },
     "columnDefs": 
     
     [
       {    "width": "90px",
           "targets" : -1,
           "data" : null,
           "defaultContent": '<button class="btn btn-success btn-sm btn-flat add_worksched">  <i class="fa fa-check"></i></button>  '
     
    
         }],

}
);