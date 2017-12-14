<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rawgit.com/mushape/1k/7d47b0f/dist/1k.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/aicoutos/blog/f9138d6/asset/css/main.css">
    <script src="https://cdn.rawgit.com/jquerylight/jquerylight/master/dist/jquerylight.min.js"></script>
    <script src="https://cdn.rawgit.com/aicoutos/blog/master/asset/js/main.js"></script>
</head>
<body>
    <div class="c">
        <div class="r">
            <div class="g12">
                <h1>Blog</h1>
            </div>
        </div>
        <div class="r">
            <div class="g3">
                left
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
