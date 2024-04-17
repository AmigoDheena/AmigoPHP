<?php

include 'src/template.php'; // Include the Blade class

// Load the data
include 'src/data.php';

// Determine which page to render based on the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define an array of allowed pages and their corresponding template files
$pages = [
    'home' => 'views/home.amigo.php',
    'about' => 'views/about.amigo.php',
    // Add more pages as needed
];

// Check if the requested page exists in the array
if (array_key_exists($page, $pages)) {
    // Render the template for the requested page
    $amigoPHP = new AmigoPHP($data);
    echo $amigoPHP->render($pages[$page]);
} else {
    // Render a 404 page if the requested page doesn't exist
    echo 'Error 404: Page not found';
}