<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $clinicaRole = Role::where('name', 'clinica')->first();
        $doctorRole = Role::where('name', 'doctor')->first();
        $pacienteRole = Role::where('name', 'paciente')->first();

        $admin = User::create([
            'name' => 'adminUser',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);
        $clinica = User::create([
            'name' => 'clinicaUser',
            'email' => 'clinica@clinica.com',
            'password' => Hash::make('clinica'),
        ]);

        $doctor = User::create([
            'name' => 'doctorUser',
            'email' => 'doctor@doctor.com',
            'password' => Hash::make('doctor'),
        ]);
        $paciente = User::create([
            'name' => 'pacienteUser',
            'email' => 'paciente@paciente.com',
            'password' => Hash::make('paciente'),
        ]);

        $admin->roles()->attach($adminRole);
        $clinica->roles()->attach($clinicaRole);
        $doctor->roles()->attach($doctorRole);
        $paciente->roles()->attach($pacienteRole);
    }
}
