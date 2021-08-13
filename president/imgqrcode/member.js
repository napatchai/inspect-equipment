function showResult(result) {
    if (result == 0) {
        swal("Error", "password and confirm-password are not match !!", "error");
    } else if (result == 1) {
        swal("", "Username นี้ถูกใช้แล้ว !!", "error");
    } else if (result == 2) {
        setTimeout(function () {
            swal({
                title: "Personnel add Success",
                type: "success"
            }, function () {
                window.location = "./memberlist.php";
            });
        }, 1000);
    } else if (result == 3) {
        setTimeout(function () {
            swal({
                title: "Personnel Edit Success",
                type: "success"
            }, function () {
                window.location = "./memberlist.php";
            });
        }, 1000);
    } else if (result == 4) {
        swal("", "Something warning !!", "error");
    } else if (result == 5) {
        setTimeout(function () {
            swal({
                title: "Personnel delete Success",
                type: "success"
            }, function () {
                window.location = "./memberlist.php";
            });
        }, 1000);
    }
}
$(document).ready(function () {
    $('#edit-personnel').click(function () {
        //get data from edit btn
        var id = $(this).attr('data-id');
        var firstname = $(this).attr('data-firstname');
        var lastname = $(this).attr('data-lastname');
        var level = $(this).attr('data-level');
        var username = $(this).attr('data-username');
        //set value to model
        $('#per_id').val(id);
        $('#firstname').val(firstname);
        $('#lastname').val(lastname);
        $('#username').val(username);
        $('#username1').val(username);
        if (level == 'p') {
            document.getElementById("p").selected = "true";
            document.getElementById("p").style.display = "block";
            document.getElementById("d").style.display = "block";
            document.getElementById("a").style.display = "none";
        } else if (level == 'd') {
            document.getElementById("d").selected = "true";
            document.getElementById("p").style.display = "block";
            document.getElementById("d").style.display = "block";
            document.getElementById("a").style.display = "none";
        } else if (level == 'a') {
            document.getElementById("a").style.display = "block";
            document.getElementById("a").selected = "true";
            document.getElementById("p").style.display = "none";
            document.getElementById("d").style.display = "none";
        }
    })
})