@extends('layouts.Adminlayout')  <!-- Extends a layout file -->

@section('title', 'Admindashboard')  <!-- Defining a section with a single line -->

@section('Admindashboard')  <!-- Defining a multi-line section -->
                <!-- End Navbar -->

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">



<script>
  $(document).ready(function () {
    $('#myDataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "pageLength": 25,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true, // Make it responsive
        "language": {
            "paginate": {
                "previous": "<i class='bi bi-chevron-left'></i>",
                "next": "<i class='bi bi-chevron-right'></i>"
            }
        }
    });
    $.extend(true, $.fn.dataTable.defaults, {
    dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
         "<'row'<'col-sm-12'tr>>" +
         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    buttons: ["copy", "csv", "excel", "pdf", "print"]
});

});

</script>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Authors table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <table id="myDataTable" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($studentList as $student)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $student->id }}</h6>
                            <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $student->name }}</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">{{ $student->email }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $student->address }}</span>
                      </td>
                      <td class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                          <a href="{{ route('student.show', $student->id ) }}">
                            <button class="btn btn-md btn-info view-btn">
                              <i class="fas fa-eye"></i>
                            </button>
                          </a>

                          <button class="btn btn-md btn-primary" data-toggle="tooltip" data-original-title="Edit user">
                              <i class="fas fa-edit"></i>
                          </button>

                          <a href="#" onclick="deleteStudent({{$student->id}})">
                            <button class="btn btn-md btn-danger" data-toggle="tooltip" data-original-title="Archive user">
                                <i class="fas fa-archive"></i>
                            </button>
                          </a>

                          <form method="POST" action="{{route('student.destroy', $student->id)}}" id="student-form-{{ $student->id }}">
                            @csrf
                            @method('DELETE')
                          </form>

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

    <script>
      function deleteStudent(id){
        form = document.getElementById("student-form-" + id);
        form.submit();
      } 
    </script>

@endsection


