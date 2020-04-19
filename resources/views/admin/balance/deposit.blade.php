@extends('adminlte::page')

@section('title', 'Recargas')

@section('content_header')
    <h1 class="m-0 text-dark">Recargas</h1>
    @include('admin.includes.messages')
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="lead">Insira seus dados</h3>
        </div>
        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
               <form action="{{ route('deposit.store') }}" method="POST">
                @csrf
                   <div class="form-group">
                       <input name="value" type="text" class="form-control" placeholder="Valor da recarga">
                   </div>
                   <div class="form-group">
                       <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Recarregar</button>
                   </div>
               </form>
            </div>
        </div>
    </div>
@stop
