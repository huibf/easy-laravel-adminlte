// geomon system params
var systemParams = {
    protocol: document.location.protocol + '//',
    host: window.location.host + '/', 
    x_csrf_token: $('meta[name="csrf-token"]').attr('content')
};

// geomon config
var admin = {
    api: {
        login: systemParams.protocol + systemParams.host + 'office/login'
    },
    web: {
        login: systemParams.protocol + systemParams.host + 'office/login'
    }
};

// http://www.cnblogs.com/fxxkhigh/archive/2016/07/14/5669904.html
// http://www.cnblogs.com/jarson-7426/p/5511734.html
function ajaxFun(url, param, type) {
    // 利用了jquery延迟对象回调的方式对ajax封装，使用done()，fail()，always()等方法进行链式回调操作
    return $.ajax({
        headers: {
            'X-CSRF-TOKEN': systemParams.x_csrf_token
        },
        url: url,
        data: param || {},
        type: type || 'POST'
    });
}

function ajax(url, param, type) {
    return ajaxFun(url, param, type).then(function(res){
        // success callback
        if (1) {
            if (res.code == 20) { // no login or login expire, redirect to login page
                window.location.href = geomon.web.login;
            }
            return res; 
        } else {
            // some code error
            return $.Deferred().reject(res); // 返回一个失败状态的deferred对象，把错误代码作为默认参数传入之后fail()方法的回调
        }
    }, function(err){
        // error callback
        console.log('ajax request error:');
        console.log(err);
        return err;
    });
}

/*
ajax('').done(function(resp){
    // 当result为true的回调
}).fail(function(err){
    // 当result为false的回调
});
*/