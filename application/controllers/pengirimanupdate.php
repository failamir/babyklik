<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengirimanupdate extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model("pengiriman_model");
    }

	function generate_qrcode($data)
	{
        /* Load QR Code Library */
        $this->load->library('ciqrcode');
        
        /* Data */
        $hex_data   = bin2hex($data);
        $save_name  = $hex_data.'.png';

        /* QR Code File Directory Initialize */
        $dir = 'assets/media/qrcode/';
        if (!file_exists($dir)) {
            mkdir($dir, 0775, true);
        }

        /* QR Configuration  */
        $config['cacheable']    = true;
        $config['imagedir']     = $dir;
        $config['quality']      = true;
        $config['size']         = '1024';
        $config['black']        = array(255,255,255);
        $config['white']        = array(255,255,255);
        $this->ciqrcode->initialize($config);
  
        /* QR Data  */
        $params['data']     = $data;
        $params['level']    = 'L';
        $params['size']     = 10;
        $params['savename'] = FCPATH.$config['imagedir']. $save_name;
        
        $this->ciqrcode->generate($params);

        /* Return Data */
        $return = array(
            'content' => $data,
            'file'    => $dir. $save_name
        );
        return $return;
    }

	public function index()
	{
		$data['title'] = "FORM Update PENGIRIMAN";
		$data['layout'] = "pengiriman/managepublic";

		$data['data'] = new StdClass();
		$data['data']->id_pengiriman = "";
		$data['data']->tanggal = "";
		$data['data']->id_kategori = "";
		$data['data']->kategori = "";
		$data['data']->barang = "";
		$data['data']->id_pelanggan = "";
		$data['data']->pelanggan = "";
		$data['data']->alamat = "";
		$data['data']->id_kurir = "";
		$data['data']->kurir = "";
		$data['data']->status = "";
		$data['data']->keterangan = "";
		$data['data']->penerimaan = "";
		$data['data']->no_po = "";
		$data['data']->no_kendaraan = "";
		// $data['data']->autocode = $this->generate_code();
		
		// if($id)
		// {
		// 	$dt =  $this->pengiriman_model->get_by("pg.id_pengiriman",$id,true);
		// 	if(!empty($dt))
		// 		$data['data'] = $dt;
		// }
		$data['data']->public = true;
		$this->load->view('templatepublic',$data);
	}
	
	public function save()
	{
		// $this->cekLoginStatus("helper",true);
		
		$data = array();
		$post = $this->input->post();
		
		if($post)
		{
			$dt =  $this->pengiriman_model->get_by("pg.id_pengiriman",$post['id_pengiriman'],true);
			$error = array();
			$id = $dt->id_pengiriman;
			// var_dump($dt);
			if(!empty($post['id_pengiriman']))
				$data['id_pengiriman'] = $post['id_pengiriman'];
			else
				$error[] = "id tidak boleh kosong"; 
				
			// if(!empty($post['tanggal']))
			$tanggal = date('d/m/Y');
				$data['tanggal_diterima'] =  DateTime::createFromFormat('d/m/Y', $tanggal)->format('Y-m-d');
			// else
			// 	$error[] = "tanggal tidak boleh kosong"; 
			
			// if(!empty($post['id_pelanggan']))
				// $data['id_pelanggan'] = $dt->id_pelanggan;
			// else
			// 	$error[] = "pelanggan tidak boleh kosong";
			
			// if(!empty($post['id_kurir']))
				// $data['id_kurir'] = $post->id_kurir;
			// else
			// 	$error[] = "kurir tidak boleh kosong";
			
			// if(!empty($post['no_po']))
			// 	$data['no_po'] = $post['no_po'];
			// else
			// 	$error[] = "no po tidak boleh kosong";
			
			// if(!empty($post['no_kendaraan']))
			// 	$data['no_kendaraan'] = $post['no_kendaraan'];
			// else
			// 	$error[] = "no kendaraan tidak boleh kosong";

			
			$data['status'] = 2;
			
			// if(!empty($id))
			// {
			// 	if(!empty($post['status']))
			// 		$data['status'] = $post['status'];
			// 	else
			// 		$error[] = "status tidak boleh kosong";
			// }
			
			if($data['status'] != 1)
			{
				if(!empty($post['penerima']))
					$data['penerima'] = $post['penerima'];
				else
					$error[] = "keterangan tidak boleh kosong";
				
				if(!empty($post['keterangan']))
					$data['keterangan'] = $post['keterangan'];
				else
					$error[] = "keterangan tidak boleh kosong";
			}
			
			// if(empty($error))
			// {
			// 	if(empty($id))
			// 	{
			// 		$cekpengiriman = $this->pengiriman_model->get_by("pg.id_pengiriman",$post['id_pengiriman']);
			// 		if(!empty($cekpengiriman))
			// 			$error[] = "id sudah terdaftar";
			// 	}
			// }
			// var_dump($data);die;
			if(empty($error))
			{
				
				
				// var_dump($dt);
				// $dti =  $this->pengiriman_model->get_detail_id($post['id_pengiriman']);
				// $dtq =  $this->pengiriman_model->get_detail_qty($post['id_pengiriman']);
				// var_dump($dti);
				// var_dump($dtq);die;
				$save = $this->pengiriman_model->save($id,$data,false);
				
				// $detailkode = $dti;
				// $detailjumlah = $dtq;

				
				
				// foreach($detailkode as $key => $val)
				// {
					
				// 	if(empty($id))
				// 		$detail['id_pengiriman'] = $data['id_pengiriman'];
				// 	else
				// 		$detail['id_pengiriman'] = $id;
						
				// 	$detail['id_barang'] = $val;
				// 	$detail['qty'] = $detailjumlah[$val];
				// 	$this->pengiriman_model->save_detail($detail);
				// }
				
				if(!empty($id))
				{
					$this->pengiriman_model->remove_detail($id);
				}
				
				// echo "data berhasil di update";
				// sleep(5);
				// if($post['action'] == "save")
				// 	redirect("pengirimanpublic/managepublic/".$id);
				// else
				print ("<br><br><br><script>alert('Update Pengiriman berhasil')</script><h1><center>Back to <a href='".site_url()."/login'>Login</a> </center></h1>");
					// redirect("login");
			}
			else
			{
				$err_string = "<ul>";
				foreach($error as $err)
					$err_string .= "<li>".$err."</li>";
				$err_string .= "</ul>";
				
				$this->session->set_flashdata('admin_save_error', $err_string);
				redirect("pengirimanpublic/managepublic/".$id);
			}
		}
		else
		  redirect("pengirimanpublic");
	}

	// public function bindex()
	// {
	// 	$this->cekLoginStatus("helper",true);
		
	// 	$data['title'] = "DATA PENGIRIMAN";
	// 	$data['layout'] = "pengiriman/index";
			
	// 	$filter = new StdClass();
	// 	$filter->keyword = trim($this->input->get('keyword'));
		
	// 	$orderBy = $this->input->get('orderBy');
	// 	$orderType = $this->input->get('orderType');
	// 	$page = $this->input->get('page');
		
	// 	$limit = 15;
	// 	if(!$page)
	// 		$page = 1;
		
	// 	$offset = ($page-1) * $limit;
		
	// 	list($data['data'],$total) = $this->pengiriman_model->getAll($filter,$limit,$offset,$orderBy,$orderType);
		
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = site_url("pengiriman?");
	// 	$config['total_rows'] = $total;
	// 	$config['per_page'] = $limit;
	// 	$config['query_string_segment'] = 'page';
	// 	$config['use_page_numbers']  = TRUE;
	// 	$config['page_query_string'] = TRUE;
		
	// 	$this->pagination->initialize($config);
	// 	$this->load->view('template',$data);
	// }
	
	// public function manage($id = "")
	// {
	// 	$this->cekLoginStatus("helper",true);
		
	// 	$data['title'] = "FORM PENGIRIMAN";
	// 	$data['layout'] = "pengiriman/manage";

	// 	$data['data'] = new StdClass();
	// 	$data['data']->id_pengiriman = "";
	// 	$data['data']->tanggal = "";
	// 	$data['data']->id_kategori = "";
	// 	$data['data']->kategori = "";
	// 	$data['data']->barang = "";
	// 	$data['data']->id_pelanggan = "";
	// 	$data['data']->pelanggan = "";
	// 	$data['data']->alamat = "";
	// 	$data['data']->id_kurir = "";
	// 	$data['data']->kurir = "";
	// 	$data['data']->status = "";
	// 	$data['data']->keterangan = "";
	// 	$data['data']->penerimaan = "";
	// 	$data['data']->no_po = "";
	// 	$data['data']->no_kendaraan = "";
	// 	$data['data']->autocode = $this->generate_code();
		
	// 	if($id)
	// 	{
	// 		$dt =  $this->pengiriman_model->get_by("pg.id_pengiriman",$id,true);
	// 		if(!empty($dt))
	// 			$data['data'] = $dt;
	// 	}
		
	// 	$this->load->view('template',$data);
	// }
	
	// public function save()
	// {
	// 	$this->cekLoginStatus("helper",true);
		
	// 	$data = array();
	// 	$post = $this->input->post();
		
	// 	if($post)
	// 	{
	// 		$error = array();
	// 		$id = $post['id'];
			
	// 		if(!empty($post['id_pengiriman']))
	// 			$data['id_pengiriman'] = $post['id_pengiriman'];
	// 		else
	// 			$error[] = "id tidak boleh kosong"; 
				
	// 		if(!empty($post['tanggal']))
	// 			$data['tanggal'] =  DateTime::createFromFormat('d/m/Y', $post['tanggal'])->format('Y-m-d');
	// 		else
	// 			$error[] = "tanggal tidak boleh kosong"; 
			
	// 		if(!empty($post['id_pelanggan']))
	// 			$data['id_pelanggan'] = $post['id_pelanggan'];
	// 		else
	// 			$error[] = "pelanggan tidak boleh kosong";
			
	// 		if(!empty($post['id_kurir']))
	// 			$data['id_kurir'] = $post['id_kurir'];
	// 		else
	// 			$error[] = "kurir tidak boleh kosong";
			
	// 		if(!empty($post['no_po']))
	// 			$data['no_po'] = $post['no_po'];
	// 		else
	// 			$error[] = "no po tidak boleh kosong";
			
	// 		if(!empty($post['no_kendaraan']))
	// 			$data['no_kendaraan'] = $post['no_kendaraan'];
	// 		else
	// 			$error[] = "no kendaraan tidak boleh kosong";

			
	// 		$data['status'] = 1;
			
	// 		if(!empty($id))
	// 		{
	// 			if(!empty($post['status']))
	// 				$data['status'] = $post['status'];
	// 			else
	// 				$error[] = "status tidak boleh kosong";
	// 		}
			
	// 		if($data['status'] != 1)
	// 		{
	// 			if(!empty($post['penerima']))
	// 				$data['penerima'] = $post['penerima'];
	// 			else
	// 				$error[] = "keterangan tidak boleh kosong";
				
	// 			if(!empty($post['keterangan']))
	// 				$data['keterangan'] = $post['keterangan'];
	// 			else
	// 				$error[] = "keterangan tidak boleh kosong";
	// 		}
			
	// 		if(empty($error))
	// 		{
	// 			if(empty($id))
	// 			{
	// 				$cekpengiriman = $this->pengiriman_model->get_by("pg.id_pengiriman",$post['id_pengiriman']);
	// 				if(!empty($cekpengiriman))
	// 					$error[] = "id sudah terdaftar";
	// 			}
	// 		}
			
	// 		if(empty($error))
	// 		{
	// 			$save = $this->pengiriman_model->save($id,$data,false);
				
	// 			$detailkode = $post['detail']['id_barang'];
	// 			$detailjumlah = $post['detail']['qty'];

	// 			if(!empty($id))
	// 			{
	// 				$this->pengiriman_model->remove_detail($id);
	// 			}
				
	// 			foreach($detailkode as $key => $val)
	// 			{
					
	// 				if(empty($id))
	// 					$detail['id_pengiriman'] = $data['id_pengiriman'];
	// 				else
	// 					$detail['id_pengiriman'] = $id;
						
	// 				$detail['id_barang'] = $val;
	// 				$detail['qty'] = $detailjumlah[$val];
	// 				$this->pengiriman_model->save_detail($detail);
	// 			}
				
				
	// 			$this->session->set_flashdata('admin_save_success', "data berhasil disimpan");
				
	// 			if($post['action'] == "save")
	// 				redirect("pengiriman/manage/".$id);
	// 			else
	// 				redirect("pengiriman");
	// 		}
	// 		else
	// 		{
	// 			$err_string = "<ul>";
	// 			foreach($error as $err)
	// 				$err_string .= "<li>".$err."</li>";
	// 			$err_string .= "</ul>";
				
	// 			$this->session->set_flashdata('admin_save_error', $err_string);
	// 			redirect("pengiriman/manage/".$id);
	// 		}
	// 	}
	// 	else
	// 	  redirect("pengiriman");
	// }
	
	// public function delete($id = "")
	// {
	// 	$this->cekLoginStatus("helper",true);
		
	// 	if(!empty($id))
	// 	{
	// 		$cek = $this->pengiriman_model->get_by("pg.id_pengiriman",$id,true);
	// 		if(empty($cek))
	// 		{
	// 			$this->session->set_flashdata('admin_save_error', "ID tidak terdaftar");
	// 			redirect("pengiriman");
	// 		}
	// 		else
	// 		{
	// 			$this->pengiriman_model->remove($id);
	// 			$this->session->set_flashdata('admin_save_success', "data berhasil dihapus");
	// 			redirect("pengiriman");
	// 		}
	// 	}
	// 	else
	// 		redirect("pengiriman");
	// }
	
	// public function generate_code()
	// {
	// 	$prefix = "KRM".date("Ymd");
	// 	$code = "001";
		
	// 	$last = $this->pengiriman_model->get_last();
	// 	if(!empty($last))
	// 	{
	// 		$number = substr($last->id_pengiriman,10,3) +1;
	// 		$code = str_pad($number, 3, "0", STR_PAD_LEFT);
	// 	}
	// 	return $prefix.$code;
	// }
	
	// public  function cetak($id)
	// {
	// 	$this->cekLoginStatus("helper",true);
		
	// 	$data['title'] = "CETAK PENGIRIMAN";
	// 	$data['layout'] = "pengiriman/cetak";
		
	// 	$this->load->library("qrcodeci");
	// 	if($id)
	// 	{
	// 		$dt =  $this->pengiriman_model->get_by("pg.id_pengiriman",$id,true);
	// 		if($dt)
	// 		{
	// 			$this->qrcodeci->generate($dt->id_pengiriman);
	// 			$data['data'] = $dt;
	// 			$this->load->view('blank',$data);
	// 		}
	// 		else
	// 		{
	// 			redirect("pengiriman");
	// 		}
			
	// 	}
	// 	else
	// 	{
	// 		redirect("pengiriman");
	// 	}
	// }
	
	// public function rekap()
	// {
	// 	$this->cekLoginStatus("manager",true);
		
	// 	$data['title'] = "Laporan Pengiriman Barang";
	// 	$data['layout'] = "pengiriman/rekap";
		
	// 	$action = $this->input->get('action');
		
	// 	$from = $this->input->get('from');
	// 	$to = $this->input->get('to');
		
	// 	$status = $this->input->get('status');
		
	// 	if(!$from)
	// 		$from = date('Y-m-d',strtotime("-30 days")); ;
			
	// 	if(!$to)
	// 		$to = date("Y-m-d");
		
	// 	if(!$status)
	// 		$status = "all";
		
	// 	$filter = new StdClass();
	// 	$filter->from = date('Y-m-d',strtotime($from));
	// 	$filter->to = date('Y-m-d',strtotime($to));
	// 	$filter->status = $status;
		
	// 	list($data['data'],$total) = $this->pengiriman_model->getAll($filter,0,0,"pg.id_pengiriman","desc");
		
	// 	if($action)
	// 	{
	// 		$this->export($action,$data['data'],$filter);
	// 	}
	// 	else
	// 			$this->load->view('template',$data);
	
	// }
	
	// public function export($action,$data,$filter)
	// {
	// 	$this->cekLoginStatus("manager",true);
		
	// 	$title = "Laporan Data Pengiriman Barang";
	// 	$file_name = $title."_".date("Y-m-d");
	// 	$headerTitle = $title;
		
	// 	if(empty($data))
	// 	{
	// 		$this->session->set_flashdata('admin_save_error', "data tidak tersedia");
	// 		redirect("pengiriman/rekap?from=".$filter->from."&to=".$filter->to."&status=".$filter->status."");
	// 	}
	// 	else
	// 	{	
	// 		if($action == "excel")
	// 		{
	// 			$this->load->library("excel");
	// 			$this->excel->setActiveSheetIndex(0);
	// 			$this->excel->stream($file_name.'.xls',$this->generate_format($data),$headerTitle);
	// 		}
	// 	}
	// }
	
	// public function generate_format($data)
	// {
	// 	$newdata = array();
	// 	$grantotal = 0;
	// 	foreach($data as $key => $dt)
	// 	{
			
	// 		$dat = array();
	// 		$dat['ID Pengiriman'] = $dt['id_pengiriman'];
	// 		$dat['Tanggal'] = date("d-m-Y",strtotime($dt['tanggal']));
	// 		$dat['Pelanggan'] = $dt['pelanggan'];
	// 		$dat['No. PO'] = $dt['no_po'];
	// 		$dat['Kurir'] = $dt['kurir'];
	// 		$dat['No. Kendaraan'] = $dt['no_kendaraan'];
	// 		$dat['Penerima'] = $dt['penerima'];
			
	// 		$status = "Dikirim";
	// 		if($dt['status'] == 2)
	// 			$status = "Diterima";
	// 		else if($dt['status'] == 3)
	// 			$status = "Ditolak";
	// 		else if($dt['status'] == 4)
	// 			$status = "Diterima sebagian";

	// 		$dat['Status'] = $status;
			
	// 		$newdata[] = $dat;
	// 	}
		
		
	// 	return $newdata;
	// }
	
}
