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
            if (response.message === 'Competition name already taken!') {
                $('#name-error').show();
                $('#name-error').text(response.message);
                $('#date-error').hide();
                $('#sport-error').hide();
                $('#prize-error').hide();
            } else {
                routeToCompetitions();
            }
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
            }
        }
    });
}

function routeToCompetitionInfo(competitionId) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    window.localStorage.setItem('page', 'competitions.blade.php');
    $.ajax({
        url: "/competitions/" + competitionId,
        type: 'get',
        data: {
            CSRF_TOKEN
        },
        success: function (data) {
            $("#content").html(data);
        },
        error: function (error) {
            console.log(error);
        }
    })
}

function routeToAddRound(competitionId) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    window.localStorage.setItem('page', 'competitions.blade.php');
    $.ajax({
        url: "/competitions/" + competitionId + "/createround",
        type: 'get',
        data: {
            CSRF_TOKEN
        },
        success: function (data) {
            $("#content").html(data);
        }
    })
}

function submitCreateRoundForm() {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var formData = {
        competition_name: $('#name').val(),
        competition_date: $('#date').val(),
        round: $('#round').val(),
        competition_id: $('#competition_id').val(),
    };

    $.ajax({
        type: 'POST',
        url: '/rounds',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        success: function (response) {
            routeToCompetitionInfo($('#competition_id').val());
        },
        error: function (error) {
            console.log("err");
        }
    });
}

function routeToAddCompetitor(competitionId, round) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    window.localStorage.setItem('page', 'competitions.blade.php');
    $.ajax({
        url: "/competitions/" + competitionId + "/" + round + "/add",
        type: 'get',
        data: {
            CSRF_TOKEN
        },
        success: function (data) {
            $("#content").html(data);
        }
    })
}

function submitCreateCompetitorForm() {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var selectedValue = $('#user').val();

    // Parse the JSON value
    var userData = JSON.parse(selectedValue);

    // Access the individual properties
    var email = userData.email;
    var firstname = userData.firstname;
    var lastname = userData.lastname;

    var formData = {
        user_email: email,
        user_firstname: firstname,
        user_lastname: lastname,
        round_competition_name: $('#round_competition_name').val(),
        round_competition_date: $('#round_competition_date').val(),
        round_competition_round: $('#round_competition_round').val(),
    };

    $.ajax({
        type: 'POST',
        url: '/competitors',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
        },
        success: function (response) {
            if (response.message === "Competitor added successfully") {
                routeToCompetitionInfo($('#competition_id').val());
            } else {
                $('#name-error').text(response.message);
                $('#name-error').show();
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}