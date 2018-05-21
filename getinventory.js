$('document').ready(function() {
    $.ajax({
        type: 'POST',
        url: 'getinventory.php',
        success: function(data) {
            inventory = JSON.parse(data);
            trends = Object.keys(inventory);
            document.getElementById('inventoryspinner').setAttribute("style","display:none");
            document.getElementById('inventorytable').setAttribute("style","width:100%");
            for (i = 0; i < trends.length; i++) {
                trend = trends[i];
                amount = inventory[trend]['amount'];
                value = inventory[trend]['value'];
                document.getElementById('inventorytbody').innerHTML += "<tr id='"+trend+"row'><td class='mdl-data-table__cell--non-numeric'><a href='keyword.php?kw="+encodeURI(trend)+"'>"+trend+"</a></td><td>"+amount+"</td><td>"+value+"</td><td class='mdl-data-table__cell--non-numeric'><button class='mdl-button mdl-js-button mdl-button--accent' name='"+trend+"' id='"+trend+"button' onclick='selltrend(this.name); return false;'>Sell</button></td></tr>";
            }
        }
    });
});
