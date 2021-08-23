@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Update checklist') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Update checklist') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <!-- Horizontal Form -->
            <div class="card card-info">
              @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
              @endif
              <div class="card-header">
                <h3 class="card-title mb-0">{{ __('Edit checklist ') }}<span class="text-bold">
                    {{ $checklistGroup->name }} > {{ $checklist->name }}
                </span></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" value="{{ $checklist->name }}" class="form-control" placeholder="{{ __('Checklist Name') }}">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info text-white">{{ __('Save') }}</button>
                  <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger float-right" onclick="return confirm('{{ __('Are you sure?') }}')">
                        {{ __('Delete') }}
                    </button>
                    </form>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
            </div>
          </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
