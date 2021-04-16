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
                    {{Form::open(['method'=>"post", 'name'=>"formLogin", 'url'=>"/user/store", 'files' => true])}}
                    @csrf
            <div class="row">
                
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nome">Nome de Completo</label> <span class="text-danger">*</span>
                           {{Form::text('nome', null, ['class'=>"form-control", 'placeholder'=>"Nome de Completo"])}}
                           @if($errors->has('nome'))
                           <span class="text-danger">{{$errors->first('nome')}}</span>
                            @endif
                        </div>
                    </div>
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="genero">Gênero</label> <span class="text-danger">*</span>
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

                    <div class="col-md-12">
                        <label for="data">Data de Nascimento</label> <span class="text-danger">*</span>
               {{Form::date('data', null, ['class'=>"form-control", 'placeholder'=>"Data de Nascimento"])}}
               @if($errors->has('data'))
               <span class="text-danger">{{$errors->first('data')}}</span>
                @endif
                    </div>
            <br/>
                   

                    <div class="col-md-12">
                        <label for="ficheiro_bilhete">Bilhete de Identidade</label> <span class="text-danger">*</span><br/>
               {{Form::file('ficheiro_bilhete', null, ['class'=>"form-control", 'placeholder'=>"Bilhete de Identidade"])}}
               @if($errors->has('ficheiro_bilhete'))
               <span class="text-danger">{{$errors->first('ficheiro_bilhete')}}</span>
                @endif
                    </div>

                    <div class="col-md-12">
                        <label for="foto">Foto</label><br/>
               {{Form::file('foto', null, ['class'=>"form-control", 'placeholder'=>"Foto"])}}
               @if($errors->has('foto'))
               <span class="text-danger">{{$errors->first('foto')}}</span>
                @endif
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="provincia">Província</label> <span class="text-danger">*</span>
                            {{ Form::select('provincia', $getProvincias, null, ['class'=>"form-control provincia", 'placeholder'=>"Província"]) }}
                            @if($errors->has('provincia'))
                            <span class="text-danger">{{$errors->first('provincia')}}</span>
                            @endif
                        </div>
                       </div>
    
                       <div class="col-md-12">
                        <div class="form-group">
                            <label for="municipio">Município</label> <span class="text-danger">*</span>
                            <div class="loadMunicipios">
                                {{ Form::select('municipio', [], null, ['class'=>"form-control", 'placeholder'=>"Município"]) }}
                            </div>
                            @if($errors->has('municipio'))
                           <span class="text-danger">{{$errors->first('municipio')}}</span>
                           @endif
                        </div>
                       </div>

                       <div class="col-md-12">
                        <div class="form-group">
                            <label for="telefone">Nº de Telefone</label> <span class="text-danger">*</span>
                                {{Form::number('telefone', null, ['class'=>"form-control", 'placeholder'=>"Nº de Telefone"])}}
                            @if($errors->has('telefone'))
                            <span class="text-danger">{{$errors->first('telefone')}}</span>
                            @endif
                        </div>
                    </div>
                    
                       <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">E-mail</label> <span class="text-danger">*</span>
                                {{Form::email('email', null, ['class'=>"form-control", 'placeholder'=>"E-mail"])}}
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username">Nome de Usuário</label> <span class="text-danger">*</span>
                                {{Form::text('username', null, ['class'=>"form-control", 'placeholder'=>"Nome de Usuário"])}}
                            @if($errors->has('username'))
                            <span class="text-danger">{{$errors->first('username')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password">Palavra-Passe</label> <span class="text-danger">*</span>
                            <input type="password" name="password" class="form-control" placeholder="Palavra-Passe">
                            @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
          
            
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="confirm_password">Confirmar Palavra-Passe</label> <span class="text-danger">*</span>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Palavra-Passe">
                            @if($errors->has('confirm_password'))
                            <span class="text-danger">{{$errors->first('confirm_password')}}</span>
                            @endif
                        </div>
                    </div>
            
                    <div class="col-md-12">
                        <div class="operacoesForm">
                            <div class="form-group">
                                <div class="form-check">
                                     <label class="form-check-label">
                                         <input class="form-check-input" name="termo" type="checkbox" value="termo">
                                         <span class="form-check-sign">Aceitar Termos de Contrato</span> &nbsp; &nbsp; <a href="/user/contrat">Ler Termos</a>
                                     </label>
                                     @if($errors->has('termo'))
                                    <span class="text-danger">{{$errors->first('termo')}}</span>
                                    @endif
                                 </div>
                             </div>
                             <div class="buttonLogin">
                                 <button class="btn btn-success">Criar</button>
                                 &nbsp;&nbsp;&nbsp;
                                 <a href="/user/login">Já tenho uma Conta</a>
                             </div>
                        </div>
                    </div>
           
           
        </div>
            {{Form::close()}}
        </div>
    </div>
</div>
    </div>

    <script>
        $(document).ready(function(){
            $('.provincia').change(function (e) { 
                e.preventDefault();
                var data = {
                    _token: "{{csrf_token()}}",
                    id_provincia: $(this).val()
                };
                if(data.id_provincia!=""){
    
               $.ajax({
                    type: "post",
                    url: "{{route('getMunicipios')}}",
                    data: data,
                    dataType: "html",
                    success: function (response) {
                       $('.loadMunicipios').html(response);
                    }
                });
    
            }
            });
        });
    </script>
@endsection