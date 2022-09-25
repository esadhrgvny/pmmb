<?php
class Data
{
    //Koneksi database dan tabel
    private $conn;
    private $karyawan_table = "m_karyawan";
    private $family_table = "m_keluarga";

    //object properties
    public $NO_BADGE;
    public $NAMA;
    public $SALUTATION;
    public $TEMPAT_LAHIR;
    public $DATE_OF_BIRTH;
    public $JK;
    public $STATUS_KAWIN;
    public $UNIT_KERJA;
    public $KD_JABATAN;
    public $STATUS;
    public $DETAIL_JABATAN;
    public $DESC;
    public $RANK;
    public $FAMILY_ID;
    public $RELATIVE_ID;
    public $RELATIVE;
    public $NAMA_FAMILY;
    public $GENDER;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read_karyawan()
    {
        $query = "SELECT k.NO_BADGE, k.NAMA, k.SALUTATION, k.TEMPAT_LAHIR, k.DATE_OF_BIRTH, k.JK, k.STATUS_KAWIN, k.UNIT_KERJA, k.STATUS, j.KD_JABATAN, j.DESC, j.RANK FROM " .$this->karyawan_table . " k 
        INNER JOIN m_jabatan j ON k.KD_JABATAN = j.KD_JABATAN";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function read_family()
    {
        $query = "SELECT f.FAMILY_ID, f.RELATIVE_ID, f.RELATIVE, f.NAMA as NAMA_FAMILY, f.GENDER, k.NO_BADGE FROM " .$this->family_table. " f 
        INNER JOIN m_karyawan k ON f.NO_BADGE = k.NO_BADGE";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}