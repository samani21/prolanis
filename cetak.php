<?php
include 'asset/koneksi/koneksi.php';
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

date_default_timezone_set("Asia/Singapore");
$t = date('d-m-Y');

$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    // 'fill' => [
    //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
    //     'rotation' => 90,
    //     'startColor' => [
    //         'argb' => 'FFA0A0A0',
    //     ],
    //     'endColor' => [
    //         'argb' => 'FFFFFFFF',
    //     ],
    // ],
];

$style_col = [
    'font' => array('bold' => true), // Set font nya jadi bold
    'alignment' => array(
      'horizontal' =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
      'vertical' =>  \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ),
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$style_row = [
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];
    

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
$spreadsheet->getActiveSheet()->mergeCells('A1:U1');
$spreadsheet->getActiveSheet()->getStyle('A1:U1')->applyFromArray($styleArray);
$spreadsheet->getActiveSheet()->getDefaultColumnDimension('A3')->setWidth(100, 'pt');


$sheet->setCellValue('A1', 'PROLANIS');
$sheet->setCellValue('A3', 'NO');
$sheet->setCellValue('B3', 'NAMA LENGKAP');
$sheet->setCellValue('C3', 'NO BPJS');
$sheet->setCellValue('D3', 'NIK');
$sheet->setCellValue('E3', 'TGL LAHIR');
$sheet->setCellValue('F3', 'ALAMAT');
$sheet->setCellValue('G3', 'TB');
$sheet->setCellValue('H3', 'BB');
$sheet->setCellValue('I3', 'BMI');
$sheet->setCellValue('J3', 'LINGKAR PERUT');
$sheet->setCellValue('K3', 'TEKANAN DARAH');
$sheet->setCellValue('L3', 'TGL PEMERIKSAAN');
$sheet->setCellValue('M3', 'GDP');
$sheet->setCellValue('N3', 'CHOLEST TOTAL');
$sheet->setCellValue('O3', 'LDL');
$sheet->setCellValue('P3', 'HDL');
$sheet->setCellValue('Q3', 'TRIGLISERIDA');
$sheet->setCellValue('R3', 'FUNGSI GINJAL');
$sheet->setCellValue('S3', 'RENCANA PEMERIKSAAN LAB ULANGAN ');
$sheet->setCellValue('T3', 'STATUS');
$sheet->setCellValue('U3', 'KETERANGAN');

$spreadsheet->getActiveSheet()->getStyle('A3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('B3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('C3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('D3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet(   )->getStyle('E3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('F3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('G3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('H3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('I3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('J3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('K3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('L3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('M3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('N3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('O3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('P3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('R3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('S3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('T3')->applyFromArray($style_col); 
$spreadsheet->getActiveSheet()->getStyle('U3')->applyFromArray($style_col); 


$data = mysqli_query($koneksi,"SELECT * FROM tb_porlanis LEFT JOIN tb_pasien ON tb_pasien.id = tb_porlanis.id_pasien  ORDER BY sts1,p_ulang ASC");
$i = 4;
$no = 1;
while($d = mysqli_fetch_array($data))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $d['nama']);
    $sheet->setCellValue('C'.$i, $d['bpjs']);
    $sheet->setCellValue('D'.$i, $d['nik']);
    $sheet->setCellValue('E'.$i, $d['tgl_lahir']);    
    $sheet->setCellValue('F'.$i, $d['alamat']);
    $sheet->setCellValue('G'.$i, $d['tb']);
    $sheet->setCellValue('H'.$i, $d['bb']);
    $sheet->setCellValue('I'.$i, $d['bmi']);
    $sheet->setCellValue('J'.$i, $d['perut']);    
    $sheet->setCellValue('K'.$i, $d['t_darah']); 
    $sheet->setCellValue('L'.$i, $d['tgl_pemeriksaan']);
    $sheet->setCellValue('M'.$i, $d['gdp']);
    $sheet->setCellValue('N'.$i, $d['cholest']);
    $sheet->setCellValue('O'.$i, $d['ldl']);    
    $sheet->setCellValue('P'.$i, $d['hdl']); 
    $sheet->setCellValue('Q'.$i, $d['trigliserida']);
    $sheet->setCellValue('R'.$i, $d['f_ginjal']);
    $sheet->setCellValue('S'.$i, $d['p_ulang']);
    $sheet->setCellValue('T'.$i, $d['status']);    
    $sheet->setCellValue('U'.$i, $d['keterangan']);     
    
if($d['sts1']=='0' && $d['p_ulang'] <= $t){
    
    $spreadsheet->getActiveSheet()->getStyle('A'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('B'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('D'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('E'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('F'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('G'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('H'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('I'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('J'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('K'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('L'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('M'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('N'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('O'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('P'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('Q'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('R'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('S'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('T'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('U'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFF0000']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
}else{
    $spreadsheet->getActiveSheet()->getStyle('A'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('B'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('D'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('E'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('F'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('G'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('H'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('I'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('J'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('K'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('L'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('M'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('N'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);$spreadsheet->getActiveSheet()->getStyle('O'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('P'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('Q'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('R'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('S'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('T'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
    $spreadsheet->getActiveSheet()->getStyle('U'.$i)->applyFromArray([
        'font' => [
            'color' => ['argb' => 'FFFFFFF']
        ],
        'alignment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
        ],
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            ],
        ],
    ]);
}
    $i++;

}


$writer = new Xlsx($spreadsheet);
$writer->save('Data Prolanis.xlsx');
echo "<script>window.location = 'Data Prolanis.xlsx'</script>";
echo 'asdjkbsdjk';
?>