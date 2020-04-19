@extends('adminlte::page')

@section('title', 'Transferir saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Transferência</h1>
    @include('admin.includes.messages')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="lead">Insira os dados da conta de destino</h3>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
               <form action="{{ route('transfer.confirm') }}" method="POST">
                @csrf
                   <div class="form-group">
                       <input name="sender" type="text" class="form-control" placeholder="Nome do destinatário (Nome ou Email)" required>
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i> Próxima etapa</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@stop
