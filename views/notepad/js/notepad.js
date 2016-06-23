$(function () {

    $.get('notepad/loadNotes', getNotes);

    $('#insert').submit(addNote);

    $('#table').on('click', '.del', deleteNote);

    $('#table').find('#changeDate').on({click: function (o) {
            if ($(this).attr('smth')) {
                changeBackDate();
                $(this).attr('smth', null);
                return false;
            }
            $(this).attr('smth', '0');
            changeMySqlDate(0, 12, true);
        }
    });

    function getNotes(o) {
        var getLastRowId = $("#table").find("td[name='noteid']").last();
        var getCurrentRow = $('#table tbody');
        var textId = getLastRowId.text();
        var html = '';
        if (!textId) {
            textId = 1;
        }
        var jsonData = JSON.parse(o);
        var localStore = [];
        for (var i = 0; i < jsonData.length; i++) {
            var noteid = jsonData[i].noteid;
            html += '<tr> <td name=noteid>' + textId + '</td>' +
                    '<td name="date">' + jsonData[i].date + '</td>' + '<td>' + jsonData[i].note + '</td>' +
                    '<td><a href="#" class="del" rel=' + noteid + '><span class="glyphicon glyphicon-remove"> <span></a></td></tr>';
            textId++;
            localStore[i] = jsonData[i].date;
        }
        getCurrentRow.append(html);
        sessionStorage.setItem('dateSql', JSON.stringify(localStore));
        return false;
    }

    function addNote() {
        var getLastRowId = $("#table").find("td[name='noteid']").last();
        var getCurrentRow = $('#table tbody');
        var dateFormat = $('#table #changeDate');
        var textId = getLastRowId.text();
        if (!textId) {
            textId = 1;
        } else {
            textId++;
        }
        var url = $(this).attr('action');
        var thisRow = $(this).serialize();
        $.post(url, thisRow, function (o) {
            var jsonData = JSON.parse(o);
            var noteid = jsonData.noteid;
            if (dateFormat.attr('smth')) {
                changeMySqlDate(0, 12, true);
            }
            var html = '<tr> <td name=noteid>' + textId + '</td>' +
                    '<td name="date">' + jsonData.date + '</td>' + '<td>' + jsonData.note + '</td>' +
                    '<td><a href="#" class="del" rel=' + noteid + '><span class="glyphicon glyphicon-remove"> <span></a></td></tr>';
            getCurrentRow.append(html);
            sessionStorage.setItem('dateAdded', JSON.stringify(jsonData.date));
        });
        return false;
    }

    function deleteNote() {
        delItem = $(this);
        var noteid = delItem.attr('rel');
        var url = 'notepad/deleteNote';
        $.post(url, {'noteid': noteid}, function () {
            delItem.parents('tr').remove();
        });
    }

    /**
     * 
     * @param {Number} x What you want to include in the date 
     * @param {Numer} y  2016-07-05 12:12:36-> (0,12) -> 2016-07-05
     * @param {Boolean} z set to true if you want a month name in your date
     * @returns {Boolean}
     */
    function changeMySqlDate(x, y, z) {
        var getRowDate = $("#table").find("td[name='date']");
        var jsonData = JSON.parse(sessionStorage.getItem('dateSql'));
        jsonData = jsonData.concat(JSON.parse(sessionStorage.getItem('dateAdded')));
        var l = jsonData.length;
        for (i = 0; i < l; i++) {
            var getCurrentDate = jsonData[i];
            var separators = /['\-',' ',':']/g;
            var change = getCurrentDate.split(separators);
            if (z) {
                change[2] = getMonthName(Number(change[2]));
                change = change.toString();
                change = change.replace(/['\,']/g, ' ');
            }
            getRowDate.eq(i).text(change.substring(x, y));
        }
    }

    function changeBackDate() {
        var getRowDate = $("#table").find("td[name='date']");
        var getRowText = sessionStorage.getItem('dateSql');
        var jsonData = JSON.parse(getRowText);
        jsonData = jsonData.concat(JSON.parse(sessionStorage.getItem('dateAdded')));
        var l = jsonData.length;
        for (i = 0; i < l; i++) {
            var dateFormat = jsonData[i];
            getRowDate.eq(i).text(dateFormat);
        }
    }

    function getMonthName(num) {
        switch (num) {
            case 1:
                return "January";
                break;
            case 2:
                return "Februray";
                break;
            case 3:
                return "March";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "June";
                break;
            case 7:
                return "July";
                break;
            case 8:
                return "August";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "October";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "December";
                break;
            default:
                return num;
        }
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

});


