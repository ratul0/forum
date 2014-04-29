<html>
<head>
	<meta charset="UTF-8">
	<title>{{$title}}</title>
	{{HTML::style('/css/bootstrap.min.css')}}
	{{HTML::style('/css/bootswatch.min.css')}}
  {{HTML::style('/css/main.css')}}
	{{HTML::script('/js/jquery.min.js')}}
	{{HTML::script('/js/bootstrap.min.js')}}
	{{HTML::script('/js/bootswatch.js')}}
  <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" type="text/css" rel="stylesheet"> -->


</head>
<body>
	

		<div class="navbar navbar-inverse navbar-fixed-top">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Rat's forum</a>
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                  <ul class="nav navbar-nav">
                    
                    <li>{{ HTML::linkRoute('home','Home') }}</li>
                    
                    
                    
                  </ul>
                  <form class="navbar-form navbar-left">
                    <input type="text" class="form-control col-lg-8" placeholder="Search">
                  </form>
                  <ul class="nav navbar-nav navbar-right">
                    @if(!Auth::check())
                    <li>{{HTML::linkRoute('users.create','Register')}}</li>
                    
                    <li>{{ HTML::linkRoute('login','Login') }}</li>
                    @else
                        <li>{{ HTML::linkRoute('your_questions',"Your Q's") }}</li>
                       <li>{{ HTML::linkRoute('logout','Logout ('.Auth::user()->email.')') }}</li> 
                    @endif
                  </ul>
                </div><!-- /.nav-collapse -->
              </div><!-- end navbar -->


    <div id="container">
              <div id="content">
              	@if(Session::has('message'))
              		<p id="mesage">{{Session::get('message')}}</p>
              	@endif

              	@yield('content')
              </div> <!-- end content -->


              
              <footer>
                <div class="container">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                      
                      <hr>
                      <p>Product of <a href="http://www.infancyit.com">Infancy WEB</a>.<br>Infancyit &copy; {{date('Y')}}</p>
                    </div>
                  </div>
                </div>
              </footer><!-- end footer -->



	</div> <!-- end container -->
	
</body>
</html>