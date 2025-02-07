@extends('layouts.app')

@section('title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="/css/coordenador/index.css">
@endsection

@section('content')
    
    <div class="index-coordenador-view">
        <div class="row d-flex align-items-start justify-content-between">
            <div class="box-coordenador-index d-flex flex-row align-items-start col">
                <a class="link-opt" href={{ route('acao.index') }} >
                    <div class="box-opt padding-listar d-flex flex-column align-items-center justify-content-evenly">
                        <img class="icon-opt" src={{"/images/home/lista.svg"}} alt="">
                        <span>Listar Ações</span> 
                    </div>
                </a>
                <a class="link-opt" href={{ route('acao.create') }} >
                    <div class="box-opt d-flex flex-column align-items-center justify-content-evenly">
                        <img class="icon-opt" src={{"/images/home/cadastrar.svg"}} alt="">
                        <span>Cadastrar Ações</span> 
                    </div>
                </a>
            </div>
            <div class="col d-flex align-items-end justify-content-end">
                <div class="box-infos border">
                    <div class="tittle-box text-center d-flex align-items-center justify-content-center">
                        <img class="icon-titulo" src={{"/images/home/titulo.svg"}} alt="">Informações
                    </div>
                    <div class="d-flex flex-column">
                        <div class="text-center">
                            Total Ações
                        </div>
                        <div class="d-flex align-items-center justify-content-around"> 
                            <div class="square aprovado border d-flex align-items-center justify-content-center">
                                {{$aprovadas}}
                            </div>
                            <div class="square analise border d-flex align-items-center justify-content-center">
                                {{$analise}}
                            </div>
                            <div class="square devolvido border d-flex align-items-center justify-content-center">
                                {{$devolvidas}}
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-around">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div>Aprovadas</div>
                                <div><img src={{"/images/home/aprovado.svg"}} alt=""></div>
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div>Em análise</div>
                                <div><img src={{"/images/home/analise.svg"}} alt=""></div>
                            </div>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div>Devolvidas</div>
                                <div><img src={{"/images/home/devolvido.svg"}} alt=""></div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

