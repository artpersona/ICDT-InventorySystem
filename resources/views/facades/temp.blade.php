@extends('layouts.layouts')
@section('title','hello')
@section('sidebar')
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.html"
                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Members Management</span></li>

        <li class="sidebar-item"> <a class="sidebar-link" href="ticket-list.html"
                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                    class="hide-menu">Student Records
                </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-chat.html"
                aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                    class="hide-menu">Roles</span></a></li>

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Inventory Management</span></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Items </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                            class="hide-menu"> Borrow
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                            class="hide-menu"> Return
                        </span></a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
@endsection
@section('header','Hello World')
@section('content')
Oten ni jaco
@endsection
