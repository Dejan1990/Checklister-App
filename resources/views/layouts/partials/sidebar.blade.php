<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('welcome') }}" class="brand-link">
        <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user1.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('welcome') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>
                @if (auth()->user()->is_admin)
                    <span class="text-white p-2">{{ __('Manage Checklist') }}</span>
                    @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                        <li class="nav-item">
                            <a href="{{ route('admin.checklist_groups.edit', $group->id) }}" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    {{ $group->name }}
                                    <i class="nav-icon right fas fa-angle-left"></i>
                                </p>
                            </a>
                        </li>
                        @foreach ($group->checklists as $checklist)
                            <li class="nav-item">
                                <a href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}"
                                    class="nav-link">
                                    __<i class="nav-icon far fa-circle nav-icon"></i>
                                    <p>{{ $checklist->name }}</p>
                                </a>
                            </li>
                        @endforeach
                        <li class="nav-item">
                            <a href="{{ route('admin.checklist_groups.checklists.create', $group->id) }}"
                                class="nav-link">
                                ____<i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    {{ __('New checklist') }}
                                </p>
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="{{ route('admin.checklist_groups.create') }}" class="nav-link">
                            <i class="nav-icon fas fa-share-square"></i>
                            <p>
                                {{ __('New checklist group') }}
                            </p>
                        </a>
                    </li>
                @else
                    @foreach (\App\Models\ChecklistGroup::with('checklists')->get() as $group)
                        <span class="text-white p-2">{{ $group->name }}</span>
                        @foreach ($group->checklists as $checklist)
                            <li class="nav-item">
                                <a href="{{ route('user.checklists.show', [$checklist]) }}" class="nav-link">
                                    __<i class="nav-icon far fa-circle nav-icon"></i>
                                    <p>{{ $checklist->name }}</p>
                                </a>
                            </li>
                        @endforeach
                    @endforeach
                @endif





                @if (auth()->user()->is_admin)
                    <span class="text-white p-2">{{ __('Pages') }}</span>
                    @foreach (\App\Models\Page::all() as $page)
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit', $page) }}" class="nav-link">
                                __<i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    {{ $page->title }}
                                </p>
                            </a>
                        </li>
                    @endforeach

                    <span class="text-white p-2">{{ __('Manage Data') }}</span>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            __<i class="fas fa-users"></i>
                            <p>
                                {{ __('Users') }}
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
