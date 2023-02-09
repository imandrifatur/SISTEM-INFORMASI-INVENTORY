<?php
include 'konek.php';
require('/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../logo/ap.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT . ANGELS PRODUCTS',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'JENIS P.O : LAPORAN TRANSAKSI',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Transaksi",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(2, 0.8, 'kode', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Nama Barang', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Jenis transaksi', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'barang untuk', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'jumlah', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'stock awal', 1, 0, 'C');
$pdf->Cell(2.5, 0.8, 'stok akhir', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'tanggal', 1, 1, 'C');
$pdf->SetFont('times','',10);

 $sql = "SELECT * FROM laporan_trans ORDER BY kode_trans ASC";
    $query = mysqli_query($koneksi,$sql) or die();
      while ($row =mysqli_fetch_array($query)) 
      {
   $pdf->Cell(2, 0.8, $row['kode_trans'], 1, 0, 'C');
   $pdf->Cell(4, 0.8, $row ['nama_brg'], 1, 0, 'C');
   $pdf->Cell(3, 0.8, $row['jenis_trans'], 1, 0, 'C');
   $pdf->Cell(4, 0.8, $row ['brg_to'], 1, 0, 'C');
   $pdf->Cell(2.5, 0.8, $row['jumlah_trans'], 1, 0, 'C');
   $pdf->Cell(2.5, 0.8, $row ['stock_awal'], 1, 0, 'C');
   $pdf->Cell(2.5, 0.8, $row ['stock_akhir'], 1, 0, 'C');
   $pdf->Cell(4, 0.8, $row['tanggal'], 1, 1, 'C');
      }


$pdf->Output();

?>

