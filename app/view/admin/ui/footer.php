<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js" lang="javascript"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#example1").DataTable();
    $("#example2").DataTable();
});

$(document).ready(function() {
    var response = '';
    $("#cari").change(function() {
        $.ajax({
            type: "POST",
            url: "../payment/act-barang.php?cari_barang=yes",
            data: 'keyword=' + $(this).val(),
            async: false,
            beforeSend: function(response) {
                $("#hasil_cari").hide();
                $("#tunggu").html(
                    '<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html, response) {
                $("#tunggu").html('');
                $("#hasil_cari").show();
                $("#hasil_cari").html(html);
            }
        });
        return response;
    });
});
</script>
</body>

</html>