var date = "";
var datefr = "";
var dateto = "";


  $(document).ready(function() {
    $('.js-activated').dropdownHover().dropdown();
  });

$(function () {

  $('.helloWorld').click(function () {
    alert('hello world');
});
prettyPrint();




 //F1 KEYPRESS
$("#dtr tbody").on("keydown", "input", function (e) {
if(e.keyCode == 112){
  e.preventDefault();
  var currow = $(this).closest("tr");
  var getinput = $(this).closest("input").val();// get the current field
  var col1 = currow.find("td:eq(0)").text(); //date of the record
  const inMorningdisplay =  $(currow).find("td:eq(2) input[type='text']").val(); // get the value of the td
  $(currow).find("td:eq(2) input[type='text']").val(getinput);// destination of the record
  const empno = $("#hiddenempno").val();
  const field = "inAM";
  var cellIndex = $(this).closest("td")[0].cellIndex;
  console.log(cellIndex);
  $(this).val("");
  // let inputDate = [col1,getinput];
  // $(currow).find("td:eq(2) input[type='text']").change();
  // updateDTR(empno, col1, field, getinput);
  // $(this).change();
  // console.log(inputDate[0]);
  modifyDTR(col1,empno,cellIndex,getinput,"inAM");
  
}
 //F2 KEYPRESS
if(e.keyCode == 113){
  e.preventDefault();
  var currow = $(this).closest("tr");
  var getinput = $(this).closest("input").val();
  var col1 = currow.find("td:eq(0)").text();
  $(currow).find("td:eq(3) input[type='text']").val(getinput);
  var cellIndex = $(this).closest("td")[0].cellIndex; // Get cell index
  console.log(cellIndex);
  const field = "outAM";
  const empno = $("#hiddenempno").val();
  $(this).val("");
  // var focusedInput = $('input:focus');
  // console.log(focusedInput.val());
  // focusedInput.change();
  // updateDTR(empno, col1, field, getinput);
  // $(this).change();
  modifyDTR(col1,empno,cellIndex,getinput,"outAM");
}

 //F3 KEYPRESS
if(e.keyCode == 114){
  e.preventDefault();
  var currow = $(this).closest("tr");
  var getinput = $(this).closest("input").val();
  var col1 = currow.find("td:eq(0)").text();
  $(currow).find("td:eq(4) input[type='text']").val(getinput);
  var cellIndex = $(this).closest("td")[0].cellIndex; // Get cell index
  console.log(cellIndex);
  const field = "inPM";
  const empno = $("#hiddenempno").val();
  $(this).val("");
  // updateDTR(empno, col1, field, getinput);
  // $(this).change();
  modifyDTR(col1,empno,cellIndex,getinput,"inPM");

}

 //F4 KEYPRESS
if(e.keyCode == 115){
  e.preventDefault();
  var currow = $(this).closest("tr");
  var getinput = $(this).closest("input").val();
  var col1 = currow.find("td:eq(0)").text();
  $(currow).find("td:eq(5) input[type='text']").val(getinput);
  var cellIndex = $(this).closest("td")[0].cellIndex; // Get cell index
  console.log(cellIndex);
  const field = "outPM";
  const empno = $("#hiddenempno").val();
  $(this).val("");
  // updateDTR(empno, col1, field, getinput);
  // $(this).change();
  modifyDTR(col1,empno,cellIndex,getinput,"outPM");
}

 //F5 KEYPRESS
if(e.keyCode == 116){
  e.preventDefault();
  var currow = $(this).closest("tr");
  var getinput = $(this).closest("input").val();
  var col1 = currow.find("td:eq(0)").text();
  $(currow).find("td:eq(6) input[type='text']").val(getinput);
  var cellIndex = $(this).closest("td")[0].cellIndex; // Get cell index
  console.log(cellIndex);
  const field = "otIn";
  const empno = $("#hiddenempno").val();
  $(this).val("");
  // updateDTR(empno, col1, field, getinput);
  modifyDTR(col1,empno,cellIndex,getinput,"otIn");
  // $(this).change();



}

if(e.keyCode == 117){
  e.preventDefault();
  var currow = $(this).closest("tr");
  var getinput = $(this).closest("input").val();
  var col1 = currow.find("td:eq(0)").text();
  $(currow).find("td:eq(7) input[type='text']").val(getinput);
  var cellIndex = $(this).closest("td")[0].cellIndex; // Get cell index
  console.log(cellIndex);
  const field = "otOut";
  const empno = $("#hiddenempno").val();
  $(this).val("");
  // updateDTR(empno, col1, field, getinput);
  modifyDTR(col1,empno,cellIndex,getinput,"otOut");
  // $(this).change();
}

if(e.keyCode == 119){
  e.preventDefault();

  const empno = $("#hiddenempno").val();

  loadDtr(empno, datefr, dateto);
}

})
  $("#deptId").select2({
    theme:'bootstrap4'
  });

  var employee_field = $("#employee_field").val();
  var deptId = $("#deptId").val();
  var empstatus = $("#emp_status").val();
  // $('#body').load("get_employee_department.php",{
  //   dept:deptId,
  //   empstatus:empstatus
  getEmployees(employee_field,deptId, empstatus);

  // DATE RANGE PICKER
  $('input[name="daterange"]').daterangepicker(
    {
      opens: "left",
    },
    function (start, end, label) {
      datefr = start.format("YYYY-MM-DD");
      dateto = end.format("YYYY-MM-DD");
      console.log(
        "A new date selection was made: " +
          start.format("YYYY-MM-DD") +
          " to " +
          end.format("YYYY-MM-DD")
      );
    }
  );
});

