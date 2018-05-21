$('document').ready(function() {
    $('#signupform').submit(function() {
        if (validateForm()) {
            var data = $('#signupform').serialize(),
                snackbarContainer = document.querySelector('#toast');
            $.ajax({
                type: 'POST',
                url: 'processsignup.php',
                data: data,
                beforeSend: function() {
                    document.getElementById('signupbutton').setAttribute("disabled", "");
                    document.getElementById('signupspinner').classList.add('is-active');
                },
                success: function(data) {
                    if (data==1) {
                        location.href = "dashboard.php";
                    }
                    else {
                        document.getElementById('signupbutton').removeAttribute("disabled");
                        document.getElementById('signupspinner').classList.remove('is-active');
                        var sdata = {message: data};
                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    }
                }
            });
        }
        return false;
    });
});
