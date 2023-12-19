# Form_QRlilbrary_Link_Html_PHP_JS_CSS

# README for Limesurvey Recruitment Poster with QR Code

## Project Overview
This project creates a recruitment poster for Limesurvey surveys with a QR code. The QR code directs participants to a specific survey in their chosen language and records recruitment performance under the recruiter's identification number.

### Technologies Used
- HTML
- CSS
- JavaScript
- PHP
- [php-qrcode library](https://github.com/psyon/php-qrcode)

### Server Testing
- Local: XAMPP Apache Server
- Remote: FileZilla for FTP uploads to server

## HTML Structure
The HTML forms the structure of the recruitment poster page:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <!-- ... -->
</head>
<body>
    <img id="logo1" src='[LOGO_URL]' alt='TU Berlin Logo'>
    <h1>Rekrutierungsformular für Limesurvey</h1>
    <!-- ... Form and other content ... -->
</body>
</html>
```

## CSS Styling
CSS is used for styling the poster page:

```css
<style>
    body {
        font-family: 'Arial', sans-serif;
        text-align: center;
        /* Additional styles... */
    }

    img#logo1 {
        /* Logo styling */
    }

    /* Responsive adjustments */
    @media (max-width: 750px) {
        /* Styles for smaller screens */
    }
</style>
```

## JavaScript
JavaScript can be used for client-side validation or dynamic elements (not used in the current setup).

## PHP Script
PHP is used for handling form submissions and generating the QR code:

```php
<?php
include 'php-qrcode-master/qrcode.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collecting form data
    // Generating QR code
    $generator = new QRCode($qrData, $options);
    $image = $generator->render_image();
    // Outputting the image
}
?>
```

## QR Code Library Usage
The [php-qrcode library](https://github.com/psyon/php-qrcode) is used to generate QR codes.

### Example Snippet:
```php
$options = [
    's' => 'qr', // Symbology
    'd' => $qrData, // Data
    'sf' => 8, // Scale factor for resolution
];

$generator = new QRCode($qrData, $options);
$image = $generator->render_image();
```

## Deployment
1. **Local Testing**: Use XAMPP to test the application on a local Apache server.
2. **Remote Deployment**: Upload files to the server using FileZilla FTP client.
   - FTP Server: `your-ftp-server.com`
   - User and password as provided.

### File Upload via FileZilla
1. Connect to the FTP server using the provided credentials.
2. Navigate to the desired directory on the server.
3. Upload files from your local directory to the server.

## Usage
- Fill in the form on the HTML page.
- Submit to generate a poster with a QR code.
- Use the QR code to direct participants to the Limesurvey survey.

## Notes
- Ensure that the PHP server configuration and file paths are correctly set.
- Maintain the security of FTP and database credentials.
