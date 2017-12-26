// Reset
html {
	font-size: 62.5%;
}

*{
  margin: 0px;padding: 0px;
}

body {
  color:{{ $css['page_color'] }};
  font-family: "{{ $css['page_font_family'] }}",Arial, serif;
  font-size: {{ $css['page_font_size'] }};
  padding: 0px !important;
  margin: 0px !important;
  background-color: #ffffff;
  background-image: url("{{ $css['general_background_image'] }}");
  background-position: bottom right;
  background-repeat: no-repeat;
   background-position: bottom bottom;
  background-size: 100%;
  overflow-x: hidden;
  line-height: 25px;
}
.bg-white{background-color: #ffffff !important;}
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
i{margin-right: 8px;}

.sprites {
  display: inline-block;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  background-repeat: no-repeat;
  vertical-align: middle;
}
.container{max-width: 1200px; }

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

// @font-face
@font-face {
  font-family: 'Lato-Regular';
  src: url('../fonts/Lato-Regular.eot');
  src: url('../fonts/Lato-Regular.woff2') format('woff2'),
       url('../fonts/Lato-Regular.woff') format('woff'),
       url('../fonts/Lato-Regular.ttf') format('truetype'),
       url('../fonts/Lato-Regular.svg#Lato-Regular') format('svg'),
       url('../fonts/Lato-Regular.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'Lato-Bold';
  src: url('../fonts/Lato-Bold.eot');
  src: url('../fonts/Lato-Bold.woff2') format('woff2'),
       url('../fonts/Lato-Bold.woff') format('woff'),
       url('../fonts/Lato-Bold.ttf') format('truetype'),
       url('../fonts/Lato-Bold.svg#Lato-Bold') format('svg'),
       url('../fonts/Lato-Bold.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

@font-face {
  font-family: 'Lato-Italic';
  src: url('../fonts/Lato-Italic.eot');
  src: url('../fonts/Lato-Italic.woff2') format('woff2'),
       url('../fonts/Lato-Italic.woff') format('woff'),
       url('../fonts/Lato-Italic.ttf') format('truetype'),
       url('../fonts/Lato-Italic.svg#Lato-Italic') format('svg'),
       url('../fonts/Lato-Italic.eot?#iefix') format('embedded-opentype');
  font-weight: normal;
  font-style: normal;
}

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

/***** Back to top *****/
#back-to-top{
  display: inline-block;
  height: 40px;
  width: 40px;
  border: 2px solid #ccc;
  border-radius: 50%;
  position: fixed;
  text-align: center;
  bottom: 60px;
  right: 10%;
  transition: all 0.2s ease-out;
  opacity: 0;
  z-index: 999;

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

// Header
.header{
  font-size: {{ $css['header_font_size'] }};
  background-color: #ffffff;

	& .header-contact{
		padding: 7px 0;
		background-color: {{ $css['header_background_color'] }};

		& p, & li{
			color: {{ $css['header_color'] }};
      font-family: "{{ $css['header_font_family'] }}";
		}

		& li{
			margin-left: 20px;
		}
	}

.sologan{
		font-size: {{ $css['slogan_font_size'] }};
		font-family: {{ $css['slogan_font_family'] }};
		color: {{ $css['slogan_color'] }};
		margin-top: 5px;
    vertical-align: middle;
	}

	& .navbar{
		margin: 0;
		padding-top: 15px;
		padding-bottom: 15px;

		& .navbar-brand{
			padding: 10px 15px;
			.site-title{
				font-size: {{ $css['site_title_font_size'] }};
				font-family: {{ $css['site_title_font_family'] }};
				color: {{ $css['site_title_color'] }};
			}
		}

		& .nav-right-custom{
			& li{
				margin-left: 30px;
				& a{
					text-transform: uppercase;
					font-family: {{ $css['menu_font_family'] }};
					font-size: {{ $css['menu_font_size'] }};
					color: {{ $css['menu_color'] }};

					&:focus, &:hover, &.active {
						background: none;
						color: {{ $css['menu_hover_color'] }};
					}
				}
        &.active {
          a {
            background: none;
						color: {{ $css['menu_hover_color'] }};
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

	& .page-banner{
		background-image: url("{{ $css['banner_background_image'] }}");
		background-repeat: no-repeat;
		background-position: center center;
		height: 350px;
		background-size: cover;
		display: table;
		width: 100%;
		& .page-title{
			font-size: {{ $css['banner_title_font_size'] }};
			font-family: {{ $css['banner_title_font_family'] }};
			color: {{ $css['banner_title_color'] }};
			display: table-cell;
			vertical-align: middle;
		}
	}
}

.header-slide{
	position: relative;

	.owl-nav{
		& div{
			opacity: .3;
			-webkit-transition: all .5s ease-in-out;
			-moz-transition: all .5s ease-in-out;
			-ms-transition: all .5s ease-in-out;
			-o-transition: all .5s ease-in-out;
			transition: all .5s ease-in-out;

			&:hover{
				opacity: 1;
			}
		}

		& .disabled{
			display: none ;
		}

		& .owl-prev{
			position: absolute;
			top: 50%;
			left: 30px;
			margin-top: -85px;
		}

		& .owl-next{
			position: absolute;
			top: 50%;
			right: 30px;
			margin-top: -85px;
		}
	}

	.slide-item {
		position: relative;
		& .make-appointment{
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -90px;
			margin-left: -368px;

			& .header-title{
				color: {{ $css['slide_title_color'] }};
				font-size: {{ $css['slide_title_font_size'] }};
				font-family: {{ $css['slide_title_font_family'] }};
				margin-bottom: 10px;
			}

			& .header-sologan{
				font-size: 16px;
				color: #ffffff;
				margin-bottom: 35px;
			}

			& .btn-make-appointment{
				padding: 12px 30px;

				&:hover{
					color: #ffffff;
				}
			}
		}
	}
}

.ss-slide {
	padding: 0;
}
.ss-slide .header-slide {
	position: relative;
}
.ss-slide .header-slide .owl-nav div {
	opacity: .3;
	-webkit-transition: all .5s ease-in-out;
	-moz-transition: all .5s ease-in-out;
	-ms-transition: all .5s ease-in-out;
	-o-transition: all .5s ease-in-out;
	transition: all .5s ease-in-out;
}
.ss-slide .header-slide .owl-nav div:hover {
	opacity: 1;
}
.ss-slide .header-slide .owl-nav .disabled {
	display: none;
}
.ss-slide .header-slide .owl-nav .owl-prev {
	position: absolute;
	top: 50%;
	left: 30px;
	margin-top: -85px;
}
.ss-slide .header-slide .owl-nav .owl-next {
	position: absolute;
	top: 50%;
	right: 30px;
	margin-top: -85px;
}
.ss-slide .header-slide .slide-item {
	position: relative;
}
.ss-slide .header-slide .slide-item .make-appointment {
	position: absolute;
	top: 50%;
	left: 50%;
	margin-top: -90px;
	margin-left: -368px;
}
.ss-slide .header-slide .slide-item .make-appointment .header-title {
	color: {{ $css['slide_title_color'] }};
	font-size: {{ $css['slide_title_font_size'] }};
	font-family: {{ $css['slide_title_font_family'] }};
	margin-bottom: 10px;
}
.ss-slide .header-slide .slide-item .make-appointment .header-sologan {
	font-size: 16px;
	margin-bottom: 35px;
}
.ss-slide .header-slide .slide-item .make-appointment .btn-make-appointment {
	padding: 12px 30px;
}


.btn-make-appointment{
	text-transform: uppercase;
	font-family: "{{ $css['button_font_family'] }}";
	background: {{ $css['button_background_color'] }};
	color: {{ $css['button_color'] }};
	display: inline-block;
	padding: 10px 15px;
	border-radius: 5px;
	border: 1px;
	border-style: solid;
	border-color: {{ $css['button_background_color'] }};
	-webkit-transition: all .5s ease-in-out;
	-moz-transition: all .5s ease-in-out;
	-ms-transition: all .5s ease-in-out;
	-o-transition: all .5s ease-in-out;
	transition: all .5s ease-in-out;

	&:hover{
		border-color: {{ $css['button_background_color'] }};
		background: {{ $css['button_background_color'] }};
		color: {{ $css['button_hover_color'] }};
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


	.header-slide .slide-item .make-appointment .header-title{
		font-size: 40px;
	}
	.header-slide .slide-item .make-appointment{
		width: 100%;
	}
}

@media (max-width: 480px) {
	.header{
		& .header-contact{
			& li{
				display: block;
				padding-left: 0;
			}
		}

		& .list-contact{
			width: 100%;
		}

		.navbar{
			padding-top: 0;
			padding-bottom: 0;

			.navbar-brand{
				padding-top: 15px;
			}
		}

		.header-slide{
			height: 200px;
			.owl-nav {
				.owl-next {
					top: 90%;
					right: 5px;
					max-width: 35px;
				}

				.owl-prev {
					top: 90%;
					left: 5px;
					max-width: 35px;
				}
			}
		}

		.owl-carousel .owl-item{
			height:285px;
			width:100%;

			img{
				height:285px;
				width:100%;
			}
		}

		.slide-item{
			.make-appointment{
				width: 100%;
				left: 0;
				top: 40%;
				margin-left: 0;
				margin-bottom: 0;
				padding: 0 50px;
				.header-title{
					font-size: 20px;
				}
			}
		}
	}
}

// Footer
footer {
  color: {{ $css['footer_color'] }};
  background-color: {{ $css['footer_background_color'] }};
  font-size: {{ $css['footer_font_size'] }};
  font-family: "{{ $css['footer_font_family'] }}";
  position: fixed;
  left:0;
  bottom: 0;
  right: 0;
	z-index: 99;

  & p{
    text-align: left;
    padding: 8px 0;
  }
}

// Sidebar
.sidebar-right{
  border: 1px solid #e1e1e1;
  border-top-color: #b3cdde;
  width: 100%;
  margin-top: 45px;

  .sidebar-title{
    font-size: 20px;
    font-family: "Raleway-Bold";
    text-transform: inherit;
  }


  & h3{
    font-family: "Raleway-Black";
    font-size: 20px;
    text-transform: uppercase;
    padding-left: 20px;
    margin-bottom: 15px;
  }

  & .news-item{
    padding: 0 20px;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out ;
    -ms-transition: all .3s ease-in-out ;
    -o-transition: all .3s ease-in-out ;
    transition: all .3s ease-in-out ;

    &:last-child {
      & .item-detail{
        border: none;
      }
    }

    &:hover{
      background: #fafafa;
    }

    & .item-detail{
      border-bottom: 1px solid #e5e5e5;
      padding: 20px 0px;

      & figure{
        padding-right: 0;
      }

      & .title{
        font-size: 16px;
        font-family: "Raleway-Bold";
        margin-bottom: 5px;
        margin-top: 0;
      }

      & .date{
        font-size: 10px;
        font-family: "Raleway-Italic";
        margin-bottom: 5px;
      }

      & .text{
        color: #a9a9a9;
        font-size: 12px;
        line-height: 15px;
      }
    }
  }

  .make-appointment{
    margin-top: 0px;
    margin-bottom: 20px;

    & header{
      color: {{ $css['header_color'] }};

      & h4{
        margin: 10px 0 10px;
      }

      & p{
        margin-bottom: 10px;
      }

      & .btn-make-appointment{
        padding: 7px 15px;
      }
    }
  }

  .btn-seemore{
    width: 100%;
    text-align: center;
    text-transform: uppercase;
    display: block;
    padding: 10px 0;
    background: #b3cdde;
    color: #ffffff;
    font-family: "Raleway-Black";
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}

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
        background: {{ $css['button_background_hover_color'] }};
        color: {{ $css['button_hover_color'] }};
      }
    }
  }
}

// Home
section{
	padding: 50px 0;
}

.article-title{
	text-align: center;
	position: relative;
	margin: 0;
	color: {{ $css['widget_title_color'] }};
	font-family: {{ $css['widget_title_font_family'] }};
	font-size: {{ $css['widget_title_font_size'] }};
	text-transform: uppercase;
	margin-bottom: 35px;

	& span{
		position: relative;
		padding: 0 30px;
		&::before{
			z-index: 0;
			content: "";
			border: 1px solid #cccccc;
			position: absolute;
			width: 50px;
			top: 15px;
			left: -40px;
		}

		&::after{
			z-index: 0;
			content: "";
			border: 1px solid #cccccc;
			position: absolute;
			width: 50px;
			top: 15px;
			right: -40px;
		}
	}
}

.our-doctors {
  background-color: #ffffff;
	& .article-title{
		margin-bottom: 50px;
	}

	& .doctor-detail{
		margin-bottom: 20px;
		& figure{
			border-radius: 50%;
			overflow: hidden;
			width: 300px;
			height: 300px;
			margin: 0 auto;
			border: 1px solid transparent;

			-webkit-transition: all .5s ease-in-out;
			-moz-transition: all .5s ease-in-out;
			-ms-transition: all .5s ease-in-out;
			-o-transition: all .5s ease-in-out;
			transition: all .5s ease-in-out;

			&:hover{
				border: 1px solid #c3c8d2;

				-webkit-box-shadow: 0px 0px 115px 6px rgba(195,200,210,0.66);
				-moz-box-shadow: 0px 0px 115px 6px rgba(195,200,210,0.66);
				box-shadow: 0px 0px 115px 6px rgba(195,200,210,0.66);
			}
		}

		& h4{
			font-family: "Raleway-Bold";
			font-size: 30px;
		}

		& p{
			font-size: 16px;
			color: #909090;
		}
	}
}

.news {
	padding-bottom: 50px;

	& .btn-make-appointment{
		margin-top: 40px;
	}

	& .new-detail {
		border-radius: 5px;
		overflow: hidden;
		background : #fff;
		margin-bottom: 20px;
		margin-top: 30px;
		border: 1px solid #e1e1e1;
		position: relative;

		& .new-date{
			padding : 15px;
			border-top: 2px solid #b3cdde;
			display: inline-block;
			background: #ffffff;
			position: absolute;
			top: 10px;
			left: 10px;

			& .month{
				font-size: 16px;
			}

			& .date{
				font-size: 25px;
				font-family: "Raleway-Bold";
			}
		}

		-webkit-transition: all .5s ease-in-out;
		-moz-transition: all .5s ease-in-out;
		-ms-transition: all .5s ease-in-out;
		-o-transition: all .5s ease-in-out;
		transition: all .5s ease-in-out;

		&:hover{
			margin-top: 0px;
			-webkit-box-shadow: 0px 15px 23px 8px rgba(225,225,225,0.53);
			-moz-box-shadow: 0px 15px 23px 8px rgba(225,225,225,0.53);
			box-shadow: 0px 15px 23px 8px rgba(225,225,225,0.53);
		}

		& figure {
			overflow: hidden;

		}

		& .new-content {
			padding: 5px 20px 20px 20px;
			border-bottom: 1px solid #e1e1e1;
			background-color: #fff;

			& h3{
				font-size: 25px;
				font-family: "Raleway-Bold";
				margin-top: 20px;
			}

			& i{
				display: block;
				font-family: "Raleway-Italic";
				font-size: 12px;
				margin-bottom: 25px;
			}

			& p{
				color: #909090;
			}
		}

		& .btn-readmore {
			margin: 15px 20px;
			display: inline-block;
			padding: 8px 20px;
			color: #f48100;
			border: 1px solid #f48100;
			font-family: "Raleway-Bold";

			-webkit-transition: all .5s ease-in-out;
			-moz-transition: all .5s ease-in-out;
			-ms-transition: all .5s ease-in-out;
			-o-transition: all .5s ease-in-out;
			transition: all .5s ease-in-out;

			&:hover{
				color: #ffffff;
				background: #f48100;
			}
		}
	}
}

.tips {
	& .tip-detail {
		border-radius: 5px;
		text-align: center;
		padding: 20px;
		border: 1px solid #ccc;
    background-color: #ffffff;

		& .tip-content{
			& h3{
				margin-top: 0;
				font-family: "Raleway-Bold";
				position: relative;
				padding-bottom: 15px;
				margin-bottom: 15px;
				&:after{
					position: absolute;
					bottom: 0;
					left: 50%;
					content: "";
					border-bottom: 1px solid #000;
					width: 50px;
					margin-left: -25px;
				}
			}
		}
	}

	& .tips-slide{
		& .owl-dots{
			text-align: center;
			margin-top: 30px;
			& .owl-dot{
				height: 20px;
				border-radius: 50%;
				display: inline-block;
				margin: 0 5px;
				width: 20px;
				border: 1px solid #1a1a1a;

				&.active{
					border-color: #f48100;
					background: url(../images/icon/icon-dot.png) no-repeat center center;
				}
			}
		}
	}
}

@media (max-width: 769px) {
	.our-doctors{
		.doctor-detail{
			figure{
				max-width: 220px;
				max-height: 220px;
				width: inherit;
				height: inherit;
			}

			h4{
				font-size: 22px;
			}
		}
	}

	.news{
		.new-detail{
			.new-content{
				padding: 10px;

				i{
					margin-bottom: 5px;
					margin-right: 0;
				}
			}

			figure{
				img{
					width: 100%;
				}
			}
		}
	}

	.tips{
		padding-bottom: 0;
		.tip-detail{
			margin-bottom: 20px;
		}
	}
}

@media (max-width: 480px) {
	.header{
		.navbar {
			.navbar-brand {
				padding-left: 0;
			}
		}
	}

	.news{
		.new-detail{

		}
	}


}

// News

.news-page{
  & .new-detail{
    margin-top: inherit;

    &:hover{
      box-shadow: none;
    }

    & .btn-readmore{
      margin: 10px 20px;
    }

    & figure{
      padding:0;
    }

    & .new-content{
      padding-top: 0;
      padding-bottom: 0;

      & i{
        margin-bottom: 0px;
      }

      & p{
        margin-bottom: 10px;
      }
    }
  }
}

.news-page-detail{
  border: 1px solid #e1e1e1;
  border-radius: 5px;
  padding: 18px 22px;
  margin-top: 45px;
  margin-bottom: 90px;

  & .news-text{
    & p{
      margin-bottom: 20px;
      line-height: 25px;
    }

    & figure{
      margin-bottom: 20px;
    }
  }

  & header{
    margin-bottom: 20px;

    & .new-date{
      padding : 15px;
      border-top: 2px solid #b3cdde;
      display: inline-block;
      background: #fafafa;
      display: inline-block;

      & .month{
        font-size: 16px;
      }

      & .date{
        font-size: 25px;
        font-family: "Raleway-Bold";
      }
    }
  }

  & .news-detail-title{
    display: inline-block;
    margin-left: 20px;
    padding-top: 5px;
    & h2{
      font-size: 30px;
      margin: 0;
      font-family: "Raleway-Bold";
      margin-bottom: 5px;
    }

    & p{
      font-size: 12px;
      font-family: "Raleway-Italic";
      color: #a5a5a5;
    }
  }
}

@media (max-width: 769px) {
  .news-page{
    .new-detail{
      .new-content{
        h3{
          margin-top: 10px;
        }
      }
    }
  }
}

@media (max-width: 480px) {
  .news-page-detail {
    .news-detail-title{
      margin-left: 5px;
    }
  }
}

// Site
.site-content{
  padding: 20px 20px 40px;
  border: 1px solid #e1e1e1;
  margin-top: 30px;
  margin-bottom: 190px;

  .ct-detail{
    h3{
      font-size: 20px;
      font-family: "Raleway-Bold";
    }
  }
}

@media (max-width: 480px) {
  .header {
    .page-banner{
      .page-title{
        font-size: 20px;
      }
    }
  }
}

// Tearm
.team-list{
  .team-member{
    padding: 0 10px;
    text-align: center;
    margin-bottom: 40px;
    figure{
      overflow: hidden;
      border-radius: 50%;
      margin: 0 auto;
      height:250px;
      width: 250px;
    }

    header{
      h4{
        font-family: "Raleway-Bold";
        font-size: 25px;
      }

      p{
        font-size: 16px;
        color: #909090;
      }
    }
  }
}

.team-detail{
  border: 1px solid #e1e1e1;
  border-radius: 3px;
  margin: 45px 0;
  padding: 0;

  .member-header{
    padding: 25px 0;
    margin: 0 15px;
    border-bottom: 1px solid #ccc;
    margin-top: 10px;

    figure{
      float: right;
      overflow: hidden;
      border-radius: 50%;
      height:250px;
      width: 250px;
    }

    header{
      padding: 50px 0 0 10px;

      h4 {
        font-size: 30px;
        font-family: "Raleway-Bold";

      }

      p {
        color: #909090;
        margin-bottom: 15px;
      }
    }
  }

  .member-info{
    padding: 15px;
    padding-bottom: 45px;
    h5 {
      font-size: 20px;
      font-family: "Raleway-Bold";
    }
  }
}

@media (max-width: 1024px) {
  .team-list {
    .team-member {
      figure{
        width: inherit;
        height: inherit;
        max-height: 235px;
        max-width: 235px;
      }
    }
  }
}

@media (max-width: 769px) {
  .team-list {
    .team-member {
      figure{
        width: inherit;
        height: inherit;
        max-height: 235px;
        max-width: 235px;
      }
    }
  }

  .sb-team-detail{
    margin-bottom: 60px;
  }
}

@media (max-width: 480px) {
  .team-detail{
    .member-header{
      header{
        text-align: center;
      }
    }
  }
}

// Contact
.contact{
  header {
    text-align: center;
    margin-bottom: 30px;
    h1{
      font-size: 30px;
      font-family: "Raleway-Black";
      margin-top: 0;
    }
    p{
      line-height: 30px;
    }
  }

  .contact-info{

    .detail{
      text-align: center;
      padding: 40px 0px 15px;
      border: 1px solid #e1e1e1;
      border-radius: 3px;
      position: relative;
      height: 150px;

      .type{
        color: #c1c1c1;
        font-size: 20px;
        font-family: "Raleway-Italic";
      }

      .type-dt{
        font-size: 16px;
        line-height: 30px;
        margin-top: 25px;
      }

      .mtop-5{
        margin-top: 5px;
      }

      span{
        display: inline-block;
        width: 120px;
        background: #fff;
        position: absolute;
        top: -20px;
        left: 50%;
        margin-left: -60px;
        i{
          margin-right: 0;
          font-size: 40px;
          color: #f48100;
        }
      }
    }
  }

  .contact-form{
    padding: 40px 0;
    background: #f6f6f6;
    margin-bottom: 60px;
    border-radius: 5px;

    h3{
      font-size: 23px;
      font-family: "Raleway-Bold";
      margin-top: 0;
    }

    p{
      font-size: 13px;
      margin-bottom: 40px;
    }

    form{
      text-align: left;

      button{
        width: 100%;
        margin-top: 15px;
      }
    }
  }
}

.contact-map{
  margin-bottom: 100px;
}

@media (max-width: 769px) {
  .contact {
    header {
      p{
        font-size: 12px;
      }
    }
    .contact-info {
      .detail{
        margin-bottom: 40px;
      }
    }
  }

  .form-contact{
    .container-ct-f {
      margin: 0;
      padding: 0;
      width: 100%;

      .contact-form{
        padding: 40px 15px;
      }
    }
  }
}

/***Update***/
.header-slide .slide-item .make-appointment{
max-width: 730px;
}

.our-doctors .doctor-detail figure img{
height: 100%;
width: 100%;
}

.news .new-detail figure{
height: 245px;
}

.news .new-detail figure img{
height: 100%;
width: 100%;
}

@media (min-width: 1024px) {


.header-slide .slide-item figure{
height: 525px;
overflow: hidden;
}
}

.header-slide .slide-item .make-appointment{
margin-top: inherit !important;
margin-left: inherit !important;
transform: translateX(-50%) translateY(-50%);
}
/***Update***/

.our-doctors .doctor-detail figure, .news .new-detail figure{
  position: relative;
}


.our-doctors .doctor-detail figure img, .news .new-detail figure img{
  height: inherit !important;
  width: inherit !important;
  position: absolute;
  top: 50%;
  left: 50%;
      max-height: 100%;
  transform: translateX(-50%) translateY(-50%);
}
