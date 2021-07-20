<?php

class Helpers {
 
    public function __construct()
    { 
        
    } 

    public function docFormat($docIn){ 
        if(strlen($docIn) == 11){
            $docOut = substr($docIn, 0, 3).'.'.substr($docIn, 3, 3).'.'.substr($docIn, 6, 3).'-'.substr($docIn, 9, 2);
        }
        if(strlen($docIn) == 14){
            $docOut = substr($docIn, 0, 2).'.'.substr($docIn, 2, 3).'.'.substr($docIn, 5, 3).'.'.substr($docIn, 8, 4).'/'.substr($docIn, 12, 2);
        }        
        return $docOut;
    }

    public function docUnformat($docIn){ 

        $out = str_replace('.', '', $docIn);
        $out = str_replace('-', '', $out);
        $out = str_replace('/', '', $out);
 
        return $out;
    }
    
 
    public function dateFormatPt($in){  
        
        if(!$in) return null;
        $date = DateTime::createFromFormat('Y-m-d', $in)->format('d/m/Y');
        return $date;

    }

    public function dateTimeFormatPt($in){  
        
        if(!$in) return null;
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $in)->format('d/m/Y H:i:s');
        return $date;
        
    }

    public function moneyFormat($in){  
         
        $out = 'R$ '.number_format($in,2,',','.');
        return $out;
        
    }
  
}
?>