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
        ];

        foreach ($perfilPermissao as $value) {
            PerfilPermissao::create($value);
        }
    }
}
