<?php
// Default meta values
$meta_title = "Zabiha Chicken - Halal Fast Food";
$meta_description = "Enjoy the best halal chicken, burgers, and fast food at Zabiha Chicken. Order online or visit us today!";
$meta_keywords = "halal chicken, fast food, zabiha, burgers, halal franchise, catering";
$meta_author = "Zabiha Chicken";

// Allow dynamic overrides from individual pages
if (isset($page_title)) {
    $meta_title = $page_title . " | Zabiha Chicken";
}

if (isset($page_description)) {
    $meta_description = $page_description;
}

if (isset($page_keywords)) {
    $meta_keywords = $page_keywords;
}
?>

<!-- Meta Tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($meta_title) ?></title>
<meta name="description" content="<?= htmlspecialchars($meta_description) ?>">
<meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
<meta name="author" content="<?= htmlspecialchars($meta_author) ?>">

<!-- Open Graph Tags for social media -->
<meta property="og:title" content="<?= htmlspecialchars($meta_title) ?>">
<meta property="og:description" content="<?= htmlspecialchars($meta_description) ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="/assets/images/Zabiha-Chicken.jpg">
<meta property="og:url" content="<?= "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">

<!-- Favicon -->
<link rel="icon" href="/assets/images/Zabiha-Chicken.png" type="image/png">
