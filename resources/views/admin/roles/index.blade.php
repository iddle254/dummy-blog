<x-admin-master>
    @section('content')
        <h1>Roles</h1>

        @if (session()->has('role-deleted'))
        <div class="alert alert-danger">
            {{session('role-deleted')}}
        </div>
    @endif

        <div class="row">
           
            <div class="col-sm-3">
                <form action="{{route('roles.store')}} " method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name')
                        is-invalid
                    @enderror">
                        <div>
                            @error('name')
                                <span>
                                    <strong>
                                        {{$message}}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Create</button>
                </form>
            </div>

            <div class="col-sm-9">
                <div class="container-fluid">
                
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Roles</h6>
                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Name</th>
                                      <th>Slug</th>
                                      <th>Delete</th>
                                      {{-- <th>Created at</th>
                                      <th>Updated at</th> --}}
                                      {{-- <th>Updated at</th>
                                      <th>Delete</th> --}}
                                      {{-- <th>Salary</th> --}}
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Delete</th>
                                        {{-- <th>Created at</th>
                                        <th>Updated at</th> --}}
                                      {{-- <th>Salary</th> --}}
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                      <td>
                                        {{$role->id}}
                                      </td>
                                      <td>
                                          <a href="{{route('role.edit', $role->id)}} ">
                                        {{$role->name}}
                                    </a>
                                      </td>
                                      {{-- <td>
                                        <a href="{{route('post.edit', post->id)}} ">
                                        {{post->title}}
                                      </a>
                                      </td> --}}
                                      <td>
                                        {{$role->slug}}
                                      </td>
                                      <td>
                                          <form method="post" action="{{route('role.destroy', $role->id)}} " >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
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
        
    @endsection
</x-admin-master>