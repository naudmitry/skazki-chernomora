/*
* Title:   Miracle | Responsive Multi-Purpose HTML5 Template - Main Style file
* Author:  http://themeforest.net/user/soaptheme
*/
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[Table of contents]

1. Base Styles
1.1. Reset
1.2. Layout
2. Global Styles
2.1. General Styles
2.2. Form Elements
2.3. Buttons
2.4. Message box
2.5. Table
2.6. Design Elements
2.7. Toggle & Accordion
2.8. Blog Posts
2.9. Sticky Notes
2.10. Social Icons
2.11. Callout Box
3. Header
3.1. Main Header
3.2. Slideshow
3.3. Page Title Container
3.4. Main Menu
3.5. Mobile Menu
4. Main Content
4.1. Galleries
4.2. Icon Box
4.3. Banner
4.4. Process Builder
4.5. Post Slider
4.6. Pricing table
4.7. Progress Bar
4.8. Style Changer
4.9. Tab
4.10. Team
4.11. Testimonial
5. Footer
6. Page Content
6.1. Standard Pages
6.2. Portfolio Pages
6.3. Blog Pages
6.4. Homepage
6.5. WooCommerce Pages

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*
* Title:   Miracle | Responsive Multi-Purpose HTML5 Template - SCSS Mixin
* Author:  http://themeforest.net/user/soaptheme
*/
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[Table of contents]

1) BORDER RADIUS
2) OPACITY
3) BACKGROUND GRADIENT
4) BOX SHADOW
5) TEXT SHADOW
6) TRANSITION
7) ANIMATION
8) TRANSFORM
9) DESATURATE
10) RETINA
11) GRADIENT IMAGE

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 1) BORDER RADIUS */
/* 2) OPACITY */
/* 3) BACKGROUND GRADIENT */
/* 4) BOX SHADOW */
/* 5) TEXT SHADOW */
/* 6) TRANSITION */
/* 7) ANIMATION */
/* 8) TRANSFORM */
/* 9) DESATURATE */
/* 10) RETINA */
/* 11) GRADIENT IMAGE */
/* 1. Base Styles ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 1.1. Reset ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*
* Title:   Miracle | Responsive Multi-Purpose HTML5 Template - Basic Style
* Author:  http://themeforest.net/user/soaptheme
*/
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[Table of contents]

1) Reset
2) Heading
3) Lists
4) Contents
5) Table
6) HTML5 & CSS3 Styles for older browsers
7) Tools
8) Color

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*
* Title:   Miracle | Responsive Multi-Purpose HTML5 Template - SCSS Variables for style customization
* Author:  http://themeforest.net/user/soaptheme
*/
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[Table of contents]

1. Global
2. Skin colors
3. Skin logos
4. Important colors
5. Skin 1
6. Skin 2
7. Skin 3
8. Skin 4
9. Skin 5
10. Skin 6
11. Skin 7
12. Skin 8
13. Skin 9
14. Skin 10

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 1. Global */
/* 2. Theme skin colors */
/* 3. Skin logos */
/* 4. Important colors */
/* 5. Skin 1(Orange) */
/* 6. Skin 2(Green) */
/*$theme-skin-logo: $theme-skin2-logo;
$theme-skin-color: $theme-skin-green;
$theme-skin-light-bgcolor: #a2d13a;
$theme-skin-light-fontcolor: #d8eaaf;*/
/* 7. Skin 3(Purple) */
/*$theme-skin-logo: $theme-skin3-logo;
$theme-skin-color: $theme-skin-purple;
$theme-skin-light-bgcolor: #bd50d7;
$theme-skin-light-fontcolor: #f1c5fb;*/
/* 8. Skin 4(Blue) */
/*$theme-skin-logo: $theme-skin4-logo;
$theme-skin-color: $theme-skin-blue;
$theme-skin-light-bgcolor: #1aabf0;
$theme-skin-light-fontcolor: #c8e9f9;*/
/* 9. Skin 5(Yellow) */
/*$theme-skin-logo: $theme-skin5-logo;
$theme-skin-color: $theme-skin-yellow;
$theme-skin-light-bgcolor: #ffb61a;
$theme-skin-light-fontcolor: #f0deb8;*/
/* 10. Skin 6(Gray) */
/*$theme-skin-logo: $theme-skin6-logo;
$theme-skin-color: $theme-skin-gray;
$theme-skin-light-bgcolor: #b4b4b4;
$theme-skin-light-fontcolor: #d9d9d9;*/
/* 11. Skin 7(Navy) */
/*$theme-skin-logo: $theme-skin7-logo;
$theme-skin-color: $theme-skin-navy;
$theme-skin-light-bgcolor: #1a7bff;
$theme-skin-light-fontcolor: #c9dcf7;*/
/* 12. Skin(Sea) 8 */
/*$theme-skin-logo: $theme-skin8-logo;
$theme-skin-color: $theme-skin-sea;
$theme-skin-light-bgcolor: #23bda1;
$theme-skin-light-fontcolor: #cef2eb;*/
/* 13. Skin 9(Red) */
/*$theme-skin-logo: $theme-skin9-logo;
$theme-skin-color: $theme-skin-red;
$theme-skin-light-bgcolor: #ff3030;
$theme-skin-light-fontcolor: #eec8c8;*/
/* 14. Skin 10(Gold) */
/*$theme-skin-logo: $theme-skin10-logo;
$theme-skin-color: $theme-skin-gold;
$theme-skin-light-bgcolor: #ddc541;
$theme-skin-light-fontcolor: #eee9cb;*/
/* 1) Reset */
* {
box-sizing: border-box;
-moz-box-sizing: border-box;
/* Firefox */
margin: 0;
padding: 0;
-webkit-tap-highlight-color: transparent;
zoom: 1;
}

html {
font-size: 16px;
min-height: 100%;
overflow-x: hidden !important;
}

body {
font: 75%/150% "Open Sans", Arial, Helvetica, sans-serif;
background-color: #fff;
color: #939faa;
overflow-x: hidden !important;
-webkit-font-smoothing: antialiased;
-ms-overflow-style: scrollbar;
/*oveflow-y: scroll;*/
}

iframe, img {
border: 0;
}

img {
border-style: none;
height: auto;
max-width: 100%;
vertical-align: top;
}

a {
text-decoration: none;
color: inherit;
}

a:hover, a:focus {
text-decoration: none;
color: {{ $color }};
}

a:focus {
outline: none;
}

p {
font-size: 1.0833em;
line-height: 1.8;
margin-bottom: 15px;
}

.text {
font-size: 1.0833em;
margin-bottom: 15px;
}

.text p {
font-size: 1em;
}

.text > *:last-child {
margin-bottom: 0;
}

dt {
font-weight: normal;
}

/* 2) Heading */
h1, h2, h3, h4, h5, h6 {
margin: 0 0 20px;
font-weight: 300;
color: #1b4268;
}

h4, h5, h6 {
font-weight: 400;
}

h5, h6 {
margin-bottom: 10px;
}

h1 {
font-size: 2.5em;
line-height: 1.25em;
}

h2 {
font-size: 2em;
line-height: 1.25em;
}

h3 {
font-size: 1.6667em;
line-height: 1.2222em;
}

h4 {
font-size: 1.3333em;
line-height: 1.25em;
}

h5 {
font-size: 1.1666em;
line-height: 1.1428em;
}

h6 {
font-size: 1.0833em;
}

/* 3) Lists */
ol, ul {
list-style: none;
margin: 0;
}

/* 4) Contents */
blockquote, q {
quotes: none;
}

blockquote:before, blockquote:after, q:before, q:after {
content: '';
content: none;
}

hr {
margin-top: 20px;
margin-bottom: 20px;
border-color: {{ $color }};
}

small {
font-size: 0.8333em;
}

/* 5) Table */
table {
border-collapse: collapse;
border-spacing: 0;
}

/* 6) HTML5 & CSS3 Styles for older browsers */
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
display: block;
}

/* 7) Tools */
.clearer {
clear: both !important;
padding: 0 !important;
margin: 0 !important;
}

.hidden {
display: block !important;
border: 0 !important;
margin: 0 !important;
padding: 0 !important;
font-size: 0 !important;
line-height: 0 !important;
width: 0 !important;
height: 0 !important;
overflow: hidden !important;
}

.nobr {
white-space: nowrap !important;
}

.wrap {
white-space: normal !important;
}

.no-display {
display: none;
}

.no-float {
float: none !important;
}

.no-margin {
margin: 0 !important;
}

.no-bmargin {
margin-bottom: 0 !important;
}

.no-padding {
padding: 0 !important;
}

.no-lpadding {
padding-left: 0 !important;
}

.no-rpadding {
padding-right: 0 !important;
}

.no-border {
border: none !important;
}

.no-bg {
background: none !important;
}

.full-width {
width: 100% !important;
}

.width-auto {
width: auto !important;
}

img.full-width {
height: auto;
}

.uppercase {
text-transform: uppercase;
}

.fourty-space {
letter-spacing: .04em !important;
}

.underline {
text-decoration: underline !important;
}

.inline-block {
display: inline-block !important;
}

.visible-sms {
display: none;
}

.no-letter-spacing {
letter-spacing: normal !important;
}

.font-light {
font-weight: 300 !important;
}

.font-normal {
font-weight: 400 !important;
}

.fontsize-lg {
font-size: 1.3333em;
line-height: 1.5;
}

p.fontsize-lg {
line-height: 1.8;
}

.overflow-hidden {
overflow: hidden;
}

.full-height {
height: 100%;
}

/* 8) Color */
.skin-color {
color: {{ $color }} !important;
}

.skin-bg {
background-color: {{ $color }} !important;
}

.skin-bg-alpha {
background-color: {{ $opaqueRgba }} !important;
}

.color-blue {
color: #1b4268 !important;
}

.color-light-blue {
color: #455b79 !important;
}

.color-white {
color: #fff !important;
}

.hover-color-skin:hover {
color: {{ $color }} !important;
}

.hover-color-blue:hover {
color: #1b4268 !important;
}

.custom-font1, .banner-slider .banner-text .banner-title, .post-slider.style1 .banner-text .banner-title, .post-slider.style5 .banner-text .banner-title, .brand-slider .banner-text .banner-title, .image-banner .caption-wrapper.position-left .captions, .image-banner .caption-wrapper.position-right .captions, .image-banner .caption-wrapper.position-middle .captions, .pricing-table .currency-symbol, .counters-box.style2 dt, .testimonial.style1 .testimonial-content, .brand-section .caption-wrapper.style2 .caption, .brand-section .caption-wrapper.style3 .caption, .brand-section.style1 .caption-wrapper .caption, .brand-section.style2 .caption-wrapper .caption {
font-family: Playfair Display;
}

.custom-font2, .page-title-container .banner .caption .caption-lg, .page-title-container.style6 .caption .caption-xl, .brand-section .caption-wrapper .caption {
font-family: Open Sans Condensed;
}

.custom-font3, .post-slider.style4 .caption.size-lg, .parallax .caption.size-lg, #header .logo, #nav > ul > li > a, .mobile-nav, .error404 .error-message-404 span, .coming-soon-page .error-message-404 span, .blank-page .error-message-404 span, .coming-soon-page .clock, .page-loading-wrapper header .logo {
font-family: Roboto;
}

/* 1.2. Layout ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
#page-wrapper {
overflow: hidden;
position: relative;
z-index: 0;
}

.box-sm {
margin-bottom: 20px;
}

.box-md, .box {
margin-bottom: 30px;
}

.box-lg {
margin-bottom: 40px;
}

.box-xl, .block {
margin-bottom: 60px;
}

article {
margin-bottom: 30px;
}

.block:after {
content: "";
display: table;
clear: both;
}

#content {
padding: 70px 0 0;
min-height: 300px;
}

#content > .container > .section:first-child, #content #main > .section:first-child, #content > .section:first-child {
padding-top: 0;
}

#main > .section:first-child {
padding-top: 0;
}

.sidebar {
margin-bottom: 60px;
}

.section {
padding: 80px 0 70px;
}

.section.has-border {
border-bottom: 1px solid #edf6ff;
}

.section:last-child {
border-bottom: none;
}

/* 2. Global Styles ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 2.1. General Styles ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.title {
font-weight: normal;
}

.center-block {
float: none;
}

.highlight {
background: {{ $color }};
color: #fff;
padding: 2px 8px;
}

hr.dotted {
border-style: dotted;
}

hr.thick {
border-width: 2px;
}

hr.color-heading {
border-color: #1b4268;
}

hr.color-text {
border-color: #939faa;
}

hr.color-light {
border-color: #d4dde5;
}

hr.color-light1 {
border-color: #edf6ff;
}

hr[class^="col-"], hr[class*=" col-"] {
float: none;
padding: 0;
}

.description > *:last-child {
margin-bottom: 0;
}

.section-info {
padding: 50px 0;
position: relative;
}

.section-info-line {
border-top: 1px solid #d4dde5;
}

.section-info .section-title {
display: inline-block;
line-height: 1em;
margin-top: -0.6em;
padding-right: 20px;
position: absolute;
top: 0;
left: 0;
background: #fff;
font-weight: 300;
}

.fa.has-circle {
display: inline-block;
border: 1px solid {{ $color }};
width: 2.2em;
height: 2.2em;
line-height: 2.16em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
}

.hide-children > *:not(.active) {
display: none;
}

/* Unordered List */
ul.arrow-circle li, ul.arrow li, ul.star li, ul.decimal-zero li, ul.disc li {
margin-bottom: 12px;
line-height: 20px;
}

ul.arrow-circle li:before, ul.arrow li:before, ul.star li:before, ul.decimal-zero li:before, ul.disc li:before {
content: "";
display: inline-block;
margin-right: 15px;
font-family: FontAwesome;
}

ul.arrow-circle.size-small, ul.arrow.size-small, ul.star.size-small, ul.decimal-zero.size-small, ul.disc.size-small {
font-size: 1em;
}

ul.arrow-circle.size-small li, ul.arrow.size-small li, ul.star.size-small li, ul.decimal-zero.size-small li, ul.disc.size-small li {
margin-bottom: 10px;
}

ul.arrow-circle.size-medium, ul.arrow.size-medium, ul.star.size-medium, ul.decimal-zero.size-medium, ul.disc.size-medium {
font-size: 1.0833em;
}

ul.arrow-circle.size-medium li, ul.arrow.size-medium li, ul.star.size-medium li, ul.decimal-zero.size-medium li, ul.disc.size-medium li {
margin-bottom: 20px;
}

ul.arrow li:before, ul.arrow-circle li:before {
content: "\f105";
}

ul.arrow li.active:before, ul.arrow-circle li.active:before {
color: {{ $color }};
}

ul.arrow li:before {
margin-right: 10px;
}

ul.arrow-circle li {
position: relative;
padding-left: 34px;
}

ul.arrow-circle li:before {
font-size: 0.8333em;
width: 22px;
height: 22px;
line-height: 20px;
text-align: center;
/*line-height: 1.75em;*/
color: #d4dde5;
border: 1px solid;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
position: absolute;
left: 0;
top: 50%;
margin-top: -10px;
text-indent: 1px;
}

ul.arrow-circle li.active:before {
color: #fff;
background: {{ $color }};
border-color: {{ $color }};
}

ul.arrow-circle.hover-effect li:hover {
color: {{ $color }};
}

ul.arrow-circle.hover-effect li:hover:before {
color: #fff;
background: {{ $color }};
border-color: {{ $color }};
}

ul.star li:before {
content: "\f005";
}

ul.decimal-zero {
counter-reset: item;
}

ul.decimal-zero > li:before {
content: counter(item);
counter-increment: item;
color: {{ $color }};
}

ul.decimal-zero > li:nth-child(-n+9)::before {
/* 1 - 9 */
content: "0" counter(item);
/* becomes 01 - 09 */
}

ul.disc li:before {
width: 0.5em;
height: 0.5em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: {{ $color }};
}

ul.decimal {
counter-reset: index;
}

ul.decimal > li::before {
content: counter(index) ".";
counter-increment: index;
color: {{ $color }};
margin-right: 12px;
font-weight: bold;
}

ul.lower-alpha {
list-style: lower-alpha inside;
}

/* bullet text */
ul.bullet-text {
font-size: 1.0833em;
}

ul.bullet-text li {
line-height: 1.8em;
margin-bottom: 5px;
}

ul.bullet-text.paragraph li {
margin-bottom: 15px;
}

.dropcap {
float: left;
color: #fff;
background: {{ $color }};
margin-right: 15px;
margin-top: 5px;
font-weight: 600;
margin-bottom: 5px;
text-align: center;
}

.dropcap.style1 {
font-size: 3.3333em;
-webkit-border-radius: 0 0 50px 50px;
-moz-border-radius: 0 0 50px 50px;
-ms-border-radius: 0 0 50px 50px;
border-radius: 0 0 50px 50px;
width: 1.2em;
height: 1.5em;
line-height: 1.4em;
}

.dropcap.style2 {
font-size: 2.5em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-transform: uppercase;
width: 1.6em;
height: 1.6em;
line-height: 1.6em;
}

q, blockquote {
quotes: '\201C' '\201D' '\2018' '\2019';
}

blockquote {
font-size: 1em;
border: none;
padding: 20px 30px 25px 55px;
position: relative;
/*&:after { content: close-quote; margin-left: 3px; }*/
}

blockquote:before, blockquote:after {
font-family: FontAwesome;
font-size: 2.5em;
vertical-align: middle;
}

blockquote:before {
content: "\f10d";
margin-right: 4px;
position: absolute;
top: 30px;
left: 16px;
}

blockquote p {
font-size: 1.5em;
}

blockquote.style1 {
background: #edf6ff;
color: #1b4268;
}

blockquote.style1:before {
color: #fff;
}

blockquote.style1 p {
margin-bottom: 30px;
}

blockquote.style1 > .name {
font-size: 1.3333em;
color: #939faa;
margin-bottom: 0;
}

blockquote.style2, blockquote.style3 {
font-weight: 300;
border: 1px solid #edf6ff;
padding-top: 30px;
padding-bottom: 30px;
padding-left: 65px;
}

blockquote.style2:before, blockquote.style3:before {
color: #edf6ff;
top: 40px;
left: 26px;
}

blockquote.style2 p, blockquote.style3 p {
font-size: 1.3333em;
}

blockquote.style2:after {
border-right: 21px solid transparent;
border-top: 21px solid #edf6ff;
content: "";
position: absolute;
bottom: -1px;
right: -1px;
background: #fff;
}

blockquote.style3 {
border-top: 2px solid {{ $color }};
}

blockquote.style3:after {
content: "";
border-top: 3px solid {{ $color }};
border-left: 5px solid transparent;
border-right: 5px solid transparent;
position: absolute;
top: 0;
left: 50%;
margin-left: -3px;
}

.tags .tag {
display: inline-block;
font-size: 0.8333em;
text-transform: uppercase;
padding: 0 10px;
line-height: 2.5em;
border: 1px solid #d4dde5;
-webkit-border-radius: 1.5em 1.5em 1.5em 1.5em;
-moz-border-radius: 1.5em 1.5em 1.5em 1.5em;
-ms-border-radius: 1.5em 1.5em 1.5em 1.5em;
border-radius: 1.5em 1.5em 1.5em 1.5em;
margin-bottom: 10px;
margin-right: 4px;
-moz-transition: all 0.3s ease 0s;
-o-transition: all 0.3s ease 0s;
-webkit-transition: all 0.3s ease 0s;
-ms-transition: all 0.3s ease 0s;
transition: all 0.3s ease 0s;
}

.tags .tag:hover {
color: #fff;
background: {{ $color }};
border-color: {{ $color }};
}

/* image hover effect */
.image {
overflow: hidden;
z-index: 1;
position: relative;
display: block;
}

.image img {
-moz-transition: all 0.4s ease-out 0s;
-o-transition: all 0.4s ease-out 0s;
-webkit-transition: all 0.4s ease-out 0s;
-ms-transition: all 0.4s ease-out 0s;
transition: all 0.4s ease-out 0s;
-webkit-backface-visibility: hidden;
width: 100%;
}

.image .image-extras {
position: absolute;
width: 101%;
height: 101%;
left: 0;
top: 0;
background: {{ $opaqueRgba }};
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-moz-transition: all 0.4s ease-in-out 0s;
-o-transition: all 0.4s ease-in-out 0s;
-webkit-transition: all 0.4s ease-in-out 0s;
-ms-transition: all 0.4s ease-in-out 0s;
transition: all 0.4s ease-in-out 0s;
-webkit-transform: rotateY(180deg) scale(0.5, 0.5);
-moz-transform: rotateY(180deg) scale(0.5, 0.5);
-ms-transform: rotateY(180deg) scale(0.5, 0.5);
-o-transform: rotateY(180deg) scale(0.5, 0.5);
transform: rotateY(180deg) scale(0.5, 0.5);
/*&:before {  content: ""; display: inline-block; height: 100%; vertical-align: middle; }*/
}

.image .image-extras:before, .image .image-extras:after {
position: absolute;
content: "";
background: #fff;
left: 50%;
top: 50%;
}

.image .image-extras:before {
width: 70px;
height: 1px;
margin-left: -35px;
margin-top: -0.5px;
}

.image .image-extras:after {
width: 1px;
height: 70px;
margin-left: -0.5px;
margin-top: -35px;
}

.image .image-extras .post-gallery {
display: block;
width: 100%;
height: 100%;
position: relative;
}

.image .caption-wrapper {
-moz-transition: all 0.4s ease-in-out 0s;
-o-transition: all 0.4s ease-in-out 0s;
-webkit-transition: all 0.4s ease-in-out 0s;
-ms-transition: all 0.4s ease-in-out 0s;
transition: all 0.4s ease-in-out 0s;
}

.image:hover:not(.hover-style3) img {
-webkit-transform: scale(1.1);
-moz-transform: scale(1.1);
-ms-transform: scale(1.1);
-o-transform: scale(1.1);
transform: scale(1.1);
}

.image:hover:not(.hover-style3) .image-extras {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
-webkit-transform: rotateY(0deg) scale(1, 1);
-moz-transform: rotateY(0deg) scale(1, 1);
-ms-transform: rotateY(0deg) scale(1, 1);
-o-transform: rotateY(0deg) scale(1, 1);
transform: rotateY(0deg) scale(1, 1);
}

.image.hover-style1 .image-extras, .image.hover-style1 .caption-wrapper {
-webkit-transform: translateX(-100%);
-moz-transform: translateX(-100%);
-ms-transform: translateX(-100%);
-o-transform: translateX(-100%);
transform: translateX(-100%);
}

.image.hover-style1:hover .image-extras, .image.hover-style1:hover .caption-wrapper {
-webkit-transform: translateX(0);
-moz-transform: translateX(0);
-ms-transform: translateX(0);
-o-transform: translateX(0);
transform: translateX(0);
}

.image.hover-style2 .image-extras {
-webkit-transform: translateY(100%);
-moz-transform: translateY(100%);
-ms-transform: translateY(100%);
-o-transform: translateY(100%);
transform: translateY(100%);
}

.image.hover-style2:hover .image-extras {
-webkit-transform: translateY(0);
-moz-transform: translateY(0);
-ms-transform: translateY(0);
-o-transform: translateY(0);
transform: translateY(0);
}

.image.hover-style3 .image-extras {
width: 100%;
height: 100%;
top: 100%;
left: auto;
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
-webkit-transform: none;
-moz-transform: none;
-ms-transform: none;
-o-transform: none;
transform: none;
overflow: hidden;
-moz-transition: none 0s ease 0s;
-o-transition: none 0s ease 0s;
-webkit-transition: none 0s ease 0s;
-ms-transition: none 0s ease 0s;
transition: none 0s ease 0s;
}

/* five stars rating */
.star-rating {
font-family: FontAwesome;
display: inline-block;
font-size: 10px;
letter-spacing: 2px;
position: relative;
line-height: 1;
white-space: nowrap;
}

.star-rating:before {
content: "\f005\f005\f005\f005\f005";
color: #d4dde5;
}

.star-rating > span, .star-rating .ui-slider-range {
display: block;
position: absolute;
left: 0;
top: 0;
bottom: 0;
}

.star-rating > span:before, .star-rating .ui-slider-range:before {
content: "\f005\f005\f005\f005\f005";
color: #ff9000;
position: absolute;
overflow: hidden;
left: 0;
right: 1px;
}

.star-rating.input-star-rating.ui-slider {
background: none;
cursor: default;
}

.star-rating.input-star-rating.ui-slider .ui-slider-handle {
visibility: hidden;
width: 0;
height: 0;
padding: 0;
top: 0;
}

.star-rating.size-md {
font-size: 16px;
letter-spacing: 4px;
}

.star-rating.size-md > span:before {
right: 2px;
}

.input-star-rating {
font-size: 0;
cursor: default;
display: inline-block;
line-height: 1;
overflow: hidden;
position: relative;
}

.input-star-rating input[type=radio], .input-star-rating span {
font-size: 16px;
width: 1.2em;
float: right;
}

.input-star-rating input[type=radio] {
outline: none;
height: 1.2em;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
margin: 0 0 0 -1.2em;
cursor: pointer;
}

.input-star-rating span {
text-align: center;
display: inline-block;
color: #d4dde5;
}

.input-star-rating span:before {
content: "\f005";
font-family: FontAwesome;
}

.input-star-rating input[type=radio]:checked ~ span {
color: #ff9000;
}

.input-star-rating input[type=radio]:hover ~ span {
color: #ff9000;
}

.input-star-rating:after {
display: table;
content: "";
clear: both;
}

/* columns */
.column-2 > *, .column-3 > *, .column-4 > *, .column-5 > * {
float: left;
}

.column-2:after, .column-3:after, .column-4:after, .column-5:after {
clear: both;
content: "";
display: table;
}

.column-2.no-column-bottom-margin > *, .column-3.no-column-bottom-margin > *, .column-4.no-column-bottom-margin > *, .column-5.no-column-bottom-margin > * {
margin-bottom: 0;
}

.column-2 > * {
width: 48.5%;
margin-right: 3%;
margin-bottom: 3%;
}

.column-2 > *:nth-child(2n) {
margin-right: 0;
}

.column-2 > *:nth-child(2n+1) {
clear: both;
}

.column-3 > * {
width: 31.3333%;
margin-right: 3%;
margin-bottom: 3%;
}

.column-3 > *:nth-child(3n) {
margin-right: 0;
}

.column-3 > *:nth-child(3n+1) {
clear: both;
}

.column-4 > * {
width: 22.75%;
margin-right: 3%;
margin-bottom: 3%;
}

.column-4 > *:nth-child(4n) {
margin-right: 0;
}

.column-4 > *:nth-child(4n+1) {
clear: both;
}

.column-5 > * {
width: 17.6%;
margin-right: 3%;
margin-bottom: 3%;
}

.column-5 > *:nth-child(5n) {
margin-right: 0;
}

.column-5 > *:nth-child(5n+1) {
clear: both;
}

/* animated */
.animated {
visibility: hidden;
}

.no-cssanimations .animated {
visibility: visible;
}

.image-container {
position: relative;
}

.image-container img {
width: 100%;
}

.image-container.fixed img {
max-width: 100%;
width: auto;
}

/* text box */
.heading-box {
text-align: center;
float: none;
margin: 0 auto 40px;
}

.heading-box p {
margin-top: 10px;
}

.heading-box p + p {
margin-top: 0;
}

.heading-box .box-title {
font-size: 2.5em;
margin-bottom: 0;
}

.heading-box [class^="desc-"] {
font-weight: 300;
margin-top: 0;
}

.heading-box .desc-lg {
font-size: 1.6667em;
}

.heading-box .desc-md {
font-size: 1.3333em;
}

.heading-box .desc-sm {
font-size: 1.1667em;
}

.heading-box.size-lg p {
margin-top: 15px;
}

.heading-box.size-lg p + p {
margin-top: 0;
}

.heading-box.size-lg .box-title {
font-size: 4.1667em;
margin-bottom: 0;
}

.heading-box.size-lg .desc-lg {
font-size: 2.5em;
}

.section h2.section-title {
font-size: 2.5em;
line-height: 4em;
background: {{ $color }};
color: #fff;
margin-top: -80px;
margin-bottom: 0;
text-align: center;
font-weight: 400;
position: relative;
margin-bottom: 80px;
z-index: 100;
}

.section h2.section-title:after {
content: "";
position: absolute;
left: 50%;
bottom: 0;
margin-left: -14px;
margin-bottom: -10px;
border-top: 10px solid {{ $color }};
border-left: 14px solid transparent;
border-right: 14px solid transparent;
}

.section.no-padding {
padding: 0;
}

.section.no-padding .section-title {
margin: 0;
}

/* 2.2. Form Elements ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
form [class^="col-"] > input, form [class^="col-"] > select, form [class^="col-"] > textarea, form [class^="col-"] > .btn, form [class^="col-"] > button, form [class*=" col-"] > input, form [class*=" col-"] > select, form [class*=" col-"] > textarea, form [class*=" col-"] > .btn, form [class*=" col-"] > button {
width: 100%;
}

form.form-bordered {
padding: 25px 30px;
border: 1px solid #edf6ff;
}

form label {
font-size: 1.0833em;
font-weight: 400;
display: block;
}

.form-group:not(.box) {
margin-bottom: 20px;
}

input.input-text, select, textarea, .customSelect {
background: #edf6ff;
border: none;
line-height: normal;
}

input.input-text, textarea, .customSelect, select {
padding-left: 20px;
padding-right: 20px;
height: 42px;
font-size: 1.0833em;
}

input.input-text.input-lg, textarea.input-lg, .customSelect.input-lg, select.input-lg {
height: 48px;
font-size: 1.1667em;
}

input.input-text.input-md, textarea.input-md, .customSelect.input-md, select.input-md {
height: 42px;
font-size: 1.0833em;
}

input.input-text.input-sm, textarea.input-sm, .customSelect.input-sm, select.input-sm {
height: 34px;
font-size: 1em;
}

input.input-text.input-xs, textarea.input-xs, .customSelect.input-xs, select.input-xs {
height: 28px;
font-size: 0.9167em;
}

input.input-text.white, textarea.white, .customSelect.white, select.white {
background: #fff;
}

input.input-text, textarea {
-moz-transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
-o-transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
-webkit-transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
-ms-transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
border: 1px solid transparent;
cursor: text;
}

input.input-text:focus, textarea:focus {
outline: none;
border: 1px solid {{ $color }};
box-shadow: 0 0 8px {{ $opaqueRgba }};
}

textarea {
height: auto;
padding-top: 15px;
padding-bottom: 15px;
}

/* Select Box */
select {
padding: 10px 0 10px 20px;
line-height: 38px;
max-width: 100% !important;
}

select option {
padding: 2px 10px 2px 18px;
}

@media screen and (-webkit-min-device-pixel-ratio: 0) {
select {
padding-right: 18px;
}
}

.selector {
position: relative;
z-index: 1;
}

select.selector {
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-webkit-appearance: menulist-button;
}

.customSelect {
line-height: 42px;
position: relative;
z-index: 0;
white-space: nowrap;
overflow: hidden;
}

.customSelect.input-lg {
line-height: 48px;
}

.customSelect.input-md {
line-height: 42px;
}

.customSelect.input-sm {
line-height: 34px;
}

.customSelect.input-xs {
line-height: 28px;
}

.customSelectInner {
max-width: 100% !important;
}

.customSelectInner:before {
content: "";
display: block;
position: absolute;
right: 20px;
top: 50%;
margin-top: -2.5px;
border-top: 5px solid;
border-left: 4px solid transparent;
border-right: 4px solid transparent;
}

/* Checkbox and Radio */
.checkbox, .radio {
position: relative;
margin-top: 0;
line-height: 20px;
}

.checkbox:before, .radio:before {
display: block;
content: "";
position: absolute;
left: 0;
top: 6px;
width: 14px;
height: 14px;
border: 1px solid #d4dde5;
z-index: 0;
font-family: FontAwesome;
line-height: 13px;
text-align: center;
font-size: 8px;
}

.checkbox.checked:before, .radio.checked:before {
content: "\f00c";
}

.checkbox label, .checkbox.checkbox-inline {
font-size: 1.0833em;
line-height: 20px;
}

