@extends('adminlte::page')

@section('title', 'Confirmar transferência')

@section('content_header')
    <h1 class="m-0 text-dark">Confirme os dados de destino</h1>
    <div class="d-flex justify-content-center">
        @include('admin.includes.messages')
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="lead">Confirmar transferência saldo</h3>
            <hr>
            <h5><b>Destinatário: </b>{{ $sender->name }}</h5>
            <h5><b>Email: </b>{{ $sender->email }}</h5>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
               <form action="{{ route('transfer.store') }}" method="POST">
                @csrf
                <input type="hidden" name="sender_id" value="{{ $sender->id }}">
                   <div class="form-group">
                       <input name="value" type="number" class="form-control" placeholder="Valor:" required>
                       <small class="lead my-3">Saldo em conta: <b class="text-success">R${{ number_format($balance, 2, ',', '.')}}</b></small>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-success"><i class="fas fa-arrow-right"></i> Transferir</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@stop
