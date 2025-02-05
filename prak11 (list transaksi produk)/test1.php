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

echo '<table>
		<thead>
			<tr>
				<th>ID PRODUK</th>
				<th>TGL TRANSAKSI</th>
				<th>HARGA</th>
				<th>KUANTITAS</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_row($query))
{
	echo '<tr>
			<td>'.$row[0].'</td>
			<td>'.$row[1].'</td>
			<td>'.number_format($row[2], 0, ',', '.').'</td>
			<td class="right">'.$row[3].'</td>
		</tr>';
}
echo '
	</tbody>
</table>';