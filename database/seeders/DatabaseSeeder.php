<?php

namespace Database\Seeders;

use App\Helpers\SlugFormatter;
use App\Models\User;
use App\Models\Admin;
use App\Models\CategoryHoax;
use Illuminate\Database\Seeder;
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
        Admin::create([
            'username' => 'superadmin',
            'password' => Hash::make('superadmin')
        ]);

        // Create 7 Category Hoax
        
        CategoryHoax::create([
            'level' => 1,
            'category' => 'Satire atau Parody',
            'description' => 'Tidak ada niat untuk merugikan namun berpotensi untuk mengelabui',
            'slug' => SlugFormatter::generateSlug('satir_parody')
        ]);

        CategoryHoax::create([
            'level' => 2,
            'category' => 'False Connection',
            'description' => 'Ketika judul, gambar, atau keterangan, tidak mendukung konten',
            'slug' => SlugFormatter::generateSlug('false_connection')
        ]);

        CategoryHoax::create([
            'level' => 3,
            'category' => 'Misleading Content',
            'description' => 'Penggunaan informasi yang untuk membingkai sebuah isu atau individu',
            'slug' => SlugFormatter::generateSlug('misleading_content')
        ]);

        CategoryHoax::create([
            'level' => 4,
            'category' => 'false_context',
            'description' => 'Ketika konten yang asli dipadankan dengan konteks informasi yang salah',
            'slug' => SlugFormatter::generateSlug('false_context')
        ]);

        CategoryHoax::create([
            'level' => 5,
            'category' => 'Imposter Content',
            'description' => 'Ketika sebuah sumber asli ditiru',
            'slug' => SlugFormatter::generateSlug('imposter_content')
        ]);

        CategoryHoax::create([
            'level' => 6,
            'category' => 'Manipulated Content',
            'description' => 'Ketika sebuah informasi di manipulasi untuk merusak atau menipu',
            'slug' => SlugFormatter::generateSlug('manipulated_content')
        ]);

        CategoryHoax::create([
            'level' => 7,
            'category' => 'Fabricated Content',
            'description' => 'Konten baru yang disengaja di buat dan di desain untuk menipu dan merugikan',
            'slug' => SlugFormatter::generateSlug('fabricated_content')
        ]);
    }
}
