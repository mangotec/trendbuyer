$('document').ready(function() {
    $('#signinform').submit(function() {
        if (validateForm()) {
            var data = $('#signinform').serialize(),
                snackbarContainer = document.querySelector('#toast');
            $.ajax({
                type: 'POST',
                url: 'processsignin.php',
                data: data,
                beforeSend: function() {
                    document.getElementById('signinbutton').setAttribute("disabled", "");
                    document.getElementById('signinspinner').classList.add('is-active');
                },
                success: function(data) {
                    if (data==1) {
                        location.href = "dashboard.php";
                    }
                    else {
                        document.getElementById('signinbutton').removeAttribute("disabled");
                        document.getElementById('signinspinner').classList.remove('is-active');
                        var sdata = {message: data};
                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    }
                }
            });
        }
        return false;
    });
});
