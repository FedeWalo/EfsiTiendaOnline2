<html class="no-js" lang=""><!--<![endif]--><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" type="text/css">
    <script src="jquery-3.4.1.js" type="text/javascript"></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <?php include_once 'C:\wamp64\www\tp7\includes/Header.php'; ?>
    <div class="card col-lg-3 col-md-3 no-padding no-shadow">
        <div class="card-body bg-flat-color-5">
            <div class="h1 text-right text-light mb-4">
                <i class="fa fa-pie-chart"></i>
            </div>
            <div class="h4 mb-0 text-light">
                <span class="count">28</span>%
            </div>
            <small class="text-uppercase font-weight-bold text-light">Returning Visitors</small>
            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
        </div>
    </div>

    <!--Articulos en venta-->
    <div class="card col-lg-3 col-md-3 no-padding no-shadow">
        <div class="card-body bg-flat-color-3">
            <div class="h1 text-right mb-4">
                <i class="fa fa-cart-plus text-light"></i>
            </div>
            <div class="h4 mb-0 text-light">
                <span class="count">1238</span>
            </div>
            <small class="text-light text-uppercase font-weight-bold">Products sold</small>
            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
        </div>
    </div>

    <!--Nuevos Compradores-->
    <div class="card col-lg-3 col-md-3 no-padding no-shadow">
        <div class="card-body bg-flat-color-2">
            <div class="h1 text-muted text-right mb-4">
                <i class="fa fa-user-plus text-light"></i>
            </div>
            <div class="h4 mb-0 text-light">
                <span class="count">385</span>
            </div>
            <small class="text-uppercase font-weight-bold text-light">New Clients</small>
            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
        </div>
    </div>

     <!--Dato random 4-->
    <div class="card col-lg-3 col-md-3 no-padding no-shadow">
        <div class="card-body bg-flat-color-4">
            <div class="h1 text-light text-right mb-4">
                <i class="fa fa-clock-o"></i>
            </div>
            <div class="h4 mb-0 text-light">5:34:11</div>
            <small class="text-light text-uppercase font-weight-bold">Avg. Time</small>
            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
        </div>
    </div>

    <!--Grafico Torta-->
    <div class="col-lg-6 col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Pie Chart</h4>
                <div class="flot-container">
                    <div id="flot-pie" class="flot-pie-container" style="padding: 0px; position: relative;"><canvas class="flot-base" width="675" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 675px; height: 275px;"></canvas><canvas class="flot-overlay" width="675" height="275" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 675px; height: 275px;"></canvas><div class="legend"><div style="position: absolute; width: 68px; height: 84px; top: 5px; right: 5px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:5px;right:5px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #8fc9fb;overflow:hidden"></div></div></td><td class="legendLabel">Primary</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #007BFF;overflow:hidden"></div></div></td><td class="legendLabel">Success</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #19A9D5;overflow:hidden"></div></div></td><td class="legendLabel">Danger</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid #DC3545;overflow:hidden"></div></div></td><td class="legendLabel">Warning</td></tr></tbody></table></div></div>
                </div>
            </div>
        </div>
    </div>

    <!--Grafico de Barras-->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <h4 class="mb-3">VENTAS POR MES </h4>
                <canvas id="singelBarChart" height="338" width="676" class="chartjs-render-monitor" style="display: block; width: 676px; height: 338px;"></canvas>
            </div>
        </div>
    </div>
         

</body>
       