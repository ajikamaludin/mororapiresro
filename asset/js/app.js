$(document).on('click','#click',function(){
    $(body).notify({
        message: 'Hello World',
        type: 'danger'
    });
})