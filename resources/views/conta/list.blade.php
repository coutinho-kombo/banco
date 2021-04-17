@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="/contas/create">Novo</a></div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    Contas dos estudantes
                </div>
                <table class="table mt-3 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nº da Conta</th>
                            <th scope="col">Estudante</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getContas as $contas)
                        @if ($contas->usuario->acesso=="estudante")
                        <tr>
                            <td>{{$contas->conta}}</td>
                            <td>{{$contas->usuario->pessoa->nome}}</td>
                            <td>{{number_format($contas->valor_existente, 2,',','.')}}</td>
                            <td>{{$contas->estado}}</td>
                            <td>
                                @if ($contas->estado=="off")
                                <a href="/contas/activate/{{$contas->id}}" class="btn btn-success btn-sm">Activar</a>
                                &nbsp;&nbsp; 
                                @endif
                                <a href="/contas/perfil/{{$contas->id}}" class="btn btn-primary btn-sm">Perfil</a>
                               &nbsp;&nbsp; 
                                <a href="/contas/deposito/{{$contas->id}}" class="btn btn-warning btn-sm">Depósito</a>
                               &nbsp;&nbsp; 
                               <a href="/contas/movimentos/{{$contas->id}}" class="btn btn-info btn-sm">Movimentos</a>
                               &nbsp;&nbsp; 
                               <a href="/contas/delete/{{$contas->id}}" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                            </tr>
                        @endif
                        
                       @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$getContas->links()}}
                </div>
            </div>
        </div>
       
    </div> 
</div>
 
@endsection