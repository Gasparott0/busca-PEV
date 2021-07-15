$(document).on('click', '#btn-add', function(e) {
    var data = $("#moderator_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "service/crud.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#addModeratorModal').modal('hide');
                alert('Moderador incluido com sucesso!');
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});
$(document).on('click', '.update', function(e) {
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    var lastname = $(this).attr("data-lastname");
    var email = $(this).attr("data-email");
    var phone = $(this).attr("data-phone");
    $('#id_u').val(id);
    $('#name_u').val(name);
    $('#lastname_u').val(lastname);
    $('#email_u').val(email);
    $('#phone_u').val(phone);
});

$(document).on('click', '#update', function(e) {
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "service/crud.php",
        success: function(dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
                $('#editModeratorModal').modal('hide');
                alert('Moderador atualizado com sucesso!');
                location.reload();
            } else if (dataResult.statusCode == 201) {
                alert(dataResult);
            }
        }
    });
});
$(document).on("click", ".delete", function() {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);

});
$(document).on("click", "#delete", function() {
    $.ajax({
        url: "service/crud.php",
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val()
        },
        success: function(dataResult) {
            $('#deleteModeratorModal').modal('hide');
            $("#" + dataResult).remove();

        }
    });
});
$(document).on("click", "#delete_multiple", function() {
    var user = [];
    $(".user_checkbox:checked").each(function() {
        user.push($(this).data('user-id'));
    });
    if (user.length <= 0) {
        alert("Por favor, selecione registros.");
    } else {
        WRN_PROFILE_DELETE = "Tem certeza que deseja excluir " + (user.length > 1 ? "esses registros?" : "esse registro?");
        var checked = confirm(WRN_PROFILE_DELETE);
        if (checked == true) {
            var selected_values = user.join(",");
            console.log(selected_values);
            $.ajax({
                type: "POST",
                url: "service/crud.php",
                cache: false,
                data: {
                    type: 4,
                    id: selected_values
                },
                success: function(response) {
                    var ids = response.split(",");
                    for (var i = 0; i < ids.length; i++) {
                        $("#" + ids[i]).remove();
                    }
                }
            });
        }
    }
});
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
        if (this.checked) {
            checkbox.each(function() {
                this.checked = true;
            });
        } else {
            checkbox.each(function() {
                this.checked = false;
            });
        }
    });
    checkbox.click(function() {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});