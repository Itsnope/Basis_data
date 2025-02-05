<?php
$db_host = 'localhost'; // Nama Server
$db_user = 'root'; // User Server
$db_pass = ''; // Password Server
$db_name = 'pra_22220027'; // Nama Database

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());	
}
$sql = 'SELECT isbn, judul, kategori, harga, if(kategori="A", harga*25/100, if(kategori="B", harga*50/100, harga*75/100)) AS diskon
		FROM buku';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table border="1">
		<thead>
			<tr bgcolor="grey">
				<th>ISBN</th>
				<th>JUDUL</th>
				<th>KATEGORI</th>
				<th>HARGA</th>
				<th>DISKON DIPEROLEH</th>
			</tr>
		</thead>
		<tbody>';
		
while ($row = mysqli_fetch_array($query))
{
	echo '<tr align="center">
			<td>'.$row['isbn'].'</td>
			<td>'.$row['judul'].'</td>
			<td>'.$row['kategori'].'</td>
			<td>'.number_format($row['harga'], 0, ',', '.').'</td>
			<td>'.number_format($row['diskon'], 0, ',', '.').'</td>
		</tr>';
}
echo '
	</tbody>
</table>';