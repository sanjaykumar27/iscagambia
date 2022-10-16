<!-- Wappler include head-page="index.php" appConnect="local" is="dmx-app" bootstrap5="local" jquery_slim_34="local" components="{dmxDropzone:{}}" fontawesome_5="cdn" -->
<style>
  .custom-circle .tick {
    width: 21px;
    height: 21px;
    background: transparent;
    position: absolute;
    border-radius: 50%;
    left: 50%;
    top: 50%;
    margin-left: -10px;
    margin-top: -10px;
    cursor: pointer
  }
</style>
<div class="container rounded-3">
  <div class="card mt-4">
    <div class="bg-white border border-2 border-dark card-body rounded-3 shadow-lg">
      <div class="d-flex justify-content-center">
        <img src="assets/images/logo.jpeg" class="img-fluid" style="height:100px">
      </div>
      <p class="fs-3 text-center">Gala Dinner Registration form</p>
      <form action="dmxConnect/api/create_form.php" type="post" class=" border-top" id="formRegisterDinner" is="dmx-serverconnect-form" method="post" dmx-on:success="notif.success('Dinner Registration Successful!');formRegisterDinner.reset()">
        <p class="pt-2 text-center"><strong>Date: </strong> 29 October | <strong>Time: </strong>8 pm <strong>Venue: </strong> Jama Hall, Kairaba Hotel</p>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <div class="form-check d-flex align-items-center mb-3">
              <input class="form-check-input me-3" type="radio" name="member_type" value="Member" id="radioMember">
              <label class="form-check-label mb-0" for="radioMember">
                Member
              </label>
            </div>
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="member_type" value="Non Member" id="radioNonMember">
              <label class="form-check-label mb-0" for="radioNonMember">
                Non Member
              </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <div class="form-check d-flex align-items-center mb-3">
              <input class="form-check-input me-3" type="radio" name="seat_type" value="Table" id="radioTable">
              <label class="form-check-label mb-0" for="radioTable">
                Table
              </label>
            </div>
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="seat_type" value="Seat" id="radioSeat">
              <label class="form-check-label mb-0" for="radioSeat">
                Seat
              </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex justify-content-center">
            <div class="form-check d-flex align-items-center mb-3">
              <input class="form-check-input me-3" type="radio" name="plan_type" value="Gold" id="radioGold">
              <label class="form-check-label mb-0" for="radioGold">
                Gold
              </label>
            </div>
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="plan_type" value="Platinum" id="radioPlatinum">
              <label class="form-check-label mb-0" for="radioPlatinum">
                Platinum
              </label>
            </div>
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="plan_type" value="Silver" id="radioSilver">
              <label class="form-check-label mb-0" for="radioSilver">
                Silver
              </label>
            </div>
          </div>
        </div>
        <div class="row my-3">
          <div class="col-12 w-100">
            <div class="card border-0">
              <label for="formFile" class="form-label w-100 text-center mt-2 ext-center text-primary fw-bold text-uppercase">Choose your seats (multiple selection)s<span class="text-danger">*</span></label>
              <div class="card-body  custom-circle p-4 position-relative">
                <div class="d-flex justify-content-between" is="dmx-repeat" id="repeatTablesCircle1" dmx-bind:repeat="6">
                  <div class="card border shadow-sm rounded-circle custom-circle ms-3 mt-3" style="width:80px;height:80px">
                    <div class="card-body" is="dmx-repeat" id="repeatChilds1" dmx-bind:repeat="12">
                      <div class="tick" dmx-bind:style="transform: rotate({{$index * 360/12}}deg) translate(58px);"><i class="fas fa-chair fa-rotate-90"></i></div>
                    </div>
                  </div>
                </div>
                <div class="d-flex mt-5 justify-content-between" is="dmx-repeat" id="repeatTablesCircle2" dmx-bind:repeat="6">
                  <div class="card border shadow-sm rounded-circle custom-circle ms-3 mt-3" style="width:80px;height:80px">
                    <div class="card-body" is="dmx-repeat" id="repeatChilds2" dmx-bind:repeat="12">
                      <div class="tick" dmx-bind:style="transform: rotate({{$index * 360/12}}deg) translate(58px);"><i class="fas fa-chair fa-rotate-90"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body custom-circle p-4 position-relative">
                <div class="row mt-5" is="dmx-repeat" class="d-flex justify-content-between" id="repeatSquare" dmx-bind:repeat="8">
                  <div class="col-auto mb-4 me-3">
                    <div is="dmx-repeat" class="d-flex justify-content-between" id="repeatSquareTable1" dmx-bind:repeat="9">
                      <div class="px-1"><i class="fas fa-chair"></i></div>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="card my-2 me-2 border shadow-sm w-100">
                        <div class="card-body" style="height: 30px"> </div>
                      </div>
                      <div style="margin-right:-25px"><i class="fas fa-chair fa-rotate-90"></i></div>
                    </div>
                    <div is="dmx-repeat" class="d-flex justify-content-between" id="repeatSquareTable12" dmx-bind:repeat="9">
                      <div class="px-1"><i class="fas fa-chair fa-rotate-180"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <p class="mt-4 text-center text-primary fw-bold text-uppercase">Choose you meal type</p>
          <div class="col d-flex justify-content-center">
            <div class="form-check d-flex align-items-center mb-3">
              <input class="form-check-input me-3" type="radio" name="seat_type" value="Veg Gujrati" id="radioGujrati">
              <label class="form-check-label mb-0" for="radioGujrati">
                Veg Gujrati
              </label>
            </div>
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="seat_type" value="Regular Veg - Non Veg Meal" id="radioVegNonVeg">
              <label class="form-check-label mb-0" for="radioVegNonVeg">
                Regular Veg-Non Veg Meal
              </label>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            <label for="formFile" class="form-label w-100 text-center mt-4 ext-center text-primary fw-bold text-uppercase">Upload Payment Receipt <span class="text-danger">*</span></label>
            <input class="form-control" type="file" name="payment_receipt" id="payment_receipt" is="dmx-dropzone">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
            <label for="">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="first_name" required>
          </div>
          <div class="col-12 col-md-6 col-xl-6 mt-3 mt-md-0 mt-lg-0">
            <label for="">Last Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="last_name">
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-0 mt-lg-0">
            <label for="">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-0 mt-lg-0">
            <label for="">Mobile <span class="text-danger">*</span></label>
            <input type="number" class="form-control" name="mobile" required>
          </div>
          <div class="col-12 col-md-6 col-lg-4 mt-3 mt-md-0 mt-lg-0">
            <label for="">Person Type <span class="text-danger">*</span></label>
            <div class="d-flex ">
              <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input me-3" type="radio" name="seat_type" value="Veg Gujrati" id="radioAdult">
                <label class="form-check-label mb-0" for="radioAdult">
                  Adult
                </label>
              </div>
              <div class="form-check d-flex align-items-center mb-3 ms-4">
                <input class="form-check-input me-3" type="radio" name="seat_type" value="Regular Veg - Non Veg Meal" id="radioChild">
                <label class="form-check-label mb-0" for="radioChild">
                  Child
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-lg-4 mt-md-4">
          <div class="col text-center">
            <button class="px-5 btn btn-primary" dmx-bind:disabled="state.executing" type="submit">Submit <span dmx-show="scSetProductMenu.state.executing" class="spinner-border spinner-border-sm" dmx-show:disabled="state.executing" role="status"></span></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>