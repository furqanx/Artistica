$(document).ready(function(){
    $(".files").attr('data-before',"Drag file here or click the above button");
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name; 
        $(".files").attr('data-before',fileName);
    
    });
});

// Mendapatkan elemen input file
const inputImage = document.getElementById('imageInput');
// Mendapatkan elemen preview gambar
const imagePreview = document.getElementById('imagePreview');

// Ketika input file berubah
inputImage.addEventListener('input', function() {

    // Membaca file gambar yang dipilih
    const file = this.files[0];

    // Validasi apakah file yang dipilih adalah gambar
    if (!file.type.match('image.*')) {
        alert('File yang dipilih bukan gambar');
        return;
    }

    // Membuat FileReader object
    const reader = new FileReader();

    // Ketika proses pembacaan file selesai
    reader.onload = (function(img) {
        return function(e) {
        // Menampilkan gambar di elemen preview
        img.src = e.target.result;
        };
    })(imagePreview);
    
    // Membaca file sebagai data URL
    reader.readAsDataURL(file);

});