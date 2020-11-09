<?php

namespace App\Models;

use App\Models\Domain\TipoOferta;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends AbstractModel
{
    use SoftDeletes;

    protected $table = 'tb_oferta';
    protected $primaryKey = 'id_oferta';

    protected $fillable = [
        'id_legado_oferta',
        'id_ava',
        'id_curso',
        'id_pessoa_tutor',
        'id_modelo_certificado',
        'tx_nome_oferta',
        'tx_nome_curso',
        'qt_carga_horaria_oferta',
        'qt_carga_horaria_minima',
        'qt_vagas',
        'tp_com_tutoria',
        'dt_inicio_oferta',
        'dt_termino_oferta',
        'dt_inicio_inscricao',
        'dt_termino_inscricao',
        'dt_inicio_selecao',
        'dt_termino_selecao',
        'qt_nota_minima_aprovacao',
        'tp_situacao_oferta',
        'tp_tipo_turma',
        'tx_nome_orgao_demandante',
        'created_at',
        'updated_at',
        'id_tipo_oferta',
        'id_parceiros',
        'bl_disponivel',
        'qt_duracao_dias',
        'id_orgao_conteudista',
        'id_certificador',
        'tx_publico_alvo',
        'bl_oferta_piloto',
        'id_metodologia',
        'tp_origem_oferta',
    ];

    protected $appends = ['total_ofertas'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoOferta(): BelongsTo
    {
        return $this->belongsTo(TipoOferta::class, 'id_tipo_oferta');
    }

    /**
     * @return string
     */
    public function getTpComTutoriaAttribute()
    {
        return trim($this->attributes['tp_com_tutoria']);
    }

    /**
     * @return string
     */
    public function getTpSituacaoOfertaAttribute()
    {
        return trim($this->attributes['tp_situacao_oferta']);
    }

    /**
     * @return int
     */
    public function getTotalOfertasAttribute()
    {
        return $this->inscricao()->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscricao(): HasMany
    {
        return $this->hasMany(Inscricao::class, 'id_oferta');
    }
}