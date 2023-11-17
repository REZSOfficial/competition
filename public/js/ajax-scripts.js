function routeToHome() {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/",
        type: 'get',
        data: {
            CSRF_TOKEN
        },
        success: function (data) {
            $("#content").html(data);
        }
    })
}

function routeToCompetitions() {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    window.localStorage.setItem('page', 'competitions.blade.php');
    $.ajax({
        url: "/competitions",
        type: 'get',
        data: {
            CSRF_TOKEN
        },
        success: function (data) {
            $("#content").html(data);
        }
    })
}

function routeToCreate() {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/competitions/create",
        type: 'get',
        data: {
            CSRF_TOKEN
        },
        success: function (data) {
            $("#content").html(data);
        }
    })
}

function submitCreateCompetitionForm() {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = {
        name: $('#name').val(),
        date: $('#date').val(),
        sport: $('#sport').val(),
        prize: $('#prize').val(),
    };

    $.ajax({
        type: 'POST',
        url: '/competitions',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        success: function (response) {
            console.log("Success: " + response);
        },
        error: function (error) {
            if (error.responseJSON && error.responseJSON.errors) {
                var errors = error.responseJSON.errors;
                if (errors.name) {
                    $('#name-error').show();
                    $('#name-error').text(errors.name[0]);
                } else {
                    $('#name-error').hide();
                }
                if (errors.date) {
                    $('#date-error').show();
                    $('#date-error').text(errors.date[0]);
                } else {
                    $('#date-error').hide();
                }
                if (errors.sport) {
                    $('#sport-error').show();
                    $('#sport-error').text(errors.sport[0]);
                } else {
                    $('#sport-error').hide();
                }
                if (errors.prize) {
                    $('#prize-error').show();
                    $('#prize-error').text(errors.prize[0]);
                } else {
                    $('#prize-error').hide();
                }
            } else {
                //console.error(error);
            }
        }
    });
}
