@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Page') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Edit Page') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.pages.update', $page) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-header">{{ __('Edit Page') }}</div>

                                <div class="card-body">
                                    @if (session('message'))
                                <div class="alert alert-info">
                                    {{ session('message') }}
                                </div>
                            @endif
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }}</label>
                                                <input value="{{ $page->title }}" class="form-control" name="title"
                                                    type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="content">{{ __('Content') }}</label>
                                                <textarea class="form-control" name="content" id="task-textarea"
                                                    rows="5">{{ $page->content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Page') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
