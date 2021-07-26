<!doctype html>
<html>

<head>
    <base href="/">
    <script src="dmxAppConnect/dmxAppConnect.js"></script>
    <meta charset="UTF-8">
    <title>Records</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
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
</head>

<body is="dmx-app" id="admin">

    <dmx-query-manager id="qm"></dmx-query-manager>
    <div is="dmx-browser" id="browser1"></div>
    <dmx-data-detail id="ddRecords"></dmx-data-detail>
    <dmx-serverconnect id="scGetRecords" url="dmxConnect/api/fetchData.php" dmx-on:unauthorized="browser1.goto('login.php')" dmx-param:limit="10" dmx-param:offset="query.offset" dmx-param:sort="query.sort" dmx-param:dir="query.dir">
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
                                <th>User</th>
                                <th>Payment reference</th>
                                <th>Email</th>
                                <th>Family name</th>
                                <th>First middle name</th>
                                <th>Principle number</th>
                                <th>Alternate number</th>
                                <th>Whatsapp number</th>
                                <th>Your address</th>
                                <th>Your organization</th>
                                <th>Resident permit</th>
                                <th>Passport</th>
                                <th>Payment reciept</th>
                                <th>Payment method</th>
                            </tr>
                        </thead>
                        <tbody is="dmx-repeat" dmx-generator="bs5table" dmx-bind:repeat="scGetRecords.data.query.data" id="tableRepeat1">
                            <tr>
                                <td dmx-text="user_id"></td>
                                <td dmx-text="payment_reference"></td>
                                <td dmx-text="email"></td>
                                <td dmx-text="family_name"></td>
                                <td dmx-text="first_middle_name"></td>
                                <td dmx-text="principle_number"></td>
                                <td dmx-text="alternate_number"></td>
                                <td dmx-text="whatsapp_number"></td>
                                <td dmx-text="your_address"></td>
                                <td dmx-text="your_organization"></td>
                                <td><a dmx-bind:href="resident_permit" target="_blank">Show File</a></td>
                                <td><a dmx-bind:href="passport" target="_blank">Show File</a></td>
                                <td><a dmx-bind:href="payment_reciept" target="_blank">Show File</a></td>
                                <td dmx-text="payment_method"></td>

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