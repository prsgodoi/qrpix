<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

	<div class="container">
		<div class="content">
			<div class="title">Laravel 5</div>
			<p class="paragraph">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, veritatis dolores dicta at atque nobis maxime ea explicabo facilis molestiae voluptatibus nam nesciunt necessitatibus placeat ducimus magni nihil pariatur eligendi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga adipisci magnam in. Earum, nihil, expedita, blanditiis, iste ipsam amet obcaecati culpa ad quod itaque esse facere veritatis ratione ipsum quis.
			</p>
			<p class="paragraph">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, veritatis dolores dicta at atque nobis maxime ea explicabo facilis molestiae voluptatibus nam nesciunt necessitatibus placeat ducimus magni nihil pariatur eligendi.
			</p>
		</div>

		<button id="saveReport">Save Report</button>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

	<script>
		$.ajaxSetup({  
			headers: {  
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
			}  
		});

		$(document).ready(function(){

			var element = $('.content');

			$('#saveReport').on('click', function(){
				html2canvas(element, {
					background: '#ffffff',
					onrendered: function(canvas){
						var imgData = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octect-stream");
						$.ajax({
							url: 'download',
							type: 'post',
							dataType: 'text',
							data: {
								base64data: imgData
							}
						});
					}
				});
			});

		});
	</script>
</body>

</html>