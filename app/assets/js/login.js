function login(e) {
    e.preventDefault();

    const username = $('#username').val();
    const password = $('#password').val();

    $.ajax({
        type: "POST",
        url: '/api/login',
        data: {
            username,
            password
        },
    }).done(() => location.reload());
}
