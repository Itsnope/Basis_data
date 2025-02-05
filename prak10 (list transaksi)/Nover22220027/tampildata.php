<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'tutorial'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas 
		FROM sales';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table border="1">
		<thead>
			<tr bgcolor="grey">
				<th>ID PRODUK</th>
				<th>TGL TRANSAKSI</th>
				<th>HARGA</th>
				<th>KUANTITAS</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr align="center">
			<td>'.$row['id_produk'].'</td>
			<td>'.$row['tgl_transaksi'].'</td>
			<td>'.number_format($row['harga'], 0, ',', '.').'</td>
			<td class="right">'.$row['kuantitas'].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';