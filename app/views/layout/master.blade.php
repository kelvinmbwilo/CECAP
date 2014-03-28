<!DOCTYPE html>
@if(Auth::guest())
{{  Redirect::to("/")  }}
@endif
<html>
<head>
    <title>Dashboard | CECAP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    {{ HTML::style("css/bootstrap.min.css") }}
    {{ HTML::style("css/bootstrap-theme.min.css") }}
    {{ HTML::style("font-awesome/css/font-awesome.css") }}
    {{ HTML::style("jqueryui/css/cupertino/jquery-ui.css") }}
    <!-- Bootstrap Admin Theme -->
    {{ HTML::style("css/bootstrap-small.css") }}
    {{ HTML::style("css/bootstrap-admin-theme-small.css") }}
    {{ HTML::style("css/bootstrap-admin-theme.css") }}
    {{ HTML::style("css/bootstrap-admin-theme-change-size.css") }}

    <!-- Vendors -->
    {{ HTML::style("vendors/easypiechart/jquery.easy-pie-chart.css") }}
    {{ HTML::style("vendors/easypiechart/jquery.easy-pie-chart_custom.css") }}
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{ HTML::script("js/jquery.js") }}
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {{ HTML::script("js/html5shiv.js") }}
    {{ HTML::script("js/respond.min.js") }}
    <![endif]-->
</head>
<body class="bootstrap-admin-with-small-navbar">
<!-- small navbar -->
<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar-sm" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left bootstrap-admin-theme-change-size">
<li><a href="#">Cervical Cancer Prevention Program (CECAP)</a> </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">Reminders <i class="glyphicon glyphicon-bell"></i></a>
                </li>
                <li>
                    <a href="#">Settings <i class="glyphicon glyphicon-cog"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-hover="dropdown"> <i class="glyphicon glyphicon-user"></i> {{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }} <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> profile</a></li>
                        <li><a href="#"><i class="fa fa-lock"></i> change password</a></li>
                        <li role="presentation" class="divider"></li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- main / large navbar -->
<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation" style="margin-bottom: 0px">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('home') }}">Dashboard</a>
            </div>
            <div class="collapse navbar-collapse main-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown">Patients<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li role="presentation" class="dropdown-header">Patient Menu</li>
                            <li><a href="{{ url('patient/register') }}">New Registration</a></li>
                            <li><a href="{{ url('patients') }}">Folow Up</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown">Reports <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li role="presentation" class="dropdown-header">Reports Menu</li>
                            <li><a href="#">Generate Report</a></li>
                            <li><a href="#">View Standard Reports</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('users') }}">Users</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown">Settings<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li role="presentation" class="dropdown-header">Dropdown header</li>
                            <li><a href="#">action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation" class="dropdown-header">Dropdown header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </div><!-- /.container -->
</nav>

<div class="container">
<!-- left, vertical navbar & content -->
<div class="row">

<!-- content -->
<div class="col-md-12">

<div class="row">
    <div class="navbar navbar-default bootstrap-admin-navbar-thin">
        <ol class="breadcrumb bootstrap-admin-breadcrumb">
            @yield("breadcumbs")
        </ol>
    </div>
</div>

@yield('contents')

</div>
</div>
</div>

<div class="navbar navbar-footer">
    <div class="container">
        <div class="row">
            <footer role="contentinfo">
                <p class="left">Cervical Cancer Prevention Program (CECAP)</p>
                <p class="right">&copy; {{ date("Y") }}<a href="http://www.meritoo.pl" target="_blank"> Softmed LTD</a></p>
            </footer>
        </div>
    </div>
</div>



<!-- Include all compiled plugins (below), or include individual files as needed -->
{{ HTML::script("js/bootstrap.min.js") }}
{{ HTML::script("js/jquery.form.js") }}
{{ HTML::script("jqueryui/js/jquery-ui-1.10.4.custom.js") }}
{{ HTML::script("js/twitter-bootstrap-hover-dropdown.min.js") }}
{{ HTML::script("js/bootstrap-admin-theme-change-size.js") }}
{{ HTML::script("vendors/easypiechart/jquery.easy-pie-chart.js") }}
{{ HTML::script("vendors/datatables/js/jquery.dataTables.min.js") }}
{{ HTML::script("js/DT_bootstrap.js") }}

<script type="text/javascript">
    $(function() {
        // Easy pie charts
        $('.easyPieChart').easyPieChart({animate: 1000});
    });
</script>
</body>
</html>