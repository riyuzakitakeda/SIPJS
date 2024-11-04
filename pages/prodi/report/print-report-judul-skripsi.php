<?php
ob_start();
include'../../../assets/plugins/tcpdf/tcpdf.php';

class MYPDF extends TCPDF {
	public function Header() {
        // Logo
        //$image_file ='../../../assets/images/avatars/print.png';
		//$this->Image($image_file, 10, 10, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Header
        //$html = '<p><b>REPORT STOCK</b></p>';
		//$this->writeHTMLCell($w = 0, $h = 0, $x = 40, $y = 10, $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
    }
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 7);
        // Page number
        $this->Cell(0, 5, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().'    '.'*** '.date ("d-m-Y").' ***', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Andi Hatmoko');
$pdf->SetTitle('Report');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(12, 12, 9);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();
$pdf->SetFont('times', '', 10);

	include "../../../config/koneksi.php";
	$query	=mysqli_query($gathuk, "SELECT * FROM tb_setup WHERE id_setup='1'");
	$data	=mysqli_fetch_array($query);
	
	$tamSkr	=mysqli_query($gathuk, "SELECT * FROM tb_skripsi ORDER BY tgl DESC");

$head ='<table border="0" cellspacing="0" cellpadding="1">
			<tr>
				<td width="100" rowspan="4"><img src="../../../assets/img/logo.png" width="100" height="55"/></td>
				<td width="570"><font size="11" style="text-transform:uppercase;"><b>'.$data['universitas'].'</b></font></td>
			</tr>
			<tr>
				<td>Alamat: '.$data['alamat'].'</td>	
			</tr>
			<tr>
				<td>No. Telp. '.$data['telp'].'</td>
			</tr>
			<tr>
				<td><i>Email: '.$data['email'].'</i><br /></td>	
			</tr>
		</table>
		<table border="2" cellspacing="0" cellpadding="2">
		</table>';	
$pdf->writeHTML($head, true, false, false, false, '');

$html ='<p align="center"><b><u>REPORT DAFTAR JUDUL SKRIPSI</u></b></p>
		<p>Update Tanggal: '.date("j F Y, g:i A").'</p>
		<table border="1" cellspacing="0" cellpadding="2">
			<tr align="center" bgcolor="silver">
				<td width="40"><b>NO</b></td>
				<td width="240"><b>JUDUL</b></td>	
				<td width="160"><b>NAMA SISWA PENGAJU</b></td>	
				<td width="110"><b>APPROVAL PRODI</b></td>	
				<td width="120"><b>APPROVAL DOSEN PEMBIMBING</b></td>	
			</tr>';
			$no=0;
			while($tskr	=mysqli_fetch_array($tamSkr)){
				if ($tskr['approve_prodi'] ==""){
					$app_prodi="Waiting";
				}
				else if ($tskr['approve_prodi'] =="Y"){
					$app_prodi="Approved";
				}
				else{
					$app_prodi="Not Approved";
				}
				
				if ($tskr['approve_dosen'] ==""){
					$app_dosen="Waiting";
				}
				else if ($tskr['approve_dosen'] =="Y"){
					$app_dosen="Approved";
				}
				else{
					$app_dosen="Not Approved";
				}
			$no++;
	$html .='<tr>
				<td align="center">'.$no.'</td>
				<td>'.$tskr['judul'].'</td>';
				$tamSis	=mysqli_query($gathuk, "SELECT * FROM tb_siswa WHERE id_siswa='$tskr[id_siswa]'");
				$tsis	=mysqli_fetch_array($tamSis);
		$html .='<td>'.$tsis['nama'].'</td>
				<td>'.$app_prodi.'</td>
				<td>'.$app_dosen.'</td>
			</tr>';	
			}
$html .='</table>';
$pdf->writeHTML($html, true, false, false, false, '');

$sign = '<table cellpadding="1" border="0">
			<tr>
				<td></td>
				<td></td>
				<td align="center">Dilaporkan pada tanggal, '.date("j F Y").'</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><b>PRODI</b></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;"><b>'.$data['universitas'].'</b></font></td>
			</tr>
			<tr>
				<td height="60"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><b><u>( ................................. )</u></b></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center">KETUA</td>
			</tr>
		</table>';
$pdf->writeHTML($sign, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('Report-Judul-Skripsi-'.date("Y-m-d").'.pdf', 'I');
?>