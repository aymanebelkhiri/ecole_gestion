<?php

namespace App\Http\Controllers;

class HomeProfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Applique le middleware d'authentification à toutes les méthodes du contrôleur
    }

    public function index()
    {
        // Mettez ici la logique pour afficher la page des professeurs
        return view('prof.home');
    }
}
