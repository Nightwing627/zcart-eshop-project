<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = \DB::table('modules')->pluck('name','id');

        foreach ($modules as $id => $name)
        {
	        DB::table('permissions')->insert(
	        	array_merge([
                    [
                        'module_id' => $id,
                        'name' => 'View',
                        'slug' => 'view_' . snake_case($name),
                        'created_at' => Carbon::Now(),
                        'updated_at' => Carbon::Now(),
                    ],[
			            'module_id' => $id,
			            'name' => 'Add',
			            'slug' => 'add_' . snake_case($name),
			            'created_at' => Carbon::Now(),
			            'updated_at' => Carbon::Now(),
			        ],[
			            'module_id' => $id,
			            'name' => 'Edit',
			            'slug' => 'edit_' . snake_case($name),
			            'created_at' => Carbon::Now(),
			            'updated_at' => Carbon::Now(),
			        ],[
			            'module_id' => $id,
			            'name' => 'Delete',
			            'slug' => 'delete_' . snake_case($name),
			            'created_at' => Carbon::Now(),
			            'updated_at' => Carbon::Now(),
			        ]
                ])
	        );
        }

        // Demo permission_role on pivot table
        $permissions = \DB::table('permissions')->pluck('id');

        foreach ($permissions as $index)
        {
            DB::table('permission_role')->insert(
                [
                    'permission_id' => $index,
                    'role_id' => 1,
                    'created_at' => Carbon::Now(),
                    'updated_at' => Carbon::Now(),
                ]
            );
        }

    }
}
