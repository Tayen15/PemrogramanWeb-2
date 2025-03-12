<?php 

class NilaiMahasiswa {
     public $nama;
     public $mata_kuliah;
     public $nilai_uts;
     public $nilai_uas;
     public $nilai_tugas;
     public const PERCENTAGE_UTS = 0.25;
     public const PERCENTAGE_UAS = 0.30;
     public const PERCENTAGE_TUGAS = 0.45;

     function __construct($nama, $mata_kuliah, $nilai_uts, $nilai_uas, $nilai_tugas) {
          $this->nama = $nama;
          $this->mata_kuliah = $mata_kuliah;
          $this->nilai_uts = $nilai_uts;
          $this->nilai_uas = $nilai_uas;
          $this->nilai_tugas = $nilai_tugas;
     }

     function getNilaiAkhir() {
          $nilai_akhir = ($this->nilai_uts * self::PERCENTAGE_UTS) + ($this->nilai_uas * self::PERCENTAGE_UAS) + ($this->nilai_tugas * self::PERCENTAGE_TUGAS);
          return $nilai_akhir;
     }

     function getGrade() {
          $nilai_akhir = $this->getNilaiAkhir();
          if ($nilai_akhir >= 85) {
               return "A";
          } elseif ($nilai_akhir >= 70) {
               return "B";
          } elseif ($nilai_akhir >= 60) {
               return "C";
          } elseif ($nilai_akhir >= 50) {
               return "D";
          } else {
               return "E";
          }
     }

     function getStatus() {
          $grade = $this->getGrade();
          if ($grade == "A" || $grade == "B" || $grade == "C") {
               return "Lulus";
          } else {
               return "Tidak Lulus";
          }
     }


}

?>