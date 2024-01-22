$(function() {
$(document).ready(function(){

    $("#leavetype").select2();

 
});
$('input[name="pickdate"]').datepicker({
    multidate: true,
      format: 'yyyy-mm-dd'
  });

  
    $('.select2').select2();
    var datefrom = '';
    var dateto = '';
$("#tblsearch tbody").on('click', '#select', function () {

    var currow = $(this).closest('tr');
    var col1 = currow.find('td:eq(0)').text();
    var col2 = currow.find('td:eq(1)').text();
    $('#leaveempno').val(col1);
    $('#fullname').html(col2);
});


$('input[name="datefrom"]').daterangepicker({
    opens: "left",
},
function(start, end, label) {
    datefrom = start.format("YYYY-MM-DD");
    dateto = end.format("YYYY-MM-DD");
    console.log(
        "A new date selection was made: " +
        start.format("YYYY-MM-DD") +
        " to " +
        end.format("YYYY-MM-DD")
    );
    addLeave(datefrom,dateto);
}
);


$("#datepick").on("click", function () {
var leavetype = $('#leavetype').val();
var inclusivedate = $('#inclusivedate').val();
let date = $('#pickdate').val();
let datearray = date.split(',');

    for(let i = 0; i <datearray.length; i++){
       
       var table = document.getElementById("leavelist");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = leavetype;
        cell2.innerHTML = datearray[i];
        cell3.innerHTML = datearray[i];
        cell4.innerHTML = inclusivedate;
        cell5.innerHTML =
            '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
    }

    $('#pickdate').datepicker('setDate', null);
});


 function  addLeave(from,to){
    var inclusivedate = $('#inclusivedate').val();
    var leavetype = $('#leavetype').val();
    var empno = $('#leaveempno').val();
    if (datefrom == '' || dateto == '' || leavetype == 'Select Leave' || empno == '') {
        post_notify("Please complete the information!", "danger");
    } else {
$.ajax({
   url:'ajaxcall/check_leave.php',
   data:{
    employeeNo:empno,
    leaveType:leavetype,
    dateFrom:from,
    dateTo:to
   },
   type:"POST",

}).done(function(e){
  

    if(e != ""){
        console.log(e);
     
         post_notify("This Application is already in the system!", "danger");
       
       
    }
    else{
        console.log(e);
        var table = document.getElementById("leavelist");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = leavetype;
        cell2.innerHTML = datefrom;
        cell3.innerHTML = dateto;
        cell4.innerHTML = inclusivedate;
        cell5.innerHTML =
            '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
    }


})
       
    }
}
// $('#specificdate').click(function () {
//     event.preventDefault();
//     var datefrom = $('#dtefrom').val();
//     var dateto = $('#dteto').val();
//     var inclusivedate = $('#inclusivedate').val();
//     var leavetype = $('#leavetype').val();
//     var empno = $('#leaveempno').val();
//     if (datefrom == '' || dateto == '' || leavetype == 'Select Leave'|| empno == '') {
//         post_notify("Please complete the information!", "danger");
//     } else {

//         var table = document.getElementById("leavelist");
//         var row = table.insertRow(1);
//         var cell1 = row.insertCell(0);
//         var cell2 = row.insertCell(1);
//         var cell3 = row.insertCell(2);
//         var cell4 = row.insertCell(3);
//         var cell5 = row.insertCell(4);
//         cell1.innerHTML = leavetype;
//         cell2.innerHTML = datefrom;
//         cell3.innerHTML = datefrom;
//         cell4.innerHTML = inclusivedate;
//         cell5.innerHTML =
//             '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
//     }
// })
$('#save_leave').on("click", function () {
    //fetch all the data from the table and save it to the database
    var workid = $('#leaveform').serializeArray();
    const success = '';
    event.preventDefault();
    var leave_array = [];
    var from_array = [];
    var to_array = [];
    var duration_array =[];
    var empno = $('#leaveempno').val();
    $('#leavelist tr').each(function (row, tr) {
        
     
        var leavetype = $(tr).find('td:eq(0)').text();
        var from = $(tr).find('td:eq(1)').text();
        var to = $(tr).find('td:eq(2)').text();
        var duration = $(tr).find('td:eq(3)').text();
        var newfrom = formatDate(from);
        var newto = formatDate(to);
        leave_array.push(leavetype);
        from_array.push(newfrom);
        to_array.push(newto);
        duration_array.push(duration);
    });
        $.ajax({
            url: 'ajaxcall/save_leave.php',
            type: 'POST',
            data: {
                empno: empno,
                leavetype: leave_array,
                from: from_array,
                to: to_array,
                duration: duration_array
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                    " c=" + c.responseText);
                // $('#save_notification').html(xhr.responseText);
                // notification(xhr.responseText, "","Refresh","success","success");
                // post_notify(xhr.responseText,"danger");
                // post_notify(xhr.responseText,'success');

            }
        }).done(function(response){
            var res = JSON.parse(response);
            if(res.status == 'success'){
            notification(res.message, "","Refresh","success","success");
        }else{
            swal({
                title: "Error!",
                text: res.message,
                icon: "error",
                button: "Ok"
            
            })
        }
        })


    //reset all the data inside the table;
    // post_notify(success, "success");
    // reset_form_input('travelform');
    // $("#travellist td").parent().remove();
    // post_notify("Record Inserted", "success");
});

function notification(title, message,text,value,status) {
swal(title, message, status, {
  buttons: {
    catch: {
      text: text,
      value: value,
    }

  },
})
.then((value) => {
  switch (value) {

    case "success":
      window.location.reload(true);
      break;
      case "error":

      break;

  }
});

}

//FORMAT THE DATE
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}
//display notification 
function post_notify(message, type) {

    if (type == 'success') {

        $.notify({
            message: message
        }, {
            type: 'success',
            delay: 2000
        });

    } else {

        $.notify({
            message: message
        }, {
            type: 'danger',
            delay: 2000
        });

    }

}





});

//reset the all the data inside the form
function reset_form_input(form_id) {
    $('#' + form_id).each(function () {
        this.reset();
    });
}

function deleteRow(r) {
    // DELETE SELECTED ROW
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("leavelist").deleteRow(i);
}