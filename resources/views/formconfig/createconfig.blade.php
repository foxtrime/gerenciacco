@extends('gentelella.layouts.app')

@section('content')
   <div class="x_panel modal-content">
      <div class="x_title">
         <h2>Novo campo do Formulario</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_panel">
         <div class="x_content">
            <form action="{{url('configform/save')}}" method="post">
               {{ csrf_field()}}

               <div class="form-group row">
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label">Nome do Campo</label>
							<input type="text" id="nome" class="form-control" name="nome" minlength="4" maxlength="100" required >	
                  </div>
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label">Tipo do Campo</label>
							<select id="tipo" name="tipo" class="form-control" minlength="2" required>
                                <option value="" disabled selected>Selecione o Tipo do Campo</option>
								<option value="text">Texto Simples</option>
                                <option value="textarea">Texto Grande</option>
                                <option value="checkbox">CheckBox</option>
							</select>
						</div>
               </div>


               <div class="form-group row">
                  <div class="form-group col-md-6 col-sm-6 col-xs-12">
                     <label class="control-label">Campo Obrigatorio?</label>
                     <select id="is_required" name="is_required" class="form-control" minlength="2" required>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
							</select>
                  </div>

                  <div class="form-group col-md-6 col-sm-6 col-xs-12 newcheckboxvalue"  >
                     <div id="checkbox" class="checuboxu" style="display:none;">
                        <label class="control-label">Nome do Campo CheckBox</label>
                        <button type="button" class="btn btn-primary clonador">+</button>
                        <div class="input-group checksboxs">
                           <input type="text" id="checkboxvalue" name="checkboxvalue[]"  class="form-control checkboxvalue">
                           <input type="button" class="btn btn-primary  btn_remove" value="Remover" style="margin: 1.375rem 0 0 1.5625rem; "/>
                        </div>
                        <div class="input-group novadiv">

                        </div>
                     </div>
                  </div>
               </div>


               <div class="form-group row">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                       <label class="control-label">Meu Setor</label>
                        <select id="nome_setor" name="nome_setor" class="form-control" minlength="2" required>
                            <option value="" disabled selected>Selecione seu Setor</option>
                            @foreach ($setores_usuario_logado as $setor)
                                <option value="{{$setor}}">{{$setor}}</option>
                            @endforeach
                        </select>
                    </div>
               </div>
         
  
               <div class="clearfix"></div>
				   <div class="ln_solid"> </div>
					<div class="footer text-right"> {{-- col-md-3 col-md-offset-9 --}}
						<button id="btn_cancelar" class="botoes-acao btn btn-round btn-primary" >
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
   <script>
      $("#tipo").on('change', function(){
         $('.checuboxu').hide();
         $('#' + this.value).show();
         if(this.value == 'checkbox'){
            $('#checkboxvalue').attr('required', 'required');
         }else{
            $('#checkboxvalue').removeAttr('required', 'required');
         }
      });

      $('.clonador').click(function(e){
         e.preventDefault();
         $('.checksboxs:first').clone().appendTo($('.novadiv'));
         $('.checksboxs').last().find('input[type="text"]').val('');
         $('#checkboxvalue').attr('required', 'required');
      });
      $('form').on('click', '.btn_remove', function(e){
         e.preventDefault();
         if ($('.checksboxs').length > 1)
            $(this).parents('.checksboxs').remove();
      });

     
      $(function(){
         $('body').submit(function(event){
            if ($(this).hasClass('btn_salvar')) {
               event.preventDefault();
            }
            else {
               $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i>');
               $(this).addClass('btn_salvar');
            }
         });
         $("#btn_cancelar").click(function(){
            event.preventDefault();
            window.location.href="{{ URL::route('configforms') }}";
         });
         });
      
   </script>
@endpush