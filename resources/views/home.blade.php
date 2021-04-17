@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-stats card-warning">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-users"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Estudantes</p>
                        <h4 class="card-title">{{$getEstudantes->count()}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats card-success">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-bar-chart"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Contas</p>
                            <h4 class="card-title">{{$getContas->count()}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats card-danger">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-newspaper-o"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Movimentos</p>
                            <h4 class="card-title">{{$getMovimentos->count()}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats card-primary">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-check-circle"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Order</p>
                            <h4 class="card-title">576</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- 							<div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning">
                            <i class="la la-pie-chart text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Number</p>
                            <h4 class="card-title">150GB</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-bar-chart text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Revenue</p>
                            <h4 class="card-title">$ 1,345</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-times-circle-o text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Errors</p>
                            <h4 class="card-title">23</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col-5">
                        <div class="icon-big text-center">
                            <i class="la la-heart-o text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                            <p class="card-category">Followers</p>
                            <h4 class="card-title">+45K</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
@if (Auth::check())
@if (Auth::user()->acesso == "estudante")
    <div class="row row-card-no-pd">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="fw-bold mt-1">Meu Saldo</p>
            <h4><b>{{number_format($getConta->valor_existente,2,',','.')}} Akz</b></h4>
                <a href="#" class="btn btn-primary btn-full text-left mt-3 mb-3">Conta: {{$getConta->conta}}</a>
            </div>
            <div class="card-footer">
                <ul class="nav">
                    <li class="nav-item"><a class="btn btn-default btn-link" href="#"><i class="la la-history"></i> Historico</a></li>
                    <li class="nav-item ml-auto"><a class="btn btn-default btn-link" href="#"><i class="la la-refresh"></i> Actualizar</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="progress-card">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Movimentos</span>
                        <span class="text-muted fw-bold"> $3K</span>
                    </div>
                    <div class="progress mb-2" style="height: 7px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="78%"></div>
                    </div>
                </div>
                <div class="progress-card">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Pagamentos</span>
                        <span class="text-muted fw-bold"> 576</span>
                    </div>
                    <div class="progress mb-2" style="height: 7px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="65%"></div>
                    </div>
                </div>
                <div class="progress-card">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Transferencias</span>
                        <span class="text-muted fw-bold"> 70%</span>
                    </div>
                    <div class="progress mb-2" style="height: 7px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="70%"></div>
                    </div>
                </div>
                <div class="progress-card">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="text-muted">Depositos</span>
                        <span class="text-muted fw-bold"> 60%</span>
                    </div>
                    <div class="progress mb-2" style="height: 7px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="60%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-body">
                <p class="fw-bold mt-1">Estado Conta</p>
                <div class="row">
                    @if ($getConta->estado=="on")
                        
                    <div class="card card-stats card-success">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col-9 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Activada</p>
                                        <h4 class="card-title">ON</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card card-stats card-danger">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="la la-warning"></i>
                                    </div>
                                </div>
                                <div class="col-9 d-flex align-items-center">
                                    <div class="numbers">
                                        <p class="card-category">Desativada</p>
                                        <h4 class="card-title">OFF</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endif


@endsection