<?php
$pdo = require_once "pdo.php";

$notes = $pdo->getNotes();
$currentNote = [
    'id' => '',
    'title' => '',
    'description' => ''
];

$id = $_GET['id'] ?? null;
if ($id)
    $currentNote = $pdo->getNodeById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <div>
        <form class="new-note" action="create.php" method="post">
            <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>">
            <input type="text" name="title" placeholder="Note title" value="<?php echo $currentNote['title'] ?>" autocomplete="off">
            <textarea name="description" cols="30" rows="4" placeholder="Note Description"><?php echo $currentNote['description'] ?></textarea>
            <button>
                <?php if ($currentNote['id']) : ?>
                    update
                <?php else : ?>
                    New note
                <?php endif ?>
            </button>
        </form>
        <?php if (!$currentNote['id']) : ?>
            <div class=" notes">
                <?php foreach ($notes as $note) : ?>
                    <div class="note">
                        <div class="title">
                            <a href="index.php?id=<?php echo $note['id'] ?>"><?php echo $note['title'] ?></a>
                        </div>
                        <div class="description">
                            <?php echo $note['description'] ?>
                        </div>
                        <small> <?php echo date('d/m/Y H:i', strtotime($note['create_date'])) ?></small>
                        <form method="post" action="delete.php">
                            <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
                            <button class="close">X</button>
                        </form>

                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
</body>

</html>