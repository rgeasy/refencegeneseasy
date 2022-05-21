<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Config;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        $admin = User::where('email','=','ivo.pontes@uft.edu.br')->first();

        if(empty($admin))
        {

                    \DB::table('users')->insert([
                        'name' => 'Ivo Pontes',
                        'email' => 'ivo.pontes@uft.edu.br',
                        'password' => bcrypt(Config::get("app.ivo_pass"))
                    ]);

                    \DB::table('users')->insert([
                        'name' => 'Micaele Rodrigues de Souza',
                        'email' => 'micaele.sp@uft.edu.br',
                        'password' => bcrypt(Config::get("app.micaele_pass"))
                    ]);

                    \DB::table('users')->insert([
                        'name' => 'Rafael Silva Tavares',
                        'email' => 'rafael.tavares@uft.edu.br',
                        'password' => bcrypt(Config::get("app.rafael_pass"))
                    ]);

                    \DB::table('users')->insert([
                        'name' => 'Admin',
                        'email' => 'lamsh@uft.edu.br',
                        'password' => bcrypt(Config::get("app.lam_pass"))
                    ]);

                    Permission::create(['name' => 'edit species']);
                    $role = Role::create(['name' => 'editor']);
                    $role->givePermissionTo('edit species');

                    $users = User::where('email','=','ivo.pontes@uft.edu.br')
                                    ->orWhere('email','=','micaele.sp@uft.edu.br')
                                    ->orWhere('email','=','rafael.tavares@uft.edu.br')
                                    ->orWhere('email','=','lamsh@uft.edu.br')
                                    ->get();

                    foreach ($users as $user)
                    {
                        $user->assignRole('editor');
                    }
        }
	}
}
