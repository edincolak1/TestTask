<?php

namespace Test;

use Adsolvix\Modules\Core\User\Permission\Permission;
use Adsolvix\Modules\Core\User\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $rootUser;
    private $salesUser;
    private $extendedSalesUser;

    /**
     * Set up some dummy users and document types
     */
    public function setUp()
    {
        parent::setUp();

        $this->seed('UsersTableSeeder');

        Permission::updateGates();

        // Get the root user with more permissions
        $this->rootUser = User::findOrFail(1);

        // Get a sale person user with extended rights
        $this->extendedSalesUser = User::findOrFail(4);

        // Get a sale person user with normal rights
        $this->salesUser = User::findOrFail(5);
    }


    /**
     * Normal user (sales person) cannot create a new user
     *
     * @return void
     */
    public function testInvalidJsonRequestFails()
    {
        $request = [];

        $this->json('POST', '/api/users', $request, $this->headers($this->salesUser))
            ->assertStatus(422);
    }

    /**
     * Normal user (sales person) cannot create a new user
     *
     * @return void
     */
    public function testUserWithoutPermissionToCreateUsersFails()
    {
        $request = ["parent_id" => $this->salesUser->id,
            "name" => "New User",
            "email" => "newuser@adsolvix.com",
            "password" => "123456"
        ];

        $this->json('POST', '/api/users', $request, $this->headers($this->salesUser))
            ->assertStatus(403);
    }

    /**
     * Sales person with extended rights can create a new child
     *
     * @return void
     */
    public function testUserWithPermissionToCreateChildSucceeds()
    {
        $request = [
            "parent_id" => $this->extendedSalesUser->id,
            "name" => "New User",
            "email" => "newuser@adsolvix.com",
            "password" => "123456"
        ];

        $this->json('POST', '/api/users', $request, $this->headers($this->extendedSalesUser))
            ->assertStatus(201);
    }

    /**
     * Sales person with extended rights cannot create a new child for other users
     *
     * @return void
     */
    public function testUserWithPermissionToCreateOwnChildrenCreatesChildrenForOtherUserFails()
    {
        $request = ["parent_id" => 2,
            "name" => "New User",
            "email" => "newuser@adsolvix.com",
            "password" => "123456"
        ];

        $this->json('POST', '/api/users', $request, $this->headers($this->extendedSalesUser))
            ->assertStatus(403);
    }

    /**
     * Root user can create a new user for everyone (has permission)
     *
     * @return void
     */
    public function testUserWithPermissionToCreateAllUsersSucceeds()
    {
        $request = ["parent_id" => 6,
            "name" => "New User",
            "email" => "newuser@adsolvix.com",
            "password" => "123456"
        ];

        $this->json('POST', '/api/users', $request, $this->headers($this->rootUser))
            ->assertStatus(201);
    }

    /**
     * Each user can update his information
     */
    public function testUserChangesHisOwnDetailsSucceeds()
    {
        $request = [
            "parent_id" => $this->extendedSalesUser->id,
            "name" => "New User",
            "email" => "newmail@adsolvix.com"
        ];

        $this->json('PUT', '/api/users/' . $this->salesUser->id, $request, $this->headers($this->salesUser))
            ->assertStatus(200);
    }

    /**
     * Normal user cannot change other users information
     */
    public function testUserChangesOtherUsersDetailsFails()
    {
        $request = [
            "name" => "New User",
            "email" => "newmail2@adsolvix.com",
        ];

        $this->json('PUT', '/api/users/' . $this->extendedSalesUser->id, $request, $this->headers($this->salesUser))
            ->assertStatus(403);
    }

    /**
     * User with permission to change all other users can change that information
     */
    public function testUserWithPermissionChangesOtherUsersDetailsSucceeds()
    {
        $request = [
            "name" => "New User",
            "email" => "newmail3@adsolvix.com",
        ];

        $this->json('PUT', '/api/users/' . $this->salesUser->id, $request, $this->headers($this->rootUser))
            ->assertStatus(200);
    }

    /**
     * Getting children and self succeeds
     *
     * @return void
     */
    public function testGetListOfChildrenAndSelfSucceeds()
    {
        $this->json('GET', '/api/users', [], $this->headers($this->rootUser))
            ->assertSee('"email":"' . $this->rootUser->email . '"')
            ->assertSee('"email":"' . $this->rootUser->getDescendants()->first()->email . '"')
            ->assertSee('"email":"' . $this->rootUser->getDescendants()->last()->email . '"')
            ->assertStatus(200);
    }

    /**
     * Update user roles with invalid data succeeds.
     *
     * @return void
     */
    public function testUpdateUserRolesWithInvalidDataSucceeds()
    {
        // Update user roles
        $request = ['role_ids' => [1,3,4]];
        $this->json('PUT', '/api/users/' . $this->salesUser->id . '/roles', $request, $this->headers($this->rootUser))
            ->assertSee('"id":"' . $this->salesUser->id)
            ->assertStatus(200);
    }




}