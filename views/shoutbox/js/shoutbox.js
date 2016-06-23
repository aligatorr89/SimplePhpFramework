$('document').ready(function () {

    var $form = $('#frame #shoutForm');
    var $content = $('#frame #table #here');
    var $table = $('#frame #table');
    var $delete = $('#frame #table #here tr td .del');
    
    $form.submit(addShout);

    $.get('shoutbox/loadshouts', getShouts);

    $table.on('click', '.del', function () {
        $del = $(this);
        var shoutid = $del.attr('rel');
        $.post('shoutbox/deleteShout', {'shoutid': shoutid}, function () {
            $del.parents('tr').remove();
        });
    });


    function getShouts(o) {
        var jsonData = JSON.parse(o);
        var html = '';
        var c = '';
        for (i = 0; i < jsonData.length; i++) {
            if (i % 2) {
                c = 'info';
            } else {
                c = 'warning';
            } 
            html += '<tr class=' + c + '><td>' + jsonData[i].email + '</td> <td>' + jsonData[i].shout + '</td>' +
                    '<td><a href="#" rel='+jsonData[i].shoutid +  ' class="del"><span class="glyphicon glyphicon-remove"> <span></a></td></tr>';
        }
        $content.append(html);
        $table.scrollTop($table[0].scrollHeight);
        /*var table = document.getElementById('table');
         table.scrollTop = table.scrollHeight;*/
        //console.log($delete.attr('rel'));
    }

    function addShout() {
        var $postData = $form.serialize();
        var $url = $form.attr('action');
        var $lastRow = $content.children('tr').last();
        var atr = $lastRow.attr('class');
        if (atr == 'warning') {
            atr = 'info';
        } else {
            atr = 'warning';
        }
        $.post($url, $postData, function (o) {
            var jsonData = JSON.parse(o);
            var html = '<tr class=' + atr + '><td>' + jsonData.email + '</td> <td>' + jsonData.shout + '</td>' +
                    '<td><a href="#" class="del"><span class="glyphicon glyphicon-remove"> <span></a></td></tr>';
            $content.append(html);

            $table.scrollTop($table[0].scrollHeight);
        });
        return false;
    }

    function deleteShout() {

    }

});

