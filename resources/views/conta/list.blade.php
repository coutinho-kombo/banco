@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="/servicos/create">Novo</a></div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    Serviços prestados pela instituição
                </div>
                <table class="table mt-3 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Serviço</th>
                            <th scope="col">Modo de Pagamento</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getServicos as $servicos)
                        <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$servicos->servico}}</td>
                        <td>{{$servicos->modo_pagamento->modo}}</td>
                        <td>{{number_format($servicos->valor, 2,',','.')}}</td>
                        <td>{{$servicos->estado}}</td>
                        <td>
                            <a href="/servicos/edit/{{$servicos->id}}" class="btn btn-primary btn-sm">Editar</a>
                           &nbsp;&nbsp; 
                           <a href="/servicos/delete/{{$servicos->id}}" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$getServicos->links()}}
                </div>
            </div>
        </div>
       
    </div> 
</div>
 
@endsection