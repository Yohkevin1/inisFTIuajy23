<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'admin',
            'email' => 'inisiasiftiuajy@gmail.com',
            'password' => Hash::make('inisiasiftiuajy'),
            'profile_photo_path' => NULL,
            'remember_token' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL
        ];
    }
}
