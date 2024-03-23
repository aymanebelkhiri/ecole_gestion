<?php

namespace App\Http\Controllers;

class HomeEtudiantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Applique le middleware d'authentification à toutes les méthodes du contrôleur
    }

    public function index()
    {
        // Mettez ici la logique pour afficher la page des étudiants
        return view('etudiant.index');
    }
}
