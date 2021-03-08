<?php require "downloadlogic.php";?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>File system</title>
</head>
<body>
    <div class="container">
    <h4>User images</h4>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size(mb)</th>
                    <th scope="col">Downloads</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $file):?>
                    <tr>
                        <td><?php echo $file['id']; ?></td>
                        <td><?php echo $file['name']; ?></td>
                        <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td>
                        <td><?php echo $file['downloads']; ?></td>
                        <td><a href="download.php?file_id=<?php echo $file['id'] ?>">Download</a></td>
                    </tr>                            
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>
</html>