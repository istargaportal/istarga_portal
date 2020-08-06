<?php
  $page_name = "Settings";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Mandatory Fields Manager</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">



                    <!--indian Address Verification-->
                    <div class="container-fluid hidediv" id="div1" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Indian Address Verification :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                            <p style="color: black;">DOB</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" name="DOB" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Father's Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration From</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration To</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Pin Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Phone Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Relation Of Respondent With the Candidate</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Educational Verification-->
                    <div class="container-fluid hidediv" id="div2" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Educational Verification :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">University</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">College</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Degree</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Specialization</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Register No</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">GPA/Marks Obtained</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Year Of Passing</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Graduate</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Start Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">End Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Conatct Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Contact No</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Pin Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Date Of Attendence</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Regular/Part Time</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Employment Verification-->
                    <div class="container-fluid hidediv" id="div3" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Employment Verification :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Employee Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Employee ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Current Employment</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Contact Current Employer</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Employment Duration From</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Employment Duration To</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Last Designation</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reason For Leaving</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Last Drawn Salary</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Pin Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Reporting Manager Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reporting Manager Contact NO</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Reporting Manager Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">HR Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Reporting Manager Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">HR Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">HR Contact Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">HR Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Can We Ignore This Employee For Verification</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Are You Still Working With This Employer</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Is It Contractual Employment</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Remark</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Eligible For Hire</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">EXIT COMPLETED</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Global Database Check-->
                    <div class="container-fluid hidediv" id="div4" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Global Database Check :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Dob</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Father's Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Indian Id Check-->
                    <div class="container-fluid hidediv" id="div5" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Indian Id Check :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Dob</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Name Of The ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">ID Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Indian MRV Check-->
                    <div class="container-fluid hidediv" id="div6" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Indian MRV Check :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Dob</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Driving License Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">License Issued Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Expiration Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">License Status</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Conviction And Discharge</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Indian Credit Check-->
                    <div class="container-fluid hidediv" id="div7" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Indian Credit Check :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Financial Check</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">DOB</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Remarks</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Mother's Maiden Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Civil Litigation-->
                    <div class="container-fluid hidediv" id="div8" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Civil Litigation :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Dob</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Father's Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Mother's Maiden Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration From</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration To</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Criminal Court-->
                    <div class="container-fluid hidediv" id="div9" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Criminal/Criminal Court :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Dob</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Father's Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Mother's Maiden Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration From</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Stay Duration To</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--DirectorShip-->
                    <div class="container-fluid hidediv" id="div10" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            DirectorShip :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Dob</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Company Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Company Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Directorship No</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Date Appointed</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">date Resigned</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Drug Test-->
                    <div class="container-fluid hidediv" id="div11" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Drug Test :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Location</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Contact Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Financial Service Authority-->
                    <div class="container-fluid hidediv" id="div12" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Financial Service Authority :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Location</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">LOB</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">FSA Registration Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">License Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Company Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Indian Gap Analysis-->
                    <div class="container-fluid hidediv" id="div13" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Indian Gap Analysis :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Was There Gap Between Educational Qualification</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">From Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">To Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reason</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Was There Gap Between Employment</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">From Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">To Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reason</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Was There Gap Between Education and Employment</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">From Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">To Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reason</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>



                    <!--National Criminal Record Locator-->
                    <div class="container-fluid hidediv" id="div14" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            National Criminal Record Locator :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Location</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">DOB</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">SSN</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <!--Open Media-->
                    <div class="container-fluid hidediv" id="div15" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Open Media :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">DOB</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Father's Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Contact Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Professional License-->
                    <div class="container-fluid hidediv" id="div16" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Professional License :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Location</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Governing Board/Licensing Body</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">License Type</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">License/Registration Number</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Original Issuance Date</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Date Of Expiration</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Diciplinary Action</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">City</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">State</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Country</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Zip Code</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Reference Check-->
                    <div class="container-fluid hidediv" id="div17" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            Reference Check :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Location</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reference Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Employer Name</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Employment Duration</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Candidate Designation</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Reference/Supervisor's Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Relationship Status</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Duties And Responsibilities</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Strength And Achievement</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Area Of Improvement</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Communication Skill Rating</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Job Performance Rating</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--SSN-->
                    <div class="container-fluid hidediv" id="div18" style="margin-top: 2%;">
                      <div class="row" style="margin-top: 0%;  margin-bottom: 2%;">
                        <div class="col-md-6">
                          <h4 style="margin-bottom: 0; padding-bottom: 0; font-weight: bold;" class="icon">
                            SSN :</h4>
                        </div>
                      </div>
                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Location</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">SSN</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Year Of Issue</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-5">
                              <p style="color: black;">Address</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row ">
                        <div class="col-md-6">
                          <div class="row ">
                            <div class="col-md-5">
                              <p style="color: black;">Email ID</p>
                            </div>
                            <div class="col-md-1">
                              <div class="form-check">
                                <label class="form-check-label" style="margin-bottom:14px !important;">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row" style="margin-left:0%;margin-top:2%;">
                      <div class="col-md-10">
                        <div class="form-group" style="padding-bottom: 0%;">
                          <!-- <label class="bmd-label-floating" style="font-size: 14px;">Selected Service</label> -->
                          <select style="margin-top: 2%;" class="browser-default custom-select" type="select" id="dropdownMenu" name="locality-dropdown" onchange="getpackage(this.value)" style="color:#202940;" required>
                            <option value="op1">India Address Verification</option>
                            <option value="op2">Educational Verification</option>
                            <option value="op3">Emploment Verification</option>
                            <option value="op4">Global Database Check</option>
                            <option value="op5">Indian ID Check</option>
                            <option value="op6">Indian MRV Check</option>
                            <option value="op7">Indian Credit Check</option>
                            <option value="op8">Civil Litigation</option>
                            <option value="op9">Criminal/Criminal Court</option>
                            <option value="op10">Directorship</option>
                            <option value="op11">Drug Test</option>
                            <option value="op12">Financial Service Authority</option>
                            <option value="op13">Indian Gap Analysis</option>
                            <option value="op14">National Crime Record Locator</option>
                            <option value="op15">Open Media</option>
                            <option value="op16">Professional License</option>
                            <option value="op17">Reference Check</option>
                            <option value="op18">SSN</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <script>
        $(document).ready(function() {
          $("#dropdownMenu").change(function() {
            $(this).find("option:selected").each(function() {
              var optionValue = $(this).attr("value");
              if (optionValue === "op1") {
                $(".hidediv").hide();
                $("#div1").show()
              }

              if (optionValue === "op2") {
                $(".hidediv").hide();
                $("#div2").show();
              }

              if (optionValue === "op3") {
                $(".hidediv").hide();
                $("#div3").show();
              }

              if (optionValue === "op4") {
                $(".hidediv").hide();
                $("#div4").show();
              }

              if (optionValue === "op5") {
                $(".hidediv").hide();
                $("#div5").show();
              }

              if (optionValue === "op6") {
                $(".hidediv").hide();
                $("#div6").show();
              }

              if (optionValue === "op7") {
                $(".hidediv").hide();
                $("#div7").show();
              }

              if (optionValue === "op8") {
                $(".hidediv").hide();
                $("#div8").show();
              }

              if (optionValue === "op9") {
                $(".hidediv").hide();
                $("#div9").show();
              }

              if (optionValue === "op10") {
                $(".hidediv").hide();
                $("#div10").show();
              }

              if (optionValue === "op11") {
                $(".hidediv").hide();
                $("#div11").show();
              }

              if (optionValue === "op12") {
                $(".hidediv").hide();
                $("#div12").show();
              }

              if (optionValue === "op13") {
                $(".hidediv").hide();
                $("#div13").show();
              }

              if (optionValue === "op14") {
                $(".hidediv").hide();
                $("#div14").show();
              }

              if (optionValue === "op15") {
                $(".hidediv").hide();
                $("#div15").show();
              }

              if (optionValue === "op16") {
                $(".hidediv").hide();
                $("#div16").show();
              }

              if (optionValue === "op17") {
                $(".hidediv").hide();
                $("#div17").show();
              }

              if (optionValue === "op18") {
                $(".hidediv").hide();
                $("#div18").show();
              }

            });
          }).change();
        });
      </script>

      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById("date");
        date.innerHTML = "&copy; " + x + date.innerHTML;
      </script>
    </div>
  </div>
  <!--   Core JS Files   -->
  <!--mode changing-->
  <script>
    let darkmode = localStorage.getItem("darkmode");
    const darkmodetoggle = document.querySelector('input[name=theme]');

    const enabledarkmode = () => {
      document.documentElement.setAttribute('data-theme', 'dark')
      localStorage.setItem("darkmode", "enabled");
    }


    const disabledarkmode = () => {
      document.documentElement.setAttribute('data-theme', 'light')
      localStorage.setItem("darkmode", null);
    }


    if (darkmode === "enabled") {
      enabledarkmode();
    }


    darkmodetoggle.addEventListener("change", () => {
      darkmode = localStorage.getItem("darkmode");
      if (darkmode !== "enabled") {
        trans()
        enabledarkmode();
      } else {
        trans()
        disabledarkmode();
      }
    })

    let trans = () => {
      document.documentElement.classList.add('transition');
      window.setTimeout(() => {
        document.documentElement.classList.remove('transition');
      }, 1000)
    }
  </script>
  <!--mode change end-->
  <script src="settings1.js"></script>
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>

</body>

</html>