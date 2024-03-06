<style>
.dtr-input-size {
    width: 95px;
    height: 30px;
}

.dtr-input-size-sm {
    height: 30px;
    width: 60px;
}
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 8px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}



.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<?php 
  ob_start();
  include './printpdf/WebClientPrint.php';
  use Neodynamic\SDK\Web\WebClientPrint;
  use Neodynamic\SDK\Web\Utils;

?>
<div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card bg-none  border border-secondary shadow-none">

        <div class="card-body ">
            <div class="row  ">
                <div class="col-5 input-group ">


                    <span class="input-group-text ">
                        <label>DATE FILTER: </label>

                    </span>
                    <input style="margin-right:10px;font-size:14px" type="text" class="form-control text-sm text-center"
                        autocomplete="off" name="daterange" id="dtefrom" value="<?php echo $dteFrom;?>">



                    <!-- <button class="btn btn-primary float-right" type="button" data-toggle="collapse"
                        data-target="#printDtr" aria-expanded="false" aria-controls="multiCollapseExample2"><i
                            class="fa fa-print"></i>
                    </button> -->

                    <button class="btn bg-dark float-right" style="margin-left:5px" type="button"
                        id="editEmployee" aria-expanded="false"><i class="fa fa-edit"></i>
                    </button>

                </div>
                <div class="col-7 m-0">
                    <?php include ('modal/print_modal.php');?>
                </div>
                            <div class="row float-right mt-1 ml-2">
                                <div class="checkbox" hidden>
                                        <label>
                                            <input type="checkbox" id="useDefaultPrinter" />
                                            <strong>Print to Default printer</strong> or...
                                        </label>
                                    </div>
                                    <div id="loadPrinters">
                                        
                                     
                                        <a onclick="javascript:jsWebClientPrint.getPrinters();" class="btn btn-success text-white text-bold  ">Load installed printers...</a>
                                        
                                    </div>  
                                    <div id="installedPrinters" style="visibility: hidden">
                                        
                                        <select name="installedPrinterName" id="installedPrinterName" class="form-control"></select>
                                    </div>
                                    <a class="btn btn-info btn-sm text-bold ml-3 text-white items-center border  border-3 border-dark " onclick="directPrint();">QUICK PRINT</a>
                                    <div id="fileToPrint" hidden>
                                        <label for="ddlFileType">Select a sample File to print:</label>
                                        <select id="ddlFileType" class="form-control">
                                            <option>PDF</option>
                                            <option>TXT</option>
                                            <option>DOC</option>
                                            <option>XLS</option>
                                            <option>JPG</option>
                                            <option>PNG</option>
                                            <option>TIF</option>
                                        </select>
                                        <br />
                                      
                                    </div>
                              </div>
            </div>

        </div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card full_name m-2 shadow-none  bg-dark">
       <div class="d-flex justify-content-center align-items-center">
        <h4 value = "" class="text-bold text-white" id="full-name"> </h4> <button class="bg-dark btn-sm ml-3 border-0" onclick="copyName();"><i class = "fa fa-copy"></i></button>
        </div>
      
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card m-2 shadow-none border border-secondary bg-white " >
        <div class="card-body">

            <form role="form" method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">
                <div class="row mt-2" >

                    <div class=" offset-3 col-6" style="background-color:white-grey;">


                        <input type="hidden" readonly id="hiddenempno" name="hiddenempno"
                            value="<?php echo $hidden;?>">
                        <input type="hidden" readonly id="hiddendeptid" name="hiddendeptid" value="">

                    </div>

                </div>

                <div class="row col-lg-12 col-md-12 col-sm-12">

                    <div class="m-auto  ">
                        <table id="dtr" class="form__table table-bordered table-hover bg-white">
                            <thead class="text_align">

                                <th class="border border-dark ">Date </th>
                                <th class="border border-dark">Day</th>
                                <th class="border border-dark">Check In</th>
                                <th class="border border-dark">Break Out</th>
                                <th class="border border-dark">Break In</th>
                                <th class="border border-dark">Check Out</th>
                                <th class="border border-dark">OT In</th>
                                <th class="border border-dark">OT Out</th>
                                <th class="border border-dark">Late</th>
                                <th class="border border-dark">UT</th>
                                <th class="border border-dark">Options</th>

                            </thead>
                            <tbody id="dtrbody">
                            </tbody>
                        </table>


                    </div>
                    
                </div>
                
            </form>
                                 
                       

                                    
                                    
                                    <!-- <a class="btn btn-success btn-lg" onclick="javascript:jsWebClientPrint.print('useDefaultPrinter=' + $('#useDefaultPrinter').attr('checked') + '&printerName=' + encodeURIComponent($('#installedPrinterName').val()) + '&filetype=' + $('#ifPreview').val());">Print File...</a> -->
                                    <script type="text/javascript">
                                        //var wcppGetPrintersDelay_ms = 0;
                                        var wcppGetPrintersTimeout_ms = 60000; //60 sec
                                        var wcppGetPrintersTimeoutStep_ms = 500; //0.5 sec
                                        function wcpGetPrintersOnSuccess() {
                                            // Display client installed printers
                                            if (arguments[0].length > 0) {
                                                var p = arguments[0].split("|");
                                                var options = '';
                                                for (var i = 0; i < p.length; i++) {
                                                    options += '<option>' + p[i] + '</option>';
                                                }
                                                $('#installedPrinters').css('visibility', 'visible');
                                                $('#installedPrinterName').html(options);
                                                $('#installedPrinterName').focus();
                                                $('#loadPrinters').hide();
                                            } else {
                                                alert("No printers are installed in your system.");
                                            }
                                        }
                                        function wcpGetPrintersOnFailure() {
                                            // Do something if printers cannot be got from the client
                                            alert("No printers are installed in your system.");
                                        }
                                    </script>
                <!-- <iframe id="ifPreview" style="width: 100%; height: 500px;" frameborder="0" src="http://localhost/PMIS/plugins/jasperreport/dtrreport.php?empno=10204480&year=2023-06-%&days=30"></iframe> -->
        </div>


          
    </div>
    </div>
