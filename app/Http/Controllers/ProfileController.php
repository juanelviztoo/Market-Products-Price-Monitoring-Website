<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = [
            ['name' => 'Devita Ayu Maharani', 'nim' => 'L0122046', 'prodi' => 'S1 - Informatika', 'universitas' => 'Universitas Sebelas Maret', 'foto' => 'devitaprofile.jpg', 'description' => 'Program Developer & Database Builder'],
            ['name' => 'Elvizto Juan Khresnanda', 'nim' => 'L0122054', 'prodi' => 'S1 - Informatika', 'universitas' => 'Universitas Sebelas Maret', 'foto' => 'elviztoprofile3.jpg', 'description' => 'Program Developer, Database Builder, & UI/UX Designer'],
            ['name' => 'Ghina Puspamurti', 'nim' => 'L0122069', 'prodi' => 'S1 - Informatika', 'universitas' => 'Universitas Sebelas Maret', 'foto' => 'jomok1.jpeg', 'description' => 'Data Searcher & Software Tester'],
            ['name' => 'Farrelly Theo Ariela', 'nim' => 'L0122061', 'prodi' => 'S1 - Informatika', 'universitas' => 'Universitas Sebelas Maret', 'foto' => 'theoprofile.jpg', 'description' => 'Data Searcher & Software Tester'],
            ['name' => 'Ibrahim Nur Kuda', 'nim' => 'L01220XX', 'prodi' => 'S1 - Informatika', 'universitas' => 'Universitas Sebelas Maret', 'foto' => 'Yamaha NMAX Warna Glossy White.jpeg', 'description' => 'Program Developer & Database Builder'],
        ];

        return view('profile.index', compact('profiles'));
    }
}
