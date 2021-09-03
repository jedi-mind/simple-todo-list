<?php
    include_once("./includes/class-autoload.inc.php");
    require_once("./templates/header.php");
?>

<a href="./index.php" class="btn btn-danger mb-2">Go Back</a>

<!-- table for tasks -->
<div class="table-responsive">
    <table>
        <thead>
            <tr class="d-flex">
                <th class="col-1 id text-center">#</th>
                <th class="col-9">Task</th>
                <th class="col-1 edit text-center"></th>
                <th class="col-1 delete text-center"></th>
            </tr>
        </thead>
        <tbody>
            <!-- show all tasks -->
            <?php $tasks = new Tasks; ?>
            <?php $i = 1; ?>
            
            <?php if($tasks->getTasks()) : ?>
                <?php foreach($tasks->getTasks() as $task) : ?>
                    <tr class="d-flex">
                        <td class="col-1 id text-center"><?php echo $i ?></td>
                        <!-- show input field on selected task -->
                        <?php if($task["id"] !== $_GET["edit"]) : ?>
                            <?php echo "<td class='col-10 task'> {$task["task"]} </td>"; ?>
                            <?php else : ?>
                                <form action="post.process.php?edit= <?php echo $_GET['edit'] ?>" method="POST">
                                    <?php echo "<td class='col-9'><input type='text' class='editInput' name='editTask' placeholder='{$task["task"]}' autofocus required></td>" ?>
                                    <?php echo "<td class='col-2'><button type='submit' class='btn btn-primary save' name='saveEdit'>Save</button>" ?>
                                </form>
                        <?php endif; ?>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
    require_once("./templates/footer.php");
?>