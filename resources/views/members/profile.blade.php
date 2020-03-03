@extends('layouts.layouts')

@section('title','ICDT - Members Management')
@section('page-header','Individual Profile')
@section('breadcrumb')
Members Management / Student Records / {!! $member->student_fname." ".$member->student_lname !!}
@endsection
@section('sidebar')
<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/"
                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Members Management</span></li>

        <li class="sidebar-item"> <a class="sidebar-link active" href="/members"
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
@section('content')
<!-- <div class="row" style="padding-bottom:10px;padding-left:19px">
  <a href="/members" class="btn btn-primary"><i class="fas fa-arrow-left"></i>
      Go Back!</a>
</div> -->
@php
$name = $member->student_fname." ".$member->student_lname;
@endphp
<div class="row">

    <div class="col-4">

        <div class="card">

            <div class="card-body">
              <div class="profile-image">
                <img src="/images/pic.jpg" width="45%" alt="profile pic" class="rounded-circle">
              </div>
              <div class="profile-name">
                <h3>{{$name}}</h3>
                <p class="position">ID Number: {{$member->student_id}}</p>
              </div>
              <hr>
              <div class="profile-info">
                <p class="profile-tags">PROGRAM</p>
                <div class="profile-content">
                  <p>{{$member->student_course}}</p>
                  <p>{{$member->student_year}} Year</p>
                </div>
              </div>
              <div class="profile-info">
                <p class="profile-tags">CAMPUS</p>
                <div class="profile-content">
                  <p>Main Campus</p>

                </div>
              </div>
              <hr style="margin-top:12%;">
              <div class="row profile-info">
                <div class="col-sm-7">
                  <p class="profile-tags2">Gender</p>
                  <div class="profile-content">
                    <p>{{$member->student_gender}}</p>

                  </div>
                </div>
                <div class="col-sm-5">
                  <p class="profile-tags2">Position</p>
                  <div class="profile-content">
                    <p>{{$member->student_position}}</p>

                  </div>
                </div>
              </div>
              <div class="row profile-info" style="margin-top:3%">
                <div class="col-sm-7">
                  <p class="profile-tags2">Date of Birth</p>
                  <div class="profile-content2">
                    <p>{{$member->student_birthdate}}</p>

                  </div>
                </div>
                <div class="col-sm-5">
                  <p class="profile-tags2">Member Since</p>
                  <div class="profile-content2">
                    <p>{{$member->student_joinDate}}</p>

                  </div>
                </div>
              </div>


              <hr>
              <div class="profile-info">
                <p class="profile-tags">ADDRESS</p>
                <div class="profile-content">
                  <p>{{$member->student_address}}</p>

                </div>
              </div>
              <div class="profile-info">
                <p class="profile-tags">Contact Number</p>
                <div class="profile-content">
                  <p>Main Campus</p>

                </div>
              </div>
              <a href="" class="emergency-toggle" id="toggle-open">
                <div class="emergency-contact-close">
                    <i class="fas fa-plus"></i>
                    <p>View emergency contact</p>

                </div>
              </a>

              <div class="emergency-contact-open" id="emergency-contact-open">
                <hr style="margin-top:12%">
                <div class="profile-info">
                  <p class="profile-tags">Guardian</p>
                  <div class="profile-content">
                    <p>{{$member->student_guardian}}</p>

                  </div>
                </div>
                <div class="profile-info">
                  <p class="profile-tags">Relationship</p>
                  <div class="profile-content">
                    <p>{{$member->student_guardianRelationship}}</p>

                  </div>
                </div>
                <div class="profile-info">
                  <p class="profile-tags">Guardian Contact Number</p>
                  <div class="profile-content">
                    <p>{{$member->student_guardianContactNumber}}</p>

                  </div>
                </div>
              </div>
              <a href="" class="emergency-toggle color-red" id="toggle-close">
                <div class="emergency-contact-close">
                    <i class="fas fa-minus"></i>
                    <p>Hide emergency contact</p>

                </div>
              </a>
              @if($member->student_status == "Inactive")
              <a href="#" class="btn btn-rounded btn-outline-info contact-info disabled" data-toggle="modal"
                  data-target="#bs-example-modal-lg" aria-disabled="true">EDIT PROFILE INFO</a>
                  <br>
              <a href="#" id="ActivateMember"class="btn btn-rounded btn-outline-success contact-info"
                      >Activate Member</a>
              @else
              <a href="#" class="btn btn-rounded btn-outline-info contact-info " data-toggle="modal"
                  data-target="#bs-example-modal-lg">EDIT PROFILE INFO</a>
                  <br>
              <a href="#" id="deactivateMember"class="btn btn-rounded btn-outline-danger contact-info"
                      >Deactivate Member</a>
              @endif

            </div>

        </div>
    </div>

    <div class="col-8">

        <div class="card">

            <div class="card-body">
              <div class="row">
                  <div class="table-responsive">
                            <table class="table table-bordered" id="members_list">

                              <thead class="bg-primary text-white">
                                  <tr>

                                      <th>Classification</th>
                                      <th>Item Code</th>
                                      <th>Status</th>

                                  </tr>
                              </thead>

                            </table>
                  </div>
              </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100" id="myLargeModalLabel">Ignacian Cultural Dance Troupe Membership Form</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="membersForm" role="form">
                @csrf
                          <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label>ID Number</label>
                                    <input id="student_id" type="text" name="student_id" placeholder="Enter ID Number Here.." class="form-control" value="{{$member->student_id}}" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Position</label>
                                    <input id="student_position" type="text" name="student_position" placeholder="Enter Position  Here.." class="form-control" value="{{$member->student_position}}" required>
                                </div>


                            </div>
                              <div class="row">
                                  <div class="col-sm-6 form-group">
                                      <label>First Name</label>
                                      <input id="student_fname"type="text" name="student_fname" placeholder="Enter First Name Here.." class="form-control" value="{{$member->student_fname}}" required>
                                  </div>
                                  <div class="col-sm-6 form-group">
                                      <label>Last Name</label>
                                      <input id="student_lname"type="text" name="student_lname" placeholder="Enter Last Name Here.." class="form-control" value="{{$member->student_lname}}" required>
                                  </div>


                              </div>

                              <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Gender</label>
                                    <div class="form-group">

                                      <select id="student_gender"class="form-control" name="student_gender">
                                        @if($member->student_gender == "Male")
                                        <option>Select Gender</option>
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                        @elseif($member->student_gender == "Female")
                                        <option>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female" selected>Female</option>
                                        @endif
                                      </select>

                                        </div>
                                </div>

                                <div class="col-sm-4 form-group">

                                  <label>Age</label>
                                  <input id="student_age"type="text" name="student_age" placeholder="Enter Age Here.." class="form-control" value="{{$member->student_age}}" required>


                                  </div>



                                <div class="col-sm-4 form-group">
                                  <label>Religion</label>
                                    <input id="student_religion"type="text" name="student_religion" placeholder="Enter Religion Here.." class="form-control"  value="{{$member->student_religion}}" required>
                                </div>


                              </div>

                              <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>Program</label>
                                    <select id="student_program" class="form-control" name="student_program">
                                      @if($member->student_program == "CCS")
                                      <option>Select Program</option>
                                      <option value="CCS" selected>CCS</option>
                                      <option value="CHEFS">CHEFS</option>
                                      <option value="CABE">CABE</option>
                                      <option value="MEDICAL">MEDICAL</option>
                                      @elseif($member->student_program == "CHEFS")
                                      <option>Select Program</option>
                                      <option value="CCS">CCS</option>
                                      <option value="CHEFS" selected>CHEFS</option>
                                      <option value="CABE">CABE</option>
                                      <option value="MEDICAL">MEDICAL</option>
                                      @elseif($member->student_program == "CABE")
                                      <option>Select Program</option>
                                      <option value="CCS">CCS</option>
                                      <option value="CHEFS">CHEFS</option>
                                      <option value="CABE" selected>CABE</option>
                                      <option value="MEDICAL">MEDICAL</option>
                                      @elseif($member->student_program == "MEDICAL")
                                      <option>Select Program</option>
                                      <option value="CCS">CCS</option>
                                      <option value="CHEFS">CHEFS</option>
                                      <option value="CABE">CABE</option>
                                      <option value="MEDICAL" selected>MEDICAL</option>
                                      @endif
                                    </select>
                                  </div>
                                  <div class="col-sm-4 form-group">
                                      <label>Course</label>
                                      <div class="input-group date">
                                          <input id="student_course" name ="student_course" type="text" placeholder="Enter Course Here.." class="form-control" value="{{$member->student_course}}"required>
                                      </div>
                                  </div>


                                  <div class="col-sm-2 form-group">
                                      <label>Year</label>
                                      <select id="student_year" class="form-control" name="student_year">
                                        @if($member->student_year == "1st")
                                        <option selected>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                        <option>5th</option>
                                        @elseif($member->student_year == "2nd")
                                        <option>1st</option>
                                        <option selected>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                        <option>5th</option>
                                        @elseif($member->student_year == "3rd")
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option selected>3rd</option>
                                        <option>4th</option>
                                        <option>5th</option>
                                        @elseif($member->student_year == "4th")
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option selected>4th</option>
                                        <option>5th</option>
                                        @elseif($member->student_year == "5th")
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                        <option selected>5th</option>
                                        @endif
                                      </select>
                                  </div>

                              </div>

                              <div class="row">
                                <div class="col-sm-12 form-group">
                                  <label>Address</label>
                                  <input id="student_address" name="student_address" type="text" placeholder="Enter Address Here.." class="form-control" value="{{$member->student_address}}"required>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-8 form-group">
                                  <label>Guardian / Person to Contact</label>
                                  <input id="student_guardian" name="student_guardian" type="text" placeholder="Enter Guardian Name Here.." class="form-control" value="{{$member->student_guardian}}"required>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <label>Relationship</label>
                                  <input id="student_guardianRelationship" name="student_guardianRelationship" type="text" placeholder="Enter Relationship Here.." class="form-control" value="{{$member->student_guardianRelationship}}"required>
                                </div>
                              </div>



                          <div class="form-group">
                              <label>Contact Number</label>
                              <input id = "student_guardianContactNumber"name="student_guardianContactNumber" type="text" placeholder="Enter Contact Number Here.." class="form-control" value="{{$member->student_guardianContactNumber}}"required>
                          </div>

                            </div>
                          <button name="btn-submit" id="add" style="margin-left:13px;"class="btn btn-md btn-info">Submit</button>



                          </div>
                      </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
