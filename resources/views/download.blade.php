<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Canvas Jquery Code for saving screenshot -->
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 
    <meta name="screenShot" content="{{url('htmlcanvas')}}">
    <title></title>
</head>
<body>
   <div class="container">
       <div class="content">
           <div id='calendar'>-- Data I want to convert to image --</div>

            <form method="post" enctype="multipart/form-data" id="myForm">
                {{csrf_field()}}
                <input type="hidden" name="img_val" id="img_val" value="" />
                <input type="submit" id="take_shot" value="Take Screenshot"/>
            </form>
    </div>
        
    <script>
    $.ajaxSetup({
        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
     var dataurl = "";
     $('#take_shot').click(function(){
        $('#calendar').html2canvas({
            onrendered: function (canvas) {
                //Set hidden field's value to image data (base-64 string)
                dataurl = $('#img_val').val(canvas.toDataURL("image/png"));
            }
        });
        var form_data = new FormData($("#myForm")[0]);

            $.ajax({
                type:'POST',
                url: $('meta[name="screenShot"]').attr('content'),
                data : form_data,
                cache: false,
                processData: false,
                contentType: false,

                success:function(data){
                    alert(data);
                }
            }); 

        return false;
     });
    });
    </script>
</body>
</html>