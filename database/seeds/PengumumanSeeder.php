<?php

use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon\Carbon::now();
        DB::table('pengumuman')->insert([
            'judul' => 'JADWAL PTS SEMESTER GASAL 2021/2022',
            'deskripsi' => 'ini pengumuman Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit quaerat doloremque adipisci repudiandae! Repudiandae fugit quibusdam dolorem cumque, impedit consequuntur velit dicta repellat vel deleniti, optio aspernatur voluptatem, expedita hic!',
            'file' => 'file1.pdf',
            'created_at' => $date,
        ]);

        DB::table('pengumuman')->insert([
            'judul' => 'KOMPETISI SAINS NASIONAL (KSN) Tahun 2022',
            'deskripsi' => 'ini pengumuman Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit quaerat doloremque adipisci repudiandae! Repudiandae fugit quibusdam dolorem cumque, impedit consequuntur velit dicta repellat vel deleniti, optio aspernatur voluptatem, expedita hic!',
            'file' => 'file2.pdf',
            'created_at' => $date,
        ]);
    }
}
