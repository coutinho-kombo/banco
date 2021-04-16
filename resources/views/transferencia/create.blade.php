@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp; <a href="#">{{$getConta->conta}}&nbsp;&nbsp;&nbsp; <span class="text-danger">{{number_format($getConta->valor_existente,2,',','.')}} Akz</span></a></div>
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
                {{Form::open(['method'=>"post", 'name'=>"formTransferencia", 'url'=>"/transferencias/store"])}}
                @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="conta">Nº da Conta</label> <span class="text-danger">*</span>
                               {{Form::text('conta', null, ['class'=>"form-control", 'placeholder'=>"Nº da Conta de Destino"])}}
                               @if($errors->has('conta'))
                               <span class="text-danger">{{$errors->first('conta')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valor">Valor à Transferir</label> <span class="text-danger">*</span>
                               {{Form::text('valor', null, ['class'=>"form-control", 'placeholder'=>"Valor à Transferir"])}}
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
                                     <button class="btn btn-success">Transferir</button>
                                     
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