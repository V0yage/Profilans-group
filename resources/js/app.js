$('form').on('submit', (e) => {
    let form = e.target;
    let token = $(form).find('[name="_token"]').val();

    $.post({
        url: '/store',
        data: $(form).serialize(),
        headers: { X_CSRF_TOKEN: token },
        success: (response) => {
            if (response.errors) {
                Object.keys(response.errors).forEach((key) => {
                    let field = $(form).find(`[name='${key}']`);
                    let error = response.errors[key];

                    if (!$(field).next().hasClass('invalid-feedback')) {
                        $(field).after(`<div class="invalid-feedback">${error}</div>`);
                    }
                    $(field).next().text(error);
                    $(field).addClass('is-invalid');
                });
            } else {
                $(form).closest('.card').css('display', 'none');
                $('.alert-success').fadeIn();
                $('.extern').text(response.data.extern);
                $('.short').attr('href', response.data.short).text(response.data.short);
            }
        },
        error: (response) => {
            alert('На сервере возникла непредвиденная ошибка. Повторите запрос позже.');
        }
    });

    e.preventDefault();
    return false;
});
