$(function() {
    $('.select2').select2();

$("#tblsearch tbody").on('click', '#select', function () {

    var currow = $(this).closest('tr');
    var col1 = currow.find('td:eq(0)').text();
    var col2 = currow.find('td:eq(1)').text();
    $('#leaveempno').val(col1);
    $('#fullname').html(col2);
});
$('#addleave').click(function () {
    event.preventDefault();
    var datefrom = $('#dtefrom').val();
    var dateto = $('#dteto').val();
    var inclusivedate = $('#inclusivedate').val();
    var leavetype = $('#leavetype').val();
    var empno = $('#leaveempno').val();
    if (datefrom == '' || dateto == '' || leavetype == 'Select Leave' || empno == '') {
        post_notify("Please complete the information!", "danger");
    } else {

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
            '<button id="remove" class = "btn btn-circle btn-sm btn-primary" id = "remove">Remove</button>';
    }
});

$('#specificdate').click(function () {
    event.preventDefault();
    var datefrom = $('#dtefrom').val();
    var dateto = $('#dteto').val();
    var inclusivedate = $('#inclusivedate').val();
    var leavetype = $('#leavetype').val();
    var empno = $('#leaveempno').val();
    if (datefrom == '' || dateto == '' || leavetype == 'Select Leave'|| empno == '') {
        post_notify("Please complete the information!", "danger");
    } else {

        var table = document.getElementById("leavelist");
        var row = table.insertRow(1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        cell1.innerHTML = leavetype;
        cell2.innerHTML = datefrom;
        cell3.innerHTML = datefrom;
        cell4.innerHTML = inclusivedate;
        cell5.innerHTML =
            '<button id="remove" class = "btn btn-circle btn-sm btn-primary" onclick = "deleteRow(this)">Remove</button>';
    }
})
$('#save_leave').on("click", function () {
    //fetch all the data from the table and save it to the database
    var workid = $('#leaveform').serializeArray();
    const success = '';
    event.preventDefault();
    $('#leavelist tr').each(function (row, tr) {
        var empno = $('#leaveempno').val();
        console.log(empno);
        var leavetype = $(tr).find('td:eq(0)').text();
        var from = $(tr).find('td:eq(1)').text();
        var to = $(tr).find('td:eq(2)').text();
        var duration = $(tr).find('td:eq(3)').text();
        var newfrom = formatDate(from);
        var newto = formatDate(to);
        $.ajax({
            url: 'ajaxcall/save_leave.php',
            type: 'POST',
            data: {
                empno: empno,
                leavetype: leavetype,
                from: newfrom,
                to: newto,
                duration: duration
            },
            error: function (xhr, b, c) {
                console.log("xhr=" + xhr.responseText + " b=" + b.responseText +
                    " c=" + c.responseText);
                // $('#save_notification').html(xhr.responseText);
                // notification(xhr.responseText, "","Refresh","success","success");
                // post_notify(xhr.responseText,"danger");
                // post_notify(xhr.responseText,'success');

            }
        }).done(function(message){
            notification(message, "","Refresh","success","success");
        })

    });
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