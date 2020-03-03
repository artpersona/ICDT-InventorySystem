@extends('layouts.layouts')
@section('title','ICDT - Inventory')
@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
.custom-combobox {
  position: relative;
  display: inline-block;
}
.custom-combobox-toggle {
  position: absolute;
  top: 0;
  bottom: 0;
  margin-left: -1px;
  padding: 0;
}
.custom-combobox-input {
  margin: 0;
  padding: 5px 10px;
}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
  $.widget( "custom.combobox", {
    _create: function() {
      this.wrapper = $( "<span>" )
        .addClass( "custom-combobox" )
        .insertAfter( this.element );

      this.element.hide();
      this._createAutocomplete();
      this._createShowAllButton();
    },

    _createAutocomplete: function() {
      var selected = this.element.children( ":selected" ),
        value = selected.val() ? selected.text() : "";

      this.input = $( "<input>" )
        .appendTo( this.wrapper )
        .val( value )
        .attr( "title", "" )
        .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
        .autocomplete({
          delay: 0,
          minLength: 0,
          source: $.proxy( this, "_source" )
        })
        .tooltip({
          classes: {
            "ui-tooltip": "ui-state-highlight"
          }
        });

      this._on( this.input, {
        autocompleteselect: function( event, ui ) {
          ui.item.option.selected = true;
          this._trigger( "select", event, {
            item: ui.item.option
          });
        },

        autocompletechange: "_removeIfInvalid"
      });
    },

    _createShowAllButton: function() {
      var input = this.input,
        wasOpen = false;

      $( "<a>" )
        .attr( "tabIndex", -1 )
        .attr( "title", "Show All Items" )
        .tooltip()
        .appendTo( this.wrapper )
        .button({
          icons: {
            primary: "ui-icon-triangle-1-s"
          },
          text: false
        })
        .removeClass( "ui-corner-all" )
        .addClass( "custom-combobox-toggle ui-corner-right" )
        .on( "mousedown", function() {
          wasOpen = input.autocomplete( "widget" ).is( ":visible" );
        })
        .on( "click", function() {
          input.trigger( "focus" );

          // Close if already visible
          if ( wasOpen ) {
            return;
          }

          // Pass empty string as value to search for, displaying all results
          input.autocomplete( "search", "" );
        });
    },

    _source: function( request, response ) {
      var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
      response( this.element.children( "option" ).map(function() {
        var text = $( this ).text();
        if ( this.value && ( !request.term || matcher.test(text) ) )
          return {
            label: text,
            value: text,
            option: this
          };
      }) );
    },

    _removeIfInvalid: function( event, ui ) {

      // Selected an item, nothing to do
      if ( ui.item ) {
        return;
      }

      // Search for a match (case-insensitive)
      var value = this.input.val(),
        valueLowerCase = value.toLowerCase(),
        valid = false;
      this.element.children( "option" ).each(function() {
        if ( $( this ).text().toLowerCase() === valueLowerCase ) {
          this.selected = valid = true;
          return false;
        }
      });

      // Found a match, nothing to do
      if ( valid ) {
        return;
      }

      // Remove invalid value
      this.input
        .val( "" )
        .attr( "title", value + " didn't match any item" )
        .tooltip( "open" );
      this.element.val( "" );
      this._delay(function() {
        this.input.tooltip( "close" ).attr( "title", "" );
      }, 2500 );
      this.input.autocomplete( "instance" ).term = "";
    },

    _destroy: function() {
      this.wrapper.remove();
      this.element.show();
    }
  });

  $( "#combobox" ).combobox();
  $( "#toggle" ).on( "click", function() {
    $( "#combobox" ).toggle();
  });
} );
</script>
@endsection
@section('page-header','ICDT Inventory')
@section('breadcrumb','Inventory / Costume Management')
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
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Inventory </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                <li class="sidebar-item"><a href="/costumes" class="sidebar-link"><span
                            class="hide-menu"> Costumes
                        </span></a>
                </li>
                <li class="sidebar-item"><a href="/classifications" class="sidebar-link active"><span
                            class="hide-menu"> Classifications
                        </span></a>
                </li>

            </ul>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Leasing Module </span></a>
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
<div class="row" style="padding-bottom:30px;padding-left:19px">
      <button id="addCostumeButton"type="button" class="btn btn-success" data-toggle="modal"
          data-target="#addCostume-modal"><i class="fas fa-plus"></i>
          Add Costume</button>
      <button id="addCategoryButton"style="margin-left:30px;"type="button" class="btn btn-primary" data-toggle="modal"
          data-target="#addType-modal"><i class="fas fa-plus"></i>
          Add Category</button>
