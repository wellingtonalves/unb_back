<?php

namespace App\Models;

use App\Models\Domain\ModeloCertificado;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Programa extends AbstractModel
{
    protected $table = 'tb_programa';
    protected $primaryKey = 'id_programa';

    public $nested = ['programa_curso'];

    protected $fillable = [
        'id_modelo_certificado',
        'tx_nome_programa',
        'dt_inicio_validade',
        'dt_termino_validade',
        'created_at',
        'updated_at',
        'tp_situacao_programa',
        'qt_carga_horaria',
        'tx_publico_alvo',
        'tx_apresentacao',
        'tx_url_imagem',
        'bl_programa_destaque',
        'id_criterio_programa',
        'tx_orientacao',
    ];

    protected $appends = ['dt_inicio_validade_formatada', 'dt_termino_validade_formatada'];

    /**
     * @return BelongsTo
     */
    public function modeloCertificado(): BelongsTo
    {
        return $this->belongsTo(ModeloCertificado::class);
    }

    /**
     * @return BelongsToMany
     */
    public function programaCurso(): BelongsToMany
    {
        return $this->belongsToMany(Curso::class, 'tb_programa_curso', 'id_programa', 'id_curso');
    }

    /**
     * @return BelongsTo
     */
    public function criterioPrograma(): BelongsTo
    {
        return $this->belongsTo(CriterioPrograma::class);
    }

    /**
     * @return false|string|null
     */
    public function getDtInicioValidadeFormatadaAttribute()
    {
        return !$this->attributes['dt_inicio_validade'] ? null : date('d-m-Y', strtotime($this->attributes['dt_inicio_validade']));
    }

    /**
     * @return false|string|null
     */
    public function getDtTerminoValidadeFormatadaAttribute()
    {
        return !$this->attributes['dt_termino_validade'] ? null : date('d-m-Y', strtotime($this->attributes['dt_termino_validade']));
    }
}
