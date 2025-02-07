@extends('layouts.app')

@section('title')
    Cadastrar Participantes
@endsection

@section('css')
    <link rel="stylesheet" href="/css/acoes/create.css">
@endsection

@section('content')
    <h1 class="text-center">Cadastrar Participante</h1>
    <form class="container form" action="{{ Route('participante.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="atividade_id" value="{{ $atividade->id }}">

        <div class="row d-flex aligm-items-start justify-content-start ">

            <div class="col-7 spacing-row1 input-create-box d-flex align-items-start justify-content-start flex-column">
                <span class="tittle-input ">Nome</span>
                <input class="w-75 input-text " type="text" name="nome" id="nome"
                       @if(isset($user)) value="{{$user->name}}" readonly @endif minlength="10" required>
            </div>

            <div class="col-4 spacing-row1 input-create-box d-flex align-items-start justify-content-start flex-column">
                <span class="tittle-input">CPF</span>
                <input class="w-75 input-text " type="text" name="cpf" id="cpf" placeholder="000.000.000-00"
                       pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="Digite um CPF válido (000.000.000-00)" required
                       @if(isset($user)) value="{{$user->cpf}}" readonly @else value="{{$cpf}}" @endif>
            </div>

        </div>

        <div class="row d-flex aligm-items-start justify-content-start ">

            <div class="col-7 spacing-row1 input-create-box d-flex align-items-start justify-content-start flex-column">
                <span class="tittle-input ">Email</span>
                <input class="w-75 input-text" type="email" name="email" id="" placeholder="example@gmail.com"
                       @if(isset($user)) value="{{$user->email}}" readonly @endif>

            </div>

            <div class="col-4 spacing-row1 input-create-box d-flex align-items-start justify-content-start flex-column">
                <span class="tittle-input ">Carga Horária</span>
                <input class="w-75 input-text" type="number" name="carga_horaria" id=""
                       pattern="[0-9]+" title="Digite um número válido" required>

            </div>

        </div>

        <div class="row d-flex aligm-items-start justify-content-start ">

            <div class="col-7 spacing-row1 input-create-box d-flex align-items-start justify-content-start flex-column">
                <span class="tittle-input ">Título Atividade</span>
                <input class="w-75 input-text " type="text" name="titulo" id="" required>
            </div>

            <div class="col-4 spacing-row1 input-create-box d-flex align-items-start justify-content-start flex-column">
                <span class="tittle-input ">Atividade</span>
                <input class="w-75 input-text " type="email" name="atividade" value="{{$atividade->descricao}}"
                       disabled>
            </div>

        </div>

        <div class="row d-flex aligm-items-start justify-content-start">

            <div class="col-7 spacing-row1 input-create-box align-items-start justify-content-start flex-column"
                 @if(isset($user)) style="display: none" @endif>
                <span class="tittle-input">Instituição</span>
                <select class="w-100 input-text" name="instituicao_id" id="select_instituicao" required>
                    <option selected hidden> -- Instituição --</option>
                    @foreach($instituicaos as $instituicao)
                        <option value="{{$instituicao->id}}"
                                @if(old('instituicao_id') == $instituicao->id) selected
                                @elseif(isset($user) && $user->instituicao_id == $instituicao->id) selected @endif>{{$instituicao->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-4 spacing-row1 input-create-box  align-items-start justify-content-start flex-column"
                 style="display: none" id="outra_instituicao">
                <span class="tittle-input ">Outra Instituição</span>
                <input class="w-75 input-text " type="text" name="instituicao" id=""
                       @if(isset($user) && $user->instituicao_id == 2) value="{{$user->instituicao}}" @endif>
            </div>

        </div>

        <div class="row d-flex justify-content-start align-items-center">
            <div class="col d-flex justify-content-evenly align-items-center input-create-box border-0">
                <a class="d-flex justify-content-center align-items-center cancel"
                   href={{ Route('participante.index',['atividade_id' => $atividade->id]) }}> Cancelar</a>
                <button class="submit" type="submit">Cadastrar</button>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            @if(!isset($user))
            if ($('#select_instituicao').val() == '2')
                $('#outra_instituicao').css('display', 'block')
            @endif

            $('#select_instituicao').on('change', function () {
                if ($('#select_instituicao').val() == '2')
                    $('#outra_instituicao').css('display', 'block')
                else
                    $('#outra_instituicao').css('display', 'none')
            })
        });
    </script>

@endsection
