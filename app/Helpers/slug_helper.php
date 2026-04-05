<?php

if (!function_exists('generate_custom_slug')) {
    function generate_custom_slug($string) {
        $slug = mb_strtolower($string);
        $slug = preg_replace('/[^a-z0-9\s-]/u', '', $slug);
        $slug = preg_replace('/\s+/', '-', $slug);

        return trim($slug, '-');
    }
}