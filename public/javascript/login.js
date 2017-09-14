$('.btn-signup').on('click', function(){
    $('.error_form').remove();
    let sender = true;
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let [name, email, password, repPassword] = [$('#signup-name').val().trim(), $('#signup-email').val().trim(), $('#signup-password').val().trim(), $('#signup-rep-password').val().trim()];

    if (!name || name.length < 2) {
        $(`<p class="error_form">Please provide your name</p>`).appendTo($('.signup-err'));
        sender = false;
    }
    if (!filter.test(email)) {
        $(`<p class="error_form">Please provide valid email</p>`).appendTo($('.signup-err'));
        sender = false;
    }
    if (!password || password.length < 3 || password != repPassword) {
        $(`<p class="error_form">Please provide valid password</p>`).appendTo($('.signup-err'));
        sender = false;
    }

    if (sender) {
        let data = new FormData();
        data.append('name', name);
        data.append('email', email);
        data.append('password', password);
        data.append('color', color);

        $.ajax({
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
    		url: 'http://ykondrat-001-site1.1tempurl.com/test/auth-signup',
    		data: data,
            success: function (response) {
                if (response != 'OK') {
                    $(`<p class="error_form">${response}</p>`).appendTo($('.signup-err'));
                } else {
                    location.reload();
                }
            }
        });
    }
});


$('.btn-signin').on('click', function(){
    $('.error_form').remove();
    let [name, password] = [$('#signin-name').val().trim(), $('#signin-password').val().trim()];

    let data = new FormData();
    data.append('name', name);
    data.append('password', password);

    $.ajax({
        type: 'POST',
        contentType: false,
        cache: false,
        processData: false,
        url: 'http://ykondrat-001-site1.1tempurl.com/test/auth-signin',
        data: data,
        success: function (response) {
            if (response != 'OK') {
                $(`<p class="error_form">${response}</p>`).appendTo($('.signin-err'));
            } else {
                location.reload();
            }
        }
    });
});
