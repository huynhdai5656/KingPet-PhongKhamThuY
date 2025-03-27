<!doctype html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="DC.title" content="KingPet - Phòng Khám Thú Y" />
    <title><?php echo isset($title) ? $title : 'Phòng Khám Thú Y - KingPet'; ?></title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.css"
        integrity="sha512-GmZYQ9SKTnOea030Tbiat0Y+jhnYLIpsGAe6QTnToi8hI2nNbVMETHeK4wm4MuYMQdrc38x+sX77+kVD01eNsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Swiper slides -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11.2.5/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="view/css/style.css">
</head>

<body>
    <?php
    // Chuẩn hóa URL
    $url = rtrim($_SERVER['REQUEST_URI'], '/');
    $url = strtok($url, '?'); // Loại bỏ query string (nếu có)
    $title = 'Phòng Khám Thú Y - KingPet'; // Tiêu đề mặc định

    // Điều hướng
    if ($url == '/' || $url == '/index.php') {
        require_once 'controller/home.php';
    } else if ($url == '/about-us') {
        $title = 'About Us - KingPet';
        require_once 'controller/about-us.php';
    } else if (strpos($url, '/service/') === 0) {
        $servicePart = rtrim(substr($url, 9), '/'); // Lấy phần sau "/service/"
        require_once 'controller/services.php';

        // Gọi hàm tương ứng dựa trên $servicePart
        switch ($servicePart) {
            case 'main':
                service_showMain();
                break;
            case 'grooming':
                service_showGrooming();
                break;
            case 'pt':
                service_showPT();
                break;
            case 'skls':
                service_showSKLS();
                break;
            case 'tltd':
                service_showTLTD();
                break;
            default:
                require_once 'view/404.php';
                break;
        }
    } else {
        // Xử lý trang 404
        $title = '404 - Page Not Found';
        require_once 'view/404.php';
    }
    ?>
</body>

</html>