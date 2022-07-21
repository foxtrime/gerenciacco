@extends('gentelella.layouts.app')

@section('content')

<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Funcionarios</h2>
       <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('user/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Novo Funcionario"> Novo Funcionario </a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
         <table id="tb_user" class="table table-hover table-striped compact">
            <thead>
               <tr>
                  <th>Nome do Usuario</th>
                  <th>Email</th>
                  <th>Permissão</th>
                  <th>Setores</th>
                  <th>Ações</th>
               </tr>
            </thead>   
            <tbody>
               @foreach ($usuarios as $usuario)
                  <tr>
                     <td>{{$usuario->name}}</td>
                     <td>{{$usuario->email}}</td>
                     <td>{{$usuario->nivel}}</td>
                     {{-- <td>{{$usuario->pivot}}</td> --}}
                     <td>
                        @foreach ($usuario->usersetores as $setor)
                            {{$setor->nome_setor}}<br>
                        @endforeach
                     </td>
                     <td class="actions">
                        @if($usuario->nivel != 'Super-Admin')
                        <a
                           {{-- href="#" --}}
                           id="btn_atribui_setor"
                           class="btn btn-success btn-xs action botao_acao " 
                           data-toggle="tooltip" 
                           {{-- data-valor = @if(Auth::user()->nivel  == 'Super-Admin') geral @elseif(Auth::user()->nivel  == 'Admin')  @foreach ($usuario->usersetores as $setor) @if(array_key_exists($setor->nome_setor, $setores_usuario_logado)) ativo @else desabilitado @endif @endforeach  @else desabilitado @endif --}}
                           data-valor = 
                              @if(Auth::user()->nivel  == 'Admin') 
                                 @foreach ($usuario->usersetores as $setor) 
                                    @if(in_array($setor->nome_setor, $setores_usuario_logado)) 
                                       ativo
                                    @else
                                       desabilitado
                                    @endif 
                                 @endforeach 
                              @endif
                           data-placement="bottom" 
                           title="Atribuir Setor">  
                           <i class="glyphicon glyphicon-list-alt"></i>
                        </a> 
                        @endif
                        
                        <a
                           href="#"
                           id="btn_edita_usuario"
                           class="btn btn-warning btn-xs action botao_acao btn_editar" 
                           data-valor = 
                              @if(Auth::user()->nivel  == 'Admin') 
                                 @foreach ($usuario->usersetores as $setor) 
                                    @if(in_array($setor->nome_setor, $setores_usuario_logado)) 
                                       ativo
                                    @else
                                       desabilitado
                                    @endif 
                                 @endforeach 
                              @endif
                              @if (Auth::user()->nivel  == 'Admin')
                                 desabilitado
                              @elseif(Auth::user()->nivel  == 'Super-Admin')
                                 ativo
                              @endif
                           data-toggle="tooltip" 
                           data-placement="bottom" 
                           title="Editar Funcionario">  
                           <i class="glyphicon glyphicon-pencil "></i>
                        </a>
                        <a
                           id="btn_resta_usuario"
                           class="btn btn-primary btn-xs action botao_acao btn_email_senha"
                           data-valor = 
                              @if(Auth::user()->nivel  == 'Admin') 
                                 @foreach ($usuario->usersetores as $setor) 
                                    @if(in_array($setor->nome_setor, $setores_usuario_logado)) 
                                       ativo
                                    @else
                                       desabilitado
                                    @endif 
                                 @endforeach 
                              @endif
                              @if (Auth::user()->nivel  == 'Admin')
                                 desabilitado
                              @elseif(Auth::user()->nivel  == 'Super-Admin')
                                 ativo
                              @endif
                           data-info="{{$usuario->id}}" 
                           data-toggle="tooltip" 
                           data-placement="bottom" 
                           title="Resetar Senha">  
                           <i class='glyphicon glyphicon-envelope '></i>
                        </a>
                        <a
                           id="btn_exclui_funcionario"
                           class="btn btn-danger btn-xs action botao_acao btn_excluir"
                           data-valor = 
                              @if(Auth::user()->nivel  == 'Admin') 
                                 @foreach ($usuario->usersetores as $setor) 
                                    @if(in_array($setor->nome_setor, $setores_usuario_logado)) 
                                       ativo
                                    @else
                                       desabilitado
                                    @endif 
                                 @endforeach 
                              @endif
                              @if (Auth::user()->nivel  == 'Admin')
                                 desabilitado
                              @elseif(Auth::user()->nivel  == 'Super-Admin')
                                 ativo
                              @endif
                           data-toggle="tooltip" 
                           data-funcionario = {{$usuario->id}}
                           data-placement="bottom" 
                           title="Excluir Funcionario"> 
                           <i class="glyphicon glyphicon-remove "></i>
                        </a> 
                        
                    </td>
                  </tr>
               @endforeach
            </tbody>
          </table>
       </div>
    </div>
 </div>

@endsection

@push('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <script>
      $(document).ready(function(){
         var tb_user = $("#tb_user").DataTable({
            language: {
                  'url' : '{{ asset('js/portugues.json') }}',
            "decimal": ",",
            "thousands": "."
            },
            stateSave: true,
            stateDuration: -1,
            responsive: true,
         })
      });

      // $("table#tb_user").on("click", ".btn_excluir", function() {
				
		// 	});


         $("table#tb_user").on("click", "#btn_atribui_setor",function(){
			
				let valor = $(this).data('valor');
				let btn = $(this);
				
				if( valor == 'desabilitado' )
				{ 
               console.log('entrou')
					event.preventDefault();
					funcoes.notificationRight("top", "right", "danger", "Esse usuário não tem permissão para executar essa Ação!");
					return
				}
			});

         $("table#tb_user").on("click", "#btn_edita_usuario",function(){
			
         let valor = $(this).data('valor');
         let btn = $(this);
         
         if( valor == 'desabilitado' )
         { 
            console.log('entrou')
            event.preventDefault();
            funcoes.notificationRight("top", "right", "danger", "Esse usuário não tem permissão para executar essa Ação!");
            return
         }
      });

      $("table#tb_user").on("click", "#btn_resta_usuario",function(){
			
         let valor = $(this).data('valor');
         let btn = $(this);
         
         if( valor == 'desabilitado' )
         { 
            console.log('entrou')
            event.preventDefault();
            funcoes.notificationRight("top", "right", "danger", "Esse usuário não tem permissão para executar essa Ação!");
            return
         }
      });

      $("table#tb_user").on("click", "#btn_exclui_funcionario",function(){
			
         let valor = $(this).data('valor');
         let btn = $(this);
         
         if( valor == 'desabilitado' )
         { 
            console.log('entrou')
            event.preventDefault();
            funcoes.notificationRight("top", "right", "danger", "Esse usuário não tem permissão para executar essa Ação!");
            return
         }else{
            let id = $(this).data('funcionario');
				// console.log(id);
				let btn = $(this);
				swal({
					title: "Atenção!",
					text: "Excluir permanentemente um Funcionário",
					icon: "warning",
					buttons: {
							cancel: {
								text: "Cancelar",
								value: "cancelar",
								visible: true,
								closeModal: true,
							},
							ok: {
								text: "Sim, Confirmar!",
								value: 'excluir',
								visible: true,
								closeModal: true,
							}
					}
				}).then(function(resultado) {
					if (resultado === 'excluir') {
							$.post("{{ url('/user/') }}/" + id, {
								id: id,
								_method: "DELETE",
								_token: "{{ csrf_token() }}",
							}).done(function() {
								location.reload();
							});
					}
				});
         }
      });


      

   </script>




@endpush