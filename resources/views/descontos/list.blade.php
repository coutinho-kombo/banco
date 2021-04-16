@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="/descontos/create">Novo</a></div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    Descontos cadastrados
                </div>
                <table class="table mt-3 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Desconto</th>
                            <th scope="col">Modo de Pagamento</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getDescontos as $descontos)
                       
                        <tr>
                            <td>{{$descontos->desconto}}</td>
                            <td>{{$descontos->modo_pagamento->modo}}</td>
                            <td>{{number_format($descontos->preco, 2,',','.')}}</td>
                            <td>{{$descontos->estado}}</td>
                            <td>
                                <a href="/descontos/cobranca/{{$descontos->id}}" class="btn btn-info btn-sm">Cobrança</a>
                                <a href="/descontos/edit/{{$descontos->id}}" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/descontos/delete/{{$descontos->id}}" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                            </tr>
                        
                       @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{$getDescontos->links()}}
                </div>
            </div>
        </div>
       
    </div> 
</div>
 
@endsection