.checkbox input[type="checkbox"] {
position: relative;
z-index: 1;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.radio input[type="radio"] {
position: relative;
z-index: 1;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.radio:before {
font-size: 8px;
line-height: 13px;
}

.radio.radio-square:before {
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
}

.radio.checked:before {
content: "\f00c";
}

label.radio, .radio label {
line-height: 20px;
cursor: pointer;
}

.checkbox-inline, .radio-inline {
margin-left: 10px;
}

/* 2.3. Buttons ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.btn {
border: none;
color: #fff;
cursor: pointer;
padding: 0 30px;
white-space: nowrap;
text-transform: uppercase;
font-weight: 600;
background: {{ $color }};
font-size: 0.9167em;
height: 42px;
line-height: 42px;
-webkit-border-radius: 21px 21px 21px 21px;
-moz-border-radius: 21px 21px 21px 21px;
-ms-border-radius: 21px 21px 21px 21px;
border-radius: 21px 21px 21px 21px;
margin-right: 5px;
-moz-transition: all 0.2s ease 0s;
-o-transition: all 0.2s ease 0s;
-webkit-transition: all 0.2s ease 0s;
-ms-transition: all 0.2s ease 0s;
transition: all 0.2s ease 0s;
box-shadow: none;
vertical-align: baseline;
/* size */
/* style */
}

.btn i {
margin-right: 5px;
}

.btn:last-child {
margin-right: 0;
}

.btn:focus, .btn:active:focus, .btn.active:focus {
outline: none;
}

.btn.active {
box-shadow: none;
}

.btn.btn-sm {
height: 28px;
line-height: 28px;
font-weight: 400;
padding: 0 20px;
font-size: 0.8333em;
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
}

.btn.btn-lg {
height: 47px;
line-height: 47px;
font-size: 1em;
padding: 0 36px;
-webkit-border-radius: 24px 24px 24px 24px;
-moz-border-radius: 24px 24px 24px 24px;
-ms-border-radius: 24px 24px 24px 24px;
border-radius: 24px 24px 24px 24px;
}

.btn.btn-xl {
height: 57px;
line-height: 57px;
font-size: 1em;
padding: 0 36px;
-webkit-border-radius: 29px 29px 29px 29px;
-moz-border-radius: 29px 29px 29px 29px;
-ms-border-radius: 29px 29px 29px 29px;
border-radius: 29px 29px 29px 29px;
}

.btn.full-width {
padding-left: 0;
padding-right: 0;
text-align: center;
}

.btn.style1:hover, .btn.style1:active, .btn.style1:focus, .btn.style1.active {
background: {{ $secondColor }};
color: #fff;
}

.btn.style2 {
background: #20466c;
}

.btn.style2:hover, .btn.style2:active, .btn.style2:focus, .btn.style2.active {
background: #1b4268;
color: #fff;
}

.btn.style3 {
background: #edf6ff;
color: inherit;
}

.btn.style3:hover, .btn.style3:active, .btn.style3:focus, .btn.style3.active {
color: {{ $color }};
}

.btn.style4 {
background: none;
border: 1px solid #d4dde5;
color: inherit;
line-height: 40px;
}

.btn.style4.btn-sm {
line-height: 26px;
}

.btn.style4.btn-lg {
line-height: 45px;
}

.btn.style4.btn-xl {
line-height: 55px;
}

.btn.style4:hover, .btn.style4:active, .btn.style4:focus, .btn.style4.active {
color: #fff;
border-color: {{ $color }};
background: {{ $color }};
}

.btn.style4.hover-blue:hover, .btn.style4.hover-blue:active, .btn.style4.hover-blue:focus, .btn.style4.hover-blue.active {
border-color: #1b4268;
background: #1b4268;
}

.btn.style4.color-white {
border-color: #fff;
}

.btn.style4.color-white:hover, .btn.style4.color-white:active, .btn.style4.color-white:focus, .btn.style4.color-white.active {
border-color: {{ $color }};
}

.btn.style4.color-black {
border-color: #343434;
color: #343434;
}

.btn.style4.color-black:hover, .btn.style4.color-black:active, .btn.style4.color-black:focus, .btn.style4.color-black.active {
border-color: {{ $color }};
color: #fff;
}

.btn.style4.bg-white {
background: #fff;
}

.btn.style4.bg-white:hover, .btn.style4.bg-white:active, .btn.style4.bg-white:focus, .btn.style4.bg-white.active {
background: {{ $color }};
}

.tp-caption .btn:not(.color-black):hover {
color: {{ $color }};
}

/* 2.4. Message box ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.alert {
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
border: none;
padding: 25px 90px 25px 125px;
color: #fff;
position: relative;
}

.alert:before {
content: "\f003";
font-family: FontAwesome;
display: block;
position: absolute;
top: 50%;
left: 40px;
margin-top: -25px;
font-size: 16px;
width: 50px;
height: 50px;
line-height: 50px;
border: 1px solid #fff;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
}

.alert .close {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
font-weight: normal;
color: #fff;
font-size: 12px;
cursor: pointer;
text-shadow: none;
float: none;
position: absolute;
display: block;
width: 32px;
height: 32px;
top: 50%;
right: 38px;
margin-top: -16px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: #fff;
text-align: center;
line-height: 32px;
}

.alert .close:before {
content: "\f00d";
font-family: FontAwesome;
}

.alert.alert-general {
background: #1b4268;
}

.alert.alert-general:before {
content: "\f040";
}

.alert.alert-general .close {
color: #1b4268;
}

.alert.alert-notice {
background: #fc880f;
}

.alert.alert-notice:before {
content: "\f0e3";
}

.alert.alert-notice .close {
color: #fc880f;
}

.alert.alert-success {
background: #a5de37;
}

.alert.alert-success:before {
content: "\f00c";
}

.alert.alert-success .close {
color: #a5de37;
}

.alert.alert-error {
background: #ff4351;
}

.alert.alert-error:before {
content: "\f0e7";
}

.alert.alert-error .close {
color: #ff4351;
}

.alert.alert-help {
background: #28cdfb;
}

.alert.alert-help:before {
content: "\f0e9";
}

.alert.alert-help .close {
color: #28cdfb;
}

/* 2.5. Table ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
table.table.style1 th, table.table.style1 td, table.table.style2 th, table.table.style2 td {
text-align: center;
height: 42px;
}

table.table.style1 > thead > tr > th, table.table.style1 > tbody > tr > td, table.table.style2 > thead > tr > th, table.table.style2 > tbody > tr > td {
border-top: none;
border-bottom: none;
vertical-align: middle;
}

table.table.style1 > thead > tr > th, table.table.style2 > thead > tr > th {
color: #fff;
font-size: 1.0833em;
font-weight: 400;
border-bottom: none;
border-right: 1px solid;
}

table.table.style1 > thead > tr > th:first-child, table.table.style2 > thead > tr > th:first-child {
border-left: 1px solid;
}

table.table.style1 > tbody, table.table.style2 > tbody {
border: 1px solid #edf6ff;
border-top: none;
}

table.table.style1 > tbody > tr:nth-child(2n) > td, table.table.style2 > tbody > tr:nth-child(2n) > td {
background: #edf6ff;
}

table.table.style1 > tbody > tr > td, table.table.style2 > tbody > tr > td {
border-right: 1px solid #edf6ff;
}

table.table.style1 > tbody > tr > td:last-child, table.table.style2 > tbody > tr > td:last-child {
border-right: none;
}

table.table.style1 > thead > tr > th {
background: {{ $color }};
border-right-color: #fff6f0;
}

table.table.style1 > thead > tr > th:first-child {
border-left-color: {{ $color }};
}

table.table.style1 > thead > tr > th:last-child {
border-right-color: {{ $color }};
}

table.table.style2 > thead > tr > th {
background: #20466c;
border-right-color: #f2f4f6;
}

table.table.style2 > thead > tr > th:first-child {
border-left-color: #20466c;
}

table.table.style2 > thead > tr > th:last-child {
border-right-color: #20466c;
}

.st-table, .woocommerce .single-product-details .single-variation-wrap, .woocommerce .single-product-details .social-wrap {
display: table;
width: 100%;
}

.st-td, #header .branding, #header #nav, .icon-box[class*=" style-side-"].style-side-5 .icon-container, .icon-box[class*=" style-side-"].style-side-5 .box-content, .icon-box[class*=" style-side-"].style-side-6 .icon-container, .icon-box[class*=" style-side-"].style-side-6 .box-content, .icon-box[class*=" style-boxed-"].style-boxed-2 .icon-container, .icon-box[class*=" style-boxed-"].style-boxed-2 .box-content, .progress-bar .progress-label, .progress-bar .progress-wrap, .progress-bar .progress-percent, .tab-container.full-width .tabs li, .brand-slider .owl-item a, .portfolio-hover-holder .portfolio-text-inner, .audio-container .mejs-container .mejs-controls > div, .related-posts .related-post .post-image, .related-posts .related-post .details, .woocommerce .single-product-details .product-images .thumbnails .item a, .woocommerce .single-product-details .single-variation-wrap .qty-wrap, .woocommerce .single-product-details .single-variation-wrap .variation-action, .woocommerce .single-product-details .social-wrap label, .woocommerce .single-product-details .social-wrap .social-icons {
display: table-cell;
vertical-align: middle;
}

/* 2.6. Design Elements ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* twitter box */
.twitter-holder .tweet {
margin-bottom: 1px;
background: #edf6ff;
position: relative;
padding: 10px 12px 10px 60px;
}

.twitter-holder .tweet:before {
position: absolute;
font-family: FontAwesome;
content: "\f099";
font-size: 1.0833em;
display: block;
left: 10px;
top: 50%;
width: 34px;
height: 34px;
line-height: 34px;
text-align: center;
margin-top: -17px;
background-color: #fff;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
color: #d4dde5;
-moz-transition: all 0.3s ease 0s;
-o-transition: all 0.3s ease 0s;
-webkit-transition: all 0.3s ease 0s;
-ms-transition: all 0.3s ease 0s;
transition: all 0.3s ease 0s;
}

.twitter-holder .tweet .tweet-text {
margin-bottom: 6px;
}

.twitter-holder .tweet .tweet-text a {
color: {{ $color }};
}

.twitter-holder .tweet .tweet-text a:hover {
text-decoration: underline;
}

.twitter-holder .tweet .tweet-date {
font-size: 0.8333em;
}

.twitter-holder .tweet:hover:before {
color: #fff;
background-color: {{ $color }};
}

.twitter-holder .tweet:hover .tweet-text {
color: #1b4268;
}

/* recent posts */
.recent-posts > li {
width: 100%;
margin-bottom: 1px;
background: #edf6ff;
padding: 8px;
}

.recent-posts > li:last-child {
margin-bottom: 0;
}

.recent-posts .post-author-avatar {
display: table-cell;
padding-right: 12px;
vertical-align: middle;
}

.recent-posts .post-author-avatar span {
border: 4px solid rgba(255, 255, 255, 0.1);
width: 48px;
height: 48px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
display: block;
}

.recent-posts .post-author-avatar img {
width: 100%;
height: auto;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
}

.recent-posts .post-author-avatar:hover img {
filter: alpha(opacity=80);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
-moz-opacity: 0.8;
-khtml-opacity: 0.8;
opacity: 0.8;
/*border: 4px solid rgba(red($theme-skin-color), green($theme-skin-color), blue($theme-skin-color), 0.85);*/
}

.recent-posts .post-content {
display: table-cell;
vertical-align: middle;
}

.recent-posts .post-title {
margin-bottom: 4px;
display: block;
font-size: 1.1667em;
color: #1b4268;
}

.recent-posts .post-title:hover {
color: {{ $color }};
}

.recent-posts .post-meta {
font-size: 0.8333em;
margin-bottom: 0;
}

/* archives */
ul.archives {
font-size: 1.0833em;
}

ul.archives li {
border-bottom: 1px solid #edf6ff;
margin-bottom: 0 !important;
}

ul.archives li a {
line-height: 48px;
white-space: nowrap;
}

ul.archives li:before {
font-size: 1em;
}

ul.archives.hover-effect li:hover a {
color: #1b4268;
}

/* filters categories */
ul.filter-categories > li {
background: #edf6ff;
}

ul.filter-categories > li + li {
margin-top: 2px;
}

ul.filter-categories > li > a {
display: block;
line-height: 20px;
padding: 10px 20px;
font-size: 1.0833em;
}

ul.filter-categories > li.category-has-children > a:before {
float: right;
content: "\f067";
font-family: FontAwesome;
font-size: 10px;
width: 20px;
height: 20px;
line-height: 20px;
background: #fff;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
color: #d4dde5;
}

ul.filter-categories > li.category-has-children > a.active {
color: #1b4268;
}

ul.filter-categories > li.category-has-children > a.active:before {
content: "\f068";
color: #fff;
background: {{ $color }};
}

ul.filter-categories > li li a {
display: block;
line-height: 25px;
padding: 0 30px 0 36px;
}

ul.filter-categories > li li a:before {
content: "\f10c";
font-size: 8px;
font-family: FontAwesome;
line-height: 25px;
margin-right: 8px;
float: left;
}

ul.filter-categories > li li:first-child {
padding-top: 5px;
}

ul.filter-categories > li li:last-child {
padding-bottom: 20px;
}

/* search box */
.main-mini-search-form {
width: 240px;
}

.main-mini-search-form .search-box {
width: 100%;
position: relative;
}

.main-mini-search-form input[type=text] {
background: none;
border: none;
width: 100%;
border-bottom: 1px solid #d4dde5;
height: 34px;
line-height: normal;
padding-right: 20px;
}

.main-mini-search-form button {
background: none;
border: none;
position: absolute;
right: 0;
top: 50%;
margin-top: -17px;
}

.main-mini-search-form button i {
display: block;
height: 34px;
line-height: 34px;
font-size: 14px;
color: #d4dde5;
}

.main-mini-search-form button:hover i {
color: {{ $color }};
}

/* price filter */
.price-filter-box {
background: #edf6ff;
padding: 18px 47px;
position: relative;
}

.price-filter-box .min-price-label, .price-filter-box .max-price-label {
position: absolute;
display: block;
height: 20px;
line-height: 20px;
margin-top: -10px;
top: 50%;
}

.price-filter-box .min-price-label {
left: 10px;
}

.price-filter-box .max-price-label {
right: 10px;
}

.ui-slider {
position: relative;
text-align: left;
}

.ui-slider.ui-slider-horizontal {
height: 6px;
}

.ui-slider.ui-slider-horizontal .ui-slider-range {
height: 100%;
}

.ui-slider.ui-slider-horizontal .ui-slider-handle {
margin-left: -6px;
top: -3px;
}

.ui-slider.ui-widget-content {
-webkit-border-radius: 5px 5px 5px 5px;
-moz-border-radius: 5px 5px 5px 5px;
-ms-border-radius: 5px 5px 5px 5px;
border-radius: 5px 5px 5px 5px;
background: {{ $color }};
}

.ui-slider .ui-slider-range {
display: block;
position: absolute;
z-index: 1;
border: none;
background: #fff;
-webkit-border-radius: 5px 5px 5px 5px;
-moz-border-radius: 5px 5px 5px 5px;
-ms-border-radius: 5px 5px 5px 5px;
border-radius: 5px 5px 5px 5px;
}

.ui-slider .ui-slider-handle {
cursor: default;
position: absolute;
z-index: 2;
width: 12px;
height: 12px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: {{ $color }};
}

/* banner slider */
.banner-slider .owl-buttons, .post-slider.style1 .owl-buttons, .post-slider.style5 .owl-buttons, .brand-slider .owl-buttons {
display: none;
}

.banner-slider .owl-pagination, .post-slider.style1 .owl-pagination, .post-slider.style5 .owl-pagination, .brand-slider .owl-pagination {
display: block;
position: absolute;
bottom: 20px;
line-height: 0;
text-align: center;
width: 100%;
}

.banner-slider .owl-pagination .owl-page, .post-slider.style1 .owl-pagination .owl-page, .post-slider.style5 .owl-pagination .owl-page, .brand-slider .owl-pagination .owl-page {
display: inline-block;
margin: 0 3px;
height: 10px;
}

.banner-slider .owl-pagination .owl-page span, .post-slider.style1 .owl-pagination .owl-page span, .post-slider.style5 .owl-pagination .owl-page span, .brand-slider .owl-pagination .owl-page span {
display: inline-block;
margin-top: 2px;
height: 6px;
width: 40px;
border: 1px solid #fff;
-webkit-border-radius: 3px 3px 3px 3px;
-moz-border-radius: 3px 3px 3px 3px;
-ms-border-radius: 3px 3px 3px 3px;
border-radius: 3px 3px 3px 3px;
background: none;
box-shadow: none;
}

.banner-slider .owl-pagination .owl-page.active span, .post-slider.style1 .owl-pagination .owl-page.active span, .post-slider.style5 .owl-pagination .owl-page.active span, .brand-slider .owl-pagination .owl-page.active span {
background: #fff;
}

.banner-slider .banner-text, .post-slider.style1 .banner-text, .post-slider.style5 .banner-text, .brand-slider .banner-text {
background: {{ $color }};
color: #fff;
padding: 15px 10px;
text-align: center;
text-transform: uppercase;
}

.banner-slider .banner-text .banner-title, .post-slider.style1 .banner-text .banner-title, .post-slider.style5 .banner-text .banner-title, .brand-slider .banner-text .banner-title {
margin-bottom: 0;
font-size: 2.5em;
line-height: 0.8;
color: #fff;
}

/* best sellers widget */
.product-list-widget li {
background: #edf6ff;
padding: 10px;
display: block;
}

.product-list-widget li + li {
margin-top: 1px;
}

.product-list-widget .product-image, .product-list-widget .product-content {
display: table-cell;
vertical-align: middle;
}

.product-list-widget .product-image a {
width: 60px;
display: block;
}

.product-list-widget .product-image a:hover img {
filter: alpha(opacity=85);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=85)";
-moz-opacity: 0.85;
-khtml-opacity: 0.85;
opacity: 0.85;
}

.product-list-widget .product-content {
padding-left: 10px;
}

.product-list-widget .product-title {
margin-bottom: 8px;
}

.product-list-widget .product-price {
color: #eb3b50;
font-weight: 600;
margin-right: 5px;
}

/* textbox */
.text-box {
background: #edf6ff;
padding: 20px 25px;
}

.text-box > *:last-child {
margin-bottom: 0;
}

.padding-box {
background: #edf6ff;
padding: 10px;
}

.padding-box .box-title {
font-size: 1.5em;
font-weight: normal;
}

/* flickr gallery */
/* color filter */
.filter-by-color li {
float: left;
border: 1px solid;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
margin-right: 10px;
margin-bottom: 10px;
}

.filter-by-color li:last-child {
margin-right: 0;
}

.filter-by-color li a {
display: block;
width: 28px;
height: 28px;
border: 6px solid #fff;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-indent: -9999px;
}

.filter-by-color li.chosen a {
text-align: center;
text-indent: 0;
font-size: 10px;
line-height: 16px;
}

.filter-by-color li.chosen a:before {
content: "\f00c";
font-family: FontAwesome;
color: #fff;
}

.filter-by-color:after {
display: table;
content: "";
clear: both;
}

.filter-by-color .color1 {
background: #d1e6d5;
color: #d1e6d5;
}

.filter-by-color .color2 {
background: #9f60b5;
color: #9f60b5;
}

.filter-by-color .color3 {
background: #ff6000;
color: #ff6000;
}

.filter-by-color .color4 {
background: #0ab596;
color: #0ab596;
}

.filter-by-color .color5 {
background: #f5a77d;
color: #f5a77d;
}

.filter-by-color .color6 {
background: #6dace6;
color: #6dace6;
}

.filter-by-color .color7 {
background: #c59d8d;
color: #c59d8d;
}

/* size filter */
.filter-by-size li {
float: left;
margin: 0 10px 10px 0;
}

.filter-by-size li:last-child {
margin-right: 0;
}

.filter-by-size li a {
display: block;
width: 30px;
height: 30px;
color: #d4dde5;
border: 1px solid;
font-size: 0.9167em;
font-weight: 600;
text-align: center;
line-height: 30px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.filter-by-size li:hover a, .filter-by-size li.chosen a {
color: #fff;
border-color: {{ $color }};
background: {{ $color }};
}

.filter-by-size:after {
display: table;
content: "";
clear: both;
}

/* 2.7. Toggle & Accordion ~~~~~~~~~~~~~~~~~~~~~~~~~ */
.panel-group .panel-title {
font-size: 1.1667em;
line-height: 20px;
}

.panel-group .panel-title a {
white-space: normal;
display: block;
padding: 15px 30px;
}

.panel-group .panel-title a.active .open-sub:after {
display: none;
}

.panel-group .panel-title .open-sub {
display: block;
position: relative;
}

.panel-group .panel-title .open-sub:before, .panel-group .panel-title .open-sub:after {
content: "";
display: block;
position: absolute;
}

.panel-group .panel-title .open-sub:before {
height: 1px;
top: 50%;
margin-top: -0.5px;
left: 50%;
}

.panel-group .panel-title .open-sub:after {
width: 1px;
left: 50%;
margin-left: -0.5px;
top: 50%;
}

.panel-group h2.panel-title {
font-size: 2em;
}

.panel-group h3.panel-title {
font-size: 1.6667em;
}

.panel-group h4.panel-title {
font-size: 1.3333em;
}

.panel-group h6.panel-title {
font-size: 1.0833em;
}

.panel-group .panel-content {
padding: 10px 30px 20px;
}

.panel-group .panel-content > *:last-child {
margin-bottom: 0;
}

.panel-group .panel {
box-shadow: none;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
border: none;
margin-bottom: 0;
position: relative;
}

.panel-group .panel + .panel {
margin-top: 1px;
}

.panel-group .panel.style1 .panel-title a:hover, .panel-group .panel.style2 .panel-title a:hover, .panel-group .panel.style3 .panel-title a:hover, .panel-group .panel.style4 .panel-title a:hover, .panel-group .panel.style5 .panel-title a:hover {
color: {{ $color }};
}

.panel-group .panel.style1 .panel-title .open-sub, .panel-group .panel.style2 .panel-title .open-sub {
float: right;
}

.panel-group .panel.style1 .panel-title a, .panel-group .panel.style2 .panel-title a {
background: #edf6ff;
}

.panel-group .panel.style1 .panel-title a.active, .panel-group .panel.style2 .panel-title a.active {
color: {{ $color }};
background: none;
}

.panel-group .panel.style1 .panel-title .open-sub {
width: 11px;
height: 11px;
margin-top: 4.5px;
}

.panel-group .panel.style1 .panel-title .open-sub:before, .panel-group .panel.style1 .panel-title .open-sub:after {
background: #939faa;
}

.panel-group .panel.style1 .panel-title .open-sub:before {
left: 0;
width: 100%;
}

.panel-group .panel.style1 .panel-title .open-sub:after {
top: 0;
bottom: 0;
height: 100%;
}

.panel-group .panel.style2 .panel-title .open-sub, .panel-group .panel.style3 .panel-title .open-sub {
width: 20px;
height: 20px;
background: #fff;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.panel-group .panel.style2 .panel-title .open-sub:before, .panel-group .panel.style2 .panel-title .open-sub:after, .panel-group .panel.style3 .panel-title .open-sub:before, .panel-group .panel.style3 .panel-title .open-sub:after {
background: #939faa;
}

.panel-group .panel.style2 .panel-title .open-sub:before, .panel-group .panel.style3 .panel-title .open-sub:before {
width: 7px;
margin-left: -3.5px;
}

.panel-group .panel.style2 .panel-title .open-sub:after, .panel-group .panel.style3 .panel-title .open-sub:after {
bottom: 0;
height: 7px;
margin-top: -3.5px;
}

.panel-group .panel.style2 .panel-title a.active .open-sub, .panel-group .panel.style3 .panel-title a.active .open-sub {
background: {{ $color }};
}

.panel-group .panel.style2 .panel-title a.active .open-sub:before, .panel-group .panel.style2 .panel-title a.active .open-sub:after, .panel-group .panel.style3 .panel-title a.active .open-sub:before, .panel-group .panel.style3 .panel-title a.active .open-sub:after {
background: #fff;
}

.panel-group .panel.style3 + .panel {
margin-top: 10px;
}

.panel-group .panel.style3 .panel-title a {
background: #edf6ff;
color: inherit;
}

.panel-group .panel.style3 .panel-title a.active, .panel-group .panel.style3 .panel-content {
background: {{ $color }};
color: #fff;
}

.panel-group .panel.style3 .panel-title .open-sub {
float: left;
margin-right: 15px;
}

.panel-group .panel.style3 .panel-title a.active .open-sub {
background: #fff;
}

.panel-group .panel.style3 .panel-title a.active .open-sub:before, .panel-group .panel.style3 .panel-title a.active .open-sub:after {
background: {{ $color }};
}

.panel-group .panel.style3 .panel-content {
padding-left: 65px;
padding-right: 15px;
}

.panel-group .panel.style4 + .panel {
margin-top: 7px;
}

.panel-group .panel.style4 .panel-title a {
padding-top: 0;
padding-left: 0;
line-height: 32px;
}

.panel-group .panel.style4 .panel-title a .open-sub {
float: left;
margin-right: 20px;
width: 32px;
height: 32px;
background: none;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 1px solid #d4dde5;
}

.panel-group .panel.style4 .panel-title a .open-sub:before, .panel-group .panel.style4 .panel-title a .open-sub:after {
background: #d4dde5;
}

.panel-group .panel.style4 .panel-title a .open-sub:before {
width: 7px;
margin-left: -3.5px;
}

.panel-group .panel.style4 .panel-title a .open-sub:after {
bottom: 0;
height: 7px;
margin-top: -3.5px;
}

.panel-group .panel.style4 .panel-title a.active {
color: {{ $color }};
}

.panel-group .panel.style4 .panel-title a.active .open-sub {
background: {{ $color }};
border-color: {{ $color }};
}

.panel-group .panel.style4 .panel-title a.active .open-sub:before, .panel-group .panel.style4 .panel-title a.active .open-sub:after {
background: #fff;
}

.panel-group .panel.style4 .panel-content {
padding: 0 10px 10px 55px;
word-break: break-all;
}

.panel-group .panel.style5 {
border: 1px solid #edf6ff;
border-bottom: none;
}

.panel-group .panel.style5 + .panel {
margin-top: 1px;
}

.panel-group .panel.style5 .panel-title a {
padding: 0;
line-height: 50px;
}

.panel-group .panel.style5 .panel-title a .open-sub {
width: 36px;
float: left;
margin-right: 25px;
height: 50px;
background: #edf6ff;
}

.panel-group .panel.style5 .panel-title a .open-sub:before, .panel-group .panel.style5 .panel-title a .open-sub:after {
background: #939faa;
}

.panel-group .panel.style5 .panel-title a .open-sub:before {
width: 11px;
left: 50%;
margin-left: -5.5px;
}

.panel-group .panel.style5 .panel-title a .open-sub:after {
height: 11px;
top: 50%;
margin-top: -5.5px;
}

.panel-group .panel.style5 .panel-title a.active {
color: {{ $color }};
}

.panel-group .panel.style5 .panel-content {
border-top: 1px solid #edf6ff;
padding: 15px 15px 15px 40px;
}

.panel-group .panel.style5:last-child {
border-bottom: 1px solid #edf6ff;
}

.panel-group .panel.style6 {
background: #edf6ff;
}

.panel-group .panel.style6 .panel-title a.active, .panel-group .panel.style6 .panel-title a:hover {
color: #1b4268;
}

/* 2.8. Blog Posts ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.blog-posts .post-image img {
width: 100%;
}

.blog-posts blockquote {
margin-bottom: 1px;
}

.blog-posts .post-masonry .post-content {
position: relative;
z-index: 1;
padding: 40px 30px 25px;
border: 2px solid #edf6ff;
border-top-width: 1px;
border-bottom: none;
}

.blog-posts .post-masonry .post-content > *:last-child {
margin-bottom: 0;
}

.blog-posts .post-masonry .post-content.no-author-img {
padding-top: 25px;
}

.blog-posts .post-masonry .entry-title {
font-weight: 400;
}

.blog-posts .post-masonry .post-author {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 4px solid #fff;
width: 72px;
height: 72px;
position: absolute;
overflow: hidden;
left: 25px;
top: 0;
margin-top: -36px;
background: #fff;
z-index: 2;
}

.blog-posts .post-masonry .post-author img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
position: relative;
z-index: 1;
-webkit-transform: none;
}

.blog-posts .post-masonry .post-author:hover img {
filter: alpha(opacity=85);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=85)";
-moz-opacity: 0.85;
-khtml-opacity: 0.85;
opacity: 0.85;
}

.blog-posts .post-masonry .post-action, .blog-posts .post-full .post-action {
background: #edf6ff;
padding: 15px 20px 5px;
}

.blog-posts .post-masonry .post-action .btn, .blog-posts .post-full .post-action .btn {
margin-right: 7px;
padding: 0 15px;
margin-bottom: 10px;
}

.blog-posts .post-masonry .post-action .btn:last-child, .blog-posts .post-full .post-action .btn:last-child {
margin-right: 0;
}

.blog-posts .post-masonry .post-action .post-read-more, .blog-posts .post-full .post-action .post-read-more {
float: right;
padding: 0 20px;
}

.blog-posts .post-masonry .post-action .fa, .blog-posts .post-full .post-action .fa {
color: #d4dde5;
margin-right: 3px;
}

.blog-posts .post-masonry .post-action:after, .blog-posts .post-full .post-action:after {
content: "";
clear: both;
display: table;
}

.blog-posts .post-grid .post-content {
position: relative;
background: #edf6ff;
padding: 40px 20px 25px;
text-align: center;
z-index: 1;
}

.blog-posts .post-grid .post-content p {
margin-bottom: 20px;
}

.blog-posts .post-grid .entry-title {
margin-bottom: 4px;
}

.blog-posts .post-grid .post-date {
position: absolute;
display: inline-block;
left: 0;
top: 0;
width: 100%;
color: #fff;
height: 32px;
line-height: 32px;
margin-top: -16px;
white-space: nowrap;
font-size: 0.8333em;
text-transform: uppercase;
font-weight: 700;
}

.blog-posts .post-grid .post-date span {
display: inline-block;
background: {{ $color }};
padding: 0 25px;
-webkit-border-radius: 16px 16px 16px 16px;
-moz-border-radius: 16px 16px 16px 16px;
-ms-border-radius: 16px 16px 16px 16px;
border-radius: 16px 16px 16px 16px;
}

.blog-posts .post-grid .post-meta {
margin-bottom: 20px;
}

.blog-posts .post-grid .post-action .btn {
padding: 0 25px;
}

.blog-posts .post-full .post-image {
padding: 0;
}

.blog-posts .post-full .post-content {
padding: 20px 30px 15px;
background: #edf6ff;
}

.blog-posts .post-full .post-title {
font-weight: 400;
margin-bottom: 3px;
}

.blog-posts .post-full .post-meta {
margin-bottom: 20px;
}

.blog-posts .post-full .post-action {
background: none;
padding: 0;
padding-top: 10px;
}

.blog-posts .post-full.post-blockquote .post-content {
padding: 0 0 25px 0;
}

.blog-posts .post-full.post-blockquote .post-action {
padding: 0 30px;
}

.blog-posts .post-full:after {
content: "";
display: table;
clear: both;
}

.blog-posts .post-action .btn {
background: #fff;
}

.blog-posts .post-action .btn i {
margin-right: 3px;
}

.blog-posts .post-action .btn:hover {
background: #1b4268;
color: #fff;
}

.blog-posts .post-action .btn:hover .fa {
color: #fff;
}

.blog-posts .post-blockquote .post-content {
padding-top: 0;
}

.blog-posts.layout-timeline.layout-fullwidth .timeline-author {
width: 100px;
height: 100px;
border: 1px solid #d4dde5;
padding: 3px;
overflow: hidden;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
margin: 0 auto;
background: #fff;
}

.blog-posts.layout-timeline.layout-fullwidth .timeline-author img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.blog-posts.layout-timeline.layout-fullwidth .post-date {
font-weight: 600;
font-size: 0.8333em;
background: {{ $color }};
line-height: 28px;
display: inline-block;
color: #fff;
position: absolute;
top: 0;
z-index: 9;
visibility: hidden;
text-transform: uppercase;
}

.blog-posts.layout-timeline.layout-fullwidth .post-date:before, .blog-posts.layout-timeline.layout-fullwidth .post-date:after {
content: "";
display: block;
position: absolute;
}

.blog-posts.layout-timeline.layout-fullwidth .post-date:before {
top: 0;
}

.blog-posts.layout-timeline.layout-fullwidth .post-date:after {
width: 12px;
height: 12px;
top: 50%;
margin-top: -6px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: {{ $color }};
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container {
background: url(../miracle/images/icon/dot.jpg) repeat-y center center;
margin: 0 -25px -15px;
padding-bottom: 40px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .iso-item {
padding: 15px 25px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .iso-item:nth-child(2) {
padding-top: 75px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container article.post {
overflow: visible;
padding-top: 38px;
position: relative;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-left .post-date, .blog-posts.layout-timeline.layout-fullwidth .iso-container .col-right .post-date {
visibility: visible;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-left .post-date {
right: 0;
-webkit-border-radius: 14px 0 0 14px;
-moz-border-radius: 14px 0 0 14px;
-ms-border-radius: 14px 0 0 14px;
border-radius: 14px 0 0 14px;
padding: 0 10px 0 20px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-left .post-date:before {
border-left: 14px solid {{ $color }};
border-top: 14px solid transparent;
border-bottom: 14px solid transparent;
right: -14px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-left .post-date:after {
right: -31.5px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-right .post-date {
left: 0;
-webkit-border-radius: 0 14px 14px 0;
-moz-border-radius: 0 14px 14px 0;
-ms-border-radius: 0 14px 14px 0;
border-radius: 0 14px 14px 0;
padding: 0 20px 0 10px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-right .post-date:before {
border-right: 14px solid {{ $color }};
border-top: 14px solid transparent;
border-bottom: 14px solid transparent;
left: -14px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .col-right .post-date:after {
left: -30.5px;
}

.blog-posts.layout-timeline.layout-fullwidth .load-more {
display: block;
width: 50px;
height: 50px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
margin: 0 auto;
line-height: 50px;
text-align: center;
color: #fff;
background: #d4dde5;
margin-top: 15px;
display: none;
}

.blog-posts.layout-timeline.layout-fullwidth .load-more i {
font-size: 30px;
line-height: 50px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container.active ~ .load-more {
display: block;
}

.blog-posts.layout-timeline.layout-single {
background: url(../miracle/images/icon/dot.jpg) repeat-y 80px top;
}

.blog-posts.layout-timeline.layout-single .timeline-date {
height: 36px;
line-height: 34px;
display: inline-block;
font-weight: bold;
font-size: 0.8333em;
text-transform: uppercase;
border: 1px solid #d4dde5;
padding: 0 20px;
-webkit-border-radius: 18px 18px 18px 18px;
-moz-border-radius: 18px 18px 18px 18px;
-ms-border-radius: 18px 18px 18px 18px;
border-radius: 18px 18px 18px 18px;
margin-left: 30px;
background: #fff;
margin-bottom: 30px;
}

.blog-posts.layout-timeline.layout-single article.post {
padding-left: 100px;
position: relative;
}

.blog-posts.layout-timeline.layout-single .element-type {
width: 50px;
height: 54px;
line-height: 50px;
text-align: center;
color: #fff;
font-size: 20px;
position: absolute;
left: 0;
top: 0;
background: #d4dde5;
-webkit-border-radius: 0 0 25px 25px;
-moz-border-radius: 0 0 25px 25px;
-ms-border-radius: 0 0 25px 25px;
border-radius: 0 0 25px 25px;
cursor: default;
border-color: #d4dde5;
}

.blog-posts.layout-timeline.layout-single .element-type i {
line-height: inherit;
}

.blog-posts.layout-timeline.layout-single .element-type:before {
content: "";
border-top: 1px solid;
border-color: inherit;
position: absolute;
top: 0;
width: 36px;
left: 100%;
}

.blog-posts.layout-timeline.layout-single .element-type:after {
content: "";
position: absolute;
width: 18px;
height: 18px;
background-color: inherit;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
top: -9px;
right: -39.5px;
border: 3px solid #fff;
}

.blog-posts.layout-timeline.layout-single .element-type:hover {
background: {{ $color }};
border-color: {{ $color }};
}

.blog-posts.layout-timeline.layout-single .post .post-content {
background: #edf6ff;
padding-top: 20px;
}

.blog-posts.layout-timeline.layout-single .post .entry-title {
margin-bottom: 3px;
}

.blog-posts.layout-timeline.layout-single .post .post-meta {
margin-bottom: 20px;
}

.blog-posts.layout-timeline.layout-single .post .audio-container {
margin-bottom: 1px;
}

.blog-posts.layout-timeline.layout-single .read-more {
height: 36px;
line-height: 34px;
font-weight: 400;
background: #fff;
padding: 0 25px;
margin-left: 25px;
font-size: 0.8333em;
}

.blog-posts.layout-timeline.layout-single .read-more:hover, .blog-posts.layout-timeline.layout-single .read-more:focus {
background: #1b4268;
border-color: #1b4268;
}

.blog-posts .post-meta {
font-size: 0.9167em;
margin-bottom: 7px;
}

.blog-posts .post-meta > * {
margin-right: 3px;
}

.blog-posts .post-meta > * + *:before {
content: ".";
font-size: 16px;
font-weight: 900;
margin-right: 4px;
}

.blog-posts .post-classic, .single-post .post {
padding-left: 70px;
position: relative;
}

.blog-posts .post-classic .post-date, .single-post .post .post-date {
position: absolute;
left: 0;
top: 0;
width: 50px;
background: {{ $color }};
text-align: center;
padding: 15px 0 20px;
color: #fff;
-webkit-border-radius: 0 0 25px 25px;
-moz-border-radius: 0 0 25px 25px;
-ms-border-radius: 0 0 25px 25px;
border-radius: 0 0 25px 25px;
}

.blog-posts .post-classic .post-date .month, .blog-posts .post-classic .post-date .day, .single-post .post .post-date .month, .single-post .post .post-date .day {
line-height: 1;
}

.blog-posts .post-classic .post-date .month, .single-post .post .post-date .month {
font-weight: 700;
font-size: 0.9167em;
display: block;
}

.blog-posts .post-classic .post-date .day, .single-post .post .post-date .day {
font-weight: 600;
font-size: 1.6667em;
}

.blog-posts .post-classic .post-action, .single-post .post .post-action {
float: right;
}

.blog-posts .post-classic .post-action .btn, .single-post .post .post-action .btn {
border: 1px solid #d4dde5;
color: inherit;
padding: 0 15px;
background: none;
}

.blog-posts .post-classic .post-action .btn i, .single-post .post .post-action .btn i {
color: #d4dde5;
margin-right: 3px;
}

.blog-posts .post-classic .post-action .btn:hover, .single-post .post .post-action .btn:hover {
border-color: #eb3b50;
background: #eb3b50;
color: #fff;
}

.blog-posts .post-classic .post-action .btn:hover i, .single-post .post .post-action .btn:hover i {
color: #fff;
}

.blog-posts .post-classic .post-content, .single-post .post .post-content {
padding: 25px 0;
}

.blog-posts .post-classic .entry-title, .single-post .post .entry-title {
margin-bottom: 4px;
}

.blog-posts .post-classic .post-meta, .single-post .post .post-meta {
margin-bottom: 25px;
}

.blog-posts .post-classic .read-more, .single-post .post .read-more {
line-height: 35px;
font-size: 0.8333em;
height: 36px;
font-weight: 400;
padding: 0 25px;
}

.blog-posts .post-classic.post-blockquote .post-content {
padding-top: 0;
}

.miracle-slider-nav, .post-slideshow .owl-prev, .post-slideshow .owl-next, .post-slideshow .soap-gallery-prev, .post-slideshow .soap-gallery-next, .soap-gallery .owl-prev, .soap-gallery .owl-next, .soap-gallery .soap-gallery-prev, .soap-gallery .soap-gallery-next, .soap-gallery-wrapper .owl-prev, .soap-gallery-wrapper .owl-next, .soap-gallery-wrapper .soap-gallery-prev, .soap-gallery-wrapper .soap-gallery-next, .post-slider .owl-prev, .post-slider .owl-next, .post-slider .soap-gallery-prev, .post-slider .soap-gallery-next, .testimonials.owl-carousel .owl-prev, .testimonials.owl-carousel .owl-next, .testimonials.owl-carousel .soap-gallery-prev, .testimonials.owl-carousel .soap-gallery-next, .features-icon-slider .owl-prev, .features-icon-slider .owl-next, .features-icon-slider .soap-gallery-prev, .features-icon-slider .soap-gallery-next, .brand-slider.style1 .owl-prev, .brand-slider.style1 .owl-next, .brand-slider.style1 .soap-gallery-prev, .brand-slider.style1 .soap-gallery-next, #slideshow .tp-leftarrow.default, #slideshow .tp-rightarrow.default, .post-pagination .nav-prev, .post-pagination .nav-next {
position: absolute;
top: 50%;
text-indent: -9999px;
text-align: left;
margin-top: -14px;
text-shadow: none;
-moz-transition: left 0.3s ease, right 0.3s ease;
-o-transition: left 0.3s ease, right 0.3s ease;
-webkit-transition: left 0.3s ease, right 0.3s ease;
-ms-transition: left 0.3s ease, right 0.3s ease;
transition: left 0.3s ease, right 0.3s ease;
z-index: 98;
}

.miracle-slider-nav:before, .post-slideshow .owl-prev:before, .post-slideshow .owl-next:before, .post-slideshow .soap-gallery-prev:before, .post-slideshow .soap-gallery-next:before, .soap-gallery .owl-prev:before, .soap-gallery .owl-next:before, .soap-gallery .soap-gallery-prev:before, .soap-gallery .soap-gallery-next:before, .soap-gallery-wrapper .owl-prev:before, .soap-gallery-wrapper .owl-next:before, .soap-gallery-wrapper .soap-gallery-prev:before, .soap-gallery-wrapper .soap-gallery-next:before, .post-slider .owl-prev:before, .post-slider .owl-next:before, .post-slider .soap-gallery-prev:before, .post-slider .soap-gallery-next:before, .testimonials.owl-carousel .owl-prev:before, .testimonials.owl-carousel .owl-next:before, .testimonials.owl-carousel .soap-gallery-prev:before, .testimonials.owl-carousel .soap-gallery-next:before, .features-icon-slider .owl-prev:before, .features-icon-slider .owl-next:before, .features-icon-slider .soap-gallery-prev:before, .features-icon-slider .soap-gallery-next:before, .brand-slider.style1 .owl-prev:before, .brand-slider.style1 .owl-next:before, .brand-slider.style1 .soap-gallery-prev:before, .brand-slider.style1 .soap-gallery-next:before, #slideshow .tp-leftarrow.default:before, #slideshow .tp-rightarrow.default:before, .post-pagination .nav-prev:before, .post-pagination .nav-next:before {
font-family: FontAwesome;
font-size: 13px;
text-indent: 0;
width: 57px;
height: 28px;
display: block;
text-align: center;
line-height: 26px;
border: 1px solid #fff;
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
color: #fff;
}

.miracle-slider-nav:hover:before, .post-slideshow .owl-prev:hover:before, .post-slideshow .owl-next:hover:before, .post-slideshow .soap-gallery-prev:hover:before, .post-slideshow .soap-gallery-next:hover:before, .soap-gallery .owl-prev:hover:before, .soap-gallery .owl-next:hover:before, .soap-gallery .soap-gallery-prev:hover:before, .soap-gallery .soap-gallery-next:hover:before, .soap-gallery-wrapper .owl-prev:hover:before, .soap-gallery-wrapper .owl-next:hover:before, .soap-gallery-wrapper .soap-gallery-prev:hover:before, .soap-gallery-wrapper .soap-gallery-next:hover:before, .post-slider .owl-prev:hover:before, .post-slider .owl-next:hover:before, .post-slider .soap-gallery-prev:hover:before, .post-slider .soap-gallery-next:hover:before, .testimonials.owl-carousel .owl-prev:hover:before, .testimonials.owl-carousel .owl-next:hover:before, .testimonials.owl-carousel .soap-gallery-prev:hover:before, .testimonials.owl-carousel .soap-gallery-next:hover:before, .features-icon-slider .owl-prev:hover:before, .features-icon-slider .owl-next:hover:before, .features-icon-slider .soap-gallery-prev:hover:before, .features-icon-slider .soap-gallery-next:hover:before, .brand-slider.style1 .owl-prev:hover:before, .brand-slider.style1 .owl-next:hover:before, .brand-slider.style1 .soap-gallery-prev:hover:before, .brand-slider.style1 .soap-gallery-next:hover:before, #slideshow .tp-leftarrow.default:hover:before, #slideshow .tp-rightarrow.default:hover:before, .post-pagination .nav-prev:hover:before, .post-pagination .nav-next:hover:before {
border-color: {{ $color }};
background: {{ $color }};
}

.post-slideshow .owl-prev, .post-slideshow .soap-gallery-prev, .soap-gallery .owl-prev, .soap-gallery .soap-gallery-prev, .soap-gallery-wrapper .owl-prev, .soap-gallery-wrapper .soap-gallery-prev, .post-slider .owl-prev, .post-slider .soap-gallery-prev, .testimonials.owl-carousel .owl-prev, .testimonials.owl-carousel .soap-gallery-prev, .features-icon-slider .owl-prev, .features-icon-slider .soap-gallery-prev, .brand-slider.style1 .owl-prev, .brand-slider.style1 .soap-gallery-prev {
left: 28px;
}

.post-slideshow .owl-prev:before, .post-slideshow .soap-gallery-prev:before, .soap-gallery .owl-prev:before, .soap-gallery .soap-gallery-prev:before, .soap-gallery-wrapper .owl-prev:before, .soap-gallery-wrapper .soap-gallery-prev:before, .post-slider .owl-prev:before, .post-slider .soap-gallery-prev:before, .testimonials.owl-carousel .owl-prev:before, .testimonials.owl-carousel .soap-gallery-prev:before, .features-icon-slider .owl-prev:before, .features-icon-slider .soap-gallery-prev:before, .brand-slider.style1 .owl-prev:before, .brand-slider.style1 .soap-gallery-prev:before {
content: "\f177";
}

.post-slideshow .owl-next, .post-slideshow .soap-gallery-next, .soap-gallery .owl-next, .soap-gallery .soap-gallery-next, .soap-gallery-wrapper .owl-next, .soap-gallery-wrapper .soap-gallery-next, .post-slider .owl-next, .post-slider .soap-gallery-next, .testimonials.owl-carousel .owl-next, .testimonials.owl-carousel .soap-gallery-next, .features-icon-slider .owl-next, .features-icon-slider .soap-gallery-next, .brand-slider.style1 .owl-next, .brand-slider.style1 .soap-gallery-next {
right: 28px;
}

.post-slideshow .owl-next:before, .post-slideshow .soap-gallery-next:before, .soap-gallery .owl-next:before, .soap-gallery .soap-gallery-next:before, .soap-gallery-wrapper .owl-next:before, .soap-gallery-wrapper .soap-gallery-next:before, .post-slider .owl-next:before, .post-slider .soap-gallery-next:before, .testimonials.owl-carousel .owl-next:before, .testimonials.owl-carousel .soap-gallery-next:before, .features-icon-slider .owl-next:before, .features-icon-slider .soap-gallery-next:before, .brand-slider.style1 .owl-next:before, .brand-slider.style1 .soap-gallery-next:before {
content: "\f178";
}

.post-slideshow .owl-pagination, .soap-gallery .owl-pagination, .soap-gallery-wrapper .owl-pagination, .post-slider .owl-pagination, .testimonials.owl-carousel .owl-pagination, .features-icon-slider .owl-pagination, .brand-slider.style1 .owl-pagination {
display: none;
}

.post-slideshow:hover .owl-prev, .soap-gallery:hover .owl-prev, .soap-gallery-wrapper:hover .owl-prev, .post-slider:hover .owl-prev, .testimonials.owl-carousel:hover .owl-prev, .features-icon-slider:hover .owl-prev, .brand-slider.style1:hover .owl-prev {
left: 28px;
}

.post-slideshow:hover .owl-next, .soap-gallery:hover .owl-next, .soap-gallery-wrapper:hover .owl-next, .post-slider:hover .owl-next, .testimonials.owl-carousel:hover .owl-next, .features-icon-slider:hover .owl-next, .brand-slider.style1:hover .owl-next {
right: 28px;
}

#slideshow .tp-leftarrow.default {
left: 28px;
}

#slideshow .tp-leftarrow.default:before {
content: "\f177";
}

#slideshow .tp-rightarrow.default {
right: 28px;
}

#slideshow .tp-rightarrow.default:before {
content: "\f178";
}

/* 2.9. Sticky Notes ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.sticky-note {
padding: 25px 30px;
background: #edf6ff;
position: relative;
overflow: hidden;
margin-bottom: 30px;
}

.sticky-note > *:last-child {
margin-bottom: 0;
}

.sticky-note:after {
position: absolute;
content: "";
border-top: 23px solid #d4dde5;
border-right: 23px solid transparent;
right: -23px;
bottom: -23px;
background-color: #fff;
-moz-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
-webkit-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
}

.sticky-note:hover:after {
right: 0;
bottom: 0;
}

.sticky-note.style2 {
background: #ffefb7;
color: #c08d34;
}

.sticky-note.style2:after {
border-top-color: #d5a044;
}

.sticky-note.style3 {
background: #ffe4e4;
color: #c05454;
}

.sticky-note.style3:after {
border-top-color: #d66c6c;
}

.sticky-note.style4 {
background: #d8f1a9;
color: #74952b;
}

.sticky-note.style4:after {
border-top-color: #89a648;
}

/* 2.10. Social Icons ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.social-icons {
margin-bottom: 10px;
}

.social-icons:after {
display: table;
content: "";
clear: both;
}

.social-icons .social-icon {
display: block;
float: left;
margin-right: 9px;
margin-bottom: 15px;
line-height: 0;
}

.social-icons .social-icon:last-child {
margin-right: 0;
}

.social-icons .social-icon i {
font-size: 1.0833em;
border-color: #d4dde5;
overflow: hidden;
color: #d4dde5;
width: 2.2em;
height: 2.2em;
line-height: 2.16em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
}

.social-icons .social-icon:hover i {
border-color: transparent;
color: #fff;
background: {{ $color }};
}

.social-icons .social-icon:hover i:before {
-webkit-animation: fadeInDown 0.3s ease-in;
-moz-animation: fadeInDown 0.3s ease-in;
animation: fadeInDown 0.3s ease-in;
display: inline-block;
}

.social-icons .social-icon:last-child {
margin-right: 0;
}

.social-icons.full-width {
display: block;
}

.social-icons.full-width .social-icon {
display: table-cell;
float: none;
width: 1%;
margin: 0;
text-align: center;
}

.social-icons.size-lg .social-icon {
margin-right: 10px;
}

.social-icons.size-lg .social-icon i {
font-size: 1.6667em;
}

.social-icons.size-md .social-icon {
margin-right: 10px;
}

.social-icons.size-md .social-icon i {
font-size: 1.1667em;
}

.social-icons.size-sm .social-icon {
margin-right: 10px;
}

.social-icons.size-sm .social-icon i {
font-size: 1em;
width: 2.4em;
height: 2.4em;
line-height: 2.35em;
}

.social-icons.style1 .social-icon i {
color: #d4dde5;
border: 1px solid #d4dde5;
}

.social-icons.style1 .social-icon:hover i {
border-color: transparent;
color: #fff;
}

.social-icons.style2 .social-icon i {
color: #fff;
border: none;
background: {{ $color }};
}

.social-icons.style2 .social-icon:hover i {
background: {{ $secondColor }};
}

.social-icons.style3 .social-icon i {
color: #fff;
border: none;
background: #1b4268;
}

.social-icons.style3 .social-icon:hover i {
background: #22486d;
}

/* 2.11. Callout Box ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.callout-box {
position: relative;
}

.callout-box .callout-content {
display: table;
width: 100%;
}

.callout-box .callout-text {
display: table-cell;
vertical-align: middle;
}

.callout-box .callout-text > * {
margin-bottom: 0;
}

.callout-box .callout-action {
display: table-cell;
padding-left: 40px;
vertical-align: middle;
white-space: nowrap;
}

.callout-box.style1 {
/*.callout-content { height: 100%; padding-bottom: 20px; }*/
}

