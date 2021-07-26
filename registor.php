<!-- Wappler include head-page="index.php" appConnect="local" is="dmx-app" bootstrap5="local" fontawesome_4="cdn" jquery_slim_34="local" -->
<div class="container p-3 p-md-4 p-xl-5 rounded-3">
    <div class="card mt-4">
        <div class="bg-white border border-2 border-dark card-body p-3 p-lg-5 p-md-5 rounded-3 shadow-lg">
            <div class="d-flex justify-content-center">
                <img src="assets/images/logo.jpeg" class="img-fluid" style="height:150px">
            </div>
            <p class="fs-1 text-center mt-5">ISCA Registration form</p>
            <p class="fs-4 text-center">Contact Email: <a href="mailto:register@iscagambia.com">register@iscagambia.com</a> </p>
            <form action="dmxConnect/api/create_form.php" type="post" class="mt-5 pt-5 border-top" id="submit_data" is="dmx-serverconnect-form" method="post" dmx-on:success="notif.success('Data captured succesfully');submit_data.reset()">
                <div class="row border-bottom pb-5 mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="" class="required">Payment Referene Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-light border border-secondary fs-3 fw-bold" name="payment_reference" data-msg-required="" required="">
                    </div>
                </div>
                <div class="row  mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="" class="required">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control " name="email" required>
                    </div>
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="" class="required">Family Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="family_name" required>
                    </div>
                </div>
                <div class="row mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">First & Middle Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_middle_name" required>
                    </div>
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">Principal Mobile Phone Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="principle_number" required>
                    </div>
                </div>
                <div class="row mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">Alternate Mobile Phone Number</label>
                        <input type="text" class="form-control" name="alternate_number" required>
                    </div>
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">Whatsapp Number <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="whatsapp_number" required>
                    </div>
                </div>
                <div class="row mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">Your address / Location <span class="text-danger">*</span></label>
                        <textarea name="your_address" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">Organization / Location <span class="text-danger">*</span></label>
                        <textarea name="your_organization" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <div class="form-check d-flex align-items-center mb-3">
                            <input class="form-check-input me-3" type="radio" name="membership_type" value="Individual" id="individual">
                            <label class="form-check-label mb-0" for="flexCheckDefault">
                                Individual - GMD 1,000/- (Single Vote)
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mb-3">
                            <input class="form-check-input me-3" type="radio" name="membership_type" value="Enterprise" id="enterprise">
                            <label class="form-check-label mb-0" for="flexCheckChecked">
                                Enterprise - GMD 5,000/- (2 Votes)
                            </label>
                        </div>
                        <div class="form-check d-flex align-items-center mb-3">
                            <input class="form-check-input me-3" type="radio" name="membership_type" value="Corporate" id="corporate">
                            <label class="form-check-label mb-0" for="flexCheckChecked">
                                Corporate - GMD 10,000 ( 4 Votes)
                            </label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
                        <label for="">Payment Method <span class="text-danger">*</span></label>
                        <select name="payment_method" class="form-select">
                            <option value="" selected>choose</option>
                            <option value="Bank Transfer / Payment Slip">Bank Transfer / Payment Slip</option>
                            <option value="Cash">Cash</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-lg-4 mt-md-4">
                    <div class="col-12 col-md-4 col-xl-4 mt-3 mt-md-0 mt-lg-0">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Your Current Residence Permit <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="resident_permit" id="resident_permit" is="dmx-dropzone">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4 mt-3 mt-md-0 mt-lg-0">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Your Passport Pages(FIrst and Last) <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="passport" id="passport" is="dmx-dropzone">
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4 mt-3 mt-md-0 mt-lg-0">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Your Payment Receipt here <span class="text-danger">*</span></label>
                            <input class="form-control" type="file" name="payment_reciept" id="payment_reciept" is="dmx-dropzone">
                        </div>
                    </div>
                </div>
                <div class="row mt-lg-4 mt-md-4">
                    <div class="col text-center">
                        <button class="px-5 fs-4 btn btn-primary btn-lg" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>