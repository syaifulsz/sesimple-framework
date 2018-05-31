<?php

use App\Components\UrlHelper;

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$is_home_page = ($request_uri[0] === '/');
$canonical_url = UrlHelper::base_url($request_uri[0]);

$header_app_name = !empty($header['app_name']) ? $header['app_name'] : 'Sesimple Framework';
$header_title = !empty($header['title']) ? $header['title'] .' - '. $header_app_name : $header_app_name;
$header_description = !empty($header['description']) ? $header['description'] : $header_app_name;
$header_keywords = !empty($header['keywords']) && is_array($header['keywords']) ? implode(',', $header['keywords']) : $header_app_name;
$header_page_url = !empty($header['page_url']) ? $header['page_url'] : 'http://sesimple.local:8888';
$header_fb_site_name = !empty($header['fb_site_name']) ? $header['fb_site_name'] : $header_title;
$header_fb_image = !empty($header['fb_image']) ? $header['fb_image'] : null;
$header_fb_type = !empty($header['fb_type']) ? $header['fb_type'] : 'Website';
$header_fb_app_id = !empty($header['fb_app_id']) ? $header['fb_app_id'] : false;
$header_no_index = !empty($header_no_index) ? true : false;
$header_twitter_username = !empty($header['twitter_username']) ? $header['twitter_username'] : false;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $header_title ?></title>
    <meta name="application-name" content="<?= $header_app_name ?>">

    <?php if ($header_no_index) : ?>
        <meta name="robots" content="noindex, nofollow">
    <?php endif ?>

    <link rel="canonical" href="<?= $canonical_url ?>">
    <meta name="description" content="<?= $header_description ?>">
    <meta name="keywords" content="<?= $header_keywords ?>">
    <meta name="language" content="English">

    <meta name="twitter:title" content="<?= $header_title ?>">
    <meta name="twitter:description" content="<?= $header_description ?>">

    <?php if ($header_twitter_username) : ?>
        <meta name="twitter:site" content="@<?= $header_twitter_username ?>" />
        <meta name="twitter:creator" content="@<?= $header_twitter_username ?>" />
    <?php endif ?>
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="<?= $canonical_url ?>">

    <?php if ($header_fb_app_id) : ?>
        <meta property="fb:app_id" content="<?= $header_fb_app_id ?>">
    <?php endif ?>
    <?php if ($header_fb_image) : ?>
        <meta property="og:image" content="<?= $header_fb_image ?>">
    <?php endif ?>
    <meta property="og:title" content="<?= $header_title ?>">
    <meta property="og:type" content="<?= $header_fb_type ?>">
    <meta property="og:url" content="<?= $canonical_url ?>">
    <meta property="og:site_name" content="<?= $header_fb_site_name ?>">
    <meta property="og:description" content="<?= $header_description ?>">
    <meta property="og:locale" content="en_US">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <?= @$add_in_foot ?>
</head>
<body>
    <div class="navbar navbar-dark bg-dark mb-3">
        <span class="navbar-brand mb-0 h1"><a href="<?= UrlHelper::base_url() ?>" class="text-white"><i class="fas fa-home"></i></a></span>
    </div>
