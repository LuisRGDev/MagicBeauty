<?php

function testUrl($url) {
    echo "Testing URL: $url\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    // Don't follow redirects automatically, we want to check the Location header
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); 
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if ($response === false) {
        echo "Error: " . curl_error($ch) . "\n";
        return;
    }

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

    echo "HTTP Code: $httpCode\n";
    
    // Check for Location header
    if (preg_match('/^Location: (.+)$/m', $header, $matches)) {
        echo "Redirect Location: " . trim($matches[1]) . "\n";
    }

    // Check for specific content in body if needed
    if ($httpCode == 200) {
        if (strpos($url, '/public/') !== false && strpos($url, '/cursos') === false) {
             // Checking home page for the link
             if (strpos($body, 'href="http://localhost/Paginas_web/MagicBeauty/public/cursos"') !== false) {
                 echo "SUCCESS: Found correct absolute link to courses.\n";
             } elseif (preg_match('/href="[^"]*\/public\/cursos"/', $body)) {
                 echo "SUCCESS: Found relative link to courses.\n";
             } else {
                 echo "WARNING: Could not find expected link to courses in home page.\n";
                 // Print a snippet to see what's there
                 // echo substr($body, 0, 1000); 
             }
        }
    }
    
    curl_close($ch);
    echo "----------------------------------------\n";
}

$baseUrl = "http://localhost/Paginas_web/MagicBeauty/public";

// 1. Test Home Page - Should load and contain correct link
testUrl($baseUrl . "/");

// 2. Test Cursos Page (Unauthenticated) - Should Redirect to /login
testUrl($baseUrl . "/cursos");
