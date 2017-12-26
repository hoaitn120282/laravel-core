body {
color: {{ $css['site_title_color'] }};

    .site-title {
        font-family: {{ $css['site_title_font_size'] }};
    }
}

footer {
    background-color: {{$css['bg-bottom-cl']}};

    & p{
        font-size: $font-size-text-bt;
        text-align: left;
        padding: 15px 0;
    }
}