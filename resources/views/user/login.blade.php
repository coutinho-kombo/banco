@extends('layout.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">

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
                <label for="username">Nome de Usuário</label>
               {{Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Nome de Usuário"])}}
               @if($errors->has('username'))
               <span class="text-danger">{{$errors->first('username')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Palavra-Passe</label>
                <input type="password" name="password" class="form-control" placeholder="Palavra-Passe">
                @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
            </div>
        
            <div class="operacoesForm">
                <div class="form-group">
                    <div class="form-check">
                         <label class="form-check-label">
                             <input class="form-check-input" type="checkbox" value="">
                             <span class="form-check-sign">Lembrar-me</span>
                         </label>
                     </div>
                 </div>
                 <div class="buttonLogin">
                     <button class="btn btn-primary">Entrar</button>
                     &nbsp;&nbsp;&nbsp;
                     <a href="/user/create">Criar uma Conta</a>
                 </div>
            </div>
           
            {{Form::close()}}
        </div>
    </div>
</div>
    </div>
@endsection