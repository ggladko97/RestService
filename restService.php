<?php


include "connection.php";


$method = $_SERVER['REQUEST_METHOD'];
echo " REQUEST METHOD: ".$method."\n";
echo " PATH INFO".$_SERVER['PATH_INFO']."\n  ";


class Item{
    public $shareholderName;
    public $companyName;
    public $country;
    public $amountValues;
    public $firstBid;
    public $lastBidDate;
    public $gender;
    public $email;
    public $phone;
    public $address;

    /**
     * Item constructor.
     */
    public function __construct()
    {
    }


    /**
     * @return mixed
     */
    public function getShareholderName()
    {
        return $this->shareholderName;
    }

    /**
     * @param mixed $shareholderName
     */
    public function setShareholderName($shareholderName)
    {
        $this->shareholderName = $shareholderName;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getAmountValues()
    {
        return $this->amountValues;
    }

    /**
     * @param mixed $amountValues
     */
    public function setAmountValues($amountValues)
    {
        $this->amountValues = $amountValues;
    }

    /**
     * @return mixed
     */
    public function getFirstBid()
    {
        return $this->firstBid;
    }

    /**
     * @param mixed $firstBid
     */
    public function setFirstBid($firstBid)
    {
        $this->firstBid = $firstBid;
    }

    /**
     * @return mixed
     */
    public function getLastBidDate()
    {
        return $this->lastBidDate;
    }

    /**
     * @param mixed $lastBidDate
     */
    public function setLastBidDate($lastBidDate)
    {
        $this->lastBidDate = $lastBidDate;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

}



function parceData($pathToJsonFile){
    $p = $pathToJsonFile;
    $jsondata = file_get_contents("$p");

    $data = json_decode($jsondata, true);
    $result = array();
    $item = new Item();
    foreach ($data as $dane) {
        $item->setAddress($dane["address"]);
        $item->setAmountValues($dane["amountValues"]);
        $item->setCompanyName($dane["companyName"]);
        $item->setCountry($dane["country"]);

        $item->setShareholderName($dane["shareholderName"]);
        $item->setFirstBid($dane["firstBid"]);
        $item->setEmail($dane["email"]);
        $item->setPhone($dane["address"]);
        $item->setGender($dane["gender"]);
        array_push($result,$item);
    }
    return $result;
}


$parameters =  urldecode($_GET["action"]);
echo  "Parameters send:".$parameters."\n";


$get_parameters = array();

if (isset($_SERVER['QUERY_STRING'])) {
    $pairs = explode('&', $_SERVER['QUERY_STRING']);
    foreach($pairs as $pair) {
        $part = explode('=', $pair);
        $get_parameters[$part[0]] = sizeof($part)>1 ? urldecode($part[1]) : "";
    }
}
$option = $get_parameters["option"];
$additionalParams = $get_parameters["params"];

echo "option: ".$option."\n";
echo "additional: ".$additionalParams."\n";


echo '<pre>'; print_r($get_parameters); echo '</pre>';
$result = array();
switch ($method) {
    case 'POST':
        echo '<pre>';
        echo "post\n";
        switch ($parameters){
            case 'send':
                $resultFromParce = parceData("");

                break;
            case 'recieve':
                break;
            default:
                break;

        }

//        if($connection->query($inserting_query3)===true){
//            echo "Insertion  prediction has succed\n";
//
//        }else{
//            echo "insertion prediction unfortunately failed \n";
//        }
        echo "post is OK\n";
        break;//POST
    case 'GET'://GET
        echo "Im in get in php\n";
//        switch ($params){
//            case 'weather':
//                //$table = mysqli_real_escape_string($connection,$params);
//                $query_select_allweather = "SELECT * FROM weatherdata.$tableName;";
////                $select = mysql_query($sql);
////                $connection->query($select);
//                $sth = mysqli_query($connection,$query_select_allweather);
//                $rows = array();
//                while($r = mysqli_fetch_assoc($sth)) {
//                    $rows[] = $r;
//                }
//                print json_encode($rows);
//
//                break;
//            case 'average':
//                $rowAvg = array();
//                echo "value in switch: ".$valueDateParameter;
//                $average = mysqli_query($connection,
//                    "CALL avg_temp('$valueDateParameter')") or die("Query fail: " . mysqli_error($connection));
//
//                while ($obj = mysqli_fetch_assoc($average)) {
//                    $rowAvg[] = $obj;
//                }
//                print json_encode($rowAvg);
//                //print json_encode($rows);
//                break;
//            case 'analizer':
//                $rowAnalized  = array();
//
//                $analized = mysqli_query($connection,"CALL account_count('$valueCityToAnalize', '$valueDateToAnalize')") or die ("Query fail: ".mysqli_error($connection));
//                while ($obj = mysqli_fetch_assoc($analized)) {
//                    $rowAnalized[] = $obj;
//                }
//                print json_encode($rowAnalized);
//                break;
//
//            default :
//                echo "sorry, wrong url";
//                break;
//
//        }
        echo "get";
        break;
    case 'DELETE':
        echo "delete";
        break;
    default:
        echo  "error";
        break;
}
