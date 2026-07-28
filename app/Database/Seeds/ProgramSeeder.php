<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'            => 'Bantuan Kesehatan Anak Kurang Mampu',
                'category'         => 'Medis',
                'description'      => 'Bantu anak-anak kurang mampu untuk mendapatkan perawatan dan pengobatan medis bagi yang membutuhkan.',
                'organizer'        => 'Yayasan Peduli Kasih',
                'target_amount'    => 30000000,
                'collected_amount' => 24000000,
                'donor_count'      => 125,
                'days_left'        => 15,
                'is_active'        => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'title'            => 'Renovasi Sekolah Terdampak Bencana',
                'category'         => 'Pendidikan',
                'description'      => 'Bantu perbaikan fasilitas sekolah yang rusak akibat bencana alam agar anak-anak bisa belajar kembali.',
                'organizer'        => 'Komunitas Peduli Pendidikan',
                'target_amount'    => 50000000,
                'collected_amount' => 18500000,
                'donor_count'      => 82,
                'days_left'        => 22,
                'is_active'        => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
            [
                'title'            => 'Bantuan Pangan Lansia Dhuafa',
                'category'         => 'Sosial',
                'description'      => 'Sediakan kebutuhan pangan bulanan bagi lansia dhuafa yang tinggal sendiri tanpa keluarga.',
                'organizer'        => 'Yayasan Kasih Lansia',
                'target_amount'    => 20000000,
                'collected_amount' => 9200000,
                'donor_count'      => 54,
                'days_left'        => 10,
                'is_active'        => 1,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('programs')->insertBatch($data);
    }
}
