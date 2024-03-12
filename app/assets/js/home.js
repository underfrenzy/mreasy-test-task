function increment() {
    const userId = $('#user-id').text();
    const counterContainer = $('#user-counter')
    const incrementButton = $('#increment')

    const userCounter = Number(counterContainer.text());

    incrementButton.prop("disabled", true);

    $.ajax({
        type: "POST",
        url: '/api/user/counter',
        data: {
            userId,
            userCounter: userCounter + 1
        }
    }).done((response) => {
        const data = JSON.parse(response)
        counterContainer.text(data.counter)

        incrementButton.prop("disabled", false);
    });
}

function logout() {
    document.cookie = 'token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';

    location.reload();
}