.callout-box.style1 .callout-box-wrapper {
background: rgba(147, 159, 170, 0.95);
}

.callout-box.style1 .callout-box-wrapper > .container > .row > div:not(.callout-content-container) {
z-index: 1;
}

.callout-box.style1 .callout-box-wrapper.bg-blue {
background: rgba(15, 37, 65, 0.95);
}

.callout-box.style1 .callout-box-wrapper.bg-blue .desc-sm {
color: #455b79;
}

.callout-box.style1 .callout-content-container:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.callout-box.style1 .callout-content {
display: inline-block;
height: auto;
width: 98%;
vertical-align: middle;
}

.callout-box.style1 .callout-text h2, .callout-box.style1 .callout-text h3 {
color: #fff;
font-size: 3.3333em;
padding-right: 35px;
border-right: 1px solid rgba(255, 255, 255, 0.1);
}

.callout-box.style1 .callout-text h3 {
font-size: 2.5em;
}

.callout-box.style1 .btn {
color: #fff;
border-color: #fff;
}

.callout-box.style1 .btn:hover {
border-color: {{ $color }};
}

.callout-box.style1 .container {
position: relative;
}

.callout-box.style1 .callout-image-container {
display: table;
width: 100%;
height: 100%;
table-layout: fixed;
}

.callout-box.style1 .callout-image {
position: relative;
z-index: 1;
display: table-cell;
vertical-align: bottom;
}

.callout-box.style1 .callout-image img {
margin-top: 5px;
}

.callout-box.style1 .callout-stripe {
position: absolute;
bottom: 0;
right: 0;
float: none;
padding: 0;
color: #fff;
background: {{ $color }};
padding: 7px 0 7px 50px;
font-size: 0.8333em;
font-weight: 600;
text-transform: uppercase;
letter-spacing: 0.1em;
z-index: 0;
}

.callout-box.style1 .callout-stripe:after {
content: "";
display: block;
position: absolute;
top: 0;
left: 100%;
height: 100%;
bottom: 0;
width: 1000px;
background: {{ $color }};
}

.callout-box.style1 .callout-stripe img {
margin-right: 8px;
}

.callout-box.style1 .desc-lg {
font-size: 1.3333em;
color: #fff;
margin-bottom: 8px;
}

.callout-box.style1 .desc-sm {
font-size: 0.8333em;
color: #fff;
text-transform: uppercase;
font-weight: 600;
letter-spacing: 0.1em;
}

.callout-box.style2 .callout-action, .callout-box.style3 .callout-action {
text-align: right;
}

.callout-box.style2 .callout-text *, .callout-box.style3 .callout-text * {
color: #fff;
line-height: 1.6667em;
}

.callout-box.style2 {
background: #1b4268;
padding: 30px 0;
}

.callout-box.style2 .btn {
color: #fff;
border-color: #fff;
padding: 0 45px;
}

.callout-box.style2 .btn:hover {
border-color: {{ $color }};
}

.callout-box.style3 {
background: {{ $color }};
padding: 40px 0;
}

.callout-box.style3 .callout-text * {
font-size: 2.5em;
}

.callout-box.style3 .btn:hover {
color: #fff;
background: #1b4268;
}

/* 2.12. Slider ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.flexslider {
border: none;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
box-shadow: none;
margin: 0;
z-index: 0;
position: relative;
}

/* 2.13. Parallax ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.parallax {
background-attachment: fixed;
background-position: 50% 0;
background-repeat: no-repeat;
background-size: auto auto;
/*background-size: cover;*/
overflow: hidden;
position: static;
}

.parallax.has-caption:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.parallax .container {
-webkit-backface-visibility: hidden;
}

.parallax-elem {
position: relative;
overflow: hidden;
background: #000;
min-height: 500px;
}

.parallax-elem .video-container {
position: absolute;
left: 0;
top: 0;
height: 100%;
}

.parallax-elem .no-parallax {
top: 0 !important;
}

.parallax-elem .mejs-container, .parallax-elem .mejs-layer {
width: 100% !important;
height: 100% !important;
}

.image-banner {
background-repeat: no-repeat;
background-size: cover;
background-position: center bottom;
position: relative;
overflow: hidden;
}

.image-banner .caption-wrapper {
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 100%;
z-index: 1;
}

.image-banner .caption-wrapper.position-right {
right: 0;
max-width: 48%;
padding-right: 30px;
padding-left: 0;
}

.image-banner .caption-wrapper.position-left {
left: 0;
max-width: 48%;
padding-left: 30px;
padding-right: 0;
}

.image-banner .caption-wrapper.position-left:before, .image-banner .caption-wrapper.position-right:before, .image-banner .caption-wrapper.position-middle:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.image-banner .caption-wrapper.position-left .captions, .image-banner .caption-wrapper.position-right .captions, .image-banner .caption-wrapper.position-middle .captions {
display: inline-block;
width: 98%;
vertical-align: middle;
text-align: left;
}

.image-banner .caption-wrapper.position-left h2, .image-banner .caption-wrapper.position-right h2, .image-banner .caption-wrapper.position-middle h2 {
color: #b2afb2;
font-size: 8.3333em;
line-height: 1;
letter-spacing: -0.1em;
}

.image-banner .caption-wrapper.position-left .action, .image-banner .caption-wrapper.position-right .action, .image-banner .caption-wrapper.position-middle .action {
color: #fff;
text-decoration: underline;
font-size: 1.1667em;
text-transform: uppercase;
white-space: nowrap;
}

.image-banner .caption-wrapper.position-left .action:hover, .image-banner .caption-wrapper.position-right .action:hover, .image-banner .caption-wrapper.position-middle .action:hover {
color: #8c868c;
}

.image-banner .btn {
position: relative;
z-index: 1;
}

.image-banner .image-container.style-abs {
position: absolute;
top: 40px;
}

.image-banner .image-container.style-abs.position-right {
right: 0;
max-width: 48%;
}

.image-banner .image-container.style-abs.position-left {
left: 0;
max-width: 48%;
}

#main .image-banner:first-child {
margin-top: 40px;
}

.post-slider.style4 .caption-wrapper, .parallax > .caption-wrapper {
width: 99%;
display: inline-block;
vertical-align: middle;
text-align: center;
}

.post-slider.style4 .caption-wrapper > *:last-child, .parallax > .caption-wrapper > *:last-child {
margin-bottom: 0;
}

.post-slider.style4 .caption, .parallax .caption {
line-height: 1em;
text-transform: uppercase;
-webkit-border-radius: 1.25em 1.25em 1.25em 1.25em;
-moz-border-radius: 1.25em 1.25em 1.25em 1.25em;
-ms-border-radius: 1.25em 1.25em 1.25em 1.25em;
border-radius: 1.25em 1.25em 1.25em 1.25em;
display: inline-block;
font-weight: 600;
margin-bottom: 10px;
}

.post-slider.style4 .caption.size-lg, .parallax .caption.size-lg {
font-size: 2.0833em;
background: #fff;
color: #1b4268;
padding: 0.5em 1.5em;
}

.post-slider.style4 .caption.size-md, .parallax .caption.size-md {
font-size: 1.1667em;
background: {{ $color }};
color: #fff;
padding: 0.8em 2em;
}

/* 3. Header ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 3.1. Main Header ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
#header {
height: 84px;
position: absolute;
top: 0;
width: 100%;
z-index: 101;
left: 0;
color: #000;
}

#header.header-color-white {
color: #fff;
}

#header.header-color-white .logo a {
color: #fff;
}

#header.header-sticky {
position: fixed;
background: rgba(255, 255, 255, 0.9);
left: 0;
top: 0;
box-shadow: 0 1px 3px rgba(0, 0, 0, 0.11);
color: #333;
height: auto;
-webkit-backface-visibility: hidden;
}

#header.header-sticky #nav > ul > li > a {
line-height: 54px;
}

#header.header-sticky .logo a {
color: #333;
}

#header .header-inner {
display: table;
width: 100%;
position: relative;
}

#header .header-top-nav {
float: right;
}

#header #nav {
text-align: right;
}

#header .logo {
font-size: 1.6667em;
text-transform: uppercase;
font-weight: 600;
background-image: url("../miracle/images/logo.png");
background-repeat: no-repeat;
margin-bottom: 0;
}

#header .logo a {
font-size: 16px;
}

@media all and (-webkit-min-device-pixel-ratio: 1.5), all and (-o-min-device-pixel-ratio: 3 / 2), all and (min--moz-device-pixel-ratio: 1.5), all and (min-device-pixel-ratio: 1.5) {
#header .logo {
background-image: url("../miracle/images/logo@2x.png");
background-size: 25px 26px;
}
}

#header .logo a {
color: #000;
}

#header .logo img {
margin-right: 5px;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
width: 25px;
height: auto;
}

#header .mini-search {
position: relative;
}

#header .mini-search .main-nav-search-form {
position: absolute;
z-index: 9;
right: -1px;
top: 0;
bottom: 0;
width: 354px;
display: none;
text-align: right;
}

#header .mini-search .main-nav-search-form:before {
display: inline-block;
content: "";
vertical-align: middle;
height: 100%;
}

#header .mini-search .main-nav-search-form form {
display: inline-block;
width: 98%;
}

#header .mini-search .main-nav-search-form input[type=text] {
height: 32px;
border: none;
-webkit-border-radius: 16px 16px 16px 16px;
-moz-border-radius: 16px 16px 16px 16px;
-ms-border-radius: 16px 16px 16px 16px;
border-radius: 16px 16px 16px 16px;
border: 1px solid {{ $color }};
padding-left: 15px;
padding-right: 30px;
outline: none;
}

#header .mini-search .main-nav-search-form button {
background: none;
border: none;
position: absolute;
margin-top: 0;
right: 12px;
top: 0;
bottom: 0;
height: 100%;
outline: none;
}

#header .mini-search .main-nav-search-form button i {
display: block;
height: 34px;
line-height: 34px;
font-size: 14px;
}

#header .mini-search .main-nav-search-form button:hover .fa {
color: {{ $secondColor }};
}

#header .mini-search .main-nav-search-form .fa {
height: 32px;
line-height: 32px;
}

/* 3.2. Slideshow ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
#slideshow {
position: relative;
}

#slideshow .revolution-slider {
position: relative;
z-index: 1;
}

#slideshow .ads-carousel-wrap {
position: absolute;
bottom: 0;
z-index: 2;
left: 0;
width: 100%;
}

#slideshow .ads-carousel-wrap .container {
padding-left: 0;
padding-right: 0;
}

.ads-carousel .image-banner .caption-wrapper {
max-width: 60%;
}

.ads-carousel .image-banner .caption-wrapper .captions {
width: 94%;
}

.ads-carousel .captions .title {
font-size: 4.1667em;
color: #343434;
line-height: 1;
letter-spacing: -0.1em;
}

/* 3.3. Page Title Container ~~~~~~~~~~~~~~~~~~~~~~~ */
.page-title-container {
position: relative;
overflow: visible;
}

.page-title-container .entry-title {
font-weight: 300;
font-size: 3.3333em;
color: #343434;
text-align: center;
}

.page-title-container .page-title {
padding: 120px 0 25px;
}

.page-title-container .breadcrumbs {
position: absolute;
bottom: 0;
left: 50%;
-webkit-transform: translate(-50%, 50%);
-moz-transform: translate(-50%, 50%);
-ms-transform: translate(-50%, 50%);
-o-transform: translate(-50%, 50%);
transform: translate(-50%, 50%);
background: #fff;
-webkit-border-radius: 18px 18px 18px 18px;
-moz-border-radius: 18px 18px 18px 18px;
-ms-border-radius: 18px 18px 18px 18px;
border-radius: 18px 18px 18px 18px;
padding: 0 25px;
white-space: nowrap;
}

.page-title-container .breadcrumbs li {
display: inline-block;
line-height: 36px;
font-size: 0.8333em;
text-transform: uppercase;
margin-left: 5px;
}

.page-title-container .breadcrumbs li:first-child {
margin-left: 0;
}

.page-title-container .breadcrumbs li a {
padding-right: 5px;
}

.page-title-container .breadcrumbs li:after {
content: "-";
}

.page-title-container .breadcrumbs li:last-child:after {
content: "";
}

.page-title-container .breadcrumbs li.active {
color: {{ $color }};
}

.page-title-container .banner {
background-repeat: no-repeat;
padding: 120px 0;
background-position: center top;
}

.page-title-container .banner .container {
height: 100%;
}

.page-title-container .banner .caption-wrapper {
height: 100%;
text-align: center;
max-width: 50%;
padding: 0;
}

.page-title-container .banner .caption-wrapper.position-right {
float: right;
}

.page-title-container .banner .caption-wrapper:before {
content: '';
display: inline-block;
height: 100%;
vertical-align: middle;
}

.page-title-container .banner .caption {
display: inline-block;
vertical-align: middle;
max-width: 98%;
}

.page-title-container .banner .caption .caption-lg {
font-size: 8.3333em;
font-weight: 300;
color: #fff;
}

.page-title-container .banner .caption .caption-sm {
font-weight: 600;
font-size: 1.1667em;
color: {{ $color }};
}

.page-title-container.style2 {
background: url("http://placehold.it/1920x240") no-repeat;
}

.page-title-container.style2 .entry-title {
color: #fff;
}

.page-title-container.style3 {
background-image: url("http://placehold.it/1920x358");
background-size: cover;
}

.page-title-container.style4 .banner {
height: 682px;
background-image: url("http://placehold.it/1920x684");
}

.page-title-container.style4 .caption {
text-transform: none;
}

.page-title-container.style5 .banner {
height: 682px;
background-image: url("http://placehold.it/1920x1280");
}

.page-title-container.style5 .caption {
text-transform: none;
}

.page-title-container.style5 .caption .caption-lg {
font-size: 5.8333em;
color: {{ $color }};
line-height: 1.1667em;
}

.page-title-container.style5 .caption .caption-sm {
color: #343434;
}

.page-title-container.style6 .banner {
height: 682px;
background-image: url("http://placehold.it/1920x812");
}

.page-title-container.style6 .caption {
text-transform: none;
}

.page-title-container.style6 .caption [class^="caption-"], .page-title-container.style6 .caption [class*=" caption-"] {
color: #343434;
line-height: 1em;
}

.page-title-container.style6 .caption .caption-xl {
font-size: 10em;
}

.page-title-container.style6 .caption .caption-lg {
font-size: 8.3333em;
font-family: inherit;
}

.page-title-container.style6 .caption .caption-md {
font-size: 1.6667em;
letter-spacing: 0.04em;
}

.page-title-container.style6 .caption .caption-sm {
font-size: 1.1667em;
letter-spacing: 0.04em;
}

.page-title-container.style6 .social-icons .social-icon i {
color: #fff;
border-color: #fff;
}

.page-title-container.style6 .social-icons .social-icon:hover i {
border-color: {{ $color }};
}

/* 3.4. Main Menu ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
#nav {
text-align: right;
/* lst level */
/* 2st level */
/* 3st level */
/* mega menu */
/* mini cart */
/* light style */
/* dark style */
/* colored style */
}

#nav .mini-cart .fa, #nav .mini-search .fa {
color: {{ $color }};
}

#nav .mini-cart > a {
padding: 0 10px;
}

#nav .mini-search > a {
padding: 0 0 0 10px;
}

#nav .menu-item-has-children:hover > .sub-nav {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
visibility: visible;
-webkit-animation: fadeInRight 0.3s forwards;
-moz-animation: fadeInRight 0.3s forwards;
animation: fadeInRight 0.3s forwards;
-moz-animation: fadeIn 0.5s forwards;
}

#nav li.active > a {
color: {{ $color }};
}

#nav > ul > li {
display: inline-block;
position: relative;
vertical-align: middle;
text-align: left;
}

#nav > ul > li > a {
display: block;
font-size: 13px;
font-weight: bold;
font-weight: 700;
text-transform: uppercase;
line-height: 84px;
padding: 0 25px;
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
}

#nav .sub-nav {
position: absolute;
top: 100%;
left: 0;
visibility: hidden;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
width: 240px;
padding: 20px 0;
}

#nav .sub-nav li {
padding: 0 25px;
}

#nav .sub-nav li a {
font-size: 1.0833em;
padding: 8px 0;
display: block;
}

#nav .sub-nav li.menu-item-has-children {
position: relative;
}

#nav .sub-nav.position-left {
right: 0;
left: auto;
}

#nav .sub-nav .sub-nav {
top: -20px;
left: 100%;
}

#nav .sub-nav .sub-nav.position-left {
left: -100%;
}

#nav > ul > .mega-menu-item {
position: static;
}

#nav > ul > .mega-menu-item .sub-nav {
width: 100%;
}

#nav > ul > .mega-menu-item:hover .sub-nav {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
visibility: visible;
}

#nav > ul > .mega-menu-item > .sub-nav {
left: 0;
padding: 20px 0;
}

#nav > ul > .mega-menu-item > .sub-nav > li {
float: left;
padding: 0 25px;
}

#nav > ul > .mega-menu-item > .sub-nav > li > a {
cursor: default;
margin-bottom: 5px;
}

#nav > ul > .mega-menu-item > .sub-nav:after {
display: table;
content: "";
clear: both;
}

#nav > ul > .mega-menu-item.mega-column-1 > .sub-nav > li {
width: 100%;
float: none;
}

#nav > ul > .mega-menu-item.mega-column-2 > .sub-nav > li {
width: 50%;
}

#nav > ul > .mega-menu-item.mega-column-3 > .sub-nav > li {
width: 33.3333%;
}

#nav > ul > .mega-menu-item.mega-column-4 > .sub-nav > li {
width: 25%;
}

#nav > ul > .mega-menu-item.mega-column-5 > .sub-nav > li {
width: 20%;
}

#nav > ul > .mega-menu-item.mega-column-6 > .sub-nav > li {
width: 16.6666%;
}

#nav > ul > .mega-menu-item .sub-nav .sub-nav {
position: static;
padding: 0;
-webkit-animation: none 1s ease-in-out;
-moz-animation: none 1s ease-in-out;
animation: none 1s ease-in-out;
background: none !important;
}

#nav > ul > .mega-menu-item .sub-nav .sub-nav li {
padding: 0;
}

#nav > ul > .mega-menu-item .sub-nav .sub-nav li a {
padding: 9px 0;
}

#nav > ul > .mega-menu-item .sub-nav .sub-nav li .fa {
width: 30px;
text-align: left;
}

#nav .mini-cart .cart-content {
left: auto;
right: 0;
padding: 25px;
width: 300px;
}

#nav .mini-cart .cart-content .product-list li {
padding: 0;
background: none;
}

#nav .mini-cart .cart-content .product-list li .product-title {
padding: 0;
}

#nav .mini-cart .cart-content .product-list .empty {
color: inherit;
font-size: 1.0833em;
}

#nav .mini-cart .cart-content .btn-view-cart {
padding: 0 20px;
font-size: 0.8333em;
}

#nav .mini-cart .cart-content .btn-view-cart .fa {
margin-right: 10px;
font-size: 12px;
}

#nav .mini-cart .cart-content .cart-action, #nav .mini-cart .cart-content .cart-price {
display: table-cell;
vertical-align: middle;
}

#nav .mini-cart .cart-content .cart-price {
text-align: right;
font-size: 1.0833em;
}

#nav .mini-cart .cart-content .total-price {
padding-left: 15px;
}

#nav .btn-cart-view-hover-style, #nav .mini-cart .cart-content .btn-view-cart:hover, #nav.style-dark .mini-cart .cart-content .btn-view-cart:hover {
color: #fff;
background: {{ $color }};
border-color: {{ $color }};
}

#nav .btn-cart-view-hover-style .fa, #nav .mini-cart .cart-content .btn-view-cart:hover .fa {
color: inherit;
}

#nav li.menu-item-has-children > .sub-nav {
background: rgba(255, 255, 255, 0.9);
}

#nav > ul > li.menu-item-has-children:hover > a {
color: #000;
background: rgba(255, 255, 255, 0.9);
}

#nav .sub-nav {
color: #6a6a6a;
}

#nav .sub-nav li:hover > a, #nav .sub-nav li.active > a {
color: #000;
}

#nav .sub-nav li:hover > a .fa, #nav .sub-nav li.active > a .fa {
color: {{ $color }};
}

#nav > ul > .mega-menu-item > .sub-nav > li > a {
color: #000;
}

#nav .mini-cart .cart-content .product-list li, #nav .mini-cart .cart-content .product-title, #nav .mini-cart .cart-content .btn-view-cart {
color: #6a6a6a;
border-color: #b7b7b7;
}

#nav .mini-cart .cart-content .btn-view-cart .fa {
color: #b7b7b7;
}

#nav .mini-cart .cart-content .product-title:hover {
color: {{ $color }};
}

#nav .mini-cart .cart-content hr {
border-color: #f0efef;
}

#nav .mini-cart .cart-content .total-price {
color: {{ $color }};
}

#nav .mini-search .main-nav-search-form input[type=text] {
background: #fff;
}

#nav.style-dark .style-dark-color, #nav.style-dark .mini-cart .cart-content .product-list li, #nav.style-dark .mini-cart .cart-content .product-title, #nav.style-dark .mini-cart .cart-content .btn-view-cart {
color: #fff;
border-color: #fff;
}

#nav.style-dark li.menu-item-has-children > .sub-nav {
background: rgba(0, 0, 0, 0.9);
}

#nav.style-dark > ul > li.menu-item-has-children:hover > a {
color: #fff;
background: rgba(0, 0, 0, 0.9);
}

#nav.style-dark .sub-nav {
color: #6a6a6a;
}

#nav.style-dark .sub-nav li:hover > a, #nav.style-dark .sub-nav li.active > a {
color: #fff;
}

#nav.style-dark .sub-nav li:hover > a .fa, #nav.style-dark .sub-nav li.active > a .fa {
color: {{ $color }};
}

#nav.style-dark > ul > .mega-menu-item > .sub-nav > li > a {
color: #fff;
}

#nav.style-dark .mini-cart .cart-content .btn-view-cart .fa {
color: #fff;
}

#nav.style-dark .mini-cart .cart-content .product-title:hover {
color: {{ $color }};
}

#nav.style-dark .mini-cart .cart-content hr {
border-color: #202020;
}

#nav.style-dark .mini-cart .cart-content .total-price {
color: #fff;
}

#nav.style-dark .mini-search .main-nav-search-form input[type=text] {
background: #000;
}

#nav.style-colored .style-colored-color, #nav.style-colored .mini-cart .cart-content .product-list li, #nav.style-colored .mini-cart .cart-content .product-title, #nav.style-colored .mini-cart .cart-content .btn-view-cart .fa {
color: #ffc299;
}

#nav.style-colored .mini-cart:hover .fa, #nav.style-colored .mini-search:hover .fa {
color: #fff;
border-color: #fff;
}

#nav.style-colored li.menu-item-has-children > .sub-nav {
background: {{ $color }};
}

#nav.style-colored > ul > li.menu-item-has-children:hover > a {
color: #fff;
background: {{ $color }};
}

#nav.style-colored .sub-nav {
color: #ffc299;
}

#nav.style-colored .sub-nav li:hover > a, #nav.style-colored .sub-nav li.active > a {
color: #fff;
}

#nav.style-colored .sub-nav li:hover > a .fa, #nav.style-colored .sub-nav li.active > a .fa {
color: #1b4268;
}

#nav.style-colored > ul > .mega-menu-item > .sub-nav > li > a {
color: #fff;
}

#nav.style-colored .mini-cart .cart-content .btn-view-cart {
color: #fff;
border-color: #fff;
}

#nav.style-colored .mini-cart .cart-content .product-title:hover {
color: #fff;
}

#nav.style-colored .mini-cart .cart-content .btn-view-cart:hover {
background: #1b4268;
border-color: #1b4268;
}

#nav.style-colored .mini-cart .cart-content .btn-view-cart:hover .fa {
color: #fff;
}

#nav.style-colored .mini-cart .cart-content hr {
border-color: {{ $secondColor }};
}

#nav.style-colored .mini-cart .cart-content .product-price, #nav.style-colored .mini-cart .cart-content .total-price {
color: #fff;
}

#nav.style-colored .mini-search .main-nav-search-form input[type=text] {
background: #000;
}

#header.header-sticky #nav {
/*@extend #nav.style-dark;*/
}

#header.header-sticky #nav .mini-search .main-nav-search-form input[type="text"] {
background: #fff;
}

#header.header-sticky #nav > ul > li.menu-item-has-children > .sub-nav {
box-shadow: 0 -1px 3px rgba(0, 0, 0, 0.11);
}

