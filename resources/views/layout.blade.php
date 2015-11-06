<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Mendoan milik masyarakat Banyumas. Milik kita semua. Bukan milik perseorangan. Luangkan waktumu untuk bergabung untuk dukung petisi ini.">
        <meta name="author" content="">
        <!-- S:OG -->
        <meta content="article" property="og:type" />
        <meta content="#MendoanInyong" property="og:site_name" />
        <meta content="#MendoanInyong" property="og:title" />
        <meta content="{{url()}}" property="og:url" />
        <meta content="1581350762134293" property="fb:app_id" />
        <meta property="og:image" content="{{url('assets/img/mendoan.jpg')}}"/>
        <meta content="Mendoan milik masyarakat Banyumas. Milik kita semua. Bukan milik perseorangan. Luangkan waktumu untuk bergabung untuk dukung petisi ini." property="og:description" />
        <!-- E:OG -->

        <title>#MendoanInyong</title>

        <!-- Bootstrap core CSS -->
        <link href="//cdn-ck.gedrix.net/assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//assets.gedrix.net/gedrixcom/font-awesome/css/font-awesome.min.css" type="text/css">
        <link href="{{url('assets/css/style.css')}}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="//cdn-ck.gedrix.net/assets/js/jquery.js"></script>
        <script src="//cdn-ck.gedrix.net/assets/js/bootstrap.min.js"></script>
        @yield('js')
        <script type= 'text/javascript'>
            $('#twShare,#fbShare').click(function(event) {
                var width  = 575,
                    height = 400,
                    left   = ($(window).width()  - width)  / 2,
                    top    = ($(window).height() - height) / 2,
                    url    = this.href,
                    opts   = 'status=1' +
                             ',width='  + width  +
                             ',height=' + height +
                             ',top='    + top    +
                             ',left='   + left;

                window.open(url, 'twitter', opts);

                return false;
            });
        </script>
    </body>
</html>
