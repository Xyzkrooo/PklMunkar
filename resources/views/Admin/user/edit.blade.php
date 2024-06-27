    @extends('layouts.admin')
    @section('content')
        <div class="p-3">
            <div class="card ">
                <div class="card-body p-4">
                    <form action="{{ route('user.update', $users->id) }}" method="POST">
                        @csrf
                        @method('put') 
                        <div class="row mb-3">
                            <label for="input42" class="col-sm-3 col-form-label">Enter Your Name</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="input42" name="name" placeholder="Enter Your Name" value="{{$users->name}}">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">person_outline</i></span>
                                    @error('name')  
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input43" class="col-sm-3 col-form-label">Email Address</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        id="input43" name="email" placeholder="Email" value="{{$users->email}}">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">email</i></span>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input44" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="input44" name="password" placeholder="password">
                                    <span class="input-group-text"><i
                                            class="material-icons-outlined fs-5">vpn_key</i></span>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="input39" class="col-sm-3 col-form-label">Select Country</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="input39" name="isAdmin">
                                    <option selected="">Admin</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <a href="{{ route('user.index') }}" class="btn btn-grd-primary px-4">Kembali</a>
                                    <button type="submit" class="btn btn-grd-primary px-4">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
