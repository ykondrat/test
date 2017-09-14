function editTask(elem){
    let name = $(`div[data-set=${elem.dataset.set}] input[type="text"]`).val().trim();
    let email = $(`div[data-set=${elem.dataset.set}] input[type="email"]`).val().trim();
    let task = $(`div[data-set=${elem.dataset.set}] textarea`).val().trim();
    let done = $(`div[data-set=${elem.dataset.set}] input[type="checkbox"]`).is( ":checked" );
    let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    let sender = true;

    if (!name || name.length < 2) {
        sender = false;
    }
    if (!filter.test(email)) {
        sender = false;
    }
    if (!task || task.length < 2) {
        sender = false;
    }
    if (sender) {
        console.log('click');
        var data = new FormData();
        data.append('id', elem.dataset.set);
        data.append('name', name);
        data.append('email', email);
        data.append('task', task);
        data.append('done', done+'');

        $.ajax({
            type: 'POST',
            contentType: false,
            cache: false,
            processData: false,
    		url: 'http://ykondrat-001-site1.1tempurl.com/test/admin-edit',
    		data: data
        });
    }
}
