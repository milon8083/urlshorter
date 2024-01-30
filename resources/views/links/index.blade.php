<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Short-Url Dashboard</title>
        <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets')}}/style.css ">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">Dashboard</div>
                                <div class="card-body">
                                    <table class="table table-hover table-striped table-bordered">
                                        <tr class="text-center">
                                            <th>ID</th>
                                            <th>Original Url</th>
                                            <th>Short Url</th>
                                        </tr>
                                        @foreach($links as $link)
                                            <tr>
                                                <td>{{$link->id}}</td>
                                                <td>{{$link->original_url}}</td>
                                                <td>{{url($link->short_url)}}</td>
                                        @endforeach
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
