jQuery(document).ready(function(){
    
    $.ajaxSetup({
        headers:{
            'X_CSRF-TOKEN': $("meta[name='_token']").attr('content')
        }
    });
    $('#add_customer').submit(function(e){
        console.log('submitted');
        e.preventDefault();
        $.ajax({
            url: "/add/customer",
            method: 'post',
            data: {
                firstname:$('#firstname').val(),
                lastname: $('#lastname').val(),
                email: $('#email').val()
            },
            success:function(result){
                console.log(result);
            }
        });
    });

    // $('#logout').click(function(e){
    //     $.ajax({
    //         url: "{{ route('logout') }}",
    //         method: "post"
    //     });
    // });
});