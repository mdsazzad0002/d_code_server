<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" href="{{ general_setting('fav_logo') }}"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="white"/>
<meta name="format-detection" content="8801590084779"/>

<meta name="keywords" content="@yield('keywords')"/>
<meta name="author" content="D Engr Web"/>
<meta name="robots" content="index,follow"/>
<meta name="theme-color" content="#343a40"/>





<!--  Essential META Tags -->
<meta property="og:title" content="@yield('title')"/>
<meta property="og:type" content="article" />
<meta property="og:image" content="@yield('og_image')"/>
<meta property="og:url" content="{{ url()->current() }}"/>
<meta name="twitter:card" content="@yield('title')"/>

<!--  Non-Essential, But Recommended -->
<meta property="og:description" content="@yield('short_description')"/>
<meta property="og:site_name" content="D Engr Web - D code"/>
<meta name="twitter:image:alt" content="@yield('title')"/>






