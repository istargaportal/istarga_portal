<?php

$print_present_count = $print_absent_count = $print_sick_leave = $print_casual_leave = 0;

class Calendar {

    /**
    ** Constructor
    **/
    public function __construct() {
      $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
    /********************* PROPERTY ********************/
    private $dayLabels = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun");
    private $currentYear = 0;
    private $currentMonth = 0;
    private $currentDay = 0;
    private $currentDate = null;
    private $daysInMonth = 0;
    private $naviHref = null;
    /********************* PUBLIC **********************/
    /**
    ** Print out the calendar
    **/
    public function show() {


      $year = null;
      $month = null;
      if (null == $year && isset($_GET['year'])) {
        $year = htmlentities($_GET['year'], ENT_QUOTES);
      } elseif (null == $year) {
        $year = date("Y", time());
      }
      if ((!is_numeric($year)) || ($year == "")) {
        $year = date("Y", time());
      }
      if (null == $month && isset($_GET['month'])) {
        $month = htmlentities($_GET['month'], ENT_QUOTES);
      } elseif (null == $month) {
        $month = date("m", time());
      }
      if ((!is_numeric($month)) || ($month == "")) {
        $month = date("m", time());
      }
      $this->currentYear = $year;
      $this->currentMonth = $month;
      $this->daysInMonth = $this->_daysInMonth($month, $year);
      $content = '<div id="calendar">' . "\r\n" . '<div class="calendar_box">' . "\r\n" . $this->_createNavi() . "\r\n" . '</div>' . "\r\n" . '<div class="calendar_content">' . "\r\n" . '<div class="calendar_label">' . "\r\n" . $this->_createLabels() . '</div>' . "\r\n";
      $content .= '<div class="calendar_clear"></div>' . "\r\n";
      $content .= '<div class="calendar_dates">' . "\r\n";
      $weeksInMonth = $this->_weeksInMonth($month, $year);
      // Create weeks in a month
      for ($i = 0; $i < $weeksInMonth; $i++) {
        // Create days in a week
        for ($j = 1; $j <= 7; $j++) {
          $content .= $this->_showDay($i * 7 + $j);
        }
      }
      $content .= '</div>' . "\r\n";
      $content .= '<div class="calendar_clear"></div>' . "\r\n";
      $content .= '</div>' . "\r\n";
      $content .= '</div>' . "\r\n";
      return $content;
    }
    

    private function _showDay($cellNumber) {
      global $user_id;
      global $print_present_count;
      global $print_absent_count;
      global $print_sick_leave;
      global $print_casual_leave;

      require_once "../../config/config.php";

        $get_connection=new connectdb;
        $db=$get_connection->connect();

      if ($this->currentDay == 0) {
        $firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));
        if (intval($cellNumber) == intval($firstDayOfTheWeek)) {
          $this->currentDay = 1;
        }
      }
      if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {
        $this->currentDate = date('Y-m-d', strtotime($this->currentYear . '-' . $this->currentMonth . '-' . ($this->currentDay)));
        $cellContent = $this->currentDay;
        $this->currentDay++;
      } else {
        $this->currentDate = null;
        $cellContent = null;
      }
      $today_day = date("d");
      $today_mon = date("m");
      $today_yea = date("Y");      

      $class_day = ($cellContent == $today_day && $this->currentMonth == $today_mon && $this->currentYear == $today_yea ? "calendar_today today_color" : "calendar_days");

      $print_context_menu = "";

      $print_date = date('d, M Y', strtotime($this->currentYear.'-'.$this->currentMonth.'-'.$cellContent));
      $print_date_val = date('Y-m-d', strtotime($this->currentYear.'-'.$this->currentMonth.'-'.$cellContent));
      if($cellContent == $today_day && $this->currentMonth == $today_mon && $this->currentYear == $today_yea)
      {
        $print_context_menu = '
        <script type="text/javascript">
          $( "#day_'.$this->currentMonth.'_'.$cellContent.'" ).contextmenu(function() {
            $("#mark_attendance").css("display", "block");
            mark_attendance("'.$print_date_val.'");
            return false;
          });
        </script>';
      }
      else
      {
        $print_context_menu = '
        <script type="text/javascript">
          $( "#day_'.$this->currentMonth.'_'.$cellContent.'" ).contextmenu(function() {
            mark_attendance("'.$print_date_val.'");
            // alert("Please contact to Admin!");
            return false;
          });
        </script>';
      }

