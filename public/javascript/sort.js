$('.btn-sort-name').on('click', function(){
    let task = $('.task');
    $('.task').remove();
    task.sort(function(a, b){
        if (a.querySelector('h3').innerHTML > b.querySelector('h3').innerHTML) {
            return (true);
        } else {
            return (false);
        }
    });
    task.each(function(){
        $($(this)[0]).appendTo($('.task-list'));
    });
});

$('.btn-sort-email').on('click', function(){
    let task = $('.task');
    $('.task').remove();
    task.sort(function(a, b){
        if (a.querySelector('h5').innerHTML > b.querySelector('h5').innerHTML) {
            return (true);
        } else {
            return (false);
        }
    });
    task.each(function(){
        $($(this)[0]).appendTo($('.task-list'));
    });
});

$('.btn-sort-done').on('click', function(){
    let task = $('.task');
    $('.task').remove();
    task.sort(function(a, b){
        if (a.querySelector('span').innerHTML > b.querySelector('span').innerHTML) {
            return (false);
        } else {
            return (true);
        }
    });
    task.each(function(){
        $($(this)[0]).appendTo($('.task-list'));
    });
});
