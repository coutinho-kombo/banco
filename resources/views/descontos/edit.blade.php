@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="/descontos/">Listar</a></div>
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
                {{Form::open(['method'=>"put", 'name'=>"formDesconto", 'url'=>"/descontos/update/{$getDesconto->id}"])}}
                @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="desconto">Desconto</label> <span class="text-danger">*</span>
                               {{Form::text('desconto', $getDesconto->desconto, ['class'=>"form-control", 'placeholder'=>"Desconto"])}}
                               @if($errors->has('desconto'))
                               <span class="text-danger">{{$errors->first('desconto')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modo">Modo de Pagamento</label> <span class="text-danger">*</span>
                               {{Form::select('modo',$getModoPagamento, $getDesconto->id_modo, ['class'=>"form-control", 'placeholder'=>"Modo de Pagamento"])}}
                               @if($errors->has('modo'))
                               <span class="text-danger">{{$errors->first('modo')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="valor">Valor(Akz)</label> <span class="text-danger">*</span>
                               {{Form::text('valor', number_format($getDesconto->preco,0,'',''), ['class'=>"form-control", 'placeholder'=>"Valor"])}}
                               @if($errors->has('valor'))
                               <span class="text-danger">{{$errors->first('valor')}}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado">Estado</label> <span class="text-danger">*</span>
                               {{Form::select('estado',[
                                   'on'=>"on",
                                   'off'=>"off"
                               ], $getDesconto->estado, ['class'=>"form-control", 'placeholder'=>"Estado"])}}
                               @if($errors->has('estado'))
                               <span class="text-danger">{{$errors->first('estado')}}</span>
                                @endif
                            </div>
                        </div>

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