function getEmployees(name, dept, status) {
  console.log(`name : ${name}, dept : ${dept}, status : ${status}`)
  var dataTable = $("#employees").DataTable({
    select: true,
    destroy: true,
    stateSave: true,
    processing: true,
    serverSide: true,
    scrollX: false,
    ajax: {
      dataType: "JSON",
      url: "ajaxcall/get_employee_department.php",
      type: "POST",
      data: function (d) {
        (d.department = dept),
        (d.name = name), 
        (d.empstatus = status)
      },
      error: function (xhr, b, c) {
        console.log(
          "xhr=" +
            xhr.responseText +
            " b=" +
            b.responseText +
            " c=" +
            c.responseText
        );
      },
    },
  });
}

$("#deptId").change(function () {
  var deptId = $("#deptId").val();
  var employee_field = $("#employee_field").val();
  var empstatus = $("#emp_status").val();
  
  $("#hiddendeptid").val(deptId);
  getEmployees(employee_field, deptId, empstatus);
});
$("#employee_field").keyup(function () {
  var deptId = $("#deptId").val();
  var employee_field = $("#employee_field").val();
  var empstatus = $("#emp_status").val();
  
  getEmployees(employee_field, deptId, empstatus);
});

$("#emp_status").change(function () {
  var deptId = $("#deptId").val();
  var employee_field = $("#employee_field").val();

  var empstatus = $("#emp_status").val();
  getEmployees(employee_field, deptId, empstatus);
});

function loadDtr(empnum, datefr, dateto) {
  $("#dtrbody").load(
    "ajaxcall/frm_dtr.php",
    {
      employeeno: empnum,
      dtfr: datefr,
      dtto: dateto,
    },
    function (response, status, xhr) {
      if (status == "error") {
        alert(msg + xhr.status + " " + xhr.statusText);
        console.log(msg + xhr.status + " " + xhr.statusText);
      }
    }
  );
}
// SELECT THE EMPLOYEE NUMBER OF THE EMPLOYEE TABLE
var table = document.getElementsByTagName("table")[0];
var tbody = table.getElementsByTagName("tbody")[0];

tbody.onclick = function (e) {
  e = e || window.event;
  var empno = [];
  var fullname = [];
  var target = e.srcElement || e.target;
  while (target && target.nodeName !== "TR") {
    target = target.parentNode;
  }
  if (target) {
    var cells = target.getElementsByTagName("td");

    empno.push(cells[0].innerHTML);
    fullname.push(cells[1].innerHTML);
    var empnum = empno.toString();
    var fullname2 = fullname.toString();
    $("#hiddenempno").val(empnum);
    $("#full-name").html(fullname2);
    $("#emp_name").html(fullname2);
    loadDtr(empnum, datefr, dateto);
  }
};

