@extends('layout.app')
@section('content')
    <div class="login-box">
        <div class="login-logo">

    <div class="card">
        <div class="card-header">
            <div class="card-title">Criar Conta</div>
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
            <div class="row">
                
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nome">Nome de Completo</label>
                           {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome de Completo"])}}
                           @if($errors->has('nome'))
                           <span class="text-danger">{{$errors->first('nome')}}</span>
                            @endif
                        </div>
                    </div>
                   
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="genero">Gênero</label>
                           {{Form::select('genero', [
                               'M'=>"M",
                               'F'=>"F"
                           ], null, 
                           ['class'=>"form-control", 'placeholder'=>"Gênero"])}}
                           @if($errors->has('genero'))
                           <span class="text-danger">{{$errors->first('genero')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="data">Data de Nascimento</label>
               {{Form::date('data', null, ['class'=>"form-control", 'placeholder'=>"Data de Nascimento"])}}
               @if($errors->has('data'))
               <span class="text-danger">{{$errors->first('data')}}</span>
                @endif
                    </div>

                    <div class="col-md-4">
                        <label for="data">Foto</label>
               {{Form::file('foto', null, ['class'=>"form-control", 'placeholder'=>"Foto"])}}
               @if($errors->has('foto'))
               <span class="text-danger">{{$errors->first('foto')}}</span>
                @endif
                    </div>
                    

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

            <div class="form-group">
                <label for="confirm_password">Confirmar Palavra-Passe</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Palavra-Passe">
                @if($errors->has('confirm_password'))
                <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                @endif
            </div>
        
            <div class="operacoesForm">
                <div class="form-group">
                    <div class="form-check">
                         <label class="form-check-label">
                             <input class="form-check-input" type="checkbox" value="">
                             <span class="form-check-sign">Aceitar Termos de Contrato</span> &nbsp; &nbsp; <a href="/user/contrat">Ler Termos</a>
                         </label>
                     </div>
                 </div>
                 <div class="buttonLogin">
                     <button class="btn btn-success">Criar</button>
                     &nbsp;&nbsp;&nbsp;
                     <a href="/user/login">Já tenho uma Conta</a>
                 </div>
            </div>
           
        </div>
            {{Form::close()}}
        </div>
    </div>
</div>
    </div>
@endsection