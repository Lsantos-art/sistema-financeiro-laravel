@extends('adminlte::page')

@section('title', 'Historico')

@section('content_header')
    <h1 class="m-0 text-dark">Historico de transações</h1>
    <div class="d-flex justify-content-center">
        @include('admin.includes.messages')
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form class="form form-inline col-md-8" action="{{ route('historic.search') }}" method="post">
                @csrf
                <input type="date" name="date" class="form-control mr-md-3 my-2">
                <select name="type" class="form-control mr-md-3 my-2">
                    <option value="" class="disabled">Transação</option>
                    @foreach ($types as $key => $type)
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="card-body">
            <div class="col-lg-12 col-xs-6">
                <!-- small box -->
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="text-center">
                            <th>Valor</th>
                            <th>Tipo</th>
                            <th>Conta</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($historics as $historic)
                        <tr>
                            <td><small>R${{ number_format($historic->amount, 2, ',', '.') }}</small></td>
                            <td><small>{{ $historic->type($historic->type) }}</small></td>
                            <td>
                                @if ($historic->user_id_transaction)
                                    <small> {{ $historic->userSender->name }} </small>
                                @else
                                    -
                                @endif
                            </td>
                            <td><small> {{ $historic->date }} </small></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
        </div>
    </div>
    @if (isset($dataForm))
        {!! $historics->appends($dataForm)->links() !!}
      @else
        {!! $historics->links() !!}
    @endif
@stop
