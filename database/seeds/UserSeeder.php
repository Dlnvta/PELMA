
<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $petugasRole = Role::where('name', 'petugas')->first();
        $masyarakatRole = Role::where('name', 'masyarakat')->first();

        $admin = User::create([
            'name' => 'Admin',
            'nik'   => '0025670965327654321',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'telp'  => '085321987009',
            'password' => bcrypt('admin1234')
        ]);
        
        $petugas = User::create([
            'name' => 'Petugas',
            'nik'   => '0035678902341577',
            'email' => 'petugas@gmail.com',
            'email_verified_at' => Carbon::now(),
            'telp'  => '087727584499',
            'password' => bcrypt('petugas1234')
        ]);
        $masyarakat = User::create([
            'name' => 'Nirvana Harani',
            'nik'   => '0021230095678948',
            'email' => 'novitadela97@gmail.com',
            'email_verified_at' => Carbon::now(),
            'telp'  => '085119876521',
            'password' => bcrypt('vana1212')
        ]);

        $admin->roles()->attach($adminRole);
        $petugas->roles()->attach($petugasRole);
        $masyarakat->roles()->attach($masyarakatRole);
    }
}
