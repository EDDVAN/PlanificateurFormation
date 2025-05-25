<?php

// Home
Router::get('/', ['HomeController', 'index']);
Router::get('/login', ['AuthController', 'login']);
Router::post('/login', ['AuthController', 'authenticate']);
Router::post('/logout', ['AuthController', 'logout']);

// 404
Router::get('/404', ['HomeController', 'pageDoesNotExist']);


Router::get('/dashboard', ['DashboardController', 'index'], ['Auth']);

// Gestion
Router::get('/gestion', ['GestionController', 'index'], ['Auth']);

// Domaine
Router::get('/gestion/domaine', ['DomaineController', 'index'], ['Auth']);
Router::get('/gestion/domaine/add', ['DomaineController', 'add'], ['Auth']);
Router::post('/gestion/domaine/create', ['DomaineController', 'create'], ['Auth']);
Router::get('/gestion/domaine/edit', ['DomaineController', 'edit'], ['Auth']);
Router::post('/gestion/domaine/update', ['DomaineController', 'update'], ['Auth']);
Router::post('/gestion/domaine/delete', ['DomaineController', 'delete'], ['Auth']);

// Sujet
Router::get('/gestion/sujet', ['SujetController', 'index'], ['Auth']);
Router::get('/gestion/sujet/add', ['SujetController', 'add'], ['Auth']);
Router::post('/gestion/sujet/create', ['SujetController', 'create'], ['Auth']);
Router::get('/gestion/sujet/edit', ['SujetController', 'edit'], ['Auth']);
Router::post('/gestion/sujet/update', ['SujetController', 'update'], ['Auth']);
Router::post('/gestion/sujet/delete', ['SujetController', 'delete'], ['Auth']);

// Cours
Router::get('/gestion/cours', ['CoursController', 'index'], ['Auth']);
Router::get('/gestion/cours/add', ['CoursController', 'add'], ['Auth']);
Router::post('/gestion/cours/create', ['CoursController', 'create'], ['Auth']);
Router::get('/gestion/cours/edit', ['CoursController', 'edit'], ['Auth']);
Router::post('/gestion/cours/update', ['CoursController', 'update'], ['Auth']);
Router::post('/gestion/cours/delete', ['CoursController', 'delete'], ['Auth']);


// Formateur
Router::get('/gestion/formateur', ['FormateurController', 'index'], ['Auth']);
Router::get('/gestion/formateur/add', ['FormateurController', 'add'], ['Auth']);
Router::post('/gestion/formateur/create', ['FormateurController', 'create'], ['Auth']);
Router::get('/gestion/formateur/edit', ['FormateurController', 'edit'], ['Auth']);
Router::post('/gestion/formateur/update', ['FormateurController', 'update'], ['Auth']);
Router::post('/gestion/formateur/delete', ['FormateurController', 'delete'], ['Auth']);

// Formation
Router::get('/gestion/formation', ['FormationController', 'index'], ['Auth']);
Router::get('/gestion/formation/add', ['FormationController', 'add'], ['Auth']);
Router::post('/gestion/formation/create', ['FormationController', 'create'], ['Auth']);
Router::get('/gestion/formation/edit', ['FormationController', 'edit'], ['Auth']);
Router::post('/gestion/formation/update', ['FormationController', 'update'], ['Auth']);
Router::post('/gestion/formation/delete', ['FormationController', 'delete'], ['Auth']);

// Pays
Router::get('/gestion/pays', ['PaysController', 'index'], ['Auth']);
Router::get('/gestion/pays/add', ['PaysController', 'add'], ['Auth']);
Router::post('/gestion/pays/create', ['PaysController', 'create'], ['Auth']);
Router::get('/gestion/pays/edit', ['PaysController', 'edit'], ['Auth']);
Router::post('/gestion/pays/update', ['PaysController', 'update'], ['Auth']);
Router::post('/gestion/pays/delete', ['PaysController', 'delete'], ['Auth']);

// Ville
Router::get('/gestion/ville', ['VilleController', 'index'], ['Auth']);
Router::get('/gestion/ville/add', ['VilleController', 'add'], ['Auth']);
Router::post('/gestion/ville/create', ['VilleController', 'create'], ['Auth']);
Router::get('/gestion/ville/edit', ['VilleController', 'edit'], ['Auth']);
Router::post('/gestion/ville/update', ['VilleController', 'update'], ['Auth']);
Router::post('/gestion/ville/delete', ['VilleController', 'delete'], ['Auth']);

// dates
Router::get('/gestion/date', ['FormationDateController', 'index'], ['Auth']);
Router::get('/gestion/date/add', ['FormationDateController', 'add'], ['Auth']);
Router::post('/gestion/date/create', ['FormationDateController', 'create'], ['Auth']);
Router::get('/gestion/date/edit', ['FormationDateController', 'edit'], ['Auth']);
Router::post('/gestion/date/update', ['FormationDateController', 'update'], ['Auth']);
Router::post('/gestion/date/delete', ['FormationDateController', 'delete'], ['Auth']);

// Calender
Router::get('/dashboard/calendar', ['CalendarController', 'dashboard'], ['Auth']);
Router::get('/client/calendar', ['CalendarController', 'client']);


// Client
Router::get('/client/formation', ['FormationController', 'client']);
Router::get('/client/formation/view', ['FormationController', 'clientDetail']);
Router::get('/client/formation/inscription', ['InscriptionController', 'inscription']);
Router::post('/client/formation/join', ['InscriptionController', 'join']);
