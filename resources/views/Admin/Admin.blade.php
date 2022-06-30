<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Admin Page</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <h4 class="row justify-content-center">{{ __('Users') }}</h4>
                <table class="table table-hover">
                    <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered date</th>
                    <th>Number of referred users</th>
                    </thead>

                    <tbody>
                    @foreach($user as $users)
                        <tr>
                        <td>{{$users->name}}</td>
                        <td>{{$users->email}}</td>
                        <td>{{$users->created_at}}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>


                </div>
            <div class="d-flex justify-content-center" >
            </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
