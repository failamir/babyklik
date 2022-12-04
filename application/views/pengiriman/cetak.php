<style>
	@media print {
		@page {
		  size: 8.267in 5.5in;
		  margin: 0;
		}
		.header-pt
		{
			font-weight:bold;
		}
	}
	.tbl-resi
	{
		font-size:11px;
	}
	.table-wrapper
	{
		border:1px solid gray;
		border-top:4px solid gray;
		height:100%;
		padding-top:5px;
	}
	.border-bottom
	{
		border-bottom:1px solid gray;
	}
	.border-top
	{
		border-top:1px solid gray;
	}
	.border-left
	{
		border-left:1px solid gray;
	}
	.img-qrcode
	{
		position:absolute;
		top:0;
		right:0;
	}
	.img-logo
	{
		position:absolute;
		top:10px;
		left:20px;
	}
</style>			
<div class="content-wrapper print resi">
	<table>
		<tr>
			<td width='500' align="center" valign='top'>
				<img class="img-logo" src="<?php echo base_url('assets/images/logo.jpeg')?>" width="100" height="90" />
				<div class='header-pt'>BabyKlik Shop</div>
				<div class='header-address'>Jalan Pengasinan Raya II</div>
				<div class='header-address'>No. 3A-B RT 02 RW 02, Pengasinan,</div>
				<div class='header-address'>Rawalumbu, Bekasi, Jawa Barat 17115</div>
			</td>
			<td valign='top'>
				<img class="img-qrcode" src="<?php echo base_url("export")."/".$data->id_pengiriman.".png"?>" width="90" height="90" />
				<div>
					Tgl   : Depok, <?php echo date('d M Y',strtotime($data->tanggal)); ?>
				</div>
				<div class="mt10">
					PO No : <?php echo $data->no_po; ?>
				</div>
				<div class='mt5'>
					SJ No : <?php echo $data->id_pengiriman; ?>
				</div>
			</td>
		</tr>
	</table>
	<table style="border-top:4px solid gray; margin-top:15px; width:100%;">
		<tr>
			<td align="center" style="padding-top:5px;">
				<div class='header-pt'>SURAT JALAN</div>
			</td>
		<tr>
		<tr>
			<td style="padding-bottom:5px;">
				<div>
					KEPADA Yth.
				</div>
				<div>
					<?php echo $data->pelanggan; ?>
				</div>
				<div>
					<?php echo $data->alamat; ?>
				</div>
			</td>
		</tr>
	</table>
	<div class='table-wrapper'>
		<table style="width:100%"  style="mt10"  cellpadding='5' cellspacing='0'>
			<tr >
				<th class="border-bottom border-top " height="10">No</th>
				<th class="border-bottom border-top">Kode Barang</th>
				<th class="border-bottom border-top">Nama Barang</th>
				<th class="border-bottom border-top">Del No</th>
				<th class="border-bottom border-top">Sat</th>
				<th class="border-bottom border-top">Harga</th>
				<th class="border-bottom border-top">QTY</th>
				<th class="border-bottom border-top">Subtotal</th>
			</tr>
			<tbody>
			<?php if($data->barang != null): ?>
			<?php $barang = explode("===",$data->barang); ?>
			<?php $i = 1; ?>
			<?php foreach($barang as $br): ?>
			<?php $b = explode("|",$br) ?>
			<?php $subtotal = $b[4] * $b[6]; ?>
			<tr  class="tbl-resi">
				<td align="center" height="10"><?php echo $i; ?></td>
				<td align="center"><?php echo $b[0]; ?></td>
				<td align="center"><?php echo $b[1]; ?></td>
				<td align="center"><?php echo $b[5]; ?></td>
				<td align="center"><?php echo $b[3]; ?></td>
				<td align="center"><?php echo $b[6]; ?></td>
				<td align="center"><?php echo $b[4]; ?></td>
				<td align="center"><?php echo $subtotal; ?></td>
			</tr>
			<?php $i++; ?>
			<?php endforeach ?>
			<tr class="">
				<td colspan = '7' class="border-top"><div style='text-align:right;'>Total : </div></td>
				<td align="center" class="border-top"><?php echo $data->total_harga; ?></td>
			</tr>
			<?php endif ?>
		</tbody>
		</table>
	</div>
	<table style="width:100%">
		<tr>
			<td valign='top' colspan="2" align="center">
				<div class='mt10'>
					Admin <br><br> (_________)
				</div>
			</td>
			<td valign='top' colspan="2" align="center">
				<div class='mt10'>
					Pengirim <br><br> (_________) <br>
					Kendaraan No. <?php echo $data->no_kendaraan; ?>
				</div>
			</td>
			<td valign='top' colspan="2" align="center">
				<div class='mt10'>
					Penerima <br><br> (_________)
				</div>
			</td>
		</tr>
	</table>
	
</div>
<script>
	$(function(){
		window.print();
	});
</script>
