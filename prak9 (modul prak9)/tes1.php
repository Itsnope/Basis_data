<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'pra_n'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}

$sql = 'select isbn, judul, kategori, harga, if(kategori="A", (harga-harga*25/100), if(kategori="B", (harga-harga*50/100), (harga-harga*75/100))) as diskon from buku';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table>
		<thead>
			<tr>
				<th>ISBN</th>
				<th>JUDUL</th>
				<th>KATEGORI</th>
				<th>HARGA</th>
				<th>DISKON</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr>
			<td>'.$row['isbn'].'</td>
			<td>'.$row['judul'].'</td>
			<td>'.$row['kategori'].'</td>
			<td>'.$row['harga'].'</td>
			<td>'.number_format($row['diskon'], 0, ',', '.').'</td>
		</tr>';
}
echo '
	</tbody>
</table>';
