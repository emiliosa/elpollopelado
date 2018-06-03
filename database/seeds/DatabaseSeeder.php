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
        DB::table('producto_precio')->delete();
        DB::table('producto')->delete();
        DB::table('cliente')->delete();

        $this->call(ProvinciaTableSeeder::class);
        $this->call(PartidoTableSeeder::class);
        $this->call(LocalidadTableSeeder::class);
        $this->call(MonedaTableSeeder::class);
        $this->call(TipoDeClienteTableSeeder::class);
        $this->call(TipoDeIdentificacionTableSeeder::class);
        $this->call(CategoriaTableSeeder::class);
        $this->call(ProductoTableSeeder::class);
        $this->call(ProductoPrecioTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
