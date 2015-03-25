<?php
class RateVietComBank {
    
    public function __construct() {
        $this->sourceXML='http://www.vietcombank.com.vn/ExchangeRates/ExrateXML.aspx';
    }
    function getXML(){
        return file_get_contents($this->sourceXML);
    }
        function getRate($namerate){
        $xmlData = NULL;
        $p = xml_parser_create();
        xml_parse_into_struct($p,$this->getXML() , $xmlData);
        xml_parser_free($p);
        $this->mydate = $xmlData['1']['value'];
        $data = array();        
             
        if($xmlData){
            foreach($xmlData as $value){
                if(isset($value['attributes'])){
                    $data[] = $value['attributes'];
                }              
            }
            foreach($data as $k=>$v){
                if($v['CURRENCYCODE'] == $namerate){
                    return $v['SELL'];
                }
            }
        }
        return false;
    }

    
}

