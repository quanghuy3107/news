<?php
use App\Models\RoleUserModel;
use App\Models\User;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;


it('Admin Can Access Resource', function () {
    $role = RoleUserModel::where('RoleCode','ADMIN')->first()->RoleId;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $this->actingAs($user)->get('/admin')->assertStatus(200);

});

it('User Can Not Access Resource', function () {
    $role = RoleUserModel::where('RoleCode','USER')->first()->RoleId;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $this->actingAs($user)->get('/admin')->assertStatus(403);
});

it('Admin Can Show User', function () {
    $role = RoleUserModel::where('RoleCode','ADMIN')->first()->RoleId;
    $permission = \App\Models\Permission::where('PermissionCode', 'ShowUser')->first()->PermissionId;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $user->permissions()->attach($permission);
    $this->actingAs($user)->get('/admin/users')->assertStatus(200);
});

it('Admin Can Not Show User', function () {
    $role = RoleUserModel::where('RoleCode','ADMIN')->first()->RoleId;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $this->actingAs($user)->get('/admin/users')->assertStatus(403);
});


