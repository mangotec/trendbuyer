function selltrend(trend) {
    if(confirm("Are you sure?")) {
        console.log(trend);
        var snackbarContainer = document.querySelector('#toast');
        $.ajax({
            type: 'POST',
            url: 'processsell.php',
            data: {trend: trend},
            beforeSend: function() {
                document.getElementById(trend+'button').setAttribute("disabled", "");
            },
            success: function(data) {
                document.getElementById(trend+'button').removeAttribute("disabled");
                if (data==1) {
                    gettrendcoin();
                    var sdata = {message: "Sale successful"};
                    document.getElementById(trend+'row').setAttribute("style", "display:none");
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
}
