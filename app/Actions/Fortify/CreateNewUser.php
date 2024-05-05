<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'no_str' => ['required', 'string'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string'],
            'jenis_kelamin' => ['required', 'string'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'provinsi' => ['required'],
            'instansi' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'no_str' => $input['no_str'],
            'nama_lengkap' => $input['nama_lengkap'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'username' => $input['username'],
            'email' => $input['email'],
            'provinsi' => $input['provinsi'],
            'instansi' => $input['instansi'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
