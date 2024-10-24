document.getElementById('capture-btn').addEventListener('click', function() {
  html2canvas(document.getElementById('capture-area')).then(function(canvas) {
    // แปลง canvas เป็น URL ที่สามารถดาวน์โหลดเป็นรูปภาพได้
    var link = document.createElement('a');
    link.href = canvas.toDataURL('image/png');
    link.download = 'capture.png';
    link.click();
  });
});
