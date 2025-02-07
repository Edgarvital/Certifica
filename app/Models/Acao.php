<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    use HasFactory;

    protected $table = 'acaos';

    protected $fillable = ['titulo', 'data_inicio', 'data_fim', 'natureza_id', 'usuario_id', 'anexo', 'unidade_administrativa_id'];

    public static $rules = [
        'titulo'                    => 'required|string|min:10',
        'data_inicio'               => 'required|before:data_fim',
        'data_fim'                  => 'required|after:data_inicio',
        'natureza_id'               => 'required',
        'usuario_id'                => 'required',
        'anexo'                     => 'required|file'
    ];

    public static $messages = [
        'titulo.required'           => 'O título deve ser preenchido',
        'titulo.string'             => 'O título deve possuir apenas letras.',
        'titulo.min'                => 'O título deve ter 10 ou mais caracteres',
        'data_inicio.required'      => 'A data de inicio deve ser preenchida',
        'data_inicio.before'        => 'A data de inicio deve ser anterior a data de fim',
        'data_fim.required'         => 'A data de fim deve ser preenchida',
        'data_fim.after'            => 'A data de fim deve ser após a data de inicio',
        'natureza_id'               => 'A natureza deve ser informada',
        'usuario_id'                => 'O usuário deve ser informado',
        'anexo'                     => 'O arquivo enviado deve ser no formato PDF',
        'anexo.required'            => 'O envio do arquivo é obrigatório'

    ];

    public function tipo_natureza(){
        return $this->belongsTo(TipoNatureza::class);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function unidadeAdministrativa(){
        return $this->belongsTo('App\Models\Natureza');
    }

    public function atividades(){
        return $this->hasMany('App\Models\Atividade');
    }

}