</div>

<?php
  
    //Get Absolute URL of this page
    $currentAbsoluteURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $currentAbsoluteURL .= $_SERVER["SERVER_NAME"];
    if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
    {
        $currentAbsoluteURL .= ":".$_SERVER["SERVER_PORT"];
    } 
    $currentAbsoluteURL .= $_SERVER["REQUEST_URI"];
    
    //WebClientPrinController.php is at the same page level as WebClientPrint.php
    $webClientPrintControllerAbsoluteURL = substr($currentAbsoluteURL, 0, strrpos($currentAbsoluteURL, '/')).'./printpdf/WebClientPrintController.php';
    
    //DemoPrintFilePDFController.php is at the same page level as WebClientPrint.php
    $demoPrintFilePDFControllerAbsoluteURL = substr($currentAbsoluteURL, 0, strrpos($currentAbsoluteURL, '/')).'./printpdf/DemoPrintFileController.php';
    
    //Specify the ABSOLUTE URL to the WebClientPrintController.php and to the file that will create the ClientPrintJob object
    echo WebClientPrint::createScript($webClientPrintControllerAbsoluteURL, $demoPrintFilePDFControllerAbsoluteURL, session_id());
?>
<script type="text/javascript">
   
    // $("#ddlFileType").change(function () {
    //     var s = $("#ddlFileType option:selected").text();
    //     if (s == 'PDF') $("#ifPreview").attr("src", "//docs.google.com/gview?url=http://webclientprintphp.azurewebsites.net/files/LoremIpsum.pdf&embedded=true");
    //     if (s == 'TXT') $("#ifPreview").attr("src", "//docs.google.com/gview?url=http://webclientprintphp.azurewebsites.net/files/LoremIpsum.txt&embedded=true");
    //     if (s == 'TIF') $("#ifPreview").attr("src", "//docs.google.com/gview?url=http://webclientprintphp.azurewebsites.net/files/patent2pages.tif&embedded=true");
    //     if (s == 'XLS') $("#ifPreview").attr("src", "//docs.google.com/gview?url=http://webclientprintphp.azurewebsites.net/files/SampleSheet.xls&embedded=true");
    //     if (s == 'DOC') $("#ifPreview").attr("src", "//docs.google.com/gview?url=http://webclientprintphp.azurewebsites.net/files/LoremIpsum.doc&embedded=true");
    //     if (s == 'JPG') $("#ifPreview").attr("src", "//webclientprintphp.azurewebsites.net/files/penguins300dpi.jpg");
    //     if (s == 'PNG') $("#ifPreview").attr("src", "//webclientprintphp.azurewebsites.net/files/SamplePngImage.png");

    //     console.log($("#ifPreview").val());
    // }).change();

    function directPrint(){

        jsWebClientPrint.print('useDefaultPrinter=' + $('#useDefaultPrinter').attr('checked') + '&printerName=' + encodeURIComponent($('#installedPrinterName').val()) + '&filetype=PDF' + printLink()  );
    }


   function printLink(){
    var printLink ;
    var hiddenempno = $("#hiddenempno").val();
  // var datefrom = $('#dtefrom').datepicker({dateFormat: 'yy-mm-dd'}).val();
  // var dateto = $('#dteto').val();
  var month = $("#months").val();
  var year = $("#year").val();
  var period = $("#period").val();
  var finalmonth = "";
  var daysinmonth = "";
  if (month == "January") {
    finalmonth = "01";
  }
  if (month == "February") {
    finalmonth = "02";
  }
  if (month == "March") {
    finalmonth = "03";
  }
  if (month == "April") {
    finalmonth = "04";
  }
  if (month == "May") {
    finalmonth = "05";
  }
  if (month == "June") {
    finalmonth = "06";
  }
  if (month == "July") {
    finalmonth = "07";
  }
  if (month == "August") {
    finalmonth = "08";
  }
  if (month == "September") {
    finalmonth = "09";
  }
  if (month == "October") {
    finalmonth = "10";
  }
  if (month == "November") {
    finalmonth = "11";
  }
  if (month == "December") {
    finalmonth = "12";
  }

  //  console.log(getDaysInMonth(finalmonth,year));
  var param =
    "&period=1"+
    "&empno=" +
    hiddenempno +
    "&year=" +
    year +
    "-" +
    finalmonth +
    "-%" +
    "&days=" +
    getDaysInMonth(finalmonth, year);
    var firsthalf =
  "&period=2"+  "&empno=" + hiddenempno + "&year=" + year + "-" + finalmonth + "";
  var secondhalf =
  "&period=3"+  "&empno=" + hiddenempno + "&year=" + year + "-" + finalmonth + "";
  
  if (period == "All Period") {
 
     printLink =  param;
    
    //  $('#printlink').attr("href","../plugins/jasperreport/report3X3.php?"+param,'_parent');
  } else if (period == "16-31") {
  
   
      printLink =  secondhalf;

  } else if (period == "1-15") {
  
    
      printLink = firsthalf;
    
  }
  return printLink;
   }

   var getDaysInMonth = function (month, year) {
    // Here January is 1 based
    //Day 0 is the last day in the previous month
    return new Date(year, month, 0).getDate();
    // Here January is 0 based
    // return new Date(year, month+1, 0).getDate();
  };

</script>