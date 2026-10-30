<?php

class EnvLoader 
{
    /**
     * Loads and parses a .env file, injecting variables into the environment.
     *
     * @param string $path Absolute path to the .env file
     * @return bool Returns true if loaded successfully, false otherwise
     */
    public static function load(string $path): bool 
    {
        if (!file_exists($path)) {
            return false;
        }

        if (!is_readable($path)) {
            throw new RuntimeException("The .env file at $path is not readable.");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line);

            // Don't read comments
            if (empty($line) || str_starts_with($line, '#') || str_starts_with($line, '//')) {
                continue;
            }

            // Check for valid key pair
            if (!str_contains($line, '=')) {
                continue;
            }

            // Split into key and value
            list($key, $value) = explode('=', $line, 2);
            
            $key = trim($key);
            $value = trim($value);

            // Remove single and doulbe quotes
            if (
                (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))
            ) {
                $value = substr($value, 1, -1);
            }

            putenv("{$key}={$value}");
            
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }

        return true;
    }
}
