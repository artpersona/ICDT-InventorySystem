@extends('layouts.layouts')
@section('title','ICDT - Dashboard')
@section('page-header','ICDT Overview')
@section('breadcrumb','Dashboard')
@section('sidebar')
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link active" href="/"
                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Members Management</span></li>

        <li class="sidebar-item"> <a class="sidebar-link" href="/members"
                aria-expanded="false"><i data-feather="tag" class="feather-icon"></i><span
                    class="hide-menu">Student Records
                </span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-chat.html"
                aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                    class="hide-menu">Roles</span></a></li>

        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Inventory Management</span></li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/inventory"
                            aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                                class="hide-menu">Inventory</span></a></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Leasing Module </span></a>

            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="form-inputs.html" class="sidebar-link"><span
                            class="hide-menu"> Borrow
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="/return" class="sidebar-link active"><span
                            class="hide-menu"> Return
                        </span></a>
                </li>

            </ul>
        </li>
    </ul>
</nav>
@endsection
@section('content')
<div class="row">

    <div class="col-12">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">

              <div class="card-body">
                Hello
              </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="card">

              <div class="card-body">
                <div class="table-responsive">
                     <table class="table table-bordered" id="dtb1">
                           <thead class="bg-primary text-white">
                             <th>Costume Code</th>
                             <th>Costume Name</th>
                             <th>Category</th>
                             <th>Action</th>
                           </thead>
                           <tbody>
                             @foreach($costumes as $costume)
                             <tr>
                               <td>{{$costume->costume_id}}</td>
                               <td>{{$costume->costume_name}}</td>
                               <td>{{$costume->costume_category}}</td>
                               <td>
                                 <center>

                                 <a data-costume_id="{{$costume->costume_id}}" data-costume_name="{{$costume->costume_name}}" data-costume_category="{{$costume->costume_category}}" class="btn btn-success btn-rounded btn-sm deleteCostume" href="#">
                                       <i class="fas fa-check "></i>  Borrow
                                 </a>
                               </center>

                             </td>
                             </tr>
                             @endforeach
                           </tbody>
                     </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">

        <div class="card-body">
          <div class="table-responsive">
               <table class="table table-bordered costumes_list">
                     <thead class="bg-success text-white">
                       <th>Costume Code</th>
                       <th>Costume Name</th>
                       <th>Category</th>
                       <th>Action</th>
                     </thead>
                     <tbody>
                       @foreach($costumes as $costume)
                       <tr>
                         <td>{{$costume->costume_id}}</td>
                         <td>{{$costume->costume_name}}</td>
                         <td>{{$costume->costume_category}}</td>
                         <td>
                           <center>

                           <a data-costume_id="{{$costume->costume_id}}" data-costume_name="{{$costume->costume_name}}" data-costume_category="{{$costume->costume_category}}" class="btn btn-success btn-rounded btn-sm deleteCostume" href="#">
                                 <i class="fas fa-check "></i>  Borrow
                           </a>
                         </center>

                       </td>
                       </tr>
                       @endforeach
                     </tbody>
               </table>
          </div>
        </div>
    </div>
  </div>
</div>

@section('scripts')
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
<script>
$(document).ready(function() {
  $('.costumes_list').DataTable();
  $('#dtb1').DataTable({
    "pageLength":1
  });
});
</script>
@endsection
