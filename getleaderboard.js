$('document').ready(function() {
    $.ajax({
        type: 'POST',
        url: 'getleaderboard.php',
        success: function(data) {
            leaderboard = JSON.parse(data);
            document.getElementById('leaderboardspinner').setAttribute("style","display:none");
            document.getElementById('leaderboardtable').setAttribute("style","width:100%");
            for (i = 0; i < leaderboard.length; i++) {
                var user = leaderboard[i]['username'],
                    trendcoin = leaderboard[i]['trendcoin'],
                    premium = leaderboard[i]['premium'];
                if (premium) {
                    var userstyle = "<span style='color:blue'>"+user+"</span>";
                }
                else {
                    var userstyle = user;
                }
                document.getElementById('leaderboardtbody').innerHTML += "<tr id='"+user+"row'><td>"+(i+1)+"</td><td class='mdl-data-table__cell--non-numeric'>"+userstyle+"</td><td>"+trendcoin+"</td></tr>";
            }
        }
    });
});
