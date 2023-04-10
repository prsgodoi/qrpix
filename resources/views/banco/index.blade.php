@extends('layouts.app')

@section('css')

@endsection

@section('content')
<!-- Content -->
<div class="container flex-grow-1 container-p-y my-1">
	<h3>Olá, Util Tecnologia</h3>
	<p>Crie agora seu QR Code <spam class="fw-bold "><span class="text-muted fw-light">PIX /</span> Banco Sicredi</spam></p>


	<div class="row">
		<!-- Order Statistics -->
		<div class="col-md-6">
			<div class="card mb-4">
				<div class="card-header d-flex align-items-center justify-content-between pb-0">
					<div class="card-title mb-0">
						<div class="badge bg-label-info p-3 rounded mb-3">
							<i class='bx bx-code-curly fs-3'></i>
						</div>
					</div>
					<div class="dropdown">
						<i class="bx bx-dots-vertical-rounded"></i>
					</div>
				</div>
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center mb-3">
						<div class="d-flex flex-column gap-1">
							<h4>Gerar QR Code PIX <span class="badge badge-demo bg-label-info">dev</span></h4>
							<span>Esta é uma ferramenta para facilitar a geração dos seus QR Codes para pagamentos com Pix utilizando a chave aleatória do banco Sicredi.</span>
						</div>
						<div id="orderStatisticsChart"></div>
					</div>
					<div class="p-0 m-0">
						<form action="{{ route('banco.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('POST')
							{!! Form::hidden('key', '3dcefd46-ce05-4b7d-854f-db12baadd9d8') !!}
							{!! Form::hidden('recipient', 'UTIL PROVEDOR DE INTERNET LTDA') !!}
							{!! Form::hidden('city', 'SAO JOSE DO RIO CLARO') !!}
							<div class="mb-3">
								<label for="name" class="form-label">Cliente</label>
								{!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' =>'Util Tecnologia', 'required' => 'required')) !!}
							</div>
							<div class="mb-3">
								<div class="col-md-6">
									<label for="total" class="form-label">Valor</label>
									<div class="input-group">
										<span class="input-group-text">R$</span>
										{!! Form::text('total', NULL, array('id' => 'total', 'class' => 'form-control', 'placeholder' =>'10.00', 'required' => 'required')) !!}
									</div>
								</div>
							</div>
							<div class="mb-3">
								<label for="description" class="form-label">Identificador da Transação</label>
								{!! Form::text('description', '***', array('id' => 'description', 'class' => 'form-control', 'placeholder' =>'PGTOFAT0001', 'required' => 'required')) !!}
								<div id="defaultFormControlHelp" class="form-text">
									(opcional - sem espaço [até 20 letras e/ou números])
								</div>
							</div>

							<div class="mb-3">
								<button type="submit" class="btn btn-success">
									<span class="tf-icons bx bx-qr"></span> Gerar QR Code PIX
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!--/ Order Statistics -->

		<!-- Expense Overview -->
		<div class="col-md-6">
			<div class="h-100">
				<div class="card-body px-0">
					<h4>Dados</h4>
					<div class="mb-3">
						<label for="key" class="form-label">chave Pix</label>
						<input
						class="form-control"
						type="text"
						id="key"
						readonly
						/>
					</div>
					<div class="mb-3">
						<label for="recipient" class="form-label">Beneficiário</label>
						<input
						class="form-control"
						type="text"
						id="recipient"
						placeholder="UTIL PROVEDOR DE INTERNET LTDA"
						readonly
						/>
					</div>
					<div class="mb-3">
						<label for="city" class="form-label">Cidade</label>
						<input
						class="form-control"
						type="text"
						id="city"
						placeholder="SAO JOSE DO RIO CLARO"
						readonly
						/>
					</div>
				</div>
				<div class="p-0">
					<h3>Perguntas Frequentes</h3>
					<h5>Isenção de responsabilidade</h5>
					<p>Os QR Codes não foram testados em todos os bancos, antes de transferir utilizando o QR Code, verifique se as informações estão corretas. O site se isenta de qualquer responsabilidade pela exatidão e integridade das informações divulgada.</p>
					<h5>Qual tipo de QR Code?</h5>
					<p>O QR Code PIX <b>Estático</b>, ele pode ser usado para mais de uma transação. Pode, inclusive, ser impresso.</p>
					<p>A geração do QR Code PIX <b>Estático</b> é feita sem nenhuma integração com o sistema PIX e bancos, é apenas uma forma de exibir os dados PIX em formato QR Code.</p>
					<p>É obrigatório inserir o nome do cliente e o valor da transferência. </p>
					<h3>Dúvidas sobre o como usar?</h3>
						<ul>
							<li>Digite o nome do Cliente.</li>
							<li>Digite o valor do PIX.</li>
							<li>Digite um Identificador da Transação ou simplesmente use <b>***</b> no campo.</li>
							<li>Clique em "Gerar QR Code PIX" e aguarde.</li>
						</ul>
				</div>
			</div>
		</div>
		<!--/ Expense Overview -->

		<div class="col-12 mb-3">
			<p>Feito com ❤️ pela Util Tecnologia.</p>
			<div class="upgrade-to-pro">
				<a class="btn btn-outline-secondary" href="{{ route('pix.index') }}"><span class="tf-icons bx bx-qr"></span></a>
				<a href="https://www.utiltecnologia.net.br/central_assinante_web" target="_blank"
				class="btn btn-info">Central do <strong>Assinante</strong></a>
			</div>
		</div>
	</div>

</div>
@endsection

@push('scripts')
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('_theme/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('_theme/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('_theme/assets/vendor/js/bootstrap.js') }}"></script>

<script src="{{ asset('js/jquery.maskMoney.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$('#total').maskMoney();
	})
</script>
@endpush