</div>
<div class="row">

    <div class="col-12">
  <ul class="nav nav-tabs" role="tablist">
  	<li class="nav-item">
  		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" style="color:green;">Costumes</a>
  	</li>
  	<li class="nav-item">
  		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" style="color:blue;">Categories</a>
  	</li>

</ul><!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="tabs-1" role="tabpanel">
    <div class="card">
        <div class="card-body">

              <div class="row">
                   <div class="table-responsive">
                        <table class="table table-bordered" id="costumes_list">
                              <thead class="bg-primary text-white">
                                <tr>
                                  <th>Costume Code</th>
                                  <th>Costume Name</th>
                                  <th>Category</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($costumes as $costume)
                                <tr id="{{$costume->costume_id}}">
                                  <td>{{$costume->costume_id}}</td>
                                  <td>{{$costume->costume_name}}</td>
                                  <td>{{$costume->costume_category}}</td>
                                  @if($costume->costume_status == "Available")
                                  <td>
                                    <center>
                                    <div class="btn btn-outline-success" style ="border: 1px solid #2EF253">
                                      Available
                                    </div>
                                  </center>
                                  </td>
                                  @endif

                                  <td>
                                    <center>
                                    <a data-costume_id="{{$costume->costume_id}}"class="btn btn-danger btn-rounded btn-sm deleteCostume" href="#">
                                          <i class="fas fa-trash-alt"></i>  Delete
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
	<div class="tab-pane" id="tabs-2" role="tabpanel">
    <div class="card">
        <div class="card-body">

              <div class="row">
                   <div class="table-responsive">
                        <table class="table table-bordered" id="categories_list">
                              <thead class="bg-primary text-white">
                                <tr>
                                  <th>ID</th>
                                  <th>Costume Prefix</th>
                                  <th>Costume Name</th>
                                  <th>Category</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $counter = 1;
                                @endphp
                                @foreach($types as $type)
                                <tr>
                                  <td>{{$counter}}</td>
                                  <td>{{$type->type_prefix}}</td>
                                  <td>{{$type->type_name}}</td>
                                  <td>{{$type->type_category}}</td>
                                  <td>
                                    @php
                                    $counter++;
                                    @endphp
                                    <center>
                                      <a data-type_id="{{$type->type_id}}" data-type_prefix="{{$type->type_prefix}}" data-type_name="{{$type->type_name}}" class="btn btn-warning btn-rounded btn-sm updateType" href="#">
                                            <i class="fas fa-cog"></i>  Update
                                      </a>
                                    <a data-type_prefix = "{{$type->type_prefix}}" data-type_id="{{$type->type_id}}"class="btn btn-danger btn-rounded btn-sm deleteType" href="#">
                                          <i class="fas fa-trash-alt"></i>  Delete
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
</div>

