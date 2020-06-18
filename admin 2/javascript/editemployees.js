$('#tableemp tbody').on('keyup','.tr',function(){
    var currow=  $(this).closest('tr');
    
    $.ajax({

        url:'ajaxcall/update_dtr.php',
        type:'POST',
        data:{}
    })
});