/* 3.5. Mobile Menu ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.mobile-nav-wrapper {
background: #0b1c32;
}

.mobile-nav {
padding: 15px 20px 40px;
color: #455b79;
font-size: 1.0833em;
}

.mobile-nav li > a {
display: block;
}

.mobile-nav li.active > a {
color: {{ $color }};
}

.mobile-nav > li > a {
font-weight: 700;
text-transform: uppercase;
line-height: 3.5em;
border-bottom: 1px solid #17283c;
letter-spacing: 0.1em;
}

.mobile-nav .sub-nav {
display: none;
}

.mobile-nav .menu-item-has-children {
position: relative;
}

.mobile-nav .menu-item-has-children .open-subnav {
position: absolute;
right: 0;
text-align: center;
width: 1.8em;
height: 1.8em;
line-height: 1.65em;
cursor: pointer;
-moz-transition: all 0.3s ease 0s;
-o-transition: all 0.3s ease 0s;
-webkit-transition: all 0.3s ease 0s;
-ms-transition: all 0.3s ease 0s;
transition: all 0.3s ease 0s;
top: 1.1em;
font-size: 12px;
}

.mobile-nav .menu-item-has-children .open-subnav:before {
font-family: FontAwesome;
content: "\f105";
}

.mobile-nav .menu-item-has-children.opened > .open-subnav, .mobile-nav .menu-item-has-children > .open-subnav:hover {
color: {{ $color }};
}

.mobile-nav .menu-item-has-children.opened > a {
color: {{ $color }};
}

.mobile-nav .menu-item-has-children.opened > .open-subnav:before {
content: "\f107";
}

.mobile-nav .menu-item-has-children.opened .opened .sub-nav {
color: #fff;
}

.mobile-nav > .menu-item-has-children > .open-subnav {
border: 1px solid;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.mobile-nav > .menu-item-has-children.opened > .open-subnav, .mobile-nav > .menu-item-has-children > .open-subnav:hover {
border: 1px solid {{ $color }};
color: #fff;
background: {{ $color }};
}

.mobile-nav > .menu-item-has-children.opened > a {
color: #fff;
}

.mobile-nav.current-menu-item > a {
color: #fff;
}

.mobile-nav .sub-nav {
font-family: "Open Sans", Arial, Helvetica, sans-serif;
padding: 25px 0 20px 30px;
}

.mobile-nav .sub-nav a {
line-height: 3em;
}

.mobile-nav .sub-nav .fa {
margin-right: 10px;
}

.mobile-nav .sub-nav .sub-nav {
padding: 0 0 0 20px;
}

/* 4. Main Content ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 4.1. Galleries ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.soap-gallery.style1 {
overflow: hidden;
}

.soap-gallery.style1 .owl-buttons .owl-prev, .soap-gallery.style1 .owl-buttons .owl-next {
width: 236px;
height: 88px;
background-color: none;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
border: none;
margin-top: -44px;
padding: 10px;
line-height: 68px;
color: #feffff;
font-size: 10px;
text-indent: 0;
text-transform: uppercase;
-moz-transition: all 0.35s ease 0s;
-o-transition: all 0.35s ease 0s;
-webkit-transition: all 0.35s ease 0s;
-ms-transition: all 0.35s ease 0s;
transition: all 0.35s ease 0s;
}

.soap-gallery.style1 .owl-buttons .owl-prev:before, .soap-gallery.style1 .owl-buttons .owl-next:before {
float: right;
margin-top: 20px;
}

.soap-gallery.style1 .owl-buttons .owl-prev .slide-index, .soap-gallery.style1 .owl-buttons .owl-next .slide-index {
display: inline-block;
}

.soap-gallery.style1 .owl-buttons .owl-prev .imageholder, .soap-gallery.style1 .owl-buttons .owl-next .imageholder {
display: inline-block;
float: left;
width: 68px;
height: 68px;
background-repeat: no-repeat;
background-position: center center;
background-size: cover;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
margin-right: 20px;
}

.soap-gallery.style1 .owl-buttons .owl-prev .imageholder, .soap-gallery.style1 .owl-buttons .owl-prev .slide-index, .soap-gallery.style1 .owl-buttons .owl-next .imageholder, .soap-gallery.style1 .owl-buttons .owl-next .slide-index {
display: none;
}

.soap-gallery.style1 .owl-buttons .owl-prev {
left: -140px;
}

.soap-gallery.style1 .owl-buttons .owl-next {
right: -140px;
}

.soap-gallery.style1 .owl-buttons .owl-next:before {
float: left;
margin-right: 20px;
}

.soap-gallery.style1 .owl-buttons .owl-next .imageholder {
float: right;
margin-right: 0;
}

.soap-gallery.style1 .owl-buttons .owl-prev:hover, .soap-gallery.style1 .owl-buttons .owl-next:hover {
background-color: rgba(0, 0, 0, 0.5);
}

.soap-gallery.style1 .owl-buttons .owl-prev:hover .imageholder, .soap-gallery.style1 .owl-buttons .owl-prev:hover .slide-index, .soap-gallery.style1 .owl-buttons .owl-next:hover .imageholder, .soap-gallery.style1 .owl-buttons .owl-next:hover .slide-index {
display: block;
}

.soap-gallery.style1 .owl-buttons .owl-prev:hover {
left: 0;
}

.soap-gallery.style1 .owl-buttons .owl-next:hover {
right: 0;
}

.soap-gallery.style2 {
position: relative;
}

.soap-gallery.style2 > * {
display: none;
}

.soap-gallery.style2 img {
width: 100%;
}

.soap-gallery.style2 a {
float: left;
}

.soap-gallery.style2 > .caroufredsel_wrapper {
display: block;
}

.soap-gallery.style2 > .soap-gallery-prev, .soap-gallery.style2 > .soap-gallery-next {
display: block;
}

.soap-gallery.frame-holder {
width: 100%;
padding: 57px 0 76px;
position: relative;
}

.soap-gallery.frame-holder.effect-shine .owl-carousel:before {
content: "";
position: absolute;
display: block;
width: 310px;
height: 357px;
top: -33px;
right: -33px;
background: url(../miracle/images/shortcode/galleries/shine-effect.png) no-repeat;
background-size: 100% auto;
z-index: 1;
}

.soap-gallery.frame-holder .gallery-frame {
height: 100%;
position: absolute;
text-align: center;
top: 0;
width: 100%;
}

.soap-gallery.frame-holder .owl-carousel {
width: 594px;
margin: 0 auto;
z-index: 1;
}

.soap-gallery.frame-holder .owl-buttons .owl-prev:before, .soap-gallery.frame-holder .owl-buttons .owl-next:before {
color: #d4dde5;
border-color: #d5dde5;
}

.soap-gallery.frame-holder .owl-buttons .owl-prev:hover:before, .soap-gallery.frame-holder .owl-buttons .owl-next:hover:before {
color: #fff;
border-color: {{ $color }};
}

.soap-gallery.frame-holder .owl-buttons .owl-prev {
left: -136px;
}

.soap-gallery.frame-holder .owl-buttons .owl-next {
right: -136px;
}

.soap-gallery.metro-style {
max-width: 100%;
overflow: hidden;
}

.soap-gallery.metro-style a {
float: left;
max-width: 100%;
border-right: 6px solid transparent;
border-bottom: 6px solid transparent;
display: block;
}

.soap-gallery.metro-style a.double-width {
border-bottom: 0;
}

.soap-gallery.metro-style .gallery-wrapper {
overflow: hidden;
margin-right: -6px;
margin-bottom: -6px;
}

.soap-gallery.metro-style .gallery-wrapper:after {
content: "";
display: table;
clear: both;
}

.soap-gallery.small-post .image {
display: block;
}

.soap-gallery.small-post .post-content {
padding: 14px 16px;
background: #edf6ff;
}

.soap-gallery.small-post .post-title {
margin-bottom: 0;
color: #939faa;
font-weight: 400;
}

.soap-gallery.small-post .post-title:hover a {
color: #1b4268;
}

.soap-gallery.carousel-style1 {
width: 1170px;
}

.soap-gallery.carousel-style1 .slides > div {
display: none;
}

.soap-gallery.carousel-style1 .slideItem {
box-shadow: -14px 0 10px rgba(0, 0, 0, 0.25);
}

.soap-gallery-thumb-wrapper {
padding: 20px 0 4px 16px;
border: 1px solid #edf6ff;
text-align: center;
}

.soap-gallery-thumb-wrapper > a {
display: inline-block;
width: 99px;
height: 99px;
margin-right: 16px;
margin-bottom: 16px;
position: relative;
}

.soap-gallery-thumb-wrapper > a img {
width: 100%;
height: auto;
}

.soap-gallery-thumb-wrapper > a.selected:before {
content: "";
display: block;
position: absolute;
width: 100%;
height: 100%;
left: 0;
top: 0;
border: 2px solid {{ $color }};
}

.thumbnail-full ~ .soap-gallery-thumb-wrapper {
display: table;
table-layout: fixed;
width: 100%;
border-spacing: 10px;
padding: 0;
}

.thumbnail-full ~ .soap-gallery-thumb-wrapper > a {
display: table-cell;
width: 1%;
height: auto;
padding: 0;
}

.gallery-col-2 a {
width: 50%;
}

.gallery-col-2 a.double-width {
width: 100%;
}

.gallery-col-3 a {
width: 33.3333%;
}

.gallery-col-3 a.double-width {
width: 66.6666%;
}

.gallery-col-4 a {
width: 25%;
}

.gallery-col-4 a.double-width {
width: 50%;
}

.gallery-col-5 a {
width: 20%;
}

.gallery-col-5 a.double-width {
width: 40%;
}

/* 4.2. Icon Box ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.icon-box {
/*margin-bottom: 20px;*/
}

.icon-box.box {
margin-bottom: 30px;
}

.icon-box.box-lg {
margin-bottom: 40px;
}

.icon-box.block {
margin-bottom: 60px;
}

.icon-box .box-content p {
line-height: 1.8461em;
}

.icon-box .box-content > *:last-child {
margin-bottom: 0;
}

.icon-box[class*=" style-centered-"] {
text-align: center;
}

.icon-box[class*=" style-centered-"] > i {
margin-bottom: 20px;
cursor: default;
}

.icon-box[class*=" style-centered-"].style-centered-1 > i {
font-size: 30px;
color: {{ $color }};
}

.icon-box[class*=" style-centered-"].style-centered-2 > i, .icon-box[class*=" style-centered-"].style-centered-4 > i {
font-size: 50px;
width: 104px;
height: 104px;
text-align: center;
line-height: 104px;
-webkit-border-radius: 5px 5px 5px 5px;
-moz-border-radius: 5px 5px 5px 5px;
-ms-border-radius: 5px 5px 5px 5px;
border-radius: 5px 5px 5px 5px;
background: {{ $color }};
color: #fff;
position: relative;
overflow: hidden;
}

.icon-box[class*=" style-centered-"].style-centered-2 > i:before, .icon-box[class*=" style-centered-"].style-centered-4 > i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-centered-"].style-centered-2 > i:after, .icon-box[class*=" style-centered-"].style-centered-4 > i:after {
content: "";
display: block;
position: absolute;
z-index: 0;
right: 0;
top: 0;
border-right: 100px solid {{ $secondColor }};
border-bottom: 100px solid transparent;
-webkit-border-radius: 0 5px 0 0;
-moz-border-radius: 0 5px 0 0;
-ms-border-radius: 0 5px 0 0;
border-radius: 0 5px 0 0;
}

.icon-box[class*=" style-centered-"].style-centered-2:hover > i, .icon-box[class*=" style-centered-"].style-centered-4:hover > i {
background: #1b4268;
}

.icon-box[class*=" style-centered-"].style-centered-2:hover > i:after, .icon-box[class*=" style-centered-"].style-centered-4:hover > i:after {
border-right-color: #22486d;
}

.icon-box[class*=" style-centered-"].style-centered-3 > i {
font-size: 16px;
color: #fff;
width: 50px;
height: 50px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
line-height: 46px;
background: #1b4268;
border: 2px solid #1b4268;
position: relative;
overflow: hidden;
}

.icon-box[class*=" style-centered-"].style-centered-3 > i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-centered-"].style-centered-3 > i:after {
content: "";
display: block;
position: absolute;
z-index: 0;
left: 0;
top: 0;
width: 100%;
height: 50%;
-webkit-border-radius: 100px 100px 0 0;
-moz-border-radius: 100px 100px 0 0;
-ms-border-radius: 100px 100px 0 0;
border-radius: 100px 100px 0 0;
background: #325577;
-webkit-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

.icon-box[class*=" style-centered-"].style-centered-4 > i {
background: none;
color: {{ $color }};
border: 1px solid {{ $color }};
}

.icon-box[class*=" style-centered-"].style-centered-4 > i:after {
border-right-color: transparent;
}

.icon-box[class*=" style-centered-"].style-centered-4:hover > i {
background: {{ $color }};
color: #fff;
}

.icon-box[class*=" style-centered-"].style-centered-4:hover > i:after {
border-right-color: {{ $secondColor }};
}

.icon-box[class*=" style-side-"] > i {
float: left;
}

.icon-box[class*=" style-side-"].style-side-1 {
position: relative;
}

.icon-box[class*=" style-side-"].style-side-1 > i {
font-size: 40px;
color: {{ $color }};
}

.icon-box[class*=" style-side-"].style-side-1 > i:after {
content: "";
display: block;
position: absolute;
left: 62px;
top: 5px;
bottom: 5px;
width: 1px;
background: #edf6ff;
}

.icon-box[class*=" style-side-"].style-side-1.icon-color-blue > i {
color: #1b4268;
}

.icon-box[class*=" style-side-"].style-side-1 .box-content {
padding-left: 90px;
}

.icon-box[class*=" style-side-"].style-side-2 > i {
font-size: 20px;
color: #fff;
width: 50px;
height: 70px;
line-height: 70px;
text-align: center;
background: {{ $color }};
-webkit-border-radius: 25px 25px 25px 25px;
-moz-border-radius: 25px 25px 25px 25px;
-ms-border-radius: 25px 25px 25px 25px;
border-radius: 25px 25px 25px 25px;
margin-top: 10px;
}

.icon-box[class*=" style-side-"].style-side-2 .box-content {
padding-left: 80px;
}

.icon-box[class*=" style-side-"].style-side-3 > i {
font-size: 20px;
color: #fff;
width: 50px;
height: 50px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
line-height: 46px;
background: {{ $color }};
border: 2px solid {{ $color }};
position: relative;
overflow: hidden;
margin-right: 20px;
}

.icon-box[class*=" style-side-"].style-side-3 > i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-side-"].style-side-3 > i:after {
content: "";
display: block;
position: absolute;
z-index: 0;
left: 0;
top: 0;
width: 100%;
height: 50%;
-webkit-border-radius: 100px 100px 0 0;
-moz-border-radius: 100px 100px 0 0;
-ms-border-radius: 100px 100px 0 0;
border-radius: 100px 100px 0 0;
background: {{ $secondColor }};
-webkit-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

.icon-box[class*=" style-side-"].style-side-3 .box-title {
padding-top: 15px;
margin-bottom: 25px;
}

.icon-box[class*=" style-side-"].style-side-3.icon-color-blue > i {
background: #1b4268;
border-color: #1b4268;
}

.icon-box[class*=" style-side-"].style-side-3.icon-color-blue > i:after {
background: #325577;
}

.icon-box[class*=" style-side-"].style-side-4 > i {
font-size: 16px;
color: #fff;
width: 50px;
height: 50px;
position: relative;
line-height: 50px;
text-align: center;
background: {{ $color }};
margin-top: 5px;
}

.icon-box[class*=" style-side-"].style-side-4 > i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-side-"].style-side-4 > i:after {
content: "";
display: block;
position: absolute;
z-index: 0;
right: 0;
top: 0;
border-right: 50px solid {{ $secondColor }};
border-bottom: 50px solid transparent;
}

.icon-box[class*=" style-side-"].style-side-4 .box-content {
padding-left: 70px;
}

.icon-box[class*=" style-side-"].style-side-5, .icon-box[class*=" style-side-"].style-side-6 {
display: table;
}

.icon-box[class*=" style-side-"].style-side-5 .icon-container, .icon-box[class*=" style-side-"].style-side-6 .icon-container {
font-size: 25px;
width: 130px;
text-align: center;
padding-right: 20px;
}

.icon-box[class*=" style-side-"].style-side-5 i, .icon-box[class*=" style-side-"].style-side-6 i {
font-size: inherit;
width: 3.6em;
height: 3.6em;
text-align: center;
line-height: 3.6em;
color: #fff;
background: #d4dde5;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
-moz-transition: font-size 0.3s ease 0s;
-o-transition: font-size 0.3s ease 0s;
-webkit-transition: font-size 0.3s ease 0s;
-ms-transition: font-size 0.3s ease 0s;
transition: font-size 0.3s ease 0s;
position: relative;
overflow: hidden;
}

.icon-box[class*=" style-side-"].style-side-5 i:before, .icon-box[class*=" style-side-"].style-side-6 i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-side-"].style-side-5 i:after, .icon-box[class*=" style-side-"].style-side-6 i:after {
content: "";
display: block;
position: absolute;
z-index: 0;
left: 0;
top: 0;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
background: {{ $secondColor }};
height: 50%;
width: 100%;
-webkit-border-radius: 100px 100px 0 0;
-moz-border-radius: 100px 100px 0 0;
-ms-border-radius: 100px 100px 0 0;
border-radius: 100px 100px 0 0;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

.icon-box[class*=" style-side-"].style-side-5 .icon-container {
vertical-align: top;
padding-top: 0.5em;
}

.icon-box[class*=" style-side-"].style-side-5 i:hover {
background: {{ $color }};
-webkit-animation: spin 1s ease;
-moz-animation: spin 1s ease;
animation: spin 1s ease;
}

