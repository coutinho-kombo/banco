
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{$title}}</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{asset('assets/css/ready.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body class="@if ($type=="login") login-page @endif">
    @if ($type!="login")
       
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="/" class="logo">
					Banco Estudantil
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        @if(!Auth::check())
                        <li class="nav-item dropdown hidden-caret">
							<a class="btn btn-primary btn-sm" href="/user/login">
								Entrar
							</a>
                        </li>
						@endif

						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						
						@if(Auth::check())
						<li class="nav-item dropdown">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="
						@if(Auth::user()->pessoa->foto=="") https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png 
						@else {{Auth::user()->pessoa->foto}} @endif" alt="{{Auth::user()->pessoa->nome}}" width="36" class="img-circle"><span >{{Auth::user()->pessoa->nome}}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="
											@if(Auth::check())
											@if(Auth::user()->pessoa->foto=="") https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png 
										@else {{Auth::user()->pessoa->foto}} @endif
										https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png
										@endif" alt="
										@if(Auth::check())
										{{Auth::user()->pessoa->nome}}
										@endif
										"></div>
										<div class="u-text">
										<h4>
											@if(Auth::check())
											{{Auth::user()->pessoa->nome}}
											@endif
										</h4>
										<p class="text-muted">
											@if(Auth::check())
											{{Auth::user()->username}}
											@endif
										</p>
										@if (Auth::user()->acesso == "estudante")
										
										<a href="/contas/estado/{{Auth::user()->id}}" class="btn btn-rounded btn-warning btn-sm">Perfil</a>
										
										@endif
										
										</div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> Meu Perfil</a>
									<a class="dropdown-item" href="#"><i class="ti-username"></i> Entrada</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Definições de Conta</a>
									<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-power-off"></i> Terminar Sessão</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>

							@endif
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="
							@if(Auth::check())
							@if(Auth::user()->pessoa->foto=="") https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png 
							@else {{Auth::user()->pessoa->foto}} @endif
							@else
							https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png
							@endif
							">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									@if(Auth::check())
									{{Auth::user()->pessoa->nome}}
									@else
									Nenhum
									@endif
									<span class="user-level">
										@if(Auth::check())
										{{Auth::user()->acesso}}
										@else
										Nenhum
										@endif
									</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">Meu Perfil</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Editar Perfil</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Configurações</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item @if($menu=="Home") active @endif">
							<a href="/">
								<i class="la la-home"></i>
								<p>Home</p>
							</a>
						</li>

						@if(Auth::check())
						@if (Auth::user()->acesso=="estudante")
						<li class="nav-item @if($menu=="Pagamentos") active @endif">
							<a href="/pagamentos/">
								<i class="la la-money"></i>
								<p>Pagamento</p>
							</a>
						</li>

						<li class="nav-item @if($menu=="Transferência") active @endif">
							<a href="/transferencias/">
								<i class="la la-tags"></i>
								<p>Transferência</p>
							</a>
						</li>
						@endif
						@endif

						@if(Auth::check())
							@if(Auth::user()->acesso=="admin")
						<li class="nav-item @if($menu=="Estudantes") active @endif">
							<a href="/estudantes/">
								<i class="la la-list"></i>
								<p>Estudantes</p>
							</a>
						</li>

						<li class="nav-item @if($menu=="Serviços") active @endif">
							<a href="/servicos/">
								<i class="la la-cogs"></i>
								<p>Serviços</p>
							</a>
						</li>

						<li class="nav-item @if($menu=="Contas") active @endif">
							<a href="/contas/">
								<i class="la la-keyboard-o"></i>
								<p>Contas</p>
							</a>
						</li>
						<li class="nav-item @if($menu=="Descontos") active @endif">
							<a href="/descontos/">
								<i class="la la-th"></i>
								<p>Descontos</p>
							</a>
						</li>
						@endif
						<li class="nav-item @if($menu=="Extras") active @endif">
							<a href="/extras/">
								<i class="la la-bell"></i>
								<p>Extras</p>
							</a>
						</li>
						<li class="nav-item @if($menu=="Sobre") active @endif">
							<a href="/sobre/">
								<i class="la la-font"></i>
								<p>Sobre</p>
							</a>
						</li>
					@endif
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
					<h4 class="page-title">{{$menu}}</h4>
                    
                        @yield('content')
					</div>
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="http://www.themekita.com">
										Tema
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">
										Ajuda
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="https://themewagon.com/license/#free-item">
										Licença
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright ml-auto">
							{{date('Y')}}, Made With <i class="la la-heart heart text-danger"></i> by <a href="#">Coutinho Kombo</a>
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">									
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p>
						<b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
    </div>
     @else
     @yield('content')
    @endif
</body>
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chartist/chartist.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/ready.min.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>
</html>