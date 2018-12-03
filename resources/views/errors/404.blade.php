<!DOCTYPE>
<html>
<head>

<link rel="stylesheet" href="{{asset('/zhoubian/css/main.css')}}" type="text/css" media="screen, projection" /> <!-- main stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="{{asset('/zhoubian/css/tipsy.css')}}" /> <!-- Tipsy implementation -->

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="css/ie8.css" />
<![endif]-->

<script type="text/javascript" src="{{asset('/zhoubian/scripts/jquery-1.7.2.min.js')}}"></script> <!-- uiToTop implementation -->
<script type="text/javascript" src="{{asset('/zhoubian/scripts/custom-scripts.js')}}"></script>
<script type="text/javascript" src="{{asset('/zhoubian/scripts/jquery.tipsy.')}}"></script> <!-- Tipsy -->

<script type="text/javascript">

$(document).ready(function(){
			
	universalPreloader();
						   
});

$(window).load(function(){

	//remove Universal Preloader
	universalPreloaderRemove();
	
	rotate();
    dogRun();
	dogTalk();
	
	//Tipsy implementation
	$('.with-tooltip').tipsy({gravity: $.fn.tipsy.autoNS});
						   
});

</script>


<title>404 - Not found</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body>

<!-- Universal preloader -->
<div id="universal-preloader">
    <div class="preloader">
        <img src="{{asset('/zhoubian/images/universal-preloader.gif')}}" alt="universal-preloader" class="universal-preloader-preloader" />
    </div>
</div>
<!-- Universal preloader -->

<div id="wrapper">
<!-- 404 graphic -->
	<div class="graphic"></div>
<!-- 404 graphic -->
<!-- Not found text -->
	<div class="not-found-text">
    	<h1 class="not-found-text">管理员正在抢修</h1>
    </div>
<!-- Not found text -->

<!-- search form -->

<!-- search form -->

<!-- top menu -->
<div class="top-menu">
	<a href="/" class="with-tooltip" style="font-size:22px">返回首页</a>
</div>
<!-- top menu -->

<div class="dog-wrapper">
<!-- dog running -->
	<div class="dog"></div>
<!-- dog running -->
	
<!-- dog bubble talking -->
	<div class="dog-bubble">
    	
    </div>
    
    <!-- The dog bubble rotates these -->
    <div class="bubble-options">
    	<p class="dog-bubble">
        	页面不见了
        </p>
    	
    </div>
    <!-- The dog bubble rotates these -->
<!-- dog bubble talking -->
</div>

<!-- planet at the bottom -->
	<div class="planet"></div>
<!-- planet at the bottom -->
</div>


</body>
</html>