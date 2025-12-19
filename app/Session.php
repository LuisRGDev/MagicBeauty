<?php

class Session {
    
    /**
     * Set a flash message
     */
    public static function flash($key, $message) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash'][$key] = $message;
    }
    
    /**
     * Get a flash message and remove it
     */
    public static function getFlash($key) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        
        return null;
    }
    
    /**
     * Check if a flash message exists
     */
    public static function hasFlash($key) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['flash'][$key]);
    }
    
    /**
     * Get all flash messages and clear them
     */
    public static function getAllFlash() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $messages = $_SESSION['flash'] ?? [];
        unset($_SESSION['flash']);
        return $messages;
    }
    
    /**
     * Set a session value
     */
    public static function set($key, $value) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION[$key] = $value;
    }
    
    /**
     * Get a session value
     */
    public static function get($key, $default = null) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION[$key] ?? $default;
    }
    
    /**
     * Check if a session key exists
     */
    public static function has($key) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION[$key]);
    }
    
    /**
     * Remove a session value
     */
    public static function remove($key) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION[$key]);
    }
}
