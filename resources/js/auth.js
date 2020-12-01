$(function() {
    function changeCaptcha() {
        var imgs = $('.captcha-wrapper').find('img');
        $.each(imgs, function(index, element) {
            var src = $(this).attr('src');
            var src_index_question = src.indexOf('?');
            src = src.substr(0, src_index_question);
            src = src + '?_t=' + (new Date().valueOf());
            $(this).attr('src', src);
        });
    }
    window.init_refresh_captcha_code = function() {
        var captcha_wrapper = $('[class="captcha-wrapper"]');
        captcha_wrapper.append('<button type="button" class="btn-captcha-reload"></button>');
        $('body').on('click', 'button.btn-captcha-reload', function() {
            changeCaptcha();
        });
    }
    init_refresh_captcha_code();
    $('body').on('click', '[data-action="change-captcha"]', function() {
        changeCaptcha();
    });
    window.showLoadingSuccess = function(state) {
        var auth_panel_success = $('.auth-panel-success');
        if (state === true) {
            auth_panel_success.fadeIn('fast');
        } else {
            auth_panel_success.fadeOut('fast');
        }
    };
    window.showLoading = function(state) {
        var loading = $('#auth-loading');
        var auth_panel = $('.auth-panel');
        if (state === true) {
            loading.fadeIn('fast');
            auth_panel.removeClass('auth-panel-hide').addClass('auth-panel-show');
        } else {
            loading.fadeOut('fast');
            auth_panel.removeClass('auth-panel-show').addClass('auth-panel-hide');
        }
    };
    var timer = null;
    var timermax = 120;
    var timervalue = timermax;
    var is_init_auth_timer_call = false;
    var interval_progressbar1 = null;
    window.init_auth_timer = function(number) { console.log('ss');
        if (is_init_auth_timer_call) {
            return;
        }
        is_init_auth_timer_call = true;
        var pb = $('#progressbar1');
        var pb2 = $('#progressbar2');
        var progressbar1_wrapper = $('#progressbar1-wrapper');
        var progressbar2_wrapper = $('#progressbar2-wrapper');
        var form_signup_activecode1 = $('#form-signup-activecode');
        var form_signup_activecode2 = $('#form-signup-activecode2');
        if (form_signup_activecode1.length > 0) {
            var buttons1 = form_signup_activecode1.find('button[name="request_code"]');
            $.each(buttons1, function() {
                $(this).val('0');
            });
        }
        if (pb.length > 0 && number == 1) {
            pb.removeClass('hidden');
            pb.html('');
            timermax = 120;
            timervalue = timermax;
            timer = new ProgressBar.Circle(progressbar1, {
                color: '#665bd8',
                strokeWidth: 9,
                trailWidth: 9,
                easing: 'easeInOut',
                duration: 500,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#665bd8', width: 9 },
                to: { color: '#665bd8', width: 9 },
                step: function (state, circle) {
                    var value = circle.value() * timermax;
                    var minute = Math.floor(value / 60);
                    var second = Math.floor(timervalue % 60);
                    minute = minute < 10 ? '0' + minute : minute;
                    second = second < 10 ? '0' + second : second;
                    var textValue = minute + ':' + second;
                    circle.setText(textValue);
                }
            });
            timer.set(timervalue / timermax);
            var interval_progressbar1 = setInterval(function() {
                timervalue--;
                if (timervalue < 0) {
                    clearInterval(interval_progressbar1);
                    interval_progressbar1 = null;
                    if (form_signup_activecode1.length > 0) {
                        var buttons1 = form_signup_activecode1.find('button[name="request_code"]');
                        $.each(buttons1, function() {
                            $(this).val('1');
                        });
                    }
                    progressbar1_wrapper.find('button').removeClass('hidden');
                    pb.addClass('hidden');
                } else {
                    timer.set(timervalue / timermax);
                }
            }, 1000);
        }
        if (pb2.length > 0 && number == 2) {
            pb2.removeClass('hidden');
            pb2.html('');
            timermax = 120;
            timervalue = timermax;
            timer = new ProgressBar.Circle(progressbar2, {
                color: '#665bd8',
                strokeWidth: 9,
                trailWidth: 9,
                easing: 'easeInOut',
                duration: 500,
                text: {
                    autoStyleContainer: false
                },
                from: { color: '#665bd8', width: 9 },
                to: { color: '#665bd8', width: 9 },
                step: function (state, circle) {
                    var value = circle.value() * timermax;
                    var minute = Math.floor(value / 60);
                    var second = Math.floor(timervalue % 60);
                    minute = minute < 10 ? '0' + minute : minute;
                    second = second < 10 ? '0' + second : second;
                    var textValue = minute + ':' + second;
                    circle.setText(textValue);
                }
            });
            timer.set(timervalue / timermax);
            var interval_progressbar2 = setInterval(function() {
                timervalue--;
                if (timervalue < 0) {
                    clearInterval(interval_progressbar2);
                    if (form_signup_activecode2.length > 0) {
                        var buttons2 = form_signup_activecode2.find('button[name="request_code"]');
                        $.each(buttons2, function() {
                            $(this).val('1');
                        });
                    }
                    progressbar2_wrapper.find('button').removeClass('hidden');
                    pb2.addClass('hidden');
                } else {
                    timer.set(timervalue / timermax);
                }
            }, 1000);
        }
        is_init_auth_timer_call = false;
    };
    function showSignupStep(step1_id, step2_id, step) {
        var form = $(step1_id);
        var activecode = $(step2_id);
        if (step == 1) {
            activecode.addClass('animated zoomOut faster');
            activecode.off('webkitAnimationEnd').on('webkitAnimationEnd', function() {
                activecode.removeClass().addClass('hidden');
                form.removeClass('hidden');
                form.addClass('animated zoomIn faster');
            });
            form.off('webkitAnimationEnd').on('webkitAnimationEnd', function() {
                form.removeClass();
            });
        }
        if (step == 2) {
            form.addClass('animated zoomOut faster');
            form.off('webkitAnimationEnd').on('webkitAnimationEnd', function() {
                form.removeClass().addClass('hidden');
                activecode.removeClass('hidden');
                activecode.addClass('animated zoomIn faster');
            });
            activecode.off('webkitAnimationEnd').on('webkitAnimationEnd', function() {
                activecode.removeClass();
            });
        }
        init_auth_timer(step2_id == '#form-signup-activecode' ? 1 : 2);
    }
    $('body').on('click', 'form[data-type="ajax-form"] button[name][type="submit"]', function(e) {
        var form = $(this).closest('form');
        var button_submit = $(this);
        var submit_buttons = form.find('button[type="submit"]');
        var button_submit_name = button_submit.attr('name');
        var button_submit_value = button_submit.attr('value');
        button_submit_value = button_submit_value !== undefined ? button_submit_value : '';
        $.each(submit_buttons, function(index, element) {
            var submit_button_name = $(this).attr('name');
            if (submit_button_name !== undefined) {
                var input_hidden = form.find('input[type="hidden"][name="' + submit_button_name + '"]');
                if (input_hidden.length > 0) {
                    input_hidden.remove();
                }
            }
        });
        if (button_submit_name !== undefined) {
            var input_hidden = form.find('input[type="hidden"][name="' + button_submit_name + '"]');
            if (input_hidden.length <= 0) {
                form.prepend('<input type="hidden" name="' + button_submit_name + '" value="' + button_submit_value + '" />');
            } else {
                input_hidden.val(button_submit_value);
            }
        }
    });
    $('body').on('submit', 'form[data-type="ajax-form"]', function(e) {
        e.preventDefault();
        var me = $(this);
        var base_url = window.location.protocol + '//' + location.host.split(':')[0];
        if (me.attr('action').indexOf(base_url) < 0) {
            window.showSwal([ 'متأسفانه درخواست نامعتبر است.' ], 'error');
            return false;
        }
        var data_check_force_submit = $('[data-check-force-submit]');
        if (data_check_force_submit.length > 0) {
            var is_checked = true;
            var title = [];
            $.each(data_check_force_submit, function() {
                if (!$(this).is(':checked')) {
                    is_checked = false;
                    title.push($(this).attr('data-check-force-submit') + ' باید انتخاب شود');
                }
            });
            if (!is_checked) {
                swal({
                    title: title.join('\n'),
                    text: '',
                    icon: 'error',
                    button: 'باشه',
                    html: true
                });
                return false;
            }
        }
        if ($(this).hasClass('.form-auth-login')) {
            var input_type = $(this).find('input[name="_t"]');
            if (input_type.length > 0) {
                input_type.remove();
            }
        }
        var is_activecode1 = me.attr('id') != undefined && me.attr('id') == 'form-signup-activecode';
        var is_activecode2 = me.attr('id') != undefined && me.attr('id') == 'form-signup-activecode2';
        var is_request_code = false;
        var last_action = '';
        var request_code_input = $(this).find('input[name="request_code"]');
        var verify_code_inputs = $('.flex-verfiy-codes input');
        var button_resend_code = me.find('button[name="request_code"]');
        if (request_code_input.length > 0) {
            $.each(verify_code_inputs, function() {
                $(this).removeAttr('required');
            })
            is_request_code = true;
            last_action = $(this).attr('action');
            $(this).attr('action', button_resend_code.attr('data-u'));
            request_code_input.remove();
        }
        window.showLoading(true);
        $(this).ajaxSubmit({
            success: function(data) {
                if (is_request_code) {
                    $.each(verify_code_inputs, function() {
                        $(this).attr('required', 'required');
                    })
                    me.attr('action', last_action);
                }
                window.showLoading(false);
                window.showLoadingSuccess(false);
                changeCaptcha();
                // grecaptcha.reset();
                if (data.status == '_resend_code_done') {
                    button_resend_code.addClass('hidden');
                    var progress = button_resend_code.next('div');
                    progress.removeClass('hidden');
                }
                else if (data.status == '_ru') {
                    window.showLoadingSuccess(true);
                    setTimeout(function() {
                        window.location.href = data.returnUrl;
                    }, 500);
                }
                else if (data.status == '_ma') {
                    var types = data.types;
                    var accounts = [];
                    $.each(types, function(index, element) {
                        accounts.push('<a href="javascript:void(0);" data-type="' + index + '">' + types[index] + '</a>');
                        $('.multiple-account').fadeTo('fast', '0.8');
                    });
                    var multiple_account = $('.multiple-account-content');
                    multiple_account.find('.mcc-count').text(accounts.length);
                    accounts = accounts.join('');
                    multiple_account.children('.flex').html(accounts);
                }
                else if (data.status == '_sm1') {
                    var form_signup_id = '#form-signup-merchants';
                    var form_active_code_id = '#form-signup-activecode';
                    var form_signup_resendcode_id = '#form-signup-resendcode';
                    if ($(form_signup_id).length <= 0) {
                        form_signup_id = '#form-auth-admin';
                        form_active_code_id = '#form-auth-activecode';
                        form_signup_resendcode_id = '#form-auth-resendcode';
                    }
                    var form_signup_resendcode = $(form_signup_resendcode_id);
                    var type = $(form_signup_id).find('input[name="type"]:checked');
                    var cell_phone_number = $(form_signup_id).find('input[name="cellPhoneNumber"]');
                    var new_type = $(form_active_code_id).find('input.input-type[type="hidden"]');
                    var new_cell_phone_number = $(form_active_code_id).find('input.input-cellPhoneNumber[type="hidden"]');
                    var new_type_resend = form_signup_resendcode.find('input.input-type[type="hidden"]');
                    var new_cell_phone_number_resend = form_signup_resendcode.find('input.input-cellPhoneNumber[type="hidden"]');
                    if (new_type.length > 0) {
                        new_type.val(type.val());
                    } else {
                        $(form_active_code_id).append('<input type="hidden" name="type" value="' + type.val() + '" />');
                    }
                    if (new_type_resend.length > 0) {
                        new_type_resend.val(type.val());
                    } else {
                        form_signup_resendcode.append('<input type="hidden" name="type" value="' + type.val() + '" />');
                    }
                    if (new_cell_phone_number.length > 0) {
                        new_cell_phone_number.val(cell_phone_number.val());
                    } else {
                        $(form_active_code_id).append('<input type="hidden" name="cellPhoneNumber" value="' + cell_phone_number.val() + '" />');
                    }
                    if (new_cell_phone_number_resend.length > 0) {
                        new_cell_phone_number_resend.val(cell_phone_number.val());
                    } else {
                        form_signup_resendcode.append('<input type="hidden" name="cellPhoneNumber" value="' + cell_phone_number.val() + '" />');
                    }
                    form_signup_resendcode.removeClass('hidden');
                    showSignupStep(form_signup_id, form_active_code_id, 2);
                }
                else if (data.status == '_sm2') {
                    var form_active_code_id = '#form-signup-activecode';
                    var form_signup_resendcode_id = '#form-signup-resendcode';
                    var form_signup_userinfo = '#form-signup-userinfo';
                    $(form_active_code_id).hide();
                    $(form_signup_resendcode_id).hide();
                    $(form_signup_userinfo).removeClass('hidden');
                }
                else if (data.status == '_sc1') {
                    showSignupStep('#form-signup-customers', '#form-signup-activecode2', 2);
                }
                else {
                    var errors = [];
                    $.each(data.messages, function (index, element) {
                        if (Array.isArray(data.messages[index])) {
                            for (var i = 0; i < data.messages[index].length; i++) {
                                errors.push($(this).get(i));
                            }
                        } else {
                            errors.push(data.messages[index]);
                        }
                    });
                    errors = errors.join('\n');
                    showSwal([ errors ], 'error');
                    window.showLoading(false);
                }
                if (is_activecode1) {
                    init_auth_timer(1);
                }
                if (is_activecode2) {
                    init_auth_timer(2);
                }
            },
            error: function(data) {
                window.showLoading(false);
                changeCaptcha();
                if (data.status === 422 || data.status === 429) {
                    var json = data.responseJSON;
                    var errors = [];
                    $.each(json.errors, function (index, element) {
                        for (var i = 0; i < $(this).length; i++) {
                            errors.push($(this).get(i));
                        }
                    });
                    errors = errors.join('\n');
                    showSwal([ errors ], 'error');
                    window.showLoading(false);
                }
                if (data.status === 419) {
                    showSwal([ 'درخواست نامعتبر است. لطفاْ صفحه را رفرش کرده و دوباره درخواست دهید.' ], 'error');
                    window.showLoading(false);
                }
            }
        });
    });
    $('body').on('click', '.multiple-account-content .types a', function(index, element) {
        var type = $(this).attr('data-type');
        var form_login = $('form.form-auth-login');
        form_login.append('<input type="hidden" name="_t" value="' + type + '" />');
        $('.multiple-account').fadeOut('fast');
        form_login.find('button[type="submit"]').click();
    });
    window.showSwal = function(text, state) {
        if (state == undefined) {
            state = 'success';
        }
        swal({
            title: '',
            text: text.join('\n'),
            icon: state,
            button: 'باشه',
            html: true
        });
    };
    $('body').on('keyup', '.flex-verfiy-codes > input', function(e) {
        e.preventDefault();
        if (e.key === 'Alt' || e.key === 'Ctrl' || e.key === 'Shift' || e.key === 'Enter' || e.key === 'Tab') {
            return false;
        }
        if (e.key === 'Backspace') {
            $(this).val('');
            if ($(this).next().length > 0) {
                $(this).next().focus();
            }
        } else {
            if ($(this).val() !== '') {
                $(this).val(e.key);
            }
            var inputs = $(this).parent().children('input');
            var code = '';
            var verify_input_code = $(this).parent().parent().parent().find('[data-id="verifyCodeInput"]');
            $.each(inputs, function() {
                code += $(this).val().toString().trim();
            });
            code = code.split('').reverse().join('');
            verify_input_code.val(code);
            if ($(this).prev().length > 0) {
                $(this).prev().focus();
            }
        }
    });
    $('body').on('click', '[data-action="gobacksignup"]', function() {
        var type = $(this).attr('data-type');
        if (interval_progressbar1 != null) {
            clearInterval(interval_progressbar1);
            interval_progressbar1 = null;
        }
        if (type == 0) {
            showSignupStep('#form-signup-merchants', '#form-signup-activecode', 1);
        }
        if (type == 1) {
            showSignupStep('#form-signup-customers', '#form-signup-activecode2', 1);
        }
        $('#form-signup-resendcode').addClass('hidden');
    });
    $('body').on ('click', '.flex-verfiy-codes > input', function() {
        $(this).val('');
    });
});
