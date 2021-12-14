<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Upload gambar</title>
</head>

<body>
    <form action="/Upload/store" method="POST" enctype="multipart/form-data">

        <input type="text" name="txtku">

        <input type="file" class="form-control-file <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" name=" gambar">
        <div class="invalid-feedback">
            <?= $validation->getError('gambar'); ?>
        </div>
        <button type="submit">upload</button>
    </form>





</body>

</html>