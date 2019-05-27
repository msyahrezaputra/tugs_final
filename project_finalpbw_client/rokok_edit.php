<?php
//Curl untuk tambah data via api
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "http://localhost/project_finalpbw/api/rokok/ubah",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => $_POST,
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));
	$response_tambah = curl_exec($curl);
	$err = curl_error($curl);
	$response_tambah = json_decode($response_tambah, true);
	if(isset($response_tambah['code']) == 200){
		echo "<script type=\"text/javascript\">alert('Data Berhasil diubah...!!');window.location.href=\"http://localhost/project_finalpbw_client/rokok.php\";</script>";
	}else{
		echo $response_tambah['data'];
	}
} 
//Curl untuk menghapus data dari api

//Curl untuk mengambil detail data makul dari ednpoint api
if(isset($_GET['id'])){
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://localhost/project_finalpbw/api/rokok?id=$_GET[id]",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	$response = json_decode($response, true);
	if(isset($response['data'])){ 
		foreach ($response['data'] as $value); ?>
		<h3>Tambah Data Kos</h3>
		<form class="form-horizontal" method="POST" action="http://localhost/project_finalpbw_client/rokok_edit.php">
			<input type="hidden" name="id" value="<?php echo $value['id']; ?>"/>
			Nama Rokok* <br/>
			<input type="text" placeholder="Nama Rokok" name="nama_rokok" value="<?php echo $value['nama_rokok']; ?>" required/><br/>
			Harga Rokok* <br/>
			<input type="text" placeholder="Harga Rokok" name="harga_rokok" value="<?php echo $value['harga_rokok']; ?>" required/><br/>
			Jumlah Persediaan* <br/>
			<input type="text" placeholder="Jumlah Persediaan" name="jumlah_persediaan" value="<?php echo $value['jumlah_persediaan']; ?>" required/><br/>
			<button type="submit" type="button">
				Submit
			</button>
		</form> <?php
	}
}else{
	echo "Data tidak dikenali";
} ?>