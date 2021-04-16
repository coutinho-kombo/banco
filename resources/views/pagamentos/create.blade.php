@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">{{$getServico->servico}} &nbsp;&nbsp; <span class="text-danger">{{number_format($getServico->valor, 2,',','.')}}</span></a></div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    * campos obrigatórios
                </div>
               <div class="form">
                @if (session('error'))
                <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                @endif
            
                @if (session('success'))
                <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                 @endif
                {{Form::open(['method'=>"put", 'name'=>"formPagamento", 'url'=>"/pagamentos/store/{$getServico->id}"])}}
                @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="descricao">Descrição</label> <span class="text-danger">*</span>
                               {{Form::text('descricao', null, ['class'=>"form-control", 'placeholder'=>"Descrição do Pagamento"])}}
                               @if($errors->has('descricao'))
                               <span class="text-danger">{{$errors->first('descricao')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valor">Valor à Pagar</label> <span class="text-danger">*</span>
                               {{Form::text('valor', null, ['class'=>"form-control", 'placeholder'=>"Valor à Pagar"])}}
                               @if($errors->has('valor'))
                               <span class="text-danger">{{$errors->first('valor')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="password">Palavra-Passe</label> <span class="text-danger">*</span>
                                <input type="password" name="password" class="form-control" placeholder="Palavra-Passe">
                                @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                                <div class="buttonLogin">
                                     <button class="btn btn-success">Pagar</button>
                                     
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