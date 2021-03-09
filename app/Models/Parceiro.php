<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Parceiro extends AbstractModel
{

    protected $table = 'tb_parceiros';
    protected $primaryKey = 'id_parceiros';

    protected $fillable = [
        'tx_nome_parceiros',
        'tx_logo_parceiros',
        'tx_link_parceiros'
    ];

    protected $appends = ['url_logo'];

    public function exclusividade(): HasMany
    {
        return $this->hasMany(ExclusividadeOferta::class, 'id_orgao_parceiro', 'id_parceiros');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getUrlLogoAttribute()
    {
        if(!$this->tx_logo_parceiros){
            return url('img/instituicoes/enap_horizontal.jpg');
        }
        return url($this->tx_logo_parceiros);
    }
}
