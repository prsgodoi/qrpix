@extends('layouts.app')

@section('css')
<!-- Meta -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('_theme/assets/vendor/css/pages/page-auth.css') }}" />
<style>
	.content {
		padding: 5px 0;
		background-color: #FFFFFF;
		text-align: center;
	}
</style>
@endsection

@section('content')
<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">
			<!-- Forgot Password -->
			<div class="card">
				<div class="card-body">
					<div class="content">
						<div class="mb-3">
							<div class="text-center">
								<p>Aponte a câmera do celular para o Código QR e obtenha todos os detalhes do pagamento</p>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-center">
								<div class="col-md-12 px-0">
									<img src="{{ url($pixs->qrcode_path) }}" class="img-fluid">
								</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-center">
								<h2>QR Code</h2>
							</div>
						</div>
						<div class="mb-3">
							<div class="text-center">
								<h2>R$ {{ $pixs->total }}</h2>

							</div>
						</div>
					</div>
					<div class="mb-3">
						<div class="text-center">
							<a href="{{ route('pix.download', $pixs->id) }}" class="btn btn-dark">Download</a>
							{{-- <button id="download" class="btn btn-success">Compartilhar</button> --}}
						</div>
					</div>
					<div class="mb-3">
						<label for="pix" class="form-label">Pix Copia e Cola</label>
						{!! Form::textarea('pix', $pixs->pix, array('id' => 'pix', 'class' => 'form-control', 'rows' => 3, 'readonly' => 'true', 'placeholder' =>'Util Tecnologia')) !!}
					</div>
					<div class="mb-3">
						<button class="btn btn-success" onClick="copy('pix')">
							<span class="tf-icons bx bx-copy-alt"></span> Copiar PIX
						</button>
					</div>
					<div class="mb-3">
						<div class="input-group">
							<input type="text" class="form-control" id="short_link" value="{{ url('l/'.$pixs->link->short_link) }}"/>
							<button class="btn btn-outline-primary" onClick="copy('short_link')">
								<span class="tf-icons bx bx-copy-alt"></span> Link
							</button>
						</div>
					</div>
				</div>

				<div class="text-center">
					<a href="{{ route('pix.index') }}" class="d-flex align-items-center justify-content-center">
						<span class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></span>
						<span class="tf-icons bx bx-qr"></span>
						Gerar novo QR Code
					</a>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

<script language="javascript">
	//Pass the id of the <input> element to be copied as a parameter to the copy()
	let copy = (textId) => {
	  //Selects the text in the <input> elemet
	  document.getElementById(textId).select();
	  //Copies the selected text to clipboard
	  document.execCommand("copy");
	};

	$.ajaxSetup({  
		headers: {  
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
		}  
	});

	$(document).ready(function(){

		var element = $('.content');

		$('#download').on('click', function(){
			html2canvas(element, {
				background: '#ffffff',
				onrendered: function(canvas){
					var imgData = canvas.toDataURL("image/png").replace("image/png", "image/octect-stream");
					$.ajax({
						url: '{{ route('base64') }}',
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

@endpush