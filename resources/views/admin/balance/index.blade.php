@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>
    <div class="d-flex justify-content-center">
        @include('admin.includes.messages')
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary p-2 my-2" href="{{ route('balance.deposit') }}"><i class="fas fa-cart-plus"></i> Recarregar</a>

            @if ($amount > 0)
            <a class="btn btn-primary p-2 my-2" href="{{ route('transfer') }}"><i class="fas fa-exchange-alt"></i> Transferir</a>
            <a class="btn btn-danger p-2 my-2" href="{{ route('withdrawn') }}"><i class="fas fa-cart-arrow-down"></i>Sacar</a>
            @endif

        </div>
        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <div class="inner">
                    <h3>R$ {{ number_format($amount, 2, ',', '.') }}</h3>
                  </div>
                  <div class="icon">
                    <i class="far fa-money-bill-alt"></i>
                  </div>
                  <a href="{{ route('historic') }}" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
        </div>
    </div>
@stop
