@extends('adminlte::page')

@section('title', 'Fazer saque')

@section('content_header')
    <h1 class="m-0 text-dark">Sacar</h1>
    @include('admin.includes.messages')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="lead">Insira o valor do saque</h3>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
               <form action="{{ route('withdrawn.store') }}" method="POST">
                @csrf
                   <div class="form-group">
                       <input id="value" name="value" type="text" class="form-control" placeholder='Valor para saque'>
                       <small class="lead my-3">Saldo em conta: <b class="text-success">R${{ number_format($balance, 2, ',', '.')}}</b></small>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-success"><i class="fas fa-cart-arrow-down"></i> Sacar</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@stop
