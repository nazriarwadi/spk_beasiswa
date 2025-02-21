<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Informasi;
use App\Models\Penyakit;
use App\Models\RuleBased;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gigi.com',
            'role' => '1'
        ]);

        $penyakit = [
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'Abrasi Gigi',
                'definisi' => 'Abrasi gigi adalah
                                proses mekanis dimana
                                material gigi hilang.
                                Enamel dan dentin gigi
                                hilang dan terdegradasi
                                dalam kondisi
                                abnormal yang disebut
                                abrasi',
                'solusi_pengobatan' => 'Solusi abrasi gigi: Gunakan sikat gigi
                                        dan pasta gigi berbulu halus dengan
                                        tingkat abrasi yang lebih rendah, Tidak
                                        menyikat gigi segera setelah
                                        mengonsumsi makanan asam karena
                                        cepat merusak gigi, Setelah
                                        mengkonsumsi makanan yang asam,
                                        berkumur dengan air lebih baik
                                        daripada langsung menggosok gigi,
                                        Bila dokter menemukan struktur gigi
                                        yang benar-benar parah karena abrasi
                                        gigi, maka kemungkinan solusi
                                        perawatannya adalah dengan tambalan
                                        gigi.'
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Bruxism',
                'definisi' => 'Bruxism adalah
                                beradunya gigi-gigi di
                                rahang atas dengan gigi
                                di rahang bawah pada
                                waktu tidur sehingga
                                menimbulkan bunyi.',
                'solusi_pengobatan' => 'Solusi bruxism :
                                        1. Memperbaiki kondisi
                                        gigi. Jika pengidap bruxism
                                        mengalami masalah kondisi
                                        gigi yang memicu gejala
                                        lainnya, perbaikan gigi perlu
                                        di lakukan untuk menurunkan
                                        risiko perburukan gejala.
                                        Pengobatan ini tidak dapat
                                        menghentikan bruxism, tetapi
                                        mencegah kerusakan gigi.
                                        2. Penggunaan pelindung gigi
                                        3. Mengelola stres dengan baik'
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Hipoplasia Email',
                'definisi' => 'Hipoplasia email gigi
terjadi ketika email gigi
tidak berkembang
dengan baik, sehingga
menyebabkan email
menjadi terlalu tipis
atau hilang pada
beberapa bagian
gigi. Email gigi adalah
lapisan keras yang
menutupi gigi. Lapisan
ini melindungi bagian
dalam yang sensitif, termasuk dentin dan
pulpa gigi.',
                'solusi_pengobatan' => 'Pengobatan yang dilakukan untuk
mengatasi hipoplasia email dengan
pengolesan fluorida (SnF2 8% - 10%),
supaya terjadi pembentukan mineral
kembali pada email yang berlubang-
lubang (porus), dan juga bersifat anti
bakteri.'
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Maloklusi',
                'definisi' => 'Maloklusi adalah suatu
kondisi saat susunan
tulang rahang dan gigi
tidak sejajar atau rata.
Kondisi ini
menyebabkan gigi
berantakan, entah itu
jadi tumpang tindih,
bengkok, gigi tonggos
(overbite), atau
masalah lainnya.',
                'solusi_pengobatan' => 'Tergantung jenis dan keparahan
maloklusi, ortodontis bisa
menganjurkan berbagai perawatan :
1. Pemasangan kawat gigi
merupakan prosedur paling
populer untuk merapikan gigi
atau menyelaraskan tulang
rahang yang tidak normal.
2. Prosedut cabut gigi juga dapat
dilakukan untuk merapikan
gigi yang berantakan.
3. Operasi guna memperbaiki
bentuk dan ukuran rahang
mungkin diperlukan.'
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Perikoronitis',
                'definisi' => 'Perikoronitis adalah
peradangan jaringan di
sekitar gigi yang
setengah tumbuh,
biasanya gigi bungsu.',
                'solusi_pengobatan' => '1. Pembersihan area yang
terinfeksi
2. Penggunaan obat kumur
antiseptic
3. Pemberian antibiotik jika
terjadi infeksi
4. Pencabutan gigi bungsu jika
perlu'
            ],
            [
                'kode_penyakit' => 'P06',
                'nama_penyakit' => 'Nekrosis Pulpa',
                'definisi' => 'Nekrosis
Pulpa/Gangren adalah
kondisi dimana
jaringan pulpa gigi
mengalami kematian.',
                'solusi_pengobatan' => '1. Perawatan saluran akar,
dokter gigi mengangkat
jaringan mati di seluruh
ruang pulpa dan akar gigi
untuk menghilangkan infeksi.
Larutan irigasi yang lembut
digunakan untuk
membersihkan saluran secara
menyeluruh.
2. Pencabutan gigi, Tergantung
pada tingkat keparahan
nekrosis pulpa, dokter gigi
mungkin akan mencabut
seluruh gigi. Kamu dapat
memilih dari sejumlah opsi
penggantian gigi tergantung
pada anggaran dan preferensi'
            ],
            [
                'kode_penyakit' => 'P07',
                'nama_penyakit' => 'Gigi Ektopik',
                'definisi' => 'Gigi ektopik adalah
kondisi di mana gigi
tumbuh di luar posisi
normalnya dalam
lengkung gigi.',
                'solusi_pengobatan' => '1. Perawatan ortodontik untuk
mengembalikan posisi gigi
2. Pencabutan gigi jika tidak
memungkinkan untuk
dipertahankan'
            ],
            [
                'kode_penyakit' => 'P08',
                'nama_penyakit' => 'Periodontal Abses',
                'definisi' => 'Periodontal abses
adalah infeksi yang terjadi pada jaringan
periodontal, yang dapat
menyebabkan
pembengkakan dan
nyeri hebat.',
                'solusi_pengobatan' => '1. Pembersihan area yang
terinfeksi 2. Drainase abses
3. Penggunaan antibiotic
4. Perawatan periodontal
lanjutan'
            ],
            [
                'kode_penyakit' => 'P09',
                'nama_penyakit' => 'Pulpitis Reversible',
                'definisi' => 'Pulpitis Reversible
adalah kondisi
peradangan pulpa
ringan hingga sedang
yang disebabkan oleh
rangsangan, di mana
pulpa mampu kembali
ke keadaan semula atau
tanpa peradangan
setelah rangsangan
dihilangkan.',
                'solusi_pengobatan' => '1. Pembersihan lubang gigi dan
perawatan gigi di dokter gigi
2. Pengobatan sementara untuk
spulpitis reversibel bisa
dilakukan dengan diberikan
obat obatan seperti obat anti
nyeri'
            ],
            [
                'kode_penyakit' => 'P10',
                'nama_penyakit' => 'Pulpitis Irreveraible',
                'definisi' => 'Pulpitis Ireversibel
adalah kondisi di mana
bagian dalam gigi
sudah rusak parah dan
tidak bisa
disembuhkan, tetapi
giginya masih bisa
dipertahankan di dalam
mulut.',
                'solusi_pengobatan' => '1. Penggunaan obat anti nyeri
2. Terapi saluran akar,
dilakukan untuk memberikan
stimulus atau rangsangan
imunitas terhadap akar
supaya mampu melawan
pergerakan bakteri yang
sudah berhasil melukai
pulpa.
3. Pencabutan gigi juga dapat
menjadi alternatif lain jika
struktur mahkota pada gigi
tersebut sudah tidak
mendukung untuk restorasi.
Namun demikian, sangat
disarankan untuk segera
melakukan pembuatan gigi
tiruan setelah pencabutan,
agar tidak menyebabkan
migrasi gigi sekitarnya.'
            ],
        ];
        collect($penyakit)->each(function ($p) {
            Penyakit::create($p);
        });


        $gejala = [
            [
                'kode_gejala' => 'G01',
                'nama_gejala' => 'Nyeri pada gigi'
            ],
            [
                'kode_gejala' => 'G02',
                'nama_gejala' => 'Sensitivitas terhadap makanan panas/dingin'
            ],
            [
                'kode_gejala' => 'G03',
                'nama_gejala' => 'Kemerahan atau peradangan pada gusi yang sakit'
            ],
            [
                'kode_gejala' => 'G04',
                'nama_gejala' => 'Pembengkakan pada gusi'
            ],
            [
                'kode_gejala' => 'G05',
                'nama_gejala' => 'Bau mulut yang tidak sedap'
            ],
            [
                'kode_gejala' => 'G06',
                'nama_gejala' => 'Gigi terasa goyang'
            ],
            [
                'kode_gejala' => 'G07',
                'nama_gejala' => 'Gigi berjejal(susunan gigi tidak rapi/gigi berantakan)'
            ],
            [
                'kode_gejala' => 'G08',
                'nama_gejala' => 'Bibir pecah-pecah'
            ],
            [
                'kode_gejala' => 'G09',
                'nama_gejala' => 'Kesulitan saat mengunyah'
            ],
            [
                'kode_gejala' => 'G10',
                'nama_gejala' => 'Pembukaan kunyah gigi tampak terkikis'
            ],
            [
                'kode_gejala' => 'G11',
                'nama_gejala' => 'Sakit pada gigi atau gusi'
            ],
            [
                'kode_gejala' => 'G12',
                'nama_gejala' => 'Gigi renggang'
            ],
            [
                'kode_gejala' => 'G13',
                'nama_gejala' => 'Nyeri saat menggigit'
            ],
            [
                'kode_gejala' => 'G14',
                'nama_gejala' => 'Adanya lubang pada gigi'
            ],
            [
                'kode_gejala' => 'G15',
                'nama_gejala' => 'Sensitivitas gigi terhadap rasa manis'
            ],
            [
                'kode_gejala' => 'G16',
                'nama_gejala' => 'Sensitivitas gigi terhadap rasa asam'
            ],
            [
                'kode_gejala' => 'G17',
                'nama_gejala' => 'Sensitivitas gigi terhadap tekanan'
            ],
            [
                'kode_gejala' => 'G18',
                'nama_gejala' => 'Gigi terasa sakit saat makanan tertentu'
            ],
            [
                'kode_gejala' => 'G19',
                'nama_gejala' => 'Terdapat plak atau karang gigi'
            ],
            [
                'kode_gejala' => 'G20',
                'nama_gejala' => 'Terdapat infeksi di sekitar gigi'
            ],
            [
                'kode_gejala' => 'G21',
                'nama_gejala' => 'Gusi mudah berdarah'
            ],
            [
                'kode_gejala' => 'G22',
                'nama_gejala' => 'Gigi terasa ngilu'
            ],
            [
                'kode_gejala' => 'G23',
                'nama_gejala' => 'Gigi terasa sakit saat tertutup atau terbuka'
            ],
            [
                'kode_gejala' => 'G24',
                'nama_gejala' => 'Sensitivitas gigi terhadap udara dingin'
            ],
            [
                'kode_gejala' => 'G25',
                'nama_gejala' => 'Gigi terasa sakit atau berdenyut'
            ],
            [
                'kode_gejala' => 'G26',
                'nama_gejala' => 'Gusi terasa gatal atau tidak nyaman'
            ],
            [
                'kode_gejala' => 'G27',
                'nama_gejala' => 'Gigi terasa panas atau terbakar'
            ],
            [
                'kode_gejala' => 'G28',
                'nama_gejala' => 'Timbulnya bau mulut yang tidak biasa'
            ],
            [
                'kode_gejala' => 'G29',
                'nama_gejala' => 'Gigi tampak lebih kecil dari biasanya'
            ],
            [
                'kode_gejala' => 'G30',
                'nama_gejala' => 'Timbulnya bercak putih atau hitam di gigi'
            ],
            [
                'kode_gejala' => 'G31',
                'nama_gejala' => 'Gigi atau gusi bernanah'
            ],
            [
                'kode_gejala' => 'G32',
                'nama_gejala' => 'Gusi terasa lunak atau lembut'
            ],
            [
                'kode_gejala' => 'G33',
                'nama_gejala' => 'Gigi atau gusi mengalami perubahan warna'
            ],
            [
                'kode_gejala' => 'G34',
                'nama_gejala' => 'Adanya rasa tidak nyaman di rahang'
            ],
            [
                'kode_gejala' => 'G35',
                'nama_gejala' => 'Gigi atau gusi mengalami sensasi terbakar'
            ],
        ];
        collect($gejala)->each(function ($g) {
            Gejala::create($g);
        });

        $rulebased = [
            [
                'kode_penyakit' => 'P01',
                'kode_gejala' => 'G01',
            ],
            [
                'kode_penyakit' => 'P01',
                'kode_gejala' => 'G02',
            ],
            [
                'kode_penyakit' => 'P01',
                'kode_gejala' => 'G10',
            ],
            [
                'kode_penyakit' => 'P01',
                'kode_gejala' => 'G15',
            ],
            [
                'kode_penyakit' => 'P01',
                'kode_gejala' => 'G16',
            ],
            [
                'kode_penyakit' => 'P01',
                'kode_gejala' => 'G17',
            ],
            [
                'kode_penyakit' => 'P02',
                'kode_gejala' => 'G01',
            ],
            [
                'kode_penyakit' => 'P02',
                'kode_gejala' => 'G06',
            ],
            [
                'kode_penyakit' => 'P02',
                'kode_gejala' => 'G10',
            ],
            [
                'kode_penyakit' => 'P02',
                'kode_gejala' => 'G13',
            ],
            [
                'kode_penyakit' => 'P02',
                'kode_gejala' => 'G25',
            ],
            [
                'kode_penyakit' => 'P02',
                'kode_gejala' => 'G34',
            ],
            [
                'kode_penyakit' => 'P03',
                'kode_gejala' => 'G02',
            ],
            [
                'kode_penyakit' => 'P03',
                'kode_gejala' => 'G10',
            ],
            [
                'kode_penyakit' => 'P03',
                'kode_gejala' => 'G30',
            ],
            [
                'kode_penyakit' => 'P04',
                'kode_gejala' => 'G07',
            ],
            [
                'kode_penyakit' => 'P04',
                'kode_gejala' => 'G09',
            ],
            [
                'kode_penyakit' => 'P04',
                'kode_gejala' => 'G12',
            ],
            [
                'kode_penyakit' => 'P04',
                'kode_gejala' => 'G34',
            ],
            [
                'kode_penyakit' => 'P05',
                'kode_gejala' => 'G01',
            ],
            [
                'kode_penyakit' => 'P05',
                'kode_gejala' => 'G04',
            ],
            [
                'kode_penyakit' => 'P05',
                'kode_gejala' => 'G05',
            ],
            [
                'kode_penyakit' => 'P05',
                'kode_gejala' => 'G26',
            ],
            [
                'kode_penyakit' => 'P05',
                'kode_gejala' => 'G32',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G01',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G02',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G06',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G20',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G25',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G28',
            ],
            [
                'kode_penyakit' => 'P06',
                'kode_gejala' => 'G31',
            ],
            [
                'kode_penyakit' => 'P07',
                'kode_gejala' => 'G07',
            ],
            [
                'kode_penyakit' => 'P07',
                'kode_gejala' => 'G09',
            ],
            [
                'kode_penyakit' => 'P07',
                'kode_gejala' => 'G29',
            ],
            [
                'kode_penyakit' => 'P08',
                'kode_gejala' => 'G04',
            ],
            [
                'kode_penyakit' => 'P08',
                'kode_gejala' => 'G05',
            ],
            [
                'kode_penyakit' => 'P08',
                'kode_gejala' => 'G20',
            ],
            [
                'kode_penyakit' => 'P08',
                'kode_gejala' => 'G26',
            ],
            [
                'kode_penyakit' => 'P08',
                'kode_gejala' => 'G31',
            ],
            [
                'kode_penyakit' => 'P08',
                'kode_gejala' => 'G32',
            ],
            [
                'kode_penyakit' => 'P09',
                'kode_gejala' => 'G01',
            ],
            [
                'kode_penyakit' => 'P09',
                'kode_gejala' => 'G02',
            ],
            [
                'kode_penyakit' => 'P09',
                'kode_gejala' => 'G13',
            ],
            [
                'kode_penyakit' => 'P09',
                'kode_gejala' => 'G15',
            ],
            [
                'kode_penyakit' => 'P09',
                'kode_gejala' => 'G16',
            ],
            [
                'kode_penyakit' => 'P10',
                'kode_gejala' => 'G01',
            ],
            [
                'kode_penyakit' => 'P10',
                'kode_gejala' => 'G02',
            ],
            [
                'kode_penyakit' => 'P10',
                'kode_gejala' => 'G05',
            ],
            [
                'kode_penyakit' => 'P10',
                'kode_gejala' => 'G17',
            ],
            [
                'kode_penyakit' => 'P10',
                'kode_gejala' => 'G18',
            ],
        ];
        collect($rulebased)->each(function ($r) {
            RuleBased::create($r);
        });

        $informasi =[
            [
                'content' => 'Perawatan gigi sangat penting untuk dilakukan secara rutin. Gigi permanen
    dapat bertahan seumur hidup dengan perawatan yang baik.'
            ]
        ];
        collect($informasi)->each(function ($i) {
            Informasi::create($i);
        });

    }
}
