<?php

namespace Database\Seeders;

use App\Helpers\SlugFormatter;
use App\Models\User;
use App\Models\Admin;
use App\Models\CategoryHoax;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Create Super Admin
        // Admin::create([
        //     'username' => 'superadmin',
        //     'password' => Hash::make('superadmin')
        // ]);

        User::created([
            'full_name' => 'Dhanny Adhi Pramana',
            'no_telepon_wa' => '83170550450',
            'tgl_lahir' => '2022-04-02',
            'gender' => 'pria',
            'username' => 'daniap',
            'email' => 'akunduit1212@gmail.com',
            'password' => Hash::make('daniap')
        ]);

        DB::table('users')->insert([
            // 'id' => 8,
            'username' => 'muhammad.popo',
            'full_name' => 'Aljariyah Popo',
            'email' => 'popo.ganteng@gmail.com',
            'no_telepon_wa' => '83170550451',
            'tgl_lahir' => '2022-04-02',
            'gender' => 'pria',
            'email_verified_at' => '2022-05-13 01:19:44',
            'password' => Hash::make('popo'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create 7 Category Hoax

        // CategoryHoax::create([
        //     'level' => 1,
        //     'category' => 'Satire atau Parody',
        //     'description' => 'Tidak ada niat untuk merugikan namun berpotensi untuk mengelabui',
        //     'slug' => SlugFormatter::generateSlug('satire parody')
        // ]);

        // CategoryHoax::create([
        //     'level' => 2,
        //     'category' => 'False Connection',
        //     'description' => 'Ketika judul, gambar, atau keterangan, tidak mendukung konten',
        //     'slug' => SlugFormatter::generateSlug('false connection')
        // ]);

        // CategoryHoax::create([
        //     'level' => 3,
        //     'category' => 'Misleading Content',
        //     'description' => 'Penggunaan informasi yang untuk membingkai sebuah isu atau individu',
        //     'slug' => SlugFormatter::generateSlug('misleading content')
        // ]);

        // CategoryHoax::create([
        //     'level' => 4,
        //     'category' => 'False Context',
        //     'description' => 'Ketika konten yang asli dipadankan dengan konteks informasi yang salah',
        //     'slug' => SlugFormatter::generateSlug('false context')
        // ]);

        // CategoryHoax::create([
        //     'level' => 5,
        //     'category' => 'Imposter Content',
        //     'description' => 'Ketika sebuah sumber asli ditiru',
        //     'slug' => SlugFormatter::generateSlug('imposter content')
        // ]);

        // CategoryHoax::create([
        //     'level' => 6,
        //     'category' => 'Manipulated Content',
        //     'description' => 'Ketika sebuah informasi di manipulasi untuk merusak atau menipu',
        //     'slug' => SlugFormatter::generateSlug('manipulated content')
        // ]);

        // CategoryHoax::create([
        //     'level' => 7,
        //     'category' => 'Fabricated Content',
        //     'description' => 'Konten baru yang disengaja di buat dan di desain untuk menipu dan merugikan',
        //     'slug' => SlugFormatter::generateSlug('fabricated content')
        // ]);
    }
}
