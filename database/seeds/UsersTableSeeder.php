<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        factory(Permission::class)->create([  
                'name' => 'create_user'
            ]);
        factory(Permission::class)->create([
            'name' => 'update_user'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_user'
        ]);
        factory(Permission::class)->create([
            'name' =>'create_faculty'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_faculty'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_faculty'
        ]);
        factory(Permission::class)->create([
            'name' => 'create_department'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_department'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_department'
        ]);
        factory(Permission::class)->create([
            'name' => 'create_permission'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_permission'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_permission'
        ]);
        factory(Permission::class)->create([
            'name' => 'create_role'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_role'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_role'
        ]);
        factory(Permission::class)->create([
            'name' => 'create_category'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_category'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_category'
        ]);
        factory(Permission::class)->create([
            'name' => 'create_item'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_item'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_item'
        ]);
        factory(Permission::class)->create([
            'name' => 'create_order'
        ]);
        factory(Permission::class)->create([
            'name' => 'update_order'
        ]);
        factory(Permission::class)->create([
            'name' => 'delete_order'
        ]);
        factory(Permission::class)->create([
            'name' => 'reset'
        ]);
        
        $role=Role::create(['name'=>'Super_Admin']);
        $role->givePermissionTo(Permission::all());
        $user = factory(User::class)->create(['email'=>'ahmed.16014003@stud.uoz.edu.krd']);
        $user->assignRole('Super_Admin');
    }
}
