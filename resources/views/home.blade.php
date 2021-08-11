@extends('layouts.app')

@section('content')


<!--Add Employee Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- <form id="addform" method="POST"  > -->
        <form action="{{ route('employees.store') }}" method="post" id="main_form">
        <div class="modal-body">
           <!-- @csrf -->
           {{ csrf_field() }}

            <div class="form-group">
              <label >Name :</label>

                <input type="text" class="form-control"  name="name"
                placeholder="Name"/>
                <span class="text-danger error-text name_error"></span>


            </div>
            <div class="form-group">
              <label>Date of Payment :</label>

                <input type="date" class="form-control"  name="dop"
                placeholder="D.O.B" />
                <span class="text-danger error-text dop_error"></span>


            </div>
            <div class="form-group">
              <label >Room No :</label>

                <input type="text" class="form-control"  name="address"
                placeholder="Room No"   ></input>
                <span class="text-danger error-text address_error"></span>


            </div>
            <div class="form-group">
              <label >Amount :</label>

                <input type="text" class="form-control"  name="amount"
                placeholder="amount" />
                <span class="text-danger error-text amount_error"></span>

            </div>
           </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save</button>
              <!-- <button class="btn btn-primary" type="submit" id="add">
                Save
              </button> -->
            </div>
          </form>

          </div>
        </div>
      </div>

      <!-- End of Add Employee Modal -->



  <!--Edit Employee Modal -->

      <div class="modal fade" id="example2Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="employeeEditform">
        <div class="modal-body">
           <!-- @csrf -->
           {{ csrf_field() }}
            <input type="hidden" name="id" id="id" />
            <div class="form-group">
              <label >Name :</label>

                <input type="text" class="form-control" id="name"  name="name"
                placeholder="Name">
                <span class="text-danger error-text name_error2"></span>


            </div>
            <div class="form-group">
              <label>Date of Payment :</label>

                <input type="date" class="form-control" id="dop"  name="dop"
                placeholder="D.O.B">
                <span class="text-danger error-text dop_error2"></span>


            </div>
            <div class="form-group">
              <label >Room No :</label>

                <input type="text" class="form-control"  id="address" name="address"
                placeholder="Room No" ></input>
                <span class="text-danger error-text address_error2"></span>


            </div>
            <div class="form-group">
              <label >Amount :</label>

                <input type="text" class="form-control" id="amount" name="amount"
                placeholder="amount">
                <span class="text-danger error-text amount_error2"></span>

            </div>
           </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">
                Close
              </button>
              <button class="btn btn-primary" type="submit" id="add">
                Update
              </button>
            </div>
          </form>

          </div>
        </div>
      </div>

      <!--End of Edit Employee Modal -->


      <!--Add Employee Container -->
      <div class="container" style="margin-top:50px;margin-left:250px">
       <div class="jumbtron">
         <div class="row">
              <h1 style="margin-right:30px;"> Customer Database </h1>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                   Add Customer
              </button>

          </div>
        </div>
      </div>
      <!--End of Add Employee Container -->



      <!--Employee Table -->
      <div class="">
    <div class="">
      <table class="table table-bordered" id="table" style="width:900px; margin:60px;margin-left:250px">
        <tr>
          <th width="150px">No</th>
          <th>Name</th>
          <th>Date of Payment</th>
          <th>Room No</th>
          <th>Amount</th>
          <th class="text-center" width="250px">
            <p   class="create-modal btn btn-success btn-sm" data-target= "employeeaddmodal">
              Action
            </p>
          </th>
        </tr>
        {{ csrf_field() }}
        <?php  $no=1; ?>
        @foreach ($employees as $value)
          <tr id="sid{{$value->id}}">
            <td>{{ $no++ }}</td>

            <td width="400px">
      <div style="display:flex; justify-content:space-between;">
              <div>
                  {{$value->name}}
              </div>

      </div>

            </td>
            <td width="200px">{{ $value->dop }}</td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->amount }}</td>
            <td>
              <!-- <a href="#" class="show-modal btn btn-info btn-sm"  data-id="{{$value->id}}" data-name="{{$value->name}}" data-dop="{{$value->dop}}" data-address="{{$value->address}}" data-amount="{{$value->amount}}">
                  Show
              </a> -->
              <a href="javascript:void(0)" onclick="editEmployee({{$value->id}})"  class="edit-modal btn btn-warning btn-sm">
                Edit
              </a>
              <!-- <a href="javascript:void(0)" onclick="deleteEmployee({{$value->id}})" class="btn btn-danger">Delete</a> -->
              <a href = 'delete/{{ $value->id }}' class="edit-modal btn btn-danger btn-sm">
                Delete


              </a>
            </td>
          </tr>
          @endforeach
          <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total</td>
              <td>{{$total}}
          </tr>
      </table>
    </div>

    <!--End of Employee Table -->




   <script src="{{ asset('jquery-3.5.0.min.js') }}"></script>
      <script src="{{ asset('main.js') }}"></script>



  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}





  <!--Script for Add Employee Modal -->
  <script>

  // $(document).ready(function () {

  //   $('#addform').on('submit', function(e){
  //      e.preventDefault();

  //      $.ajax({
  //        type: "POST",
  //        url: "/employeeadd",
  //        data: $('#addform').serialize(),
  //        success: function (response) {
  //          console.log(response)
  //          $('#exampleModal').modal('hide')
  //          alert("data saved");
  //          location.reload();
  //        },
  //        error: function(error){
  //          console.log(error)
  //          alert('data not saved');
  //        }
  //      });
  //   });
  // });

  </script>
  <!--End of Script for Add Employee Modal -->

  <!--Script for Edit Employee Modal -->
  <script>
    function editEmployee(id)
    {
      $.get('/employee/'+id,function(employee){

        $("#id").val(employee.id);
        $("#name").val(employee.name);
        $("#dop").val(employee.dop);
        $("#address").val(employee.address);
        $("#amount").val(employee.amount);
        $("#example2Modal").modal("toggle");
      });
    }

    $('#employeeEditform').submit(function(e){
      e.preventDefault();
      var id = $("#id").val();
      var name = $('#name').val();
      var dop = $('#dop').val();
      var address = $('#address').val();
      var amount = $('#amount').val();
      var _token=$("input[name=_token]").val();

      $.ajax({
        url:"{{route('employee.update')}}",
        type:'PUT',
        data:{
              id:id,
              name:name,
              dop:dop,
              address:address,
              amount:amount,
              _token:_token
             },
             success:function(response){

               $("#example2Modal").modal('toggle');
               $("#employeeEditform")[0].reset();
               location.reload();

             }

      });

    })
  </script>
  <!--End of Script for Edit Employee Modal -->


  <!--Script for delete Employee Modal -->
  <script>
      function deleteEmployee(id)
      {
        if(confirm("Do you want to delete this record?"))
        {
          $.ajax({
            url:'/employees/'+id,
            type:'DELETE',
            data:{
              _token : $("input[name=_token]").val()
            },
            success:function(response)
            {
              $("#sid"+id).remove();

            }


          });
        }
      }
  </script>
  <!--End of Script for delete Employee Modal -->



@endsection