<div id="addCostume-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100" id="myModalLabel">Adding a Costume</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="costumesForm">
                @csrf
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-6 form-group ui-widget">
                      <label>Costume Name</label>
                      <div class="form-group">
                        <div class="ui-widget">
                          <select id="combobox"class="form-control" name="costume_name">
                            <option>Select Name</option>

                            @foreach($types as $type)
                            @php
                              $name = $type->type_name." - ".$type->type_category;
                            @endphp
                            <option>{{$name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 form-group">
                      <label>Quantity</label>
                      <input class="form-control" name="costume_quantity" placeholder="Enter Quantity here.." required>
                    </div>
                  </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-dismiss="modal">Close</button>
                <button id= "addCostume" type="button" class="btn btn-primary">Save changes</button>
            </div>
              </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="addType-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100" id="myModalLabel">Adding a Classification</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="classificationsForm" role="form">
                @csrf
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Costume Prefix</label>
                      <input class="form-control" name="costumeType_prefix" placeholder="Enter Prefix here.." required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Costume Name</label>
                      <input class="form-control" name="costumeType_name" placeholder="Enter Name here.." required>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>Costume Category</label>
                        <br>
                      <div class="form-check form-check-inline">
                          <div class="custom-control  custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Upper" id="customCheck1">
                              <label class="custom-control-label" for="customCheck1">Upper</label>
                          </div>
                      </div>
                      <div class="form-check form-check-inline">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Lower" id="customCheck2">
                              <label class="custom-control-label" for="customCheck2">Lower</label>
                          </div>
                      </div>
                      <div class="form-check form-check-inline">
                          <div class="custom-control  custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Accessory" id="customCheck3">
                              <label class="custom-control-label" for="customCheck3">Accessory</label>
                          </div>
                      </div>

                      <div class="form-check form-check-inline">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Props" id="customCheck4">
                              <label class="custom-control-label" for="customCheck4">Props</label>
                          </div>
                      </div>

                    </div>

                  </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-dismiss="modal">Close</button>
                <button name="btn-submit"type="button" id="addType"type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="updateType-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100" id="myModalLabel">Adding a Classification</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="classificationsForm" role="form">
                @csrf
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Costume Prefix</label>
                      <input id="type_prefix" class="form-control" name="costumeType_prefix" placeholder="Enter Prefix here.." required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                      <label>Costume Name</label>
                      <input id="type_name" class="form-control" name="costumeType_name" placeholder="Enter Name here.." required>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-sm-12 form-group">
                        <label>Costume Category</label>
                        <br>
                      <div class="form-check form-check-inline">
                          <div class="custom-control  custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Upper" id="customCheck1" disabled="disabled">
                              <label class="custom-control-label" for="customCheck1">Upper</label>
                          </div>
                      </div>
                      <div class="form-check form-check-inline">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Lower" id="customCheck2" disabled="disabled">
                              <label class="custom-control-label" for="customCheck2">Lower</label>
                          </div>
                      </div>
                      <div class="form-check form-check-inline">
                          <div class="custom-control  custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Accessory" id="customCheck3" disabled="disabled">
                              <label class="custom-control-label" for="customCheck3">Accessory</label>
                          </div>
                      </div>

                      <div class="form-check form-check-inline">
                          <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" value="Props" id="customCheck4" disable="disabled">
                              <label class="custom-control-label" for="customCheck4">Props</label>
                          </div>
                      </div>

                    </div>

                  </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light"
                    data-dismiss="modal">Close</button>
                <button name="btn-submit"type="button" id="updateType"type="submit" class="btn btn-success">Submit</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" id="addedCostumes" tabindex="-1" role="dialog"
    aria-labelledby="scrollableModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="scrollableModalTitle">Added Costumes</h5>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="notif-mod">


            </div>
            <div class="modal-footer">
                <button data-dismiss ="modal" type="button" class="btn btn-primary">Acknowledge</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@section('scripts')
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection

<script>
$(document).ready(function() {
  $('#costumes_list').DataTable();
  $('#categories_list').DataTable();

  $('#addCostume').click(function(e){
    e.preventDefault();
    var str = $('select[name=costume_name]').val();
    var arr = str.split(" - ");
    console.log(arr);
  $.ajax({
    type: 'POST',
    url: 'addCostume',
    data: {
      '_token': $('input[name=_token]').val(),
      'costume_name': arr[0],
      'costume_quantity': $('input[name=costume_quantity]').val(),
      'costume_category':arr[1],


    },
    success: function(data){
    console.log(data)
    swal({
    title: 'Inventory Updated',
    text: 'Costumes Successfully Added',
    type: 'success',
    allowOutsideClick: true,
    html: true
},
function () {
  $('#notif-mod').html("");
  $('#addCostume-modal').modal('hide');
  for(var i=0;i<data.length;i++){

    var row = '<div class="row">'+
      '<div class="col-sm-12">'+
        '<div class="mod-content" style="display:flex;color:black;">'+

          `<p style="margin-left:5%">${data[i].costume_id}</p>`+
          `<p style="margin-left:10%">${data[i].costume_name}</p>`+
          '<p style="margin-left:10%; color:green;">Added Successfully</p>'+

        '</div>'+
      '</div>'+
    '</div>'+
    '<hr>'
    $('#notif-mod').append(row);
  }

  $('#addedCostumes').modal('show');
});

    },
  });
});

$('.deleteCostume').click(function(e){
  e.preventDefault();
  var x = $(this).data('costume_id');
  swal({
  title: "Confirm Deletion",
  text: "This item will be permanently deleted",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Delete",
  closeOnConfirm: false
},
function(){
  $.ajax({
    type: 'POST',
    url: '/deleteCostume',
    data: {
      '_token': $('input[name=_token]').val(),
      'costume_id': x

    },
    success: function(data){
      console.log(`#${data.costume_id}`);
      var t = $('#costumes_list').DataTable();
      t.row(`#${data.costume_id}`).remove().draw();

      swal({
      title: 'Inventory Updated',
      text: 'Costume Record Deleted',
      type: 'success',
      allowOutsideClick: true,
      html: true
      });
    },
  });

});
});

// Changing Tabs
$('#addCategoryButton').click(function(e){
  e.preventDefault;
      $('[href="#tabs-2"]').tab('show');
});
$('#addCostumeButton').click(function(e){
  e.preventDefault;
      $('[href="#tabs-1"]').tab('show');
});

$('#addType').click(function(e){
  alert('clicked!')
  e.preventDefault();
  var checkbox_value = "";
    $(":checkbox").each(function () {
        var ischecked = $(this).is(":checked");
        if (ischecked) {
            checkbox_value += $(this).val() + "|";
        }
    });

$.ajax({
  type: 'POST',
  url: 'addType',
  data: {
    '_token': $('input[name=_token]').val(),
    'type_prefix': $('input[name=costumeType_prefix]').val(),
    'type_name': $('input[name=costumeType_name]').val(),
    'type_category': checkbox_value,

  },
  success: function(data){
    console.log(data)
    alert("Pasok2")
    if ((data.errors)) {
      $('.error').removeClass('hidden');
      $('.error').text(data.errors.department_name);
      $('.error').text(data.errors.department_head);
    } else {
      alert("Pasok3")
      $('.error').remove();
      var t = $('#categories_list').DataTable();
      var td =
      '<center>'+'<a class="btn btn-warning btn-rounded btn-sm" href="{{route('member.profile','data.student_id')}}">'+
      '<i class="fas fa-cog">'+'</i>'+'Update'+'</a>'+'</center>';



      t.row.add([
        data.type_id,
        data.type_prefix,
        data.type_name,
        data.type_category,
        td,
      ]).draw(false);

    }
  },
});
});

$('.updateType').click(function(e){
  e.preventDefault();
  var temp = $(this).data('type_prefix');
  var temp2 = $(this).data('type_category');
  temp = temp.substring(0,temp.length-1);
  $('#type_prefix').val(temp);
  $('#type_name').val($(this).data('type_name'));
  if(temp2=="Upper"){
    $('.customCheck1').prop("disabled",false);
  }
  else if(temp2=="Lower"){
    $('.customCheck2').prop("disabled",false);
  }
  else if(temp2=="Accessory"){
    $('.customCheck3').prop("disabled",false);
  }
  else{
    $('.customCheck4').prop("disabled",false);
  }


  $('#updateType-modal').modal('show');
});

$('.deleteType').click(function(e){
  e.preventDefault();
  var x = $(this).data('type_id');
  var y = $(this).data('type_prefix');
  $.ajax({
    type: 'POST',
    url: 'getCount',
    data: {
      '_token': $('input[name=_token]').val(),
      'type_prefix': y

    },
    success: function(data){
      console.log(data);
      swal({
      title: "Confirm Deletion",
      text: `${data} items will be permanently deleted`,
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Delete",
      closeOnConfirm: false
    },
    function(){
      $.ajax({
        type: 'POST',
        url: '/deleteType',
        data: {
          '_token': $('input[name=_token]').val(),
          'type_id': x,
          'type_prefix': y

        },
        success: function(data1){
          console.log(data1);
          swal({
          title: 'Inventory Updated',
          text: 'Costume Record Deleted',
          type: 'success',
          allowOutsideClick: true,
          html: true
        }, function(){
          location.reload();
        }
      );
        },
      });

    });
    },
  });


});


});

</script>


@endsection
