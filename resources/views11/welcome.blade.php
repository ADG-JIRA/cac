@extends('layouts.external')

@section('content')
    <section class="event-bg">
        <h1 style="color: white">Event Scheduler</h1>
    </section>
    <section>
        <div class="main-content">
            <div class="">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div id="calendar" class="nk-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </section>








    <div class="modal fade" id="previewEventPopup">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                <div id="preview-event-header" class="modal-header">
                    <h5 id="preview-event-title" class="modal-title">Placeholder Title</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>

                <div class="modal-body">
                    <center><img id="event-image" src="" height="400px" width="100%" alt="Event Image"
                            class="item-cnter" />
                    </center><br>
                    <div class="row gy-3 py-1">


                        <div class="col-sm-6">
                            <h6 class="overline-title">Start Date and Time</h6>
                            <p id="preview-event-start"></p>
                        </div>
                        <div class="col-sm-6" id="preview-event-end-check">
                            <h6 class="overline-title">End Date and Time</h6>
                            <p id="preview-event-end"></p>

                        </div>
                        <div class="col-sm-12" id="preview-event-description-check">
                            <h6 class="overline-title">Event Description</h6>
                            <p id="modalEventDescription"></p>
                        </div>
                    </div>

                    <div class="row gy-3 py-1">
                        <div class="col-sm-4" id="preview-event-end-check">
                            <h6 class="overline-title">Venue</h6>
                            <p id="preview-event-venue"></p>

                        </div>


                        <div class="col-sm-4" id="preview-event-end-check">
                            <h6 class="overline-title">Corporate Action</h6>
                            <p id="preview-event-category_name"></p>

                        </div>



                        <div class="col-sm-4" id="preview-event-end-check">
                            <h6 class="overline-title">Issuer</h6>
                            <p id="preview-event-issuer"></p>

                        </div>


                        <div class="col-sm-12" id="preview-event-end-check">
                            <h6 class="overline-title">Issuer Description</h6>
                            <p id="preview-event-issuerDescription"></p>

                        </div>
                    </div>

                    <ul class="d-flex justify-content-between gx-4 mt-3">
                        <li>
                            <a href="#" id="add-to-google-calendar" target="_blank" class="btn btn-secondary">Add
                                to Google Calendar</a>
                        </li>
                        <li>
                            <a href="#" id="add-to-outlook-calendar" target="_blank" class="btn btn-secondary">Add
                                to Outlook Calendar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
