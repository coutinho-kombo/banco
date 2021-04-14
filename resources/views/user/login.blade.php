@extends('layout.app')
@section('content')
    
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Inciar Sessão</div>
        </div>
        <div class="card-body">
            @if (session('error'))
                    <div class="alert bg-danger" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em> {{__(session('error'))}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                    @endif
                
                    @if (session('success'))
                    <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-check">&nbsp;</em> {{session('success')}} <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a></div>
                     @endif
                    {{Form::open(['method'=>"post", 'name'=>"formLogin", 'url'=>"/user/logar"])}}
                    @csrf

            <div class="form-group">
                <label for="email">E-mail</label>
               {{Form::email('email', null, ['class'=>"form-control", 'placeholder'=>"E-mail"])}}
               @if($errors->has('email'))
               <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Palavra-Passe</label>
                <input type="password" name="password" class="form-control" placeholder="Palavra-Passe">
                @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
            </div>
        
            <div class="form-group">
               <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" value="">
                        <span class="form-check-sign">Lembrar-me</span>
                    </label>
                </div>
            </div>
            <div class="card-action">
                <button class="btn btn-success">Entrar</button>
            </div>
            {{Form::close()}}
        </div>
    </div>

@endsection