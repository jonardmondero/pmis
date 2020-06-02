$('#print').click(function(){
    var hiddenempno = $('#hiddenempno').val();
   // var datefrom = $('#dtefrom').datepicker({dateFormat: 'yy-mm-dd'}).val();
   // var dateto = $('#dteto').val();
   var month = $('#months').val();
   var year = $('#year').val();
   var period = $('#period').val();
   var finalmonth = '';
   if(month == 'January'){
     finalmonth ='01';
   }
   if(month == 'February'){
     finalmonth ='02';
   } 
   if(month == 'March'){
     finalmonth ='03';
   } 
   if(month == 'April'){
     finalmonth ='04';
   } 
   if(month == 'May'){
     finalmonth ='05';
   } 
   if(month == 'June'){
     finalmonth ='06';
   } 
   if(month == 'July'){
     finalmonth ='07';
   } 
   if(month == 'August'){
     finalmonth ='08';
   } 
   if(month == 'September'){
     finalmonth ='09';
   } 
   if(month == 'October'){
     finalmonth ='10';
   } 
   if(month == 'November'){
     finalmonth ='11';
   } 
   if(month == 'December'){
     finalmonth ='12';
   } 

   var param = "empno="+hiddenempno+"&year="+year+"-"+finalmonth+"-%";
   var secondhalf = "empno="+hiddenempno+"&year="+year+"-"+finalmonth+"";
   if(period == 'All Period'){
   $('#printlink').attr("href","../plugins/jasperreport/dtrreport.php?"+param,'_parent');
 } else if(period =='16-31'){
    $('#printlink').attr("href","../plugins/jasperreport/dtrreport2nd.php?"+secondhalf,'_parent');
 }
 else if(period =='1-15'){
    $('#printlink').attr("href","../plugins/jasperreport/dtrreport1st.php?"+secondhalf,'_parent');
 }
   })