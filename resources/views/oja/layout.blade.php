@include("html-header")
<body class="fixed-nav sticky-footer bg-dark" id="page-top">

@include("nav")

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('dashboard')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">@yield('page-title')</li>
      </ol>
      @yield('content')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
	  @include("footer")
	  @include("html-footer")
</body>

</html>
