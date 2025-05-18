<?php

// Home
Router::get('/', ['HomeController', 'index']);
Router::get('/login', ['AuthController', 'login']);
Router::post('/authenticate', ['AuthController', 'authenticate']);
Router::post('/logout', ['AuthController', 'logout']);

// 404
Router::get('/404', ['HomeController', 'pageDoesNotExist']);