function post_notify(message, type) {
  if (type == "success") {
    $.notify(
      {
        message: message,
      },
      {
        type: "success",
        delay: 2000,
      }
    );
  } else {
    $.notify(
      {
        message: message,
      },
      {
        type: "danger",
        delay: 2000,
      }
    );
  }
}
$("#dtr tbody").on("keyup", ".tr", function () {
  //UPDATE THE DTR WHEN THE USER CHANGES THE DATA.
  event.preventDefault();

  var currow = $(this).closest("tr");
  var col1 = currow.find("td:eq(0)").text();
  date = col1;
});


function updateInAm(value) {
  const field = "inAM";
  const empno = $("#hiddenempno").val();

  updateDTR(empno, date, field, value);
}

function updateOutAm(value) {
  const field = "outAM";
  const empno = $("#hiddenempno").val();

  updateDTR(empno, date, field, value);
}

function updateInPm(value) {
  const field = "inPM";
  const empno = $("#hiddenempno").val();

  updateDTR(empno, date, field, value);
}

function updateOutPm(value) {
  const field = "outPM";
  const empno = $("#hiddenempno").val();

  updateDTR(empno, date, field, value);
}

function updateOtIn(value) {
  const field = "otIn";
  const empno = $("#hiddenempno").val();

  updateDTR(empno, date, field, value);
}

function updateOtOut(value) {
  const field = "otOut";
  const empno = $("#hiddenempno").val();

  updateDTR(empno, date, field, value);
}

function updateLate(value) {
  const field = "late";
  const empno = $("#hiddenempno").val();

  updateLateUT(empno, date, field, value);
}

