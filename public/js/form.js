$(function () {

    var form = $("body").find("form").eq(0);

    $("#email").on("input", function (e) {
        var email = $(e.target).val();
        var select = form.children('div').eq(0);

        if (isValidEmail(email)) {
            select.attr('class', 'form-group has-success has-feedback');
            select.children('span').eq(0).attr("class", "glyphicon glyphicon-ok form-control-feedback");
            select.children('span.help-block').text('');
            if (isValidPassword($('#pwd').val())) {
                form.children('button').attr('class', 'btn btn-success');
            }
        } else {
            select.attr('class', 'form-group has-error has-feedback');
            select.children('span').eq(0).attr("class", "glyphicon glyphicon-remove form-control-feedback");
            select.children('span.help-block').text(email + ' is not an email address!');
            form.children('button').attr('class', 'btn btn-default');
        }
    });

    $('#pwd').on('input', function (e) {
        var password = $(e.target).val();
        var select = form.children('div').eq(1);

        if (isValidPassword(password)) {
            select.attr('class', 'form-group has-success has-feedback');
            select.children('span').eq(0).attr("class", "glyphicon glyphicon-ok form-control-feedback");
            select.children('span.help-block').text('');
            if (isValidEmail($('#email').val())) {
                form.children('button').attr('class', 'btn btn-success');
            }
        } else {
            select.attr('class', 'form-group has-error has-feedback');
            select.children('span:nth-of-type(1)').attr("class", "glyphicon glyphicon-remove form-control-feedback");
            form.children('button').attr('class', 'btn btn-default');
            
            if (password.length == 0) {
                select.children('span.help-block').text('');
            } else if (password.length < 6) {
                select.children('span.help-block').text('Your password is too short');
            } else if (password.length > 20) {
                select.children('span.help-block').text('Your password is too long!');
            } else if (!/[0-9]+/.test(password)) {
                select.children('span.help-block').text('Password must contain at least one number');
            } else if (!/[a-zA-Z]+/.test(password)) {
                select.children('span.help-block').text('Password must contain at least one letter');
            } else {
                select.children('span.help-block').text('Only letters and numbers allowed!');
            }
        }

    });

    $('form').eq(0).submit(function (e) {
        if (!isValidEmail($('#email').val()) || !isValidPassword($('#pwd').val())) {
            e.preventDefault();
        }
    });

});

function isValidEmail(email) {

    return /^[a-z0-9]+([-._][a-z0-9]+)*@([a-z0-9]+(-[a-z0-9]+)*\.)+[a-z]{2,4}$/.test(email)
            && /^(?=.{1,64}@.{4,64}$)(?=.{6,100}$).*/.test(email);
}

function isValidPassword(password) {

    var reg1 = /[^a-zA-Z0-9]+/;
    var reg2 = /[a-zA-Z]+[0-9]+/;
    var reg3 = /^[a-zA-Z0-9]{6,20}$/;

    return !reg1.test(password) && reg2.test(password) && reg3.test(password);
}