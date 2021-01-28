<!DOCTYPE html>
<html>
<head>
<title>Lokasi Absen Pegawai Kementerian</title>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDicMX1ogOrEPpj7wk8zv8s6Y0t80Ylmmk&callback=initialize" async defer></script>
<script type="text/javascript">   
    var marker;
    function initialize(){
        // Variabel untuk menyimpan informasi lokasi
        var infoWindow = new google.maps.InfoWindow;
        //  Variabel berisi properti tipe peta
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        // Pembuatan peta
        var peta = new google.maps.Map(document.getElementById('googleMap'), mapOptions);      
		// Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();
        // Pengambilan data dari database MySQL
        <?php
		// Sesuaikan dengan konfigurasi koneksi Anda
			// $host 	  = "localhost";
			// $username = "root";
			// $password = "";
			// $Dbname   = "googlemaps";
			// $db 	  = new mysqli($host,$username,$password,$Dbname);
			
			// $query = $db->query("SELECT * FROM lokasi ORDER BY nama_lokasi ASC");
			// while ($row = $query->fetch_assoc()) {
			// 	$nama = $row["nama_lokasi"];
			// 	$lat  = $row["latitude"];
			// 	$long = $row["longitude"];
			// 	echo "addMarker($lat, $long, '$nama');\n";
            // }
            
            foreach ($absen as $abs){


                $nama = $abs['nama_pegawai'] . ' - ' . $abs['nama_satker'];
                $lat = $abs['lat_masuk'];
                $long = $abs['long_masuk'];
                
                if ($lat != ''){
                    echo "addMarker($lat, $long, '$nama');\n";
                }

                
            }
        ?> 
        // Proses membuat marker 
        function addMarker(lat, lng, info){
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: peta,
                position: lokasi
            });       
            peta.fitBounds(bounds);
            bindInfoWindow(marker, peta, infoWindow, info);
         }
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, peta, infoWindow, html){
            google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(peta, marker);
          });
        }
    }
</script>
</head>
<body>

  <div id="googleMap" style="width:1366px;height:768px;"></div>
  
</body>
</html>