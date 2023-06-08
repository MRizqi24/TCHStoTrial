 <!-- Modal -->
 <div class="modal" id="cameraModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal dengan Kotak Kamera</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Kotak untuk menampilkan kamera -->
          <div id="cameraBox" style="width: 100%; height: 150px;"></div>
          <!-- Hasil pemindaian -->
            <div id="result"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Kotak untuk menampilkan kamera -->



  <!-- Script untuk menggunakan kamera -->
  <script>
// // Ambil elemen untuk kotak kamera dan hasil pemindaian
// var cameraBox = document.getElementById('cameraBox');
//   var resultElement = document.getElementById('result');

//   // Inisialisasi QuaggaJS
//   Quagga.init({
//     inputStream: {
//       name: "Live",
//       type: "LiveStream",
//       target: cameraBox
//     },
//     decoder: {
//       readers: ["ean_reader"] // Ganti dengan pembaca kode yang sesuai dengan kebutuhan Anda
//     }
//   }, function(err) {
//     if (err) {
//       console.error('Kamera tidak dapat diakses:', err);
//       return;
//     }
//     // Mulai pemindaian ketika QuaggaJS diinisialisasi
//     Quagga.start();
//   });

//   // Tangani hasil pemindaian
//   Quagga.onDetected(function(result) {
//     var code = result.codeResult.code;
//     resultElement.innerHTML = "Hasil Pemindaian: " + code;
//     // Hentikan pemindaian setelah mendeteksi kode
//     Quagga.stop();
//   });


  </script>
