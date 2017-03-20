$('#file_upload1').uploadify({
    'swf': '/public/upload/uploadify.swf',
    'uploader' : '/public/upload/uploadify.php',
    'buttonImage':'/static/img/u31.png' ,
    'height':50,
    'width':50,
    'onUploadSuccess' : function(file, data, response) {
        $('#img_yulan1').append("<img src='" + data + "' alt='' height='80' style='margin:30px 5px 5px 5px;'>");

    }
});