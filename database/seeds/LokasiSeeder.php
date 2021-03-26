<?php

use Illuminate\Database\Seeder;
use App\lokasi;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lokasi::create(['lokasi' => 'Batusari']);
        Lokasi::create(['lokasi' => 'Cisampih']);
        Lokasi::create(['lokasi' => 'Dawuan Kaler']);
        Lokasi::create(['lokasi' => 'Dawuan Kidul']);
        Lokasi::create(['lokasi' => 'Jambelaer']);
        Lokasi::create(['lokasi' => 'Manyeti']);
        Lokasi::create(['lokasi' => 'Margasari']);
        Lokasi::create(['lokasi' => 'Rawalele']);
        Lokasi::create(['lokasi' => 'Situsari']);
        Lokasi::create(['lokasi' => 'Sukasari']);
    }
}
