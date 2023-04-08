@extends('layouts.app')

@section('content')
<!-- Content -->
<div class="container flex-grow-1 container-p-y my-1">

	<!-- Examples -->
	<div class="row">
		<div class="d-flex justify-content-center">
			<div class="col-6 mb-3">
				<div class="card">
					<div class="card-body">
						<div class="col-md-12">
							<div class="row d-flex justify-content-center">
								<div class="col-md-8 text-center">
								<div class="text-center">
								<p>Aponte a câmera do celular para o Código QR e obtenha todos os detalhes do pagamento</p>
								</div>
								</div>
							</div>
							
							<div class="visible-print text-center">
							    <img src="{{$pixs->qrcode_path}}" height="320px">
							</div>
							<div class="text-center">
								<h2>R$ {{ $pixs->total }}</h2>
							</div>

							<div>
		                        <label for="pix" class="form-label">Pix ModoBank</label>
		                        {!! Form::textarea('pix', $pixs->pix, array('id' => 'pix', 'class' => 'form-control', 'rows' => 3, 'placeholder' =>'Util Tecnologia')) !!}
		                    </div>

		                    <div class="col-12">
		                    	<div class="col-md-6 m-3">
		                    		<button type="submit" class="btn btn-success">
                                    <span class="tf-icons bx bx-copy-alt"></span> Copiar PIX
                                </button>
		                    	</div>
                                
                        </div>
							
						</div>
	
					</div>
				</div>
			</div>
		</div>
	</div>



</div>
@endsection

@push('scripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<script language="javascript">
		$(document).ready(function() {
		    $("button").click(function(){
		        $("textarea").select();
		        document.execCommand('copy');
		    });
		});
	</script>
@endpush