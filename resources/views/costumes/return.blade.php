@extends('layouts.layouts')
@section('title','ICDT - Leasing Module')
@section('page-header','Return Module')
@section('breadcrumb','Leasing / Return')
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

              <div class="card-body" id="profileMain" style="display:none">
                <div class="profile-card">
                  <div class="profile-image">
                    <img src="/images/pic.jpg" width="45%" alt="profile pic" class="rounded-circle" style="box-shadow: 0px 0px 2px 4px #80ed9b;">
                  </div>
                  <div class="profile-name">
                    <h3 id="name">John Paul Perez </h3>
                    <p class="position" id="id_number">ID Number:1800002423</p>
                  </div>
                  <hr style="margin-top:50px">
                  <div class="row" style="margin-left:15px; padding-top:10px;">
  
                      <a class="btn btn-warning btn-rounded btn-sm space" href="#">
                            <i class="fas fa-cog"></i>  Update
                      </a>
                      <a class="btn btn-success btn-rounded btn-sm space" href="#">
                        <i class="fas fa-calendar-alt"></i>  Calendar
                      </a>
                      <a id="sessionEnd" class="btn btn-danger btn-rounded btn-sm space" href="#">
                        <i class="fas fa-trash-alt"></i>  End Session
                      </a>
    
                  </div>
                  <hr style="margin-top:20px;">
                  <center> 
                    <p style="font-weight:400; color:red">Pending Items</p>
                  </center>

                  <div class="pending-item">
                    <p>Item Code</p>
                    <div class="actions">
                      <a href="">funct1</a>
                      <a href="">funct2</a>
                    </div>
                  </div>

                  <div class="pending-item">
                    <p>Item Code</p>
                    <div class="actions">
                      <a href="">funct1</a>
                      <a href="">funct2</a>
                    </div>
                  </div>

                  <div class="pending-item">
                    <p>Item Code</p>
                    <div class="actions">
                      <a href="">funct1</a>
                      <a href="">funct2</a>
                    </div>
                  </div>

                </div>
                
              </div>

              <div class="card-body" id="session">
                <div class="profile-image">
                  <img src="/images/pic.jpg" width="45%" alt="profile pic" class="rounded-circle" style="box-shadow: 0px 0px 2px 4px #80ed9b;">
                </div>
                <form>
                  @csrf
                  <div form-group>
                    <center>
                    <p style="font-size:20px;color:black;padding-top:17px ">Student ID</p>
                    <input type="text" name="student_id" class="form-control">
                    <a href="#" id="sessionStart" class="btn btn-rounded btn-success " style="width:300px;margin-top:20px;">Submit</a>
                  </center>
                  </div>
                </form>
              </div>
          </div>


        </div>

        <div id="placeholder" class="col-sm-8" >
          <div class="card">
            <div class="card-body">
               Placeholder here! Banner of the Culture and the Arts
            </div>
          </div>
        </div>


        <div id="mainFunctions" class="col-sm-8" style="display:none;">
          <div class="card" style="width:70%;left:13%;">
              <div class="card-body">
                <div class="borrow-field">
                  <p style="font-size:25px;color:black; ">Costume ID</p>
                  <form class="mt-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nametext12" aria-describedby="name"
                            placeholder="" name="costume_id">
                        <small id="name13"
                            class="badge badge-default badge-danger form-text text-white">
                          Enter Costume ID
                        </small>
                    </div>
                    <a href="#" id="addCostume" data-student_id="admin"  class="btn btn-rounded btn-outline-success" style="width:300px;text-align:center;">Submit</a>
                </form>
                  
                </div>
                
                
              </div>
          </div>
          <div class="card">

            <div class="card-body">
              <div class="table-responsive">
                   <table class="table table-bordered costumes_list" id="cart">
                         <thead class="bg-success text-white">
                           <th>Costume Code</th>
                           <th>Costume Name</th>
                           <th>Category</th>
                           <th>Action</th>
                         </thead>
                         <tbody>
                           
                         </tbody>
                   </table>
                   
              </div>
            </div>
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



function show(){
        $('#mainFunctions').css('display','block');
        $('#placeholder').css('display','none');
        $('#profileMain').css('display','block');
        $('#session').css('display','none');
}

function hide(){
        $('#placeholder').css('display','block');
        $('#mainFunctions').css('display','none');
        $('#profileMain').css('display','none');
        $('#session').css('display','block');
}
var user = localStorage.getItem("user_id");
// code for checking if there is a session
if(user!="null"){
  console.log(user)
        $('#addCostume').attr("data-student_id",`${localStorage.getItem("user_id")}`);
        $('#name').html(`${localStorage.getItem("user_name")}`);
        $('#id_number').html(`${localStorage.getItem("user_id")}`);
        $('#addCostume').attr("data-student_id",`${localStorage.getItem("user_id")}`);
        show();        
        
}


  $('.costumes_list').DataTable({
    "pageLength":8
  });
  $('#sessionStart').click(function(){
    
    $.ajax({
      type: 'POST',
      url: 'startSession',
      data: {
        '_token': $('input[name=_token]').val(),
        'student_id': $('input[name=student_id]').val()


    },
    success: function(data){
      $('#addCostume').attr("data-student_id",`${data.student_id}`);
      console.log(data)
      var size = Object.keys(data).length;
      if(size >0){
        var name = data.student_fname+" "+data.student_lname;
        localStorage.setItem("user_id",data.student_id);
        localStorage.setItem("user_name", name);
        console.log('pasok3')
        $('#name').html(`${name}`);
        $('#id_number').html(`${data.student_id}`);
        show();        
      }

         },
    });
  });
  $('#sessionEnd').click(function(){
    localStorage.setItem("user_id",null);
    localStorage.setItem("user_name",null);

    hide();
  });

  $('#addCostume').click(function(){
    
    $.ajax({
      type: 'POST',
      url: 'tempAdd',
      data: {
        '_token': $('input[name=_token]').val(),
        'student_id': localStorage.getItem("user_id"),
        'costume_id': $('input[name=costume_id').val()

    },
    success: function(data){

      /*
      Note: 
      1 - already in the cart
      2 - borrowed item (unavailable)
      */
      console.log(data)
      if(data!=1&&data!=2){

        var td =
      '<center>'+`<a id="${data.costume_id}" class="btn btn-danger btn-rounded btn-sm removeCart" href='#'  data-costume_id="${data.costume_id}">`+
      '<i class="fas fa-times">'+'</i>'+' Remove'+'</a>'+'</center>';

        var table = $('#cart').DataTable();
        table.row.add([
        data.costume_id,
        data.costume_name,
        data.costume_category,
        td
      ]).node().id = data.costume_id;
      table.draw(false);
      }
      else if(data==1){
        swal("Costume Pending!", "Item has already been added!", "warning")
      }
      else{
        swal("Costume Unavailable!", "Item has already been borrowed!", "error")

      }
      
         },
    });
  });

  $('body').on('click','.removeCart',function(e){
    e.preventDefault();

    $.ajax({
      type: 'POST',
      url: 'tempRemove',
      data: {
        '_token': $('input[name=_token]').val(),
        'costume_id': $(this).data("costume_id")


    },
    success: function(data){
      console.log(data);
      var t = $('#cart').DataTable();
      t.row(`#${data.costume_id}`).remove().draw();
         },
    });
  });
  
});
</script>
@endsection
