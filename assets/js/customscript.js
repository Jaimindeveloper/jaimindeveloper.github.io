$(document).ready(function() {
    var findImage = $(this).find('img').attr('alt');
    $('img').map(function() {
        var altimage = $(this).attr('alt');
        if (altimage == 'www.000webhost.com') {
            $(this).hide()
        }
    });
    $(".smoothScroll").click(function() {
        var id = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(id).offset().top
        }, 2000)
    });
    $(document).keydown(function(event) {
        if (event.keyCode == 123) {
            return !1
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
            return !1
        }
    });
    $(document).keydown(function(event) {
        if (event.keyCode == 123) {
            return !1
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
            return !1
        }
        if (event.ctrlKey && (event.keyCode === 67 || event.keyCode === 86 || event.keyCode === 85 || event.keyCode === 117)) {
            return !1
        }
    });
    $(document).on("contextmenu", function(e) {
        e.preventDefault()
    });
    var ipaddress = '';
    var city = '';
    var country = '';
    var otherDetail = '';
    $.get("https://ipinfo.io", function(response) {
        ipaddress = response.ip;
        city = response.ip;
        country = response.region;
        otherDetail = JSON.stringify(response, null, 4)
    }, "jsonp");
    $('#contact-form').click(function() {
        var name = $('#name').val();
        var email = $('#email').val();
        var mobile = $('#mobile').val();
        var message = $('#message').val();
        var arlene1 = [];
        $('.tempalert').remove();
        $('.alert-danger').addClass('hidden');
        var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        var nameregex = new RegExp("^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$");
        var numregex = new RegExp("^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$");
        if (name == '' || !nameregex.test(name)) {
            var datamsg = $('#name').attr('data-msg-required');
            $('#name').after('<div class="alert-danger tempalert animated shake msgname">' + datamsg + '</div>');
            arlene1.push('name')
        } else {
            arlene1.splice($.inArray('name', arlene1), 1);
            $('.msgname').remove()
        }
        if (email == '' || !emailReg.test(email)) {
            var datamsg = $('#email').attr('data-msg-required');
            $('#email').after('<div class="alert-danger tempalert animated shake msgemail">' + datamsg + '</div>');
            arlene1.push('email')
        } else {
            arlene1.splice($.inArray('email', arlene1), 1);
            $('.msgemail').remove()
        }
        if (mobile == '' || !numregex.test(mobile)) {
            var datamsg = $('#mobile').attr('data-msg-required');
            $('#mobile').after('<div class="alert-danger tempalert animated shake msgmobile">' + datamsg + '</div>');
            arlene1.push('mobile')
        } else {
            arlene1.splice($.inArray('mobile', arlene1), 1);
            $('.msgmobile').remove()
        }
        if (message == '') {
            var datamsg = $('#message').attr('data-msg-required');
            $('#message').after('<div class="alert-danger tempalert animated shake msgmessage">' + datamsg + '</div>');
            arlene1.push('message')
        } else {
            arlene1.splice($.inArray('message', arlene1), 1);
            $('.msgmessage').remove()
        }
        if (arlene1.length <= 0) {
            var loadingText = $('#contact-form').attr('data-loading-text');
            $(this).val(loadingText);
            $.ajax({
                url: 'http://www.mrheggwhites.com/contact-form.php',
                dataType: 'json',
                crossDomain: true,
                type: 'POST',
                data: {
                    name: name,
                    email: email,
                    mobile: mobile,
                    message: message,
                    ipaddress: ipaddress,
                    city: city,
                    country: country,
                    otherDetail: otherDetail
                },
                beforeSend: function(xhr){
                    xhr.setRequestHeader('Access-Control-Allow-Origin', 'http://www.mrheggwhites.com');
                },
                success: function(data, textStatus, jQxhr) {
                    if (data == 0) {
                        $('#name').val('');
                        $('#email').val('');
                        $('#mobile').val('');
                        $('#message').val('');
                        $('#contactSuccess').removeClass('hidden')
                    } else {
                        $('#contactError').removeClass('hidden')
                    }
                },
                error: function(jqXhr, textStatus, errorThrown) {
                    $('#contactError').removeClass('hidden')
                }
            });
            $(this).val('SEND MESSAGE');
            setTimeout(function() {
                $('.alert-danger').addClass('hidden');
                $('.alert-success').addClass('hidden')
            }, 5000)
        }
    })
})