.icon-box[class*=" style-side-"].style-side-5 i:hover:after {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.icon-box[class*=" style-side-"].style-side-6 .icon-container {
text-align: left;
width: auto;
padding-right: 25px;
}

.icon-box[class*=" style-side-"].style-side-6 i {
border: 2px solid #d4dde5;
background: #fff;
color: {{ $color }};
font-size: 35px;
width: 2.8em;
height: 2.8em;
line-height: 2.8em;
}

.icon-box[class*=" style-side-"].style-side-6 i:hover {
background: {{ $color }};
border-color: {{ $color }};
color: #fff;
}

.icon-box[class*=" style-side-"].style-side-6 i:hover:after {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.icon-box[class*=" style-side-"].style-side-7 > i {
font-size: 16px;
color: {{ $color }};
width: 50px;
height: 50px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
line-height: 49px;
border: 1px solid {{ $color }};
position: relative;
overflow: hidden;
}

.icon-box[class*=" style-side-"].style-side-7 > i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-side-"].style-side-7 > i:after {
content: "";
position: absolute;
width: 48px;
height: 24px;
-webkit-border-radius: 24px 24px 0 0;
-moz-border-radius: 24px 24px 0 0;
-ms-border-radius: 24px 24px 0 0;
border-radius: 24px 24px 0 0;
display: none;
background: {{ $secondColor }};
left: 0;
top: 0;
-webkit-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
z-index: 0;
}

.icon-box[class*=" style-side-"].style-side-7 > i:hover {
color: #fff;
background: {{ $color }};
}

.icon-box[class*=" style-side-"].style-side-7 > i:hover:after {
display: block;
}

.icon-box[class*=" style-side-"].style-side-7 .box-content {
padding-left: 70px;
}

.icon-box[class*=" style-boxed-"].style-boxed-1, .icon-box[class*=" style-boxed-"].style-boxed-3 {
text-align: center;
position: relative;
border: 1px solid #edf6ff;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 .icon-container, .icon-box[class*=" style-boxed-"].style-boxed-3 .icon-container {
font-size: 30px;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 .icon-container i, .icon-box[class*=" style-boxed-"].style-boxed-3 .icon-container i {
width: 3.5em;
height: 3.5em;
text-align: center;
line-height: 3.5em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: {{ $color }};
color: #fff;
position: relative;
cursor: default;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 .icon-container i:before, .icon-box[class*=" style-boxed-"].style-boxed-3 .icon-container i:before {
position: relative;
z-index: 1;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 .icon-container i:after, .icon-box[class*=" style-boxed-"].style-boxed-3 .icon-container i:after {
content: "";
display: block;
position: absolute;
left: 0;
top: 0;
width: 3.5em;
height: 1.75em;
-webkit-border-radius: 1.75em 1.75em 0 0;
-moz-border-radius: 1.75em 1.75em 0 0;
-ms-border-radius: 1.75em 1.75em 0 0;
border-radius: 1.75em 1.75em 0 0;
background: {{ $secondColor }};
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

.icon-box[class*=" style-boxed-"].style-boxed-1.icon-color-blue .icon-container i, .icon-box[class*=" style-boxed-"].style-boxed-3.icon-color-blue .icon-container i {
background-color: #1b4268;
}

.icon-box[class*=" style-boxed-"].style-boxed-1.icon-color-blue .icon-container i:after, .icon-box[class*=" style-boxed-"].style-boxed-3.icon-color-blue .icon-container i:after {
background: #22486d;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 {
padding: 72px 30px 30px;
margin-top: 52px;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 .icon-container {
position: absolute;
left: 50%;
top: -1.75em;
margin-left: -1.75em;
}

.icon-box[class*=" style-boxed-"].style-boxed-1 .icon-container:before {
content: "";
display: block;
position: absolute;
left: -0.45em;
top: -0.45em;
width: 4.4em;
height: 2.2em;
border: 1px solid #edf6ff;
border-bottom: none;
-webkit-border-radius: 2.2em 2.2em 0 0;
-moz-border-radius: 2.2em 2.2em 0 0;
-ms-border-radius: 2.2em 2.2em 0 0;
border-radius: 2.2em 2.2em 0 0;
background: #fff;
}

.icon-box[class*=" style-boxed-"].style-boxed-1:hover .icon-container i {
background: {{ $color }};
}

.icon-box[class*=" style-boxed-"].style-boxed-1:hover .icon-container i:after {
background: {{ $secondColor }};
}

.icon-box[class*=" style-boxed-"].style-boxed-2 {
display: table;
border: 1px solid #edf6ff;
}

.icon-box[class*=" style-boxed-"].style-boxed-2 .icon-container i {
font-size: 40px;
color: {{ $color }};
padding: 0 45px;
}

.icon-box[class*=" style-boxed-"].style-boxed-2 .box-content {
background: #edf6ff;
padding: 20px 25px;
}

.icon-box[class*=" style-boxed-"].style-boxed-3 {
border-color: #d4dde5;
padding: 40px 30px;
-moz-transition: background 0.2s ease-in 0s;
-o-transition: background 0.2s ease-in 0s;
-webkit-transition: background 0.2s ease-in 0s;
-ms-transition: background 0.2s ease-in 0s;
transition: background 0.2s ease-in 0s;
}

.icon-box[class*=" style-boxed-"].style-boxed-3 .icon-container {
margin-bottom: 20px;
}

.icon-box[class*=" style-boxed-"].style-boxed-3:hover {
color: #fff;
background: #1b4268;
border-color: #1b4268;
}

.icon-box[class*=" style-boxed-"].style-boxed-3:hover .box-title a {
color: #fff;
}

.icon-box[class*=" style-boxed-"].style-boxed-3:hover .icon-container i {
background: #edf6ff;
color: {{ $color }};
}

.icon-box[class*=" style-boxed-"].style-boxed-3:hover .icon-container i:after {
background: #fff;
}

.icon-box[class*=" style-boxed-"].style-boxed-4 {
border: 2px solid #edf6ff;
text-align: center;
}

.icon-box[class*=" style-boxed-"].style-boxed-4 .icon-container {
padding: 35px 0;
color: {{ $color }};
}

.icon-box[class*=" style-boxed-"].style-boxed-4 .icon-container i {
font-size: 30px;
}

.icon-box[class*=" style-boxed-"].style-boxed-4 .box-content {
padding: 30px;
background: #edf6ff;
}

.image-box {
margin-bottom: 30px;
}

.image-box-style1 {
width: 74px;
height: 74px;
margin: 10px 15px 10px 0;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: {{ $color }};
text-align: center;
position: relative;
overflow: hidden;
}

.image-box-style1:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.image-box-style1:after {
content: "";
display: block;
position: absolute;
left: 0;
top: 0;
z-index: 0;
width: 100%;
height: 50%;
background: {{ $secondColor }};
-webkit-border-radius: 37px 37px 0 0;
-moz-border-radius: 37px 37px 0 0;
-ms-border-radius: 37px 37px 0 0;
border-radius: 37px 37px 0 0;
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
-webkit-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
}

.image-box-style1 img {
display: inline-block;
vertical-align: middle;
max-width: 60%;
position: relative;
z-index: 1;
}

/* 4.3. Banner ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.shortcode-banner {
position: relative;
overflow: hidden;
margin-bottom: 30px;
}

.shortcode-banner > img {
width: 100%;
height: auto;
}

.shortcode-banner .shortcode-banner-content {
padding: 20px 0 0;
}

.shortcode-banner .shortcode-banner-content .btn.style4 {
padding: 0 20px;
}

.shortcode-banner .shortcode-banner-content .btn.style4:hover {
background: #1b4268;
border-color: #1b4268;
}

.shortcode-banner .shortcode-banner-content .details {
margin-bottom: 20px;
}

.shortcode-banner.style-animated .shortcode-banner-inside {
position: absolute;
width: 101%;
height: 101%;
left: 0;
top: 50%;
/*background-color: mix($from-color, $to-color);*/
background-image: -webkit-gradient(linear, 0% 0%, 0% 50%, from({{ $rgba }}), to({{ $opaqueRgba }}));
background-image: -webkit-linear-gradient(top, {{ $rgba }} 0%, {{ $opaqueRgba }} 50%);
background-image: -moz-linear-gradient(top, {{ $rgba }} 0%, {{ $opaqueRgba }} 50%);
background-image: -ms-linear-gradient(top, {{ $rgba }} 0%, {{ $opaqueRgba }} 50%);
background-image: -o-linear-gradient(top, {{ $rgba }} 0%, {{ $opaqueRgba }} 50%);
-moz-transition: top 0.4s ease 0s;
-o-transition: top 0.4s ease 0s;
-webkit-transition: top 0.4s ease 0s;
-ms-transition: top 0.4s ease 0s;
transition: top 0.4s ease 0s;
}

.shortcode-banner.style-animated .shortcode-banner-inside:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.shortcode-banner.style-animated .shortcode-banner-inside .shortcode-banner-content {
display: inline-block;
width: 99%;
vertical-align: middle;
padding: 0 30px;
text-align: center;
}

.shortcode-banner.style-animated .shortcode-banner-inside .shortcode-banner-content .details {
display: none;
margin-bottom: 0;
}

.shortcode-banner.style-animated .shortcode-banner-inside .shortcode-banner-content .details > *:last-child {
margin-bottom: 0;
}

.shortcode-banner.style-animated .shortcode-banner-inside .shortcode-banner-content .banner-title {
text-transform: uppercase;
color: #fff;
letter-spacing: 0.2em;
border-bottom: 1px solid #fff;
display: inline-block;
line-height: 1.5em;
margin-bottom: 5em;
}

.shortcode-banner.style-animated:hover .shortcode-banner-inside {
background: rgba(27, 66, 104, 0.9);
top: 0;
}

.shortcode-banner.style-animated:hover .shortcode-banner-inside .shortcode-banner-content .details {
display: block;
}

.shortcode-banner.style-animated:hover .shortcode-banner-inside .shortcode-banner-content .banner-title {
margin-bottom: 20px;
}

/* 4.4. Process Builder ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.process-builder .process-item {
float: left;
text-align: center;
margin-bottom: 30px;
}

.process-builder.style-simple.items-2 .process-item {
width: 50%;
}

.process-builder.style-simple.items-3 .process-item {
width: 33.3333%;
}

.process-builder.style-simple.items-4 .process-item {
width: 25%;
}

.process-builder.style-simple.items-5 .process-item {
width: 20%;
}

.process-builder.style-simple.items-6 .process-item {
width: 16.6666%;
}

.process-builder.style-simple .process-icon {
display: inline-block;
font-size: 30px;
width: 3.4em;
height: 3.4em;
border: 2px solid #d4dde5;
line-height: 3.3em;
color: {{ $color }};
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
margin-bottom: 15px;
position: relative;
}

.process-builder.style-simple .process-icon:before, .process-builder.style-simple .process-icon:after {
content: "";
display: block;
position: absolute;
border-top: 2px solid #d4dde5;
width: 300%;
top: 50%;
margin-top: -1px;
}

.process-builder.style-simple .process-icon:before {
right: 100%;
margin-right: 12px;
}

.process-builder.style-simple .process-icon:after {
left: 100%;
margin-left: 12px;
}

.process-builder.style-simple .process-item {
overflow: hidden;
}

.process-builder.style-simple .process-item:first-child .process-icon:before {
display: none;
}

.process-builder.style-simple .process-item:last-child .process-icon:after {
display: none;
}

.process-builder.style-simple .process-item.active .process-icon, .process-builder.style-simple .process-item .process-icon:hover {
background: {{ $color }};
border: none;
color: #fff;
}

.process-builder.style-simple .process-item.active .process-icon i, .process-builder.style-simple .process-item .process-icon:hover i {
overflow: hidden;
position: relative;
width: 3.4em;
height: 3.4em;
line-height: 3.4em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.process-builder.style-simple .process-item.active .process-icon i:before, .process-builder.style-simple .process-item .process-icon:hover i:before {
position: relative;
z-index: 1;
}

.process-builder.style-simple .process-item.active .process-icon i:after, .process-builder.style-simple .process-item .process-icon:hover i:after {
content: "";
display: block;
position: absolute;
top: 0;
left: 0;
z-index: 0;
background: {{ $secondColor }};
width: 100%;
height: 50%;
-webkit-border-radius: 1.7em 1.7em 0 0;
-moz-border-radius: 1.7em 1.7em 0 0;
-ms-border-radius: 1.7em 1.7em 0 0;
border-radius: 1.7em 1.7em 0 0;
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
}

.process-builder.style-simple .process-details {
padding: 0 25px;
}

.process-builder.style-creative > li {
float: left;
}

.process-builder.style-creative .process-item {
padding-top: 10px;
position: relative;
position: relative;
margin-right: 70px;
}

.process-builder.style-creative .process-item .process-inside {
position: relative;
z-index: 1;
}

.process-builder.style-creative .process-item .process-image {
width: 168px;
height: 168px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 6px solid #fff;
background-repeat: no-repeat;
background-size: cover;
background-position: center center;
box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
margin-bottom: 20px;
}

.process-builder.style-creative .process-item .process-image img {
width: 100%;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.process-builder.style-creative .process-item .arrow {
position: absolute;
z-index: 0;
left: 100%;
top: 80px;
margin-left: -10px;
padding-left: 8px;
display: inline-block;
width: 60px;
height: 28px;
font-family: FontAwesome;
background: {{ $color }};
color: #fff;
font-size: 13px;
text-align: center;
line-height: 28px;
-webkit-border-radius: 0 14px 14px 0;
-moz-border-radius: 0 14px 14px 0;
-ms-border-radius: 0 14px 14px 0;
border-radius: 0 14px 14px 0;
}

.process-builder.style-creative .process-item .arrow:before {
content: "\f178";
}

.process-builder.style-creative .assets-item {
max-width: 100%;
}

/* 4.5. Post Slider ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.image .caption-wrapper, .post-slider.style3 .slide-text {
position: absolute;
left: 0;
padding: 15px 30px 15px 50px;
bottom: 20px;
background: #fe6600;
}

.image .caption-wrapper > *:last-child, .post-slider.style3 .slide-text > *:last-child {
margin-bottom: 0;
color: white;
}

.image .caption-wrapper .slide-title, .post-slider.style3 .slide-text .slide-title {
margin-bottom: 5px;
color: white;
}

.owl-item img {
width: 100%;
}

.post-slider .caption-animated {
visibility: hidden;
-webkit-animation-duration: 1s;
animation-duration: 1s;
-webkit-animation-fill-mode: both;
animation-fill-mode: both;
}

.post-slider.style2 .slide-text {
position: absolute;
bottom: 0;
left: 0;
width: 100%;
background: rgba(15, 37, 65, 0.9);
padding: 25px 120px;
-webkit-transform: translateY(100%);
-moz-transform: translateY(100%);
-ms-transform: translateY(100%);
-o-transform: translateY(100%);
transform: translateY(100%);
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-moz-transition: all 0.35s ease 0s;
-o-transition: all 0.35s ease 0s;
-webkit-transition: all 0.35s ease 0s;
-ms-transition: all 0.35s ease 0s;
transition: all 0.35s ease 0s;
}

.post-slider.style2 .slide-text .slide-title {
margin-bottom: 0;
color: #fff;
}

.post-slider.style2 .slide-text .meta-info {
color: #939faa;
font-size: 0.9167em;
}

.post-slider.style2 .owl-prev, .post-slider.style2 .owl-next {
margin-top: 0;
top: auto;
bottom: -30px;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-moz-transition: all 0.35s ease 0s;
-o-transition: all 0.35s ease 0s;
-webkit-transition: all 0.35s ease 0s;
-ms-transition: all 0.35s ease 0s;
transition: all 0.35s ease 0s;
}

.post-slider.style2 .owl-item {
position: relative;
}

.post-slider.style2 .owl-item:hover .slide-text {
-webkit-transform: translateY(0);
-moz-transform: translateY(0);
-ms-transform: translateY(0);
-o-transform: translateY(0);
transform: translateY(0);
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.post-slider.style2:hover .owl-item .slide-text {
-webkit-transform: translateY(0);
-moz-transform: translateY(0);
-ms-transform: translateY(0);
-o-transform: translateY(0);
transform: translateY(0);
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.post-slider.style2:hover .owl-prev, .post-slider.style2:hover .owl-next {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
bottom: 30px;
}

.post-slider ~ .soap-gallery-thumb-wrapper > a {
width: 90px;
height: 90px;
}

.post-slider.style4 .owl-buttons {
display: none;
}

.post-slider.style4 .owl-item {
position: relative;
}

.post-slider.style4 .slide-text {
position: absolute;
width: 100%;
left: 0;
top: 0;
bottom: 0;
height: 100%;
}

.post-slider.style4 .slide-text:before {
display: inline-block;
content: "";
height: 100%;
vertical-align: middle;
}

.post-slider.style5 .owl-pagination {
text-align: right;
bottom: 25px;
padding-right: 20px;
}

.post-slider.style5 .owl-item {
position: relative;
overflow: hidden;
}

.post-slider.style5 .slide-text {
position: absolute;
left: 0;
top: 0;
height: 100%;
bottom: 0;
width: 40%;
background: {{ $color }};
min-width: 250px;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-webkit-transform: translateX(-100%);
-moz-transform: translateX(-100%);
-ms-transform: translateX(-100%);
-o-transform: translateX(-100%);
transform: translateX(-100%);
-moz-transition: all 0.4s ease-in-out 0s;
-o-transition: all 0.4s ease-in-out 0s;
-webkit-transition: all 0.4s ease-in-out 0s;
-ms-transition: all 0.4s ease-in-out 0s;
transition: all 0.4s ease-in-out 0s;
}

.post-slider.style5 .slide-text:before {
display: inline-block;
content: "";
height: 100%;
vertical-align: middle;
}

.post-slider.style5 .slide-text .btn {
padding: 0 20px;
color: #fff;
font-size: 0.8333em;
border-color: #fff;
background: none;
margin-top: 10px;
}

.post-slider.style5 .slide-text .btn:hover {
border-color: #1b4268;
background: #1b4268;
}

.post-slider.style5 .caption-wrapper {
width: 96%;
display: inline-block;
vertical-align: middle;
text-align: left;
padding: 20px 25px;
color: #fff;
}

.post-slider.style5 .caption-wrapper > *:last-child {
margin-bottom: 0;
}

.post-slider.style5:hover .slide-text, .post-slider.style5 .owl-item:hover .slide-text {
-webkit-transform: translateX(0);
-moz-transform: translateX(0);
-ms-transform: translateX(0);
-o-transform: translateX(0);
transform: translateX(0);
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.post-slider.style6, .post-slider.style7 {
/*margin-bottom: 64px;*/
}

.post-slider.style6 + .title-section, .post-slider.style7 + .title-section {
display: table;
height: 64px;
width: 100%;
}

.post-slider.style6 + .title-section p, .post-slider.style7 + .title-section p {
margin-bottom: 0;
}

.post-slider.style6 + .title-section .title-section-wrapper, .post-slider.style7 + .title-section .title-section-wrapper {
display: table-cell;
vertical-align: middle;
}

.post-slider.style6 .owl-controls, .post-slider.style7 .owl-controls {
position: relative;
}

.post-slider.style6 .owl-controls .owl-prev, .post-slider.style6 .owl-controls .owl-next, .post-slider.style7 .owl-controls .owl-prev, .post-slider.style7 .owl-controls .owl-next {
top: 18px;
margin-top: 0;
}

.post-slider.style6 .owl-controls .owl-prev:before, .post-slider.style6 .owl-controls .owl-next:before, .post-slider.style7 .owl-controls .owl-prev:before, .post-slider.style7 .owl-controls .owl-next:before {
color: #d4dde5;
border-color: #d4dde5;
}

.post-slider.style6 .owl-controls .owl-prev:hover:before, .post-slider.style6 .owl-controls .owl-next:hover:before, .post-slider.style7 .owl-controls .owl-prev:hover:before, .post-slider.style7 .owl-controls .owl-next:hover:before {
color: #fff;
border-color: {{ $color }};
}

.post-slider.style6 .owl-controls .owl-prev, .post-slider.style7 .owl-controls .owl-prev {
left: auto;
right: 100px;
}

.post-slider.style7 {
margin-bottom: 0;
margin-left: -15px;
margin-right: -15px;
position: relative;
width: auto;
}

.post-slider.style7 .owl-item {
padding: 0 15px;
}

.post-slider.style7 .owl-controls {
position: static;
}

.post-slider.style7 .owl-controls .owl-prev, .post-slider.style7 .owl-controls .owl-next {
top: -44px;
}

.post-slider.style7 .owl-controls .owl-prev {
right: 85px;
}

.post-slider.style7 .owl-controls .owl-next {
right: 15px;
}

/* 4.6. Pricing table ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.pricing-table {
text-align: center;
background: #edf6ff;
margin-bottom: 30px;
}

.pricing-table .currency-symbol {
color: #1b4268;
}

.pricing-table .price-value {
color: #1b4268;
}

.pricing-table.style1 .pricing-table-header .pricing-row {
padding: 15px 0 20px;
line-height: 1;
}

.pricing-table.style1 .pricing-table-header .pricing-row .price-value {
font-size: 6.6667em;
font-weight: 300;
letter-spacing: -0.04em;
}

.pricing-table.style1 .pricing-table-header .pricing-row .currency-symbol {
font-size: 3.3333em;
position: relative;
top: -0.3em;
font-weight: 400;
}

.pricing-table.style1 .pricing-table-header .pricing-row small {
display: block;
font-size: 1em;
text-transform: uppercase;
letter-spacing: 0.2em;
}

.pricing-table.style1 .pricing-table-header .pricing-type {
background: #1b4268;
margin-bottom: 0;
line-height: 2.2;
color: #fff;
font-weight: 400;
-moz-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
-webkit-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
}

.pricing-table.style1 .pricing-table-content {
padding: 20px 0;
}

.pricing-table.style1 .pricing-table-content li {
line-height: 2.8571em;
font-size: 1.1667em;
}

.pricing-table.style1 .pricing-table-footer {
padding: 5px 0 35px;
}

.pricing-table.style1 .pricing-table-footer .btn {
background: #fff;
}

.pricing-table.style2 {
padding: 30px 20px;
-moz-transition: all 0.35s ease 0s;
-o-transition: all 0.35s ease 0s;
-webkit-transition: all 0.35s ease 0s;
-ms-transition: all 0.35s ease 0s;
transition: all 0.35s ease 0s;
}

.pricing-table.style2 .pricing-table-header .pricing-row {
display: inline-block;
width: 130px;
height: 130px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: #fff;
line-height: 1;
padding-bottom: 4px;
margin-bottom: 10px;
}

.pricing-table.style2 .pricing-table-header .pricing-row .st-table, .pricing-table.style2 .pricing-table-header .pricing-row .woocommerce .single-product-details .single-variation-wrap, .woocommerce .single-product-details .pricing-table.style2 .pricing-table-header .pricing-row .single-variation-wrap, .pricing-table.style2 .pricing-table-header .pricing-row .woocommerce .single-product-details .social-wrap, .woocommerce .single-product-details .pricing-table.style2 .pricing-table-header .pricing-row .social-wrap {
height: 100%;
}

.pricing-table.style2 .pricing-table-header .pricing-row .price-value {
font-size: 3.3333em;
font-weight: 300;
letter-spacing: -0.04em;
}

.pricing-table.style2 .pricing-table-header .pricing-row .currency-symbol {
font-size: 1.6667em;
position: relative;
top: -0.25em;
}

.pricing-table.style2 .pricing-table-header .pricing-row small {
display: block;
font-size: 0.8333em;
text-transform: uppercase;
letter-spacing: 0.2em;
}

.pricing-table.style2 .pricing-table-header .pricing-type {
font-weight: 400;
}

.pricing-table.style2 .pricing-table-content li {
line-height: 3.8461em;
font-size: 1.0833em;
-moz-transition: all 0.35s ease 0s;
-o-transition: all 0.35s ease 0s;
-webkit-transition: all 0.35s ease 0s;
-ms-transition: all 0.35s ease 0s;
transition: all 0.35s ease 0s;
}

.pricing-table.style2 .pricing-table-content li:nth-child(2n + 1) {
background: #fff;
}

.pricing-table.style2 .pricing-table-footer {
padding: 10px 0 0;
}

.pricing-table.style2 .pricing-table-footer .btn {
background: #fff;
}

.pricing-table-container:hover .pricing-table.style1.active .pricing-table-header .pricing-type {
background: #1b4268;
}

.pricing-table-container:hover .pricing-table.style1.active .pricing-table-footer .btn {
background: #fff;
border-color: #d4dde5;
color: inherit;
}

.pricing-table-container:hover .pricing-table.style1.active:hover .pricing-table-header .pricing-type, .pricing-table.style1:hover .pricing-table-header .pricing-type, .pricing-table.style1.active .pricing-table-header .pricing-type {
background: {{ $color }};
}

.pricing-table-container:hover .pricing-table.style1.active:hover .pricing-table-footer .btn, .pricing-table.style1:hover .pricing-table-footer .btn, .pricing-table.style1.active .pricing-table-footer .btn {
background: {{ $color }};
border-color: {{ $color }};
color: #fff;
}

.pricing-table-container:hover .pricing-table.style2.active {
background: #edf6ff;
}

.pricing-table-container:hover .pricing-table.style2.active .pricing-table-header .pricing-type {
color: #1b4268;
}

.pricing-table-container:hover .pricing-table.style2.active .pricing-table-footer .btn {
background: #fff;
border-color: #d4dde5;
color: inherit;
}

.pricing-table-container:hover .pricing-table.style2.active .pricing-table-content li:nth-child(2n + 1) {
background: #fff;
}

.pricing-table-container:hover .pricing-table.style2.active:hover, .pricing-table.style2:hover, .pricing-table.style2.active {
background: #1b4268;
}

.pricing-table-container:hover .pricing-table.style2.active:hover .pricing-table-header .pricing-type, .pricing-table.style2:hover .pricing-table-header .pricing-type, .pricing-table.style2.active .pricing-table-header .pricing-type {
color: #fff;
}

.pricing-table-container:hover .pricing-table.style2.active:hover .pricing-table-footer .btn, .pricing-table.style2:hover .pricing-table-footer .btn, .pricing-table.style2.active .pricing-table-footer .btn {
background: {{ $color }};
border-color: {{ $color }};
color: #fff;
}

.pricing-table-container:hover .pricing-table.style2.active:hover .pricing-table-content li:nth-child(2n + 1), .pricing-table.style2:hover .pricing-table-content li:nth-child(2n + 1), .pricing-table.style2.active .pricing-table-content li:nth-child(2n + 1) {
background: #163d63;
}

/* 4.7. Progress Bar ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.progress-bar {
/* default style */
margin-bottom: 1px;
display: table;
width: 100%;
background: #edf6ff;
box-shadow: none;
float: none;
line-height: auto;
text-align: inherit;
color: inherit;
height: 42px;
/* blue bar */
/* skill meter bar */
}

.progress-bar .progress-wrap {
width: 100%;
}

.progress-bar .progress-label {
text-align: left;
font-size: 1.0833em;
padding: 0 20px 0 30px;
white-space: nowrap;
}

.progress-bar .progress-percent {
padding: 0 30px 0 20px;
font-size: 1.0833em;
}

.progress-bar .progress {
background: #fff;
height: 8px;
box-shadow: none;
margin-bottom: 0;
overflow: visible;
}

.progress-bar .progress-inner {
background: {{ $color }};
display: block;
height: 100%;
-webkit-border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-ms-border-radius: 4px 4px 4px 4px;
border-radius: 4px 4px 4px 4px;
}

.progress-bar.bar-color-blue .progress-inner {
background: #1b4268;
}

.progress-bar.skill-meter {
height: 39px;
padding: 0 20px;
}

.progress-bar.skill-meter .progress-wrap {
position: relative;
}

.progress-bar.skill-meter .progress-label {
background: {{ $color }};
padding: 0 30px 0 20px;
color: #fff;
}

.progress-bar.skill-meter .progress-label i {
margin-right: 15px;
font-size: 15px;
}

.progress-bar.skill-meter .progress {
height: 39px;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
width: 100%;
background: #edf6ff;
padding: 1px 1px 1px 0;
}

.progress-bar.skill-meter .progress-inner {
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
background: #fff;
}

.progress-bar.skill-meter .progress-percent {
display: block;
padding: 0;
position: absolute;
right: 20px;
line-height: 39px;
top: 0;
}

.progress-bar.skill-meter.label-color-blue .progress-label {
background: #1b4268;
}

.progress-bar-container {
display: table;
width: 100%;
border-spacing: 0 1px;
margin-top: -1px;
}

.progress-bar-container.skill-meter {
border-spacing: 0 20px;
}

.progress-bar-container .progress-bar {
display: table-row;
}

/* progress icons */
.progress-bar-icons {
/* blue color */
}

.progress-bar-icons .progress {
background: none;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
box-shadow: none;
height: auto;
float: left;
margin-bottom: 18px;
margin-right: 17px;
}

.progress-bar-icons .progress:last-child {
margin-right: 0;
}

.progress-bar-icons .progress i {
font-size: 1.3333em;
width: 36px;
height: 36px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
line-height: 36px;
background: #edf6ff;
color: #fff;
}

.progress-bar-icons .progress.active i {
background: {{ $color }};
}

.progress-bar-icons.color-blue .progress.active i {
background: #1b4268;
}

/* colored progress bar */
.progress-bar-container.style-colored {
display: block;
}

.progress-bar-container.style-colored .progress-bar {
display: block;
background: none;
margin-bottom: 15px;
}

.progress-bar-container.style-colored .progress-bar .progress-label, .progress-bar-container.style-colored .progress-bar .progress {
display: block;
}

.progress-bar-container.style-colored .progress-bar .progress-label {
padding: 0;
margin-bottom: 5px;
}

.progress-bar-container.style-colored .progress-bar .progress {
height: 17px;
-webkit-border-radius: 9px 9px 9px 9px;
-moz-border-radius: 9px 9px 9px 9px;
-ms-border-radius: 9px 9px 9px 9px;
border-radius: 9px 9px 9px 9px;
background: #edf6ff;
overflow: visible;
}

.progress-bar-container.style-colored .progress-bar .progress-inner {
-webkit-border-radius: 9px 9px 9px 9px;
-moz-border-radius: 9px 9px 9px 9px;
-ms-border-radius: 9px 9px 9px 9px;
border-radius: 9px 9px 9px 9px;
background: #01b7f2;
position: relative;
}

.progress-bar-container.style-colored .progress-bar .progress-inner.color1 {
background-color: #01b7f2;
}

.progress-bar-container.style-colored .progress-bar .progress-inner.color2 {
background-color: #0ab596;
}

.progress-bar-container.style-colored .progress-bar .progress-inner.color3 {
background-color: {{ $color }};
}

.progress-bar-container.style-colored .progress-bar .progress-inner.color4 {
background-color: #9f60b5;
}

.progress-bar-container.style-colored .progress-bar .progress-inner.color5 {
background-color: #ffc000;
}

.progress-bar-container.style-colored .progress-bar .progress-inner.color6 {
background-color: #d20d0d;
}

.progress-bar-container.style-colored .progress-bar .progress-percent {
position: absolute;
right: 0;
bottom: 25px;
padding: 1px 8px;
background: #0b1c32;
-webkit-border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-ms-border-radius: 4px 4px 4px 4px;
border-radius: 4px 4px 4px 4px;
font-size: 10px;
color: #fff;
}

.progress-bar-container.style-colored .progress-bar .progress-percent:after {
display: block;
position: absolute;
content: "";
top: 100%;
left: 50%;
margin-left: -2px;
border-top: 4px solid #0b1c32;
border-left: 3px solid transparent;
border-right: 3px solid transparent;
}

.progress-bar-container.style-vertical {
height: 680px;
display: block;
margin-left: -30px;
margin-right: -30px;
width: auto;
}

.progress-bar-container.style-vertical .progress-bar-wrapper {
border-spacing: 30px 0;
height: 100%;
display: table;
width: 100%;
}

.progress-bar-container.style-vertical .progress-bar {
display: table-cell;
width: 1%;
position: relative;
height: 100%;
padding-top: 50px;
background: #fff;
}

.progress-bar-container.style-vertical .progress-bar .progress {
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
background: #fff;
height: 100%;
width: 100%;
position: relative;
left: 0;
top: 0;
}

.progress-bar-container.style-vertical .progress-bar .progress-inner {
width: 100%;
height: auto;
position: absolute;
left: 0;
bottom: 0;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
}

.progress-bar-container.style-vertical .progress-bar .progress-percent {
display: block;
position: absolute;
width: 100%;
text-align: center;
left: 0;
right: 0;
top: 20px;
font-size: 1.6667em;
color: {{ $color }};
z-index: 9;
padding: 0;
}

.progress-bar-container.style-vertical .progress-bar .progress-label {
font-size: 1.6667em;
color: #fff;
-webkit-transform: rotate(90deg) translateX(50%);
-moz-transform: rotate(90deg) translateX(50%);
-ms-transform: rotate(90deg) translateX(50%);
-o-transform: rotate(90deg) translateX(50%);
transform: rotate(90deg) translateX(50%);
padding: 0 0 0 15px;
display: inline-block;
width: 100%;
line-height: 1;
text-transform: uppercase;
}

.progress-bar-container.style-vertical .progress-bar:nth-child(2n+1) .progress-inner {
background: #1b4268;
}

.progress-bar-container.style-vertical .progress-bar:nth-child(2n+1) .progress-percent {
color: #1b4268;
}

/* circle progress */
.circle-wrap {
text-align: center;
}

.circle-progress {
position: relative;
display: inline-block;
z-index: 100;
margin-bottom: 10px;
color: {{ $color }};
}

.circle-progress .circle-text {
position: absolute;
left: 0;
top: 0;
text-align: center;
width: 100%;
}

.circle-progress .circle-text span {
font-size: 16px;
position: relative;
top: -0.6em;
}

.circle-progress .circle-text .has-circle-text {
width: 80px;
height: 80px;
position: static;
display: inline-block;
line-height: 80px;
font-size: inherit;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: {{ $color }};
color: #fff;
}

.circle-progress.has-text-block .circle-text {
line-height: 1.25em !important;
height: 100%;
bottom: 0;
padding: 0 25px;
}

.circle-progress.has-text-block .circle-text:before {
display: inline-block;
content: "";
height: 100%;
vertical-align: middle;
}

.circle-progress.has-text-block .circle-text > span {
position: static;
vertical-align: middle;
width: 98%;
line-height: 20px;
display: inline-block;
font-size: inherit;
}

/* counters box */
.counters-box {
text-align: center;
}

.counters-box.style1 .icon-wrap {
margin-bottom: 30px;
height: 100px;
}

.counters-box.style1 dt {
font-size: 1.3333em;
font-weight: 300;
}

.counters-box.style1 dt.fontsize-lg {
font-size: 1.6667em;
}

.counters-box.style1 dd {
font-size: 4.1667em;
color: #1b4268;
font-weight: 300;
}

.counters-box.style1 dl {
margin-bottom: 0;
}

.counters-box.style2 {
padding: 0 20px;
}

.counters-box.style2 dt {
font-style: italic;
font-size: 6.6667em;
color: #1b4268;
border-bottom: 1px solid #edf6ff;
}

.counters-box.style2 dd {
font-size: 1.3333em;
padding-top: 10px;
}

/* 4.8. Style Changer ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.style-changer {
width: 270px;
padding: 20px 30px 30px;
position: relative;
}

.style-changer .style-toggle {
position: absolute;
left: 100%;
top: 0;
width: 52px;
height: 52px;
background: url(../miracle/images/logo-white.png) no-repeat center center {{ $color }};
cursor: pointer;
}

.style-changer .btn {
font-size: 0.8333em;
padding: 0 16px;
}

.style-changer .form-group {
padding-bottom: 15px;
border-bottom: 1px solid;
position: relative;
}

.style-changer .form-group:last-child {
border-bottom: none;
padding-bottom: 0;
margin-bottom: 0;
}

.style-changer [class^="skin-color-"] {
line-height: 28px;
display: inline-block;
width: 49%;
text-transform: uppercase;
font-size: 0.8333em;
}

.style-changer [class^="skin-color-"].active {
color: {{ $color }};
}

.style-changer [class^="skin-color-"]:before {
content: "";
width: 18px;
height: 18px;
display: block;
float: left;
margin-top: 5px;
margin-right: 10px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.style-changer .skin-color-orange:before {
background-color: {{ $color }};
}

.style-changer .skin-color-green:before {
background-color: #97cc24;
}

.style-changer .skin-color-purple:before {
background-color: #b53cd3;
}

.style-changer .skin-color-blue:before {
background-color: #00a2ee;
}

.style-changer .skin-color-yellow:before {
background-color: #ffae00;
}

.style-changer .skin-color-gray:before {
background-color: #acacac;
}

.style-changer .skin-color-navy:before {
background-color: #006cff;
}

.style-changer .skin-color-sea:before {
background-color: #0ab596;
}

.style-changer .skin-color-red:before {
background-color: #ff1818;
}

.style-changer .skin-color-gold:before {
background-color: #d9be2b;
}

.style-changer .style-changer-title {
margin-bottom: 25px;
}

.style-changer label {
margin-bottom: 10px;
font-size: 1.0833em;
}

.style-changer select, .style-changer .customSelect {
background: none;
height: 28px;
padding-top: 0;
padding-bottom: 0;
line-height: 26px;
padding-left: 15px;
}

.style-changer select option {
padding-left: 15px;
}

.style-changer .customSelect {
border: 1px solid;
font-size: 1em;
}

.style-changer.style-dark {
background: #191919;
color: #6a6a6a;
}

.style-changer.style-dark .style-changer-title {
color: #fff;
}

.style-changer.style-dark .customSelect {
border-color: #6a6a6a;
}

.style-changer.style-dark .btn {
border-color: #6a6a6a;
}

.style-changer.style-dark .btn:hover, .style-changer.style-dark .btn.active {
border-color: {{ $color }};
}

.style-changer.style-dark .form-group {
border-bottom-color: #303030;
}

.style-changer.style-light {
background: #fff;
color: #ababab;
border: 1px solid #e5e5e5;
}

.style-changer.style-light .style-toggle {
top: -1px;
}

.style-changer.style-light .style-changer-title {
color: #000;
}

.style-changer.style-light .customSelect {
border-color: #ababab;
}

.style-changer.style-light .btn {
border-color: #cdcdcd;
}

.style-changer.style-light .btn:hover, .style-changer.style-light .btn.active {
border-color: {{ $color }};
}

.style-changer.style-light .form-group {
border-bottom-color: #e5e5e5;
}

#style-changer {
position: fixed;
top: 135px;
z-index: 1001;
left: -270px;
}

/* 4.9. Tabs ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.tab-pane > img {
margin-right: 25px;
}

.tab-container .tabs li {
float: left;
}

.tab-container .tabs li.active a {
color: #1b4268;
}

.tab-container .tabs a {
white-space: nowrap;
display: block;
padding-left: 15px;
padding-right: 15px;
}

.tab-container .tab-content {
padding: 25px 30px;
display: none;
}

.tab-container .tab-content.active {
display: block;
}

.tab-container .tab-content.active > .tab-pane {
display: block;
overflow: hidden;
}

.tab-container .tab-pane > *:last-child {
margin-bottom: 0;
}

.tab-container.style1 .tabs a, .tab-container.style2 .tabs a {
padding: 14px 24px;
display: block;
font-size: 1.1667em;
}

.tab-container.style1 .tab-content, .tab-container.style2 .tab-content {
border: 1px solid #edf6ff;
}

.tab-container.style1 .tabs {
float: left;
border-left: 1px solid;
border-right: 1px solid;
border-color: #edf6ff;
}

.tab-container.style1 .tabs li {
position: relative;
z-index: 1;
top: 1px;
}

.tab-container.style1 .tabs li + li a {
margin-left: 1px;
}

.tab-container.style1 .tabs li a {
background: #edf6ff;
border-top: 1px solid #edf6ff;
}

.tab-container.style1 .tabs li.active a {
background: #fff;
}

.tab-container.style1 .tab-content {
clear: both;
}

.tab-container.style2 .tabs {
background: #edf6ff;
padding: 0 20px;
}

.tab-container.style2 .tabs a {
font-size: 0.8333em;
text-transform: uppercase;
padding: 0 16px;
height: 28px;
line-height: 28px;
margin: 10px 5px;
background: #fff;
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
}

.tab-container.style2 .tabs li.active a {
background: {{ $color }};
color: #fff;
position: relative;
}

.tab-container.style2 .tabs li.active a:after {
content: "";
display: block;
position: absolute;
top: 100%;
left: 50%;
margin-left: -7px;
border-top: 5px solid {{ $color }};
border-left: 7px solid transparent;
border-right: 7px solid transparent;
}

.tab-container.full-width .tabs {
display: block;
float: none;
}

.tab-container.full-width .tabs li {
float: none;
width: 1%;
text-align: center;
position: static;
}

.tab-container.full-width .tabs a {
padding-left: 0;
padding-right: 0;
}

.tab-container.full-width .tab-content {
border-top: none;
}

.tab-container.vertical-tab .tabs, .tab-container.vertical-tab-1 .tabs {
float: left;
background: #edf6ff;
border-top: 1px solid #edf6ff;
border-bottom: 1px solid #edf6ff;
}

.tab-container.vertical-tab .tabs li, .tab-container.vertical-tab-1 .tabs li {
float: none;
position: relative;
z-index: 1;
left: 1px;
}

.tab-container.vertical-tab .tabs li a, .tab-container.vertical-tab-1 .tabs li a {
display: block;
line-height: 48px;
padding: 0 30px;
font-size: 1.1667em;
}

.tab-container.vertical-tab .tabs li.active a, .tab-container.vertical-tab-1 .tabs li.active a {
background: #fff;
color: #1b4268;
}

.tab-container.vertical-tab .tab-content, .tab-container.vertical-tab-1 .tab-content {
padding: 0;
}

.tab-container.vertical-tab .tab-pane, .tab-container.vertical-tab-1 .tab-pane {
border: 1px solid #edf6ff;
overflow: auto;
padding: 30px;
}

.tab-container.vertical-tab-1 .tabs {
background: none;
border: none;
}

.tab-container.vertical-tab-1 .tabs li {
margin-bottom: 10px;
}

.tab-container.vertical-tab-1 .tabs li a {
line-height: 32px;
-webkit-border-radius: 20px 20px 20px 20px;
-moz-border-radius: 20px 20px 20px 20px;
-ms-border-radius: 20px 20px 20px 20px;
border-radius: 20px 20px 20px 20px;
padding: 4px 50px 4px 4px;
background: #d4dde5;
color: #fff;
}

.tab-container.vertical-tab-1 .tabs li a:hover {
color: {{ $color }};
}

.tab-container.vertical-tab-1 .tabs li i {
float: left;
margin-right: 15px;
line-height: 32px;
width: 32px;
height: 32px;
text-align: center;
color: #d4dde5;
background: #fff;
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.tab-container.vertical-tab-1 .tabs li.active a {
background: #fff;
color: {{ $color }};
}

.tab-container.vertical-tab-1 .tabs li.active i {
background: {{ $color }};
color: #fff;
}

.tab-container.vertical-tab-1 .tab-content img {
margin-bottom: 25px;
}

.tab-container.vertical-tab-1 .tab-pane {
padding-top: 0;
padding-bottom: 0;
border: none;
}

.tab-container.transparent-tab {
position: relative;
z-index: 1;
margin-top: -40px;
}

.tab-container.transparent-tab ul.tabs {
padding: 0 20px;
}

.tab-container.transparent-tab ul.tabs li + li {
padding-left: 3px;
}

.tab-container.transparent-tab ul.tabs a {
background: rgba(255, 255, 255, 0.65);
color: #4f4f4f;
overflow: hidden;
height: 40px;
line-height: 40px;
text-transform: uppercase;
font-size: 0.9167em;
font-weight: 600;
}

.tab-container.transparent-tab ul.tabs a i {
font-size: 13px;
vertical-align: middle;
margin-right: 10px;
}

.tab-container.transparent-tab ul.tabs a:hover {
background: rgba(255, 255, 255, 0.8);
color: #1b4268;
}

.tab-container.transparent-tab ul.tabs a:hover i {
-webkit-animation: toTopFromBottom 0.3s forwards;
-moz-animation: toTopFromBottom 0.3s forwards;
animation: toTopFromBottom 0.3s forwards;
}

.tab-container.transparent-tab ul.tabs li.active a {
background: #fff;
color: #1b4268;
}

.tab-container.transparent-tab ul.tabs a:hover i, .tab-container.transparent-tab ul.tabs li.active a i {
color: {{ $color }};
}

.tab-container.transparent-tab .tab-content {
border: 1px solid #edf6ff;
border-top: none;
}

/* 4.10. Team ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.team-member {
text-align: center;
/* colored style */
}

.team-member .team-member-author {
padding: 20px 10px;
background: #edf6ff;
margin-bottom: 1px;
}

.team-member .team-member-name {
margin-bottom: 0;
}

.team-member .team-member-job {
text-transform: uppercase;
font-size: 0.8333em;
font-weight: 600;
letter-spacing: 0.1em;
}

.team-member .team-member-social {
background: #edf6ff;
padding: 12px;
}

.team-member .social-icons {
margin-bottom: 0;
display: inline-block;
}

.team-member .social-icons .social-icon {
margin-bottom: 0;
}

.team-member .social-icons .social-icon i {
border: none;
background: #fff;
}

.team-member .social-icons .social-icon:hover i {
background: {{ $color }};
}

.team-member .team-member-desc {
padding-left: 25px;
padding-right: 25px;
}

.team-member .team-member-desc > *:last-child {
margin-bottom: 0;
}

.team-member.style-colored .image-container {
position: relative;
background: url(../miracle/images/shadow.png) repeat-x left bottom;
}

.team-member.style-colored .image-container img {
position: relative;
z-index: -1;
}

.team-member.style-colored .team-member-social {
position: absolute;
bottom: 10px;
left: 0;
width: 100%;
padding: 0;
background: none;
}

.team-member.style-colored .social-icons .social-icon i {
background: none;
color: #fff;
border: 1px solid #fff;
}

.team-member.style-colored .social-icons .social-icon:hover i {
background: #1b4268;
border: none;
}

.team-member.style-colored .team-member-author, .team-member.style-colored .team-member-desc {
background: #1b4268;
color: #fff;
}

.team-member.style-colored .team-member-author {
margin-bottom: 0;
}

.team-member.style-colored .team-member-name {
color: #fff;
}

.team-member.style-colored .team-member-desc {
padding-bottom: 25px;
}

/* 4.11. Testimonial ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.testimonials.style1 .owl-controls .owl-prev, .testimonials.style1 .owl-controls .owl-next, .testimonials.style3 .owl-controls .owl-prev, .testimonials.style3 .owl-controls .owl-next, .testimonials.style4 .owl-controls .owl-prev, .testimonials.style4 .owl-controls .owl-next {
margin-top: 11px;
}

.testimonials.style1 .owl-controls .owl-prev:before, .testimonials.style1 .owl-controls .owl-next:before, .testimonials.style3 .owl-controls .owl-prev:before, .testimonials.style3 .owl-controls .owl-next:before, .testimonials.style4 .owl-controls .owl-prev:before, .testimonials.style4 .owl-controls .owl-next:before {
color: #d4dde5;
border-color: #d4dde5;
}

.testimonials.style1 .owl-controls .owl-prev:hover:before, .testimonials.style1 .owl-controls .owl-next:hover:before, .testimonials.style3 .owl-controls .owl-prev:hover:before, .testimonials.style3 .owl-controls .owl-next:hover:before, .testimonials.style4 .owl-controls .owl-prev:hover:before, .testimonials.style4 .owl-controls .owl-next:hover:before {
color: #fff;
border-color: {{ $color }};
}

.testimonials.style1 .owl-controls .owl-prev, .testimonials.style3 .owl-controls .owl-prev, .testimonials.style4 .owl-controls .owl-prev {
left: 1px;
}

.testimonials.style1 .owl-controls .owl-next, .testimonials.style3 .owl-controls .owl-next, .testimonials.style4 .owl-controls .owl-next {
right: 1px;
}

.testimonials.style1 .owl-wrapper-outer {
padding-top: 50px;
}

.testimonials.style1 .testimonial.style1 {
margin: 0;
height: 100%;
}

.testimonials.style1 .owl-controls .owl-prev {
left: 0;
}

.testimonials.style1 .owl-controls .owl-next {
right: 0;
}

.testimonials.style1 .owl-controls .owl-prev, .testimonials.style1 .owl-controls .owl-next {
margin-top: 11px;
}

.testimonials.style1.multiple-items .owl-controls .owl-prev, .testimonials.style1.multiple-items .owl-controls .owl-next {
margin-top: 0;
}

.testimonials.style1.multiple-items .owl-controls .owl-prev {
left: -70px;
}

.testimonials.style1.multiple-items .owl-controls .owl-next {
right: -70px;
}

.testimonials.style1.multiple-items .testimonial.style1 {
margin: 0 15px;
}

.testimonials.style2 {
padding: 80px 0 30px;
}

.testimonials.style2 .container {
padding: 0 40px;
}

.testimonials.style2 .testimonials-title {
text-align: center;
color: {{ $color }};
margin-bottom: 50px;
font-size: 2.5em;
}

.testimonials.style2 .sky-carousel {
background: none;
border: none;
height: auto;
padding-bottom: 200px;
}

.testimonials.style2 .sky-carousel .sc-content-wrapper {
position: static;
}

.testimonials.style2 .sky-carousel .sc-content-container {
font-family: inherit;
position: static;
}

.testimonials.style2 .sky-carousel .sky-carousel-container {
float: none;
}

.testimonials.style2 .sc-content-wrapper .sc-content {
display: table;
width: 100%;
}

.testimonials.style2 .sc-content-wrapper .sc-content:after {
content: "";
display: table;
clear: both;
}

.testimonials.style2 .sc-content-wrapper .sc-content h2, .testimonials.style2 .sc-content-wrapper .sc-content p {
display: table-cell;
color: #fff;
text-align: left;
padding: 0 30px;
}

.testimonials.style2 .sc-content-wrapper .sc-content h2 a {
color: #fff;
}

.testimonials.style2 .sc-content-wrapper .sc-content h2 {
font-size: 1.6667em;
white-space: nowrap;
}

.testimonials.style2 .sc-content-wrapper .sc-content h2 small {
font-size: 0.65em;
color: {{ $color }};
display: block;
margin-top: 5px;
}

.testimonials.style2 .sc-content-wrapper .sc-content p {
font-weight: 300;
font-size: 2.5em;
line-height: 1.3333;
border-left: 2px solid rgba(255, 255, 255, 0.1);
}

.testimonials.style2 .sc-content-wrapper .sc-content p em {
font-weight: 400;
}

.testimonials.style3 .owl-buttons, .testimonials.style4 .owl-buttons {
position: absolute;
}

.testimonials.style3 .owl-buttons:after, .testimonials.style4 .owl-buttons:after {
display: table;
content: "";
clear: both;
}

.testimonials.style3 .owl-buttons .owl-prev, .testimonials.style3 .owl-buttons .owl-next, .testimonials.style4 .owl-buttons .owl-prev, .testimonials.style4 .owl-buttons .owl-next {
position: static;
float: left;
margin-top: 0;
}

.testimonials.style3 .owl-buttons .owl-prev, .testimonials.style4 .owl-buttons .owl-prev {
margin-right: 10px;
}

.testimonials.style3 {
overflow: hidden;
}

.testimonials.style3 .owl-buttons {
bottom: -1px;
right: -1px;
background: #fff;
padding: 20px 1px 1px 30px;
border-top: 1px solid #edf6ff;
border-left: 1px solid #edf6ff;
-webkit-border-radius: 50px 0 0 0;
-moz-border-radius: 50px 0 0 0;
-ms-border-radius: 50px 0 0 0;
border-radius: 50px 0 0 0;
}

.testimonials.style4 {
overflow: hidden;
padding-top: 14px;
margin-top: -14px;
padding-bottom: 37px;
}

.testimonials.style4 .owl-wrapper-outer {
overflow: visible;
background: #edf6ff;
}

.testimonials.style4 .owl-buttons {
top: 0;
right: 30px;
}

.testimonials.style4 .owl-buttons .owl-prev:before, .testimonials.style4 .owl-buttons .owl-next:before {
background: #fff;
}

.testimonials.style4 .owl-buttons .owl-prev:hover:before, .testimonials.style4 .owl-buttons .owl-next:hover:before {
background: {{ $color }};
}

.testimonial.style1, .testimonial.style3, .testimonial.style4 {
position: relative;
}

.testimonial.style1 .testimonial-author, .testimonial.style3 .testimonial-author, .testimonial.style4 .testimonial-author {
font-size: 1.1667em;
}

.testimonial.style1 .testimonial-author-name, .testimonial.style3 .testimonial-author-name, .testimonial.style4 .testimonial-author-name {
color: {{ $color }};
}

.testimonial.style1 .testimonial-author-job, .testimonial.style3 .testimonial-author-job, .testimonial.style4 .testimonial-author-job {
font-size: 0.7857em;
text-transform: uppercase;
}

.testimonial.style1 {
border-top: 1px solid #edf6ff;
border-bottom: 1px solid #edf6ff;
position: relative;
padding: 80px 60px 40px;
text-align: center;
margin-top: 50px;
}

.testimonial.style1 .testimonial-image {
position: absolute;
top: -50px;
left: 50%;
margin-left: -50px;
overflow: hidden;
width: 100px;
height: 100px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 1px solid #d4dde5;
padding: 4px;
background: #fff;
}

.testimonial.style1 .testimonial-image img {
width: 100%;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.testimonial.style1 .testimonial-content {
font-size: 2.5em;
font-style: italic;
color: #1b4268;
font-weight: 400;
margin-bottom: 30px;
line-height: 1.25;
}

.testimonial.style1 .testimonial-content.fontsize-lg {
font-size: 3.3333em;
}

.testimonial.style3 {
border: 1px solid #edf6ff;
padding: 30px 40px;
}

.testimonial.style3 .testimonial-content {
font-size: 1.3333em;
font-weight: 300;
line-height: 1.875;
}

.testimonial.style3 .testimonial-author {
margin-top: 15px;
}

.testimonial.style4 {
padding: 30px 40px 60px;
}

.testimonial.style4 .testimonial-content {
font-size: 1.3333em;
font-weight: 300;
line-height: 1.875;
color: #1b4268;
}

.testimonial.style4 .testimonial-author {
position: absolute;
left: 130px;
bottom: -25px;
}

.testimonial.style4 .testimonial-image {
position: absolute;
bottom: -37px;
left: 40px;
width: 74px;
height: 74px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
background: #fff;
padding: 3px;
}

.testimonial.style4 .testimonial-image img {
width: 100%;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

/* 5. Footer ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.footer-common-hover-style .social-icons .social-icon:hover i, #footer.style1 .footer-wrapper .social-icons .social-icon:hover i, #footer.style2 .footer-wrapper .social-icons .social-icon:hover i, #footer.style3 .footer-wrapper .social-icons .social-icon:hover i, #footer.style4 .footer-wrapper .social-icons .social-icon:hover i {
color: #fff;
}

.footer-common-hover-style .tags .tag:hover, #footer.style1 .footer-wrapper .tags .tag:hover, #footer.style2 .footer-wrapper .tags .tag:hover, #footer.style3 .footer-wrapper .tags .tag:hover, #footer.style4 .footer-wrapper .tags .tag:hover, .footer-common-hover-style .social-icons .social-icon:hover i, #footer.style1 .footer-wrapper .social-icons .social-icon:hover i, #footer.style2 .footer-wrapper .social-icons .social-icon:hover i, #footer.style3 .footer-wrapper .social-icons .social-icon:hover i, #footer.style4 .footer-wrapper .social-icons .social-icon:hover i, .footer-common-hover-style .btn.style4:hover, #footer.style1 .footer-wrapper .btn.style4:hover, #footer.style2 .footer-wrapper .btn.style4:hover, #footer.style3 .footer-wrapper .btn.style4:hover, #footer.style4 .footer-wrapper .btn.style4:hover {
border-color: {{ $color }};
}

#footer {
overflow: hidden;
/* style1 */
/* style2 */
/* style3 */
/* style4 */
}

#footer .section-title {
font-weight: 600;
}

#footer .footer-wrapper .container {
position: relative;
}

#footer .footer-wrapper .container > .row {
margin: 0 -20px 0 -30px;
}

#footer .footer-wrapper .container > .row > div {
padding: 60px 15px 60px 30px;
}

#footer .footer-wrapper .container > .row > div:last-child {
position: relative;
}

#footer .footer-wrapper .container:after {
content: "";
position: absolute;
display: block;
left: 100%;
top: 0;
height: 100%;
bottom: 0;
width: 2000px;
}

#footer .back-to-top {
width: 60px;
height: 60px;
border: 5px solid rgba(0, 0, 0, 0.06);
display: block;
position: absolute;
left: -30px;
bottom: -30px;
-webkit-border-radius: 30px 30px 30px 30px;
-moz-border-radius: 30px 30px 30px 30px;
-ms-border-radius: 30px 30px 30px 30px;
border-radius: 30px 30px 30px 30px;
overflow: hidden;
/*&:after { background-image: url(../miracle/images/icon/up.png); top: 100%; }*/
}

