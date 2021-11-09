<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div wire:click.prevent="addNew" class="d-flex justify-content-end mb-2">
                        <button class="btn btn-primary">
                            <i class="fa fa-plus-circle mr-1"></i>Add New User
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $users as $user )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="">
                                                <i class="fa fa-edit  mr-2"></i>
                                            </a>
                                            <a href="">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <!-- /.modal -->
    <div class="modal fade" id="form" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <form wire:submit.prevent='createUser'>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" wire:model.defer='user.name' class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter full name">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" wire:model.defer='user.email' class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email">
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" wire:model.defer='user.password' class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror

                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Comfirm Password</label>
                                <input type="password" wire:model.defer='user.password_confirmation' class="form-control" id="password_confirmation"
                                    placeholder="Enter password again">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
