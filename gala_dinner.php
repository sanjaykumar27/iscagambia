<!-- Wappler include head-page="index.php" appConnect="local" is="dmx-app" bootstrap5="local" jquery_slim_34="local" components="{dmxDropzone:{},dmxFormatter:{}}" fontawesome_5="cdn" -->
<dmx-serverconnect id="scGetBookedSeats" url="dmxConnect/api/getBookedSeats.php"></dmx-serverconnect>
<dmx-array id="arrGold"></dmx-array>
<dmx-array id="arrPlatinum"></dmx-array>
<dmx-array id="arrSilver"></dmx-array>
<style>
  .custom-circle .tick {
    width: 25px;
    height: 25px;
    background: transparent;
    position: absolute;
    border-radius: 50%;
    left: 50%;
    top: 50%;
    margin-left: -12px;
    margin-top: -12px;
    cursor: pointer
  }

  .tick:hover,
  .tick-square:hover {
    color: #55db9d !important;
    cursor: pointer
  }

  .text-success {
    color: #55db9d !important
  }

  .text-seat-booked {
    color: #c1baba;
  }

  .seat-disabled {
    color: #ccc;
    pointer-events: none;
  }
</style>
<div class="container rounded-3">
  <div class="card mt-4">
    <div class="bg-white border border-2 border-dark card-body rounded-3 shadow-lg">
      <div class="d-flex justify-content-center">
        <img src="assets/images/logo.jpeg" class="img-fluid" style="height:100px">
      </div>
      <p class="fs-3 text-center">Gala Dinner Registration form</p>
      <form action="dmxConnect/api/booking.php" type="post" class=" border-top" id="formRegisterDinner" is="dmx-serverconnect-form" method="post" dmx-on:success="notif.success('Dinner Registration Successful!');formRegisterDinner.reset()">
        <input type="hidden" name="platinum_seats" dmx-bind:value="arrPlatinum.items">
        <input type="hidden" name="gold_seats" dmx-bind:value="arrGold.items">
        <input type="hidden" name="silver_seats" dmx-bind:value="arrSilver.items">
        <p class="pt-2 text-center"><strong>Date: </strong> 29 October | <strong>Time: </strong>8 pm <strong>Venue: </strong> Jama Hall, Kairaba Hotel</p>

        <div class="row">
          <p class="mb-0 text-center mt-2 text-primary fw-bold text-uppercase">Booking Type</p>
          <div class="col d-flex justify-content-center">
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="plan_type" value="Platinum" id="radioPlatinum">
              <label class="form-check-label mb-0" for="radioPlatinum">
                Platinum
              </label>
            </div>
            <div class="form-check d-flex align-items-center mb-3 ms-4">
              <input class="form-check-input me-3" type="radio" name="plan_type" value="Gold" id="radioGold">
              <label class="form-check-label mb-0" for="radioGold">
                Gold
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
        <div class="row">
          <div class="col-12 w-100">
            <div class="card border-0">
              <label for="formFile" class="form-label w-100 text-center mt-2 ext-center text-primary fw-bold text-uppercase">Choose your seats (multiple selection)s<span class="text-danger">*</span></label>
              <!-- <div class="card mx-3 shadow-sm">
                <div class="card-body text-center py-4 bg-light">
                  STAGE
                </div>
              </div> -->
              <p class="text-center my-4 fs-4 fw-bolder" dmx-show="radioPlatinum.checked">PLATINUM</p>
              <div class="card-body  custom-circle position-relative" dmx-show="radioPlatinum.checked">
                <div class="d-flex justify-content-between" is="dmx-repeat" id="repeatPlatinum1" dmx-bind:repeat="6">
                  <dmx-value id="varIndexPlatinum1" dmx-bind:value="$index * 10"></dmx-value>
                  <div class="card border shadow-sm rounded-circle custom-circle ms-3 mt-3" style="width:80px;height:80px">
                    <div class="card-body" is="dmx-repeat" id="repeatPlatinum1Childs" dmx-bind:repeat="10">
                      <dmx-value id="varPlatinum1" dmx-bind:value="'P'+($index+varIndexPlatinum1.value+1)"></dmx-value>
                      <div class="tick" dmx-bind:style="transform: rotate({{$index * 360/10}}deg) translate(58px);" dmx-on:click="arrPlatinum.addUniq(varPlatinum1.value)"><i class="fas fa-chair fa-rotate-90" dmx-class:text-success="arrPlatinum.items.contains(varPlatinum1.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varPlatinum1.value)"></i></div>
                    </div>
                  </div>
                </div>
                <div class="d-flex mt-5 pt-2 justify-content-between" is="dmx-repeat" id="repeatPlatinum2" dmx-bind:repeat="6">
                  <dmx-value id="varIndexPlatinum2" dmx-bind:value="($index+6) * 10"></dmx-value>
                  <div class="card border shadow-sm rounded-circle custom-circle ms-3 mt-3" style="width:80px;height:80px">
                    <div class="card-body " is="dmx-repeat" id="repeatPlatinum2Childs" dmx-bind:repeat="10">
                      <dmx-value id="varPlatinum2" dmx-bind:value="'P'+($index+varIndexPlatinum2.value+1)"></dmx-value>
                      <div class="tick" dmx-bind:style="transform: rotate({{$index * 360/10}}deg) translate(58px);" dmx-on:click="arrPlatinum.addUniq(varPlatinum2.value)"><i class="fas fa-chair fa-rotate-90" dmx-class:text-success="arrPlatinum.items.contains(varPlatinum2.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varPlatinum2.value)"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body custom-circle position-relative">
                <p class="text-center mb-4 fs-4 fw-bolder" dmx-show="radioGold.checked">GOLD</p>
                <div is="dmx-repeat" class="d-flex justify-content-between" id="repeatGold1" dmx-bind:repeat="8" dmx-show="radioGold.checked">
                  <dmx-value id="varIndexGold1" dmx-bind:value="($index * 8)+$index"></dmx-value>
                  <div class="d-flex flex-column align-items-center">
                    <div class="col-auto d-flex">
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatGold1Childs1" dmx-bind:repeat="4">
                        <dmx-value id="varGold1" dmx-bind:value="'G'+($index+varIndexGold1.value+1)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrGold.addUniq(varGold1.value)" dmx-class:text-success="arrGold.items.contains(varGold1.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varGold1.value)"><i class="fas fa-chair fa-rotate-270"></i></div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="card my-2 mx-1 border shadow-sm w-100">
                          <div class="card-body bg-light" style="height: 90px"> </div>
                        </div>
                      </div>
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatGold1Childs2" dmx-bind:repeat="4">
                        <dmx-value id="varGold2" dmx-bind:value="'G'+(($index+varIndexGold1.value+1)+5)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrGold.addUniq(varGold2.value)" dmx-class:text-success="arrGold.items.contains(varGold2.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varGold2.value)"><i class="fas fa-chair fa-rotate-90"></i></div>
                      </div>
                    </div>
                    <dmx-value id="varGoldMiddle1" dmx-bind:value="'G'+(($index*9)+5)"></dmx-value>
                    <div class="tick-square" dmx-on:click="arrGold.addUniq(varGoldMiddle1.value)" dmx-class:text-success="arrGold.items.contains(varGoldMiddle1.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varGoldMiddle1.value)"><i class="fas fa-chair fa-rotate-180"></i></div>
                  </div>
                </div>
                <div is="dmx-repeat" class="d-flex mt-3 justify-content-between" id="repeatGold2" dmx-bind:repeat="8" dmx-show="radioGold.checked">
                  <dmx-value id="varIndexGold2" dmx-bind:value="($index+8) * 9"></dmx-value>
                  <div class="d-flex flex-column align-items-center">
                    <div class="col-auto d-flex">
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatGold2Childs1" dmx-bind:repeat="4">
                        <dmx-value id="varGold3" dmx-bind:value="'G'+($index+varIndexGold2.value+1)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrGold.addUniq(varGold3.value)" dmx-class:text-success="arrGold.items.contains(varGold3.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varGold3.value)"><i class="fas fa-chair fa-rotate-270"></i></div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="card my-2 mx-1 border shadow-sm w-100">
                          <div class="card-body bg-light" style="height: 90px"> </div>
                        </div>
                      </div>
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatGold2Childs2" dmx-bind:repeat="4">
                        <dmx-value id="varGold4" dmx-bind:value="'G'+(($index+varIndexGold2.value+1)+5)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrGold.addUniq(varGold4.value)" dmx-class:text-success="arrGold.items.contains(varGold4.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varGold4.value)"><i class="fas fa-chair fa-rotate-90"></i></div>
                      </div>
                    </div>
                    <dmx-value id="varGoldMiddle2" dmx-bind:value="'G'+((($index*9)+5)+72)"></dmx-value>
                    <div class="tick-square" dmx-on:click="arrGold.addUniq(varGoldMiddle2.value)" dmx-class:text-success="arrGold.items.contains(varGoldMiddle2.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varGoldMiddle2.value)"><i class="fas fa-chair fa-rotate-180"></i></div>
                  </div>
                </div>
                <p class="text-center mb-4 fs-4 fw-bolder" dmx-show="radioSilver.checked">SILVER</p>
                <div is="dmx-repeat" class=" d-flex justify-content-between" id="repeatSilver1" dmx-bind:repeat="8" dmx-show="radioSilver.checked">
                  <dmx-value id="varIndexSilver1" dmx-bind:value="($index * 18)+$index"></dmx-value>
                  <div class="d-flex flex-column align-items-center">
                    <div class="col-auto d-flex">
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSilver1Childs1" dmx-bind:repeat="9">
                        <dmx-value id="varSilver1" dmx-bind:value="'S'+($index+varIndexSilver1.value+1)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrSilver.addUniq(varSilver1.value)" dmx-class:text-success="arrSilver.items.contains(varSilver1.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varSilver1.value)"><i class="fas fa-chair fa-rotate-270"></i></div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="card my-2 mx-1 border shadow-sm w-100">
                          <div class="card-body bg-light" style="height: 200px"> </div>
                        </div>
                      </div>
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSilver1Childs2" dmx-bind:repeat="9">
                        <dmx-value id="varSilver2" dmx-bind:value="'S'+(($index+varIndexSilver1.value+1)+10)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrSilver.addUniq(varSilver2.value)" dmx-class:text-success="arrSilver.items.contains(varSilver2.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varSilver2.value)"><i class="fas fa-chair fa-rotate-90"></i></div>
                      </div>
                    </div>
                    <dmx-value id="varSilverMiddle1" dmx-bind:value="'S'+(($index*19)+10)"></dmx-value>
                    <div class="tick-square" dmx-on:click="arrSilver.addUniq(varSilverMiddle1.value)" dmx-class:text-success="arrSilver.items.contains(varSilverMiddle1.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varSilverMiddle1.value)"><i class="fas fa-chair fa-rotate-180"></i></div>
                  </div>
                </div>
                <div is="dmx-repeat" class="mt-3 d-flex justify-content-between" id="repeatSilver2" dmx-bind:repeat="8" dmx-show="radioSilver.checked">
                  <dmx-value id="varIndexSilver2" dmx-bind:value="($index + 8) * 19"></dmx-value>
                  <div class="d-flex flex-column align-items-center">
                    <div class="col-auto d-flex">
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSilver2Childs1" dmx-bind:repeat="9">
                        <dmx-value id="varSilver3" dmx-bind:value="'S'+($index+varIndexSilver2.value+1)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrSilver.addUniq(varSilver3.value)" dmx-class:text-success="arrSilver.items.contains(varSilver3.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varSilver3.value)"><i class="fas fa-chair fa-rotate-270"></i></div>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="card my-2 mx-1 border shadow-sm w-100">
                          <div class="card-body bg-light" style="height: 200px"> </div>
                        </div>
                      </div>
                      <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSilver2Childs2" dmx-bind:repeat="9">
                        <dmx-value id="varSilver4" dmx-bind:value="'S'+(($index+varIndexSilver2.value+1)+10)"></dmx-value>
                        <div class="px-1 tick-square" dmx-on:click="arrSilver.addUniq(varSilver4.value)" dmx-class:text-success="arrSilver.items.contains(varSilver4.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varSilver4.value)"><i class="fas fa-chair fa-rotate-90"></i></div>
                      </div>
                    </div>
                    <dmx-value id="varSilverMiddle2" dmx-bind:value="'S'+((($index*19)+10)+152)"></dmx-value>
                    <div class="tick-square" dmx-on:click="arrSilver.addUniq(varSilverMiddle2.value)" dmx-class:text-success="arrSilver.items.contains(varSilverMiddle2.value)" dmx-class:seat-disabled="scGetBookedSeats.data.qSeats[0].seat_booked.split(',').contains(varSilverMiddle2.value)"><i class="fas fa-chair fa-rotate-180"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card bg-light p-2">
          <p class="mb-2 fs-5">List all members name:</p>
          <div id="crPlatinum" is="dmx-if" dmx-bind:condition="radioPlatinum.checked">
            <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSeatsPlatinum" dmx-bind:repeat="arrPlatinum.items">
              <input type="hidden" dmx-bind:value="$value" dmx-bind:name="seats[{{$index}}][seat_name]">
              <div class="row mb-3">
                <div class="col-3">
                  <label for="">Member Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm" dmx-bind:name="seats[{{$index}}][name]" required>
                </div>
                <div class="col-auto d-flex border-end justify-content-center">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][meal_type]" value="Veg Gujrati" id="radioGujrati" dmx-bind:id="radioGujrati{{$index}}">
                    <label class="form-check-label mb-0" dmx-bind:for="radioGujrati{{$index}}">
                      Veg Gujrati
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][meal_type]" value="Regular Veg - Non Veg Meal" id="radioVegNonVeg" dmx-bind:id="radioVegNonVeg{{$index}}">
                    <label class="form-check-label mb-0" dmx-bind:for="radioVegNonVeg{{$index}}">
                      Regular Veg-Non Veg Meal
                    </label>
                  </div>
                </div>
                <div class="col-auto d-flex border-end justify-content-center">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][member_type]" value="Member" id="radioMember" dmx-bind:id="radioMember{{$index}}">
                    <label class="form-check-label mb-0" dmx-bind:for="radioMember{{$index}}">
                      Member
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][member_type]" value="Non Member" id="radioNonMember" dmx-bind:id="radioNonMember{{$index}}">
                    <label class="form-check-label mb-0" dmx-bind:for="radioNonMember{{$index}}">
                      Non Member
                    </label>
                  </div>
                </div>
                <div class="col-auto d-flex">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][seat_type]" value="Veg Gujrati" id="radioAdult" dmx-bind:id="radioAdult{{$index}}">
                    <label class="form-check-label mb-0" dmx-bind:for="radioAdult{{$index}}">
                      Adult
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][seat_type]" value="Regular Veg - Non Veg Meal" id="radioChild" dmx-bind:id="radioChild{{$index}}">
                    <label class="form-check-label mb-0" dmx-bind:for="radioChild{{$index}}">
                      Child
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="crGold" is="dmx-if" dmx-bind:condition="radioGold.checked">
            <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSeatsGold" dmx-bind:repeat="arrGold.items">
              <input type="hidden" dmx-bind:value="$value" dmx-bind:name="seats[{{$index}}][seat_name]">
              <div class="row mb-3">
                <div class="col-3">
                  <label for="">Member Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm" dmx-bind:name="seats[{{$index}}][name]" required>
                </div>
                <div class="col-auto d-flex border-end justify-content-center">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][meal_type]" value="Veg Gujrati" id="radioGujrati1">
                    <label class="form-check-label mb-0" for="radioGujrati1">
                      Veg Gujrati
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][meal_type]" value="Regular Veg - Non Veg Meal" id="radioVegNonVeg1">
                    <label class="form-check-label mb-0" for="radioVegNonVeg1">
                      Regular Veg-Non Veg Meal
                    </label>
                  </div>
                </div>
                <div class="col-auto d-flex border-end justify-content-center">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][member_type]" value="Member" id="radioMember1">
                    <label class="form-check-label mb-0" for="radioMember1">
                      Member
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][member_type]" value="Non Member" id="radioNonMember1">
                    <label class="form-check-label mb-0" for="radioNonMember1">
                      Non Member
                    </label>
                  </div>
                </div>
                <div class="col-auto d-flex">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][seat_type]" value="Veg Gujrati" id="radioAdult1">
                    <label class="form-check-label mb-0" for="radioAdult1">
                      Adult
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][seat_type]" value="Regular Veg - Non Veg Meal" id="radioChild1">
                    <label class="form-check-label mb-0" for="radioChild1">
                      Child
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="crSilver" is="dmx-if" dmx-bind:condition="radioSilver.checked">
            <div is="dmx-repeat" class="d-flex justify-content-between flex-column" id="repeatSeatsSilver" dmx-bind:repeat="arrSilver.items">
              <input type="hidden" dmx-bind:value="$value" dmx-bind:name="seats[{{$index}}][seat_name]">
              <div class="row mb-3">
                <div class="col-3">
                  <label for="">Member Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control form-control-sm" dmx-bind:name="seats[{{$index}}][name]" required>
                </div>
                <div class="col-auto d-flex border-end justify-content-center">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][meal_type]" value="Veg Gujrati" id="radioGujrati2">
                    <label class="form-check-label mb-0" for="radioGujrati2">
                      Veg Gujrati
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][meal_type]" value="Regular Veg - Non Veg Meal" id="radioVegNonVeg2">
                    <label class="form-check-label mb-0" for="radioVegNonVeg2">
                      Regular Veg-Non Veg Meal
                    </label>
                  </div>
                </div>
                <div class="col-auto d-flex border-end justify-content-center">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][member_type]" value="Member" id="radioMember2">
                    <label class="form-check-label mb-0" for="radioMember2">
                      Member
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][member_type]" value="Non Member" id="radioNonMember2">
                    <label class="form-check-label mb-0" for="radioNonMember2">
                      Non Member
                    </label>
                  </div>
                </div>
                <div class="col-auto d-flex">
                  <div class="form-check d-flex align-items-center mb-3">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][seat_type]" value="Veg Gujrati" id="radioAdult2">
                    <label class="form-check-label mb-0" for="radioAdult2">
                      Adult
                    </label>
                  </div>
                  <div class="form-check d-flex align-items-center mb-3 ms-4">
                    <input class="form-check-input me-3" type="radio" dmx-bind:name="seats[{{$index}}][seat_type]" value="Regular Veg - Non Veg Meal" id="radioChild2">
                    <label class="form-check-label mb-0" for="radioChild2">
                      Child
                    </label>
                  </div>
                </div>
              </div>
            </div>
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

        </div>
        <div class="row justify-content-center">
          <div class="col-12 col-md-6">
            <label for="formFile" class="form-label w-100 text-center mt-4 ext-center text-primary fw-bold text-uppercase">Upload Payment Receipt <span class="text-danger">*</span></label>
            <input class="form-control" type="file" name="payment_receipt" id="payment_receipt" is="dmx-dropzone">
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