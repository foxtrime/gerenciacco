@extends('gentelella.layouts.app')

@section('content')

   <div class="x_panel modal-content">
      <div class="x_title">
         <h2>Novo Setor</h2>
      <div class="clearfix"></div>
   </div>
   <div class="x_panel">
      <div class="x_content">
         <form id="formulario_sala" class="form-horizontal form-label-left" method="post" action="{{ route('setores.store') }}">
            {{ csrf_field()}}

            <div  class="form-group row">
               <div class=" form-group col-md-6 col-sm-6 col-xs-12">
                  <label class="control-label" >Nome do Setor</label>
                  <input type="text" id="nome_setor" class="form-control " name="nome_setor" minlength="4" maxlength="100" required>	
               </div>
            </div>
            
            
            {{-- BOTÕES --}}
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<div class="footer text-right"> {{-- col-md-3 col-md-offset-9 --}}
					<button id="btn_voltar" class="botoes-acao btn btn-round btn-primary" >
						<span class="icone-botoes-acao mdi mdi-backburger"></span>   
						<span class="texto-botoes-acao"> CANCELAR </span>
						<div class="ripple-container"></div>
					</button>
				
					<button type="submit" id="btn_salvar" class="botoes-acao btn btn-round btn-success ">
						<span class="icone-botoes-acao mdi mdi-send"></span>
						<span class="texto-botoes-acao"> SALVAR </span>
						<div class="ripple-container"></div>
					</button>
				</div>
         </form>      
       </div>
    </div>
 </div>

@endsection

@push('scripts')

	<script type="text/javascript">
      $(document).ready(function(){
               //botão de voltar
         $("#btn_voltar").click(function(){
            event.preventDefault();
            window.location.href = "{{ URL::route('setores.index') }}"; 
         });
      });
	</script>
@endpush