function updateUndertime(value) {
  const field = "undertime";
  const empno = $("#hiddenempno").val();

  updateLateUT(empno, date, field, value);
}

 async function updateDTR(empno, date, field, value) {
  await $.ajax({
    url: "ajaxcall/update_dtr.php",
    type: "POST",
    data: {
      empno: empno,
      dateofupdate: date,
      field: field,
      value: value,
    },
    dataType: "json",
    error: function (xhr, b, c) {
      console.log(
        "xhr=" +
          xhr.responseText +
          " b=" +
          b.responseText +
          " c=" +
          c.responseText
      );
    },
  });
}

 function updateLateUT(empno, date, field, value) {
   $.ajax({
    url: "ajaxcall/updateLateUT.php",
    type: "POST",
    data: {
      empno: empno,
      dateofupdate: date,
      field: field,
      value: value,
    },
    dataType: "json",
    // success:post_notify('Successfully saved', 'success'),
    error: function (xhr, b, c) {
      console.log(
        "xhr=" +
          xhr.responseText +
          " b=" +
          b.responseText +
          " c=" +
          c.responseText
      );
    },
  });
}
//SHOW THE LOGS THAT IN THE BIOMETRIC DATABASE
$(document).ready(function () {
  $("#dtr tbody").on("click", ".addlogs", function () {
    event.preventDefault();
    $("#edit-dtr").modal("show");
    var id = $(this).data("id");
    var empnum = $("#hiddenempno").val();
    //date column on dtr
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();
    $("#edit-dtr tr").remove();
    $("#empdate").html(col1);
    $("#findlogs").load(
      "ajaxcall/loadlogs.php",
      {
        empno: empnum,
        date: col1,
      },
      function (response, status, xhr) {
        if (status == "error") {
          alert(msg + xhr.status + " " + xhr.statusText);
          console.log(msg + xhr.status + " " + xhr.statusText);
        }
      }
    );
  });

  $("#dtr tbody").on("click", ".col", function () {
    event.preventDefault();
  });
  //REMOVE THE LATE
  $("#dtr tbody").on("click", ".removelate", function () {
    var late = "removelate";
    event.preventDefault();
    var empnum = $("#hiddenempno").val();
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();

    $.ajax({
      url: "ajaxcall/remove_late.php",
      type: "POST",
      data: {
        empno: empnum,
        dateFrom: datefr,
        dateTo: dateto,
        opt: late,
      },
      error: function (xhr, b, c) {
        console.log(
          "xhr=" +
            xhr.responseText +
            " b=" +
            b.responseText +
            " c=" +
            c.responseText
        );
      },
    }).done(function () {
      $("#hiddenempno").val(empnum);
      loadDtr(empnum, datefr, dateto);
    });
  });
  //REMOVE THE UNDERTIME
  $("#dtr tbody").on("click", ".removeundertime",async function () {
    var late = "removeundertime";
    event.preventDefault();
    var empnum = $("#hiddenempno").val();
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();

   await $.ajax({
      url: "ajaxcall/remove_late.php",
      type: "POST",
      data: {
        empno: empnum,
        dateFrom: datefr,
        dateTo: dateto,
        opt: late,
      },
      error: function (xhr, b, c) {
        console.log(
          "xhr=" +
            xhr.responseText +
            " b=" +
            b.responseText +
            " c=" +
            c.responseText
        );
      },
    }).done(function () {
      $("#hiddenempno").val(empnum);
      loadDtr(empnum, datefr, dateto);
    });
  });
  //REMOVE THE LATE AND UNDERTIME
  $("#dtr tbody").on("click", ".removelateundertime", function () {
    var late = "removelateundertime";
    event.preventDefault();
    var empnum = $("#hiddenempno").val();
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();

    $.ajax({
      url: "ajaxcall/remove_late.php",
      type: "POST",
      data: {
        empno: empnum,
        dateFrom: datefr,
        dateTo: dateto,
        opt: late,
      },
      error: function (xhr, b, c) {
        console.log(
          "xhr=" +
            xhr.responseText +
            " b=" +
            b.responseText +
            " c=" +
            c.responseText
        );
      },
    }).done(function () {
      $("#hiddenempno").val(empnum);
      loadDtr(empnum, datefr, dateto);
    });
  });
  //removes the day off
  $("#dtr tbody").on("click", ".removedayoff", function () {
    var late = "removedayoff";
    console.log(late);
    event.preventDefault();
    var empnum = $("#hiddenempno").val();
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();

    $.ajax({
      url: "ajaxcall/remove_late.php",
      type: "POST",
      data: {
        empno: empnum,
        dateFrom: datefr,
        dateTo: dateto,
        opt: late,
      },
      error: function (xhr, b, c) {
        console.log(
          "xhr=" +
            xhr.responseText +
            " b=" +
            b.responseText +
            " c=" +
            c.responseText
        );
      },
    }).done(function () {
      $("#hiddenempno").val(empnum);
      loadDtr(empnum, datefr, dateto);
    });
  });
});
$(document).keypress(function (event) {
  var keycode = event.keyCode ? event.keyCode : event.which;
  if (keycode == "13") {
    return false;
  }
});
//REFLECT THE BIOMETRIC LOGS IN THE COLUMN
$("#findtable tbody").on("change", "#insert_record", function (e) {
  e.preventDefault();
  var currow = $(this).closest("tr");
  var insertstate = currow.find("select").val();
  var convert = "";
  if (insertstate == "Check In") {
    convert = "inAM";
  } else if (insertstate == "Break Out") {
    convert = "outAM";
  } else if (insertstate == "Break In") {
    convert = "inPM";
  } else if (insertstate == "Check Out") {
    convert = "outPM";
  } else if (insertstate == "Overtime In") {
    convert = "otIn";
  } else if (insertstate == "Overtime Out") {
    convert = "otOut";
  }
  console.log("reflect logs");
  var empnum = $("#hiddenempno").val();
  var col1 = currow.find("td:eq(3)").text();
  var date = currow.find("td:eq(0)").text();
  $.ajax({
    url: "ajaxcall/addlogs.php",
    type: "POST",
    data: { id: date, empno: empnum, stateno: convert, time: col1 },
    error: function (xhr, b, c) {
      console.log(
        "xhr=" +
          xhr.responseText +
          " b=" +
          b.responseText +
          " c=" +
          c.responseText
      );
    },
  }).done(function () {
    post_notify("Record Inserted", "success");
    loadDtr(empnum, datefr, dateto);
  });
});
//RECOMPUTE LATE AND UNDERTIME
$("#dtr tbody").on("click", ".recompute", async function () {
  event.preventDefault();
  var empnum = $("#hiddenempno").val();
  var currow = $(this).closest("tr");
  var col1 = currow.find("td:eq(0)").text();
  var col2 = $(currow).find("td:eq(2) input[type='text']").val();
  var col3 = $(currow).find("td:eq(3) input[type='text']").val();
  var col4 = $(currow).find("td:eq(4) input[type='text']").val();
  var col5 = $(currow).find("td:eq(5) input[type='text']").val();
  console.log(col2, col3, col4, col5);
 await $.ajax({
    url: "ajaxcall/recompute.php",
    type: "POST",
    data: {
      empno: empnum,
      date: col1,
      inAM: col2,
      outAM: col3,
      inPM: col4,
      outPM: col5,
    },
    error: function (xhr, b, c) {
      console.log(
        "xhr=" +
          xhr.responseText +
          " b=" +
          b.responseText +
          " c=" +
          c.responseText
      );
    },
  }).done(function (e) {
    $("#hiddenempno").val(empnum);
    loadDtr(empnum, datefr, dateto);
  });
});

