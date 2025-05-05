@extends('layouts.admin')

@section('content')



    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Events</h3>
                                <div class="nk-block-des text-soft">

                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">

                                            <li><a href="#" data-toggle="modal" data-target="#addEventPopup"
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
                                            <th>Event Title Code</th>
                                            <th>Category</th>
                                            <th>Start Date</th>
                                            <th>Start Time</th>
                                            <th>End Date</th>
                                            <th>End Time</th>
                                            <th>Status</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $event)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td>{{ $event->event_title_code }}</td>
                                                <td>{{ $event->category_name }}</td>

                                                <td>{{ $event->start_date }}</td>
                                                <td>{{ $event->start_time }}</td>
                                                <td>{{ $event->end_date }}</td>
                                                <td>{{ $event->end_time }}</td>
                                                <td>

                                                    @if ($event->status == 0)
                                                        <span class="tb-status text-danger">Inactive</span>
                                                    @endif
                                                    @if ($event->status == 1)
                                                        <span class="tb-status text-fmdq_Green">Active</span>
                                                    @endif
                                                </td>



                                                <td>






                                                    <span class="badge fmdq_Gold" data-toggle="modal"
                                                        data-target="#editUser-{{ $event->id }}">Edit</span>

                                                    <span class="badge fmdq_Blue" data-toggle="modal"
                                                        data-target="#deleteUser-{{ $event->id }}">Delete</span>

                                                    <span class="badge fmdq_Green" data-toggle="modal"
                                                        data-target="#changeStatus-{{ $event->id }}">Change
                                                        Status</span>





                                                </td>
                                            </tr>
                                            <!-- @@ Lead Add Modal @e -->
                                            <div class="modal fade" role="dialog" id="editUser-{{ $event->id }}">
                                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{ $event->event_title_code }}</h5>
                                                            <a href="#" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <em class="icon ni ni-cross"></em>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST"
                                                                action="{{ route('editEvent', $event->id) }}"
                                                                class="form-validate is-alter"
                                                                enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="row gx-4 gy-3">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="event-title">Event Title Code</label>
                                                                            <div class="form-control-wrap">
                                                                                <input type="text"
                                                                                    name="event_title_code"
                                                                                    class="form-control" id="event-title"
                                                                                    required
                                                                                    value="{{ $event->event_title_code }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Start Date &
                                                                                Time</label>
                                                                            <div class="row gx-2">
                                                                                <div class="w-55">
                                                                                    <div class="form-control-wrap">
                                                                                        <div
                                                                                            class="form-icon form-icon-left">
                                                                                            <em
                                                                                                class="icon ni ni-calendar"></em>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            id="event-start-date"
                                                                                            class="form-control date-picker"
                                                                                            name="start_date"
                                                                                            data-date-format="yyyy-mm-dd"
                                                                                            required
                                                                                            value="{{ $event->start_date }}">



                                                                                    </div>
                                                                                </div>
                                                                                <div class="w-45">
                                                                                    <div class="form-control-wrap">
                                                                                        <div
                                                                                            class="form-icon form-icon-left">
                                                                                            <em
                                                                                                class="icon ni ni-clock"></em>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            id="event-start-time"
                                                                                            name="start_time"
                                                                                            data-time-format="HH:mm:ss"
                                                                                            class="form-control time-picker"
                                                                                            required
                                                                                            value="{{ $event->start_time }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">End Date &
                                                                                Time</label>
                                                                            <div class="row gx-2">
                                                                                <div class="w-55">
                                                                                    <div class="form-control-wrap">
                                                                                        <div
                                                                                            class="form-icon form-icon-left">
                                                                                            <em
                                                                                                class="icon ni ni-calendar"></em>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            id="event-end-date"
                                                                                            class="form-control date-picker"
                                                                                            name="end_date"
                                                                                            data-date-format="yyyy-mm-dd"
                                                                                            required
                                                                                            value="{{ $event->end_date }}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="w-45">
                                                                                    <div class="form-control-wrap">
                                                                                        <div
                                                                                            class="form-icon form-icon-left">
                                                                                            <em
                                                                                                class="icon ni ni-clock"></em>
                                                                                        </div>
                                                                                        <input type="text"
                                                                                            id="event-end-time"
                                                                                            name="end_time"
                                                                                            data-time-format="HH:mm:ss"
                                                                                            class="form-control time-picker"
                                                                                            required
                                                                                            value="{{ $event->end_time }}">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="event-description">Event
                                                                                Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control" name="event_description" id="event-description" required>{{ $event->event_description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Event
                                                                                Category</label>
                                                                            <div class="form-control-wrap">

                                                                                <select required name="category_id"
                                                                                    id="Category-dropdown-Edit-{{ $event->id }}"
                                                                                    class="form-control" required>

                                                                                    @foreach ($categories as $category)
                                                                                        <option
                                                                                            value="{{ $category->id }}"
                                                                                            @if ($category->id == $event->category_id) selected @endif>
                                                                                            {{ $category->name }}
                                                                                        </option>
                                                                                    @endforeach


                                                                                </select>

                                                                                <select hidden class="form-control"
                                                                                    name="category_name"
                                                                                    id="CategoryName-dropdown-Edit-{{ $event->id }}"
                                                                                    required>
                                                                                    <option
                                                                                        value="{{ $event->category_name }}">
                                                                                        {{ $event->category_name }}
                                                                                    </option>

                                                                                </select>

                                                                                <select hidden class="form-control"
                                                                                    name="category_color"
                                                                                    id="CategoryColor-dropdown-Edit-{{ $event->id }}"
                                                                                    required>
                                                                                    <option
                                                                                        value="{{ $event->category_color }}">
                                                                                        {{ $event->category_color }}
                                                                                    </option>

                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Venue</label>
                                                                            <div class="form-control-wrap">

                                                                                <input type="text"
                                                                                    value="{{ $event->venue }}"
                                                                                    name="venue" class="form-control"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>






                                                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Issuer</label>
                                                                            <div class="form-control-wrap">

                                                                                <input type="text"
                                                                                    value="{{ $event->issuer }}"
                                                                                    name="issuer" class="form-control"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="">Issue
                                                                                Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control" name="issuer_description" id="issuer_description" required>{{ $event->issuer_description }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>




                                                                    <div class="col-12">
                                                                        <center>
                                                                            <img src="{{ asset($event->event_image) }}"
                                                                                height="170px" width="170px" />
                                                                        </center>

                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="customFileLabel">Event Picture</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="custom-file">
                                                                                    <input name="event_image"
                                                                                        type="file"
                                                                                        class="custom-file-input"
                                                                                        id="customFile" required>
                                                                                    <label class="custom-file-label"
                                                                                        for="customFile">Choose
                                                                                        file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <ul
                                                                            class="d-flex justify-content-between gx-4 mt-1">
                                                                            <li>
                                                                                <button type="submit"
                                                                                    class="btn fmdq_Gold">Update
                                                                                    Event</button>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div><!-- .modal-dialog -->
                                                <script>
                                                    $('#Category-dropdown-Edit-{{ $event->id }}').on('change', function() {

                                                        var idCategory = this.value;
                                                        console.log(idCategory);
                                                        $("#CategoryName-dropdown-Edit-{{ $event->id }}").html('');
                                                        $.ajax({
                                                            url: "{{ url('fetch-category') }}",
                                                            type: "POST",
                                                            data: {
                                                                category_id: idCategory,
                                                                _token: '{{ csrf_token() }}'
                                                            },
                                                            dataType: 'json',
                                                            success: function(result) {
                                                                $('#CategoryName-dropdown-Edit-{{ $event->id }}').html();
                                                                $.each(result, function(key, value) {
                                                                    $("#CategoryName-dropdown-Edit-{{ $event->id }}").append(
                                                                        '<option value="' +
                                                                        value
                                                                        .name + '">' + value.name + '</option>');
                                                                });

                                                            }
                                                        });
                                                    });

                                                    /*------------------------------------------
                                                    --------------------------------------------
                                                    State Dropdown Change Event
                                                    --------------------------------------------
                                                    --------------------------------------------*/
                                                    $('#Category-dropdown-Edit-{{ $event->id }}').on('change', function() {
                                                        var idColor = this.value;
                                                        $("#CategoryColor-dropdown-Edit-{{ $event->id }}").html('');
                                                        $.ajax({
                                                            url: "{{ url('fetch-color') }}",
                                                            type: "POST",
                                                            data: {
                                                                category_id: idColor,
                                                                _token: '{{ csrf_token() }}'
                                                            },
                                                            dataType: 'json',
                                                            success: function(res) {
                                                                $('#CategoryColor-dropdown-Edit-{{ $event->id }}').html(
                                                                    '');
                                                                $.each(res, function(key, value) {
                                                                    $("#CategoryColor-dropdown-Edit-{{ $event->id }}").append(
                                                                        '<option value="' +
                                                                        value
                                                                        .color + '">' + value.color + '</option>');
                                                                });
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>







                                            <div class="modal fade" role="dialog"
                                                id="changeStatus-{{ $event->id }}">
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
                                                                action="{{ route('statusEvent', $event->id) }}"
                                                                class="form-validate is-alter"
                                                                enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="row gx-4 gy-3">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label"
                                                                                for="event-title">Select Status</label>
                                                                            <div class="form-control-wrap">
                                                                                <select class="form-control"
                                                                                    name="status">
                                                                                    <option value="1"
                                                                                        {{ $event->status == 1 ? 'selected' : '' }}>
                                                                                        Active</option>
                                                                                    <option value="0"
                                                                                        {{ $event->status == 0 ? 'selected' : '' }}>
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
    @foreach ($data as $key => $event)
        <div class="modal fade" id="deleteUser-{{ $event->id }}" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{ $event->name }}
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
                        <form method="POST" action=" {{ route('deleteEvent', $event->id) }}">
                            @csrf
                            <button type="submit" id="deleteOrg" class="btn text-white fmdq_Gold">Yes, Delete
                                it</button>
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

















    <div class="modal fade" id="addEventPopup">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Events</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('addEvent') }}" class="form-validate is-alter"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-title">Event Title Code</label>
                                    <div class="form-control-wrap">
                                        <input type="text" name="event_title_code" class="form-control"
                                            id="event-title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Start Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="date" name="start_date" class="form-control"
                                                    id="datePicker" min="<?php echo date('Y-m-d'); ?>" required />



                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-start-time" name="start_time"
                                                    data-time-format="HH:mm:ss" class="form-control time-picker" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="date" name="end_date" class="form-control"
                                                    id="datePicker" min="<?php echo date('Y-m-d'); ?>" required />
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="event-end-time" name="end_time"
                                                    data-time-format="HH:mm:ss" class="form-control time-picker" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="event-description">Event Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="event_description" id="event-description" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Event Category</label>
                                    <div class="form-control-wrap">

                                        <select required name="category_id" id="Category-dropdown" class="form-control">
                                            <option value="">-- Select Category --</option>
                                            @foreach ($categories as $data)
                                                <option value="{{ $data->id }}">
                                                    {{ $data->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <select hidden class="form-control" name="category_name"
                                            id="CategoryName-dropdown" required>
                                            <option value=""></option>

                                        </select>

                                        <select hidden class="form-control" name="category_color"
                                            id="CategoryColor-dropdown" required>
                                            <option value=""></option>

                                        </select>
                                    </div>
                                </div>
                            </div>




                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Venue</label>
                                    <div class="form-control-wrap">

                                        <input type="text" name="venue" class="form-control" required>
                                    </div>
                                </div>
                            </div>






                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Issuer</label>
                                    <div class="form-control-wrap">

                                        <input type="text" name="issuer" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="">Issue Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" name="issuer_description" id="issuer_description" required></textarea>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="customFileLabel">Event Picture</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input required name="event_image" type="file" class="custom-file-input"
                                                id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button type="submit" class="btn-lg btn-primary">Submit</button>
                                    </li>
                                    {{-- <li>
                                        <button id="resetEvent" data-dismiss="modal"
                                            class="btn btn-danger btn-dim">Discard</button>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Event</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="#" id="editEventForm" class="form-validate is-alter">
                        <div class="row gx-4 gy-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit-event-title">Event Title</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="edit-event-title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">Start Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" id="edit-event-start-date"
                                                    class="form-control date-picker" data-date-format="yyyy-mm-dd"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="edit-event-start-time"
                                                    data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-label">End Date & Time</label>
                                    <div class="row gx-2">
                                        <div class="w-55">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-calendar"></em>
                                                </div>
                                                <input type="text" id="edit-event-end-date"
                                                    class="form-control date-picker" data-date-format="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="w-45">
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-left">
                                                    <em class="icon ni ni-clock"></em>
                                                </div>
                                                <input type="text" id="edit-event-end-time"
                                                    data-time-format="HH:mm:ss" class="form-control time-picker">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label" for="edit-event-description">Event Description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="edit-event-description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Event Category</label>
                                    <div class="form-control-wrap">
                                        <select id="edit-event-theme" class="select-calendar-theme form-control"
                                            data-search="on">
                                            <option value="event-primary">Company</option>
                                            <option value="event-success">Seminars </option>
                                            <option value="event-info">Conferences</option>
                                            <option value="event-warning">Meeting</option>
                                            <option value="event-danger">Business dinners</option>
                                            <option value="event-pink">Private</option>
                                            <option value="event-primary-dim">Auctions</option>
                                            <option value="event-success-dim">Networking events</option>
                                            <option value="event-info-dim">Product launches</option>
                                            <option value="event-warning-dim">Fundrising</option>
                                            <option value="event-danger-dim">Sponsored</option>
                                            <option value="event-pink-dim">Sports events</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <ul class="d-flex justify-content-between gx-4 mt-1">
                                    <li>
                                        <button id="updateEvent" type="submit" class="btn btn-primary">Update
                                            Event</button>
                                    </li>
                                    <li>
                                        <button data-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup"
                                            class="btn btn-danger btn-dim">Delete</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="previewEventPopup">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div id="preview-event-header" class="modal-header">
                    <h5 id="preview-event-title" class="modal-title">Placeholder Title</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="row gy-3 py-1">
                        <div class="col-sm-6">
                            <h6 class="overline-title">Start Time</h6>
                            <p id="preview-event-start"></p>
                        </div>
                        <div class="col-sm-6" id="preview-event-end-check">
                            <h6 class="overline-title">End Time</h6>
                            <p id="preview-event-end"></p>
                        </div>
                        <div class="col-sm-10" id="preview-event-description-check">
                            <h6 class="overline-title">Description</h6>
                            <p id="preview-event-description"></p>
                        </div>
                    </div>
                    <ul class="d-flex justify-content-between gx-4 mt-3">
                        <li>
                            <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                                class="btn btn-primary">Edit Event</button>
                        </li>
                        <li>
                            <button data-dismiss="modal" data-toggle="modal" data-target="#deleteEventPopup"
                                class="btn btn-danger btn-dim">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteEventPopup">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal py-4">
                        <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                        <h4 class="nk-modal-title">Are You Sure ?</h4>
                        <div class="nk-modal-text mt-n2">
                            <p class="text-soft">This event data will be removed permanently.</p>
                        </div>
                        <ul class="d-flex justify-content-center gx-4 mt-4">
                            <li>
                                <button data-dismiss="modal" id="deleteEvent" class="btn btn-success">Yes, Delete
                                    it</button>
                            </li>
                            <li>
                                <button data-dismiss="modal" data-toggle="modal" data-target="#editEventPopup"
                                    class="btn btn-danger btn-dim">Cancel</button>
                            </li>
                        </ul>
                    </div>
                </div><!-- .modal-body -->
            </div>
        </div>
    </div>








    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {








            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#Category-dropdown').on('change', function() {
                var idCategory = this.value;
                $("#CategoryName-dropdown").html('');
                $.ajax({
                    url: "{{ url('fetch-category') }}",
                    type: "POST",
                    data: {
                        category_id: idCategory,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#CategoryName-dropdown').html();
                        $.each(result, function(key, value) {
                            $("#CategoryName-dropdown").append('<option value="' + value
                                .name + '">' + value.name + '</option>');
                        });

                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#Category-dropdown').on('change', function() {
                var idColor = this.value;
                $("#CategoryColor-dropdown").html('');
                $.ajax({
                    url: "{{ url('fetch-color') }}",
                    type: "POST",
                    data: {
                        category_id: idColor,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        $('#CategoryColor-dropdown').html(
                            '');
                        $.each(res, function(key, value) {
                            $("#CategoryColor-dropdown").append('<option value="' +
                                value
                                .color + '">' + value.color + '</option>');
                        });
                    }
                });
            });










        });
    </script>




@endsection
