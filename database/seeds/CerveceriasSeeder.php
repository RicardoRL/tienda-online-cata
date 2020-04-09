<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CerveceriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Cervecerias con la Letra A
        
        DB::table('cervecerias')->insert([
            'nombre' => 'Cerveceria Acapulco',
            'ciudad' => 'Mexico',
            'sitio_web' => 'https://www.facebook.com/pages/Cervecer%C3%ADa-Acapulco/152086821571341',
            'contacto' => '55 5784 7176',
            'imagen' => 'acapulco',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Albur Cervecería',
            'ciudad' => 'Monterrey',
            'sitio_web' => 'http://albur.mx/',
            'contacto' => '81 8360 1901',
            'imagen' => 'albur.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Allende',
            'ciudad' => 'Guerrero',
            'sitio_web' => 'cerveceriaallende.mx',
            'contacto' => '415 150 7573',
            'imagen' => 'allende.png',
        ]);
        DB::table('cervecerias')->insert([
            'nombre' => 'Alma Negra',
            'ciudad' => 'Guerrero',
            'sitio_web' => 'https://www.facebook.com/AlmaNegraIguala/',
            'contacto' => '733 144 9265',
            'imagen' => 'alma_negra.jpg',
        ]);

            // Cervecerias con la Letra B

        DB::table('cervecerias')->insert([
            'nombre' => 'Baja Brewing ',
            'ciudad' => 'Baja california sur',
            'sitio_web' => 'bajabrewingcompany.com',
            'contacto' => '624 142 1292',
            'imagen' => 'baja_brewing.png',
        ]);
        DB::table('cervecerias')->insert([
            'nombre' => 'Barón de la Cerveza',
            'ciudad' => 'Mexico',
            'sitio_web' => 'barondelacerveza.com.mx',
            'contacto' => '55 6308 3034',
            'imagen' => 'baron.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Beer Bros',
            'ciudad' => 'Mexico',
            'sitio_web' => 'https://www.beerbros.mx/',
            'contacto' => '53353234',
            'imagen' => 'beer_bros.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Border Psycho Brewery',
            'ciudad' => 'Tijuana',
            'sitio_web' => 'borderpsychobrewery.com',
            'contacto' => '664 379 1235',
            'imagen' => 'border_psycho.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Buscapleitos',
            'ciudad' => 'Mexico',
            'sitio_web' => 'http://buscapleitos.com.mx/',
            'contacto' => '5528582441',
            'imagen' => 'buscapleitos.png',
        ]);

         // Cervecerias con la Letra C

        DB::table('cervecerias')->insert([
            'nombre' => 'Calavera Beer',
            'ciudad' => 'Mexico',
            'sitio_web' => 'calaverabeer.com',
            'contacto' => '55 5365 3685',
            'imagen' => 'calavera_beer.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Chaca',
            'ciudad' => 'Mexico',
            'sitio_web' => 'https://www.facebook.com/ChacaArtesanal/',
            'contacto' => '52 449 807 7239',
            'imagen' => 'chaca.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Chaneque',
            'ciudad' => 'Mexico',
            'sitio_web' => 'http://www.cervezachaneque.com/',
            'contacto' => '(01 55) 1718 0600',
            'imagen' => 'chaneque.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Chela libre',
            'ciudad' => 'Mexico',
            'sitio_web' => '',
            'contacto' => 'https://chelalibre.mx/',
            'imagen' => 'chela_libres.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Colima',
            'ciudad' => 'Colima',
            'sitio_web' => 'https://cerveceriadecolima.com/',
            'contacto' => '3123150100',
            'imagen' => 'colima.png',
        ]);
        
            // Cervecerias con la Letra D
        
        DB::table('cervecerias')->insert([
            'nombre' => 'De la O',
            'ciudad' => 'Guadalajara, Jalisco',
            'sitio_web' => 'https://www.facebook.com/DeLaOgenovevo/',
            'contacto' => '33 2465 9094',
            'imagen' => 'de-la-o.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Duende rojo',
            'ciudad' => 'Guadalajara, Jalisco',
            'sitio_web' => 'http://www.duenderojo.com/',
            'contacto' => '33 1983 6317',
            'imagen' => 'duende_rojo.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Don Javier',
            'ciudad' => 'Ciudad de Mexico',
            'sitio_web' => 'https://www.facebook.com/CervezaArtesanalDonJavier/',
            'contacto' => '+52 1 442 595 8885',
            'imagen' => 'don_javier.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Diosas',
            'ciudad' => 'Ciudad de México',
            'sitio_web' => 'http://www.diosasdemalta.com.mx/',
            'contacto' => '',
            'imagen' => 'diosas.jpg',
        ]);

            // Cervecerias con la letra E

        DB::table('cervecerias')->insert([
            'nombre' => 'El secreto 1881',
            'ciudad' => 'Mexico',
            'sitio_web' => 'https://www.facebook.com/elsecreto1881/',
            'contacto' => '55 5587 2122',
            'imagen' => 'el-secreto-1881.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Elfo',
            'ciudad' => 'México',
            'sitio_web' => 'http://www.cerveceriaelfo.com.mx/',
            'contacto' => '55 5243 4314',
            'imagen' => 'elfo.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Fauna',
            'ciudad' => 'Mexicali Baja california',
            'sitio_web' => 'https://cervezafauna.com/',
            'contacto' => '(686) 562 6719',
            'imagen' => 'fauna.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Flandrine',
            'ciudad' => 'Mexico',
            'sitio_web' => 'https://www.facebook.com/Flandrine/',
            'contacto' => '55 2153 8603',
            'imagen' => 'flandrine.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Fortuna',
            'ciudad' => 'Zapopan, Jalisco',
            'sitio_web' => 'http://cervezafortuna.com/',
            'contacto' => '3336277132            ',
            'imagen' => 'fortuna.jpg',
        ]);

        // Cervecerias con la letra G

        DB::table('cervecerias')->insert([
            'nombre' => 'Genaro roque',
            'ciudad' => 'Guanajuato, Mexico',
            'sitio_web' => 'http://genaroroque.com/',
            'contacto' => '+52 4771580820',
            'imagen' => 'genaro_roque.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Guanajuato',
            'ciudad' => 'Guanajuato, Leon',
            'sitio_web' => 'http://www.cguanajuato.mx/',
            'contacto' => '477 404 6261',
            'imagen' => 'guanajuato.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Heroica',
            'ciudad' => 'Veracruz',
            'sitio_web' => 'https://www.cerveceriaheroica.mx/contacto/',
            'contacto' => '+52 229 465 2586',
            'imagen' => 'heroica.png',
        ]);

            // Cervecerias con la letra I

        DB::table('cervecerias')->insert([
            'nombre' => 'Insugente',
            'ciudad' => 'Tijuana',
            'sitio_web' => 'cervezainsurgente.com',
            'contacto' => '664 634 1242',
            'imagen' => 'insurgente.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Irrevente',
            'ciudad' => 'Mexico',
            'sitio_web' => 'http://cervezairreverente.com/',
            'contacto' => '557 125 2631',
            'imagen' => 'irrevente.png',
        ]);

            // Cervecerias con la letra K

        DB::table('cervecerias')->insert([
            'nombre' => 'Karamawi',
            'ciudad' => 'Ciudad de México',
            'sitio_web' => 'http://cerveceriakaramawi.mx/',
            'contacto' => '044 2225 23 34 31',
            'imagen' => 'karamawi.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Kella',
            'ciudad' => 'Ciudad de mexico',
            'sitio_web' => 'www.cervezakella.com.mx',
            'contacto' => '722 261 2609',
            'imagen' => 'kella.png',
        ]);

         // Cervecerias con la letra L

        DB::table('cervecerias')->insert([
            'nombre' => 'Libertad',
            'ciudad' => 'Leon gto',
            'sitio_web' => 'https://cervezalibertad.com/',
            'contacto' => '(477) 167 8125',
            'imagen' => 'libertad.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Linares 102',
            'ciudad' => 'Ciudad de mexico',
            'sitio_web' => 'https://www.cerveza102.com/',
            'contacto' => '666 976 405',
            'imagen' => 'Linares-102.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Luna negra',
            'ciudad' => 'Mexico',
            'sitio_web' => 'http://www.cervecerialunanegra.mx/',
            'contacto' => '551581 8649',
            'imagen' => 'luna_negra.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'La Brü',
            'ciudad' => 'Morelia, Michoacán',
            'sitio_web' => 'http://www.cervezalabru.com.mx/',
            'contacto' => '443 274 07 83',
            'imagen' => 'la-bru.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'La Última del Desierto',
            'ciudad' => 'San luis potosi',
            'sitio_web' => 'https://www.facebook.com/La-%C3%9Altima-del-Desierto-108649775971940',
            'contacto' => '',
            'imagen' => 'la-ultima-del-desierto.jpg',
        ]);

            // Cervecerias con la letra M

        DB::table('cervecerias')->insert([
            'nombre' => 'Minerva',
            'ciudad' => 'Zapopan, Jalisco',
            'sitio_web' => 'https://www.cervezaminerva.mx/',
            'contacto' => '33 3682 0474',
            'imagen' => 'minerva.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Malapinta',
            'ciudad' => 'Ciudad de México',
            'sitio_web' => 'https://malapinta.mx/',
            'contacto' => '+52 777 202 4932',
            'imagen' => 'malapinta.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Mala Santa',
            'ciudad' => 'aguascalientes,México',
            'sitio_web' => 'http://www.malasanta.beer/',
            'contacto' => '449 2865697',
            'imagen' => 'malasanta.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Madrina',
            'ciudad' => 'Ciudad de mexico',
            'sitio_web' => 'http://madrina.com.mx/',
            'contacto' => '',
            'imagen' => 'madrina.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Mogos',
            'ciudad' => 'Ciudad de mexico',
            'sitio_web' => 'https://www.cervezaartesanalmogos.com/',
            'contacto' => '7772932881',
            'imagen' => 'mogos.jpg',
        ]);

            // Cervecerias con la letra N

        DB::table('cervecerias')->insert([
            'nombre' => 'Nacional Morelos',
            'ciudad' => 'Morelos',
            'sitio_web' => 'http://www.nacionalmorelos.com.mx/',
            'contacto' => '+52 443 312 7839',
            'imagen' => 'nacional-morelos.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Naipe',
            'ciudad' => 'Guadalajara, Jalisco',
            'sitio_web' => 'https://www.cervezanaipe.com/',
            'contacto' => '3340402458',
            'imagen' => 'naipe.jpg',
        ]);

            // Cervecerias con la letra O

        DB::table('cervecerias')->insert([
            'nombre' => 'Olmeca',
            'ciudad' => 'Tabasco',
            'sitio_web' => 'http://www.cervezaolmeca.com/',
            'contacto' => '9933906504',
            'imagen' => 'olmeca.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Origen 1537',
            'ciudad' => 'Puebla',
            'sitio_web' => 'http://origen1537.com/',
            'contacto' => '+52 222 474 9744',
            'imagen' => 'origen-1537.jpg',
        ]);

            // Cervecerias con la letra P

        DB::table('cervecerias')->insert([
            'nombre' => 'Propaganda Brewing',
            'ciudad' => 'Monterrey',
            'sitio_web' => 'https://propagandabrewing.com.mx/',
            'contacto' => '81 2558 5045',
            'imagen' => 'propaganda_brewing.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Pirámides',
            'ciudad' => 'Teotihuacán',
            'sitio_web' => 'https://www.facebook.com/cervezapiramides/',
            'contacto' => '55 1079 4885',
            'imagen' => 'piramides.jpg',
        ]);

             // Cervecerias con la letra Q

        DB::table('cervecerias')->insert([
            'nombre' => 'Quinta Esencia',
            'ciudad' => 'Monterrey',
            'sitio_web' => 'https://www.facebook.com/QuintaEsencia.ecu/',
            'contacto' => '0998385984',
            'imagen' => 'quintaesencia.jpg',
        ]);

             // Cervecerias con la letra R

        DB::table('cervecerias')->insert([
            'nombre' => 'Ramuri',
            'ciudad' => 'Tijuana',
            'sitio_web' => 'https://www.cervezaramuri.com/',
            'contacto' => '01 (664) 626.8809',
            'imagen' => 'ramuri.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Refrán',
            'ciudad' => 'Tamaulipas',
            'sitio_web' => 'cervezarefran.com',
            'contacto' => '',
            'imagen' => 'refran.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Ruda',
            'ciudad' => 'Guadalajara Jalisco',
            'sitio_web' => 'www.cervezaruda.com',
            'contacto' => '',
            'imagen' => 'ruda.jpg',
        ]);

        // Cervecerias con la letra S

        DB::table('cervecerias')->insert([
            'nombre' => 'San Pascual Baylón',
            'ciudad' => 'Puebla',
            'sitio_web' => 'http://www.cerveceriaspb.com/',
            'contacto' => '(222) 260 80 57',
            'imagen' => 'san-pascual-baylon.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Santa Chela',
            'ciudad' => 'Cholula, Puebla',
            'sitio_web' => 'https://twitter.com/SantaChelaMx',
            'contacto' => '',
            'imagen' => 'santa-chela.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Schoenfeld Brewery',
            'ciudad' => 'Ciudad de mexico',
            'sitio_web' => 'http://schoenfeldbrewery.com/',
            'contacto' => '+52 55 6731 8601',
            'imagen' => 'schoenfeld-brewery.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Sierra Fría',
            'ciudad' => 'Aguascalientes',
            'sitio_web' => 'https://www.facebook.com/CervezaSierraFria/',
            'contacto' => '+52 449 113 5381',
            'imagen' => 'sierra-fria.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Steinbock',
            'ciudad' => 'Guadalajara jalisco',
            'sitio_web' => 'https://www.facebook.com/Steinbock-Cerveza-Artesanal-de-Mexico-315725685111337/',
            'contacto' => '+51 33 12 52 00 71',
            'imagen' => 'steinbock.jpg',
        ]);

            // Cervecerias con la letra T

        DB::table('cervecerias')->insert([
            'nombre' => 'Tenek',
            'ciudad' => 'Desconocido',
            'sitio_web' => 'https://www.tenekbeer.com/',
            'contacto' => '222 323 6200',
            'imagen' => 'tenek.png',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Toro',
            'ciudad' => 'Queretaro',
            'sitio_web' => 'https://www.cervezatoro.com/',
            'contacto' => '442 2810945',
            'imagen' => 'toro.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Tres casas',
            'ciudad' => 'Ciudad de México',
            'sitio_web' => 'https://www.cerveceriatrescasas.com/',
            'contacto' => '',
            'imagen' => 'tres-casas.jpg',
        ]);

        // Cervecerias con la letra U

        DB::table('cervecerias')->insert([
            'nombre' => 'Uey',
            'ciudad' => 'Monterrey',
            'sitio_web' => 'www.cervezauey.com',
            'contacto' => '',
            'imagen' => 'uey.jpg',
        ]);

        // Cervecerias con la letra V

        DB::table('cervecerias')->insert([
            'nombre' => 'Ventura',
            'ciudad' => 'Guadalajara Jalisco',
            'sitio_web' => 'https://www.facebook.com/CervezaVentura/',
            'contacto' => '33 1542 1709',
            'imagen' => 'ventura.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Vickers',
            'ciudad' => 'Desconocido',
            'sitio_web' => 'https://www.facebook.com/VickersBrewingCo/',
            'contacto' => '',
            'imagen' => 'vickers.jpg',
        ]);

        // Cervecerias con la letra W

        DB::table('cervecerias')->insert([
            'nombre' => 'Wasumara',
            'ciudad' => 'San luis potosi',
            'sitio_web' => 'www.wasumara.com',
            'contacto' => '444 173 4281',
            'imagen' => 'wasumara.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Wendlandt',
            'ciudad' => 'Baja California',
            'sitio_web' => 'https://wendlandt.com.mx/',
            'contacto' => '(646) 178 2938',
            'imagen' => 'wendlandt.png',
        ]);

        // Cervecerias con la letra Z

        DB::table('cervecerias')->insert([
            'nombre' => 'Zamora',
            'ciudad' => 'Michoacán',
            'sitio_web' => 'https://www.facebook.com/CervezaArtesanalZamora/',
            'contacto' => '3511451573',
            'imagen' => 'zamora.jpg',
        ]);

        DB::table('cervecerias')->insert([
            'nombre' => 'Zuzu',
            'ciudad' => 'Desconocido',
            'sitio_web' => 'www.zuzu.beer',
            'contacto' => '',
            'imagen' => 'zuzu.jpg',
        ]);
    }
}
