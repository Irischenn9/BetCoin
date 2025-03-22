<?php
    $LinkToSQL=mysqli_connect(
        'localhost',
        'root',
        '',
        'betcoin'
    );
    //連接資料庫
    function sqlFormat($data,$dataType,$type){
        if($type=="String"){
            if($data==null){
                $data="";
            }else if($data!=null){
                $data="AND ".$dataType."='".$data."'";
            }
        }else if($type=="num"){
            if($data==null){
                $data="";
            }else if($data!=null){
                $data="AND ".$dataType."=".$data."";
            }
        }else{
            $data=null;
        }
        return $data;
    }

    function sqlFormatDatetime($lower,$upper,$dataType){
        if($lower==null && $upper==null){return "";}
        $datetimeLower=null;
        $datetimeUpper=null;

        if($lower!=null){
            $datetimeLower=getDatetime($lower,"SQL");
        }
        if($upper!=null){
            $datetimeUpper=getDatetime($upper,"SQL");
        }
        
        if($datetimeLower==null && $datetimeUpper==null){
            return "";
        }else if($datetimeLower!=null && $datetimeUpper==null){
            return " AND ".$dataType." >= '".$datetimeLower."'";
        }else if($datetimeLower==null && $datetimeUpper!=null){
            return " AND ".$dataType." <= '".$datetimeUpper."'";
        }else{
            return " AND ".$dataType." BETWEEN '".$datetimeLower."' AND '".$datetimeUpper."'";
        }

    }
    function getDatetime($data,$type){
        $data=datetimeSplit($data);
        if($type=="SQL"){
            $DatetimeFormated=$data[0]."-".$data[1]."-".$data[2]." ".$data[3].":".$data[4].":".$data[5];
            return $DatetimeFormated;
        }else{
            $DatetimeFormated=$data[0]."-".$data[1]."-".$data[2]."T".$data[3].":".$data[4].":".$data[5];
            return $DatetimeFormated;
        }
        
    }
    function datetimeSplit($datetime){
        if($datetime!=null){
            $a=preg_split("/[\sT,:-]+/", $datetime);
            return $a;
        }else{
            return null;
        }
    }
?>