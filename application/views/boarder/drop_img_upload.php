<html lang="en" style="height:100%;" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head>
    <meta charset="utf-8">
    <title>Pinegrow Bootstrap Blocks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="pinegrow, blocks, bootstrap">
    <meta name="description" content="My new website">
    <link rel="shortcut icon" href="ico/favicon.png">
    <!-- Core CSS -->
    <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/lib/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <!-- Style Library -->
    <link href="/static/lib/css/style-library-1.css" rel="stylesheet">
    <link href="/static/lib/css/plugins.css" rel="stylesheet">
    <link href="/static/lib/css/blocks.css" rel="stylesheet">
    <link href="/static/lib/css/custom.css" rel="stylesheet">
    <link href="/static/lib/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="/static/lib/js/html5shiv.js"></script>
    <script src="/static/lib/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/24/10/intl/ko_ALL/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/24/10/intl/ko_ALL/util.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.google.com/maps-api-v3/api/js/24/10/intl/ko_ALL/stats.js"></script>
</head>
<body data-spy="scroll" data-target="nav" class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="dropzone">
                        <form action="/Boarder/img_upload" class="dropzone" drop-zone="" id="file-dropzone"  method="post" enctype="multipart/form-data"></form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</section>

<script type="text/javascript" src="/static/lib/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/static/lib/js/bootstrap.js"></script>
<script type="text/javascript" src="/static/lib/js/plugins.js"></script>
<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="/static/lib/dropzonejs/dropzone.js"></script>
<script>
    jQuery(document).ready(function(){
        $('#file-dropzone').dropzone({
            url: "/Boarder/img_upload",
            maxFilesize: 100,
            paramName: "user_file",
            maxThumbnailFilesize: 5,
            init: function() {

                this.on('success', function(file, json) {
                    opener.tinymce.activeEditor.execCommand("mceInsertContent",'false',이미지경로);
                });

                this.on('addedfile', function(file) {

                });

                this.on('drop', function(file) {
                    alert('file');
                });
            }
        });
    })
</script>

</body>
</html>