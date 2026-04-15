<?php

namespace Database\Seeders;

use App\Models\Departemen;
use Illuminate\Database\Seeder;

class DepartemenSeeder extends Seeder
{
    /**
     * Seed data departemen awal.
     */
    public function run(): void
    {
        $departemens = [
            ['nama_departemen' => 'IT & Development', 'deskripsi' => 'Departemen teknologi informasi dan pengembangan software'],
            ['nama_departemen' => 'Human Resources', 'deskripsi' => 'Departemen sumber daya manusia dan rekrutmen'],
            ['nama_departemen' => 'Finance', 'deskripsi' => 'Departemen keuangan dan akuntansi'],
            ['nama_departemen' => 'Marketing', 'deskripsi' => 'Departemen pemasaran dan komunikasi'],
            ['nama_departemen' => 'Operations', 'deskripsi' => 'Departemen operasional dan logistik'],
        ];

        foreach ($departemens as $dept) {
            Departemen::create($dept);
        }
    }
}
