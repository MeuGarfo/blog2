<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php print $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://gitcdn.xyz/repo/mushape/1k/master/dist/1k.min.css">
    <style media="screen">
    @supports (-moz-appearance:meterbar) {
        textarea{
            width: calc(100% - 8px);
        }
    }
    </style>
</head>
<body>
    <div class="c">
        <div class="r">
            <div class="g12">
                <h1>Guest</h1>
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
