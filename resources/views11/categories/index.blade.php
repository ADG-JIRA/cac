@extends('layouts.admin')

@section('content')



    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Event Category</h3>
                                <div class="nk-block-des text-soft">

                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">

                                            <li><a href="#" data-toggle="modal" data-target="#addUser"
                                                    class="btn text-white fmdq_Gold"><em
                                                        class="icon ni ni-plus"></em><span>Add New</span></a></li>

                                        </ul>
                                    </div>
                                </div><!-- .toggle-wrap -->
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block nk-block-lg">
                        <div class="example-alert">
                            @if (\Session::has('success'))
                                <div class="alert alert-success alert-icon alert-dismissible">
                                    <em class="icon ni ni-check-circle"></em> <strong> {{ \Session::get('success') }}<button
                                            class="close" data-dismiss="alert"></button>
                                </div>
                            @endif


                            @if (count($errors) > 0)
                                <div>
                                    <div class="alert alert-danger alert-icon alert-dismissible">
                                        <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button class="close" data-dismiss="alert"></button>
                                    </div>
                            @endif



                        </div>

                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nowrap table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Category Name</th>
                                            <th>Color Code</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                            {{-- <th>Description</th> --}}


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $category)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->color == 'purple')
                                                        SUM
                                                    @elseif ($category->color == 'success')
                                                        REP
                                                    @elseif ($category->color == 'danger')
                                                        CPN
                                                    @elseif ($category->color == 'gold')
                                                        PGE
                                                    @elseif ($category->color == 'blue')
                                                        RGF
                                                    @else
                                                        {{ $category->color }}
                                                    @endif
                                                </td>
                                                m
                                                <td>
                                                    @if ($category->status == 0)
                                                        <span class="tb-status text-danger">Inactive</span>
                                                    @endif
                                                    @if ($category->status == 1)
                                                        <span class="tb-status text-fmdq_Green">Active</span>
                                                    @endif
                                                </td>
                                                <td>{{ $category->created_at }}</td>




                                                <td>

                                                    <span class="badge fmdq_Gold" data-toggle="modal"
                                                        data-target="#editUser-{{ $category->id }}">Edit</span>

                                                    <span class="badge fmdq_Blue" data-toggle="modal"
                                                        data-target="#deleteUser-{{ $category->id }}">Delete</span>

                                                    <span class="badge fmdq_Green" data-toggle="modal"
                                                        data-target="#changeStatus-{{ $category->id }}">Change
                                                        Status</span>




                                                </td>
                                            </tr>

                                            <div class="modal fade" role="dialog" id="changeStatus-{{ $category->id }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Change Status</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('statusCategory', $category->id) }}"
                                                                class="form-validate is-alter"
                                                                enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="row gx-4 gy-3">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="event-title">Select Status</label>
                                                                            <div class="form-control-wrap">
                                                                                <select class="form-control" name="status">
                                                                                    <option value="1"
                                                                                        {{ $category->status == 1 ? 'selected' : '' }}>
                                                                                        Active</option>
                                                                                    <option value="0"
                                                                                        {{ $category->status == 0 ? 'selected' : '' }}>
                                                                                        Inactive</option>
                                                                                </select>


                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-12">
                                                                        <ul
                                                                            class="d-flex justify-content-between gx-4 mt-1">
                                                                            <li>
                                                                                <button type="submit"
                                                                                    class="btn fmdq_Gold">
                                                                                    Submit</button>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .modal-dialog -->

                                            </div><!-- .modal -->
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block -->
                </div>
            </div>
        </div>
    </div>



























    <!-- DELETE MODAL -->
    @foreach ($data as $key => $category)
        <div class="modal fade" id="deleteUser-{{ $category->id }}" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{ $category->name }}
                        </h5>

                    </div>
                    <div class="modal-body modal-body-sm text-center">
                        <div class="nk-modal py-4">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                            <h4 class="nk-modal-title">Are You Sure ?</h4>
                            <div class="nk-modal-text mt-n2">
                                <p class="text-soft">This Data will be delete permanently.</p>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('deleteCategory', $category->id) }}">
                            @csrf
                            <button type="submit" id="deleteOrg" class="btn text-white fmdq_Gold">Yes, Delete it</button>
                        </form>
                        <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                            class="btn text-white fmdq_Blue">Cancel</button>


                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    @endforeach











    @foreach ($data as $category)
        <!-- @@ Lead Add Modal @e -->
        <div class="modal fade" role="dialog" id="editUser-{{ $category->id }}">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                    <div class="modal-body modal-body-md">
                        <h5 class="title">{{ $category->name }}</h5>
                        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PATCH']) !!}
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="infomation">
                                <div class="row gy-4">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="lead-name">Name <span
                                                    style="color: red;">*</span></label>
                                            <div class="form-control-wrap">

                                                <input value="{{ $category->name }}" name="name" type="text"
                                                    class="form-control" id="lead-name">
                                            </div>
                                        </div>
                                    </div>





                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="add-account">Colour <span
                                                    style="color: red;">*</span></label>
                                            <div class="form-control-wrap">




                                                <select required name="color" class="select-calendar-theme form-control"
                                                    data-search="on">
                                                    <!-- Dynamically set the selected option if it matches one of the values -->
                                                    <option value="purple"
                                                        {{ $category->color == 'purple' ? 'selected' : '' }}>SUM
                                                    </option>
                                                    <option value="success"
                                                        {{ $category->color == 'success' ? 'selected' : '' }}>REP
                                                    </option>
                                                    <option value="danger"
                                                        {{ $category->color == 'danger' ? 'selected' : '' }}>CPN
                                                    </option>
                                                    <option value="gold"
                                                        {{ $category->color == 'gold' ? 'selected' : '' }}>PGE
                                                    </option>
                                                    <option value="blue"
                                                        {{ $category->color == 'blue' ? 'selected' : '' }}>RGF
                                                    </option>
                                                </select>


                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-12">

                                        <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                            <li>
                                                <button type="submit" class="btn text-white fmdq_Gold">Submit</button>
                                            </li>
                                        </ul>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div><!-- .tab-pane -->

                        </div><!-- .tab-content -->
                        </form>
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div><!-- .modal -->
    @endforeach


    @foreach ($data as $category)
        <div class="modal fade" id="deleteUser-{{ $category->id }}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross"></em></a>
                    <div class="modal-body modal-body-sm text-center">
                        <div class="nk-modal py-4">
                            <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                            <h4 class="nk-modal-title">Are You Sure ?</h4>
                            <div class="nk-modal-text mt-n2">
                                <p class="text-soft">This will delete user details permanently.</p>
                            </div>
                            <ul class="d-flex justify-content-center gx-4 mt-4">
                                <li>
                                    <form enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <button type="submit" class="btn fmdq_Blue">Yes, Delete it</button>
                                    </form>
                                </li>
                                <li>

                                    <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                                        class="btn btn-danger btn-dim">Cancel</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .modal -->
    @endforeach


    <div class="modal fade" id="addUser">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add Event Category</h5>
                    <br>
                    {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <div class="row g-gs">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="add-account">Category Name <span
                                        style="color: red;">*</span></label>
                                <div class="form-control-wrap">

                                    <input type="text" name="name" class="form-control" id="add-account"
                                        placeholder="Name" required>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="add-account">Select Colour <span
                                        style="color: red;">*</span></label>
                                <div class="form-control-wrap">

                                    <select required name="color" class="select-calendar-theme form-control"
                                        data-search="on">
                                        <option value="">Select Colour</option>
                                        <option value="purple">SUM</option>
                                        <option value="success">REP </option>
                                        <option value="danger">CPN</option>
                                        <option value="gold">PGE</option>
                                        <option value="blue">RGF</option>
                                    </select>
                                </div>
                            </div>
                        </div>




                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class="btn text-white fmdq_Gold">Submit</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>



@endsection
