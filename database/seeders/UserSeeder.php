<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
       /* \App\Models\User::insert([
            [ 
                'name' => 'Left4code',
                'email' => 'midone@left4code.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'gender' => 'male',
                'active' => 1,
                'remember_token' => Str::random(10)
            ]
        ]);*/

        
            //$resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; select LTRIM(RTRIM(nombre)) nombre, LTRIM(RTRIM(nom_cto))nom_cto, 
            //LTRIM(RTRIM(pwd))pwd,LTRIM(RTRIM(nombre_lar))nombre_lar , LTRIM(RTRIM(puesto))puesto, LTRIM(RTRIM(cia_ventas))cia_ventas from tcausr  where nombre in ('yulianasm','cosme','jcarlos','quimi','pedrocs','berthap','carlosto','edgarj','lauraa','joseaa','ejafet','enriqued','gregoria') or puesto='direccion'");

            //$resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; select LTRIM(RTRIM(nombre)) nombre, LTRIM(RTRIM(nom_cto))nom_cto, 
            //LTRIM(RTRIM(pwd))pwd,LTRIM(RTRIM(nombre_lar))nombre_lar , LTRIM(RTRIM(puesto))puesto, LTRIM(RTRIM(cia_ventas))cia_ventas from tcausr  where nombre like '%vtaruta%' and nom_cto not in ('b22','b23','omm','v13','v21') and nombre_lar !='BAJA'");

            $resultado1 = DB::connection('sqlsrv2')->select("SET NOCOUNT ON; select LTRIM(RTRIM(nombre)) nombre, LTRIM(RTRIM(nom_cto))nom_cto, 
            LTRIM(RTRIM(pwd))pwd,LTRIM(RTRIM(nombre_lar))nombre_lar , LTRIM(RTRIM(puesto))puesto, LTRIM(RTRIM(cia_ventas))cia_ventas from tcausr  where puesto ='GTEOPE'");
            for( $i=0; $i<count($resultado1); $i++){

                DB::table('users')->insert([
                    'name' => $resultado1[$i]->nombre,
                    'nom_cto'=> $resultado1[$i]->nom_cto,
                    'password' => Hash::make($resultado1[$i]->pwd),
                    'nombre_lar' => $resultado1[$i]->nombre_lar,
                    'puesto' =>$resultado1[$i]->puesto,
                    'email' => '',
                    'cia_ventas' =>$resultado1[$i]->cia_ventas,
                    'active' => 1
                ]);
            }
        

         /*DB::table('users')->insert([
            'name' => 'ENRIQUED',
            'nom_cto'=> 'DAV',
            'password' => Hash::make('MINI24SORI'),
            'nombre_lar' => 'ENRIQUE DAVID SORIANO HERNANDEZ',
            'puesto' =>'SOPERACION',
            'email' => '',
            'cia_ventas' =>'OFC',
            'active' => 1
        ]);
        
        
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'nom_cto'=> 'ADM',
            'password' => Hash::make('ADMIN'),
            'nombre_lar' => 'ADMINISTRADOR',
            'puesto' =>'DIRECCION',
            'email' => '',
            'cia_ventas' =>'OFC',
            'active' => 1
        ]); */

        // Fake users
        //User::factory()->times(9)->create();
    }
}
