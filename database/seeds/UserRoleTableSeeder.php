<?php

use Illuminate\Database\Seeder;
use App\Models\RoleUser;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newrole = new RoleUser;
        $newrole->role_id = '1';
        $newrole->user_id = '1';
        $newrole->timestamps = false;
        $newrole->save();

        $newrole = new RoleUser;
        $newrole->role_id = '3';
        $newrole->user_id = '2';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '2';
        $newrole->user_id = '3';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '3';
        $newrole->user_id = '4';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '3';
        $newrole->user_id = '5';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '3';
        $newrole->user_id = '6';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '2';
        $newrole->user_id = '7';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '3';
        $newrole->user_id = '8';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '3';
        $newrole->user_id = '9';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '2';
        $newrole->user_id = '10';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '2';
        $newrole->user_id = '11';
        $newrole->timestamps = false;
        $newrole->save();
        $newrole = new RoleUser;
        $newrole->role_id = '2';
        $newrole->user_id = '12';
        $newrole->timestamps = false;
        $newrole->save();

    }
}
