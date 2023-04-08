$(document).ready(function(){
    
    var element = $('.content');
    
    $('#saveReport').on('click', function(){
        html2canvas(element, {
            background: '#ffffff',
            onrendered: function(canvas){
                var imgData = canvas.toDataURL('image/jpeg');
                $.ajax({
                    url: '/d/download',
                    type: 'post',
                    dataType: 'text',
                    data: {
                        base64data: imgData
                    }
                });
                alert('Success!');
                console.log(imgData);
            }
        });
    });
    
});
