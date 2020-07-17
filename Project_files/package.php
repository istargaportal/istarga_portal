<?php
  $page_name = "Package";
  include 'Header.php';
?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Package</h4>
                </div>
                <div class="card-body">
                  <form id="ajax">
                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label class="bmd-label-floating" style="margin-left:0%;">Package Name</label>
                        <input name="Package_Name" type="text" class="form-control" />
                      </div>
                      <div class="form-group col-md-4">
                        
                        <label for="Country" class="bmd-label-floating" style="margin-left: 4%; font-size: 13px;">Country</label>
                        <select style="margin-top: 1%;" class="browser-default custom-select" type="select" id="locality-dropdown" name="country_id" style="color:#202940;" required>
                          <option value="0">Choose Country</option>
                        </select>
                      </div>
                      
                    </div>
                    <div class="row justify-content-between">
                      <div class="form-group col-md-4">
                        <label for="Service Type" style="margin-left: 4%;">Service name</label>

                        <div class="multiple-select-dd">
                          <input type="text" placeholder="Search Services..." class="search-field">
                          <div class="selected">
                            Choose Services
                          </div>
                          <div class="select custom-scroll" >

                          </div>
                        </div>

                        <select style="margin-top:5%; opacity: 0; pointer-events: none;" id="document-name" class="browser-default custom-select" name="document-name" class="form-control" required multiple>
                          <option class='bg-secondary text-light' default not selected>Choose...</option>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                        <label class="bmd-label-floating">Price</label>
                        <input name="Price" type="number" class="form-control" placeholder="" min="0" />
                      </div>
                    </div>
                    <div class="row justify-content-between" style="margin-top: 1%;">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating" style="font-size: 13px;">Currency</label>
                          <select style="margin-top: 1%;" id="currency" name="currency" class="browser-default custom-select" required="">
                            <option value="0">Select Currency</option><option value="1">AFN</option><option value="2">EUR</option><option value="3">ALL</option><option value="4">DZD</option><option value="5">USD</option><option value="6">EUR</option><option value="7">AOA</option><option value="8">XCD</option><option value="9"></option><option value="10">XCD</option><option value="11">ARS</option><option value="12">AMD</option><option value="13">AWG</option><option value="14">AUD</option><option value="15">EUR</option><option value="16">AZN</option><option value="17">BSD</option><option value="18">BHD</option><option value="19">BDT</option><option value="20">BBD</option><option value="21">BYR</option><option value="22">EUR</option><option value="23">BZD</option><option value="24">XOF</option><option value="25">BMD</option><option value="26">BTN</option><option value="27">BOB</option><option value="28">BAM</option><option value="29">BWP</option><option value="30">NOK</option><option value="31">BRL</option><option value="32">USD</option><option value="33">BND</option><option value="34">BGN</option><option value="35">XOF</option><option value="36">BIF</option><option value="37">KHR</option><option value="38">XAF</option><option value="39">CAD</option><option value="40">CVE</option><option value="41">KYD</option><option value="42">XAF</option><option value="43">XAF</option><option value="44">CLP</option><option value="45">CNY</option><option value="46">AUD</option><option value="47">AUD</option><option value="48">COP</option><option value="49">KMF</option><option value="50">XAF</option><option value="51">CDF</option><option value="52">NZD</option><option value="53">CRC</option><option value="54">XOF</option><option value="55">HRK</option><option value="56">CUP</option><option value="57">EUR</option><option value="58">CZK</option><option value="59">DKK</option><option value="60">DJF</option><option value="61">XCD</option><option value="62">DOP</option><option value="63">USD</option><option value="64">USD</option><option value="65">EGP</option><option value="66">USD</option><option value="67">XAF</option><option value="68">ERN</option><option value="69">EUR</option><option value="70">ETB</option><option value="71">FKP</option><option value="72">DKK</option><option value="73">FJD</option><option value="74">EUR</option><option value="75">EUR</option><option value="76">EUR</option><option value="77">XPF</option><option value="78">EUR</option><option value="79">XAF</option><option value="80">GMD</option><option value="81">GEL</option><option value="82">EUR</option><option value="83">GHS</option><option value="84">GIP</option><option value="85">EUR</option><option value="86">DKK</option><option value="87">XCD</option><option value="88">EUR</option><option value="89">USD</option><option value="90">GTQ</option><option value="91">GBP</option><option value="92">GNF</option><option value="93">XOF</option><option value="94">GYD</option><option value="95">HTG</option><option value="96">AUD</option><option value="97">HNL</option><option value="98">HKD</option><option value="99">HUF</option><option value="100">ISK</option><option value="101">INR</option><option value="102">IDR</option><option value="103">IRR</option><option value="104">IQD</option><option value="105">EUR</option><option value="106">ILS</option><option value="107">EUR</option><option value="108">JMD</option><option value="109">JPY</option><option value="110">GBP</option><option value="111">JOD</option><option value="112">KZT</option><option value="113">KES</option><option value="114">AUD</option><option value="115">KPW</option><option value="116">KRW</option><option value="117">KWD</option><option value="118">KGS</option><option value="119">LAK</option><option value="120">EUR</option><option value="121">LBP</option><option value="122">LSL</option><option value="123">LRD</option><option value="124">LYD</option><option value="125">CHF</option><option value="126">LTL</option><option value="127">EUR</option><option value="128">MOP</option><option value="129">MKD</option><option value="130">MGA</option><option value="131">MWK</option><option value="132">MYR</option><option value="133">MVR</option><option value="134">XOF</option><option value="135">EUR</option><option value="136">GBP</option><option value="137">USD</option><option value="138">EUR</option><option value="139">MRO</option><option value="140">MUR</option><option value="141">EUR</option><option value="142">MXN</option><option value="143">USD</option><option value="144">MDL</option><option value="145">EUR</option><option value="146">MNT</option><option value="147">EUR</option><option value="148">XCD</option><option value="149">MAD</option><option value="150">MZN</option><option value="151">MMK</option><option value="152">NAD</option><option value="153">AUD</option><option value="154">NPR</option><option value="155"></option><option value="156">EUR</option><option value="157">XPF</option><option value="158">NZD</option><option value="159">NIO</option><option value="160">XOF</option><option value="161">NGN</option><option value="162">NZD</option><option value="163">AUD</option><option value="164">USD</option><option value="165">NOK</option><option value="166">OMR</option><option value="167">PKR</option><option value="168">USD</option><option value="169">ILS</option><option value="170">PAB</option><option value="171">PGK</option><option value="172">PYG</option><option value="173">PEN</option><option value="174">PHP</option><option value="175">NZD</option><option value="176">PLN</option><option value="177">EUR</option><option value="178">USD</option><option value="179">QAR</option><option value="180">EUR</option><option value="181">RON</option><option value="182">RUB</option><option value="183">RWF</option><option value="184">SHP</option><option value="185">XCD</option><option value="186">XCD</option><option value="187">EUR</option><option value="188">XCD</option><option value="189">EUR</option><option value="190">EUR</option><option value="191">WST</option><option value="192">EUR</option><option value="193">STD</option><option value="194">SAR</option><option value="195">XOF</option><option value="196">RSD</option><option value="197">SCR</option><option value="198">SLL</option><option value="199">SGD</option><option value="200">EUR</option><option value="201">EUR</option><option value="202">SBD</option><option value="203">SOS</option><option value="204">ZAR</option><option value="205">GBP</option><option value="206">SSP</option><option value="207">EUR</option><option value="208">LKR</option><option value="209">SDG</option><option value="210">SRD</option><option value="211">NOK</option><option value="212">SZL</option><option value="213">SEK</option><option value="214">CHF</option><option value="215">SYP</option><option value="216">TWD</option><option value="217">TJS</option><option value="218">TZS</option><option value="219">THB</option><option value="220">XOF</option><option value="221">NZD</option><option value="222">TOP</option><option value="223">TTD</option><option value="224">TND</option><option value="225">TRY</option><option value="226">TMT</option><option value="227">USD</option><option value="228">AUD</option><option value="229">UGX</option><option value="230">UAH</option><option value="231">AED</option><option value="232">GBP</option><option value="233">USD</option><option value="234">USD</option><option value="235">UYU</option><option value="236">UZS</option><option value="237">VUV</option><option value="238">EUR</option><option value="239">VEF</option><option value="240">VND</option><option value="241">USD</option><option value="242">USD</option><option value="243">XPF</option><option value="244">MAD</option><option value="245">YER</option><option value="246">ZMK</option><option value="247">ZWL</option></select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="form-group col-md-4 service-name-DD-wrapper">
                        <label for="Service Name" class="bmd-label-floating" style="margin-left: 4%; font-size: 13px;">Service
                          Name</label>
                        <select style="margin-top:5%" id="select_service_type" class="browser-default custom-select" name="select_service_type" class="form-control" required multiple>
                          <option class='bg-secondary text-light' default not selected>Choose...</option> 
                        </select>
                         <select class="browser-default custom-select service-name-dd" id="framework" name="framework[]"
                         multiple> 
                       <option value="Codeigniter">Codeigniter</option>
                          <option value="CakePHP">CakePHP</option>
                          <option value="Laravel">Laravel</option>
                          <option value="YII">YII</option>
                          <option value="Zend">Zend</option>
                          <option value="Symfony">Symfony</option>
                          <option value="Phalcon">Phalcon</option>
                          <option value="Slim">Slim</option> 
                       </select> -->
                    <div class="row justify-content-end" style="margin-right: 1%;">
                      <button type="submit" class="btn btn-primary mx-2">
                        Submit
                      </button>

                      <button type="button" class="btn btn-primary">
                        Reset
                      </button>
                    </div>
                  </form>
                </div>
                <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Package List</h4>
                </div>
                <div class="card-body">
                <table class="table table-hover" style="margin-top: 4%;" >
                   <thead class="text-primary" style="background-color: rgba(15, 13, 13, 0.856) !important;">
                        <th>
                          Sr no
                        </th>
                        <th>
                          Package Name
                        </th>
                        <th> 
                          Country
                        </th>
                        <th>
                          Service
                        </th>
                        <th>
                         Currency
                        </th>
                        <th>
                          Total Price
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td class="tablehead1">Address</td>
                          <td class="tablehead1">India</td>
                          <td class="tablehead1">Address Services</td>
                          <td class="tablehead1">Rupees</td>
                          <td class="tablehead1">5000</td>
                        </tr>            
                        <tr>
                          <td>2</td>
                          <td class="tablehead1">Education</td>
                          <td class="tablehead1">India</td>
                          <td class="tablehead1">Education Services</td>
                          <td class="tablehead1">Rupees</td>
                          <td class="tablehead1">7000</td>
                        </tr>
                      </tbody>
                    </table>                  
                 </div> 
               </div>
              <!--Table closed-->
              </div>
            </div>
          </div>
        </div>
      </div>

      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById("date");
        date.innerHTML = "&copy; " + x + date.innerHTML;
      </script>
    </div>
  </div>
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
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.0"></script>
  <script src="package2.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $(".sidebar");

        $sidebar_img_container = $sidebar.find(".sidebar-background");

        $full_page = $(".full-page");

        $sidebar_responsive = $("body > .navbar-collapse");

        window_width = $(window).width();

        $(".fixed-plugin a").click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass("switch-trigger")) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $(".fixed-plugin .active-color span").click(function() {
          $full_page_background = $(".full-page-background");

          $(this).siblings().removeClass("active");
          $(this).addClass("active");

          var new_color = $(this).data("color");

          if ($sidebar.length != 0) {
            $sidebar.attr("data-color", new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr("filter-color", new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr("data-color", new_color);
          }
        });

        $(".fixed-plugin .background-color .badge").click(function() {
          $(this).siblings().removeClass("active");
          $(this).addClass("active");

          var new_color = $(this).data("background-color");

          if ($sidebar.length != 0) {
            $sidebar.attr("data-background-color", new_color);
          }
        });

        $(".fixed-plugin .img-holder").click(function() {
          $full_page_background = $(".full-page-background");

          $(this).parent("li").siblings().removeClass("active");
          $(this).parent("li").addClass("active");

          var new_image = $(this).find("img").attr("src");

          if (
            $sidebar_img_container.length != 0 &&
            $(".switch-sidebar-image input:checked").length != 0
          ) {
            $sidebar_img_container.fadeOut("fast", function() {
              $sidebar_img_container.css(
                "background-image",
                'url("' + new_image + '")'
              );
              $sidebar_img_container.fadeIn("fast");
            });
          }

          if (
            $full_page_background.length != 0 &&
            $(".switch-sidebar-image input:checked").length != 0
          ) {
            var new_image_full_page = $(".fixed-plugin li.active .img-holder")
              .find("img")
              .data("src");

            $full_page_background.fadeOut("fast", function() {
              $full_page_background.css(
                "background-image",
                'url("' + new_image_full_page + '")'
              );
              $full_page_background.fadeIn("fast");
            });
          }

          if ($(".switch-sidebar-image input:checked").length == 0) {
            var new_image = $(".fixed-plugin li.active .img-holder")
              .find("img")
              .attr("src");
            var new_image_full_page = $(".fixed-plugin li.active .img-holder")
              .find("img")
              .data("src");

            $sidebar_img_container.css(
              "background-image",
              'url("' + new_image + '")'
            );
            $full_page_background.css(
              "background-image",
              'url("' + new_image_full_page + '")'
            );
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css(
              "background-image",
              'url("' + new_image + '")'
            );
          }
        });

        $(".switch-sidebar-image input").change(function() {
          $full_page_background = $(".full-page-background");

          $input = $(this);

          if ($input.is(":checked")) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn("fast");
              $sidebar.attr("data-image", "#");
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn("fast");
              $full_page.attr("data-image", "#");
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr("data-image");
              $sidebar_img_container.fadeOut("fast");
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr("data-image", "#");
              $full_page_background.fadeOut("fast");
            }

            background_image = false;
          }
        });

        $(".switch-sidebar-mini input").change(function() {
          $body = $("body");

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $("body").removeClass("sidebar-mini");
            md.misc.sidebar_mini_active = false;

            $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar();
          } else {
            $(".sidebar .sidebar-wrapper, .main-panel").perfectScrollbar(
              "destroy"
            );

            setTimeout(function() {
              $("body").addClass("sidebar-mini");

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event("resize"));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
      });
    });

    $("form").submit(function(event) {
      var formdata = $("form").serializeArray();
      console.log(formdata);
      var data = {};
      $(formdata).each(function(index, obj) {
        data[obj.name] = obj.value;
      });

      console.log(data);
      fetch('./API/package.php', {
        method: 'post',
        body: JSON.stringify(data)
      }).then(function(res) {
        console.log(res.text());
        formReset();
      }).catch(err => {
        //console.log(err);
        return err;
      })
      event.preventDefault();
    });
    $.ajax;
  </script>
</body>

</html>

<!-- <div class="btn-group show open" style="width: 400px;"><button type="button"
    class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="Select Service Name"
    style="width: 400px; overflow: hidden; text-overflow: ellipsis;" aria-expanded="true"><span
      class="multiselect-selected-text">Select Service Name</span> <b class="caret"></b></button>
  <ul class="multiselect-container dropdown-menu show" x-placement="top-start"
    style="position: absolute; top: -215px; left: 0px; will-change: top, left;">
    <li class="multiselect-item filter" value="0">
      <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input
          class="form-control multiselect-search" type="text" placeholder="Search"><span class="input-group-btn"><button
            class="btn btn-default multiselect-clear-filter" type="button"><i
              class="glyphicon glyphicon-remove-circle"></i></button></span></div>
    </li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Codeigniter"> Codeigniter</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="CakePHP"> CakePHP</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Laravel"> Laravel</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="YII"> YII</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Zend"> Zend</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Symfony"> Symfony</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Phalcon"> Phalcon</label></a></li>
    <li><a tabindex="0"><label class="checkbox"><input type="checkbox" value="Slim"> Slim</label></a></li>
  </ul>
</div> -->