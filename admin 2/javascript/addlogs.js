$('#findtable tbody').on( 'click', '.reflectlogs', function(){
    event.preventDefault();
    
    var table = document.getElementById("dtr");

    var row = table.insertRow(0);
     var cell1 = row.insertCell(0);
    
    cell1.innerHTML = empno;
   
   });