@section('scripts')
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
<script type="text/javascript">
$('#deactivateMember').click(function(e){
  e.preventDefault();
  swal({
  title: "Confirm Deactivation",
  text: "This profile will be deactivated!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Deactivate",
  closeOnConfirm: false
},
function(){
  $.ajax({
    type: 'POST',
    url: '{{$member->student_id}}/deactivateMember',
    data: {
      '_token': $('input[name=_token]').val(),
      'student_id': '<?php echo $member->student_id ?>'
    },
    success: function(data){
      // console.log('hello');
      // alert('Hello')
      // alert(data.student_id)
      // console.log(data);
      swal({
      title: 'Profile Updated',
      text: 'Account Deactivated',
      type: 'success',
      allowOutsideClick: true,
      html: true
  },
  function(){
      location.reload();
  });
    },
  });

});
});

$('#ActivateMember').click(function(e){
  e.preventDefault();
  swal({
  title: "Confirm Activation",
  text: "This profile will be reinstated!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Activate",
  closeOnConfirm: false
},
function(){
  $.ajax({
    type: 'POST',
    url: '{{$member->student_id}}/activateMember',
    data: {
      '_token': $('input[name=_token]').val(),
      'student_id': '<?php echo $member->student_id ?>'
    },
    success: function(data){
      // console.log('hello');
      // alert('Hello')
      // alert(data.student_id)
      // console.log(data);
      swal({
      title: 'Profile Updated',
      text: 'Account Reinstated',
      type: 'success',
      allowOutsideClick: true,
      html: true
  },
  function(){
      location.reload();
  });
    },
  });

});
});