#footer .back-to-top:before, #footer .back-to-top:after {
content: "";
position: absolute;
z-index: 1;
left: 0;
top: 0;
width: 50px;
height: 50px;
background-repeat: no-repeat;
background-position: center center;
-moz-transition: top 0.5s ease 0s;
-o-transition: top 0.5s ease 0s;
-webkit-transition: top 0.5s ease 0s;
-ms-transition: top 0.5s ease 0s;
transition: top 0.5s ease 0s;
}

#footer .back-to-top:before {
background-image: url(../miracle/images/icon/up.png);
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
}

#footer .back-to-top:hover {
/*&:after { top: 0; }*/
}

#footer .back-to-top:hover:before {
/*top: -100%;*/
background-image: url('../miracle/images/icon/up.png');
}

#footer .back-to-top:active span:before, #footer .back-to-top:active span:after {
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

#footer .back-to-top span {
display: block;
-webkit-border-radius: 25px 25px 25px 25px;
-moz-border-radius: 25px 25px 25px 25px;
-ms-border-radius: 25px 25px 25px 25px;
border-radius: 25px 25px 25px 25px;
width: 100%;
height: 100%;
border: 2px solid {{ $color }};
background: {{ $color }};
overflow: hidden;
position: relative;
z-index: 0;
}

#footer .back-to-top span:before, #footer .back-to-top span:after {
-moz-transition: all 0.6s ease 0s;
-o-transition: all 0.6s ease 0s;
-webkit-transition: all 0.6s ease 0s;
-ms-transition: all 0.6s ease 0s;
transition: all 0.6s ease 0s;
content: "";
display: block;
position: absolute;
}

#footer .back-to-top span:before {
width: 46px;
height: 23px;
-webkit-border-radius: 23px 23px 0 0;
-moz-border-radius: 23px 23px 0 0;
-ms-border-radius: 23px 23px 0 0;
border-radius: 23px 23px 0 0;
background: {{ $secondColor }};
-webkit-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

#footer .recent-posts > li {
width: 100%;
margin-bottom: 10px;
padding: 0;
background: none;
}

#footer .recent-posts > li:last-child .post-content {
border-bottom: none;
}

#footer .recent-posts .post-author-avatar {
vertical-align: top;
}

#footer .recent-posts .post-content {
border-bottom: 1px solid #edf6ff;
padding: 5px 0 12px;
width: 90%;
}

#footer .recent-posts .post-title {
font-size: 1.0833em;
}

#footer .recent-posts .post-title:hover {
color: {{ $color }};
}

#footer .useful-links a {
font-weight: 600;
}

#footer .useful-links li:hover a {
color: #1b4268;
}

#footer .useful-links li:hover:before {
color: {{ $color }};
}

#footer .copyright-area {
display: table;
width: 100%;
padding: 20px 0;
color: #939faa;
}

#footer .copyright-area .secondary-menu {
display: table-cell;
vertical-align: middle;
}

#footer .copyright-area .copyright {
display: table-cell;
vertical-align: middle;
text-align: right;
}

#footer .secondary-menu .nav > li > a {
font-size: 0.8333em;
font-weight: 600;
text-transform: uppercase;
letter-spacing: 0.1em;
padding: 5px 10px;
}

#footer .secondary-menu .nav > li > a:hover, #footer .secondary-menu .nav > li > a:focus {
background: none;
color: {{ $color }};
}

#footer .secondary-menu .nav > li.active > a {
color: {{ $color }};
}

#footer .footer-wrapper {
background: #edf6ff;
}

#footer .footer-wrapper .container > .row > div:last-child {
background: #e2edf9;
}

#footer .footer-wrapper .container:after {
background: #e2edf9;
}

#footer .footer-wrapper .btn {
padding: 0 20px;
}

#footer.style1 .footer-wrapper .social-icons .social-icon i {
color: inherit;
border-color: #b6c0c9;
}

#footer.style1 .footer-wrapper .tags .tag, #footer.style1 .footer-wrapper .social-icons .social-icon i, #footer.style1 .footer-wrapper .btn.style4 {
border-color: #b6c0c9;
}

#footer.style2 {
color: #9b9b9b;
}

#footer.style2 .footer-wrapper {
background: #fbfbfb;
}

#footer.style2 .footer-wrapper .container > .row > div:last-child {
background: #f5f5f5;
}

#footer.style2 .footer-wrapper .container:after {
background: #f5f5f5;
}

#footer.style2 .footer-wrapper .section-title, #footer.style2 .footer-wrapper .post-title, #footer.style2 .footer-wrapper .useful-links li:hover a {
color: #515151;
}

#footer.style2 .footer-wrapper .post-title:hover {
color: {{ $color }};
}

#footer.style2 .footer-wrapper .recent-posts .post-content {
border-bottom-color: #f5f5f5;
}

#footer.style2 .footer-wrapper .social-icons .social-icon i {
color: #9b9b9b;
}

#footer.style2 .footer-wrapper .tags .tag, #footer.style2 .footer-wrapper .social-icons .social-icon i, #footer.style2 .footer-wrapper .btn.style4 {
border-color: #9b9b9b;
}

#footer.style3 {
color: #4d4d4d;
}

#footer.style3 .footer-wrapper {
background: #232323;
}

#footer.style3 .footer-wrapper .container > .row > div:last-child {
background: #1b1b1b;
}

#footer.style3 .footer-wrapper .container:after {
background: #1b1b1b;
}

#footer.style3 .footer-wrapper .post-title, #footer.style3 .footer-wrapper .useful-links li:hover a {
color: #fff;
}

#footer.style3 .footer-wrapper .post-title:hover {
color: {{ $color }};
}

#footer.style3 .footer-wrapper .section-title {
color: {{ $color }};
}

#footer.style3 .footer-wrapper .recent-posts .post-content {
border-bottom-color: #2e2e2e;
}

#footer.style3 .footer-wrapper .useful-links {
display: inline-block;
}

#footer.style3 .footer-wrapper .useful-links li {
border-bottom: 1px solid #2e2e2e;
padding-bottom: 5px;
margin-bottom: 7px;
padding-right: 30px;
}

#footer.style3 .footer-wrapper .useful-links li:last-child {
border-bottom: none;
}

#footer.style3 .footer-wrapper .social-icons .social-icon i {
color: #4d4d4d;
}

#footer.style3 .footer-wrapper .tags .tag, #footer.style3 .footer-wrapper .social-icons .social-icon i, #footer.style3 .footer-wrapper .btn.style4 {
border-color: #4d4d4d;
}

#footer.style4 {
color: #455b79;
}

#footer.style4 .callout-box.style2 {
background: #edf6ff;
}

#footer.style4 .callout-box.style2 .callout-text * {
color: #1b4268;
}

#footer.style4 .callout-box.style2 .btn {
color: #939faa;
background: #fff;
border-color: #d4dde5;
}

#footer.style4 .callout-box.style2 .btn:hover {
color: #fff;
background: {{ $color }};
border-color: {{ $color }};
}

#footer.style4 .footer-wrapper {
background: #0f2541;
}

#footer.style4 .footer-wrapper .container > .row > div:last-child {
background: #0b1c32;
}

#footer.style4 .footer-wrapper .container:after {
background: #0b1c32;
}

#footer.style4 .footer-wrapper .post-title, #footer.style4 .footer-wrapper .useful-links li:hover a {
color: #fff;
}

#footer.style4 .footer-wrapper .post-title:hover {
color: {{ $color }};
}

#footer.style4 .footer-wrapper .section-title {
color: {{ $color }};
}

#footer.style4 .footer-wrapper .recent-posts .post-content {
border-bottom-color: #1b304b;
}

#footer.style4 .footer-wrapper .useful-links {
display: inline-block;
}

#footer.style4 .footer-wrapper .useful-links li {
border-bottom: 1px solid #1b304b;
padding-bottom: 5px;
margin-bottom: 7px;
padding-right: 30px;
}

#footer.style4 .footer-wrapper .useful-links li:last-child {
border-bottom: none;
}

#footer.style4 .footer-wrapper .social-icons .social-icon i {
color: #455b79;
}

#footer.style4 .footer-wrapper .tags .tag, #footer.style4 .footer-wrapper .social-icons .social-icon i, #footer.style4 .footer-wrapper .btn.style4 {
border-color: #455b79;
}

/* 6. Page Content ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 6.1. Standard Pages ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* features slider */
.features-icon-slider {
width: 75%;
margin-left: auto;
margin-right: auto;
}

.features-icon-slider .feature-icon {
display: block;
overflow: hidden;
}

.features-icon-slider .feature-icon i {
font-size: 2.1667em;
width: 90px;
height: 90px;
line-height: 86px;
border: 2px solid #fff;
-webkit-border-radius: 45px 45px 45px 45px;
-moz-border-radius: 45px 45px 45px 45px;
-ms-border-radius: 45px 45px 45px 45px;
border-radius: 45px 45px 45px 45px;
color: #fff;
position: relative;
-webkit-transform: translateZ(0);
-moz-transform: translateZ(0);
-ms-transform: translateZ(0);
-o-transform: translateZ(0);
transform: translateZ(0);
}

.features-icon-slider .feature-icon i:after {
content: "";
display: none;
position: absolute;
right: 0;
top: 0;
width: 86px;
height: 43px;
-webkit-border-radius: 43px 43px 0 0;
-moz-border-radius: 43px 43px 0 0;
-ms-border-radius: 43px 43px 0 0;
border-radius: 43px 43px 0 0;
background: {{ $secondColor }};
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

.features-icon-slider .feature-icon:hover i {
border-color: {{ $color }};
background: {{ $color }};
}

.features-icon-slider .feature-icon:hover i:before {
position: relative;
z-index: 1;
}

.features-icon-slider .feature-icon:hover i:after {
display: block;
}

.features-icon-slider:hover .owl-prev {
left: -60px;
}

.features-icon-slider:hover .owl-next {
right: -60px;
}

.features-icon-slider .owl-prev {
left: -60px;
}

.features-icon-slider .owl-next {
right: -60px;
}

/* brand slider */
.brand-slider {
padding-bottom: 60px;
margin-left: -15px;
margin-right: -15px;
width: auto;
}

.brand-slider .owl-item {
display: table;
border-spacing: 15px 0;
}

.brand-slider .owl-item a {
text-align: center;
padding: 30px 0;
background: rgba(255, 255, 255, 0.03);
}

.brand-slider .owl-item:hover a {
background: rgba(0, 0, 0, 0.25);
}

.brand-slider .owl-item img {
max-width: 80%;
width: auto;
}

.brand-slider.style1 {
padding-bottom: 0;
margin: 24px 0 0;
position: relative;
border-top: 1px solid #edf6ff;
}

.brand-slider.style1 .owl-item {
border-spacing: 0 0;
}

.brand-slider.style1 .owl-item a {
background: none;
}

.brand-slider.style1 .owl-item img {
filter: alpha(opacity=40);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
-moz-opacity: 0.4;
-khtml-opacity: 0.4;
opacity: 0.4;
-moz-transition: opacity 0.25s ease 0s;
-o-transition: opacity 0.25s ease 0s;
-webkit-transition: opacity 0.25s ease 0s;
-ms-transition: opacity 0.25s ease 0s;
transition: opacity 0.25s ease 0s;
}

.brand-slider.style1 .owl-item:hover img {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.brand-slider.style1 .owl-pagination {
display: none;
}

.brand-slider.style1 .owl-buttons {
display: block;
position: absolute;
top: -16px;
left: 50%;
margin-left: -85px;
width: 170px;
background: #fff;
padding: 0 20px;
}

.brand-slider.style1 .owl-buttons .owl-prev, .brand-slider.style1 .owl-buttons .owl-next {
position: static;
display: inline-block;
margin-top: 0;
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.brand-slider.style1 .owl-buttons .owl-prev:before, .brand-slider.style1 .owl-buttons .owl-next:before {
color: #d4dde5;
border-color: #d4dde5;
}

.brand-slider.style1 .owl-buttons .owl-prev:hover:before, .brand-slider.style1 .owl-buttons .owl-next:hover:before {
border-color: {{ $color }};
color: #fff;
}

.brand-slider.style1 .owl-buttons .owl-prev {
margin-right: 16px;
}

/* theme features section */
.theme-features .row.same-height, .theme-features .row.add-clearfix {
margin-top: -2px;
}

.theme-features .row.same-height > div, .theme-features .row.add-clearfix > div {
border-top: 1px solid #edf6ff;
border-right: 1px solid #edf6ff;
}

.theme-features .image-box {
margin-top: 30px;
}

.theme-features .image-box .image-container {
padding-left: 30px;
padding-right: 5px;
}

.blue-alpha-bg .icon-box.style-boxed-1 {
background: rgba(11, 28, 51, 0.5);
border: none;
}

.blue-alpha-bg .icon-box.style-boxed-1 .icon-container:before {
background: rgba(11, 28, 51, 0.5);
border: none;
}

.blue-alpha-bg .icon-box.style-boxed-1 .box-title {
color: #fff;
}

/* google map */
.soap-google-map {
height: 680px;
}

.soap-google-map img {
max-width: none;
}

/* contact page */
.contact-address i {
font-size: 1.1667em;
color: #fff;
background: {{ $color }};
width: 2.5em;
height: 2.5em;
line-height: 2.5em;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
color: #fff;
text-align: center;
}

.contact-address.style1 i {
float: left;
margin-top: 3px;
}

.contact-address.style1 .details {
border-bottom: 1px solid #edf6ff;
margin-left: 50px;
}

.contact-address.style1 li {
margin-bottom: 15px;
}

.contact-address.style2 {
display: table;
table-layout: fixed;
float: none;
margin: 0 auto;
border-spacing: 30px 0;
padding: 0;
margin-bottom: 80px;
margin-top: -140px;
}

.contact-address.style2 li {
display: table-cell;
vertical-align: top;
width: 33.3333%;
padding: 30px;
border: 2px solid rgba(27, 66, 104, 0.1);
text-align: center;
background: #fff;
}

.contact-address.style2 .details {
word-break: normal;
}

.contact-address.style2 i {
margin-bottom: 25px;
}

.contact-address.style2 h5 {
margin-bottom: 25px;
}

.contact-address.style2 p:last-child {
margin-bottom: 0;
}

/* faq page */
.faqs {
border-bottom: 1px solid #edf6ff;
}

.faqs .panel + .panel {
margin-top: 0;
}

.faqs .panel-title .open-sub {
float: left;
font-family: FontAwesome;
text-align: center;
font-size: 10px;
width: 22px;
height: 22px;
line-height: 21px;
border: 1px solid #d4dde5;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-indent: 1px;
color: #d4dde5;
margin-right: 30px;
}

.faqs .panel-title .open-sub:before {
position: static;
display: inline;
content: "\f067";
height: auto;
margin: 0;
}

.faqs .panel-title a {
color: #1b4268;
line-height: 1;
padding: 25px 30px;
border: 1px solid #edf6ff;
border-bottom: none;
}

.faqs .panel-title a.active {
border-top: 1px solid {{ $color }};
}

.faqs .panel-title a.active .open-sub {
border-color: {{ $color }};
background: {{ $color }};
color: #fff;
}

.faqs .panel-title a.active .open-sub:before {
content: "\f068";
}

.faqs .panel-content {
padding: 30px 40px;
background: #edf6ff;
color: black;
}

/* terms and conditions */
ul.filter-options li {
background: #edf6ff;
margin-bottom: 0;
padding: 12px 20px 10px 55px;
}

ul.filter-options li:before {
left: 15px;
border: none;
background: #fff;
line-height: 22px;
}

ul.filter-options li + li {
margin-top: 1px;
}

ul.filter-options li a {
font-size: 1.0833em;
}

ul.filter-options li a:focus {
color: #1b4268;
}

ul.filter-options li:hover a, ul.filter-options li.active a {
color: #1b4268;
}

/* 404 page */
.error404, .coming-soon-page, .blank-page {
background: #edf6ff;
}

.error404 #page-wrapper, .coming-soon-page #page-wrapper, .blank-page #page-wrapper {
margin: 0 auto;
float: none;
padding: 0;
background: #fff;
max-width: 830px;
}

.error404 .container, .coming-soon-page .container, .blank-page .container {
max-width: 100%;
}

.error404 #main, .coming-soon-page #main, .blank-page #main {
padding-left: 15px;
padding-right: 15px;
float: none;
margin-left: auto;
margin-right: auto;
}

.error404 #header, .coming-soon-page #header, .blank-page #header {
position: relative;
border: 1px solid #d4dde5;
border-bottom: none;
border-top: none;
}

.error404 #header .branding, .coming-soon-page #header .branding, .blank-page #header .branding {
text-align: center;
}

.error404 #header .logo, .coming-soon-page #header .logo, .blank-page #header .logo {
display: inline-block;
margin-top: 35px;
}

.error404 #header .logo a, .coming-soon-page #header .logo a, .blank-page #header .logo a {
color: inherit;
font-weight: 600;
}

.error404 #content, .coming-soon-page #content, .blank-page #content {
padding: 0;
text-align: center;
border: 1px solid #d4dde5;
border-top: none;
}

.error404 .container, .coming-soon-page .container, .blank-page .container {
max-width: 830px;
}

.error404 .error-message-404, .coming-soon-page .error-message-404, .blank-page .error-message-404 {
text-align: center;
}

.error404 .error-message-404 span, .coming-soon-page .error-message-404 span, .blank-page .error-message-404 span {
display: inline-block;
font-weight: 200;
font-size: 300px;
color: #fff;
text-shadow: 0 0 2px #d4dde5;
line-height: 1;
position: relative;
}

.error404 .error-message-404 span:before, .coming-soon-page .error-message-404 span:before, .blank-page .error-message-404 span:before {
content: "404";
position: relative;
z-index: 1;
}

.error404 .error-message-404 span:after, .coming-soon-page .error-message-404 span:after, .blank-page .error-message-404 span:after {
box-shadow: none;
content: "404";
display: inline-block;
position: absolute;
left: 8px;
top: 8px;
color: #d4dde5;
z-index: 0;
}

.error404 .btn, .coming-soon-page .btn, .blank-page .btn {
padding-left: 45px;
padding-right: 45px;
margin-bottom: 10px;
}

.error404 #footer, .coming-soon-page #footer, .blank-page #footer {
background: #edf6ff;
}

.error404 #footer .copyright-area, .coming-soon-page #footer .copyright-area, .blank-page #footer .copyright-area {
display: block;
text-align: center;
padding-top: 40px;
}

.error404 #footer .copyright-area .secondary-menu, .error404 #footer .copyright-area .copyright, .coming-soon-page #footer .copyright-area .secondary-menu, .coming-soon-page #footer .copyright-area .copyright, .blank-page #footer .copyright-area .secondary-menu, .blank-page #footer .copyright-area .copyright {
display: block;
}

.error404 #footer .copyright-area .secondary-menu, .coming-soon-page #footer .copyright-area .secondary-menu, .blank-page #footer .copyright-area .secondary-menu {
display: inline-block;
}

.error404 #footer .copyright-area .copyright, .coming-soon-page #footer .copyright-area .copyright, .blank-page #footer .copyright-area .copyright {
text-align: inherit;
padding: 10px 0;
}

.coming-soon-page hr {
float: none;
padding: 0;
margin-left: auto;
margin-right: auto;
}

.coming-soon-page .clock-wrapper {
position: relative;
display: inline-block;
padding: 0 4px 4px 0;
margin: 60px 0 70px;
}

.coming-soon-page .clock {
font-weight: 200;
font-size: 150px;
color: #fff;
text-shadow: 0 0 2px #d4dde5;
line-height: 1;
position: relative;
display: inline-block;
z-index: 1;
}

.coming-soon-page .clock:after {
display: table;
content: "";
clear: both;
}

.coming-soon-page .clock li {
float: left;
display: block;
position: relative;
}

.coming-soon-page .clock li.sep {
line-height: 0.8;
}

.coming-soon-page .clock ~ .clock {
position: absolute;
z-index: 0;
top: 4px;
left: 4px;
color: #d4dde5;
box-shadow: none;
}

.coming-soon-page form h4 {
font-weight: 300;
}

.coming-soon-page form .input-text {
float: none;
background: #fff;
border: 1px solid #d4dde5;
}

.coming-soon-page form .input-text:focus {
border-color: {{ $color }};
}

.page-loading-wrapper {
display: inline-block;
vertical-align: middle;
padding: 0 15px;
width: 99%;
}

.page-loading-wrapper header {
position: static;
height: auto;
margin-bottom: 25px;
background: none;
}

.page-loading-wrapper header .logo {
display: inline-block;
font-size: 1.6667em;
font-weight: 600;
text-transform: uppercase;
margin-bottom: 0;
}

.page-loading-wrapper header .logo img {
margin-right: 5px;
}

.page-loading-wrapper header .logo a {
color: #1b4268 !important;
}

.page-loading-wrapper .progress-bar {
width: 370px;
margin: 0 auto;
height: 26px;
-webkit-border-radius: 13px 13px 13px 13px;
-moz-border-radius: 13px 13px 13px 13px;
-ms-border-radius: 13px 13px 13px 13px;
border-radius: 13px 13px 13px 13px;
padding: 4px;
max-width: 100%;
margin-bottom: 25px;
}

.page-loading-wrapper .progress-bar .fa-spinner {
color: {{ $color }};
}

.page-loading-wrapper .progress-bar .progress-inner {
height: 18px;
-webkit-border-radius: 9px 9px 9px 9px;
-moz-border-radius: 9px 9px 9px 9px;
-ms-border-radius: 9px 9px 9px 9px;
border-radius: 9px 9px 9px 9px;
background: {{ $color }};
}

.page-loading-wrapper .loading-text {
font-size: 1.6667em;
}

.pace {
user-select: none;
background: #edf6ff;
height: 100%;
left: 0;
opacity: 1;
position: fixed;
top: 0;
-moz-transition: all 0.4s ease-in-out 0s;
-o-transition: all 0.4s ease-in-out 0s;
-webkit-transition: all 0.4s ease-in-out 0s;
-ms-transition: all 0.4s ease-in-out 0s;
transition: all 0.4s ease-in-out 0s;
visibility: visible;
width: 100%;
z-index: 999999;
-webkit-backface-visibility: hidden;
text-align: center;
}

.pace-activity {
display: block;
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 100%;
z-index: 1;
}

.pace-activity:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.pace-inactive {
display: none;
}

.pace .loading-page {
-webkit-backface-visibility: hidden !important;
-webkit-transform: none !important;
}

/* 6.2. Portfolio Pages ~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.post-filters {
margin-bottom: 40px;
text-align: center;
}

.post-wrapper .iso-container .iso-item {
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-moz-transition: opacity 0.8s ease 0s;
-o-transition: opacity 0.8s ease 0s;
-webkit-transition: opacity 0.8s ease 0s;
-ms-transition: opacity 0.8s ease 0s;
transition: opacity 0.8s ease 0s;
}

.post-wrapper.isotope-active .iso-container .iso-item {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.post-wrapper .load-more {
margin: 50px 0 30px;
padding: 0 40px;
}

.post-wrapper img {
width: 100%;
}

.post-wrapper .post {
display: block;
position: relative;
overflow: hidden;
margin-bottom: 0;
}

.post-wrapper figure {
display: block;
position: relative;
overflow: hidden;
width: 100%;
}

.post-wrapper .post {
margin-bottom: 0;
}

.portfolio-hover-holder, .portfolio-hover-holder .portfolio-action:before {
background: rgba(255, 255, 255, 0.85);
}

.portfolio-hover-holder {
position: absolute;
height: 64px;
left: 0;
width: 100%;
bottom: -64px;
-moz-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
-webkit-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.portfolio-hover-holder .portfolio-action {
position: absolute;
right: 20px;
top: -20px;
padding: 8px 10px;
display: inline-block;
}

.portfolio-hover-holder .portfolio-action i {
font-size: 1.0833em;
color: {{ $color }};
}

.portfolio-hover-holder .portfolio-action a {
position: relative;
z-index: 1;
}

.portfolio-hover-holder .portfolio-action a:hover i {
color: #fff;
background: {{ $color }};
}

.portfolio-hover-holder .portfolio-action a + a {
margin-left: 5px;
}

.portfolio-hover-holder .portfolio-action:before {
content: "";
position: absolute;
height: 20px;
top: 0;
left: 0;
width: 100%;
-webkit-border-radius: 20px 20px 0 0;
-moz-border-radius: 20px 20px 0 0;
-ms-border-radius: 20px 20px 0 0;
border-radius: 20px 20px 0 0;
z-index: 0;
}

.portfolio-hover-holder .portfolio-text {
display: table;
width: 100%;
height: 100%;
line-height: 1.1;
}

.portfolio-hover-holder .portfolio-text-inner {
padding: 0 20px;
}

.portfolio-hover-holder .portfolio-title {
display: inline;
margin-bottom: 0;
}

.portfolio-hover-holder .portfolio-category {
font-size: 0.8333em;
text-transform: uppercase;
}

.portfolio-hover-holder.style1 {
position: absolute;
height: 100%;
left: 0;
top: 0;
width: 100%;
background: none;
text-align: center;
z-index: 9;
}

.portfolio-hover-holder.style1:before {
content: "";
display: inline-block;
height: 100%;
vertical-align: middle;
}

.portfolio-hover-holder.style1 .portfolio-action {
position: static;
-webkit-border-radius: 25px 25px 25px 25px;
-moz-border-radius: 25px 25px 25px 25px;
-ms-border-radius: 25px 25px 25px 25px;
border-radius: 25px 25px 25px 25px;
display: inline-block;
vertical-align: middle;
background: rgba(255, 255, 255, 0.85);
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-moz-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
-webkit-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
-webkit-transform: translateY(-10px);
-moz-transform: translateY(-10px);
-ms-transform: translateY(-10px);
-o-transform: translateY(-10px);
transform: translateY(-10px);
margin-top: -60px;
}

.portfolio-hover-holder.style1 .portfolio-action i {
width: 2.4em;
height: 2.4em;
line-height: 2.35em;
}

.portfolio-hover-holder.style1 .portfolio-action:before {
display: none;
}

.portfolio-hover-holder.style1 .portfolio-like {
font-size: 10px;
float: right;
background: #fff;
padding: 0 15px;
margin-right: 0;
color: inherit;
margin-left: 4px;
}

.portfolio-hover-holder.style1 .portfolio-like .fa {
font-size: 9px;
color: #d4dde5;
margin-right: 3px;
}

.portfolio-hover-holder.style1 .portfolio-like:hover {
color: #fff;
background: #eb3b50;
}

.portfolio-hover-holder.style1 .portfolio-like:hover .fa {
color: #fff;
}

.portfolio-hover-holder.style1 .portfolio-text {
display: block;
position: absolute;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
left: 0;
bottom: -60px;
width: 100%;
height: 60px;
-moz-transition: all 0.4s ease 0s;
-o-transition: all 0.4s ease 0s;
-webkit-transition: all 0.4s ease 0s;
-ms-transition: all 0.4s ease 0s;
transition: all 0.4s ease 0s;
background: #edf6ff;
z-index: 8;
text-align: left;
}

.portfolio-hover-holder.style1 .portfolio-text .portfolio-text-inner {
width: 100%;
padding: 0 18px;
height: 100%;
display: table;
}

.portfolio-hover-holder.style1 .portfolio-title {
display: block;
}

.post:hover .portfolio-hover-holder {
bottom: 0;
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.post:hover .portfolio-hover-holder.style1 .portfolio-text {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
bottom: 0;
}

.post:hover .portfolio-hover-holder.style1 .portfolio-action {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
-webkit-transform: translateY(0);
-moz-transform: translateY(0);
-ms-transform: translateY(0);
-o-transform: translateY(0);
transform: translateY(0);
}

.container .iso-container.style-fancy.iso-col-5 .iso-item .portfolio-text-inner {
padding: 0 12px;
}

.container .iso-container.style-fancy.iso-col-5 .iso-item .portfolio-hover-holder {
height: 58px;
}

.container .iso-container.style-fancy.iso-col-5 .iso-item .portfolio-action {
padding: 7px 8px;
}

.container .iso-container.style-fancy.iso-col-5 .iso-item .portfolio-action i {
width: 1.8em;
height: 1.8em;
line-height: 1.75em;
}

.post .portfolio-content {
padding: 25px 30px;
background: #edf6ff;
}

.post .portfolio-content .portfolio-title {
font-weight: 400;
font-size: 1.5em;
margin-bottom: 5px;
display: block;
}

.post .portfolio-content .portfolio-meta {
font-size: 0.9167em;
margin-bottom: 20px;
}

.post .portfolio-content .btn {
background: #fff;
color: inherit;
}

.post .portfolio-content .btn:hover {
background: #1b4268;
color: #fff;
}

.iso-container {
position: relative;
z-index: 20;
-moz-transition: height 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
-o-transition: height 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
-webkit-transition: height 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
-ms-transition: height 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
transition: height 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
}

.iso-container:after {
content: "";
display: table;
clear: both;
}

.iso-container.iso-col-2 .iso-item {
width: 50%;
}

.iso-container.iso-col-2 .iso-item.double-width {
width: 100%;
}

.iso-container.iso-col-3 .iso-item {
width: 33.3333%;
}

.iso-container.iso-col-3 .iso-item.double-width {
width: 66.66666%;
}

.iso-container.iso-col-4 .iso-item {
width: 25%;
}

.iso-container.iso-col-4 .iso-item.double-width {
width: 50%;
}

.iso-container.iso-col-5 .iso-item {
width: 20%;
}

.iso-container.iso-col-5 .iso-item.double-width {
width: 40%;
}

.iso-container.iso-col-6 .iso-item {
width: 16.6666%;
}

.iso-container.iso-col-6 .iso-item.double-width {
width: 33.3333%;
}

.iso-container .iso-item {
float: left;
}

.iso-container .iso-item img {
width: 100%;
}

.iso-container.style-grid {
margin: -15px -15px;
}

.iso-container.style-grid .iso-item {
padding: 15px;
}

.iso-container.style-masonry {
/*overflow: hidden;*/
/*&.iso-col-2 .iso-item {
width: 49.9%;
&.double-width { width: 100%; }
}
&.iso-col-3 .iso-item {
width: 33.31%;
&.double-width { width: 66.62%; }
}
&.iso-col-4 .iso-item {
width: 24.98%;
&.double-width { width: 49.96%; }
}
&.iso-col-5 .iso-item {
width: 19.98%;
&.double-width { width: 39.96%; }
}
&.iso-col-6 .iso-item {
width: 16.64%;
&.double-width { width: 33.28%; }
}*/
margin-top: -2px;
margin-left: -2px;
margin-right: -2px;
}

.iso-container.style-masonry .iso-item {
padding: 2px;
float: left;
clear: none;
}

.iso-container.style-masonry .iso-item article {
margin-bottom: 0;
}

.iso-container.style-masonry.has-column-width {
margin: -15px;
}

.iso-container.style-masonry.has-column-width .iso-item {
padding: 15px;
}

.post-pagination {
margin-top: 30px;
padding-top: 15px;
border-top: 1px solid #edf6ff;
margin-bottom: 30px;
position: relative;
}

.post-pagination .nav-prev, .post-pagination .nav-next {
margin-top: 0;
top: 15px;
}

.post-pagination .nav-prev:before, .post-pagination .nav-next:before {
border-color: #d4dde5;
color: #d4dde5;
}

.post-pagination .nav-prev:hover:before, .post-pagination .nav-next:hover:before {
color: #fff;
}

.post-pagination .nav-prev.disabled, .post-pagination .nav-next.disabled {
cursor: default;
}

.post-pagination .nav-prev.disabled:hover:before, .post-pagination .nav-next.disabled:hover:before {
color: #d4dde5;
border-color: #d4dde5;
background: none;
}

.post-pagination .nav-prev {
left: 0;
}

.post-pagination .nav-prev:before {
content: "\f177";
}

.post-pagination .nav-next {
right: 0;
}

.post-pagination .nav-next:before {
content: "\f178";
}

.post-pagination .page-links {
height: 28px;
padding: 0 50px;
text-align: center;
color: #d4dde5;
}

.post-pagination .page-links > a, .post-pagination .page-links > span {
display: inline-block;
height: 28px;
width: 28px;
line-height: 27px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
margin: 0 3px;
border: 1px solid;
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
}

.post-pagination .page-links > span.active, .post-pagination .page-links > a:hover, .post-pagination .page-links > a:focus {
color: #fff;
border-color: {{ $color }};
background: {{ $color }};
}

.single-portfolio .portfolio-title {
margin-bottom: 25px;
}

.single-portfolio .portfolio-action {
float: right;
}

.single-portfolio .portfolio-action .btn {
font-size: 10px;
background: none;
border: 1px solid #d4dde5;
padding: 0 15px;
margin-right: 0;
color: inherit;
margin-left: 4px;
}

.single-portfolio .portfolio-action .btn i {
font-size: 9px;
color: #d4dde5;
margin-right: 3px;
}

.single-portfolio .portfolio-action .btn:hover {
color: #fff;
background: #eb3b50;
border-color: #eb3b50;
}

.single-portfolio .portfolio-action .btn:hover .fa {
color: #fff;
}

.single-portfolio .post-meta h5 {
margin-bottom: 5px;
}

.single-portfolio .portfolio-detail > *:last-child {
margin-bottom: 0;
}

.video-container {
position: relative;
width: 100%;
}

.video-container .mejs-poster {
background-size: cover;
background-color: #1b4268;
}

.video-container.mejs-skin .mejs-container {
visibility: visible;
}

.video-container.mejs-skin .mejs-controls {
display: none !important;
}

.video-container.mejs-skin .mejs-container, .video-container.mejs-skin .mejs-layer {
/*width: 100% !important; height: 100% !important;*/
}

.video-container.mejs-skin .mejs-mediaelement object, .video-container.mejs-skin .mejs-mediaelement video, .video-container.mejs-skin .mejs-mediaelement embed {
position: absolute;
left: 0;
top: 0;
}

.video-container.mejs-skin video {
visibility: hidden;
}

.video-container.mejs-skin .me-plugin {
width: 100%;
height: 100%;
text-align: center;
}

.video-container.mejs-skin .mejs-overlay-play .mejs-overlay-button {
position: absolute;
background: none;
width: 90px;
height: 90px;
margin-left: -45px;
top: 40%;
-webkit-border-radius: 45px 45px 45px 45px;
-moz-border-radius: 45px 45px 45px 45px;
-ms-border-radius: 45px 45px 45px 45px;
border-radius: 45px 45px 45px 45px;
background: {{ $color }};
z-index: 1;
}

.video-container.mejs-skin .mejs-overlay-play .mejs-overlay-button:before {
content: "\f04b";
position: absolute;
z-index: 1;
left: -10px;
top: -10px;
width: 110px;
height: 110px;
font-family: FontAwesome;
color: #fff;
text-align: center;
line-height: 90px;
font-size: 2.5em;
text-indent: 5px;
border: 10px solid rgba(0, 0, 0, 0.15);
-webkit-border-radius: 55px 55px 55px 55px;
-moz-border-radius: 55px 55px 55px 55px;
-ms-border-radius: 55px 55px 55px 55px;
border-radius: 55px 55px 55px 55px;
}

.video-container.mejs-skin .mejs-overlay-play .mejs-overlay-button:after {
content: "";
position: absolute;
z-index: 0;
left: 0;
top: 0;
width: 90px;
height: 45px;
background: {{ $secondColor }};
-webkit-border-radius: 45px 45px 0 0;
-moz-border-radius: 45px 45px 0 0;
-ms-border-radius: 45px 45px 0 0;
border-radius: 45px 45px 0 0;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
-moz-transition: opacity 0.25s ease 0s;
-o-transition: opacity 0.25s ease 0s;
-webkit-transition: opacity 0.25s ease 0s;
-ms-transition: opacity 0.25s ease 0s;
transition: opacity 0.25s ease 0s;
}