      if($cellContent != '' && strtotime(date('Y-m-d')) >= strtotime($print_date_val) )
      {
        $attendance_block = '<div class="notifier not_present_color"></div>';
      }
      else
      {
        $print_context_menu = "";
      }
      $check = "SELECT attendance_status FROM attendance_master WHERE attendancce_date = '$print_date_val' AND user_id ='$user_id'  ";
      $resul = mysqli_query($db,$check); 
      if ($row = mysqli_fetch_array($resul, MYSQLI_ASSOC))
      {
        if($row['attendance_status'] == "1")
        {
          $attendance_block = '<div class="notifier present_color"></div>';
          $print_present_count++;
        }
        if($row['attendance_status'] == "2")
        {
          $attendance_block = '<div class="notifier absent_color"></div>';
          $print_absent_count++;
        }
        if($row['attendance_status'] == "3")
        {
          $attendance_block = '<div class="notifier sick_leave_color"></div>';
          $print_sick_leave++;
        }
        if($row['attendance_status'] == "4")
        {
          $attendance_block = '<div class="notifier casual_leave_color"></div>';
          $print_casual_leave++;
        }
        if($row['attendance_status'] == "0")
        {
          $class_day = "half_attendance calendar_days";
        }      
      }

      $cellContent_com = $cellContent;
      if($cellContent_com == '12'){ $cellContent_com = '12'; }  if($cellContent_com == '11'){ $cellContent_com = '11'; }  if($cellContent_com == '10'){ $cellContent_com = '10'; }
      if($cellContent_com == '9'){ $cellContent_com = '09'; } if($cellContent_com == '8'){ $cellContent_com = '08'; }  if($cellContent_com == '7'){ $cellContent_com = '07'; } 
      if($cellContent_com == '6'){ $cellContent_com = '06'; } if($cellContent_com == '5'){ $cellContent_com = '05'; }  if($cellContent_com == '4'){ $cellContent_com = '04'; }
      if($cellContent_com == '3'){ $cellContent_com = '03'; } if($cellContent_com == '2'){ $cellContent_com = '02'; }  if($cellContent_com == '1'){ $cellContent_com = '01'; }

      $today_com = date('Y-m', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')).'-'.$cellContent_com;
      $count = "&nbsp;";

      $link_date = $cellContent.'-'.date('m-Y', strtotime($this->currentYear . '-' . $this->currentMonth . '-1'));

      return '<a id="day_'.$this->currentMonth.'_'.$cellContent.'" > <div class=" ' . $class_day . '"><div class="calendar_count">' . $cellContent . $count . '</div>'. @$attendance_block .'</div> </a>
      '.$print_context_menu.'
      ' . "\r\n";
    }

    private function _createNavi() {

      $nextMonth = $this->currentMonth == 12 ? 1 : intval($this->currentMonth)+1;
      $nextYear = $this->currentMonth == 12 ? intval($this->currentYear)+1 : $this->currentYear;
      $preMonth = $this->currentMonth == 1 ? 12 : intval($this->currentMonth)-1;
      $preYear = $this->currentMonth == 1 ? intval($this->currentYear)-1 : $this->currentYear;
      return '<div class="calendar_header">' . "\r\n" . '<a class="calendar_prev" href="javascript:load_calendar_panel(' . sprintf('%02d', $preMonth) . ', ' . $preYear.')"><i class="fa fa-chevron-circle-left custom_icon"></i></a>' . "\r\n" . '<span class="calendar_title">' . date('M, Y', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')) . '</span>' . "\r\n" . '<a class="calendar_next" href="javascript:load_calendar_panel(' . sprintf("%02d", $nextMonth) . ', ' . $nextYear . ')"><i class="fa fa-chevron-circle-right custom_icon"></i></a>' . "\r\n"  . '</div>';
    }
    /**
    ** Create calendar week labels
    **/
    private function _createLabels() {
      $content = '';
      foreach ($this->dayLabels as $index => $label) {
        $content .= '<div class="calendar_names">' . $label . '</div>' . "\r\n";
      }
      return $content;
    }
    /**
    ** Calculate number of weeks in a particular month
    **/
    private function _weeksInMonth($month = null, $year = null) {
      if (null == ($year)) {
        $year = date("Y", time());
      }
      if (null == ($month)) {
        $month = date("m", time());
      }
      // Find number of days in this month
      $daysInMonths = $this->_daysInMonth($month, $year);
      $numOfweeks = ($daysInMonths % 7 == 0 ? 0 : 1) + intval($daysInMonths / 7);
      $monthEndingDay = date('N',strtotime($year . '-' . $month . '-' . $daysInMonths));
      $monthStartDay = date('N',strtotime($year . '-' . $month . '-01'));
      if ($monthEndingDay < $monthStartDay) {
        $numOfweeks++;
      }
      return $numOfweeks;
    }
    /**
    ** Calculate number of days in a particular month
    **/
    private function _daysInMonth($month = null, $year = null) {
      if (null == ($year)) $year = date("Y",time());
      if (null == ($month)) $month = date("m",time());
      return date('t', strtotime($year . '-' . $month . '-01'));
    }
  }
  $calendar = new Calendar();
  echo $calendar->show();
  echo '
  <script>
    $("#print_present_count").html('.$print_present_count.');
    $("#print_absent_count").html('.$print_absent_count.');
    $("#print_sick_leave").html('.$print_sick_leave.');
    $("#print_casual_leave").html('.$print_casual_leave.');
  </script>';
  ?>