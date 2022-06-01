<header class="main-header">
	<a href="{{url('Inicio') }}" class="logo">
		<span class="logo-mini"><b>CM</b></span>
		<span class="logo-lg"><b>CLÍNICA MEDICA</b></span>
	</a>

	<nav class="navbar navbar-static-top">
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown user user-menu">
					<a href="#"  class="dropdown-toggle" data-toggle="dropdown">

						<img class="user-image" src="https://www.zarla.com/images/zarla-rbita-med-1x1-2400x2400-20220202-kmbwfd3qkgq6k89vyh97.png?crop=1:1,smart&width=250&dpr=2" style="width: 15%;" alt="">
						<span class="hidden-xs">{{auth()->user()->name}}</span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img class="img-circle" src="https://www.zarla.com/images/zarla-rbita-med-1x1-2400x2400-20220202-kmbwfd3qkgq6k89vyh97.png?crop=1:1,smart&width=250&dpr=2" style="width: 90px; height: 90px;" alt="">
							<p>
								{{auth()->user()->name}}
								<small> Usuario:{{auth()->user()->documento}}</small>
							</p>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="{{url('Mis-Datos')}}" class="btn btn-primary btn-flat">Mis Datos</a>
							</div>
							<div class="pull-right">
								<a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">Salir</a>
							</div>

							<form method="post" id="logout-form" action="{{route('logout')}}">
								@csrf
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>