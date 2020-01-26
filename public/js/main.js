$(document).ready(function () {

    function getData() {
        $.ajax({
            type: 'GET',
            url: 'service.php',
            success: function (response) {
                $('tbody').html(response);
            }
        })
    }

    $("#formSubmit").submit(function (event) {
        event.preventDefault();

        let formValues = $(this).serialize();
        let formAction = $(this).attr("action");
        let formMethod = $(this).attr("method");

        $.ajax({
            type: formMethod,
            url: formAction,
            data: formValues,
            success: function (data) {
                $("#formSubmit")[0].reset();
                getData();
            }
        }).done(function (data) {
            let parsedData = JSON.parse(data);
            if (parsedData.status == 'true') {
                $('.alert').attr('class', 'alert alert-success');
                $('.alert-success').html('<p>' + parsedData.message + '</p>');
                $('.alert').slideDown("slow");
            } else {
                $('.alert').attr('class', 'alert alert-danger');
                $('.alert-danger').html('<p>' + parsedData.message + '</p>');
                $('.alert').slideDown("slow");
            }
        });
        setTimeout(function () {
            $('.alert').slideUp("slow", function () {});
        }, 2000);
    })

    $("body").on("click", "#delete", function () {
        let id = $(this).data("id");
        $.ajax({
            type: 'post',
            url: 'service.php',
            data: {
                'delete': true,
                'id': id,
            },
            value: 'delete',
            success: function (response) {
                getData();
            }
        }).done(function (data) {
            let parsedData = JSON.parse(data);
            if (parsedData.status == 'true') {
                $('.alert').attr('class', 'alert alert-success');
                $('.alert-success').html('<p>' + parsedData.message + '</p>');
                $('.alert').slideDown("slow");
            } else {
                $('.alert').attr('class', 'alert alert-danger');
                $('.alert-danger').html('<p>' + parsedData.message + '</p>');
                $('.alert').slideDown("slow");
            }
        });
        setTimeout(function () {
            $('.alert').slideUp("slow", function () {});
        }, 2000);
    })

    $('#exampleModal').on('show.bs.modal', function (e) {
        let id = $(e.relatedTarget).data('id');
        let value = $(e.relatedTarget).data('value');
        $("#editForm #task").val(value);
        $("#editForm #taskId").val(id);
    })


    $("#editForm").submit(function (event) {
        event.preventDefault();
        $('#exampleModal').modal('toggle');
        let formValues = $(this).serialize();
        let formAction = $(this).attr("action");
        let formMethod = $(this).attr("method");

        $.ajax({
            type: formMethod,
            url: formAction,
            data: formValues,
            success: function (data) {
                $("#editForm")[0].reset();
                getData();
            }
        }).done(function (data) {
            let parsedData = JSON.parse(data);
            if (parsedData.status == 'true') {
                $('.alert').attr('class', 'alert alert-success');
                $('.alert-success').html('<p>' + parsedData.message + '</p>');
                $('.alert').slideDown("slow");
            } else {
                $('.alert').attr('class', 'alert alert-danger');
                $('.alert-danger').html('<p>' + parsedData.message + '</p>');
                $('.alert').slideDown("slow");
            }
        });
        setTimeout(function () {
            $('.alert').slideUp("slow", function () {});
        }, 2000);

    });
})