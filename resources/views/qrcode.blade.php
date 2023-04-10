@extends('layouts.app')

@section('content')
<!-- Content -->
<div class="container flex-grow-1 container-p-y my-1">
	<h3>Olá, Util Tecnologia</h3>
	<p>Crie agora seu QR Code</p>

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
						<div class="d-flex flex-column align-items-center gap-1">
							<h4>PIX Util <span class="badge badge-demo bg-label-info">dev</span></h4>
						</div>
						<div id="orderStatisticsChart"></div>
					</div>
					<div class="p-0 m-0">
						<form action="{{ route('pix.store') }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('POST')
							<div class="mb-3">
								<label for="name" class="form-label">Cliente</label>
								{!! Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' =>'Util Tecnologia', 'required' => 'required')) !!}
							</div>
							<div class="mb-3">
								<label for="pix" class="form-label">Pix ModoBank</label>
								{!! Form::textarea('pix', NULL, array('id' => 'pix', 'class' => 'form-control', 'rows' => 3, 'placeholder' =>'Util Tecnologia', 'required' => 'required')) !!}
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
								<button type="submit" class="btn btn-outline-primary">
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
					<div class="p-0">
						<h3>Perguntas Frequentes</h3>
						<h5>O que é o PIX Cobrança?</h5>
						<p>Nessa modalidade de PIX Cobrança é possível gerar as cobranças diretamente pela carteira PIX, nessa cobrança é possível definir data de vencimento, incluir juros, multa e desconto por pontualidade.</p>
						<p>Fica disponível o envio do QR Code e link Copia e Cola por e-mail, Whatsapp, e também por outros canais de atendimento que seu sistema possuir integração (Telegram, Instagram, Messenger).</p>
						<p>Na Central do Assinante também fica a opção do pagador gerar o QR Code e link Copia e Cola.</p>
						<p>O código QR Code fica disponível por tempo indeterminado, ele só expira após 90 dias do vencimento da cobrança.</p>
						<p>O recebimento é automático e imediato, ocorre instantaneamente no financeiro da Util após o pagamento.</p>

						<h3>Dúvidas sobre o como usar?</h3>
						<ul>
							<li>Digite o nome do Cliente.</li>
							<li>Copia e Cola o PIX gerado pelo sistema IXC no canto superior direito da fatura.</li>
							<li>Digite o valor do PIX.</li>
							<li>Clique em "Gerar QR Code PIX" e aguarde.</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!--/ Expense Overview -->
		<div class="col-12 mb-3">
			<p>Feito com ❤️ pela Util Tecnologia.</p>
			<div class="upgrade-to-pro">
				<a class="btn btn-outline-secondary" href="{{ route('banco.index') }}"><span class="tf-icons bx bxs-bank"></span></a>
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