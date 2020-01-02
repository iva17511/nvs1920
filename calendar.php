<?php
setlocale(LC_TIME, "de_DE");
class Calendar {

    /** Constructor */
    public function __construct(){     
        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
    }
     
    /********************* PROPERTY ********************/  
    private $dayLabels = array("Mo","Di","Mi","Do","Fr","Sa","So");
     
    private $currentYear=0;
    private $currentMonth=0;
    private $currentDay=0;
    private $currentDate=null;
    private $daysInMonth=0;
    private $naviHref= null;

    private $fullmoons=array();

    /********************* PUBLIC **********************/  
        
    /** print out the calendar */
    public function show() {

        /** set month and year */
        $year  = null;
        $month = null;
         
        if(null==$year&&isset($_GET['year'])){
            $year = $_GET['year'];
        } else if(null==$year){
            $year = date("Y",time());
        }

        if(null==$month&&isset($_GET['month'])){
            $month = $_GET['month'];
        } else if(null==$month){
            $month = date("m",time());
        }

        /** Do all Sql Statements for the month */
        global $db;

        if(!$stmt = $db->prepare("select * from `vollmonde` where MONTH(Datum) = ? AND YEAR(Datum) = ?")) {
            $error = $db->errno . ' ' . $db->error;
            echo $error;
        }
        $stmt->bind_param('ss', $month, $year);
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $this->fullmoons[] = $row['Datum'];
                }
                //$stmt->close();
            }
        }
         
        $this->currentYear=$year;
        $this->currentMonth=$month;
        $this->daysInMonth=$this->_daysInMonth($month,$year);  
         
        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';   
                                $content.='<div class="clear"></div>';     
                                $content.='<ul class="dates">';    
                                 
                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){
                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j);
                                    }
                                }
                                 
                                $content.='</ul>';
                                $content.='<div class="clear"></div>';     
             
                        $content.='</div>';
                 
        $content.='</div>';
        return $content;   
    }
     
    /********************* PRIVATE **********************/ 
    /** create the li element for ul */
    private function _showDay($cellNumber){
         
        if($this->currentDay==0){
             
            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));
                     
            if(intval($cellNumber) == intval($firstDayOfTheWeek)) {
                $this->currentDay=1;
            }
        }

        /** day in month */
        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){
             
            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
             
            $cellContent = $this->currentDay;


            if(in_array($this->currentDate, $this->fullmoons)){
                $cellContent.='<img src="png/vollmond.png" class="fullmoon">';
            }

            $this->currentDay++;
        }else{
            $this->currentDate =null;
            $cellContent=null;
        }

        /** check if date is current day */
        $class_day = ($cellContent == date("d") && $this->currentMonth == date("m") && $this->currentYear == date("Y") ? "this_today" : "nums_days");

        return '<li class="'.$class_day.'">'.$cellContent.'</li>';
        /*
        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
        */
    }
     
    /** create navigation */
    private function _createNavi(){
         
        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;
         
        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;
         
        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;
         
        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;
         
        return
            '<div class="header">'.
                '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">zurück</a>'.
                    '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
                '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">weiter</a>'.
            '</div>';
    }
         
    /** create calendar week labels */
    private function _createLabels(){  
                 
        $content='';
         
        foreach($this->dayLabels as $index=>$label){

            /*$content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';
            */
            $content.='<li class="name_days">'.$label.'</li>';
        }
         
        return $content;
    }


    /** calculate number of weeks in a particular month */
    private function _weeksInMonth($month=null, $year=null){
         
        if(null==($year)) {
            $year =  date("Y",time()); 
        }
         
        if(null==($month)) {
            $month = date("m",time());
        }
         
        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);
         
        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);
         
        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));
         
        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));
         
        if($monthEndingDay<$monthStartDay){
            $numOfweeks++;
        }
        return $numOfweeks;
    }
 
    /** calculate number of days in a particular month */
    private function _daysInMonth($month=null,$year=null){
         
        if(null==($year))
            $year =  date("Y",time()); 
 
        if(null==($month))
            $month = date("m",time());
             
        return date('t',strtotime($year.'-'.$month.'-01'));
    }
}