<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['nom_cliente' => 'HOSPITAL DEL SUR', 'nit' => '12345678', 'direccion' => 'Av. Blanco Galindo, Cochabamba', 'telefono' => '71712345', 'correo' => 'contacto@hospitalsur.bo', 'estado' => true],
            ['nom_cliente' => 'INDUSTRIAS PACENA S.A.', 'nit' => '10293847', 'direccion' => 'Zona industrial, La Paz', 'telefono' => '76543210', 'correo' => 'info@pacena.bo', 'estado' => true],
            ['nom_cliente' => 'MARIA FERNÁNDEZ', 'nit' => '6543210', 'direccion' => 'Calle Bolívar, Tarija', 'telefono' => '70654321', 'correo' => 'mariaf@gmail.com', 'estado' => true],
            ['nom_cliente' => 'FARMACIA CRUZ VERDE', 'nit' => '20486092', 'direccion' => 'Av. Busch, Santa Cruz', 'telefono' => '76439827', 'correo' => 'ventas@cruzverde.bo', 'estado' => true],
            ['nom_cliente' => 'JUAN PÉREZ', 'nit' => '67890123', 'direccion' => 'Av. Aroma, Oruro', 'telefono' => '74839102', 'correo' => 'juan.perez@correo.com', 'estado' => true],
            ['nom_cliente' => 'COOPERATIVA SAN MARTÍN', 'nit' => '12897465', 'direccion' => 'Calle Sucre, Cochabamba', 'telefono' => '73394012', 'correo' => 'contacto@sanmartin.bo', 'estado' => true],
            ['nom_cliente' => 'UNIVALLE', 'nit' => '90128374', 'direccion' => 'Km 6, Cochabamba', 'telefono' => '72727182', 'correo' => 'info@univalle.edu.bo', 'estado' => true],
            ['nom_cliente' => 'ANA MORALES', 'nit' => '34567891', 'direccion' => 'Zona Norte, Santa Cruz', 'telefono' => '75820394', 'correo' => 'ana.morales@yahoo.com', 'estado' => true],
            ['nom_cliente' => 'TIENDA TODO HOGAR', 'nit' => '98345610', 'direccion' => 'Calle Landaeta, La Paz', 'telefono' => '76592830', 'correo' => 'ventas@todohogar.bo', 'estado' => true],
            ['nom_cliente' => 'EMPRESA VITAL AGUA', 'nit' => '45321098', 'direccion' => 'Av. Villazón, Cochabamba', 'telefono' => '76451238', 'correo' => 'info@vitalagua.bo', 'estado' => true],
            ['nom_cliente' => 'FERRETERÍA CENTRAL', 'nit' => '67584930', 'direccion' => 'Zona Villa Fátima, La Paz', 'telefono' => '74321984', 'correo' => 'ventas@ferrecentral.bo', 'estado' => true],
            ['nom_cliente' => 'CLÍNICA SANTA MARÍA', 'nit' => '30948276', 'direccion' => 'Av. Circunvalación, Cochabamba', 'telefono' => '71123456', 'correo' => 'recepcion@santamaria.bo', 'estado' => true],
            ['nom_cliente' => 'ESCUELA BÁSICA LOS ANDES', 'nit' => '38492038', 'direccion' => 'Calle Colón, Potosí', 'telefono' => '73928374', 'correo' => 'direccion@losandes.edu.bo', 'estado' => true],
            ['nom_cliente' => 'JUVENTUD EMPRENDEDORA', 'nit' => '90127463', 'direccion' => 'Av. Petrolera, El Alto', 'telefono' => '76839201', 'correo' => 'info@juventud.bo', 'estado' => true],
            ['nom_cliente' => 'ANA MARÍA QUISPE', 'nit' => '64738291', 'direccion' => 'Barrio Ferroviario, Sucre', 'telefono' => '75201384', 'correo' => 'ana.quispe@gmail.com', 'estado' => true],
            ['nom_cliente' => 'PAPELERÍA COLORÍN', 'nit' => '78392018', 'direccion' => 'Calle Ingavi, Santa Cruz', 'telefono' => '74483910', 'correo' => 'ventas@colorin.bo', 'estado' => true],
            ['nom_cliente' => 'KIOSKO LAS DELICIAS', 'nit' => '98372018', 'direccion' => 'Mercado Calatayud, Cochabamba', 'telefono' => '73291038', 'correo' => 'kiosko@delicias.bo', 'estado' => true],
            ['nom_cliente' => 'SOCIEDAD MÉDICA CENTRAL', 'nit' => '57283910', 'direccion' => 'Av. San Martín, Beni', 'telefono' => '70128347', 'correo' => 'contacto@socmed.bo', 'estado' => true],
            ['nom_cliente' => 'VICTOR MAMANI', 'nit' => '81230498', 'direccion' => 'Calle Pando, La Paz', 'telefono' => '73560192', 'correo' => 'victor.mamani@hotmail.com', 'estado' => true],
            ['nom_cliente' => 'COMERCIAL RUIZ S.R.L.', 'nit' => '74839201', 'direccion' => 'Av. Blanco Galindo, Quillacollo', 'telefono' => '75028391', 'correo' => 'contacto@comruiz.bo', 'estado' => true],
        ]);
    }
}
