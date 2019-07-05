<?php

use App\Cargo;
use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargos = [
            ["nombre" =>	'MATRONA'],["nombre" =>	'ADMINISTRATIVO'],["nombre" =>	'TECNOLOGO MEDICO'],["nombre" =>	'AUXILIAR PARAMEDICO'],["nombre" =>	'AUXILIAR'],["nombre" =>	'CHOFER'],["nombre" =>	'ENFERMERA(O)'],["nombre" =>	'PROFESIONALES UNIVERSITARIOS'],["nombre" =>	'JEFE CONTABILIDAD Y PRESUPUESTO'],["nombre" =>	'ASISTENTE SOCIAL'],["nombre" =>	'TECNICO DE NIVEL SUPERIOR EN ENFERMERIA'],["nombre" =>	'QUIMICO FARMACEUTICO'],["nombre" =>	'KINESIOLOGO'],["nombre" =>	'NUTRICIONISTA'],["nombre" =>	'MEDICOS EN COMISION DE ESTUDIOS'],["nombre" =>	'MED. GRAL. DE ZONA'],["nombre" =>	'DENT. GRAL. DE ZONA']
        ];

        foreach ($cargos as $cargo) {
            Cargo::updateOrCreate($cargo);
        }
    }
}
