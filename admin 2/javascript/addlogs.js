$("#findtable tbody").on("click", ".reflectlogs", function () {
  event.preventDefault();
  var insertstate = $("#insert").val();
  var convert = 0;
  insertstate == "Check In" ? (convert = 1) : null;
  console.log(convert);
  var table = document.getElementById("dtr");
  alert("hello");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);

  cell1.innerHTML = empno;
});
