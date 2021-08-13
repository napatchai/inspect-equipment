function showResult(result) {
    if (result == 0) {
        swal("Error", "Unit Name is has been used !!", "error");
    } else if (result == 1) {
        setTimeout(function () {
            swal({
                title: "Unit add Success",
                type: "success"
            }, function () {
                window.location = "./unitlist.php";
            });
        }, 1000);
    } else if (result == 2) {
        swal("Error", "Somethine warning", "error");
    } else if (result == 3){
        setTimeout(function () {
            swal({
                title: "Unit edit Success",
                type: "success"
            }, function(){
                window.location = "./unitlist.php"
            })
        })
    }
}

$(document).ready(function(){
    $('.edit-unit').click(function(){
        //get data from edit btn
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        //set value to model
        $('#unit_id').val(id);
        $('#unit_name').val(name);
    })
})