<x-app-layout>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn">
                                <i data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                            <span class="badge headerBadge1">
                                6 </span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                            <div class="dropdown-header">
                                Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                @foreach ($comment as $ariza)
                                    <a href="{{ url('admin/ariza/info') }}" class="dropdown-item"> <span
                                            class="dropdown-item-avatar
											text-white">
                                        </span> <span class="dropdown-item-desc"> <span
                                                class="message-user">{{ $ariza->fio }}</span>
                                            <span class="time messege-text">Please check your mail !!</span>
                                            <span class="time">{{ $ariza->created_at }}</span>
                                        </span>
                                    </a>
                                @endforeach
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/assets/img/user.png" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-title">Hello {{ Auth::user()->name }} </div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon"> <i
                                    class="far
										fa-user"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item has-icon text-danger"
                                    href="{{ route('logout') }}"onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown ">
                            <a href="{{ url('admin') }}" class="nav-link"><i
                                    data-feather="monitor"></i><span>Categories</span></a>
                        </li>
                        <li class="dropdown ">
                            <a href="{{ url('tour') }}" class="nav-link"><i
                                    data-feather="briefcase"></i>Tour</span></a>
                        </li>
                        <li class="dropdown active">
                            <a href="{{ url('admin/country') }}" class="nav-link"><i
                                    data-feather="map"></i>Country</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ url('admin/ariza/info') }}" class="nav-link"><i
                                    data-feather="map"></i><span>Comment</span></a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="main-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            @if (session('message'))
                                <div style="background: turquoise" class="alert aletr-success">
                                    {{ session('message') }}</div>
                            @endif

                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ url('admin/country/create') }}" class="btn btn-primary float-end">Add
                                        Country</a>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name (uz)</th>
                                                <th>Name (ru)</th>
                                                <th>Name (en)</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($countries as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <p>{{ $item->name_uz }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $item->name_ru }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $item->name_en }}</p>
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ url('admin/country/' . $item->id . '/active') }}"
                                                            method="GET">
                                                            @csrf
                                                            @if ($item->is_active == 0)
                                                                <button>
                                                                    <div class="badge badge-success">Active</div>
                                                                </button>
                                                            @else
                                                                <button class="badge badge-danger">Not Active</button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                    <td>
                                                        {{-- <a href="{{ url('admin/country/' . $item->id . '/delete') }}"
                                                            class="btn btn-danger">Dalete</a> --}}
                                                        <a href="{{ url('admin/country/' . $item->id . '/edit') }}"
                                                            class="btn btn-success">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tr>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
