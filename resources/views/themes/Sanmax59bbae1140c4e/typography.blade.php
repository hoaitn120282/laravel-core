// Clearfix
@mixin clearfix() {
  &:before,
  &:after {
    content: " "; // 1
    display: table; // 2
  }
  &:after {
    clear: both;
  }
}

.clear-fix {
  clear: both;
}

// font-face
@font-face {
  font-family: 'Raleway-Bold';
  src: url('../fonts/Raleway-Bold.eot');
  src: url('../fonts/Raleway-Bold.woff2') format('woff2'),
       url('../fonts/Raleway-Bold.woff') format('woff'),
       url('../fonts/Raleway-Bold.ttf') format('truetype'),
       url('../fonts/Raleway-Bold.svg#Raleway-Bold') format('svg'),
       url('../fonts/Raleway-Bold.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'Raleway-Medium';
  src: url('../fonts/Raleway-Medium.eot');
  src: url('../fonts/Raleway-Medium.woff2') format('woff2'),
       url('../fonts/Raleway-Medium.woff') format('woff'),
       url('../fonts/Raleway-Medium.ttf') format('truetype'),
       url('../fonts/Raleway-Medium.svg#Raleway-Medium') format('svg'),
       url('../fonts/Raleway-Medium.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'Raleway-Black';
  src: url('../fonts/Raleway-Black.eot');
  src: url('../fonts/Raleway-Black.woff2') format('woff2'),
       url('../fonts/Raleway-Black.woff') format('woff'),
       url('../fonts/Raleway-Black.ttf') format('truetype'),
       url('../fonts/Raleway-Black.svg#Raleway-Black') format('svg'),
       url('../fonts/Raleway-Black.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'Raleway-Italic';
  src: url('../fonts/Raleway-Italic.eot');
  src: url('../fonts/Raleway-Italic.woff2') format('woff2'),
       url('../fonts/Raleway-Italic.woff') format('woff'),
       url('../fonts/Raleway-Italic.ttf') format('truetype'),
       url('../fonts/Raleway-Italic.svg#Raleway-Italic') format('svg'),
       url('../fonts/Raleway-Italic.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

// body
html {
	font-size: 62.5%;
}

*{
  margin: 0px;padding: 0px;
}

body {
  color: {{ $css['page_color'] }};
  font-family: "{{ $css['page_font_family'] }}",Arial, serif; 
  font-size: {{ $css['page_font_size'] }};
  padding: 0px !important;
  margin: 0px !important;
  background-color: #ffffff;
  background-image: url("{{ $css['general_background_image'] }}");
  background-repeat: no-repeat;
  background-position: center bottom;
  background-size: 100%;
  overflow-x: hidden;
  line-height: 25px;
  position: relative;
}
p{margin:0;}
a{cursor: pointer}
ul, ol{margin-bottom: 0px;}
a, 
a:focus,
a:hover, 
button, 
button:active, 
button:hover, 
button:focus{outline: 0px !important;text-decoration: none;}
a{ color:#000000;}
a:hover{text-decoration: none;}
img{max-width: 100%}
strong{font-family:'Lato-Bold',  Arial, serif; font-weight: 400;}
section{position: relative;}
i{margin-right: 5px}

.bg-white {
	background-color: #ffffff!important;
}

.sprites {
  display: inline-block;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  background-repeat: no-repeat;
  vertical-align: middle;
}
.container{max-width: 1200px; }


/***** Back to top *****/
#back-to-top{
	display: inline-block;
    height: 40px;
    width: 40px;
    border: 2px solid #ccc;
    border-radius: 50%;
    position: fixed;
    text-align: center;
	z-index: 999;
    bottom: 30px;
    right: 10%;
    transition: all 0.2s ease-out;
    opacity: 0;

    &:hover{
	     border: 2px solid #ddd;
    }

    & i{
    	margin: 0;
	    font-size: 32px;
	    color: #ccc;
    }

    &.show {
	    opacity: 1;
	}
}

@media (max-width: 769px) {
	#back-to-top{
		bottom: 15px;
		right: 15px;
	}
}

// Footer
footer {
	background-color: {{ $css['footer_background_color'] }};
	font-family: "{{ $css['footer_font_family'] }}";
	font-size: {{ $css['footer_font_size'] }};

	& p{
		color: {{ $css['footer_color'] }};
		text-align: left;
		padding: 15px 0;
	}
}

// header
.header{
	margin-bottom: 50px;
	background-color: #ffffff;

	& .header-contact{
		padding: 7px 0;
		background-color: {{ $css['header_background_color'] }};
		font-family: {{ $css['header_font_family'] }};
		font-size: {{ $css['header_font_size'] }};
		& p, & li{
		color: {{ $css['header_color'] }};
		}

		& li{
			margin-left: 20px;
		}
	}
	
	img.logo{
        max-width: 85px;
        max-height: 50px;
    }

	.sologan{
		font-size: {{ $css['slogan_font_size'] }};
		font-family: "{{ $css['slogan_font_family'] }}";
		color: {{ $css['slogan_color'] }};
		margin-top: 5px;
		vertical-align: middle;
	}

	.slide-item{
		background: url(../images/banner.jpg) no-repeat center center;
		height: 350px;
		background-size: cover;
	}

	& .navbar{
		margin: 0;
		padding-top: 15px;
		padding-bottom: 15px;

		& .navbar-brand{
			padding: 10px 15px;
			.site-title{
				font-size: {{ $css['site_title_font_size'] }};
				font-family: "{{ $css['site_title_font_family'] }}";
				color: {{ $css['site_title_color'] }};
			}
		}

		& .nav-right-custom{
			& li{
				margin-left: 30px;
				& a{
					text-transform: uppercase;
					font-family: "{{ $css['link_font_family'] }}";
					font-size: {{ $css['link_font_size'] }};
					color:{{ $css['link_color'] }};

					&:focus, &:hover, &.active {
						background: none;
						color: {{ $css['link_hover_color'] }};
					}
				}
			}

			& .language-select{
				& i{
					margin-left: 10px;
				}

				&>a{
					padding-left: 0;
				}
				& a{
					font-size: 14px;
					font-family: "Raleway-Medium";
					text-transform: inherit;
				}

				& ul{
					left: 0;
					right: auto;
					margin-top: 15px;
					border: none;
					border-radius: 0;

					& li{
						margin:15px 0 15px 0;
						text-align: left;
					}
				}
			}
			
		}
	}

	.nav .open>a, .nav .open>a:focus, .nav .open>a:hover{
		background: transparent;
	}
}


@media (max-width: 769px) {
	.navbar-header {
    	float: none;
	}
	.navbar-left,.navbar-right {
	    float: none !important;
	}
	.navbar-toggle {
	   display: block;
	   margin-right: 0;
 	}
 	.navbar-collapse {
	    border-top: 1px solid transparent;
	    box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
	}
	.navbar-fixed-top {
	    top: 0;
	    border-width: 0 0 1px;
	}
 	.navbar-collapse.collapse {
     	display: none!important;
	}
	.navbar-nav {
	    float: none!important;
	    margin-top: 7.5px;
	}
	.navbar-nav>li {
	    float: none;
	}
	.navbar-nav>li>a {
	    padding-top: 10px;
	    padding-bottom: 10px;
	}
	.collapse.in{
	    display:block !important;
	}
		
	.navbar{
		& .icon-bar{
		  	background-color: #222222;
		  	height: 3px;
		  	width: 30px;
		}		
	}

	.header{
		& .header-contact{
			& p, & li{
				font-size: 12px;
			}

			& li{
				margin-left: 0px;
			}
		}

		
		& .navbar{
			 & .nav-right-custom{
			 	li {
					text-align: center;
					margin: 30px 0;		
				 }
			}
		}

		& .language-select{
			&>a{
				display: inline-block;
			}

			&>ul{
				display: inline-block;
			}
		}
	}
}

@media (max-width: 480px) {
	.header{
		& .header-contact{
			& li{
				display: block;
			}
		}

		& .list-contact{
			width: 100%;
		}
	}
}


/***** Sidebar Right *****/
.sidebar-right {
	border: 1px solid #e1e1e1;
	border-top: 2px solid #c2c7d1;
	text-align: center;
	padding-bottom: 40px;
	background-color: #ffffff;

	& .make-appointment{
		text-align: center;
		margin-top: 35px;

		& figure{
			height: 150px;
			width: 150px;
			overflow: hidden;
			border-radius: 50%;
			margin: 0 auto;
			& img{
			}
		}

		& header{
			& h4{
				font-size: 20px;
				font-family: "Raleway-Bold";
				margin: 15px 0 10px;
			}

			& p{
				color: #909090;
				margin-bottom: 15px;
			}
			
			& .btn-make-appointment{
				text-transform: uppercase;
				font-family: "{{ $css['button_font_family'] }}";
				background: {{ $css['button_background_color'] }};
				color: {{ $css['button_color'] }};
				font-size: {{ $css['button_font_size'] }};
				padding: 10px 15px;
				border-radius: 5px;
				border: 1px;
				border-style: solid;
				border-color: {{ $css['button_background_hover_color'] }};
				-webkit-transition: all .5s ease-in-out;
				   -moz-transition: all .5s ease-in-out;
				    -ms-transition: all .5s ease-in-out;
				     -o-transition: all .5s ease-in-out;
				        transition: all .5s ease-in-out;

				&:hover{
					border-color: {{ $css['button_background_color'] }};
					background: transparent;
					color: {{ $css['button_hover_color'] }};
				}
			}
		}
	}
}


// Contact
.content{
	& .content-contact{
		border: none;
		padding: 0;

		& .ct-detail{
			& h3{
				font-size: 30px;
				font-family: #222222;
				margin-top: 0;
			}

			& p{
				margin-bottom: 30px;
			}

			& .contact-info{
				margin-bottom: 30px;
				& li{
					font-size: 16px;
					color: #222222;
					font-family: "Raleway-Bold";
					margin: 10px 0;

					& span{
						color: #909090;
						font-family: "Raleway-Italic";
						width: 170px;
						font-size: 16px;
						display: inline-block;
					}
				}
			}

			& .contact-map{
				max-height: 540px;
				width: 100%;
			}
		}
	}
}

// Home
.content{
	margin-bottom: 40px;

	& .content-dt{
		border: 1px solid #e1e1e1;
		padding: 30px;
		border-radius: 3px;
		background-color: #ffffff;

		& .gallery{
			& img{
			}
		}
	}

	& .ct-detail{
		& h3 {
			font-family: "Raleway-Bold";
			font-size: 20px;
			margin-bottom: 20px;
		}
	}
}

@media (max-width: 769px) {
	.content-dt{
		margin-bottom: 20px;
	}
}

// Info
.content-info{
	& .ct-detail{
		& h3{
			margin-bottom: 20px;
		}
	}
}

// Light slider
.lightSlider{
 height: auto !important;
}

.lightSlider li{
    display: block;
    overflow: hidden;
    text-align: center;
    vertical-align: middle;
  }

  .lSSlideOuter .lSPager.lSGallery li{
    max-width: 153px; 
    max-height: 103px;
    overflow: hidden;
    text-align: center;
  }

  .lSSlideOuter .lSPager.lSGallery li a{
    display: inline-block;
  }

  .menu-item-has-children{
  position: relative;
}

.menu-item-has-children-hover>.sub-menu {
  display: block !important;
  padding-top: 20px;
}

.menu-item-has-children .caret{
  display: none;
}

.menu-item-has-children .sub-menu {
  list-style: none;
  position: absolute;
  width: 150px;
  text-align: left;
  padding-left: 15px;
  background-color: #ffffff;
  display: none;
}

.sub-menu li{
  margin-left: 0 !important;
}

.sub-menu .menu-item-has-children .sub-menu{
  left: 100%;
  padding-top: 0;
  top: 0;
}
.content-info .ct-detail h3 {
  margin-bottom: 20px; }

@media (max-width: 769px) {
  .list-contact{float: left!important}
}

.logo-box{
  max-height: 25px;
  max-width: 85px;
  overflow: hidden;
  display: inline-block;
  vertical-align: middle;
}

footer{
  position: fixed;
  left:0;
  bottom: 0;
  right: 0;
}
@media (min-width: 1024px) {
  .lightSlider li{
    width: 100%;
    height: 540px ;
  }
}
.lightSlider li{
  position: relative;
  background: rgba(0, 0, 0, .5);
}

.lightSlider li img{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%) ;
}

// Custom CSS
{{ $css['custom'] or null }}