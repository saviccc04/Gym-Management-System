<?php
    function base_url($path = "") {
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off") ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $baseUrl = $protocol . '://' . $host;

        return $baseUrl . '/' . PROJECT_DIR . '/' . ltrim($path, '/');
    }

    function base_path($path = "") {
        $rootPath = __DIR__;

        return $rootPath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
    }

    function redirect($location) {
        header('Location: ' . $location);
        exit;
    }
?>