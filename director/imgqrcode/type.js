function showResult(result){
    if(result == 0){
        swal("Error", "Type Id is has been used !!", "error");
    }else if(result == 1){
        swal("Error", "Type Name is has been used !!", "error");
    }else if(result == 2){
        setTimeout(function () {
            swal({
                title: "Type add Success",
                type: "success"
            }, function(){
                window.location = "./typelist.php"
            })
        })
    }else if(result == 3){
        swal("Error", "Somethine warning", "error");
    }else if(result == 4){
        setTimeout(function () {
            swal({
                title: "Type edit Success",
                type: "success"
            }, function(){
                window.location = "./typelist.php"
            })
        })
    }
}

$(document).ready(function(){
    $('.edit-type').click(function(){
        var name = $(this).attr('data-name');
        var id = $(this).attr('data-id');
        $('#type_id').val(id);
        $('#type_id1').val(id);
        $('#type_name').val(name);
        $('#type_name1').val(name);
    })
})