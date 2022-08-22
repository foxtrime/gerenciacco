@extends('gentelella.layouts.app')

@section('content')
   <div class="x_panel modal-content">
      <div class="x_title">
         <h2>Configuração de Campos do Formulario</h2>
         <ul class="nav navbar-right panel_toolbox">
            <a href="{{url('configform/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Novo Campo"> Novo Campo</a>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_panel">
         <div class="x_content">
           <table id='tb_config_anamsnese' class="table table-hover table-striped compact">
            <thead>
               <tr>
                  <th>nome</th>
                  <th>tipo</th>
                  <th>obrigatorio</th>
                  <th>Setor</th>
                  <th>Criado Por</th>
                  <th>Ações</th>
               </tr>
            </thead>
            <tbody>
               @foreach($forms_labels as $label)
                  <tr>
                     <td>{{$label->nome}}</td>
                     <td>
                        @if ($label->tipo == 'text')
                           Texto Simples
                        @elseif($label->tipo == 'textarea')
                           Texto Grande
                        @else
                           CheckBox
                        @endif

                     </td>
                     {{-- <td>{{$label->tipo}}</td> --}}
                     <td>
                        @if ($label->is_required == 1)
                            Sim
                        @else
                            Não
                        @endif
                     </td>
                     <td>{{$label->nome_setor}}</td>
                     <td>{{$label->user->name}}</td>
                     <td></td>
                  </tr>
               @endforeach
            </tbody>
           </table>
         </div>
      </div>
   </div>
@endsection

@push('scripts')
 
@endpush