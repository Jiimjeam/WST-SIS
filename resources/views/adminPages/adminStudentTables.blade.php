@extends('layouts.Adminlayout')

@section('title', 'Admindashboard')

@section('Admindashboard')
  <!-- Link stylesheets and scripts for DataTable and icons -->
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
            <h6>Authors Table</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table id="myDataTable" class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Address</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($studentList as $student)
                  <tr>
                    <td>   
                        <h6 class="mb-0 text-sm">{{ $student->id }}</h6>
                    </td>
                    <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="badge badge-sm bg-gradient-warning">{{ $student->name }}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span  class="text-secondary text-xs font-weight-bold">{{ $student->email }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $student->address }}</span>
                    </td>
                    <td class="text-center">
                      <a href="{{ route('student.show', $student->id ) }}">
                        <button class="btn btn-md btn-info view-btn">
                          <i class="fas fa-eye"></i>
                        </button>
                      </a>
                      <button class="btn btn-md btn-primary">
                        <i class="fas fa-edit"></i>
                      </button>
                      <a href="#" onclick="deleteStudent({{ $student->id }})">
                        <button class="btn btn-md btn-danger">
                          <i class="fas fa-archive"></i>
                        </button>
                      </a>
                      <form method="POST" action="{{ route('student.destroy', $student->id) }}" id="student-form-{{ $student->id }}">
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

  <!-- Modal for confirmation -->
  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this student?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deleteStudent(id) {
      // Open confirmation modal
      $('#confirmDeleteBtn').on('click', function () {
        var form = document.getElementById("student-form-" + id);
        form.submit();
        $('.bd-example-modal-sm').modal('hide');
      });
      $('.bd-example-modal-sm').modal('show');
    }
  </script>
@endsection
