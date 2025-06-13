<?php
// Redirect if accessed directly without form submission
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST['item_description'])) {
    header("Location: invoice.php?error=1");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descriptions = $_POST['item_description'] ?? [];
    $rates = $_POST['item_rate'] ?? [];
    $quantities = $_POST['item_qty'] ?? [];
    $details = $_POST['item_details'] ?? [];

    $subtotal = 0;
    $items = [];

    for ($i = 0; $i < count($descriptions); $i++) {
        $desc = htmlspecialchars($descriptions[$i]);
        $rate = floatval($rates[$i]);
        $qty = intval($quantities[$i]);
        $detail = htmlspecialchars($details[$i]);
        $amount = $rate * $qty;
        $subtotal += $amount;

        $items[] = [
            'desc' => $desc,
            'rate' => $rate,
            'qty' => $qty,
            'detail' => $detail,
            'amount' => $amount,
        ];
    }

    // Discount
    $discountType = $_POST['discountType'] ?? 'none';
    $discountValue = floatval($_POST['discountValue'] ?? 0);
    $discount = 0;
    if ($discountType === 'percent') {
        $discount = ($subtotal * $discountValue) / 100;
    } elseif ($discountType === 'flat') {
        $discount = $discountValue;
    }

    // Tax
    $taxType = $_POST['taxType'] ?? 'none';
    $taxRate = floatval($_POST['taxRate'] ?? 0);
    $inclusive = isset($_POST['inclusive']);
    $tax = 0;
    $taxableSubtotal = $subtotal - $discount;

    if ($taxType === 'on_total') {
        $tax = $inclusive
            ? $taxableSubtotal - ($taxableSubtotal / (1 + $taxRate / 100))
            : ($taxableSubtotal * $taxRate) / 100;
    } elseif ($taxType === 'deducted') {
        $tax = - ($taxableSubtotal * $taxRate) / 100;
    } elseif ($taxType === 'per_item') {
        $tax = ($subtotal * $taxRate) / 100;
    }

    $total = $taxableSubtotal + $tax;
}


// Initialize variables to prevent undefined errors
$logoPath = "";
$signaturePath = "";
$photoPath = "";
$selectedColor = isset($_POST['selected_color']) ? $_POST['selected_color'] : "#3375b7"; // Default blue color

// Process logo upload if present
if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES["logo"]["tmp_name"];
    $fileName = basename($_FILES["logo"]["name"]);
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $logoPath = $uploadDir . uniqid("logo_") . "_" . $fileName;
    move_uploaded_file($tmpName, $logoPath);
}

// Process signature data if present
if (isset($_POST['signature_data']) && !empty($_POST['signature_data'])) {
    $data = $_POST['signature_data'];
    list(, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);
    $signaturePath = 'uploads/signature_' . uniqid() . '.png';
    file_put_contents($signaturePath, $data);
}

// Process photo upload if present
if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES["photo"]["tmp_name"];
    $fileName = basename($_FILES["photo"]["name"]);
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $photoPath = $uploadDir . uniqid("photo_") . "_" . $fileName;
    move_uploaded_file($tmpName, $photoPath);
}

