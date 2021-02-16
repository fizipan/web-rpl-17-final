const flashDataEbook = $('.flash-data-ebook').data('flashdata');

if (flashDataEbook) {
    swal({
        title: 'Your E-book',
        text: 'has been ' + flashDataEbook,
        icon: 'success',
    });

}

const flashDataTutorial = $('.flash-data-tutorial').data('flashdata');

if (flashDataTutorial) {
    swal({
        title: 'Your Tutorial',
        text: 'has been ' + flashDataTutorial,
        icon: 'success',
    });

}

const flashDataProject = $('.flash-data-project').data('flashdata');

if (flashDataProject) {
    swal({
        title: 'Your Project',
        text: 'has been ' + flashDataProject,
        icon: 'success',
    });

}

const flashDataUser = $('.flash-data-user').data('flashdata');

if (flashDataUser) {
    swal({
        title: 'User',
        text: 'has been ' + flashDataUser,
        icon: 'success',
    });

}

const flashDataLoginError = $('.flash-data-login').data('flashdata');

if (flashDataLoginError) {
    swal({
        title: 'Anda Harus',
        text: flashDataLoginError,
        icon: 'warning',
    });

}

const flashDataLoginSuccess = $('.flash-data-login-success').data('flashdata');

if (flashDataLoginSuccess) {
    swal({
        title: 'Anda berhasil login',
        text: "dengan email " + flashDataLoginSuccess,
        icon: 'success',
    });

}
