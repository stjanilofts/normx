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

        /* Stillingar */
        $url = 'http://normx.is';

        function get_http_response_code($url) {
            $headers = get_headers($url);
            return substr($headers[0], 9, 3);
        }

        // Notendur
        \App\User::create([
            'name' => 'Netvistun',
            'email' => 'vinna@netvistun.is',
            'password' => bcrypt(env('NETVISTUN')),
            'remember_token' => str_random(10),
        ]);

        $um_okkur = factory(\App\Page::class)->create([
            'title' => 'Um okkur',
            'slug' => 'um-okkur',
        ]);

        factory(\App\Page::class)->create([
            'title' => 'Test',
            'slug' => 'test',
            'parent_id' => $um_okkur->id,
        ]);



        $forsidumyndir = factory(App\Page::class)->create([
                    'title' => 'Forsíðumyndir',
                    'status' => 0,
                    'slug' => '_forsidumyndir',
                    'content' => '',
                ]);

            factory(App\Page::class)->create([
                'title' => 'Mynd 1',
                'status' => 1,
                'slug' => '_mynd1',
                'parent_id' => $forsidumyndir->id,
                'content' => '<p>Hér er texti á mynd 1. Hér er pínu meiri texti strax á eftir.</p>',
                'images' => [
                    [
                        'name' => '1.jpg',
                    ],
                ],
            ]);

            factory(App\Page::class)->create([
                'title' => 'Mynd 2',
                'status' => 1,
                'slug' => '_mynd2',
                'parent_id' => $forsidumyndir->id,
                'content' => '<p>Hér er texti á mynd 2</p>',
                'images' => [
                    [
                        'name' => '2.jpg',
                    ],
                ],
            ]);

            factory(App\Page::class)->create([
                'title' => 'Mynd 3',
                'status' => 1,
                'slug' => '_mynd3',
                'parent_id' => $forsidumyndir->id,
                'content' => '<p>Hér er texti á mynd 3</p>',
                'images' => [
                    [
                        'name' => '3.jpg',
                    ],
                ],
            ]);


        factory(\App\Page::class)->create([
            'title' => 'Heitir pottar',
            'slug' => 'heitir-pottar',
            'images' => [
                [
                    'name' => 'heitir-pottar.png',
                ]
            ],
            'content' => '<p>NormX heitir pottar hafa verið framleiddir fyrir íslenskan markað í yfir 30 ár.</p>

<p>Heitur pottur frá NormX er besti kosturinn þegar verð og gæði eru annars vegar. Pottarnir eru sérlega sterkir, veðrunarþolnir og auðveldir í þrifum. Þeir eru framleiddir úr gegnheilu Polyethylene plasti með UV vörn og verjast því sólarljósi vel. Allir heitir pottar frá NormX eru endurvinnanlegir. Í valmyndinni til vinstri er að finna þær gerðir af pottum sem boðið er uppá. Allar gerðir af pottum er hægt að fá í mismunandi litum.</p>

{image|align:right|size:m}

<p>Á Íslandi er oftast nær auðvelt að nálgast heitt vatn á afar lágu verði. Heitir pottar frá NormX eru því tiltölulega vatnsmiklir og djúpir. Til dæmis eru 66 cm frá sæti uppá brún á Snorralauginni sem þýðir að það flæðir vel yfir axlir á velflestum. Það er því hægt að láta sér líða vel í pottinum hvort sem er sól og sumar eða vetrarkuldi.</p>

<p>NormX heitir pottar eru á betra verði en keppinautar okkar bjóða og afgreiðslufrestur er skammur. Algengustu gerðirnar eru alltaf til á lager og aðrar er hægt að framleiða með skömmum fyrirvara.</p>

<p>Við seljum einnig allar lagnir, nuddkerfi, og ljósabúnað eftir óskum viðskiptavina. Starfsmenn okkar sjá um ísetningu og tengingar. Við leggjum metnað okkar í að allir fylgihlutir séu á hagstæðu verði.</p>',
        ]);

        factory(\App\Page::class)->create([
            'title' => 'Hafa samband',
            'slug' => 'hafa-samband',
        ]);






        factory(\App\Product::class)->create([
            'title' => 'Snorralaug',
            'slug' => 'snorralaug',
            'content' => '<p>2000 Litrar.<br>
Setlaug fyrir allt að 8-10 manns.<br>
Íslensk framleiðsla.<br>
Framleiddur úr Polyethylene.<br>
Fáanlegur í nokkrum litum.<br>
Efnisþykkt er ca 7-10mm.<br>
Þyngd er ca 85 kg.</p>',
            'price' => 216000,
            'images' => [
                [
                    'name' => 'snorralaug.jpg',
                ]
            ],
        ]);

        factory(\App\Product::class)->create([
            'title' => 'Grettislaug',
            'slug' => 'grettislaug',
            'content' => '<p>1500 Lítrar.<br>
Setlaug fyrir allt að 5-7 manns.<br>
Íslensk framleiðsla.<br>
Framleiddur úr Polyethylene.<br>
Fáanlegur í nokkrum litum.<br>
Efnisþykkt er ca 7-10mm.<br>
Þyngd er ca 65 kg.</p>',
            'price' => 176000,
            'images' => [
                [
                    'name' => 'grettislaug.jpg',
                ]
            ],
        ]);

        factory(\App\Product::class)->create([
            'title' => 'Geirslaug',
            'slug' => 'geirslaug',
            'content' => '<p>1800 Lítrar.<br>
Setlaug fyrir allt að 7-9 manns.<br>
Íslensk framleiðsla.<br>
Framleiddur úr Polyethylene.<br>
Fáanlegur í nokkrum litum.<br>
Efnisþykkt er ca 7-10mm.<br>
Þyngd er ca 80 kg.</p>',
            'price' => 196000,
            'images' => [
                [
                    'name' => 'geirslaug.jpg',
                ]
            ],
        ]);

        factory(\App\Product::class)->create([
            'title' => 'Unnarlaug',
            'slug' => 'unnarlaug',
            'content' => '<p>2050 Litrar.<br>
Setlaug fyrir allt að 6 manns.<br>
Íslensk framleiðsla.<br>
Framleiddur úr Polyethylene.<br>
Fáanlegur í nokkrum litum.<br>
Efnisþykkt er ca 7-10mm.<br>
Þyngd er ca 85 kg.</p>',
            'price' => 206000,
            'images' => [
                [
                    'name' => 'unnarlaug.jpg',
                ]
            ],
        ]);

        factory(\App\Product::class)->create([
            'title' => 'Gvendarlaug',
            'slug' => 'gvendarlaug',
            'content' => '<p>1200 Litrar.<br>
Setlaug fyrir allt að 3-5 manns.<br>
Íslensk framleiðsla.<br>
Framleiddur úr Polyethylene.<br>
Fáanlegur í nokkrum litum.<br>
Efnisþykkt er ca 7-10mm.<br>
Þyngd á setlaug er ca 45 kg.<br>
Þyngd á loki er ca 15 kg.</p>',
            'price' => 206000,
            'images' => [
                [
                    'name' => 'gvendarlaug.jpg',
                ]
            ],
        ]);
        Model::reguard();
    }
}