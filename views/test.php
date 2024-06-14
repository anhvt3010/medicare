
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="assets/img/logo.png" rel="icon">
    <title>Chi tiết bệnh nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/css/bootstrap5-toggle.min.css" rel="stylesheet">

</head>
<body>
<input type="checkbox" data-toggle="toggle" checked>
<script src="http://localhost/Medicare/assets/js/toast/use-bootstrap-toaster.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/js/bootstrap5-toggle.ecmas.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        $('input[data-toggle="toggle"]').bootstrapToggle();


        App.init();
    });
</script>
</body>
</html>