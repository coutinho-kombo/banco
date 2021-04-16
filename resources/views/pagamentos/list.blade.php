@extends('layout.app')
@section('content')
    <div class="row">
        @foreach ($getServicos as $servicos)
            
        <div class="col-md-3">
            <a href="/pagamentos/create/{{$servicos->id}}">
            <div class="card card-stats card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center">
                                <i class="la la-check-circle"></i>
                            </div>
                        </div>
                        <div class="col-7 d-flex align-items-center">
                            <div class="numbers">
                                <p class="card-category">{{$servicos->servico}}</p>
                                <h4 class="card-title">{{number_format($servicos->valor, 2, ',','.')}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        @endforeach
    </div>
@endsection