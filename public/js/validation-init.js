jQuery(document).ready(function () {
    jQuery.validator.addMethod("alpha", function (value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
    }, "Only letters allowed.");
    jQuery.validator.addMethod("numbers", function (value, element) {
        return this.optional(element) || value == value.match(/^[0-9]*$/);
    }, "Only numbers allowed.");
    jQuery.validator.addMethod("phoneno", function(phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 && 
        phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
    }, "<br />Please specify a valid phone number");

    jQuery('#roicalculatorForm').validate({
        ignore: [],
        rules: {
            total_employees: {
                required: true,
                numbers: true
            },
            new_employees: {
                required: true,
                numbers: true
            },
            generalist_sal: {
                required: true,
                numbers: true
            },
            avg_employee_sal: {
                required: true,
                numbers: true
            }
        },
        messages: {},
        errorElement : 'div',
        errorLabelContainer: '.errorTxt',
        submitHandler: function (form) {
            //jQuery('#newsletter_message').css('display', 'block');
            //document.getElementById('newsletter_message').innerHTML = "<img src=" + BASEURL + "images/AjaxLoader.gif>";
            //var data = new FormData(form);
            var r = jQuery("#total-employees").val();
            var i = jQuery("#new-employees").val();
            var o = jQuery("#generalist-sal").val();
            var a = jQuery("#avg-employee-sal").val();
            var s = 11 * i * (o / 2080) - i * (o / 2080) * 5.5;
            jQuery("#onboarding-savings-result").html('<span class="roi-result-doller">$</span>'+addCommas(Math.ceil(s))).show();
            var l = a / 2080 * 2.22 * 12 * i - a / 2080 * .22 * 12 * i + 300 * i;
            jQuery("#esignature-savings-result").html('<span class="roi-result-doller">$</span>'+addCommas(Math.ceil(l))).show();
            var u = 3 * r * (a / 260);
            jQuery("#time-off-mngmnt-savings-result").html('<span class="roi-result-doller">$</span>'+addCommas(Math.ceil(u))).show();
            var c = o / 2080 * 5 * 260 - o / 2080 * 3 * 260;
            jQuery("#admin-task-savings-result").html('<span class="roi-result-doller">$</span>'+addCommas(Math.ceil(c))).show(); 
        }
    });

    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    jQuery(document).on('submit','#contact_us_form_banner', function(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCXt8ZAAAAAJ9dq8-WxZS1bR4d7f9KXQZXB8mF', {action: 'request_a_quote_banner'}).then(function(token) {
                $('#contact_us_form_banner').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#contact_us_form_banner').prepend('<input type="hidden" name="action" value="request_a_quote_banner">');
                $('#contact_us_form_banner').submit();
            });;
        });
        jQuery(this).validate({
            rules: {
                name: {
                    required: true,
                    alpha: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    phoneno:true
                },
                country: {
                    required: true,
                    alpha: true
                },
            },
            messages: {
                email: { email: "Please enter a valid email.", required: "This field is required." }
            },
            submitHandler: function (form) {
                jQuery('#message_banner').css('display', 'block');
                document.getElementById('message_banner').innerHTML = "<img src=" + BASEURL + "images/AjaxLoader.gif>";
                // Serialize the entire form:
                var data = new FormData(form);
                jQuery.ajax({
                    url: BASEURL + 'connect-us',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        jQuery('#message_banner').html(obj.message);
                        jQuery('#contact_us_form_banner').get(0).reset();
                        jQuery('#message_banner').delay(3000).fadeOut('slow');
                        if(obj.success){
                            window.location = 'thank-you'; 
                        }
                    }
                });
            }
        });
    });

    jQuery(document).on('submit','#contact_us_form_popup', function(e) { 
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCXt8ZAAAAAJ9dq8-WxZS1bR4d7f9KXQZXB8mF', {action: 'request_a_quote_popup'}).then(function(token) {
                $('#contact_us_form_popup').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#contact_us_form_popup').prepend('<input type="hidden" name="action" value="request_a_quote_popup">');
                $('#contact_us_form_popup').submit();
            });
        });
        jQuery(this).validate({
            rules: {
                name: {
                    required: true,
                    alpha: true
    
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    phoneno:true
                },
                country: {
                    required: true,
                    alpha: true
                }
            },
            messages: {
                company_email: { email: "Please enter a valid email.", required: "This field is required." }
            },
            submitHandler: function (form) {
                jQuery('#message_popup').css('display', 'block');
                document.getElementById('message_popup').innerHTML = "<img src=" + BASEURL + "images/AjaxLoader.gif>";
                var data = new FormData(form);
                jQuery.ajax({
                    url: BASEURL + 'connect-us-popup',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        jQuery('#message_popup').html(obj.message);
                        jQuery('#contact_us_form_popup').get(0).reset();
                        jQuery('#message_popup').delay(3000).fadeOut('slow');
                        if(obj.success){
                            window.location = BASEURL +'thank-you'; 
                        }
                    }
                });
            }
        });
    });

    jQuery(document).on('submit','#contact_us_form', function(e) { 
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCXt8ZAAAAAJ9dq8-WxZS1bR4d7f9KXQZXB8mF', {action: 'request_a_quote'}).then(function(token) {
                $('#contact_us_form').prepend('<input type="hidden" name="token" value="' + token + '">');
                $('#contact_us_form').prepend('<input type="hidden" name="action" value="request_a_quote">');
                $('#contact_us_form').submit();
            });;
        });
        jQuery('#contact_us_form').validate({
            rules: {
                name: {
                    required: true,
                    alpha: true
    
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    phoneno:true
                },
                country: {
                    required: true,
                    alpha: true
                }
            },
            messages: {
                company_email: { email: "Please enter a valid email.", required: "This field is required." }
            },
            submitHandler: function (form) {
                jQuery('#message_footer').css('display', 'block');
                document.getElementById('message_footer').innerHTML = "<img src=" + BASEURL + "images/AjaxLoader.gif>";
                var data = new FormData(form);
                jQuery.ajax({
                    url: BASEURL + 'connect-us-popup',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        var obj = jQuery.parseJSON(data);
                        //document.getElementById('success').innerHTML = "";
                        jQuery('#message_footer').html(obj.message);
                        jQuery('#contact_us_form').get(0).reset();
                        jQuery('#message_footer').delay(3000).fadeOut('slow');
                        if(obj.success){
                            window.location = BASEURL +'thank-you'; 
                        }
                    }
                });
            }
        });
    });


    // blog listing page newsletter submit
    jQuery(document).on('submit','#newsletterForm', function(e) { 
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCXt8ZAAAAAJ9dq8-WxZS1bR4d7f9KXQZXB8mF', {action: 'newsletter_form'}).then(function(token) {
                jQuery('#newsletterForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                jQuery('#newsletterForm').prepend('<input type="hidden" name="action" value="newsletter_form">');
                jQuery('#newsletterForm').submit();
            });;
        });

        jQuery('#newsletterForm').validate({
        
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    email: { email: "Please enter a valid email.", required: "This field is required." }
                },
            submitHandler: function (form) {

                jQuery('#newsletter_msg').css('display', 'block');
                document.getElementById('newsletter_msg').innerHTML = "<img style='height: 20px; width: 20px;' src=" + BASEURL + "images/AjaxLoader.gif>";

                let myForm = document.getElementById('newsletterForm');
                var data = new FormData(myForm);
        
                jQuery.ajax({
                    url: BASEURL + 'newsletter',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        var obj = jQuery.parseJSON(response);
                        if(obj.error == true){
                            jQuery('#newsletter_msg').css("color","red");
                            jQuery('#newsletter_msg').html(obj.message);
                            jQuery('#newsletter_msg').delay(3000).fadeOut('slow');
                        }else{
                            jQuery('#newsletter_msg').css("color","green");
                            jQuery('#newsletter_msg').html(obj.message);
                            jQuery('#newsletterForm').get(0).reset();
                            jQuery('#newsletter_msg').delay(3000).fadeOut('slow');
                        }
                        return;
                    }
                });
            }
        });
    });


    // blog page popup newsletter script
    jQuery(document).on('submit','#npopform', function(e) { 
        e.preventDefault();
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeCXt8ZAAAAAJ9dq8-WxZS1bR4d7f9KXQZXB8mF', {action: 'save_newsletter_form'}).then(function(token) {
                jQuery('#npopform').prepend('<input type="hidden" name="token" value="' + token + '">');
                jQuery('#npopform').prepend('<input type="hidden" name="action" value="save_newsletter_form">');
                jQuery('#npopform').submit();
            });;
        }); 
     
            jQuery('#npopform').validate({
        
                rules: {
                    emailpop: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    emailpop: { email: "Please enter a valid email.", required: "This field is required." }
                },
            submitHandler: function (form) { 
                jQuery('#npopmsg').css('display', 'block');
                document.getElementById('npopmsg').innerHTML = "<img src=" + BASEURL + "images/AjaxLoader.gif>";
        
                let myForm = document.getElementById('npopform');
                var data = new FormData(myForm);
        
                jQuery.ajax({
                    url: BASEURL + 'blog/newsletter/savePopupNewsletter',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                       
                        var obj = jQuery.parseJSON(response);
                         if(obj.error == true){
                            jQuery('#npopmsg').css("color","red");
                            jQuery('#npopmsg').html(obj.message);
                            jQuery('#npopmsg').delay(3000).fadeOut('slow');
                        }else{
                            jQuery('#npopmsg').css("color","green");
                            jQuery('#npopmsg').html(obj.message);
                            jQuery('#npopform').get(0).reset();
                            jQuery('#npopmsg').delay(3000).fadeOut('slow');
                            setTimeout(function() {
                                $("#newsletter_modal").hide();
                                $("#newsletter_modal").removeClass('show');
                            }, 3000);
                        }
                        return;
                        // jQuery('#npopmsg').html(obj.message);
                        // jQuery('#npopform').get(0).reset();
                        // jQuery('#npopmsg').delay(3000).fadeOut('slow');
                        // if(obj.success){
                        //     window.location = BASEURL + 'thank-you'; 
                        // }
                    }
                });
            }
        });
    });


    // comment form submition with google captcha
    jQuery(document).on('submit','#comment_form', function(e) { 
        e.preventDefault();
        
        grecaptcha.ready(function() {

            grecaptcha.execute('6LeCXt8ZAAAAAJ9dq8-WxZS1bR4d7f9KXQZXB8mF', {action: 'comment_form'}).then(function(token) {
                jQuery('#comment_form').prepend('<input type="hidden" name="token" value="' + token + '">');
                jQuery('#comment_form').prepend('<input type="hidden" name="action" value="comment_form">');
                jQuery('#comment_form').submit();
            });;
        });

        jQuery(this).validate({
            rules: {
                name: {
                    required: true,
                    alpha: true    
                },
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                name: { required: "This field is required." },
                email: { email: "Please enter a valid email.", required: "This field is required." }
            },
            submitHandler: function (form) {
                jQuery('#message_comment').css('display', 'block');
                document.getElementById('message_comment').innerHTML = "<img src=" + BASEURL + "images/AjaxLoader.gif>";
        
                // Serialize the entire form:
                var data = new FormData(form);
                jQuery.ajax({
                    url: BASEURL + 'home/comment_blog',
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(data) {
                        var obj = JSON.parse(JSON.stringify(data));                   
                        jQuery('#message_comment').html(obj.message);
                        jQuery('#comment_form').get(0).reset();
                        jQuery('#message_comment').delay(100000).fadeOut();
                    }
                });
            }
        });
        
    });



});