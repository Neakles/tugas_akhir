<html>
  <body>
    <button id="pay-button">Pay!</button>
    <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre> 

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-D2FxyeuTkS3Fgqjx"></script>
    <script type="text/javascript">
    $("#pay-button").click(function(e) {
        e.preventDefault();
        $(this).attr("disabled", "disabled");
        var _jumlah_angsuran = $('#jumlah_angsuran').val();
        var _total = $('#hasil').val();
        var _fullname = $('#full_name').val();
        var _nopinjaman = $('#no_pinjaman').val();
        var _bil1 = $('#bil1').val();
        var _bil2 = $('#bil2').val();
        //alert('a');exit;
        $.ajax({
            method: "POST",
            url: '<?= site_url() ?>/snap/token',
            cache: false,
            data: {
                jumlah_angsuran: _jumlah_angsuran,
                total: _total,
                fullname: _fullname,
                nopinjaman: _nopinjaman,
                bil1: _bil1,
                bil2: _bil2,
            },
            success: function(data) {
                console.log('token = ' + data);
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                }
                snap.pay(data, {
                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>
  </body>
</html>