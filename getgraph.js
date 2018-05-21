function getgraph(keyword, timeframe) {
    $.ajax({
        type: 'GET',
        url: 'getgraph.php',
        data: {
            kw: keyword,
            tf: timeframe
        },
        beforeSend: function() {
            document.getElementById('graphspinner').classList.add('is-active');
            document.getElementById('graphsect').setAttribute("style", "display:none");
        },
        success: function(data) {
            document.getElementById('graphspinner').classList.remove('is-active');
            document.getElementById('spinnersect').setAttribute("style", "display:none");
            document.getElementById('graphsect').removeAttribute("style", "display:none");
            drawgraph(data);
            $(window).resize(function() {
                drawgraph(data)
            });
        }
    });
}

function drawgraph(data) {
    var canvas = document.getElementById('graph'),
        context = canvas.getContext('2d'),
        cardwidth = document.getElementById('graphcard').getBoundingClientRect().width,
        width = canvas.width = cardwidth,
        height = canvas.height = 150;
        stats = JSON.parse(data);

    context.translate(0, height);
    context.scale(1, -1);

    context.fillStyle = '#ffffff';
    context.fillRect(0, 0, width, height);

    var left = 0,
        prev_stat = (stats[0]/110)*height,
        move_left_by = width/stats.length;

    for(stat in stats) {
        the_stat = (stats[stat]/110)*height;

        context.beginPath();
        context.moveTo(left, prev_stat);
        context.lineTo(left+move_left_by, the_stat);
        context.lineWidth = 4;
        context.lineCap = 'round';
        context.strokeStyle = getAccentColour();
        context.stroke();

        prev_stat = the_stat;
        left += move_left_by;
    }

}
$('document').ready(function() {
    getgraph(kw, 'today 12-m');
    document.getElementById('timeframe').onchange = function(){
        getgraph(kw, document.getElementById('timeframe').value);
    };
});
