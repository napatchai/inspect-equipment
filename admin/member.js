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


// function test() {
//     alert('dsa')
// }