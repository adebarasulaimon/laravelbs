$( document ).ready(function() {

    $('#read-book-btn, #download-book-btn').click(function () {
        var bookId = $('#bookId').text();
        var uri = "/books/"+bookId+"/updateDownloads";
        $.get(uri, function (data) {
            if(data['status'] == 'ok'){
                $('#book-downloads').text(data['totalDownloads']);
            }
        });
    });

});

