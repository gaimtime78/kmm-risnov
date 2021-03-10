<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Route;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name'=>'superadmin'],
            ['name'=>'admin'],
            ['name'=>'user'],
        ]);
        DB::table('users')->insert([
            [
            'name' => 'superadmin',
            'email' => 'superadmin@uns.com',
            'password' => '$2y$12$UkLI1gWfpQaBQ9WLnfO/YuHP.odeA41sd/CGqENSEofuysZ8XhH0K',
            'role_id' => 1,
            'email_verified_at' => '2020-08-07 14:50:24',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@uns.com',
                'password' => '$2y$12$6ios7VDkZmT3NIs1pt9pSeYdM47hQnxflemAO1Ojvbotm11Px.JCK',
                'role_id' => 2,
                'email_verified_at' => '2020-08-07 14:50:24',
            ]
        ]);

        DB::table('category')->insert([
            [
                'category'=>'Berita Terkini',
                'created_at' => '2020-08-07 14:50:24',
                'updated_at' => '2020-08-07 14:50:24',
            ],
            [
                'category'=>'Produk Komersil',
                'created_at' => '2020-08-07 14:50:24',
                'updated_at' => '2020-08-07 14:50:24',
            ],
            // ['category'=>'user'],
        ]);

        for ($i=0; $i < 20; $i++) { 
            DB::table('post')->insert([
                [
                    'title' => "Ciptakan Inovasi Bersama, UNS Tanda Tangani MoU dengan PT. Hakaaston",
                    'content' => "<p>Kerja sama tersebut bertujuan untuk mengaplikasikan dan meningkatkan pelaksanaan Tri Dharma Perguruan Tinggi Negeri khususnya di bidang pendidikan, penelitian, pengabdian kepada masyarakat, dan pengembangan kampus merdeka di bidang material aspal dan beton untuk pembangunan infrastruktur.</p> <p>PT. Hakaaston merupakan anak PT. Hutama Karya yang saat ini mendominasi supporting kegiatan pelaksanaan jalan Trans Sumatra.</p> <p>Sebagai Direktur Operasi III PT Hutama Karya (Persero), Koentjoro berharap kerja sama antara UNS dengan PT. Hakaaston dapat menciptakan produk inovatif demi kemajuan insfrastruktur Indonesia. Harapan yang sama juga diungkap oleh Didin Solakhuddin selaku Direktur Utama PT. Hakaaston.</p> <p>&ldquo;Kerja sama ini diharapkan dapat memberikan kolaborasi dalam menciptakan kemajuan semua pihak,&rdquo; ujarnya.</p> <p>Wakil Rektor Bidang Perencanaan, Kerjasama, Bisnis dan Informasi UNS, Prof. Sajidan menyampaikan keinginannya melalui pidato sambutannya.</p> <p>&ldquo;Harapannya kerja sama antara Fakultas Teknik UNS dengan PT. Hakaaston dapat terimplementasi dengan baik.&rdquo; ujar Prof. Sajidan.</p> <p>Danang Parikesit selaku Kepala Badan Pengatur Jalan Tol (BPJT) menyambut baik kerja sama antara UNS dengan PT. Hakaaston.</p> <p>Penandatanganan MoU tersebut juga dapat menjadi media pertukaran informasi serta peningkatan kemampuan teknis melalui pertukaran pengalaman berdasarkan asas kemanfaatan bersama.&nbsp;<strong>Humas UNS</strong></p>",
                    'overview' => "UNS — Universitas Sebelas Maret (UNS) Surakarta menandatangani nota kesepahaman dengan PT. Hakaaston. Penandatangan MoU dilakukan secara daring melalui Zoom Could Meeting pada Jumat (5/3/2021). Acara tersebut dihadiri oleh 47 peserta yang terdiri dari perwakilan pihak UNS dan PT. Hakaaston serta perwakilan jajaran Badan Pengatur Jalan Tol (BPJT).",
                    'show_thumbnail' => 1,
                    'thumbnail'=> "1615180647_tanda-tangani-mou-hakaaston-uns-980x452.jpg",
                    'active'=> 1,
                    'user_id' => 2,
                    'published_at' => '2020-08-07 14:50:24',
                    'created_at' => '2020-08-07 14:50:24',
                    'updated_at' => '2020-08-07 14:50:24',
                ],
            ]);
    
            DB::table('category_post')->insert([
                [
                    'category_id' => 1,
                    'post_id' => $i,
                    'created_at' => '2020-08-07 14:50:24',
                    'updated_at' => '2020-08-07 14:50:24',
                ],
                [
                    'category_id' => 2,
                    'post_id' => $i,
                    'created_at' => '2020-08-07 14:50:24',
                    'updated_at' => '2020-08-07 14:50:24',
                ],
            ]);
        }
        



        // DB::table('pages')->insert([
        //     [
        //       'title' => 'Produk Komersil',
        //       'content'=> '<p>...</p>',
        //       'slug' => 'Produk-Komersil',
        //       'category_id' => 1,
        //       'use_post'=> 1, 
        //       'created_at' => '2020-08-07 14:50:24',
        //       'updated_at' => '2020-08-07 14:50:24',
        //     ]
        // ]);

        // DB::table('menu')->insert([
        //     [
        //       'menu' => 'Produk',
        //       'sub_menu'=> 'Produk Komersil',
        //       'page_id' => 1,
        //       'created_at' => '2020-08-07 14:50:24',
        //       'updated_at' => '2020-08-07 14:50:24',
        //     ]
        // ]);

        $routeCollection = Route::getRoutes();
        foreach ($routeCollection as $value) {
            if($value->getName() != null){
                DB::table('permissions')->insert([
                    ['permission'=>$value->getName()]
                ]);
            }
        }
        $permission =  DB::table('permissions')->get();
        foreach ( $permission as $value) {
            DB::table('permission_role')->insert([
                ['role_id'=>2,'permission_id'=>$value->id],
            ]);
        }
       
    }
}
