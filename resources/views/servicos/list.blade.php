@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <div class="card-title">{{$submenu}} &nbsp;&nbsp;&nbsp;&nbsp;<a href="/servicos/create">Novo</a></div>
            </div>
            <div class="card-body">
                <div class="card-sub">									
                    Serviços prestados pela instituição
                </div>
                <table class="table mt-3 table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
       
    </div> 
</div>
 
@endsection