<meta charset="UTF-8">
<meta name="description" content="{{ $_meta_description }}">
<meta name="keywords" content="{{ $_meta_keywords }}">
<meta name="author" content="{{ $_meta_author }}">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<!-- Favicon -->
<link rel="shortcut icon" href="{{ $_favicon ?? asset('favicon.ico') }}" type="image/x-icon">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
<meta name="language" content="{{ $_meta_language }}">
<meta name="geo.country" content="{{ $_meta_geo_country }}">
<meta name="geo.placename" content="{{ $_meta_geo_placename }}">

<title>@yield('title') &mdash; {{ $_app_name }}</title>

<meta property="og:locale" content="{{ $_meta_og_locale }}">
<meta property="og:type" content="{{ $_meta_og_type }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $_meta_og_title }}">
<meta property="og:description" content="{{ $_app_desc }}">
<meta property="og:image" content="{{ is_app_chat() ? ($homeleft = asset('assets/images/aids12.png')) : $_meta_og_image }}">

<meta name="twitter:card" content="{{ $_meta_twitter_card }}">
<meta name="twitter:domain" content="{{ $_meta_twitter_domain ?? domain() }}">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="{{ $_meta_twitter_title }}">
<meta name="twitter:description" content="{{ $_meta_twitter_description }}">
<meta name="twitter:image" content="{{ is_app_chat() ? $homeleft : $_meta_twitter_image }}">

<meta itemprop="url" content="{{ url()->current() }}">
<meta itemprop="headline" content="{{ $_meta_itemprop_headline }}">
<meta itemprop="description" content="{{ $_meta_itemprop_description }}">
<meta itemprop="thumbnailUrl" content="{{ is_app_chat() ? $homeleft : $_meta_itemprop_thumbnailUrl }}">

<meta name="alternate" hreflang="id" href="{{ url('') }}">
