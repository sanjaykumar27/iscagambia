<!doctype html>
<html>

<head>
    <base href="/">
    <script src="dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Records</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/5/css/bootstrap.min.css" />
    <link rel="stylesheet" href="dmxAppConnect/dmxBootstrap5TableGenerator/dmxBootstrap5TableGenerator.css" />
    <script src="dmxAppConnect/dmxDataTraversal/dmxDataTraversal.js" defer=""></script>
    <script src="dmxAppConnect/dmxBootstrap5PagingGenerator/dmxBootstrap5PagingGenerator.js" defer=""></script>
    <script src="dmxAppConnect/dmxBootstrap5Navigation/dmxBootstrap5Navigation.js" defer=""></script>
    <script src="dmxAppConnect/dmxBrowser/dmxBrowser.js" defer=""></script>
    <script src="dmxAppConnect/dmxStateManagement/dmxStateManagement.js" defer=""></script>
    <script src="dmxAppConnect/dmxBootstrap5Modal/dmxBootstrap5Modal.js" defer=""></script>
    <link rel="stylesheet" href="dmxAppConnect/dmxDropzone/dmxDropzone.css" />
    <script src="dmxAppConnect/dmxDropzone/dmxDropzone.js" defer=""></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-VhBcF/php0Z/P5ZxlxaEx1GwqTQVIBu4G4giRWxTKOCjTxsPFETUDdVL5B6vYvOt" crossorigin="anonymous" />
    <script src="dmxAppConnect/dmxFormatter/dmxFormatter.js" defer></script>
    <link rel="stylesheet" href="dmxAppConnect/dmxNotifications/dmxNotifications.css" />
    <script src="dmxAppConnect/dmxNotifications/dmxNotifications.js" defer></script>
</head>

