
<?php
ob_start();
class Invoice extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('ServerModal');
    }

    public function pdf($id_invoice)
    {
        $this->load->library('dompdf_gen');
        $data['export'] = $this->Model_invoice->exportinvoice($id_invoice);
        $this->load->view('manajemen_toko/pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Data_Pesanan.pdf", array('Attachment' => 0));
    }

    function index()
    {
        $id = $this->session->userdata('id_sd');
        // $user = $this->db->get_where('karaywan', ['id' => $this->session->userdata('id')])->row_array();
        $invoice1 = $this->ServerModal->getPesanan($id)->row_array();


        $pdf = new FPDF('p', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 10);
        // mencetak string 
        // $pdf->image("index.php/assets/logo_tajeer.png", 30, 7);
        $pdf->Cell(137, 7, 'INVOICE', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(137, 7, 'Apotek Griya Cinere', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat

        $pdf->SetFont('Arial', '', 7);

        $pdf->Cell(35, 6,  'Tanggal Pembelian :', 0, 0, 'L');
        $pdf->Cell(38, 6,  $invoice1['tanggal'], 0, 1, 'L');

        $pdf->Cell(35, 6,  'Jumlah Pembelian :', 0, 0, 'L');
        $pdf->Cell(38, 6,  $invoice1['jumlah_pesanan'], 0, 1, 'L');


        $pdf->Cell(10, 2, '', 0, 1);
        //$pdf->SetFont('Arial', 'B', 8);

        $pdf->Cell(5, 6, 'No', 1, 0);
        $pdf->Cell(55, 6, 'Menu', 1, 0);
        $pdf->Cell(13, 6, 'Jumlah', 1, 0);
        $pdf->Cell(22, 6, 'Harga Satuan', 1, 0);
        $pdf->Cell(29, 6, 'Total', 1, 1);


        $pdf->SetFont('Arial', '', 8);


        $invoice2 =  $this->ServerModal->getDetail($id)->result_array();
        //var_dump($invoice2);

        $i = 1;
        $ttl = 0;

        foreach ($invoice2 as $row) {

            $pdf->Cell(5, 6, $i, 1, 0);
            $pdf->Cell(55, 6, $row['nama_menu'], 1, 0);
            $pdf->Cell(13, 6, $row['jumlah'], 1, 0);
            $pdf->Cell(22, 6, number_format($row['harga']), 1, 0, 'R');
            $tot = $row['harga'] * $row['jumlah'];
            $ttl += $tot;
            $pdf->Cell(29, 6, number_format($ttl), 1, 1, 'R');

            $i += 1;
        }

        $pdf->Cell(10, 2, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 8);

        $pdf->Cell(30, 6,  'Total : Rp. ', 0, 0, 'L');
        $pdf->Cell(29, 6,  number_format($invoice1['total_harga']), 0, 1, 'R');

        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(30, 6,  'Uang Bayar : Rp. ', 0, 0, 'L');
        $pdf->Cell(29, 6,  number_format($invoice1['uang_bayar']), 0, 1, 'R');

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(30, 6,  'Uang Kembali : Rp. ', 0, 0, 'L');
        $pdf->Cell(29, 6,  number_format($invoice1['uang_kembali']), 0, 1, 'R');


        $pdf->Output();
    }
}
