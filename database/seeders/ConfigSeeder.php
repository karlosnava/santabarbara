<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Config;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        $configs = [
            [
                "name"    => "app_name",
                "details" => "Nombre de toda la aplicación",
                "value"   => "Colegio SantaBárbara IED",
                "type"   => "text",
            ],
            [
                "name"    => "site_description",
                "details" => "Descripción de la página",
                "value"   => "El Colegio Santa Bárbara I.E.D. está ubicado en la localidad 19 de Ciudad Bolívar conformado por tres sedes localizadas en los barrios Compartir y Juan Pablo II, actualmente cuenta con una población de 2000 estudiantes de preescolar, básica primaria, básica secundaria y media, siendo esta un recurso humano muy valioso por su vigor, empeño, colaboración y ganas por dignificar su vida.",
                "type"   => "textarea",
            ],
            [
                "name"    => "theme",
                "details" => "Color principal del sitio",
                "value"   => "#007BFF",
                "type"   => "color",
            ],
            [
                "name"    => "category",
                "details" => "Categoría del sitio",
                "value"   => "education",
                "type"   => "text",
            ],
            [
                "name"    => "keywords",
                "details" => "Palabras clave del sitio",
                "value"   => "Colegio, santa, barbara",
                "type"   => "text",
            ],
            [
                "name"    => "page_icon",
                "details" => "Icono de la página",
                "value"   => "img/logo.png",
                "type"   => "file",
            ],
            [
                "name"    => "page_records",
                "details" => "Número de registros por página cuando se le asigna el método paginate a una consulta",
                "value"   => 20,
                "type"   => "number",
            ],
            [
                "name"    => "limit_records",
                "details" => "Limite de registros por consulta",
                "value"   => 50,
                "type"   => "number",
            ],
            [
                "name"    => "site_topic",
                "details" => "Tematica de la página (ideal para Halloween, Navidad o eventos)",
                "value"   => "normal",
                "type"   => "boolean",
            ],
            [
                "name"    => "site_details",
                "details" => "Añadir detalles a la página, como particulas en temática Navidadeña o calabazas en temática Halloween.",
                "value"   => false,
                "type"   => "boolean",
            ],
        ];

        foreach ($configs as $config) {
            Config::factory(1)->create($config);
        }
    }
}
