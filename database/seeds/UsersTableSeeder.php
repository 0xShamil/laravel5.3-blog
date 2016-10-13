<?php

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_author = Role::where('name', 'Author')->first();
    	$role_editor = Role::where('name', 'Editor')->first();
    	$role_admin = Role::where('name', 'Admin')->first();

        $admin = new User();
        $admin->username = 'shamilchoudhury';
        $admin->email = 'shamil@droidtronix.com';
        $admin->password = bcrypt('myadmin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->username = 'john';
        $author->email = 'john@droidtronix.com';
        $author->password = bcrypt('myadmin');
        $author->save();
        $author->roles()->attach($role_author);

        $editor = new User();
        $editor->username = 'jim';
        $editor->email = 'jim@droidtronix.com';
        $editor->password = bcrypt('myadmin');
        $editor->save();
        $editor->roles()->attach($role_editor);


    }
}
