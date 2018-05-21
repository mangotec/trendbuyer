$('document').ready(function() {
    var snackbarContainer = document.querySelector('#toast');
    function validateForm(type) {
        var field = document.forms[type+"form"][type].value;
        if (type == "") {
            var sdata = {message: 'All fields must be filled in. '};
            snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
            return false;
        }
        else {
            return true;
        }
    }
    $('#emailform').submit(function() {
        if (validateForm('email')) {
            var data = $('#emailform').serialize();
            $.ajax({
                type: 'POST',
                url: 'changeemail.php',
                data: data,
                beforeSend: function() {
                    document.getElementById('emailbutton').setAttribute("disabled", "");
                    document.getElementById('emailspinner').classList.add('is-active');
                },
                success: function(data) {
                    document.getElementById('emailbutton').removeAttribute("disabled");
                    document.getElementById('emailspinner').classList.remove('is-active');
                    if (data==1) {
                        var sdata = {message: 'Email successfully changed'};
                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    }
                    else {
                        var sdata = {message: data};
                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    }
                }
            });
        }
        return false;
    });
    $('#passwordform').submit(function() {
        if (validateForm('password')) {
            if (document.forms["passwordform"]["password"].value == document.forms["passwordform"]["password2"].value) {
                var data = $('#passwordform').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'changepassword.php',
                    data: data,
                    beforeSend: function() {
                        document.getElementById('passwordbutton').setAttribute("disabled", "");
                        document.getElementById('passwordspinner').classList.add('is-active');
                    },
                    success: function(data) {
                        document.getElementById('passwordbutton').removeAttribute("disabled");
                        document.getElementById('passwordspinner').classList.remove('is-active');
                        if (data==1) {
                            var sdata = {message: 'Password successfully changed'};
                            snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                        }
                        else {
                            var sdata = {message: data};
                            snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                        }
                    }
                });
            }
            else {
                var sdata = {message: 'Passwords do not match'};
                snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
            }
        }
        return false;
    });
    $('#themeform').submit(function() {
        var colours = ["deep_orange", "red", "pink", "purple", "deep_purple", "indigo", "blue", "light_blue", "cyan", "teal", "green", "light_green", "lime", "yellow", "amber", "orange", "brown", "blue_grey", "grey"],
            colour1 = document.getElementById("colour1").value,
            colour2 = document.getElementById("colour2").value;
        if ($.inArray(colour1, colours) > -1 && $.inArray(colour2, colours.slice(0, 16)) > -1 && colour1 !== colour2) {
            document.getElementById('mdlcss').setAttribute("href", "https://code.getmdl.io/1.3.0/material."+colour1+"-"+colour2+".min.css");
            document.querySelector("meta[name=theme-color]").setAttribute("content", getPrimaryColour());
            var data = $('#themeform').serialize();
            $.ajax({
                type: 'POST',
                url: 'changetheme.php',
                data: data,
                beforeSend: function() {
                    document.getElementById('themebutton').setAttribute("disabled", "");
                    document.getElementById('themespinner').classList.add('is-active');
                },
                success: function(data) {
                    document.getElementById('themebutton').removeAttribute("disabled");
                    document.getElementById('themespinner').classList.remove('is-active');
                    if (data==1) {
                        var sdata = {message: 'Theme successfully changed'};
                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    }
                    else {
                        var sdata = {message: data};
                        snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                    }
                }
            });
        }
        else {
            var sdata = {message: 'Invalid theme'};
            snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
        }
        return false;
    });
});
function deleteaccount() {
    if (confirm("Are you sure you want to delete your account? This will permenantly delete all of your progress. ")) {
        var snackbarContainer = document.querySelector('#toast');
        $.ajax({
            type: 'POST',
            url: 'deleteaccount.php',
            beforeSend: function() {
                document.getElementById('deletebutton').setAttribute("disabled", "");
                document.getElementById('deletespinner').classList.add('is-active');
            },
            success: function(data) {
                if (data==1) {
                    location.href = "signout.php";
                }
                else {
                    document.getElementById('deletebutton').removeAttribute("disabled");
                    document.getElementById('deletespinner').classList.remove('is-active');
                    var sdata = {message: data};
                    snackbarContainer.MaterialSnackbar.showSnackbar(sdata);
                }
            }
        });
    }
}
