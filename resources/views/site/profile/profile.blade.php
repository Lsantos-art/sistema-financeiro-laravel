@extends('site.layouts.app')
@section('title', 'Página do usuário')


@section('content')
    @include('site.includes.messages')

    <h1 class="my-3 lead"><i class="fas fa-user"></i> Meu perfil</h1>
    <div class="card p-3 bg-dark d-flex justify-content-center my-3">
        <form action="{{ route('profile.update') }}" method="post" class="card my-3 p-3" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nome</label>
                <input value="{{ auth()->user()->name }}" class="form-control text-success" type="text" name="name" id="name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ auth()->user()->email }}" class="form-control text-success" type="email" name="email" id="email" placeholder="Email">
            </div>

            @if (auth()->user()->image)
            <div class="form-group">
                <img class="img-thumbnail" src="{{ url('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->image }}" style="max-width: 50px;">
            </div>
            @endif

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Imagem do usuário</label>
                </div>
              </div>
            <div class="form-group">
                <label for="password">Senha da conta</label>
                <input class="form-control text-success" type="password" name="password" id="password" placeholder="Alterar senha">
            </div>
            <div class="col-md-12 text-center">
             <button type="submit" class="btn btn-outline-info my-2">Alterar</button>
            </div>
        </form>
    </div>

@endsection
