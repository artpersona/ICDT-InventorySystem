@extends('layouts.layouts')
@section('styles')
<!-- <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css"> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection
@section('title','ICDT - Members Management')
@section('page-header','Members Management Portal')
@section('breadcrumb','Members Management / Student Records')
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
<div class="row" style="padding-bottom:10px;padding-left:19px">
  <button type="button" class="btn btn-success" data-toggle="modal"
      data-target="#bs-example-modal-lg"><i class="fas fa-plus"></i>
      Add Members</button>
</div>
<div class="row">

    <div class="col-12">

        <div class="card">

            <div class="card-body">

                <div class="row">
                    <div class="table-responsive">
                              <table class="table table-bordered" id="members_list">

                                <thead class="bg-primary text-white">
                                    <tr>

                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Year Level</th>
                                        <th>Course</th>
                                        <th>Position</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @foreach($members as $member)
                                @php
                                $name = $member->student_fname." ".$member->student_lname;
                                @endphp
                                    <tr>
                                      <td>{{$member->student_id}}</td>
                                      <td>{{$name}}</td>
                                      <td>{{$member->student_year}}</td>
                                      <td>{{$member->student_course}}</td>
                                      <td>{{$member->student_position}}</td>
                                      <td>
                                        <center>
                                        <a class="btn btn-warning btn-rounded btn-sm" href="{{route('member.profile',$member->student_id)}}">
                                                <i class="fas fa-cog"></i>  Update
                                        </a>
                                      </center>
                                      </td>

                                    </tr>
                                @endforeach
                              </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<!-- Create Modal -->
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
                                    <input type="text" name="student_id" placeholder="Enter ID Number Here.." class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label>Position</label>
                                    <input type="text" name="student_position" placeholder="Enter Position  Here.." class="form-control" required>
                                </div>


                            </div>
                              <div class="row">
                                  <div class="col-sm-6 form-group">
                                      <label>First Name</label>
                                      <input type="text" name="student_fname" placeholder="Enter First Name Here.." class="form-control" required>
                                  </div>
                                  <div class="col-sm-6 form-group">
                                      <label>Last Name</label>
                                      <input type="text" name="student_lname" placeholder="Enter Last Name Here.." class="form-control" required>
                                  </div>


                              </div>

                              <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>Gender</label>
                                    <div class="form-group">

                                      <select class="form-control" name="student_gender">
                                        <option>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>

                                      </select>

                                        </div>
                                </div>

                                <div class="col-sm-4 form-group">

                                  <label>Date of Birth</label>
                                    <input name ="student_birthdate" type="date" class="form-control datepick" style="background-color:white;"required>





                                  </div>



                                <div class="col-sm-4 form-group">
                                  <label>Joined Date</label>
                                    <input type="text" name="student_joinDate" placeholder="" class="form-control datepick" style="background-color:white;" required>
                                </div>


                              </div>

                              <div class="row">
                                  <div class="col-sm-6 form-group">
                                    <label>Program</label>
                                    <select class="form-control" name="student_program">
                                      <option>Select Program</option>
                                      <option value="CCS">CCS</option>
                                      <option value="CHEFS">CHEFS</option>
                                      <option value="CABE">CABE</option>
                                      <option value="MEDICAL">MEDICAL</option>
                                    </select>
                                  </div>
                                  <div class="col-sm-4 form-group">
                                      <label>Course</label>
                                      <div class="input-group date">
                                          <input name ="student_course" type="text" placeholder="Enter Course Here.." class="form-control" required>
                                      </div>
                                  </div>


                                  <div class="col-sm-2 form-group">
                                      <label>Year</label>
                                      <select class="form-control" name="student_year">
                                        <option>1st</option>
                                        <option>2nd</option>
                                        <option>3rd</option>
                                        <option>4th</option>
                                        <option>5th</option>
                                      </select>
                                  </div>

                              </div>

                              <div class="row">
                                <div class="col-sm-12 form-group">
                                  <label>Address</label>
                                  <input name="student_address" type="text" placeholder="Enter Address Here.." class="form-control" required>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-sm-8 form-group">
                                  <label>Guardian / Person to Contact</label>
                                  <input name="student_guardian" type="text" placeholder="Enter Guardian Name Here.." class="form-control" required>
                                </div>
                                <div class="col-sm-4 form-group">
                                  <label>Relationship</label>
                                  <input name="student_guardianRelationship" type="text" placeholder="Enter Relationship Here.." class="form-control" required>
                                </div>
                              </div>



                          <div class="form-group">
                              <label>Contact Number</label>
                              <input name="student_guardianContactNumber" type="text" placeholder="Enter Contact Number Here.." class="form-control" required>
                          </div>

                            </div>
                          <button name="btn-submit" id="add" type="submit" style="margin-left:13px;"class="btn btn-md btn-info">Submit</button>



                          </div>
                      </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@section('scripts')

  <!--  Flatpickr  -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection

<script>
        $(document).ready(function() {
          $('#members_list').DataTable();
          $(".datepick").flatpickr();

          $("#membersForm").submit(function(e) {
            e.preventDefault();
          $.ajax({
            type: 'POST',
            url: 'addMember',
            data: {
              '_token': $('input[name=_token]').val(),
              'student_id': $('input[name=student_id]').val(),
              'student_position': $('input[name=student_position]').val(),
              'student_fname': $('input[name=student_fname]').val(),
              'student_lname': $('input[name=student_lname]').val(),
              'student_gender': $('select[name=student_gender]').val(),
              'student_birthdate': $('input[name=student_birthdate]').val(),
              'student_joinDate': $('input[name=student_joinDate]').val(),
              'student_program': $('select[name=student_program]').val(),
              'student_course': $('input[name=student_course]').val(),
              'student_year': $('select[name=student_year]').val(),
              'student_address': $('input[name=student_address]').val(),
              'student_guardian': $('input[name=student_guardian]').val(),
              'student_guardianRelationship': $('input[name=student_guardianRelationship]').val(),
              'student_guardianContactNumber': $('input[name=student_guardianContactNumber]').val(),
            },
            success: function(data){
              alert("Pasok2")
              console.log(data);
              if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors.department_name);
                $('.error').text(data.errors.department_head);
              } else {
                swal({
                title: 'Record Added!',
                text: `${data.student_fname}'s Profile Created'`,
                type: 'success',
                allowOutsideClick: true,
                html: true
            },
            function(){
                location.reload();
            });
              }
            },
          });



        });

        });

    </script>
@endsection