$("#add").click(function(e) {
  e.preventDefault();
$.ajax({
  type: 'POST',
  url: '{{$member->student_id}}/editMember',
  data: {
    '_token': $('input[name=_token]').val(),
    'student_id': $('#student_id').val(),
    'student_position': $('#student_position').val(),
    'student_fname': $('#student_fname').val(),
    'student_lname': $('#student_lname').val(),
    'student_gender': $('#student_gender').val(),
    'student_age': $('#student_age').val(),
    'student_religion': $('#student_religion').val(),
    'student_program': $('#student_program').val(),
    'student_course': $('#student_course').val(),
    'student_year': $('#student_year').val(),
    'student_address': $('#student_address').val(),
    'student_guardian': $('#student_guardian').val(),
    'student_guardianRelationship': $('#student_guardianRelationship').val(),
    'student_guardianContactNumber': $('#student_guardianContactNumber').val(),
  },
  success: function(data){
    alert('Profile Updated!')
    location.reload()
  },
});



});
</script>
@endsection
<script>

$(document).ready(function(){
  $('#members_list').DataTable();
})
  $('#toggle-open').click(function(e){
    e.preventDefault();
    $('#toggle-open').css('display','none');
    $('#toggle-close').css('display','block');
    $('#emergency-contact-open').css('display','block');
  });

  $('#toggle-close').click(function(e){
    e.preventDefault();
    $('#toggle-close').css('display','none');
    $('#toggle-open').css('display','block');
    $('#emergency-contact-open').css('display','none');
  });

</script>
@endsection
