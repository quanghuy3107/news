<?php
use App\Models\RoleUserModel;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;


it('Admin Can Access Resource', function () {
    $role = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $this->actingAs($user)->get('/admin')->assertStatus(200);

});

it('User Can Not Access Resource', function () {
    $role = RoleUserModel::where('role_code','USER')->first()->role_id;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $this->actingAs($user)->get('/admin')->assertStatus(403);
});

it('Admin Can Show User', function () {
    $role = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
//    $catePermission = \App\Models\CategoryPermission::where('code', 'Users')->first()->category_permission_id;
    $permission = \App\Models\Permission::where('permission_code', 'ShowUsers')->first()->permission_id;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $user->permissions()->attach($permission);
    $this->actingAs($user)->get('/admin/users')->assertStatus(200);
});

it('Admin Can Not Show User', function () {
    $role = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
    $user = User::factory()->create();
    $user->roles()->attach($role);
    $this->actingAs($user)->get('/admin/users')->assertStatus(403);
});

it('Delete User', function () {
    $role = RoleUserModel::where('role_code','USER')->first()->role_id;
    $user = User::factory()->create();
    $user->roles()->attach($role);

    $roleAdmin = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
    $permission = Permission::where('permission_code','DeleteUsers')->first()->permission_id;
    $userAdmin = User::factory()->create();
    $userAdmin->roles()->attach($roleAdmin);
    $userAdmin->permissions()->attach($permission);

    $postData = [
        'UserId' => $user->id
    ];
    $this->actingAs($userAdmin)->post('/admin/users/deleteUser', $postData);
    $userAdmin->delete();
    expect(User::find($user->id)->is_deleted)->toBe(1);
});

it('Create Posts', function () {
    $roleAdmin = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
    $permission = Permission::where('permission_code','CreatePosts')->first()->permission_id;
    $userAdmin = User::factory()->create();
    $userAdmin->roles()->attach($roleAdmin);
    $userAdmin->permissions()->attach($permission);
    $dataPosts = [
        'title' => 'title_test',
        'image' => UploadedFile::fake()->image('test_image.jpg'),
        'content' => 'content_test',
        'short_description' => 'short_description_test',
        'author' => $userAdmin->id
    ];
    $this->actingAs($userAdmin)->post(route('admins.posts.addPostsPost'), $dataPosts);
    $this->assertDatabaseHas('posts', ['title' => $dataPosts['title'], 'author' => $dataPosts['author']]);
});

it('Update Posts', function () {
    $roleAdmin = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
    $permission = Permission::where('permission_code','UpdatePosts')->first()->permission_id;
    $userAdmin = User::factory()->create();
    $userAdmin->roles()->attach($roleAdmin);
    $userAdmin->permissions()->attach($permission);
    $dataPosts = [
        'title' => 'title_test',
        'image' => UploadedFile::fake()->image('test_image.jpg'),
        'content' => 'content_test',
        'short_description' => 'short_description_test',
        'author' => $userAdmin->id
    ];
    $id = \Illuminate\Support\Facades\DB::table('posts')->insertGetId($dataPosts);
    $dataUpdatePosts = [
        'title' => 'update_title_test',
        'image' => UploadedFile::fake()->image('test_image.jpg'),
        'content' => 'update_content_test',
        'short_description' => 'update_short_description_test',
        'author' => $userAdmin->id,
        'posts_id'=>$id
    ];
    $this->actingAs($userAdmin)->post(route('admins.posts.updatePostsPost'), $dataUpdatePosts);
    $this->assertDatabaseHas('posts', ['title' => $dataUpdatePosts['title'], 'author' => $dataUpdatePosts['author']]);
});

it('Delete Posts', function () {
    $roleAdmin = RoleUserModel::where('role_code','ADMIN')->first()->role_id;
    $permission = Permission::where('permission_code','DeletePosts')->first()->permission_id;
    $userAdmin = User::factory()->create();
    $userAdmin->roles()->attach($roleAdmin);
    $userAdmin->permissions()->attach($permission);
    $dataPosts = [
        'title' => 'title_test',
        'image' => UploadedFile::fake()->image('test_image.jpg'),
        'content' => 'content_test',
        'short_description' => 'short_description_test',
        'author' => $userAdmin->id
    ];
    $id = \Illuminate\Support\Facades\DB::table('posts')->insertGetId($dataPosts);
    $this->actingAs($userAdmin)->post(route('admins.posts.deletePosts'), ['posts_id' => $id]);
    expect(\App\Models\PostsModel::find($id)->is_deleted)->toBe(1);
});

