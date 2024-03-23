<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Etudiant;
use App\Models\Prof;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Définir une redirection par défaut

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', Rule::in(['etudiants', 'admin', 'profs'])],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Assurez-vous de hasher le mot de passe
            'role' => $data['role'],
        ]);
    
        // Insérer les données dans la table appropriée en fonction du rôle de l'utilisateur
        if ($data['role'] === 'etudiants') {
            Etudiant::create([
                'id_etudiant' => $user->id, // Utilisation de l'ID de l'utilisateur comme clé primaire
                'Matricule' => 1,
                'Nom' => $data['name'],
                'Prenom' => "", // Assurez-vous de spécifier une valeur pour chaque colonne non nullable
                'DateNaissance' => Carbon::now(),
                'Sexe' => "", // Assurez-vous de spécifier une valeur pour chaque colonne non nullable
                'Email' => $data['email'],
                'Password' => Hash::make($data['password']), // Assurez-vous de hasher le mot de passe
                'Age' => 1,
                'Groupe' => 1,
            ]);
            $this->redirectTo = '/etudiant'; // Rediriger vers la page des étudiants
        } elseif ($data['role'] === 'admin') {
            Admin::create([
                'Id' => $user->id,
                'Nom' => $data['name'],
                'Prenom' => "",
                'Email' => $data['email'],
                'Password' => $data['password'], // Hasher le mot de passe si nécessaire
            ]);
            $this->redirectTo = '/admin'; // Rediriger vers la page des administrateurs
        } elseif ($data['role'] === 'profs') {
            Prof::create([
                'id_prof' => $user->id,
                'Nom' => $data['name'],
                'Prenom' => "",
                'Email' => $data['email'],
                'Sexe' => "",
                'Password' => $data['password'], // Hasher le mot de passe si nécessaire
                'Module' => 1,
            ]);
            $this->redirectTo = '/prof'; // Rediriger vers la page des professeurs
        }

        return $user;
    }
}
