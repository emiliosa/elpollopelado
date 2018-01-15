<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('provincia')->delete();
        DB::table('partido')->delete();
        DB::table('localidad')->delete();
        DB::table('moneda')->delete();
        DB::table('tipo_de_cliente')->delete();
        DB::table('tipo_de_identificacion')->delete();
        DB::table('categoria')->delete();
        DB::table('producto')->delete();
        DB::table('cliente')->delete();

        /*DB::table('social_logins')->delete();
        DB::table('permission_role')->delete();
        DB::table('permission_user')->delete();
        DB::table('permissions')->delete();
        DB::table('password_resets')->delete();
        DB::table('role_user')->delete();
        DB::table('roles')->delete();
        DB::table('activations')->delete();
        DB::table('profiles')->delete();
        DB::table('themes')->delete();
        DB::table('users')->delete();*/
        
        $this->call(ProvinciaTableSeeder::class);
        $this->call(PartidoTableSeeder::class);
        $this->call(LocalidadTableSeeder::class);
        $this->call(MonedaTableSeeder::class);
        $this->call(TipoDeClienteTableSeeder::class);
        $this->call(TipoDeIdentificacionTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}

