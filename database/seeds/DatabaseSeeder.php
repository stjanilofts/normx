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
            'content' => '{image|align:right|size:m}<p>NormX er yfir 30 ára gamalt íslenskt framleiðslufyrirtæki sem framleiðir heita potta úr hverfisteyptu plasti í lítilli plastverksmiðju sem staðsett er í Vogum á Vatnsleysuströnd. Við erum með verslun og sýningarsal að Auðbrekku 6 í Kópavogi og þar er hægt að skoða þær vörur sem NormX framleiðir og selur. Ásamt því að selja heita potta leggjum við áherslu á að vera með allar vörur sem þeim tengjast svo sem nuddbúnað, hitastýringar, lok og ýmsa fylgihluti.</p>
<p>Norm-X er með sýningarsal að Auðbrekku 6 í Kópavogi.</p>

<h3>Opnunartímar</h3>
<ul>
<li>Mánudaga til fimmtudaga, opið 10:00 - 18:00</li>
<li>Föstudaga, opið 10:00 - 17:00</li>
<li>Lokað um helgar</li>
</ul>

<h3>Staðsetning</h3>
<iframe width="100%" height="400" frameborder="0" src="http://ja.is/kort/embedded/?zoom=8&x=358670&y=404393&layer=map&q=Norm-X%2C+Au%C3%B0brekku+6"></iframe>',
            'images' => [
                [
                    'name' => 'um-okkur.png',
                ],
            ],
        ]);

        factory(\App\Page::class)->create([
            'title' => 'Test',
            'slug' => 'test',
            'parent_id' => $um_okkur->id,
        ]);













































        $lok = factory(\App\Category::class)->create([
            'title' => 'Lok á heita potta',
            'slug' => 'lok-a-heita-potta',
        ]);
            factory(\App\Product::class)->create([
                'title' => 'Állok',
                'price' => 104000,
                'slug' => 'allok',
                'content' => '<p>Állok á flestar gerðir setlauga frá NORM-X. Lokin eru gerð úr álvinklum, rafsoðnum saman á samskeytum. 2 stk 10mm PVC plötur, gráar á lit. 3 stk ryðfríar lamir eru á samsteytum. Álfestingar fylgja sem ætlaðar eru til að festast við hlið pottsins (skrúfast fastar í timburklæðningu) þannig að hægt er að velta lokinu upp að vegg. 4 stk handföng eru á lokunum. Lokin eru tvískipt og eru ætluð fyrir að opnast upp að vegg. Gott er að setlaug er ca 30 cm frá vegg til að lok hafi svigrúm til að fara aðeins yfir á ballans eftir opnun. Festingar til að læsa loki í opnun eða lokun fylgja ekki með. Þyngd er frá 26 kg til 31 kg, fer eftir stærð og tegund setlaugar. Lokin eru sterk byggð og endast vel. Íslensk framleiðsla , framleitt af NORM-X.</p>',
                'category_id' => $lok->id,
            ]);
            factory(\App\Product::class)->create([
                'title' => 'Einangrað lok',
                'price' => 104000,
                'slug' => 'einangrad-lok',
                'content' => '<p>Einangrað lok á allar gerðir setlauga frá NORM-X. Til í brúnum eða gráum lit. Lokin eru tvískipt og fest niður með 4 stk plastböndum. Lokin einangra vel, eru slitsterk, auðveld í meðförum og falleg. Þyngd er ca 17-19 kg eftir stærð og tegund setlaugar. Íslensk framleiðsla, framleiit af Kiano. Sjá heimasíðu þeirra: www.kiano.is</p>',
                'category_id' => $lok->id,
            ]);
            factory(\App\Product::class)->create([
                'title' => 'Sérsmíðuð állok',
                'price' => 104000,
                'slug' => 'sersmidud-allok',
                'content' => '<p>NORM-X tekur að sér að sérsmíða állok á flestar gerðir setlauga. Lokin eru gerð úr álvinklum, rafsoðin saman á samskeytum. 2 stk 10mm PVC plötur, gráar eða hvítar á lit. 3 stk ryðfríar lamir eru á samsteytum. Allar skrúfur eru ryðfríar. Álfestingar fylgja sem ætlaðar eru til að festast við hlið pottsins (skrúfast fastar í timburklæðningu) þannig að hægt er að velta lokinu upp að vegg. 4 stk handföng eru á lokunum. Lokin eru tvískipt og eru ætluð fyrir að opnast upp að vegg. Gott er að setlaug er ca 30 cm frá vegg til að lok hafi svigrúm til að fara aðeins yfir á ballans eftir opnun. Festingar til að læsa loki í opnun eða lokun fylgja ekki með. Þyngd er frá ca 20 kg til 40 kg, fer eftir stærð og tegund setlaugar. Lokin eru sterk byggð og endast vel. Íslensk framleiðsla , framleitt af NORM-X.</p>
                <p>Lokin eru smíðuð í samvinnu við kaupanda. Kaupandi kemur til okkar með teikningu af pottinum þar sem kemur fram lengd og breidd á pottinum. Einnig þarf að koma fram hvernig kantbrúnir eru í laginu. Koma þarf skýrt fram lögun pottsins, er hann ferkantaður, átthyrntur eða eitthvað annað. Eins þarf kaupandi að ákveða hvernig lokið á að snúa eða opnast gagnvart pottinum. Kaupandi ákveður hversu mörg handföng eiga að vera á lokinu, oftast eru það 4 stk. NORM-X byrjar ekki að smíða lokið fyrr en öll mál eru klár af hendi kaupanda.</p>',
                'category_id' => $lok->id,
            ]);

        /*function makeProduct($product = [], $parent = false) {
            if($product['title'] && !$product['slug']) {
                $product['slug'] = str_slug($product['title']);
            }

            if($parent && isset($parent->id)) {
                $product['category_id'] = $parent->id;
            }

            factory(\App\Product::class)->create($product);
        }

        $lok = factory(\App\Category::class)->create([
            'title' => 'Hitastýringar',
            'slug' => 'hitastyringar',
        ]);
            makeProduct([
                'title' => 'Hitastýring með heitri og kaldri blæðingu',
                'price' => 76000,
                'content' => "Hitastýring með heitri og kaldri blæðingu.

Helstu eiginleikar eru:
1. Hitastýring með blöndunarloka sem blandar saman heitt og kalt vatn til notkunar í setlaug.

2. Hitamælir sem sýnir hitastig vatns sem rennur til setlaugar.

3. 2 stk segullokar til að opna fyrir auka rennsli á heitu eða köldu vatni til setlaugarinnar.

4. 2 stk stillité til að ákveða það magn af heitu eða köldu vatni sem getur runnið aukalega til setlaugarinnar.

5. Allur fittings úr kopar.

6. Uppsetning er auðveld

Notkunarmöguleikar.
Hitastýringin er hönnuð fyrir íslenskar aðstæður þar sem notast er við hitaveituvatn til að fylla setlaug. Hitastýringin er auðveld í uppsetningu og einföld í notkun. Þessi hitastýring er ætluð fyrir þá sem vilja handstýra hitastigi og rennsli á vatni í heita potta. Blöndun á heitu og köldu vatni er handstillt með blöndunarlokanum. Auk þess eru 2 segullokar sem hægt er að opna og fá þannig auka heitt eða kalt vatn, allt eftir því hvort óskað er eftir því að hita eða kæla vatnið sem þá þegar er að renna eða er komið í setlaugina.",
            ], $lok);
            makeProduct([
                'title' => 'Hitastýring með yfirhitavara',
                'price' => 118000,
                'content' => "
                Hitastýring með yfirhitavara.

Helstu eiginleikar eru:
1. Digital stjórnstöð með 2 upplýsingagluggum sem sýna annars vegar raunhita frá hitanema staðsettum í setlaug og svo hinsvegar óskað gildi.

2. Stýringin lokar fyrir innrennsli í setlaug þegar óskuðu hitastigi er náð.

3. Yfirhitavari sem lokar fyrir rennsli ef hiti á innrennsli verður of hár.

4. Allur fittings úr kopar.

5. Uppsetning er auðveld.

Notkunarmöguleikar
Hitastýringin er hönnuð fyrir íslenskar aðstæður þar sem notast er við hitaveituvatn til að fylla setlaug. Hitastýringin er auðveld í uppsetningu og einföld í notkun. Þessi hitastýring er ætluð fyrir þá sem vilja hafa vatn í setlauginni allan sólarhringinn , alla daga vikunar. Stjórnstöð sér þá um að halda því hitastigi sem óskað er eftir á vatninu í setlauginni og bæta við vatni eftir þörfum. Setlaugin er því tilbúin til notkunar hvenær sem er með kjör hitastigi á vatninu að ósk notenda.

Handbók fyrir hitastýringu (PDF)
Handbók fyrir Digital stjórnstöð(PDF)",
            ], $lok);
            makeProduct([
                'title' => 'Hitastýring með blöndunarlokum',
                'price' => 104000,
                'content' => "
Hitastýring með 2 blöndunarlokum.

Helstu eiginleikar eru:
1. Digital stjórnstöð með 2 upplýsingagluggum sem sýna annars vegar raunhita frá hitanema
staðsettum í setlaug og svo hinsvegar óskað gildi.

2. Stýringin lokar fyrir innrennsli í setlaug þegar óskuðu hitastigi er náð.

3. Yfirhitavari sem lokar fyrir rennsli ef hiti á innrennsli verður of hár.

4. Auka blöndunarloki og segulloki fyrir heitara vatn.

5. Allur fittings úr kopar.

6. Uppsetning er auðveld.

Notkunarmöguleikar.
Hitastýringin er hönnuð fyrir íslenskar aðstæður þar sem notast er við hitaveituvatn til að fylla setlaug. Hitastýringin er auðveld í uppsetningu og einföld í notkun. Þessi hitastýring er ætluð fyrir þá sem vilja hafa vatn í setlauginni allan sólarhringinn , alla daga vikunnar. Stjórnstöð sér þá um að halda því hitastigi sem óskað er eftir á vatninu í setlauginni og bæta við vatni eftir þörfum. Setlaugin er því tilbúin til notkunar hvenær sem er með kjörhitastigi á vatninu að ósk notenda. Auk þess er annar blöndunarloki og segulloki sem ætlaðir eru fyrir heitara vatn að ósk notanda. Reiknað er með að segullokinn verði opnaður/lokaður handvirkt frá setlaug.

Handbók fyrir hitastýringu (PDF)
Handbók fyrir digital stjórnstöð (PDF)",
            ], $lok);
            makeProduct([
                'title' => 'Hús fyrir hitanema',
                'price' => 104000,
                'content' => "
Hitastýring með 2 blöndunarlokum.

Helstu eiginleikar eru:
1. Digital stjórnstöð með 2 upplýsingagluggum sem sýna annars vegar raunhita frá hitanema
staðsettum í setlaug og svo hinsvegar óskað gildi.

2. Stýringin lokar fyrir innrennsli í setlaug þegar óskuðu hitastigi er náð.

3. Yfirhitavari sem lokar fyrir rennsli ef hiti á innrennsli verður of hár.

4. Auka blöndunarloki og segulloki fyrir heitara vatn.

5. Allur fittings úr kopar.

6. Uppsetning er auðveld.

Notkunarmöguleikar.
Hitastýringin er hönnuð fyrir íslenskar aðstæður þar sem notast er við hitaveituvatn til að fylla setlaug. Hitastýringin er auðveld í uppsetningu og einföld í notkun. Þessi hitastýring er ætluð fyrir þá sem vilja hafa vatn í setlauginni allan sólarhringinn , alla daga vikunnar. Stjórnstöð sér þá um að halda því hitastigi sem óskað er eftir á vatninu í setlauginni og bæta við vatni eftir þörfum. Setlaugin er því tilbúin til notkunar hvenær sem er með kjörhitastigi á vatninu að ósk notenda. Auk þess er annar blöndunarloki og segulloki sem ætlaðir eru fyrir heitara vatn að ósk notanda. Reiknað er með að segullokinn verði opnaður/lokaður handvirkt frá setlaug.

Handbók fyrir hitastýringu (PDF)
Handbók fyrir digital stjórnstöð (PDF)",
            ], $lok);*/




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



            $silo = factory(\App\Category::class)->create([
                'title' => 'Fóðursíló',
                'slug' => 'fodursilo'
            ]);


            factory(\App\Product::class)->create([
                'title' => 'Stórt síló',
                'slug' => 'stort-silo',
                'category_id' => $silo->id,
                'price' => 0,
                'content' => '<p>Stórt fóður síló með eða án fætur.<br>
Litir í boði: svart eða hvítt Polyethylene efni.<br>
Stærð: Hæð: 2500mm. Þvermál: 980mm að neðan og 1020mm að ofan.<br>
Sílóið er aðeins kónist, ekki sama þvermál að ofan og neðan. Neðsti parturinn myndar trekt.<br>
Rúmmál í litrum er ca 1775 L.<br>
Efnisþykkt er ca 10mm.</p>

<p>Sílóið afhendist með 110mm gati að neðan sem passar fyrir niðurfallsrör. Mögulegt er að fá afhent með minna gati. NORM-X getur smíðað fætur undir sílóið ef óskað er eftir því. Gerum föst tilboð í smíði á álfætur.</p>

<p>Hafið samband við sölumann til að fá nánari upplýsingar.</p>

<p><a href="/images/sent/54f59362eac30.pdf">Hér má skoða PDF skjal af sílóinnu með álfætur.</a></p>',
                'images' => [
                    [
                        'name' => 'stort-silo.jpg',
                    ],
                ],
            ]);







            $kaminur = factory(\App\Category::class)->create([
                'title' => 'Kamínur',
                'slug' => 'kaminur'
            ]);





            factory(\App\Product::class)->create([
                'title' => 'Díana',
                'slug' => 'diana',
                'category_id' => $kaminur->id,
                'content' => '<p>Stærð: 390 x 435 x 785 mm.  B x L x H<br>
Orka : 10 KW.<br>
Þyngd: 56 kg.<br>
Litur: fáanleg í nokkrum litum.<br>
Verð: 79.000 kr.</p>
<p>Hér getur þú séð nánari upplýsingar um kamínuna. <a href="/files/51cc0633486e3.pdf">PDF</a></p>',
                'images' => [
                    [
                        'name' => 'diana.jpg',
                    ],
                ],
            ]);


            factory(\App\Product::class)->create([
                'title' => 'Magic Stove',
                'slug' => 'magic-stove',
                'category_id' => $kaminur->id,
                'content' => '<p>Stærð: 490 x 510 x 835 mm.  B x L x H<br>
Orka : 10 KW.<br>
Þyngd: 65 kg.<br>
Litur: fáanleg í nokkrum litum.<br>
Verð: Uppselt</p>
<p>Hér getur þú séð nánari upplýsingar um kamínuna. <a href="/files/51cc07d41520b.pdf">PDF</a></p>',
                'images' => [
                    [
                        'name' => 'magic-stove.jpg',
                    ],
                ],
            ]);

            factory(\App\Product::class)->create([
                'title' => 'Lederata',
                'slug' => 'lederata',
                'category_id' => $kaminur->id,
                'content' => '<p>Stærð: 490 x 560 x 950 mm.  B x L x H<br>
Orka : 9 KW.<br>
Þyngd: 108 kg.<br>
Litur: fáanleg í nokkrum litum.<br>
Verð: Uppselt.</p>
<p>Hér getur þú séð nánari upplýsingar um kamínuna. <a href="/files/51cc087bb19d8.pdf">PDF</a></p>',
                'images' => [
                    [
                        'name' => 'lederata.jpg',
                    ],
                ],
            ]);

            factory(App\Page::class)->create([
                'title' => 'Kamínur',
                'status' => 1,
                'slug' => 'kaminur',
                'content' => '{image|align:right|size:m}<p>Vantar þig kamínu til að hita upp sumarbústaðinn eða bara til að skapa notalegt umhverfi. Kamínur frá Tim Sistem í Serbíu eru fallegar, umhverfisvænar og á afar hagstæðu verði. Þær eru hannaðar til að nýta orkuna sem allra best og uppfylla alla EBS staðla varðandi orkunýtingu og mengun.</p>
<p>Kynntu þér þær kamínur sem við bjóðum uppá.Í valmyndinni til vinstri er að finna þær gerðir af kamínum sem boðið er uppá.</p>
<p>Nánari upplýsingar um <a href="http://www.timsistem.rs/index.html">Tim Sistem</a>.</p>',
                'images' => [
                    [
                        'name' => 'kaminur.png',
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



        $pottar = factory(\App\Category::class)->create([
            'title' => 'Pottar',
            'slug' => 'pottar',
        ]);




        factory(\App\Product::class)->create([
            'title' => 'Snorralaug',
            'slug' => 'snorralaug',
            'category_id' => $pottar->id,
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
            'category_id' => $pottar->id,
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
            'category_id' => $pottar->id,
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
            'category_id' => $pottar->id,
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
            'category_id' => $pottar->id,
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