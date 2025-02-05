<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'tutorial'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas, harga*kuantitas AS total_byr 
		FROM sales';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>ID PRODUK</th>
				<th>TGL TRANSAKSI</th>
				<th>KUANTITAS</th>
				<th>HARGA</th>
				<th>TOTAL BYR</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['id_produk'].'</td>
			<td>'.$row['tgl_transaksi'].'</td>
			<td>'.$row['kuantitas'].'</td>
			<td>'.$row['harga'].'</td>
			<td>'.number_format($row['total_byr'], 0, ',', '.').'</td>
		</tr>';
}
echo '
	</tbody>
</table>';