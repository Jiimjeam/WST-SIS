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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
            <h6>Subject Table</h6>
            <a href="{{ route('students.create') }}">
              <button class="btn btn-success btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                <i class="fas fa-user-plus"></i> Add Subject
              </button>
            </a>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table id="myDataTable" class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Code</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7"># of Units</th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>   
                        <h6 class="mb-0 text-sm"></h6>
                    </td>
                    <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="badge badge-sm bg-gradient-warning"></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span  class="text-secondary text-xs font-weight-bold"></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"></span>
                    </td>
                    <td class="text-center">

                      
                    </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 
@endsection



