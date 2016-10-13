<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_author = new Role();
        $role_author->name = 'Author';
        $role_author->description = 'An Author';
        $role_author->save();

        $role_editor = new Role();
        $role_editor->name = 'Editor';
        $role_editor->description = 'An Editor';
        $role_editor->save();

        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'An Admin';
        $role_admin->save();
    }
}
