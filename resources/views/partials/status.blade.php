<div class="container">
    <div class="col-xs-12 col-sm-12">

        @if (session('message'))
            <div class="alert alert-{{ Session::get('status') }} status-box alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;<span class="sr-only">Cerrar</span></a>
                {{ session('message') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><i class="icon fa fa-check fa-fw" aria-hidden="true"></i>Exito</h4>
                {{ session('success') }}
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><i class="icon fa fa-check fa-fw" aria-hidden="true"></i>Advertencia</h4>
                {{ session('warning') }}
            </div>
        @endif

        @if(session()->has('status'))
            @if(session()->get('status') == 'wrong')
                <div class="alert alert-danger status-box alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;<span class="sr-only">Cerrar</span></a>
                    {{ session('message') }}
                </div>
            @endif
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4><i class="icon fa fa-warning fa-fw" aria-hidden="true"></i>Error</h4>
                {{ session('error') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <h4>
                    <i class="icon fa fa-warning fa-fw" aria-hidden="true"></i>
                    <strong>{{ Lang::get('auth.whoops') }}</strong> {{ Lang::get('auth.someProblems') }}
                </h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>
