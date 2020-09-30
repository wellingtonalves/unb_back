<?php

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
        //O perfil 1 = ADMIN, não precisa de seed, ele tem acesso a tudo, isso é apenas para testar.
        $perfilPermissao = [
            ['id_perfil' => 1, 'id_permissao' => 1],
            ['id_perfil' => 1, 'id_permissao' => 2],
            ['id_perfil' => 1, 'id_permissao' => 3],
            ['id_perfil' => 1, 'id_permissao' => 4],
            ['id_perfil' => 1, 'id_permissao' => 5],
            ['id_perfil' => 1, 'id_permissao' => 6],
            ['id_perfil' => 1, 'id_permissao' => 7],
            ['id_perfil' => 1, 'id_permissao' => 8],
            ['id_perfil' => 1, 'id_permissao' => 9],
            ['id_perfil' => 1, 'id_permissao' => 10],
            ['id_perfil' => 1, 'id_permissao' => 11],
            ['id_perfil' => 1, 'id_permissao' => 12],
            ['id_perfil' => 1, 'id_permissao' => 13],
            ['id_perfil' => 1, 'id_permissao' => 14],
            ['id_perfil' => 1, 'id_permissao' => 15],
        ];

        foreach ($perfilPermissao as $value) {
            PerfilPermissao::create($value);
        }
    }
}