// Get currency symbol and code
$currencySymbol = isset($_POST['currency_symbol']) ? $_POST['currency_symbol'] : "₹";
$currencyCode = isset($_POST['currency_code']) ? $_POST['currency_code'] : "INR";
// Format currency function
function formatCurrency($amount, $symbol)
{
    return $symbol . number_format($amount, 2);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <title>Invoice Preview</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .invoice-container {
            width: 700px;
            margin: 0 auto;
            background-color: #fff;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ccc;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            color: #6a1b9a;
        }

        .logo {
            max-width: 150px;
            max-height: 80px;
            object-fit: contain;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .info-box {
            width: 48%;
        }

        .info-box h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #6a1b9a;
            padding-bottom: 5px;
            border-bottom: 1px solid #6a1b9a;
        }

        .info-box p {
            margin-bottom: 5px;
            font-size: 14px;
        }

        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
        }

        .detail-item span {
            display: block;
        }

        .detail-item .label {
            font-size: 12px;
            color: #777;
        }

        .detail-item .value {
            font-size: 14px;
            font-weight: bold;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            font-size: 14px;
        }

        .items-table th {
            background-color: #6a1b9a;
            color: white;
        }

        .totals {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
        }

        .totals-table {
            /* width: 50%; */
            border-collapse: collapse;
        }

        .totals-table td {
            padding: 8px;
            font-size: 14px;
        }

        .totals-table .total-row td {
            font-weight: bold;
            font-size: 16px;
            border-top: 2px solid #6a1b9a;
        }

        .notes,
        .signature-section,
        .photos-section {
            margin-bottom: 30px;
        }

        <?php
        $selectedColor = isset($_POST['selected_color']) ? htmlspecialchars($_POST['selected_color']) : '#6a1b9a';
        ?>.notes h3,
        .signature-section h3,
        .photos-section h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: <?php echo $selectedColor; ?>;
        }

        .notes p {
            font-size: 14px;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
        }

        .signature-img {
            max-width: 200px;
            max-height: 100px;
            border-bottom: 1px solid #ccc;
        }

        .photo-img {
            max-width: 100%;
            max-height: 300px;
            border: 1px solid #ccc;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .button-container {
            margin-top: 30px;
            display: flex;
            gap: 15rem;
            justify-content: center;
            align-items: center;
        }

        .button {
            padding: 10px 20px;
            background-color: <?php echo $selectedColor; ?>;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .button:hover {
            opacity: 0.9;
        }

        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #6a1b9a;
            /* Match your theme */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @media print {
            #content-to-zoom {
                transform: scale(0.3);
                transform-origin: top left;
            }

            #zoom-controls {
                display: none;
            }
        }

        @media print {
            #content-to-zoom {
                transform: scale(0.3);
                transform-origin: top left;
            }

            #zoom-controls {
                display: none;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-container" id="invoice">
        <div class="header">
            <h1 style="color: <?php echo isset($_POST['selected_color']) ? htmlspecialchars($_POST['selected_color']) : '#ffffff'; ?>">
                <?php echo isset($_POST['invoice_title']) ? htmlspecialchars($_POST['invoice_title']) : 'Invoice'; ?>
            </h1>

            <?php if (!empty($logoPath)): ?>
                <img src="<?php echo $logoPath; ?>" alt="Logo" class="logo">
            <?php endif; ?>
        </div>


        <div class="info-section">
            <div class="info-box">
                <h3 style="color: <?php echo isset($_POST['selected_color']) ? htmlspecialchars($_POST['selected_color']) : '#000000'; ?>">From</h3>

                <p><strong><?php echo isset($_POST['from_name']) ? htmlspecialchars($_POST['from_name']) : ''; ?></strong></p>
                <p><?php echo isset($_POST['from_email']) ? htmlspecialchars($_POST['from_email']) : ''; ?></p>
                <p><?php echo isset($_POST['from_address']) ? htmlspecialchars($_POST['from_address']) : ''; ?></p>
                <p><?php echo isset($_POST['from_phone']) ? htmlspecialchars($_POST['from_phone']) : ''; ?></p>
                <p>Business #: <?php echo isset($_POST['from_business_number']) ? htmlspecialchars($_POST['from_business_number']) : ''; ?></p>
            </div>

            <div class="info-box">
                <h3 style="color: <?php echo isset($_POST['selected_color']) ? htmlspecialchars($_POST['selected_color']) : '#000000'; ?>">Bill To</h3>

                <p><strong><?php echo isset($_POST['bill_name']) ? htmlspecialchars($_POST['bill_name']) : ''; ?></strong></p>
                <p><?php echo isset($_POST['bill_email']) ? htmlspecialchars($_POST['bill_email']) : ''; ?></p>
                <p><?php echo isset($_POST['bill_address']) ? htmlspecialchars($_POST['bill_address']) : ''; ?></p>
                <p><?php echo isset($_POST['bill_phone']) ? htmlspecialchars($_POST['bill_phone']) : ''; ?></p>
                <?php if (!empty($_POST['bill_mobile'])): ?>
                    <p>Mobile: <?php echo htmlspecialchars($_POST['bill_mobile']); ?></p>
                <?php endif; ?>
                <?php if (!empty($_POST['bill_fax'])): ?>
                    <p>Fax: <?php echo htmlspecialchars($_POST['bill_fax']); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="invoice-details">
            <div class="detail-item">
                <span class="label">Invoice Number</span>
                <span class="value"><?php echo isset($_POST['invoice_number']) ? htmlspecialchars($_POST['invoice_number']) : ''; ?></span>
            </div>
            <div class="detail-item">
                <span class="label">Invoice Date</span>
                <span class="value"><?php echo isset($_POST['invoice_date']) ? htmlspecialchars($_POST['invoice_date']) : date('Y-m-d'); ?></span>
            </div>
            <div class="detail-item">
                <span class="label">Payment Terms</span>
                <span class="value"><?php echo isset($_POST['invoice_terms']) ? htmlspecialchars($_POST['invoice_terms']) : 'On Receipt'; ?></span>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <?php $bgColor = isset($_POST['selected_color']) ? htmlspecialchars($_POST['selected_color']) : '#3063ba'; ?>
                    <th style="width: 35%; background-color: <?php echo $bgColor; ?>; color: #fff;">Description</th>
                    <th style="width: 35%; background-color: <?php echo $bgColor; ?>; color: #fff;">Details</th>
                    <th style="width: 10%; background-color: <?php echo $bgColor; ?>; color: #fff;">Rate</th>
                    <th style="width: 10%; background-color: <?php echo $bgColor; ?>; color: #fff;">Qty</th>
                    <th style="width: 10%; background-color: <?php echo $bgColor; ?>; color: #fff;">Amount</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= $item['desc'] ?></td>
                        <td><?= $item['detail'] ?></td>
                        <td><?= number_format($item['rate'], 2) ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= number_format($item['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <div class="totals">
            <table class="totals-table">


                <tr>
                    <td class="label">Subtotal :</td>
                    <td>₹<?= number_format($subtotal, 2) ?></td>

                </tr>

                <tr>
                    <td class="label">Discount :</td>
                    <td>₹<?= number_format($discount, 2) ?></td>
                </tr>

                <tr>
                    <td class="label">Tax :</td>
                    <td>₹<?= number_format($tax, 2) ?></td>
                </tr>

                <tr class="summary">
                    <td>Total:</td>
                    <td>₹<?= number_format($total, 2) ?></td>
                </tr>

            </table>
        </div>

        <?php if (!empty($_POST['notes'])): ?>
            <div class="notes">
                <h3>Notes</h3>
                <p><?php echo nl2br(htmlspecialchars($_POST['notes'])); ?></p>
            </div>
        <?php endif; ?>

        <div style="display: flex; justify-content: space-between; align-items: center;">
            <?php if (!empty($signaturePath)): ?>
                <div class="signature-section">
                    <h3>Signature</h3>
                    <img src="<?php echo $signaturePath; ?>" alt="Signature" class="signature-img">
                </div>
            <?php endif; ?>

            <?php if (!empty($photoPath)): ?>
                <div class="photos-section" style="width: 150px; height: 150px;">
                    <h3>Photos</h3>
                    <img src="<?php echo $photoPath; ?>" alt="Photo" class="photo-img">
                </div>
            <?php endif; ?>
        </div>
        <div class="footer">
            <p>Thank you for your business!</p>
        </div>
    </div>

    <div class="button-container">
        <button onclick="window.print()" class="button no-print">Download PDF</button>
        <a href="invoice.php" class="button no-print">Back to Form</a>
    </div>
    <div id="loader" style="display: none;">
        <div class="spinner"></div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('invoice');

            setTimeout(() => {
                html2pdf().set({
                    margin: 0.0,
                    filename: 'invoice.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 100
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                }).from(element).save();
            }, 500); // wait for images to fully render
        }
    </script>


</body>

</html>