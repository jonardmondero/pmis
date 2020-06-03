$("#findtable tbody").on("click", ".reflectlogs", function () {
  event.preventDefault();
  var currow = $(this).closest("tr");
  var insertstate = currow.find("td:eq(3)").text();
  var convert = "";
  if (insertstate == "Check In") {
    convert = "inAM";
  }
  if (insertstate == "Break Out") {
    convert = "outAM";
  }
  if (insertstate == "Break In") {
    convert = "inPM";
  }
  if (insertstate == "Check Out") {
    convert = "outPM";
  }
  if (insertstate == "Overtime In") {
    convert = "otIn";
  }
  if (insertstate == "Overtime Out") {
    convert = "otOut";
  }
  //   insertstate == "Check In" ? convert = "inAM":
  //   insertstate == "Break Out" ? convert = "outAM":
  //   insertstate == "Break In" ? convert = "inPM" :
  //   insertstate == "Check Out" ? convert = "outPM" :
  //   insertstate == "Overtime In" ? convert = "otIn" :
  //   insertstate == "Overtime Out" ? convert = "otOut" : null;
  console.log(convert);

  //   var row = table.insert(1);
  //   var cell1 = row.insertCell(0);

  //   var id = $(this).data("id");
  var empnum = $("#hiddenempno").val();
  var datefr = $("#dtefrom").val();
  var dateto = $("#dteto").val();

  var col1 = currow.find("td:eq(1)").text();
  var date = currow.find("td:eq(0)").text();
  $.ajax({
    url: "ajaxcall/addlogs.php",
    type: "POST",
    data: { id: date, empno: empnum, stateno: convert, time: col1 },
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
  loadDtr(empnum, datefr, dateto);
});
