<x-admin-master>
    @section('content')
        <h1>Users</h1>

        @if (session('user-deleted'))
            <div class="alert alert-danger">{{session('user-deleted')}}</div>            
        @endif

        <div class="container-fluid">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Username</th>
                          <th>Avatar</th>
                          <th>Name</th>
                          <th>Registered date</th>
                          <th>Updated profile date</th>
                          <th>Delete</th>
                          {{-- <th>Delete</th> --}}
                          {{-- <th>Salary</th> --}}
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Registered date</th>
                            <th>Updated profile date</th>
                            <th>Delete</th>
                          {{-- <th>Salary</th> --}}
                        </tr>
                      </tfoot>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <td>
                            {{$user->id}}
                          </td>
                          <td>
                            <a href="{{route('user.profile.show', $user->id)}} ">
                            {{$user->username}}
                          </a>
                          </td>
                          {{-- <td>
                            <a href="{{route('post.edit', $user->id)}} ">
                            {{$user->title}}
                          </a>
                          </td> --}}
                          <td>
                            <img src="{{$user->avatar}}" height="40px" alt="">
                          </td>
                          <td>
                            {{$user->name}}
                          </td>
                          <td>
                            {{$user->created_at->diffForHumans()}}
                          </td>
                          <td>
                            {{$user->updated_at->diffForHumans()}}
                          </td>
                          <td>
                            {{-- @can('view', $user) --}}
                            <form method="post" action="{{route('user.destroy', $user->id)}} " enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            {{-- @endcan --}}
                            
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
  <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}} "></script>
  <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}} "></script>

  <!-- Page level custom scripts -->
  <script src="{{asset('js/datatables-demo.js')}}"></script>
    @endsection
</x-admin-master>