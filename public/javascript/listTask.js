$(document).ready(function(){
    let path = location.pathname.split('/');
    let admin = $('#user-name-nav').text();
    if (path[2] == undefined) {
        path[2] = '';
    }

    if (!isNaN(path[2])) {
        let limit = path[2] == '' ? 1 : parseInt(path[2]) + 1;

        if (limit <= 1) {
            $('.prev').css('visibility', 'hidden');
        }
        if (limit >= 0) {
            var data = {
                limit: limit
            };
            $.ajax({
                type: 'POST',
        		url: 'http://ykondrat-001-site1.1tempurl.com/test/get-task',
                dataType: 'json',
                data: data,
                success: function (response) {
                    if (admin == 'admin') {
                        for (let i = 0; i < 3; i++) {
                            if (response[i]) {
                                $(`<div class="task">
                                    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 preview-div" data-set=${response[i].id_task} style="margin-left:auto; margin-right:auto; background-color: ${response[i].task_color}">
                                        <label htmlFor="">Done: </label><input type="checkbox" style="position:absolute;" />
                                        <input type="text" class="user-name-prev m-t-2" value=${response[i].user_name} />
                                        <input type="email" class="user-email-prev" value=${response[i].email} />
                                        <hr />
                                        <textarea class="task-text-prev" rows="5">${response[i].task_body}</textarea>
                                        <button onclick="editTask(this)" class="btn btn-info btn-admin" data-set=${response[i].id_task} >Save</button>
                                    </div>
                                </div>`).appendTo($('.task-list'));
                                if (response[i].task_done == 'true') {
                                    $(`div[data-set=${response[i].id_task}] input[type="checkbox"]`).attr('checked', true);
                                }
                                if (response[i].task_img) {
                                    img =  "." + response[i].task_img;
                                    $(`<img src=${img} alt="" class="img-fluid img-user-prev-list">`).appendTo($(`div[data-set=${response[i].id_task}]`));
                                }
                            }
                        }
                        if (response[response.length - 1] == 0) {
                            $('.next').css('visibility', 'hidden');
                        }
                    } else {
                        for (let i = 0; i < 3; i++) {
                            if (response[i]) {
                                $(`<div class="task">
                                    <div class="col-sm-12 col-md-8 col-lg-6 col-xl-6 preview-div" data-set=${response[i].id_task} style="margin-left:auto; margin-right:auto; background-color: ${response[i].task_color}">
                                        <h3 class="user-name-prev m-t-2" style="">${response[i].user_name}</h3>
                                        <span class="done"></span>
                                        <h5 class="user-email-prev">${response[i].email}</h5>
                                        <hr />
                                        <p class="task-text-prev">${response[i].task_body}</p>
                                    </div>
                                </div>`).appendTo($('.task-list'));
                                if (response[i].task_img) {
                                    img =  "." + response[i].task_img;
                                    $(`<img src=${img} alt="" class="img-fluid img-user-prev">`).appendTo($(`div[data-set=${response[i].id_task}]`));
                                }
                                if (response[i].task_done == 'true') {
                                    $(`div[data-set=${response[i].id_task}] span`).text('done');
                                }
                            }
                        }
                        if (response[response.length - 1] == 0) {
                            $('.next').css('visibility', 'hidden');
                        }
                    }
                }
            });
        }
    }
});

$('.prev').on('click', function(){
    let path = location.pathname.split('/');
    if (path[2] == undefined) {
        path[2] = '';
    }
    let limit = path[2] == '' ? 0 : parseInt(path[2]);

    console.log(limit);
    if (limit > 1) {
        location.href = 'http://ykondrat-001-site1.1tempurl.com/test/' + (limit - 1);
    } else {
        location.href = 'http://ykondrat-001-site1.1tempurl.com/test/';
    }
});

$('.next').on('click', function(){
    let path = location.pathname.split('/');
    if (path[2] == undefined) {
        path[2] = '';
    }
    let limit = path[2] == '' ? 0 : parseInt(path[2]);

    if (limit >= 0) {
        location.href = 'http://ykondrat-001-site1.1tempurl.com/test/' + (limit + 1);
    }
});
