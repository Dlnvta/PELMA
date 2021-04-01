
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
            'name' => 'Alvin Alfiansyah',
            'nik'   => '3203012503770011',
            'email' => 'alvin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'telp'  => '085321987009',
            'password' => bcrypt('alvin1234')
        ]);
        
        $petugas = User::create([
            'name' => 'Regan Algibran',
            'nik'   => '3213275101730001',
            'email' => 'regan@gmail.com',
            'email_verified_at' => Carbon::now(),
            'telp'  => '085119876521',
            'password' => bcrypt('regan1234')
        ]);
        $masyarakat = User::create([
            'name' => 'Dela Novita',
            'nik'   => '3213276911020002',
            'email' => 'novitadela97@gmail.com',
            'email_verified_at' => Carbon::now(),
            'telp'  => '087727584499',
            'password' => bcrypt('dela1212')
        ]);

        $admin->roles()->attach($adminRole);
        $petugas->roles()->attach($petugasRole);
        $masyarakat->roles()->attach($masyarakatRole);
    }
}
