    <div class="wrapper">
        <!-- Sidebar  -->

        <nav id="sidebar">
            <div class="user-p">
                <img src="imagenes/logo.jpg">
            </div>

            <ul class="list-unstyled components">
        
                <li class="{{'Alumno'==Request::is('Alumno*')?'active':''}}">
                    <a href="{{ route('Alumno.index')}}">
                        <i class="fa fa-graduation-cap"></i>
                        <b>Estudiantes</b>
                    </a>
                </li>
                <li class="{{'Maestro'==Request::is('Maestro*')?'active':''}}">
                    <a href="{{ route('Maestro.index')}}">
                        <i class='fas fa-chalkboard-teacher'></i>
                        <b>Maestros</b>
                    </a>
                </li>
                <li class="{{'Curso'==Request::is('Curso*')?'active':''}}">
                    <a href="{{ route('Curso.index')}}">
                        <i class="fa fa-book"></i>
                        <b>Curso</b>
                    </a>
                </li>
                <li class="{{'Materia'==Request::is('Materia*')?'active':''}}">
                    <a href="{{ route('Materia.index')}}">
                        <i class="fa fa-book"></i>
                        <b>Materias</b>
                    </a>
                </li>
                <li class="">
                    <a href="">
                        <i class="fa fa-calendar"></i>
                        <b>Horario</b>
                    </a>
                </li>
                <li class="{{'usuarios'==Request::is('usuarios*')?'active':''}}">
                    <a href="{{ route('usuarios.index')}}">
                        <i class="fa fa-users"></i>
                        <b>Administrativo</b>
                    </a>
                </li>
                <li class="{{'roles'==Request::is('roles*')?'active':''}}">
                    <a href="{{ route('roles.index')}}">
                        <i class="fa fa-users"></i>
                        <b>Roles</b>
                    </a>
                </li>
                <li class="{{'usuarios'==Request::is('usuarios*')?'active':''}}">
                    <a href="{{ route('usuarios.index')}}">
                        <i class="fa fa-users"></i>
                        <b>Usuarios</b>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- Page Content  -->
        <!--<div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>
        </div>-->
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>