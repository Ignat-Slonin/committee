<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $primary_user =Role::where('name','primary')->first();
        $basic_user = Role::where('name','basic')->first();
        $admin_user = Role::where('name','admin')->first();

        $primary = new User();
        $primary->name = 'Терешко Франц Иосифович';
        $primary->email = 'terechko@mail.ru';
        $primary->password = bcrypt('123456');
        $primary->  id_ExecutiveCommitteePrimary = '1';
        $primary->save();
        $primary->roles()->attach($primary_user);


        $basic = new User();
        $basic->name = 'Сидоров Семен Иванович';
        $basic->email = 'glub@mail.ru';
        $basic->password = bcrypt('123456');
        $basic->  id_ExecutiveCommitteePrimary = '2';
        $basic->save();
        $basic->roles()->attach($basic_user);

        $admin = new User();
        $admin->name = 'Иванов Иван Иванович';
        $admin->email = 'admin@mail.ru';
        $admin->password = bcrypt('123456');
        $admin->  id_ExecutiveCommitteePrimary = '3';
        $admin->save();
        $admin->roles()->attach($admin_user);
    }
}
