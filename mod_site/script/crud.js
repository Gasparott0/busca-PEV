$(document).on('click', '.update', function(e) {
    var id = $(this).attr("data-id");
    var cep = $(this).attr("data-cep");
    var street = $(this).attr("data-street");
    var district = $(this).attr("data-district");
    var number = $(this).attr("data-number");
    $('#id_u').val(id);
    $('#cep_u').val(cep);
    $('#street_u').val(street);
    $('#district_u').val(district);
    $('#number_u').val(number);
});

$(document).on("click", ".delete", function() {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);

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
    var searchParams = new URLSearchParams(window.location.search);
    if (searchParams.has('message')) {
        var message = searchParams.get('message');
        var paragraph = document.getElementById("message");
        paragraph.textContent = message;
        $('#operation').modal("show");
        searchParams.delete('message');
    }
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