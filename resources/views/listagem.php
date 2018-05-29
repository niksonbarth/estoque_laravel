<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Listagem de produtos</h1>
        <table class="table table-striped table-bordered table-hover">
            <?php foreach ($produtos as $p): ?>
            <tr>
                <td><?= $p->nome ?></td>
                <td><?= $p->valor ?></td>
                <td><?= $p->descricao ?></td>
                <td><?= $p->quantidade ?></td>
                <td>
                    <a href="/produtos/mostra/<?= $p->id ?> ">
                        <span class="glyphicon glyphicon-search"/>
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>