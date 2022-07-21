<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<ul class="nav side-menu">
			<li>
				<a href="{{ route('home')}}"><i class="fas fa-home"></i> Principal </a>
			</li>
			
			@if (Auth::user()->nivel == 'Super-Admin')
				<li><a href="{{ url("/user") }}">	<i class="fa fa-list">	</i> Funcionarios </a> </li>	
				<li><a><i class="fas fa-cogs"></i> Configurações <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						<li><a href="{{ url("/setores") }}">	<i class="fa fa-list">	</i> Setores </a> </li>						
					</ul>
				</li>
			@endif

			@if (Auth::user()->nivel == 'Admin')
				<li><a href="{{ url("/user") }}">	<i class="fa fa-list">	</i> Funcionarios </a> </li>
				<li><a><i class="fas fa-cogs"></i> Configurações <span class="fa fa-chevron-down"></span></a>
					<ul class="nav child_menu">
						{{-- <li><a href="{{ url("/setores") }}">	<i class="fa fa-list">	</i> Setores </a> </li>						 --}}
					</ul>
				</li>	

			@endif

			@if (Auth::user()->nivel == 'User')
							{{-- <li><a href="{{ url("/setores") }}">	<i class="fa fa-list">	</i> Setores </a> </li>						 --}}
			@endif

			
				

			<li>
				<a href="{{ route('logout')}}"><i class="fa fa-sign-out"></i> Sair do sistema </a>
			</li>
		</ul>	
	</div>
</div>



