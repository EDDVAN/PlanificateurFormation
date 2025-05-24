<?php

// Home
Router::get('/', ['HomeController', 'index']);
Router::get('/login', ['AuthController', 'login']);
Router::post('/login', ['AuthController', 'authenticate']);
Router::post('/logout', ['AuthController', 'logout']);

// 404
Router::get('/404', ['HomeController', 'pageDoesNotExist']);


Router::get('/dashboard', ['DashboardController', 'index']);

// Gestion
Router::get('/gestion', ['GestionController', 'index']);

// Domaine
Router::get('/gestion/domaine', ['DomaineController', 'index']);
Router::get('/gestion/domaine/add', ['DomaineController', 'add']);
Router::post('/gestion/domaine/create', ['DomaineController', 'create']);
Router::get('/gestion/domaine/edit', ['DomaineController', 'edit']);
Router::post('/gestion/domaine/update', ['DomaineController', 'update']);
Router::post('/gestion/domaine/delete', ['DomaineController', 'delete']);

// Sujet
Router::get('/gestion/sujet', ['SujetController', 'index']);
Router::get('/gestion/sujet/add', ['SujetController', 'add']);
Router::post('/gestion/sujet/create', ['SujetController', 'create']);
Router::get('/gestion/sujet/edit', ['SujetController', 'edit']);
Router::post('/gestion/sujet/update', ['SujetController', 'update']);
Router::post('/gestion/sujet/delete', ['SujetController', 'delete']);

// Cours
Router::get('/gestion/cours', ['CoursController', 'index']);
Router::get('/gestion/cours/add', ['CoursController', 'add']);
Router::post('/gestion/cours/create', ['CoursController', 'create']);
Router::get('/gestion/cours/edit', ['CoursController', 'edit']);
Router::post('/gestion/cours/update', ['CoursController', 'update']);
Router::post('/gestion/cours/delete', ['CoursController', 'delete']);


// Formateur
Router::get('/gestion/formateur', ['FormateurController', 'index']);
Router::get('/gestion/formateur/add', ['FormateurController', 'add']);
Router::post('/gestion/formateur/create', ['FormateurController', 'create']);
Router::get('/gestion/formateur/edit', ['FormateurController', 'edit']);
Router::post('/gestion/formateur/update', ['FormateurController', 'update']);
Router::post('/gestion/formateur/delete', ['FormateurController', 'delete']);

// Pays
Router::get('/gestion/pays', ['PaysController', 'index']);
Router::get('/gestion/pays/add', ['PaysController', 'add']);
Router::post('/gestion/pays/create', ['PaysController', 'create']);
Router::get('/gestion/pays/edit', ['PaysController', 'edit']);
Router::post('/gestion/pays/update', ['PaysController', 'update']);
Router::post('/gestion/pays/delete', ['PaysController', 'delete']);

// Ville
Router::get('/gestion/ville', ['VilleController', 'index']);
Router::get('/gestion/ville/add', ['VilleController', 'add']);
Router::post('/gestion/ville/create', ['VilleController', 'create']);
Router::get('/gestion/ville/edit', ['VilleController', 'edit']);
Router::post('/gestion/ville/update', ['VilleController', 'update']);
Router::post('/gestion/ville/delete', ['VilleController', 'delete']);
