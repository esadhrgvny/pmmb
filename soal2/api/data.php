<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
// get database connection
include_once '../config/koneksi_db.php';
// instantiate product model
include_once '../model/data.php';

//connection to database
$database = new Database();
$db = $database->getConnection();

$data = new Data($db);
$request = $_SERVER['REQUEST_METHOD'];
if (!isset($_GET['id'])) {
    $stmt = $data->read_karyawan();
    $num = $stmt->rowCount();
    $a = $data->read_family();
    $b = $a->rowCount();

    if ($num > 0) {
        //mk Array
        $pk_arr = array();
        $pk_arr["EMP"]= array();
        $mk_arr = array();

        while (($row = $stmt->fetch(PDO::FETCH_ASSOC)) && ($b = $a->fetch(PDO::FETCH_ASSOC))) {
            $fam = array();
            // extract($b);
            $l = json_decode('[{"FAMILY_ID" => $b["FAMILY_ID"],"var2":"16","var3":"16"},{"var1":"8","var2":"15","var3":"15"}]');  //foreach element in $arr $uses = $item['var1']; //etc };
            foreach ($b as $c) {
                $fam = array( 
                'FAMILY_ID' => $b['FAMILY_ID'],
                'NO_BADGE' => $b['NO_BADGE'],
                'RELATIVE_ID' => $b['RELATIVE_ID'],
                'RELATIVE' => $b['RELATIVE'],
                'NAMA' => $b['NAMA_FAMILY'],
                'GENDER' => $b['GENDER']
                );
            }
        
            //this will make $row['name'] to just $name only
                # code...
            extract($row);
            $pk_item = array(
                "NO_BADGE" => $NO_BADGE,
                "NAMA" => $NAMA,
                "SALUTATION" => $SALUTATION,
                "TEMPAT_LAHIR" => $TEMPAT_LAHIR,
                "DATE_OF_BIRTH" => $DATE_OF_BIRTH,
                "JK" => $JK,
                "STATUS_KAWIN" => $STATUS_KAWIN,
                "UNIT_KERJA" => $UNIT_KERJA,
                "KD_JABATAN" => $KD_JABATAN,
                "STATUS" => $STATUS,
                "DETAIL_JABATAN" => array(
                    "KD_JABATAN" => $KD_JABATAN,
                    "DESC" => $DESC,
                    "RANK" => $RANK,
                ),
                "FAMILY" => $fam,
            );

            
            
            // while ($b = $a->fetch(PDO::FETCH_ASSOC)) {
            //     //extract row
            //     //this will make $row['name'] to just $name only
            //     extract($b);
            //     $mk_item = array(
            //         '
            //     );
                
            // }
            array_push($pk_arr["EMP"], $pk_item);
        }
        echo json_encode($pk_arr);
        //Set response code 200 - OK
        http_response_code(200);
        //show mahasiswa data in json
    } else {
        // no products found will be here
        // set response code - 404 Not found
        http_response_code(404);

        // tell the user no products found
        echo json_encode(
            array("message" => "No data found.")
        );
    }
}