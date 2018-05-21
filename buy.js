$('document').ready(function() {
    $('#buyform').submit(function() {
        if (validateForm() && confirm("Are you sure?")) {
            var data = $('#buyform').serialize(),
                snackbarContainer = document.querySelector('#toast');
            $.ajax({
                type: 'POST',
                url: 'processbuy.php',
                data: data,
                beforeSend: function() {
                    document.getElementById('buybutton').setAttribute("disabled", "");
                    document.getElementById('buyspinner').classList.add('is-active');
                },
                success: function(data) {
                    document.getElementById('amount').value = "";
                    document.getElementById('buybutton').removeAttribute("disabled");
                    document.getElementById('buyspinner').classList.remove('is-active');
                    if (data==1) {
                        gettrendcoin();
                        var sdata = {message: "Purchase successful"};
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
});
