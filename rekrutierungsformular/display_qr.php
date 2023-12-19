<?php
include 'php-qrcode-master/qrcode.php'; // Corrected path to the php-qrcode library

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $matrikel = $_POST['matrikel'];
    $umfrageId = $_POST['umfrageId'];
    $sprache = $_POST['sprache'];
    $umfrageTitel = $_POST['umfrageTitel'];

    $qrData = "student-surveys.ak.tu-berlin.de/index.php/" . $umfrageId . "?lang=" . $sprache . "&m=" . $matrikel;

    // Create options for QR code generation
    $options = [
        's' => 'qr', // Symbology
        'd' => $qrData, // Data
		'sf' => 8, // Scale factor - increase this value for higher resolution
        // Add other options here as needed
    ];

    // Generate QR code
    $generator = new QRCode($qrData, $options);
    $image = $generator->render_image();
    ob_start();
    imagepng($image);
    $imageData = ob_get_contents();
    ob_end_clean();
    $base64Image = base64_encode($imageData);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- [Meta tags and styles] -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekrutierungsformular für Limesurvey</title>
    <meta name="author" content="Alejandro Gallón">
    <meta name="description" content="Generate recruitment posters with QR codes for Limesurvey">
    <meta name="keywords" content="Limesurvey, recruitment, QR code, TU Berlin">
    <meta name="email" content="alejandrogallon@gmail.com">
    <meta name="website" content="www.schimmercreative.com">
    <meta name="date" content="2023-12-12">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            text-align: center;
        }

        h2 {
            margin-top: 200px; /* Adjust as needed */
        }
		
		img#qr {
			width: 400px;
            height: auto;
			
			
		}

        img#logo1 {
            width: 300px;
            height: auto;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        @media (max-width: 750px) {
            h1, h2 {
                font-size: 1.5rem;
            }
            img#logo1 {
                max-width: 200px;
                margin-top: 50px;
            }
        }
    </style>
</head>
<body>
    <img id="logo1" src='https://surveys.ak.tu-berlin.de/tmp/assets/ec5424f4/logo.png' alt='TU Berlin Logo'>

    <h2><?php echo htmlspecialchars($umfrageTitel); ?></h2>
    
    <div>
        <img id="qr" src="data:image/png;base64,<?php echo $base64Image; ?>" alt='QR-Code <?php echo htmlspecialchars($sprache); ?>'>
    </div>
</body>
</html>
<?php
    imagedestroy($image);
}
?>

