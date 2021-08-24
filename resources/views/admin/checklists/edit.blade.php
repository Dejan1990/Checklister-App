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
                        <form class="form-horizontal"
                            action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{ $checklist->name }}"
                                            class="form-control" placeholder="{{ __('Checklist Name') }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit"
                                    class="btn btn-info text-white">{{ __('Update Checklister') }}</button>
                                <form
                                    action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-right"
                                        onclick="return confirm('{{ __('Are you sure?') }}')">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->

                    <hr>

                    <div class="card">
                        <div class="card-header"><i class="fa fa-align-justify"></i> {{ __('List of Tasks') }}</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm">
                                <tbody>
                                    @if ($checklist->tasks->isNotEmpty())
                                        @foreach ($checklist->tasks as $task)
                                            <tr>
                                                <td>{{ $task->name }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}">{{ __('Edit') }}</a>
                                                    <form style="display: inline-block"
                                                        action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger" type="submit"
                                                            onclick="return confirm('{{ __('Are you sure?') }}')">
                                                            {{ __('Delete') }}</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <p class="text-danger">
                                          {{ __('There is no tasks yet') }}
                                        </p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                            @csrf
                            <div class="card-header">{{ __('New Task') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input value="{{ old('name') }}" class="form-control" name="name"
                                                type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description"
                                                rows="5">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Task') }}</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
