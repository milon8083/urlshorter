@extends('Front-end.home')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="text-center m-4">Short Your Link Here</h1>
            <hr/>
            @if (session('success_message'))
                {!! session('success_message') !!}
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Orginal Link</h6>
                            <hr/>
                            <form action="{{route('short.url')}}" method="post" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <input type="url" name="original_url" class="form-control" placeholder="Enter Your Original URL">
                                        @error('original_url')
                                            <span class="text-red m-2 p-2">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary ">Short</button>
                                    </div>
                                </div>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

