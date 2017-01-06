var link = {
    loadPage: function(){
        let url = $(this).attr('data-link'); //url에서 data-link속성의 값을 얻어옴 : <a data-link="{{route('test')}}"> - data-link는 custom data attributes.
        $.get(url, {}, function(response){ //get함수를 통해 url(위에서 data-link값 받아온 것)의 응답을 보낸다.
            if(response.success == 1) { //응답의 success값이 1일 경우 (TestController에서 넘어옴)
                $('.screenPanel').html(response.data.html); //html파일로 넘어온다. screenPanel클래스 부분에 넘어온 응답을 html형태로 출력. (TestController에서 결과값을 Array형태(ajax)로 받아옴.)
            }
        })
    },
    bind: function(){
        //$('#btn-login').click(menu.loginForm);
        $('#task_create').click(link.loadPage); // sidebar의 리스트에 있는 a링크의 값을 loadForm함수를 통해 받아온다.
    }
}

$(link.bind);
