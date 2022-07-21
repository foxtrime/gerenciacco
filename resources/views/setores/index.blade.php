@extends('gentelella.layouts.app')

@section('content')

<div class="x_panel modal-content">
    <div class="x_title">
       <h2>Setores</h2>
       <ul class="nav navbar-right panel_toolbox">
          <a href="{{url('setores/create')}}" class="btn-circulo btn  btn-success btn-md  pull-right " data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Novo Setor"> Novo Setor </a>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_panel">
       <div class="x_content">
          <table id="tb_setores" class="table table-hover table-striped compact">
            <thead>
               <tr>
                  <th>Nome do Setor</th>
                  <th>Ações</th>
               </tr>
            </thead>   
            <tbody>
               @foreach ($setores as $setor)
                  <tr>
                     <td>{{$setor->nome_setor}}</td>
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

	<script type="text/javascript">
	</script>
@endpush