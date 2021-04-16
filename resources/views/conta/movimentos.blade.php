@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">{{$getConta->usuario->pessoa->nome}} &nbsp;&nbsp; {{$getConta->conta}}  &nbsp;&nbsp;  <span class="text-danger">{{number_format($getConta->valor_existente,2,',','.')}} Akz</span></a> </div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    Movimentos da Conta
                </div>
                <table class="table mt-3 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Data Movimento</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Detalhes</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getConta->movimento as $movimentos)
                       
                        <tr>
                            <td>{{date('d-m-Y H:i', strtotime($movimentos->created_at))}}</td>
                            <td>{{$movimentos->tipo}}</td>
                            <td>{{$movimentos->descricao}}</td>
                            <td>
                            @if ($movimentos->tipo=="Crédito")
                                +
                            @elseif($movimentos->tipo=="Débito")
                                -
                            @endif
                            {{number_format($movimentos->valor, 2,',','.')}}</td>
                            <td>{{$movimentos->estado}}</td>
                           
                            </tr>
                      
                       @endforeach
                    </tbody>
                </table>
          
            </div>
        </div>
       
    </div> 
</div>
 
@endsection