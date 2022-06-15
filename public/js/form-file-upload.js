$(function () {
    "use strict";

    $('#fancy-file-upload').FancyFileUpload({
        params: {
            action: 'fileuploader'
        },
        maxfilesize: 1000000
    }).attr('accept', 'application/pdf').prop("maxLength", 1);

    // $(document).ready(function () {
    //     $('#image-uploadify').imageuploadify();
    // })


});