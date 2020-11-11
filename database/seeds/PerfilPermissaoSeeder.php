<?php

use App\Helpers\Constants;
use App\Models\PerfilPermissao;
use Illuminate\Database\Seeder;

class PerfilPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //O PERFIL ADMIN JÁ TEM ACESSO A TUDO, NÃO PRECISA DE SEED;

        $perfilPermissao = [
            ['id_perfil' => Constants::PERFIS['ALUNO'], 'id_permissao' => 75],
        ];

        foreach ($perfilPermissao as $value) {
            PerfilPermissao::create($value);
        }
    }
}
