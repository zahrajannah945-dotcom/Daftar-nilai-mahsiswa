<?php 
header ("Content-Type: text/plain; charset=utf-8");
$datamahasiswa = [
    "Azzahra "=>100,
    "Ulfa "=>90,
    "Muthia"=>75,
    "Nayla "=>60,
    "Rihha "=>45,

    ];
    function Grade($nilai){
        if ($nilai>= 90){
            return "A";
        }else if ($nilai >= 80){
            return "B";
        }else if ($nilai >= 75){
            return "C";
        }else if ($nilai >= 60){
            return "D";
        }else {
            return "E";
        }
    }
    function keterangan ($grade){
        switch ($grade){
         case "A":
            case "B":
            case "C":
             return "Selamat Anda Lulus";
        case "D":
            return "Anda Lulus Bersyarat";
         case "E":
                return "Anda Tidak Lulus";
        }
    }
    $totalnilai = 0;
    $jumlahdata = count($datamahasiswa);
    $nilaitertinggi =max($datamahasiswa);
    $nilaiterendah= min($datamahasiswa);
    $no =1;
    
    echo"=====================DAFTAR NILAI MAHASISWA=====================\n";
    printf ("%-5s %-15s %-10s %-7s %s\n", "No.", "Nama Mahasiswa", "Nilai", "Grade", "Keterangan");
echo str_repeat("-", 58) . "\n";

foreach ($datamahasiswa as $nama => $nilai){
$grade = Grade($nilai);
$keterangan = keterangan($grade);
$totalnilai += $nilai;

printf ("%-5s %-15s %-10s %-7s %s\n", $no, $nama, $nilai, $grade, $keterangan);
$no++;
}
echo str_repeat ("-", 58) . "\n\n";
$ratarata = $totalnilai / $jumlahdata;

echo "jumlah mahasiswa : " . $jumlahdata . "\n";
echo "Nilai tertinggi : " . $nilaitertinggi ." (" . array_search($nilaitertinggi, $datamahasiswa) . ")\n";
echo "Nilai terendah : " . $nilaiterendah ." (" . array_search($nilaiterendah, $datamahasiswa) . ")\n";
echo "rata-rata kelas : ". number_format($ratarata, 2 ) . " ( Grade " . Grade($ratarata) . ")\n";
echo "rentang grade : A = 91-100, B = 81-90, C= 75-80 , D = 51-74, E =0-50\n";
    