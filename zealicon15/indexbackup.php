
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Zealicon | Together for a better future</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="author" content="Nibble Computer Society">
    <meta name="description" content="Zealicon is the annual techno-cultural fest of JSS Academy of Technical Education,  Noida.">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/favicon.png" type="image/png">
    <link rel="shortcut icon" href="" type="image/png">
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        if ( (screen.width < 1024) && (screen.height < 768) ) { 
            window.location = 'http://m.zealicon.in';
        } 
    </script>
    <style>
    a.showWrapper{

    }
    </style>
</head>
<body>
    <div class="container demo-1">
        <div class="content">
            <div id="large-header" class="large-header">
                <canvas id="demo-canvas"></canvas>
                <img src="assets/images/logo-welcome.png">
                <a class="button showWrapper" href="javascript:">Atithi Devo Bhava</a>
                <div class="loader">
                  <div class="image">
                    <img src="assets/images/paint.png" alt="">
                  </div>
                  <span></span>
                </div>
            </div>
            <div class="codrops-top clearfix">
            </div>
        </div>
    </div>
    <script src="assets/js/TweenLite.min.js"></script>
    <script src="assets/js/EasePack.min.js"></script>
    <script src="assets/js/rAF.js"></script>
    <script src="assets/js/demo-1.js"></script>
    <script src="assets/js/loader.js"></script>
    <script>
    $(window).load(function(){
        $.ajax({
            url: 'scripts/load.php',
            type: 'GET',
        })
        .done(function(data) {
            $('body').append(data);
            $('#dataModal').height($(window).height());
        })
    });
    </script>
</body>
</html>
