@extends('layouts.app')

@section('css')
<!-- Page CSS -->
<!-- Page -->
<link rel="stylesheet" href="{{ asset('_theme/assets/vendor/css/pages/page-auth.css') }}" />

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
									<img src="{{$links->qrcode_path}}" class="img-fluid">
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
								<h2>R$ {{ $links->total }}</h2>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="pix" class="form-label">Pix Copia e Cola</label>
						{!! Form::textarea('pix', $links->pix, array('id' => 'pix', 'class' => 'form-control', 'rows' => 3, 'readonly' => 'true', 'placeholder' =>'Util Tecnologia')) !!}
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-success">
							<span class="tf-icons bx bx-copy-alt"></span> Copiar PIX
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script language="javascript">
	$(document).ready(function() {
		$("button").click(function(){
			$("textarea").select();
			document.execCommand('copy');
		});
	});

	$.ajaxSetup({  
		headers: {  
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
		}  
	});
</script>

@endpush