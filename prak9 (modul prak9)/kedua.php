<HTML>
<HEAD>
<title>Koneksi Database MySQL</title>
</HEAD>
<BODY>
<h1>Koneksi database dengan mysql_fetch_assoc</h1>
<?
$conn=mysqli_connect ("localhost","root","") or die ("koneksi gagal");
mysqli_select_db("prak9",$conn);
$hasil = mysqli_query("select * from liga",$conn); while ($row=mysqli_fetch_array($hasil)) {
echo "Liga " .$row["negara"];
echo " mempunyai " .$row[“champion”];
echo " wakil di liga champion <br>";
}
?>
</BODY>
</HTML