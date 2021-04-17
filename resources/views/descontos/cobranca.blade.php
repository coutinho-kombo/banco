@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="/descontos/">Listar</a>&nbsp;&nbsp;{{$getDesconto->desconto}} &nbsp;&nbsp; {{number_format($getDesconto->preco,2,',','.')}}</div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    * Irá Fazer um desconto em todas as contas activas no sistema
                </div>
               <div class="form">
                @if (session('error'))
                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif
            
                @if (session('success'))
                <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                 @endif
                {{Form::open(['method'=>"put", 'name'=>"formDesconto", 'url'=>"/descontos/cobrar/{$getDesconto->id}"])}}
                @csrf

                    <div class="row">

                        <div class="col-md-12">
                                <div class="buttonLogin">
                                     <button class="btn btn-primary">Salvar</button>
                                     
                                 </div>
                         </div>
                    </div>
                {{Form::close()}}
               </div>
            </div>
        </div>
       
    </div> 
</div>
 
@endsection