.video-container.mejs-skin .mejs-overlay-play .mejs-overlay-button:hover:after {
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.video-container.mejs-skin .mejs-overlay-loading {
display: none;
}

.video-container.mejs-skin .video-text {
text-align: center;
margin: 100px auto 30px;
position: absolute;
top: 40%;
left: 0;
width: 100%;
}

.video-container .full-video {
width: 100%;
height: 100%;
}

.video-container .full-video video, .video-container .full-video object, .video-container .full-video embed {
width: 100%;
height: 100%;
}

.video-container.mejs-skin .full-video {
overflow: hidden;
}

.video-container.mejs-skin .full-video .mejs-mediaelement {
position: static;
}

.video-container.mejs-skin .full-video video, .video-container.mejs-skin .full-video object, .video-container.mejs-skin .full-video embed, .video-container.mejs-skin .full-video iframe {
width: 100% !important;
height: 100% !important;
}

.video-container.mejs-skin .full-video .mejs-container {
width: 100% !important;
}

.video-container.mejs-skin .full-video .mejs-layer, .video-container.mejs-skin .full-video .me-plugin {
width: 100% !important;
height: 100% !important;
}

.video-container.mejs-skin .full-video .mejs-overlay-button {
margin: -50px 0 0 -50px !important;
top: 50% !important;
}

.video-container.mejs-skin .full-video .mejs-overlay-play .mejs-overlay-button {
background: none;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
-moz-transition: opacity 0.3s ease 0s;
-o-transition: opacity 0.3s ease 0s;
-webkit-transition: opacity 0.3s ease 0s;
-ms-transition: opacity 0.3s ease 0s;
transition: opacity 0.3s ease 0s;
}

.video-container.mejs-skin .full-video .mejs-overlay-play .mejs-overlay-button:after {
display: none;
}

.video-container.mejs-skin .full-video:hover .mejs-overlay-play .mejs-overlay-button {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.video-container.mejs-success .full-video .mejs-container {
height: 100% !important;
}

.audio-container {
position: relative;
width: 100%;
line-height: 0;
}

.audio-container audio, .audio-container object {
width: 100%;
}

.audio-container .mejs-container {
width: 100% !important;
height: 40px !important;
background: #edf6ff;
}

.audio-container .mejs-container .mejs-controls > div {
float: none;
height: 40px;
padding: 0;
}

.audio-container .mejs-controls {
display: table;
width: 100%;
background: #edf6ff;
height: auto;
table-layout: fixed;
padding: 0 20px 0 15px;
}

.audio-container .mejs-controls .mejs-playpause-button button {
font-size: 12px;
}

.audio-container .mejs-controls .mejs-play button {
background: none;
color: #939faa;
font-family: FontAwesome;
}

.audio-container .mejs-controls .mejs-play button:before {
content: "\f04b";
}

.audio-container .mejs-controls .mejs-pause button {
background: none;
color: #939faa;
font-family: FontAwesome;
}

.audio-container .mejs-controls .mejs-pause button:before {
content: "\f04c";
}

.audio-container .mejs-controls .mejs-time {
width: 30px;
}

.audio-container .mejs-controls .mejs-time span {
color: #939faa;
}

.audio-container .mejs-controls .mejs-time-rail {
width: 100% !important;
}

.audio-container .mejs-controls .mejs-time-rail .mejs-time-total, .audio-container .mejs-controls .mejs-time-rail .mejs-time-loaded, .audio-container .mejs-controls .mejs-time-rail .mejs-time-current {
-webkit-border-radius: 5px 5px 5px 5px;
-moz-border-radius: 5px 5px 5px 5px;
-ms-border-radius: 5px 5px 5px 5px;
border-radius: 5px 5px 5px 5px;
}

.audio-container .mejs-controls .mejs-time-rail .mejs-time-total {
top: 50%;
margin-top: -5px;
background: #fff;
}

.audio-container .mejs-controls .mejs-time-rail .mejs-time-loaded {
background: #fff;
}

.audio-container .mejs-controls .mejs-time-rail .mejs-time-current {
background: {{ $color }};
}

.audio-container .mejs-controls .mejs-time-rail .mejs-time-float {
display: none !important;
}

.audio-container .mejs-controls .mejs-button button {
position: static;
outline: none;
}

.audio-container .mejs-controls .mejs-button.mejs-volume-button button {
background-position: left center;
background-repeat: no-repeat;
}

.audio-container .mejs-controls .mejs-button.mejs-volume-button.mejs-mute button {
background-image: url(../miracle/images/icon/volume_mute.png);
}

.audio-container .mejs-controls .mejs-button.mejs-volume-button.mejs-unmute button {
background-image: url(../miracle/images/icon/volume-unmute.png);
}

.audio-container .mejs-controls .mejs-horizontal-volume-slider {
width: 50px;
position: relative;
}

.audio-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total, .audio-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
top: 16px;
-webkit-border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-ms-border-radius: 4px 4px 4px 4px;
border-radius: 4px 4px 4px 4px;
}

.audio-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-total {
background: #d4dde5;
}

.audio-container .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current {
background: #fff;
}

/* 6.3. Blog Pages ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* single post */
.single-post .about-author {
background: #edf6ff;
padding: 25px 30px;
display: table;
width: 100%;
}

.single-post .about-author .author-img {
width: 146px;
display: table-cell;
vertical-align: top;
}

.single-post .about-author .author-img span {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 6px solid #fff;
display: block;
width: 146px;
height: 146px;
}

.single-post .about-author .author-img img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
width: 100%;
}

.single-post .about-author .about-author-content {
padding-left: 25px;
display: table-cell;
vertical-align: top;
padding-top: 10px;
}

.single-post .about-author .about-author-content > *:last-child {
margin-bottom: 0;
}

.single-post .about-author .about-author-content .social-icons {
float: right;
}

.single-post .about-author .about-author-content .social-icons .social-icon i {
background: #fff;
border: none;
}

.single-post .about-author .about-author-content .social-icons .social-icon:hover i {
background: {{ $color }};
}

.related-posts {
margin-left: -5px;
margin-right: -5px;
}

.related-posts .related-post {
padding: 0 5px;
margin-bottom: 10px;
}

.related-posts .related-post .post {
background: #edf6ff;
display: table;
width: 100%;
padding: 10px;
margin-bottom: 0;
}

.related-posts .related-post .post-image {
width: 74px;
}

.related-posts .related-post .post-image .img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 3px solid #fff;
width: 74px;
height: 74px;
background-repeat: no-repeat;
background-size: cover;
background-position: center center;
}

.related-posts .related-post .post-image .img img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
width: 100%;
}

.related-posts .related-post .post-meta {
margin-bottom: 0;
}

.related-posts .related-post .details {
padding-left: 20px;
}

.related-posts .related-post .post-title {
margin-bottom: 0;
}

.commentlist .comment {
border: 2px solid #edf6ff;
padding: 25px 30px 15px;
margin-bottom: 20px;
}

.commentlist .comment .author-img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
width: 68px;
height: 68px;
float: left;
}

.commentlist .comment .author-img span {
width: 68px;
height: 68px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
display: block;
}

.commentlist .comment .author-img img {
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
width: 100%;
}

.commentlist .comment .comment-content {
padding-left: 95px;
}

.commentlist .comment .comment-author-name {
display: inline-block;
margin-right: 6px;
margin-bottom: 0;
}

.commentlist .comment .comment-author-name:after {
content: "|";
display: inline-block;
padding-left: 10px;
color: #edf6ff;
}

.commentlist .comment .comment-text > *:last-child {
margin-bottom: 0;
}

.commentlist .comment .comment-date {
font-size: 0.9167em;
}

.commentlist .comment .comment-date .dot {
font-size: 1.4545em;
padding: 0 5px;
font-weight: 900;
}

.commentlist .comment .btn, .commentlist .comment .comment-text {
margin-top: 5px;
margin-bottom: 10px;
}

.commentlist li:last-child .comment {
margin-bottom: 0;
}

/* 6.4. Homepage ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
.trend-section {
padding-bottom: 0;
position: relative;
margin-bottom: 150px;
background: #edf6ff;
}

.trend-section .trend-image {
position: absolute;
left: 0;
width: 100%;
bottom: -150px;
z-index: 11;
}

.trend-section .trend-image img {
max-width: 80%;
width: auto;
}

.colors-section .logo-icon, .colors-section .colors-container a {
display: inline-block;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
position: relative;
-webkit-backface-visibility: hidden;
}

.colors-section .logo-icon:before, .colors-section .colors-container a:before {
content: "";
display: block;
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 100%;
z-index: 1;
background-image: url(../miracle/images/logo.svg);
background-repeat: no-repeat;
background-size: 50% 50%;
background-position: center center;
}

.colors-section .logo-icon span, .colors-section .colors-container a span {
display: block;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
-webkit-transform: rotate(30deg);
-moz-transform: rotate(30deg);
-ms-transform: rotate(30deg);
-o-transform: rotate(30deg);
transform: rotate(30deg);
position: relative;
overflow: hidden;
z-index: 0;
height: 100%;
}

.colors-section .logo-icon span:before, .colors-section .colors-container a span:before {
content: "";
display: block;
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 50%;
-webkit-border-radius: 200px 200px 0 0;
-moz-border-radius: 200px 200px 0 0;
-ms-border-radius: 200px 200px 0 0;
border-radius: 200px 200px 0 0;
}

.colors-section .logo-icon {
display: block;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
border: 10px solid rgba(255, 255, 255, 0.08);
margin: 0 auto 20px;
}

.colors-section .logo-icon img {
width: 100%;
height: auto;
}

.colors-section .logo-icon .logo-icon-inner {
display: block;
border: 12px solid #ff3e3e;
background: #ff3e3e;
}

.colors-section .logo-icon .logo-icon-inner:before {
background-color: #ff5b5b;
}

.colors-section .colors-container a {
width: 60px;
height: 60px;
border: 5px solid transparent;
margin: 0 5px 5px 0;
}

.colors-section .colors-container a span:before {
-moz-transition: opacity 0.25s ease 0s;
-o-transition: opacity 0.25s ease 0s;
-webkit-transition: opacity 0.25s ease 0s;
-ms-transition: opacity 0.25s ease 0s;
transition: opacity 0.25s ease 0s;
}

.colors-section .colors-container a.skin-color-navy span {
background-color: #006cff;
}

.colors-section .colors-container a.skin-color-navy span:before {
background-color: #1a7bff;
}

.colors-section .colors-container a.skin-color-red span {
background-color: #ff3e3e;
}

.colors-section .colors-container a.skin-color-red span:before {
background-color: #ff5b5b;
}

.colors-section .colors-container a.skin-color-sea span {
background-color: #0ab596;
}

.colors-section .colors-container a.skin-color-sea span:before {
background-color: #3bc4ab;
}

.colors-section .colors-container a.skin-color-purple span {
background-color: #b215e6;
}

.colors-section .colors-container a.skin-color-purple span:before {
background-color: #c144eb;
}

.colors-section .colors-container a.skin-color-blue span {
background-color: #00a2ee;
}

.colors-section .colors-container a.skin-color-blue span:before {
background-color: #33b5f1;
}

.colors-section .colors-container a.skin-color-green span {
background-color: #7dbd22;
}

.colors-section .colors-container a.skin-color-green span:before {
background-color: #97ca4e;
}

.colors-section .colors-container a.skin-color-gold span {
background-color: #ffc000;
}

.colors-section .colors-container a.skin-color-gold span:before {
background-color: #ffcd33;
}

.colors-section .colors-container a.skin-color-gray span {
background-color: #acacac;
}

.colors-section .colors-container a.skin-color-gray span:before {
background-color: #bdbdbd;
}

.colors-section .colors-container a:hover {
border-color: rgba(255, 255, 255, 0.08);
}

.colors-section .colors-container a:hover span:before {
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.colors-section .heading-box {
text-align: left;
}

.colors-section .btn {
margin-top: 30px;
color: #fff;
}

.responsive-section {
padding-top: 70px;
overflow: hidden;
margin-top: -70px;
}

.responsive-section .parallax {
overflow: visible;
position: static;
}

.responsive-section .callout-image-container .callout-image img {
margin-top: -70px;
}

.responsive-section .callout-image-container .callout-image img.active {
-webkit-animation: fadeInUp 2s ease;
-moz-animation: fadeInUp 2s ease;
animation: fadeInUp 2s ease;
}

.responsive-section .heading-box {
text-align: left;
}

.responsive-section .heading-box .box-title {
margin-bottom: 20px;
}

.responsive-section .callout-content {
padding: 80px 0;
}

.responsive-section .responsive-button {
text-align: left;
}

.responsive-section .responsive-button a {
display: inline-block;
margin-bottom: 10px;
width: 236px;
height: 90px;
background: #fff;
max-width: 48%;
line-height: 70px;
white-space: nowrap;
font-size: 1.3333em;
color: #1b4268;
padding: 10px;
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
}

.responsive-section .responsive-button a:hover {
color: {{ $color }};
}

.responsive-section .responsive-button a i {
display: block;
float: left;
width: 70px;
height: 70px;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
text-align: center;
color: #fff;
background: {{ $color }};
font-size: 35px;
margin-right: 20px;
line-height: 70px;
position: relative;
overflow: hidden;
}

.responsive-section .responsive-button a i:before {
position: relative;
z-index: 1;
}

.responsive-section .responsive-button a i:after {
content: "";
display: block;
position: absolute;
left: 0;
top: 0;
z-index: 0;
width: 100%;
height: 50%;
background: {{ $secondColor }};
-webkit-border-radius: 35px 35px 0 0;
-moz-border-radius: 35px 35px 0 0;
-ms-border-radius: 35px 35px 0 0;
border-radius: 35px 35px 0 0;
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
-webkit-transform-origin: 50% 100%;
-moz-transform-origin: 50% 100%;
-ms-transform-origin: 50% 100%;
-o-transform-origin: 50% 100%;
transform-origin: 50% 100%;
}

.responsive-section .responsive-button a.btn-tablet-view {
-webkit-border-radius: 45px 0 0 45px;
-moz-border-radius: 45px 0 0 45px;
-ms-border-radius: 45px 0 0 45px;
border-radius: 45px 0 0 45px;
}

.responsive-section .responsive-button a.btn-mobile-view {
-webkit-border-radius: 0 45px 45px 0;
-moz-border-radius: 0 45px 45px 0;
-ms-border-radius: 0 45px 45px 0;
border-radius: 0 45px 45px 0;
text-align: right;
}

.responsive-section .responsive-button a.btn-mobile-view i {
float: right;
margin-right: 0;
margin-left: 20px;
}

.responsive-section .responsive-button a.active {
background: {{ $color }};
color: #fff;
}

.responsive-section .responsive-button a.active:hover {
color: #fff;
}

.responsive-section .responsive-button a.active i {
background: #fff;
color: #1b4268;
}

.responsive-section .responsive-button a.active i:after {
display: none;
}

.miracle-intro-section {
position: relative;
margin: 0 auto;
float: none;
padding: 0;
z-index: 0;
margin-bottom: -10%;
}

.miracle-intro-section .badge {
background: none;
max-width: 20%;
}

.miracle-intro-section > div {
position: absolute;
}

.miracle-intro-section .macbook {
position: static;
max-width: 75%;
margin-left: 20px;
}

.miracle-intro-section .badge {
left: 0;
top: 0;
z-index: 2;
}

.miracle-intro-section .ipad {
max-width: 32%;
right: 0;
bottom: 0;
}

.miracle-intro-section .iphone {
max-width: 13%;
right: 27%;
bottom: 0;
}

.miracle-intro-section-wrapper {
position: relative;
z-index: -1;
}

.image-wrap-with-shadow {
display: inline-block;
position: relative;
}

.image-wrap-with-shadow:before {
content: "";
position: absolute;
z-index: 0;
}

.image-wrap-with-shadow:before {
width: 118%;
height: 200%;
left: 5px;
top: 5px;
-webkit-transform-origin: 0 0;
-moz-transform-origin: 0 0;
-ms-transform-origin: 0 0;
-o-transform-origin: 0 0;
transform-origin: 0 0;
-webkit-transform: rotate(35deg);
-moz-transform: rotate(35deg);
-ms-transform: rotate(35deg);
-o-transform: rotate(35deg);
transform: rotate(35deg);
background: rgba(0, 0, 0, 0.25);
}

.image-wrap-with-shadow img {
position: relative;
z-index: 1;
}

.add-circle-box-line > [class^="col-"], .add-circle-box-line > [class*=" col-"] {
border-right: 1px solid rgba(255, 255, 255, 0.1);
}

.add-circle-box-line > [class^="col-"]:last-child, .add-circle-box-line > [class*=" col-"]:last-child {
border-right: none;
}

.mobile-retina-ready-section .image-container {
margin-right: 100px;
}

.parallax-image1 {
background-image: url("http://placehold.it/1920x1280");
}

.parallax-image2 {
background-image: url("http://placehold.it/1920x1280");
height: 488px;
}

.banner-image1 {
background-image: url("http://placehold.it/1920x469");
}

.banner-image2 {
background-image: url("http://placehold.it/1920x312");
}

.banner-color1 {
background-color: rgba(237, 246, 255, 0.75);
}

.bg-client-section {
background: url("http://placehold.it/1920x555") no-repeat center center;
background-size: cover;
}

.bg-client-section > .section {
background: rgba(15, 37, 65, 0.7);
}

/* 6.5. WooCommerce Pages ~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* category page */
body.woocommerce select:not(.default-style), body.woocommerce select:not(.default-style) + .customSelect {
height: 28px;
line-height: 26px;
font-size: 0.8333em;
text-transform: uppercase;
}

body.woocommerce select:not(.default-style) {
line-height: 24px;
}

body.woocommerce select:not(.default-style) + .customSelect {
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
border: 1px solid #d4dde5;
background: none;
/*.customSelectFocus { border-color: $theme-skin-color; }*/
}

body.woocommerce select:not(.default-style) + .customSelect .customSelectInner:before {
color: #d4dde5;
color: #d4dde5;
}

.woocommerce-ordering .customSelectInner:before {
content: "\f107";
border: none;
font-family: FontAwesome;
margin: 0;
top: 0;
font-size: 13px;
right: 15px;
}

.view-switcher {
float: right;
}

.view-switcher .btn i {
margin-right: 4px;
font-size: 13px;
line-height: 26px;
float: left;
color: #d4dde5;
}

.view-switcher .btn:hover i, .view-switcher .btn:focus i {
color: #fff;
}

.view-switcher .btn.active i {
color: #fff;
}

.products .product-image {
position: relative;
display: block;
border: 2px solid #edf6ff;
}

.products .product-image img {
width: 100%;
height: auto;
}

.products .product-image:hover .back-img img {
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
}

.products .product-image .first-img img {
-moz-transition: all 0.2s linear 0s;
-o-transition: all 0.2s linear 0s;
-webkit-transition: all 0.2s linear 0s;
-ms-transition: all 0.2s linear 0s;
transition: all 0.2s linear 0s;
}

.products .product-image .back-img img {
position: absolute;
-webkit-backface-visibility: hidden;
backface-visibility: hidden;
display: block;
top: 0;
width: 100%;
height: auto;
margin: 0 auto;
-moz-transition: all 0.2s ease-out 0s;
-o-transition: all 0.2s ease-out 0s;
-webkit-transition: all 0.2s ease-out 0s;
-ms-transition: all 0.2s ease-out 0s;
transition: all 0.2s ease-out 0s;
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.products .product.loading .product-image:before {
content: "";
display: block;
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 100%;
background-color: rgba(255, 255, 255, 0.8);
}

.products .product.loading .product-image:after {
content: "\f110";
font-size: 16px;
position: absolute;
left: 0;
display: block;
width: 100%;
top: 50%;
margin-top: -8px;
text-align: center;
font-family: FontAwesome;
-webkit-animation: spin 2s infinite linear;
-moz-animation: spin 2s infinite linear;
animation: spin 2s infinite linear;
}

.products .product-content, .products .product-action {
background: #edf6ff;
}

.products .product-content {
padding: 15px 20px;
margin-bottom: 1px;
}

.products .product-title {
margin-bottom: 4px;
}

.products .product-price {
color: #eb3b50;
font-weight: 600;
font-size: 1.3333em;
float: left;
margin-right: 8px;
}

.products .currency-symbol {
font-weight: 400;
}

.products .product-action {
padding: 10px 20px 0;
text-align: right;
}

.products .product-action .btn {
display: inline-block;
height: 28px;
width: 28px;
line-height: 28px;
padding: 0;
background: #fff;
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
color: inherit;
font-size: 0.8333em;
font-weight: 400;
margin: 0 0 10px 5px;
}

.products .product-action .btn i {
color: #d4dde5;
margin-right: 0;
}

.products .product-action .btn:hover {
background: {{ $color }};
color: #fff;
}

.products .product-action .btn:hover i {
color: #fff;
}

.products .product-action .btn-add-to-cart {
float: left;
width: auto;
padding-left: 15px;
padding-right: 15px;
margin-left: 0;
}

.products .product-action .btn-add-to-cart i {
margin-right: 3px;
font-size: 12px;
}

.products .product-action:after {
display: table;
content: "";
clear: both;
}

.products.layout-list .product > * {
padding: 0;
}

.products.layout-list .product:after {
content: "";
display: table;
clear: both;
}

.products.layout-list .product-image {
float: left;
width: 30%;
border-right-width: 0;
}

.products.layout-list .product-meta-wrap {
float: left;
width: 70%;
}

.products.layout-list .product-content {
padding: 30px 30px 20px;
}

.products.layout-list .product-content > *:last-child {
margin-bottom: 0;
}

.products.layout-list .product-action {
text-align: left;
padding-left: 22px;
padding-right: 25px;
}

.products.layout-list .product-action .btn-add-to-cart {
float: right;
}

.woocommerce .panel {
border: none;
-webkit-border-radius: 0 0 0 0;
-moz-border-radius: 0 0 0 0;
-ms-border-radius: 0 0 0 0;
border-radius: 0 0 0 0;
box-shadow: none;
}

.woocommerce .single-product-details .product-images a {
display: block;
text-align: center;
}

.woocommerce .single-product-details .product-images img {
width: 100%;
max-width: 100%;
}

.woocommerce .single-product-details .product-images .easyzoom-flyout img {
max-width: none;
width: auto;
}

.woocommerce .single-product-details .product-images .images {
border: 2px solid #edf6ff;
margin-bottom: 10px;
}

.woocommerce .single-product-details .product-images .thumbnails {
padding: 0 65px;
}

.woocommerce .single-product-details .product-images .thumbnails .owl-item {
padding: 0 5px;
height: auto !important;
}

.woocommerce .single-product-details .product-images .thumbnails .item {
border: 2px solid #edf6ff;
display: table;
height: 100%;
width: 100%;
table-layout: fixed;
}

.woocommerce .single-product-details .product-images .thumbnails .owl-buttons .owl-prev:before, .woocommerce .single-product-details .product-images .thumbnails .owl-buttons .owl-next:before {
border-color: #d4dde5;
color: #d4dde5;
}

.woocommerce .single-product-details .product-images .thumbnails .owl-buttons .owl-prev:hover:before, .woocommerce .single-product-details .product-images .thumbnails .owl-buttons .owl-next:hover:before {
border-color: {{ $color }};
color: #fff;
}

.woocommerce .single-product-details .product-images .thumbnails .owl-buttons .owl-prev {
left: 0;
}

.woocommerce .single-product-details .product-images .thumbnails .owl-buttons .owl-next {
right: 0;
}

.woocommerce .single-product-details .star-rating {
font-size: 16px;
line-height: 2em;
}

.woocommerce .single-product-details .product-title {
float: left;
margin-bottom: 8px;
margin-right: 15px;
}

.woocommerce .single-product-details .product-price {
font-size: 2em;
color: #eb3b50;
display: block;
}

.woocommerce .single-product-details .product-meta {
margin-top: 20px;
font-size: 1.0833em;
}

.woocommerce .single-product-details .product-meta dt, .woocommerce .single-product-details .product-meta dd {
line-height: 1.8461em;
}

.woocommerce .single-product-details .product-meta dt {
float: left;
color: #1b4268;
margin-right: 5px;
clear: both;
}

.woocommerce .single-product-details .product-meta dd:after {
content: ".";
}

.woocommerce .single-product-details label {
color: #1b4268;
font-weight: 400;
white-space: nowrap;
margin-bottom: 0;
font-size: 1.0833em;
}

.woocommerce .single-product-details .variations {
background: #edf6ff;
padding: 20px 5px 0;
}

.woocommerce .single-product-details .variations .customSelect {
background: #fff;
border: none;
}

.woocommerce .single-product-details .variations > div {
display: table;
table-layout: fixed;
margin-bottom: 20px;
}

.woocommerce .single-product-details .variations > div .st-td:first-child, .woocommerce .single-product-details .variations > div #header .branding:first-child, #header .woocommerce .single-product-details .variations > div .branding:first-child, .woocommerce .single-product-details .variations > div #header #nav:first-child, #header .woocommerce .single-product-details .variations > div #nav:first-child, .woocommerce .single-product-details .variations > div .icon-box[class*=" style-side-"].style-side-5 .icon-container:first-child, .icon-box[class*=" style-side-"].style-side-5 .woocommerce .single-product-details .variations > div .icon-container:first-child, .woocommerce .single-product-details .variations > div .icon-box[class*=" style-side-"].style-side-5 .box-content:first-child, .icon-box[class*=" style-side-"].style-side-5 .woocommerce .single-product-details .variations > div .box-content:first-child, .woocommerce .single-product-details .variations > div .icon-box[class*=" style-side-"].style-side-6 .icon-container:first-child, .icon-box[class*=" style-side-"].style-side-6 .woocommerce .single-product-details .variations > div .icon-container:first-child, .woocommerce .single-product-details .variations > div .icon-box[class*=" style-side-"].style-side-6 .box-content:first-child, .icon-box[class*=" style-side-"].style-side-6 .woocommerce .single-product-details .variations > div .box-content:first-child, .woocommerce .single-product-details .variations > div .icon-box[class*=" style-boxed-"].style-boxed-2 .icon-container:first-child, .icon-box[class*=" style-boxed-"].style-boxed-2 .woocommerce .single-product-details .variations > div .icon-container:first-child, .woocommerce .single-product-details .variations > div .icon-box[class*=" style-boxed-"].style-boxed-2 .box-content:first-child, .icon-box[class*=" style-boxed-"].style-boxed-2 .woocommerce .single-product-details .variations > div .box-content:first-child, .woocommerce .single-product-details .variations > div .progress-bar .progress-label:first-child, .progress-bar .woocommerce .single-product-details .variations > div .progress-label:first-child, .woocommerce .single-product-details .variations > div .progress-bar .progress-wrap:first-child, .progress-bar .woocommerce .single-product-details .variations > div .progress-wrap:first-child, .woocommerce .single-product-details .variations > div .progress-bar .progress-percent:first-child, .progress-bar .woocommerce .single-product-details .variations > div .progress-percent:first-child, .woocommerce .single-product-details .variations > div .tab-container.full-width .tabs li:first-child, .tab-container.full-width .tabs .woocommerce .single-product-details .variations > div li:first-child, .woocommerce .single-product-details .variations > div .brand-slider .owl-item a:first-child, .brand-slider .owl-item .woocommerce .single-product-details .variations > div a:first-child, .woocommerce .single-product-details .variations > div .portfolio-hover-holder .portfolio-text-inner:first-child, .portfolio-hover-holder .woocommerce .single-product-details .variations > div .portfolio-text-inner:first-child, .woocommerce .single-product-details .variations > div .audio-container .mejs-container .mejs-controls > div:first-child, .audio-container .mejs-container .woocommerce .single-product-details .variations > div .mejs-controls > div:first-child, .woocommerce .single-product-details .variations > div .related-posts .related-post .post-image:first-child, .related-posts .related-post .woocommerce .single-product-details .variations > div .post-image:first-child, .woocommerce .single-product-details .variations > div .related-posts .related-post .details:first-child, .related-posts .related-post .woocommerce .single-product-details .variations > div .details:first-child, .woocommerce .single-product-details .variations > div .product-images .thumbnails .item a:first-child, .woocommerce .single-product-details .product-images .thumbnails .item .variations > div a:first-child, .woocommerce .single-product-details .variations > div .single-variation-wrap .qty-wrap:first-child, .woocommerce .single-product-details .single-variation-wrap .variations > div .qty-wrap:first-child, .woocommerce .single-product-details .variations > div .single-variation-wrap .variation-action:first-child, .woocommerce .single-product-details .single-variation-wrap .variations > div .variation-action:first-child, .woocommerce .single-product-details .variations > div .social-wrap label:first-child, .woocommerce .single-product-details .social-wrap .variations > div label:first-child, .woocommerce .single-product-details .variations > div .social-wrap .social-icons:first-child, .woocommerce .single-product-details .social-wrap .variations > div .social-icons:first-child {
width: 84px;
}

.woocommerce .single-product-details .variations .selector {
width: 100%;
}

.woocommerce .single-product-details .variations .customSelectInner {
width: 100% !important;
}

.woocommerce .single-product-details .single-variation-wrap {
margin-bottom: 20px;
}

.woocommerce .single-product-details .single-variation-wrap .qty-wrap > *, .woocommerce .single-product-details .single-variation-wrap .variation-action > * {
margin-bottom: 10px;
}

.woocommerce .single-product-details .single-variation-wrap .variation-action {
text-align: right;
}

.woocommerce .single-product-details .single-variation-wrap .variation-action .btn {
padding: 0 20px;
}

.woocommerce .single-product-details .single-variation-wrap label {
display: inline-block;
margin-right: 10px;
}

.woocommerce .single-product-details .social-wrap {
padding: 20px 0;
border-top: 1px solid #edf6ff;
border-bottom: 1px solid #edf6ff;
margin-bottom: 30px;
}

.woocommerce .single-product-details .social-wrap .social-icons {
text-align: right;
margin-bottom: 0;
}

.woocommerce .single-product-details .social-wrap .social-icons .social-icon {
margin-bottom: 0;
float: none;
display: inline-block;
}

.woocommerce .qty-wrap .input-text {
height: 28px;
line-height: 26px;
border: 1px solid #d4dde5;
background: none;
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
width: 70px;
text-align: center;
font-size: 0.8333em;
}

.woocommerce .qty-wrap .input-text:focus {
border-color: {{ $color }};
}

.woocommerce .shop_attributes {
font-size: 1.0833em;
}

.woocommerce .shop_attributes dt, .woocommerce .shop_attributes dd {
line-height: 1.8461em;
}

.woocommerce .shop_attributes dt {
float: left;
color: #1b4268;
margin-right: 5px;
clear: both;
}

.woocommerce .shop_attributes dt.note {
margin-top: 20px;
}

.woocommerce .shop_attributes dt.note + dd {
margin-top: 20px;
}

.woocommerce #comments .btn-write-review {
float: right;
}

.woocommerce #review_form {
display: none;
}

.woocommerce #review_form .btn-back-reviews {
float: right;
width: auto;
}

.woocommerce .commentlist .comment {
border: none;
margin-bottom: 0;
padding: 30px 0 0;
}

.woocommerce .commentlist .comment .comment-author-name:after {
display: none;
}

.woocommerce .commentlist .comment:last-child .comment-content {
border-bottom: none;
padding-bottom: 0;
}

.woocommerce .commentlist .comment-content {
padding-left: 0;
margin-left: 95px;
border-bottom: 1px solid #edf6ff;
padding-bottom: 30px;
}

.woocommerce .commentlist .comment-date {
float: right;
}

.woocommerce .commentlist .description {
margin: 15px 0 0;
}

.woocommerce-tabs.tab-container {
display: table;
width: 100%;
}

.woocommerce-tabs.tab-container ul.tabs, .woocommerce-tabs.tab-container .panel.active {
display: table-cell;
float: none;
padding-top: 0 !important;
}

.woocommerce-tabs.tab-container ul.tabs {
vertical-align: top;
}

.woocommerce-tabs.tab-container .panel {
width: 100%;
}

.woocommerce-tabs.tab-container h3 {
font-size: 1.5em;
font-weight: 400;
}

.soap-quick-view-lightbox {
-moz-transition: all 0.25s ease 0s;
-o-transition: all 0.25s ease 0s;
-webkit-transition: all 0.25s ease 0s;
-ms-transition: all 0.25s ease 0s;
transition: all 0.25s ease 0s;
}

.soap-quick-view-lightbox .mfp-content {
max-width: 970px;
background: #fff;
-webkit-border-radius: 4px 4px 4px 4px;
-moz-border-radius: 4px 4px 4px 4px;
-ms-border-radius: 4px 4px 4px 4px;
border-radius: 4px 4px 4px 4px;
padding: 50px 50px 0;
}

.soap-quick-view-lightbox.mfp-removing {
filter: alpha(opacity=0);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
-moz-opacity: 0;
-khtml-opacity: 0;
opacity: 0;
}

.woocommerce button.mfp-close, .woocommerce .shop_table .product-remove a {
position: absolute;
text-indent: -9999px;
right: 20px;
top: 20px;
width: 28px;
height: 28px;
line-height: 28px;
border: 1px solid #d4dde5;
font-size: 1em;
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
color: #d4dde5;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.woocommerce button.mfp-close:before, .woocommerce .shop_table .product-remove a:before {
content: "\f00d";
position: absolute;
left: 0;
width: 100%;
top: 0;
height: 100%;
text-align: center;
font-family: FontAwesome;
color: #d4dde5;
text-indent: 0;
line-height: 26px;
}

.woocommerce button.mfp-close:hover, .woocommerce .shop_table .product-remove a:hover {
border-color: {{ $color }};
background: {{ $color }};
color: #fff;
}

.woocommerce button.mfp-close:hover:before, .woocommerce .shop_table .product-remove a:hover:before {
color: #fff;
}

.woocommerce .shop_table .product-remove a {
position: relative;
}

/* cart */
.woocommerce table.shop_table {
width: 100%;
}

.woocommerce table.shop_table th, .woocommerce table.shop_table td {
padding: 14px 5px;
}

.woocommerce table.shop_table thead tr {
border: 1px solid #edf6ff;
}

.woocommerce table.shop_table thead th {
color: #1b4268;
font-size: 1.1667em;
font-weight: 400;
text-align: left;
}

.woocommerce table.shop_table tbody tr {
border: 1px solid #edf6ff;
}

.woocommerce table.shop_table tbody td {
font-size: 1.0833em;
}

.woocommerce table.shop_table tbody .product-quantity {
font-size: 0.8333em;
}

.woocommerce table.shop_table tbody .product-quantity .qty {
width: 70px;
padding: 0;
height: 28px;
border: 1px solid #d4dde5;
background: none;
-webkit-border-radius: 14px 14px 14px 14px;
-moz-border-radius: 14px 14px 14px 14px;
-ms-border-radius: 14px 14px 14px 14px;
border-radius: 14px 14px 14px 14px;
text-align: center;
}

.woocommerce table.shop_table tbody .product-quantity .qty:focus {
border-color: {{ $color }};
}

.woocommerce table.shop_table tbody .actions {
text-align: right;
font-size: 1em;
}

.woocommerce table.shop_table tbody .actions .coupon {
float: left;
}

.woocommerce table.shop_table .product-name {
color: #1b4268;
}

.woocommerce table.shop_table .product-remove {
font-size: 1em;
text-align: center;
border-right: 1px solid #edf6ff;
}

.woocommerce table.shop_table .product-remove a {
display: inline-block;
width: 28px;
height: 28px;
border: 1px solid #d4dde5;
text-align: center;
line-height: 26px;
color: #d4dde5;
-webkit-border-radius: 50% 50% 50% 50%;
-moz-border-radius: 50% 50% 50% 50%;
-ms-border-radius: 50% 50% 50% 50%;
border-radius: 50% 50% 50% 50%;
}

.woocommerce table.shop_table .product-remove a:hover {
color: #fff;
border-color: {{ $color }};
background: {{ $color }};
}

.woocommerce table.shop_table .coupon .input-text, .woocommerce table.shop_table .btn {
margin-bottom: 10px;
}

.woocommerce table.shop_table .product-thumbnail img {
max-width: 80px;
}

.woocommerce-cart .woocommerce table.shop_table .product-remove a {
top: 0;
left: 0;
}

.woocommerce-cart .woocommerce table.shop_table tbody tr:last-child {
border: none;
}

.woocommerce-cart .woocommerce table.shop_table tbody tr:last-child td {
padding: 20px 0;
}

.woocommerce .coupon .input-text {
margin-right: 15px;
}

.woocommerce .cart_totals table {
font-size: 1.1667em;
}

.woocommerce .cart_totals table tr {
border-bottom: 1px solid #edf6ff;
}

.woocommerce .cart_totals table tr:last-child {
border-bottom: none;
}

.woocommerce .cart_totals table th {
font-weight: 400;
}

.woocommerce .cart_totals table th, .woocommerce .cart_totals table td {
padding: 12px 50px 12px 0;
}

.woocommerce .cart_totals table .order-total {
font-size: 1.1428em;
}

.woocommerce .cart_totals table .order-total th {
color: #1b4268;
}

.woocommerce .cart_totals table .order-total td {
color: {{ $color }};
}

/* checkout */
.woocommerce-checkout table.shop_table {
border: 1px solid #edf6ff;
}

.woocommerce-checkout table.shop_table th, .woocommerce-checkout table.shop_table td {
padding: 14px 10px 14px 40px;
font-weight: 400;
font-size: 1.0833em;
}

.woocommerce-checkout table.shop_table tbody tr > *:first-child, .woocommerce-checkout table.shop_table tfoot tr > *:first-child {
border-right: 1px solid #edf6ff;
}

.woocommerce-checkout table.shop_table tbody .product-name, .woocommerce-checkout table.shop_table tfoot .product-name {
color: inherit;
}

.woocommerce-checkout table.shop_table tbody tr {
border: none;
}

.woocommerce-checkout table.shop_table tbody .product-quantity {
margin-left: 3px;
}

.woocommerce-checkout table.shop_table tfoot th {
color: #1b4268;
}

.woocommerce-checkout table.shop_table tfoot .order-total {
color: {{ $color }};
}

.woocommerce-checkout .payment_methods li {
border: 1px solid #edf6ff;
padding: 15px 20px;
}

