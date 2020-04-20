@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1 class="container m-0 text-dark">K&K solucões</h1>
@stop

@section('content')

    <div class="container row">
       <div class="col-md-8">
            <div class="row info-box d-flex flex-column p-3 justify-content-center border border-info">
                <div class="my-2">
                  @if (auth()->user()->image)
                    <div class="my-3 p-2 d-flex justify-content-center">
                        <img class="rounded-circle border border-dark" src="{{ url(auth()->user()->image) }}" alt="{{ auth()->user()->image }}" style="max-width: 100px;">
                    </div>
                    @else
                    <div class="my-3 d-flex justify-content-center">
                        <a href="{{ route('profile') }}">
                            <img title="Adicionar avatar" class="rounded-circle border border-dark" src="http://placehold.jp/150x150.png" style="max-width: 100px;">
                        </a>
                    </div>
                @endif
                </div>


            <div class="row info-box-content d-flex justify-content-center">
                <div class="">
                <span class="info-box-text my-3 text-center col-md-12">Bem vindo(a) de volta!
                    <span class="text-success">{{ auth()->user()->name }}</span>
                </span>
                </div>
            </div>
            <!-- /.info-box-content -->
            <div class="info-box-content card p-2 text-center col-md-12">
                <span class="alert">
                    Você fez <b class=""> {{ auth()->user()->historics->count() }} </b>
                    operações financeiras neste ano!
                </span>
            </div>
            </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="card p-3">
            <small>place for ads or banners</small>
        </div>
        <div class="card p-3">
            <small>place for ads or banners</small>
        </div>
    </div>
    </div>

    <div class="d-flex flex-column bd-highlight mb-3">
        <div class="card p-3 border border-info">
            <canvas class="line-chart"></canvas>
        </div>
    </div>




    @include('admin.includes.graphics')
@stop