<body is="dmx-app" id="admin">
    <dmx-value id="varBookingID"></dmx-value>
    <dmx-notifications id="notif"></dmx-notifications>
    <dmx-serverconnect id="scSendTickets" url="dmxConnect/api/sendTickets.php" dmx-on:success="notif.success('Tickets Emailed!');scGetRecords.load()" noload></dmx-serverconnect>
    <dmx-serverconnect id="scChangeSeatApproval" url="dmxConnect/api/updateSeatStatus.php" noload dmx-on:success="scGetBookingDetails.load({booking_id: ddRecords.data.booking_id})"></dmx-serverconnect>
    <dmx-serverconnect id="scGetBookingDetails" url="dmxConnect/api/getBookingDetails.php" noload></dmx-serverconnect>

    <dmx-query-manager id="qm"></dmx-query-manager>
    <div is="dmx-browser" id="browser1"></div>
    <dmx-data-detail id="ddRecords" dmx-bind:data="scGetRecords.data.query.data" key="booking_id"></dmx-data-detail>
    <dmx-serverconnect id="scGetRecords" url="dmxConnect/api/getDinnerRequest.php" dmx-on:unauthorized="browser1.goto('login.php')" dmx-param:limit="10" dmx-param:offset="query.offset" dmx-param:sort="query.sort" dmx-param:dir="query.dir">
    </dmx-serverconnect>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-4 px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/images/logo.jpeg" class="img-fluid" style="height:50px"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="javascript:void(0)">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="javascript:void(0)" dmx-on:click="modalGallery.show()">Photo Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5 text-dark me-3" href="admin-gala-dinner.php" dmx-on:click="modalGallery.show()" internal>Gala Dinner Requests</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container-fluid my-5">
        <div class="card bg-light">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Email ID</th>
                                <th>Mobile</th>
                                <th>Payment Receipt</th>
                                <th>Plan Type</th>
                                <th>Request Date</th>
                                <th>Ticket Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="scGetRecords.data.query.data" id="tableRepeat1">
                            <tr>
                                <td dmx-text="booking_id"></td>
                                <td dmx-text="email"></td>
                                <td dmx-text="mobile"></td>
                                <td><a dmx-bind:href="payment_receipt" target="_blank">Show File</a></td>
                                <td>{{membership_type}}</td>
                                <td>{{created_on}}</td>
                                <td>{{ticked_emailed == 0 ? 'PENDING' : 'TICKET SENT'}}</td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBookingDetails" dmx-on:click="scGetBookingDetails.load({booking_id: booking_id});ddRecords.select(booking_id)">Seat Details</button>
                                    <button dmx-show="ticked_emailed == 0" class="btn ms-2 btn-dark" dmx-bind:disabled="scSendTickets.state.executing && varBookingID.value == booking_id" dmx-on:click="varBookingID.setValue(booking_id);scSendTickets.load({booking_id: booking_id})">Send Tickets <span dmx-show="scSendTickets.state.executing && varBookingID.value == booking_id" class="spinner-border spinner-border-sm ms-1" role="status"></span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="pagination" dmx-populate="scGetRecords.data.query" dmx-state="qm" dmx-offset="offset" dmx-generator="bs5paging">
                    <li class="page-item" dmx-class:disabled="scGetRecords.data.query.page.current == 1" aria-label="First">
                        <a href="javascript:void(0)" class="page-link" dmx-on:click="qm.set('offset',scGetRecords.data.query.page.offset.first)"><span aria-hidden="true">&lsaquo;&lsaquo;</span></a>
                    </li>
                    <li class="page-item" dmx-class:disabled="scGetRecords.data.query.page.current == 1" aria-label="Previous">
                        <a href="javascript:void(0)" class="page-link" dmx-on:click="qm.set('offset',scGetRecords.data.query.page.offset.prev)"><span aria-hidden="true">&lsaquo;</span></a>
                    </li>
                    <li class="page-item" dmx-class:active="title == scGetRecords.data.query.page.current" dmx-class:disabled="!active" dmx-repeat="scGetRecords.data.query.getServerConnectPagination(2,1,'...')">
                        <a href="javascript:void(0)" class="page-link" dmx-on:click="qm.set('offset',(page-1)*scGetRecords.data.query.limit)">{{title}}</a>
                    </li>
                    <li class="page-item" dmx-class:disabled="scGetRecords.data.query.page.current ==  scGetRecords.data.query.page.total" aria-label="Next">
                        <a href="javascript:void(0)" class="page-link" dmx-on:click="qm.set('offset',scGetRecords.data.query.page.offset.next)"><span aria-hidden="true">&rsaquo;</span></a>
                    </li>
                    <li class="page-item" dmx-class:disabled="scGetRecords.data.query.page.current ==  scGetRecords.data.query.page.total" aria-label="Last">
                        <a href="javascript:void(0)" class="page-link" dmx-on:click="qm.set('offset',scGetRecords.data.query.page.offset.last)"><span aria-hidden="true">&rsaquo;&rsaquo;</span></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBookingDetails" is="dmx-bs5-modal" tabindex="-1" dmx-on:hide-bs-modal="ddRecords.select('')">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Booking Details: {{ddRecords.data.booking_id}} - {{ddRecords.data.membership_type}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Member Name</th>
                                    <th>Meal Type</th>
                                    <th>Member Type</th>
                                    <th>Adult/Child</th>
                                    <th>Price</th>
                                    <th>Seat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="scGetBookingDetails.data.query" id="tableRepeatSeats" key="seat_id">
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td dmx-text="member_name"></td>
                                    <td dmx-text="meal_type"></td>
                                    <td>{{member_type}}</td>
                                    <td>{{seat_type}}</td>
                                    <td>{{price}}</td>
                                    <td>{{seat}}</td>
                                    <td>
                                        <span dmx-show="accept_reject != 'HOLD'">{{accept_reject == 'ACCEPT' ? 'APPROVED' : 'REJECTED'}}</span>
                                        <div class="d-flex" dmx-show="accept_reject == 'HOLD'">
                                            <button dmx-bind:disabled="scChangeSeatApproval.state.executing" class="me-2 btn btn-icon btn-success btn-sm"><i class="fas fa-check" dmx-on:click="scChangeSeatApproval.load({seat_id: seat_id, accept_reject: 'ACCEPT'})"></i> <span dmx-show="scChangeSeatApproval.state.executing" class="spinner-border spinner-border-sm ms-1" dmx-show:disabled="state.executing" role="status"></span></button>
                                            <button dmx-bind:disabled="scChangeSeatApproval.state.executing" class="btn btn-icon btn-danger btn-sm" dmx-on:click="scChangeSeatApproval.load({seat_id: seat_id, accept_reject: 'REJECTED'})"><i class="fas fa-times"></i><span dmx-show="scChangeSeatApproval.state.executing" class="spinner-border spinner-border-sm ms-1" dmx-show:disabled="state.executing" role="status"></span></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalGallery" is="dmx-bs5-modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" is="dmx-serverconnect-form" id="formGallery">
                        <input type="file" multiple="true" is="dmx-dropzone" name="file">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" dmx-on:click="formGallery.submit()">Upload </button>
                </div>
            </div>
        </div>
    </div>
    <script src="bootstrap/5/js/bootstrap.bundle.min.js"></script>
</body>

</html>