<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<script>
        function calculateChange() {
            const totalAmount= parseFloat(document.getElementById('totalAmount').innerText);
            const amountGiven = parseFloat(document.getElementById('amountGiven').value);
            const change = amountGiven - totalAmount;

            document.getElementById('change').innerText = change >= 0 ? change.toFixed(0) : "benget sia ngabeledug,duit kurang tong hayang jajan";
        }
    </script>
</head>
<body>

    <div class="receipt">
        <h2>Pembayaran</h2>
        <div class="receipt-details">
            <p><strong>Date:</strong> <?php echo date('Y-m-d'); ?></p>
            <p><strong>Alamat:</strong> Jl. Kp.Nanggoh Natura RT 02/01 Desa Lemah Duhur Kec. Caringin</p>
            <table border="1">
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <?php
                session_start();
                $totalHarga = 0;
                if(isset($_SESSION['kasir'])){
                foreach ($_SESSION['kasir'] as $value) {
                    $total = $value['jumlah'] * $value['harga'];
                    $totalHarga += $total;
                
            ?>
                <tr>
                    <td><?php echo $value['produk']; ?></td>
                    <td><?php echo $value['jumlah']; ?></td>
                    <td><?php echo $value['harga']; ?></td>
                    <td><?php echo $total; ?></td>
                </tr>
                <?php }
                
                }?>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td id="totalAmount"><?php echo $totalHarga; ?></td>
                </tr>
            </table>
        </div>
        <div class="receipt-actions">
            <label for="amountGiven">Yang Dibayarkan:</label>
            <input type="number" id="amountGiven" step="0.01">
            <button onclick="calculateChange()">Bayar</button>
            <p><strong>Kembalian:</strong> <span id="change"></span></p>
            <i class='bx bxs-printer'><a href="javascript:window.print()" class="btn-print">Print</a></i>
        </div>
    </div>

    <button type="kembali" name="kembali" value="kembali"><a href="index.php">Kembali</a></button>

</body>
</html>