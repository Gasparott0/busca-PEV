$(document).on('click', '#btn-signUp', function(e) {
    var data = $("#form-signUp").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "/user_site/service/insert-user.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                document.getElementById("modal").classList.remove("hide")
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});