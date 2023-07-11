window.addEventListener('DOMContentLoaded', function () {
    document.formvalidator.setHandler('notzero', function (value) {
        return value != 0;
    });
}
)