.woocommerce-checkout .payment_methods li + li {
border-top: none;
}

.woocommerce-checkout .payment_methods li label {
color: #1b4268;
}

.woocommerce-checkout .payment_methods li label img {
margin-left: 5px;
}

.woocommerce-checkout .payment_methods li label:before {
color: #939faa;
}

.woocommerce-checkout .payment_methods li > *:not(label) {
padding-left: 20px;
}

.woocommerce-checkout .payment_methods li .payment_box {
display: none;
}

.woocommerce-checkout .payment_methods li .radio.checked + .payment_box {
display: block;
}

/* dashboard */
.dashboard ul.tabs li {
float: none;
padding-left: 40px;
margin-bottom: 1px;
background: #edf6ff;
height: 42px;
}

.dashboard ul.tabs li a {
display: block;
height: 42px;
line-height: 42px;
white-space: nowrap;
}

.dashboard ul.tabs li:before {
left: 18px;
background: #fff;
border-color: #edf6ff;
}

.dashboard ul.tabs li.active:before {
background: {{ $color }};
border-color: {{ $color }};
}

.dashboard .tab-content {
padding: 0;
}

.dashboard .view-account-information .information {
border: 2px solid #edf6ff;
padding: 25px 30px;
height: 100%;
}

.dashboard .view-account-information .btn {
float: right;
}

.dashboard table.shop_table th, .dashboard table.shop_table td {
padding-left: 20px;
}

.dashboard table.shop_table tbody td {
border-right: 1px solid #edf6ff;
}

.dashboard table.my_product_reviews tbody td {
padding: 20px;
}

.dashboard table.my_product_reviews tbody .review-date, .dashboard table.my_product_reviews tbody .product-name, .dashboard table.my_product_reviews tbody .product-review {
/*white-space: nowrap;*/
}

.dashboard table.my_product_reviews tbody .product-review .star-rating {
font-size: 14px;
}

.dashboard .my_tags {
border: 2px solid #edf6ff;
padding: 30px 30px 50px;
}

.dashboard .my_tags .tag {
padding-left: 20px;
padding-right: 20px;
margin-right: 10px;
}

.dashboard table.my-wishlist tbody td {
font-size: 1em;
vertical-align: top;
border: none;
padding: 40px 20px 20px;
}

.dashboard table.my-wishlist tbody td.product-img {
padding-top: 20px;
max-width: 100px;
}

.dashboard table.my-wishlist tbody td.product-img img {
max-width: 60px;
}

.dashboard table.my-wishlist .product-price span {
line-height: 28px;
}

.dashboard table.my-wishlist .product-remove a {
position: relative;
right: 0;
top: 0;
}

/* wocommerce homepages */
.product-wrapper .post-filters {
text-align: right;
margin-bottom: 30px;
}

.product-wrapper .post-filters > a {
margin-bottom: 10px;
}

.product-wrapper .post-filters.text-center {
text-align: center;
}

.product-wrapper .post-filters .filter-title {
float: left;
}

.brand-section .iso-item {
position: relative;
}

.brand-section .iso-item .caption-wrapper {
-webkit-transform: none;
-moz-transform: none;
-ms-transform: none;
-o-transform: none;
transform: none;
}

.brand-section .item {
position: relative;
}

.brand-section .post-slider .owl-buttons .owl-prev, .brand-section .post-slider .owl-buttons .owl-next {
top: auto;
bottom: 75px;
z-index: 1;
}

.brand-section .post-slider .owl-buttons .owl-prev:before, .brand-section .post-slider .owl-buttons .owl-next:before {
background: #fff;
color: #939faa;
}

.brand-section .post-slider .owl-buttons .owl-prev:hover:before, .brand-section .post-slider .owl-buttons .owl-next:hover:before {
background: {{ $color }};
color: #fff;
}

.brand-section .post-slider .owl-buttons .owl-prev {
left: auto;
right: 95px;
}

.brand-section .caption-wrapper {
position: absolute;
bottom: 40px;
left: 0;
width: 100%;
padding: 0 30px;
background: none;
}

.brand-section .caption-wrapper .caption {
font-size: 4.1667em;
font-weight: 300;
margin-bottom: 0;
color: #fff;
text-transform: uppercase;
text-align: center;
line-height: 0.8em;
}

.brand-section .caption-wrapper.style1 {
background: {{ $opaqueRgba }};
left: 10px;
right: 10px;
bottom: 10px;
padding: 8px 10px;
width: auto;
}

.brand-section .caption-wrapper.style1 .caption {
font-size: 2.5em;
line-height: 1;
}

.brand-section .caption-wrapper.style2 {
left: 10px;
right: 32px;
bottom: 10px;
padding: 10px 20px;
background: rgba(255, 255, 255, 0.75);
width: auto;
}

.brand-section .caption-wrapper.style2:before {
content: "";
display: block;
position: absolute;
top: 0;
right: -22px;
bottom: 22px;
width: 22px;
background: rgba(255, 255, 255, 0.75);
}

.brand-section .caption-wrapper.style2:after {
content: "";
display: block;
position: absolute;
bottom: 0;
right: -22px;
border-top: 22px solid #fff;
border-right: 22px solid transparent;
}

.brand-section .caption-wrapper.style2 .caption {
font-size: 5em;
color: #000;
text-transform: none;
font-style: italic;
line-height: 1;
text-align: left;
letter-spacing: -0.06em;
}

.brand-section .caption-wrapper.style3 {
padding: 0;
position: absolute;
}

.brand-section .caption-wrapper.style3:before {
display: none;
}

.brand-section .caption-wrapper.style3 .st-table, .brand-section .caption-wrapper.style3 .woocommerce .single-product-details .single-variation-wrap, .woocommerce .single-product-details .brand-section .caption-wrapper.style3 .single-variation-wrap, .brand-section .caption-wrapper.style3 .woocommerce .single-product-details .social-wrap, .woocommerce .single-product-details .brand-section .caption-wrapper.style3 .social-wrap {
height: 100%;
}

.brand-section .caption-wrapper.style3 .captions {
background: rgba(255, 255, 255, 0.3);
padding: 18px 10px;
width: 100%;
}

.brand-section .caption-wrapper.style3 .caption {
font-size: 1.6666em;
font-weight: 400;
color: #fff;
margin-bottom: 0;
text-align: center;
text-transform: uppercase;
letter-spacing: 0.2em;
}

.brand-section.style1 {
border: 10px solid rgba(143, 143, 143, 0.1);
}

.brand-section.style1 .image-container {
border: 1px solid #1b4268;
position: relative;
}

.brand-section.style1 .caption-wrapper .caption {
margin-bottom: 0;
color: #1b4268;
text-align: left;
letter-spacing: 0;
}

.brand-section.style1 .caption-wrapper .caption-lg {
font-weight: 900;
font-size: 3.3333em;
line-height: 0.8;
}

.brand-section.style1 .caption-wrapper .caption-sm {
font-weight: 400;
font-size: 1.3333em;
line-height: 1;
}

.brand-section.style1 .caption-wrapper .btn {
margin-top: 20px;
font-family: "Open Sans", Arial, Helvetica, sans-serif;
}

.brand-section.style2 {
display: table;
width: 100%;
}

.brand-section.style2 > div {
padding: 0;
display: table-cell;
vertical-align: middle;
float: none;
position: static;
}

.brand-section.style2 .caption-wrapper {
text-align: center;
background: #1b4268;
padding: 0 30px;
}

.brand-section.style2 .caption-wrapper:before {
display: none;
}

.brand-section.style2 .caption-wrapper .caption {
text-transform: uppercase;
line-height: 1;
margin-bottom: 20px;
}

.brand-section.style2 .caption-wrapper .caption-lg {
font-weight: 700;
font-size: 2.5em;
line-height: 0.8;
letter-spacing: -0.06em;
}

.brand-section.style2 .caption-wrapper .caption-sm {
font-weight: 400;
font-size: 1em;
}

.logo-container {
padding: 50px 0;
text-align: center;
background: #fff;
}

.logo-container img {
max-width: 80%;
}

.newsletter-box {
text-align: center;
}

.newsletter-box h1, .newsletter-box h2 {
font-weight: 400;
}

.newsletter-box .input-text {
border: 1px solid rgba(0, 0, 0, 0.1);
background: #fff;
}

.newsletter-box p {
font-size: 1.1667em;
margin-left: 10px;
margin-right: 10px;
}

/**
* EasyZoom core styles
*/
.easyzoom {
position: relative;
display: block;
/* 'Shrink-wrap' the element */
/*display: inline-block;
*display: inline;
*zoom: 1;*/
}

.easyzoom img {
vertical-align: bottom;
}

.easyzoom.is-loading img {
cursor: progress;
}

.easyzoom.is-ready img {
cursor: crosshair;
}

.easyzoom.is-error img {
cursor: not-allowed;
}

.easyzoom-notice {
position: absolute;
top: 50%;
left: 50%;
z-index: 150;
width: 10em;
margin: -1em 0 0 -5em;
line-height: 2em;
text-align: center;
background: #FFF;
box-shadow: 0 0 10px #888;
}

.easyzoom-flyout {
position: absolute;
z-index: 100;
overflow: hidden;
background: #FFF;
}

/**
* EasyZoom layout variations
*/
.easyzoom--overlay .easyzoom-flyout {
top: 0;
left: 0;
width: 100%;
height: 100%;
}

.easyzoom--adjacent .easyzoom-flyout {
top: 0;
left: 100%;
width: 100%;
height: 100%;
margin-left: 20px;
}

.slider-with-title {
margin-top: 30px;
}

.widget-blog-img {
width: 370px;
height: 185px;
object-fit: cover;
}

.widget-recent-post-img {
width: 50px !important;
height: 40px !important;
object-fit: cover;
}

.page-category-item-img {
width: 270px !important;
height: 180px !important;
object-fit: cover;
}

.text-align-left {
text-align: left !important;
}

.checkbox {
margin-bottom: 0;
}

.checkbox p {
margin-top: -20px !important;
}

.has-error {
border: 1px solid red !important;
}

#hotel-features article img.custom_amenity {
margin-top: 5px;
margin-right: 5px;
opacity: 0.7;
}

#hotel-features article img.custom_amenity:hover {
opacity: 1;
}

.testimonials .testimonial {
height: 100%;
}

/*
* Title:   Miracle | Responsive Multi-Purpose HTML5 Template - Responsive Style file
* Author:  http://themeforest.net/user/soaptheme
*/
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[Table of contents]

1. New Grid System
2. Add clearfix in the grid system
3. Styles for devices(>=1200px)
4. Styles for devices(>=992px and <=1199px)
5. Styles for devices(<=1199px)
6. Styles for devices(<=991px )
7. Styles for devices(>=768px and <= 991px)
8. Styles for devices(<=767px )
9. Styles for devices(>=481px and <= 767px)
10. Styles for devices(<=480px )
11. Styles for devices(<=320px )


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*
* Title:   Miracle | Responsive Multi-Purpose HTML5 Template - SCSS Mixin
* Author:  http://themeforest.net/user/soaptheme
*/
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
[Table of contents]

1) BORDER RADIUS
2) OPACITY
3) BACKGROUND GRADIENT
4) BOX SHADOW
5) TEXT SHADOW
6) TRANSITION
7) ANIMATION
8) TRANSFORM
9) DESATURATE
10) RETINA
11) GRADIENT IMAGE

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/* 1) BORDER RADIUS */
/* 2) OPACITY */
/* 3) BACKGROUND GRADIENT */
/* 4) BOX SHADOW */
/* 5) TEXT SHADOW */
/* 6) TRANSITION */
/* 7) ANIMATION */
/* 8) TRANSFORM */
/* 9) DESATURATE */
/* 10) RETINA */
/* 11) GRADIENT IMAGE */
/* 1. New Grid System */
.col-sms-1, .col-sms-2, .col-sms-3, .col-sms-4, .col-sms-5, .col-sms-6, .col-sms-7, .col-sms-8, .col-sms-9, .col-sms-10, .col-sms-11, .col-sms-12 {
position: relative;
min-height: 1px;
padding-left: 15px;
padding-right: 15px;
}

@media (min-width: 481px) and (max-width: 767px) {
.col-sms-1, .col-sms-2, .col-sms-3, .col-sms-4, .col-sms-5, .col-sms-6, .col-sms-7, .col-sms-8, .col-sms-9, .col-sms-10, .col-sms-11, .col-sms-12 {
float: left;
}

.col-sms-12 {
width: 100%;
}

.col-sms-11 {
width: 91.66666667%;
}

.col-sms-10 {
width: 83.33333333%;
}

.col-sms-9 {
width: 75%;
}

.col-sms-8 {
width: 66.66666667%;
}

.col-sms-7 {
width: 58.33333333%;
}

.col-sms-6 {
width: 50%;
}

.col-sms-5 {
width: 41.66666667%;
}

.col-sms-4 {
width: 33.33333333%;
}

.col-sms-3 {
width: 25%;
}

.col-sms-2 {
width: 16.66666667%;
}

.col-sms-1 {
width: 8.33333333%;
}

.col-sms-pull-12 {
right: 100%;
}

.col-sms-pull-11 {
right: 91.66666667%;
}

.col-sms-pull-10 {
right: 83.33333333%;
}

.col-sms-pull-9 {
right: 75%;
}

.col-sms-pull-8 {
right: 66.66666667%;
}

.col-sms-pull-7 {
right: 58.33333333%;
}

.col-sms-pull-6 {
right: 50%;
}

.col-sms-pull-5 {
right: 41.66666667%;
}

.col-sms-pull-4 {
right: 33.33333333%;
}

.col-sms-pull-3 {
right: 25%;
}

.col-sms-pull-2 {
right: 16.66666667%;
}

.col-sms-pull-1 {
right: 8.33333333%;
}

.col-sms-pull-0 {
right: 0%;
}

.col-sms-push-12 {
left: 100%;
}

.col-sms-push-11 {
left: 91.66666667%;
}

.col-sms-push-10 {
left: 83.33333333%;
}

.col-sms-push-9 {
left: 75%;
}

.col-sms-push-8 {
left: 66.66666667%;
}

.col-sms-push-7 {
left: 58.33333333%;
}

.col-sms-push-6 {
left: 50%;
}

.col-sms-push-5 {
left: 41.66666667%;
}

.col-sms-push-4 {
left: 33.33333333%;
}

.col-sms-push-3 {
left: 25%;
}

.col-sms-push-2 {
left: 16.66666667%;
}

.col-sms-push-1 {
left: 8.33333333%;
}

.col-sms-push-0 {
left: 0%;
}

.col-sms-offset-12 {
margin-left: 100%;
}

.col-sms-offset-11 {
margin-left: 91.66666667%;
}

.col-sms-offset-10 {
margin-left: 83.33333333%;
}

.col-sms-offset-9 {
margin-left: 75%;
}

.col-sms-offset-8 {
margin-left: 66.66666667%;
}

.col-sms-offset-7 {
margin-left: 58.33333333%;
}

.col-sms-offset-6 {
margin-left: 50%;
}

.col-sms-offset-5 {
margin-left: 41.66666667%;
}

.col-sms-offset-4 {
margin-left: 33.33333333%;
}

.col-sms-offset-3 {
margin-left: 25%;
}

.col-sms-offset-2 {
margin-left: 16.66666667%;
}

.col-sms-offset-1 {
margin-left: 8.33333333%;
}

.col-sms-offset-0 {
margin-left: 0%;
}
}

/* 2. Add clearfix in the grid system */
.row.add-clearfix > .col-xs-2:nth-child(6n+1) {
clear: both;
}

.row.add-clearfix > .col-xs-3:nth-child(4n+1) {
clear: both;
}

.row.add-clearfix > .col-xs-4:nth-child(3n+1) {
clear: both;
}

.row.add-clearfix > .col-xs-6:nth-child(2n+1) {
clear: both;
}

@media (min-width: 481px) {
/* add clearfix in the grid system */
.row.add-clearfix > .col-sms-2:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-sms-2:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-sms-2:nth-child(4n+1) {
clear: none;
}

.row.add-clearfix > .col-sms-2:nth-child(6n+1) {
clear: both;
}

.row.add-clearfix > .col-sms-3:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-sms-3:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-sms-3:nth-child(4n+1) {
clear: both;
}

.row.add-clearfix > .col-sms-4:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-sms-4:nth-child(3n+1) {
clear: both;
}

.row.add-clearfix > .col-sms-6:nth-child(2n+1) {
clear: both;
}
}

@media (min-width: 768px) {
/* add clearfix in the grid system */
.row.add-clearfix > .col-sm-2:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-sm-2:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-sm-2:nth-child(4n+1) {
clear: none;
}

.row.add-clearfix > .col-sm-2:nth-child(6n+1) {
clear: both;
}

.row.add-clearfix > .col-sm-3:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-sm-3:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-sm-3:nth-child(4n+1) {
clear: both;
}

.row.add-clearfix > .col-sm-4:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-sm-4:nth-child(3n+1) {
clear: both;
}

.row.add-clearfix > .col-sm-6:nth-child(2n+1) {
clear: both;
}
}

@media (min-width: 992px) {
.mobile-menu {
display: none !important;
}

.visible-mobile {
display: none !important;
}

/* add clearfix in the grid system */
.row.add-clearfix > .col-md-2:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-md-2:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-md-2:nth-child(4n+1) {
clear: none;
}

.row.add-clearfix > .col-md-2:nth-child(6n+1) {
clear: both;
}

.row.add-clearfix > .col-md-3:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-md-3:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-md-3:nth-child(4n+1) {
clear: both;
}

.row.add-clearfix > .col-md-4:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-md-4:nth-child(3n+1) {
clear: both;
}

.row.add-clearfix > .col-md-6:nth-child(2n+1) {
clear: both;
}
}

@media (min-width: 1200px) {
/* add clearfix in the grid system */
.row.add-clearfix > .col-lg-2:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-lg-2:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-lg-2:nth-child(4n+1) {
clear: none;
}

.row.add-clearfix > .col-lg-2:nth-child(6n+1) {
clear: both;
}

.row.add-clearfix > .col-lg-3:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-lg-3:nth-child(3n+1) {
clear: none;
}

.row.add-clearfix > .col-lg-3:nth-child(4n+1) {
clear: both;
}

.row.add-clearfix > .col-lg-4:nth-child(2n+1) {
clear: none;
}

.row.add-clearfix > .col-lg-4:nth-child(3n+1) {
clear: both;
}

.row.add-clearfix > .col-lg-6:nth-child(2n+1) {
clear: both;
}
}

/* 3. Styles for devices(>=1200px) */
@media (min-width: 1200px) {
.container {
padding-left: 0;
padding-right: 0;
}
}

/* 4. Styles for devices(>=992px and <=1199px) */
@media (min-width: 992px) and (max-width: 1199px) {
.container {
padding-left: 0;
padding-right: 0;
}
}

/* 5. Styles for devices(<=1199px) */
@media (max-width: 1199px) {
[class^="col-lg-"].pull-left, [class^="col-lg-"].pull-right {
float: none !important;
}

.testimonials.style1.multiple-items .owl-controls .owl-prev {
left: 15px;
}

.testimonials.style1.multiple-items .owl-controls .owl-next {
right: 15px;
}

.iso-container {
/*&.style-masonry {
&.iso-col-6 .iso-item {
width: 19.98%;
&.double-width { width: 39.96%; }
}
&.iso-col-5 .iso-item {
width: 24.98%;
&.double-width { width: 49.96%; }
}
}*/
}

.iso-container.iso-col-6 .iso-item {
width: 20%;
}

.iso-container.iso-col-6 .iso-item.double-width {
width: 40%;
}

.iso-container.iso-col-5 .iso-item {
width: 25%;
}

.iso-container.iso-col-5 .iso-item.double-width {
width: 50%;
}
}

/* 6. Styles for devices(<=991px ) */
@media (max-width: 991px) {
.hidden-mobile {
display: none !important;
}

[class^="col-md-"].pull-left, [class^="col-md-"].pull-right, [class*=" col-md-"].pull-left, [class*=" col-md-"].pull-right {
float: none !important;
}

.container {
width: auto;
padding-left: 20px;
padding-right: 20px;
}

.callout-box {
text-align: center;
}

.callout-box .callout-content, .callout-box .callout-text, .callout-box .callout-action {
display: block;
padding: 0;
}

.callout-box.style1 .callout-box-wrapper {
padding: 20px 0 0;
}

.callout-box.style1 .callout-text:after {
display: block;
content: "";
height: 1px;
background: rgba(255, 255, 255, 0.1);
margin: 0 auto 20px;
width: 300px;
}

.callout-box.style1 .callout-text h2 {
border-right: none;
padding-right: 0;
margin-bottom: 20px;
font-size: 2.5em;
}

.callout-box.style1 .callout-stripe-container {
padding: 0;
}

.callout-box.style1 .callout-stripe {
position: static;
padding: 15px 20px;
}

.callout-box.style1 .callout-stripe img {
display: block;
margin: 0 auto 5px;
}

.callout-box.style1 .callout-stripe:after {
display: none;
}

.callout-box.style2, .callout-box.style3 {
text-align: center;
}

.callout-box.style2 .callout-action, .callout-box.style3 .callout-action {
text-align: center;
margin-top: 30px;
}

#header {
background: #0f2541;
height: 75px;
}

#header .logo {
margin: 0 !important;
}

#header .logo a {
color: #fff !important;
}

#header .branding {
text-align: left !important;
}

#header .header-top-nav > li {
margin: 0;
}

#header .header-top-nav > li > a {
line-height: 75px;
padding: 0 5px;
}

#header .header-top-nav > li > a .fa {
color: #455b79;
border-color: #455b79;
-moz-transition: all 0.3s ease 0s;
-o-transition: all 0.3s ease 0s;
-webkit-transition: all 0.3s ease 0s;
-ms-transition: all 0.3s ease 0s;
transition: all 0.3s ease 0s;
}

#header .header-top-nav > li:hover .fa {
color: #fff;
border-color: #fff;
}

#header .header-top-nav > li:last-child > a {
padding-right: 0;
}

#header .header-top-nav .mini-cart {
/*.cart-content { background: rgba(11, 28, 50, 0.9) !important; }*/
}

#header .header-top-nav .mini-cart:hover > a {
background: #0b1c32 !important;
}

#header .header-top-nav .mini-search .main-nav-search-form {
width: 245px;
}

#header .header-top-nav .mini-search .main-nav-search-form input[type=text] {
border-color: #455b79;
background: #0f2541;
color: #455b79;
}

#header .header-top-nav .mini-search .main-nav-search-form form button .fa {
color: #455b79;
}

#header .header-top-nav .mini-search .main-nav-search-form form button:hover .fa {
color: #fff;
}

.page-title-container .banner {
margin-top: 75px;
}

.coming-soon-page .clock {
font-size: 120px;
}

.iso-container {
/*&.style-masonry {
&.iso-col-6 .iso-item {
width: 24.98%;
&.double-width { width: 49.96%; }
}
&.iso-col-5 .iso-item, &.iso-col-4 .iso-item {
width: 33.31%;
&.double-width { width: 66.62%; }
}
}*/
}

.iso-container.iso-col-6 .iso-item {
width: 25%;
}

.iso-container.iso-col-6 .iso-item.double-width {
width: 50%;
}

.iso-container.iso-col-5 .iso-item, .iso-container.iso-col-4 .iso-item {
width: 33.3333%;
}

.iso-container.iso-col-5 .iso-item.double-width, .iso-container.iso-col-4 .iso-item.double-width {
width: 66.6666%;
}

.responsive-section .callout-image-container .callout-image img {
margin-top: 30px;
}

.soap-gallery.frame-holder {
width: 720px;
margin: 0 auto;
padding: 45px 0 50px;
}

.soap-gallery.frame-holder .owl-carousel {
width: 464px;
}

.soap-gallery.frame-holder.effect-shine .owl-carousel:before {
right: -25px;
top: -25px;
max-height: 100%;
width: 250px;
}

.forcefullwidth_wrapper_tp_banner {
padding-top: 74px !important;
}

.image-wrap-with-shadow:before {
display: none;
}

.add-circle-box-line > .col-sm-6:nth-child(2n) {
border-right: none;
}

.woocommerce .single-product-details .single-variation-wrap {
display: block;
margin-bottom: 0;
}

.woocommerce .single-product-details .single-variation-wrap .qty-wrap, .woocommerce .single-product-details .single-variation-wrap .variation-action {
display: block;
text-align: left;
margin-bottom: 30px;
}

.woocommerce .single-product-details .social-wrap {
display: block;
}

.woocommerce .single-product-details .social-wrap label, .woocommerce .single-product-details .social-wrap .social-icons {
display: block;
text-align: left;
}

.woocommerce .single-product-details .social-wrap label {
margin-bottom: 5px;
}
}

/* 7. Styles for devices(>=768px and <= 991px) */
/* 8. Styles for devices(<=767px ) */
@media (max-width: 767px) {
#footer .back-to-top {
left: 50%;
margin-left: -25px;
}

.same-height > * {
height: auto !important;
}

[class^="col-sm-"].pull-left, [class^="col-sm-"].pull-right, [class*=" col-sm-"].pull-left, [class*=" col-sm-"].pull-right {
float: none !important;
}

.callout-box.style1 .callout-box-wrapper {
padding-top: 80px;
}

.callout-box.style1 .callout-text:after {
margin: 0 auto 30px;
width: 220px;
}

.callout-box.style1 .callout-text h2 {
margin-bottom: 30px;
font-size: 2em;
}

.callout-box.style1 .callout-text h3 {
margin-bottom: 25px;
font-size: 1.6666em;
}

.callout-box.style1 .callout-action {
margin-bottom: 20px;
}

.callout-box.style3 .callout-text * {
font-size: 1.8em;
}

#footer .footer-wrapper .container > .row > div {
padding-top: 40px;
padding-bottom: 40px;
}

#footer .footer-wrapper .container > .row > div + div {
padding-top: 0;
}

#footer .footer-wrapper .container > .row > div:last-child {
padding-top: 40px;
}

.soap-gallery-thumb-wrapper, .post-slider ~ .soap-gallery-thumb-wrapper {
padding: 12px 0 2px 10px;
}

.soap-gallery-thumb-wrapper > a, .post-slider ~ .soap-gallery-thumb-wrapper > a {
width: 60px;
height: 60px;
margin-right: 10px;
margin-bottom: 10px;
}

.animated {
visibility: visible;
}

.process-builder .process-item {
float: none;
width: auto !important;
}

.process-builder.style-simple .process-icon:before, .process-builder.style-simple .process-icon:after {
display: none;
}

.post-slider.style2 .slide-text, .post-slider.style5 .slide-text {
display: none;
}

.post-slider.style2 .owl-prev, .post-slider.style2 .owl-next, .post-slider.style2:hover .owl-prev, .post-slider.style2:hover .owl-next {
margin-top: -13px;
top: 50%;
filter: alpha(opacity=100);
-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
-moz-opacity: 1;
-khtml-opacity: 1;
opacity: 1;
bottom: auto;
}

.progress-bar-container.skill-meter {
display: block;
}

.progress-bar.skill-meter {
display: block;
height: auto;
margin-bottom: 20px;
padding: 0;
}

.progress-bar.skill-meter .progress-label, .progress-bar.skill-meter .progress-wrap {
display: block;
height: 39px;
line-height: 39px;
}

.progress-bar.skill-meter .progress {
padding-left: 1px;
}

.testimonials.style2 .container {
padding-left: 0;
padding-right: 0;
}

.testimonials.style2 .sc-content-wrapper .sc-content {
display: block;
}

.testimonials.style2 .sc-content-wrapper .sc-content h2, .testimonials.style2 .sc-content-wrapper .sc-content p {
display: block;
padding: 0;
}

.testimonials.style2 .sc-content-wrapper .sc-content h2 {
margin-bottom: 20px;
}

.testimonials.style2 .sc-content-wrapper .sc-content p {
font-size: 1.8em;
border-left: none;
}

.contact-address.style2 {
display: block;
margin-bottom: 50px;
}

.contact-address.style2 li {
display: block;
width: 100%;
margin-bottom: 30px;
}

.error404 .error-message-404 span {
font-size: 200px;
}

.coming-soon-page .clock {
font-size: 84px;
}

.iso-container {
/*&.style-masonry {
&.iso-col-3 .iso-item, &.iso-col-4 .iso-item, &.iso-col-5 .iso-item {
width: 49.98%;
&.double-width { width: 100%; }
}
&.iso-col-6 .iso-item {
width: 33.31%;
&.double-width { width: 66.62%; }
}
}*/
}

.iso-container.iso-col-3 .iso-item, .iso-container.iso-col-4 .iso-item, .iso-container.iso-col-5 .iso-item {
width: 50%;
}

.iso-container.iso-col-3 .iso-item.double-width, .iso-container.iso-col-4 .iso-item.double-width, .iso-container.iso-col-5 .iso-item.double-width {
width: 100%;
}

.iso-container.iso-col-6 .iso-item {
width: 33.3333%;
}

.iso-container.iso-col-6 .iso-item.double-width {
width: 66.6666%;
}

.blog-posts.layout-timeline.layout-fullwidth {
padding-left: 40px;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container {
background-position: left top;
}

.blog-posts.layout-timeline.layout-fullwidth .iso-container .iso-item:nth-child(2) {
padding-top: 15px;
}

.blog-posts.layout-timeline.layout-fullwidth .load-more {
margin-left: -50px;
}

.blog-posts.layout-timeline .iso-col-2 .iso-item {
width: 100%;
}

.page-title-container .banner .caption .caption-lg {
font-size: 5em;
}

.page-title-container .banner .caption .caption-sm {
font-size: 1em;
}

.page-title-container .style6 .caption .caption-xl {
font-size: 6em;
}

.page-title-container .style6 .caption .caption-lg {
font-size: 5em;
}

.page-title-container .style6 .caption .caption-md {
font-size: 1.3333em;
}

.blog-posts .post-full .post-content {
min-height: 1px !important;
}

.single-post .about-author {
display: block;
}

.single-post .about-author .author-img, .single-post .about-author .about-author-content {
display: block;
}

.single-post .about-author .about-author-content {
padding: 20px 0 0;
}

.single-post .about-author .about-author-content .social-icons {
float: none;
}

.progress-bar-container.style-vertical {
height: 400px;
margin-left: -5px;
margin-right: -5px;
}

.progress-bar-container.style-vertical .progress-bar-wrapper {
border-spacing: 5px 0;
}

.progress-bar-container.style-vertical .progress-bar .progress-label, .progress-bar-container.style-vertical .progress-bar .progress-percent {
font-size: 1em;
}

.tab-container.style1 .tabs, .tab-container.style2 .tabs {
float: none;
display: block;
}

.tab-container.style1 .tabs li, .tab-container.style2 .tabs li {
float: none;
display: block;
width: auto;
}

.tab-container.vertical-tab, .tab-container.vertical-tab-1 {
/*.tab-content { padding-top: 30px; }*/
}

.tab-container.vertical-tab .tabs, .tab-container.vertical-tab-1 .tabs {
float: none;
}

.tab-container.transparent-tab .tabs {
float: none;
display: block;
}

.tab-container.transparent-tab .tabs li {
float: none;
display: block;
width: auto;
}

.st-table.block-sms {
display: block;
}

.st-table.block-sms .st-td {
display: block;
}

.image-banner .caption-wrapper {
position: static;
}

.image-banner .caption-wrapper.position-left, .image-banner .caption-wrapper.position-right {
position: absolute;
}

.image-banner .caption-wrapper.position-left h2, .image-banner .caption-wrapper.position-right h2 {
font-size: 5em;
}

.image-banner .image-container.style-abs {
position: static;
}

.image-banner .image-container.style-abs.position-right, .image-banner .image-container.style-abs.position-left {
max-width: 100%;
}

.soap-gallery.frame-holder {
width: 450px;
margin: 0 auto;
padding: 28px 0 31px;
}

.soap-gallery.frame-holder .owl-carousel {
width: 290px;
}

.soap-gallery.frame-holder.effect-shine .owl-carousel:before {
right: -16px;
top: -16px;
max-height: 100%;
width: 160px;
}

.soap-gallery.frame-holder .owl-buttons .owl-prev {
left: -80px;
}

.soap-gallery.frame-holder .owl-buttons .owl-next {
right: -80px;
}

#footer .copyright-area {
display: block;
}

#footer .copyright-area .secondary-menu, #footer .copyright-area .copyright {
display: block;
}

#footer .copyright-area .secondary-menu {
margin-bottom: 10px;
text-align: center;
}

#footer .copyright-area .secondary-menu .nav {
display: inline-block;
}

#footer .copyright-area .copyright {
text-align: center;
}

.ads-carousel .image-banner .caption-wrapper {
max-width: 60%;
padding-left: 10px;
}

.ads-carousel .captions .title {
font-size: 2em;
}

.add-circle-box-line > .col-sm-6 {
border-right: none;
}

.add-circle-box-line > .col-sms-6:nth-child(2n) {
border-right: none;
}

.woocommerce-tabs.tab-container {
display: block;
width: auto;
}

.woocommerce-tabs.tab-container ul.tabs, .woocommerce-tabs.tab-container .panel.active {
display: block;
}

.product-wrapper .post-filters .filter-title {
float: none;
}

.woocommerce .qty-wrap .input-text {
width: 50px;
}

.dashboard table.my-wishlist tbody td {
padding-left: 5px;
padding-right: 5px;
}

.dashboard table.shop_table th, .dashboard table.shop_table td {
padding-left: 5px;
}

.dashboard table.my_product_reviews tbody td {
padding: 10px;
}
}

/* 9. Styles for devices(>=481px and <= 767px) */
@media (min-width: 481px) and (max-width: 767px) {
.colors-section .logo-icon {
max-width: 70%;
}

.hidden-sms {
display: none !important;
}

.hidden-xs {
display: block !important;
}
}

/* 10. Styles for devices(<=480px ) */
@media (max-width: 480px) {
.hidden-xs {
display: none !important;
}

.coming-soon-page .clock {
font-size: 52px;
}

.iso-container {
/*&.style-masonry {
&.iso-col-2 .iso-item, &.iso-col-3 .iso-item, &.iso-col-4 .iso-item, &.iso-col-5 .iso-item { width: 100%; }
&.iso-col-6 .iso-item {
width: 49.98%;
&.double-width { width: 100%; }
}
}*/
}

.iso-container.iso-col-2 .iso-item, .iso-container.iso-col-3 .iso-item, .iso-container.iso-col-4 .iso-item, .iso-container.iso-col-5 .iso-item {
width: 100%;
}

.iso-container.iso-col-6 .iso-item {
width: 50%;
}

.iso-container.iso-col-6 .iso-item.double-width {
width: 100%;
}

.st-table.block-xs {
display: block;
}

.st-table.block-xs .st-td {
display: block;
}

ul.products.layout-list .product-image, ul.products.layout-list .product-meta-wrap {
float: none;
width: auto;
}

ul.products.layout-list .product-image {
border-right-width: 2px;
}

.image-banner .caption-wrapper.position-left h2, .image-banner .caption-wrapper.position-right h2 {
font-size: 3em;
}

.image-banner .caption-wrapper.position-left .captions, .image-banner .caption-wrapper.position-right .captions {
width: 96%;
}

.image-banner .caption-wrapper.position-left .action, .image-banner .caption-wrapper.position-right .action {
font-size: 0.9167em;
}

.add-circle-box-line > .col-sms-6, .add-circle-box-line .col-sm-6 {
border-right: none;
}

.woocommerce table.shop_table tbody td img {
display: none;
}

.woocommerce table.shop_table tbody .product-quantity .qty {
width: 40px;
}

.woocommerce table.shop_table tbody .actions {
text-align: left;
}

.woocommerce table.shop_table tbody .actions .coupon {
float: none;
}

.woocommerce table.shop_table .coupon .input-text, .woocommerce table.shop_table .btn {
width: 100%;
}

.soap-gallery.frame-holder {
width: 300px;
margin: 0 auto;
padding: 19px 0 21px;
}

.soap-gallery.frame-holder .owl-carousel {
width: 193px;
}

.soap-gallery.frame-holder.effect-shine .owl-carousel:before {
right: -11px;
top: -11px;
max-height: 100%;
width: 107px;
}

.soap-gallery.frame-holder .owl-buttons .owl-prev {
left: -80px;
}

.soap-gallery.frame-holder .owl-buttons .owl-next {
right: -80px;
}

.commentlist .comment .author-img {
float: none;
margin-bottom: 15px;
}

.commentlist .comment .comment-content {
padding-left: 0;
}
}

/* 11. Styles for devices(<=320px ) */
@media (max-width: 320px) {
.page-loading-wrapper .progress-bar {
width: 250px;
}

.iso-container {
/*&.style-masonry {
&.iso-col-6 .iso-item, &.iso-col-5 .iso-item { width: 100%; }
}*/
}

.iso-container.iso-col-6 .iso-item, .iso-container.iso-col-5 .iso-item {
width: 100%;
}
}

{{ $customStyles }}