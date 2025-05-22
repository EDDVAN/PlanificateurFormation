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

// Router::get()