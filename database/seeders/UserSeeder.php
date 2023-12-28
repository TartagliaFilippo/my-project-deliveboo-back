<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $_users = config('users');

    foreach ($_users as $_user) {
      $user = new User();
      $user->name = $_user['name'];
      $user->lastname = $_user['lastname'];
      $user->email = $_user['email'];
      $user->password = Hash::make($_user['password']);
      $user->vat = $_user['vat'];

      $user->save();
    }

  }
}