$("#editEmployee").on("click",function() {
  //SHOWS THE ADD EMPLOYEE MODAL AND DISPLAY THE EMPLOYEE'S INFORMATION
  event.preventDefault();
  $(".modal-title").html("Edit Employee");
  $("#addemployee").modal("show");
  $("#insert").prop("hidden", true);
  $("#update").prop("hidden", false);
  $("#delete").prop("hidden", false);
  $("#empnum").prop("readonly", true);
  const empno = $("#hiddenempno").val();
  $.ajax({
    url: "ajaxcall/get_employee.php",
    type: "POST",
    data: {
      id: empno,
    },
    success: function (response) {
      var result = jQuery.parseJSON(response);
      $("#empnum").val(result.employeeno);
      $("#lname").val(result.lastname);
      $("#fname").val(result.firstname);
      $("#mname").val(result.middlename);
      $("#bioid").val(result.bioid);
      $("#department").val(result.department);
      $(`#department option[value='${result.department}']`).prop(
        "selected",
        true
      );
      $("#estatus").val(result.employmentstatus);
      $("#supervisor").val(result.supervisor);
      $("#status").val(result.status);
      $("#worksched").val(result.worksched);
      $("#emp_sched").val(result.workId);
      $(`#emp_sched option[value='${result.workDesc}']`).prop(
        "selected",
        true
      );

      $("#emp_sched").select2({
        theme:'bootstrap4',
        dropdownParent: $("#addemployee"),
      });
      $("#department").select2({
        theme:'bootstrap4',

        dropdownParent: $("#addemployee"),
      });
      console.log(result.department);
      console.log(result.workId);
    },
    error: function (xhr, b, c) {
      console.log(
        "xhr=" +
          xhr.responseText +
          " b=" +
          b.responseText +
          " c=" +
          c.responseText
      );
    },
  });
});
$("#update").on("click",function(){
event.preventDefault();
var employeeNumber = $("#empnum").val();
var lastName  = $("lname").val();
var firstName = $("#fname").val();
var middlename = $('#mname').val();
var biometricpin  = $("#bioid").val();
var department = $('#department').val();
var estatus = $('#e').val();
var department = $('#department').val();


var userdata = $('#addEmployeeForm').serializeArray();
var dataObj = {};
$(userdata).each(function(i, field){
  dataObj[field.name] = field.value;
});


userdata.push({name : 'updateemp', value : 'submit'});
console.log(userdata);
$.ajax({
  url: "sql/save_employee.php",
  type: "POST",
  data:$.param(userdata),
  error: function (xhr, b, c) {
    console.log(
      "xhr=" +
        xhr.responseText +
        " b=" +
        b.responseText +
        " c=" +
        c.responseText
    );
  },
}).done(function (e) {
  console.log(e);
  $("#addemployee").modal("hide");
  var employee_field = $("#employee_field").val();
  var deptId = $("#deptId").val();
  var empstatus = $("#emp_status").val();
  post_notify("Employee information is updated", "success");
  getEmployees(employee_field,deptId, empstatus);

});
})
//REFLECT THE OB
$("#dtr tbody").on("click", ".reflectob", function () {

  var empno = $('#hiddenempno').val();
  event.preventDefault();
  $.ajax({
  url:'sql/reflect_all_ob.php',
  type:'POST',
  data:{
    empno:empno,
    dtefrom:datefr,
    dteto:dateto,
    status:'PENDING'
  },
  error:function (xhr, b, c) {     
       console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
         }
  
  }).done(function(e){

    post_notify('Succesfully reflected!', 'success');
    loadDtr(empno, datefr, dateto);
  })
  
  })

  $("#dtr tbody").on("click", ".reflectleave", function () {

    var empno = $('#hiddenempno').val();
    event.preventDefault();
    $.ajax({
    url:'sql/reflect_all_leave.php',
    type:'POST',
    data:{
      empno:empno,
      dtefrom:datefr,
      dteto:dateto,
      status:'PENDING'
    },
    error:function (xhr, b, c) {     
         console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
           }
    
    }).done(function(e){
      console.log(e);
      post_notify('Succesfully reflected!', 'success');
      loadDtr(empno, datefr, dateto);
    })
    
    })


    $("#dtr tbody").on("click", ".copydata", function (e) {
      e.preventDefault();
      var empno = $('#hiddenempno').val();
      var currow = $(this).closest("tr");
      var col1 = currow.find("td:eq(0)").text();
      var col2 = $(currow).find("td:eq(2) input[type='text']").val();
      var col3 = $(currow).find("td:eq(3) input[type='text']").val();
      var col4 = $(currow).find("td:eq(4) input[type='text']").val();
      var col5 = $(currow).find("td:eq(5) input[type='text']").val();

      let copiedData = [col1, col2, col3, col4, col5].join('\t');
      navigator.clipboard.writeText(copiedData).then(function() {
        post_notify("Data has ben copied", "success");
        loadDtr(empno, datefr, dateto);
      }).catch(function(err) {
        alert('Could not copy text to clipboard', err);
      });

      
      })


      function allowDrop(event) {
        event.preventDefault(); // Prevent default to allow drop
    }
    
    function drop(event) {
        event.preventDefault();
        var data = event.dataTransfer.getData('text/plain');
        event.target.value = data;
        console.log(data);
        updateOutPm(data); // Call your function after the drop
    }


    function copyName(){
      var fullname = $("#full-name").text();
      navigator.clipboard.writeText(fullname).then(function() {
        post_notify("Full name has been copied", "success");
      }).catch(function(err) {
        alert('Could not copy text to clipboard', err);
      });
    }

    function modifyDTR(date,empno,index,second_value,destination){ 
     let origin  = "";
     switch(index) {
      case 2:
         origin = "inAM";
          break;
      case 3:
        origin = "outAM";
          break;
      case 4:
        origin = "inPM";
            break;
      case 5:
        origin = "outPM";
              break;
      case 6:
        origin= "otIn";
                break;
        case 7:
        origin = "otOut";
                  break;
      default:
          console.log('Default case', second_value);
  }
  $.ajax({
    url:"ajaxcall/modify_dtr.php",
    type:"POST",
    data:{
      empno:empno,
      date:date,
      origin:origin,
      second_value:second_value,
      destination:destination
    },
    error:function (xhr, b, c) {     
         console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
           }
  }).done(function(e){
    // post_notify('Succesfully updated!', 'success');
  })
      // console.log(origin,second_value,destination);
    }

    $("#dtr tbody").on("click", ".addco", function (e) {
      
      e.preventDefault();
    
    var empno = $('#hiddenempno').val();
    var currow = $(this).closest("tr");
    var col1 = currow.find("td:eq(0)").text();
    var col2 = $(currow).find("td:eq(2) input[type='text']").val();
      var col3 = $(currow).find("td:eq(3) input[type='text']").val();
      var col4 = $(currow).find("td:eq(4) input[type='text']").val();
      var col5 = $(currow).find("td:eq(5) input[type='text']").val();
      var col6 = $(currow).find("td:eq(6) input[type='text']").val();
      var col7 = $(currow).find("td:eq(7) input[type='text']").val();


    let data = [
      {
       empno:empno,
       date:col1,
       inAM:col2,
       outAM:col3,
       inPM:col4,
       outPM:col5,
       otIn:col6,
        otOut:col7
 
      }
    
     ];

//add sweet alert with confirmation
Swal.fire({
  title: "Do you want to add this to CDO?",
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: "Save",
  denyButtonText: `Don't save`
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    // Swal.fire("Saved!", "", "success");
    
    saveCompensatory(data);
  } else if (result.isDenied) {
    Swal.fire("Changes are not saved", "", "info");
  }
});
    
   
    });

    function saveCompensatory(data){
     $.ajax({
      url:"ajaxcall/save_compensatory.php",
      data:{data:JSON.stringify(data)},
      type:"POST",
      error:function (xhr, b, c) {     
           console.log("xhr=" + xhr.responseText + " b=" + b.responseText + " c=" + c.responseText);
             }

     }).done(function(e){
      if(e === "exist"){
        post_notify('This Compensatory is already exist.', 'danger');
        return;
      }
      post_notify('You have successfully added new compensatory day off.', 'success');
      
     });
    }
