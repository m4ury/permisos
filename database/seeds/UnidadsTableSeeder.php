<?php

use App\Unidad;
use Illuminate\Database\Seeder;

class UnidadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = [
            ["nombre" =>	'CONTROL INVERSIONES Y ANALISIS FINANCIER'],["nombre" =>	'UNIDAD ATENCION AMBULATORIA INTEGRAL'],["nombre" =>	'OF.INF.RECLAMOS Y SUG.(OIRS)'],["nombre" =>	'LABORATORIO CLINICO'],["nombre" =>	'UNIDAD DE ATENCION CERRADA INDIFERENCIAD'],["nombre" =>	'ASEO Y MANTENCION'],["nombre" =>	'MOVILIZACION'],["nombre" =>	'CONTROL INVERSIONES Y ANALISIS FINANCIER'],["nombre" =>	'KINESIOLOGIA'],["nombre" =>	'LAVANDERIA'],["nombre" =>	'FARMACIA'],["nombre" =>	'UNIDAD DE EMERGENCIA HOSPITALARIA'],["nombre" =>	'CENTRAL DE ALIMENTACION'],["nombre" =>	'SECRETARIA Y OFICINA DE PARTES'],["nombre" =>	'DEPTO RECURSOS HUMANOS HOSP.'],["nombre" =>	'UNIDAD APOYO RADIOLOGIA'],["nombre" =>	'CONTABILIDAD Y PRESUPUESTO'],["nombre" =>	'UNIDAD SALUD MENTAL'],["nombre" =>	'SEC. ORIENTACION MED.Y ESTADIS'],["nombre" =>	'UNIDAD DENTAL'],["nombre" =>	'PROGRAMAS ALIMENTARIOS'],["nombre" =>	'BECA LIBRE RETORNO'],["nombre" =>	'BODEGA DE FARMACIA'],["nombre" =>	'SERVICIO DENTAL'],["nombre" =>	'DENTAL'],["nombre" =>	'SERVICIO DE MATERNIDAD']
        ];

        foreach ($unidades as $unidade) {
            Unidad::updateOrCreate($unidade);
        }
    }
}
