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

        factory(\App\Page::class)->create();
        factory(\App\Page::class)->create();
        factory(\App\Page::class)->create();
        factory(\App\Page::class)->create();

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

        Model::reguard();
    }
}