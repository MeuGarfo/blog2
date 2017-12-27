<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/bower_components/1k/dist/1k.min.css">
    <link rel="stylesheet" href="/asset/css/main.css">
    <script src="/asset/js/main.js"></script>
    <script src="/asset/js/zepto.min.js"></script>
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="/feed/" />
    <meta property="og:site_name" content="<?php print $_ENV['site_name']; ?>">
    <meta property="og:title" content="<?php print $title; ?>">
    <meta property="og:url" content="<?php
    if (isset($post)) {
        $url=$_ENV['site_url'].'/posts/'.$post['slug'].'/'.$post['id'];
    } else {
        $url=$_ENV['site_url'];
    }
    print $url;
    ?>">
    <meta property="og:description" content="<?php
    if (isset($post)) {
        $description=$post['description'];
    } else {
        $description=$_ENV['site_description'];
    }
    print $description;
    ?>">
    <meta property="og:image" content="<?php
    if (isset($post)) {
        $cover=$post['cover'];
    } else {
        $cover=$_ENV['site_url'].$_ENV['site_logo'];
    }
    print $cover;
    ?>">
</head>
<body>
    <div class="c">
        <div class="r">
            <div class="g12 center">
                <h1>Blog</h1>
            </div>
        </div>
        <div class="r">
            <div class="g3">
                <?php
                if (isset($user) && is_array($user)) {
                    $view->out('inc/leftAuthPrivate', $data);
                } else {
                    $view->out('inc/leftAuthPublic', $data);
                }
                ?>
            </div>
            <div class="g6">
                <?php print $content; ?>
            </div>
            <div class="g3">
                right
            </div>
        </div>
    </div>
</body>
</html>
