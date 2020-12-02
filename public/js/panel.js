$(function() {
    window.showFormError = function(form_instance, text, state) {
        if (state == undefined) {
            state = 'success';
        }
        var error_container = form_instance.find('div.alert.alert-warning');
        console.log(error_container.length );
        if (error_container.length > 0) {
            text = text.join('<br/>');
            error_container.html(text);
            error_container.removeClass('hidden');
        }
    };
    $('body').on('click', 'form[data-type="ajax-form"] button[name][type="submit"]', function(e) {
        console.log(22222222222);
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
        var form = $(this);
        var submit_button = form.find('button[type="submit"]');
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
        

        // window.showLoading(true);
        submit_button.prop('disabled', true);
        submit_button.addClass('loading-button');
        var inputs = form.find('input');
        $(this).ajaxSubmit({
            success: function(data) {
                inputs.removeClass('has-error');
                submit_button.prop('disabled', false);
                submit_button.removeClass('loading-button');
                if ($('form .alert.alert-warning').length > 0) {
                    $('form .alert.alert-warning').addClass('hidden');
                }
                // window.showLoading(false);
                var returnUrl = data.hasOwnProperty('returnUrl') ? data.returnUrl : null;
                if (data.status == true) {
                    if (data.hasOwnProperty('showAlert') && data.showAlert == true) {
                        showFormError(form, [ data.message ], 'success');
                    } else {
                        window.sessionStorage.setItem('_message_', data.message);
                    }
                    if (returnUrl != null) {
                        window.location.href = data.returnUrl;
                    }
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
                    errors = errors.join('<br />');
                    showFormError(form, [ errors ], 'error');
                }
            },
            error: function(data) {
                submit_button.prop('disabled', false);
                submit_button.removeClass('loading-button');
                // window.showLoading(false);
                
                if (data.status === 422) {
                    inputs.removeClass('has-error');
                    var json = data.responseJSON;
                    var errors = [];
                    $.each(json.errors, function (index, element) {
                        form.find('[name="' + index + '"]').addClass('has-error');
                        for (var i = 0; i < $(this).length; i++) {
                            if (errors.indexOf($(this).get(i)) < 0) {
                                errors.push($(this).get(i));
                            }
                        }
                    });
                    errors = errors.join('<br />');
                    showFormError(form, [ errors ], 'error');
                }
            }
        });
    });
    window.showSwal = function(text, state) {
        if (state == undefined) {
            state = 'success';
        }
        return swal({
            title: '',
            text: text.join('\n'),
            icon: state,
            button: 'باشه',
            html: true
        });
    };
    var BottomModal = {
        events: {},
        show: function(attr) {
            var element = $(attr);
            var bm_body = element.find('.bm-body');
            bm_body.removeClass('bm-body-hide').addClass('bm-body-show');
            element.fadeIn();
            if (BottomModal.events[attr] !== undefined) {
                $.each(BottomModal.events[attr], function(index, element) {
                    BottomModal.events[attr][index]();
                });
            }
        },
        hide: function(attr) {
            var element = $(attr);
            var bm_body = element.find('.bm-body');
            bm_body.removeClass('bm-body-show').addClass('bm-body-hide');
            element.fadeOut();
        },
        init: function() {
            var elements = $('[data-toggle="bottom-modal"]');
            $.each(elements, function(index, element) {
                var button = $(this);
                var target = button.attr('data-target');
                button.on('click', function() {
                    BottomModal.show(target);
                    if (target == '#bottom-modal-shop-map') {
                        $('#map-shop-create').attr('data-input', button.attr('data-input'));
                    }
                });
                $(target).find('[data-dismiss]').on('click', function() {
                    BottomModal.hide(target);
                });
                $(target).find('[data-accept]').on('click', function() {
                    BottomModal.hide(target);
                    button.children('span').text('تغییر موقعیت');
                });
            });
        },
        onShown: function(attr, callback) {
            if (BottomModal.events[attr] === undefined) {
                BottomModal.events[attr] = [];
            }
            BottomModal.events[attr].push(callback);
        },
        showLoading: function(attr) {
            var element = $(attr);
            var bm_loading = element.find('.bm-loading');
            bm_loading.show();
        },
        hideLoading: function(attr) {
            var element = $(attr);
            var bm_loading = element.find('.bm-loading');
            bm_loading.fadeOut('fast');
        }
    };
});
