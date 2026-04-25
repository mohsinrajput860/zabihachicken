<?php
// seo_settings.php

// You might pull these from a database or config file in a real app
// Here’s a static example:

$seo_settings = [
    'site_title' => 'Zabiha Chicken - Fresh Halal Food',
    'site_description' => 'Zabiha Chicken serves high-quality halal chicken and catering services, crafted with care and love.',
    'site_keywords' => 'halal chicken, fresh food, catering, Zabiha, halal meat, quality food',
    'og_image' => '/assets/images/og-image.jpg', // Open Graph image path
    'twitter_handle' => '@ZabihaChicken',
];

// Optionally define constants or variables for use in templates
define('SEO_SITE_TITLE', $seo_settings['site_title']);
define('SEO_SITE_DESCRIPTION', $seo_settings['site_description']);
define('SEO_SITE_KEYWORDS', $seo_settings['site_keywords']);
define('SEO_OG_IMAGE', $seo_settings['og_image']);
define('SEO_TWITTER_HANDLE', $seo_settings['twitter_handle']);
