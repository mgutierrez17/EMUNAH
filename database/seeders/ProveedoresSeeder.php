<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $proveedores = [
            ['nom_proveedor' => 'Químicos Bolivianos S.R.L.', 'nit' => '1234567890', 'direccion' => 'Calle Aroma 102', 'telefono' => '76543210', 'correo' => 'ventas@quimicobol.com', 'estado' => true],
            ['nom_proveedor' => 'Distribuciones LIMA', 'nit' => '1029384756', 'direccion' => 'Av. Sucre Nº 45', 'telefono' => '77445566', 'correo' => 'contacto@lima.bo', 'estado' => true],
            ['nom_proveedor' => 'Insumos del Norte', 'nit' => '9345678901', 'direccion' => 'Av. Cristo Redentor KM 8', 'telefono' => '72233444', 'correo' => 'info@insumosnorte.com', 'estado' => true],
            ['nom_proveedor' => 'Soluciones Higiénicas', 'nit' => '8899112233', 'direccion' => 'Calle 8, San Pedro', 'telefono' => '76442121', 'correo' => 'higiene@soluciones.com', 'estado' => true],
            ['nom_proveedor' => 'CLEANBO S.A.', 'nit' => '1122334455', 'direccion' => 'Zona Industrial P.I. B', 'telefono' => '71234567', 'correo' => 'contacto@cleanbo.bo', 'estado' => true],
            ['nom_proveedor' => 'Bolivia Clean', 'nit' => '3344556677', 'direccion' => 'Av. Blanco Galindo KM 4', 'telefono' => '79112233', 'correo' => 'ventas@boliviaclean.com', 'estado' => true],
            ['nom_proveedor' => 'EcoDistribuciones', 'nit' => '5566778899', 'direccion' => 'Calle Camacho 202', 'telefono' => '77665544', 'correo' => 'ecodistribuciones@gmail.com', 'estado' => true],
            ['nom_proveedor' => 'Higiene Total S.R.L.', 'nit' => '9988776655', 'direccion' => 'Av. América Este', 'telefono' => '71123344', 'correo' => 'ventas@higienetotal.bo', 'estado' => true],
            ['nom_proveedor' => 'Rojas CleanTech', 'nit' => '8877665544', 'direccion' => 'Calle Litoral Nº 18', 'telefono' => '73445566', 'correo' => 'info@rojascleantech.com', 'estado' => true],
            ['nom_proveedor' => 'Insumos Andinos', 'nit' => '7766554433', 'direccion' => 'Av. Pando, Edif. Andino', 'telefono' => '76543211', 'correo' => 'insumos@andinos.bo', 'estado' => true],
            ['nom_proveedor' => 'Distribuciones La Paz', 'nit' => '6677889900', 'direccion' => 'Av. Arce Nº 321', 'telefono' => '72123456', 'correo' => 'lapaz@distri.bo', 'estado' => true],
            ['nom_proveedor' => 'Proveedores Patzi', 'nit' => '7788990011', 'direccion' => 'Villa Fátima', 'telefono' => '73445522', 'correo' => 'patzi@provee.com', 'estado' => true],
            ['nom_proveedor' => 'Pando Clean', 'nit' => '6655443322', 'direccion' => 'Zona Centro Cobija', 'telefono' => '77881234', 'correo' => 'ventas@pandoclean.bo', 'estado' => true],
            ['nom_proveedor' => 'BioSoluciones', 'nit' => '3344221100', 'direccion' => 'Av. Banzer, Santa Cruz', 'telefono' => '79998877', 'correo' => 'bio@soluciones.com', 'estado' => true],
            ['nom_proveedor' => 'SaniPlus Bolivia', 'nit' => '2244668800', 'direccion' => 'Zona Sur, Calle 12', 'telefono' => '76559988', 'correo' => 'contacto@saniplus.bo', 'estado' => true],
            ['nom_proveedor' => 'Santa Clean', 'nit' => '8877332211', 'direccion' => 'Av. Grigotá Nº 111', 'telefono' => '71112233', 'correo' => 'ventas@santaclean.com', 'estado' => true],
            ['nom_proveedor' => 'HidroAndes', 'nit' => '5566007788', 'direccion' => 'Zona Parque Industrial', 'telefono' => '78991234', 'correo' => 'info@hidroandes.bo', 'estado' => true],
            ['nom_proveedor' => 'Ecoplus S.R.L.', 'nit' => '6677990044', 'direccion' => 'Calle Murillo, Centro', 'telefono' => '72114567', 'correo' => 'ecoplus@servicios.bo', 'estado' => true],
            ['nom_proveedor' => 'Desinfecta Ya!', 'nit' => '2233445566', 'direccion' => 'Av. Villazón KM 3', 'telefono' => '76332211', 'correo' => 'contacto@desinfectaya.bo', 'estado' => true],
            ['nom_proveedor' => 'Ultra Clean', 'nit' => '4433221100', 'direccion' => 'Av. Juan Pablo II', 'telefono' => '77112233', 'correo' => 'info@ultraclean.bo', 'estado' => true],
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::create($proveedor);
        }
    }
}
