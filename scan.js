DWTQR("mycanvas");
$("#btnscan").click(function(){
    dwStartScan();
    $("#datainput").val('' );
});
function dwQRReader( data ){
    // alert(data);
    $("#datainput").val( data );

}