@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">{{$getConta->usuario->pessoa->nome}} &nbsp;&nbsp; {{$getConta->conta}}  &nbsp;&nbsp;  <span class="text-danger">{{number_format($getConta->valor_existente,2,',','.')}} Akz</span> &nbsp;&nbsp; </a> 
            @if (Auth::user()->acesso=="estudante")
                @if ($getConta->estado=="on")
                <a href="/contas/cancelar" class="btn btn-danger btn-sm">Cancelar Conta</a>
                @endif
               
            @endif
            </div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    Perfil da Conta
                </div>

                <div class="perfil">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nº Conta</th>
                                <th scope="col">Valor Existente</th>
                                <th scope="col">Estado</th>
                                @if (Auth::user()->acesso == "admin")
                                    <th scope="col">Senha da Conta</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>{{$getConta->conta}}</td>
                            <td>{{number_format($getConta->valor_existente,2,',','.')}} Akz</td>
                            <td>{{$getConta->estado}}</td>
                            @if (Auth::user()->acesso == "admin")
                            <td>{{$getConta->password}}</td>
                            @endif
                            </tr>
                        </tbody>
                        
                    </table>
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