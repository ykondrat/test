let color = "#F2F95C";
let taskPhoto = '';
let div = document.querySelectorAll('.color-picker div');

$('.add-button').on('click', function(){
    $('.error_form').remove();
    $('.success_form').remove();
    let [name, email, task] = [$('#user-name').val().trim(), $('#user-email').val().trim(), $('#user-task').val().trim()];
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let sender = true;

    if (!name || name.length < 2) {
        $(`<p class="error_form">Please provide your name</p>`).appendTo($('.error-editor'));
        sender = false;
    }
    if (!filter.test(email)) {
        $(`<p class="error_form">Please provide valid email</p>`).appendTo($('.error-editor'));
        sender = false;
    }
    if (!task || task.length < 2) {
        $(`<p class="error_form">Please provide your task</p>`).appendTo($('.error-editor'));
        sender = false;
    }

    if (sender) {
        var data = new FormData();
        if (taskPhoto) {
            data.append('img', taskPhoto);
        }
        data.append('name', name);
        data.append('email', email);
        data.append('task', task);
        data.append('color', color);

        $.ajax({
            type: 'POST',
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
    		url: 'http://ykondrat-001-site1.1tempurl.com/test/add',
    		data: data,
            success: function(response) {
                if (response != 'OK') {
                    $(`<p class="error_form">${response}</p>`).appendTo($('.error-editor'));
                } else {
                    $(`<p class="success_form">Your Task was successfully added</p>`).appendTo($('.error-editor'));
                    $('#user-name').val('');
                    $('#user-email').val('');
                    $('#user-task').val('');
                    $('#user-img').val('');

                    color = '#F2F95C';
                    div.forEach((elem) => {
                        elem.style = 'border: none';
                    });

                    $('#img-preview').css('display', 'none');
            		$('#img-preview').attr('src', '');
                }
            }
        });
    }
});

function colorPicker(elem) {
    div.forEach((elem) => {
        elem.style = 'border: none';
    });
    elem.style = 'border: 1px solid black';
    if (elem.classList.value == 'yellow') {
        color = '#F2F95C';
    } else if (elem.classList.value == 'red') {
        color = '#F9705C';
    } else if (elem.classList.value == 'green') {
        color = '#8FF95C';
    } else {
        color = '#5CCFF9';
    }
}

function uploadPhoto(photo){
    var reader  = new FileReader();

	reader.onloadend = function () {
        $('#img-preview').css('display', 'block');
		$('#img-preview').attr('src', reader.result);
	}
	if (photo.files[0]) {
		reader.readAsDataURL(photo.files[0]);
	} else {
        $('#img-preview').css('display', 'none');
		$('#img-preview').attr('src', '');
	}
    taskPhoto = photo.files[0];
}

$('#back-editor').on('click', function() {
    location.href = 'http://ykondrat-001-site1.1tempurl.com/test';
});

$('.btn-preview').on('click', function() {
    $('.justify-content-md-center').css('display', 'block');
    if ($('#user-name').val().trim() && $('#user-email').val().trim() && $('#user-task').val().trim()) {
        $('.user-name-prev').text('Name: ' + $('#user-name').val().trim());
        $('.user-email-prev').text('Email: ' + $('#user-email').val().trim());
        $('.task-text-prev').text('Task: ' + $('#user-task').val().trim());
        if ($('#img-preview').attr('src')) {
            $('.img-user-prev').attr('src', $('#img-preview').attr('src'));
        }
        $('.preview-div').css('background-color', color);
    }
})
