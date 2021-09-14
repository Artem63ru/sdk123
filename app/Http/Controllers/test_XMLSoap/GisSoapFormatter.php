<?php

class GisSoapFormatter{
    public string $Template;
    public string $OrgPPAGUID='';


    private function generateGuid($include_braces = false) {
        if (function_exists('com_create_guid')) {
            if ($include_braces === true) {
                return com_create_guid();
            } else {
                return substr(com_create_guid(), 1, 36);
            }
        } else {
            mt_srand((double) microtime() * 10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));

            $guid = substr($charid,  0, 8) . '-' .
                substr($charid,  8, 4) . '-' .
                substr($charid, 12, 4) . '-' .
                substr($charid, 16, 4) . '-' .
                substr($charid, 20, 12);

            if ($include_braces) {
                $guid = '{' . $guid . '}';
            }

            return $guid;
        }
    }

    public function GetXmlHeader(){
        $headerXml=simplexml_load_file("HeaderTemplate.xml");;

        $headerXml->Date=date(DATE_ATOM);
        $headerXml->MessageGUID=$this->generateGuid();
        $headerXml->orgPPAGUID=$this->OrgPPAGUID;

        echo $headerXml->asXML();
    }


}

$yo=new GisSoapFormatter;
$yo->GetXmlHeader();

?>
