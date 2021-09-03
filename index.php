    <?php
    include_once("./includes/class-autoload.inc.php");
    require_once("./templates/header.php");
    ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modal">
    New Task
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form input -->
                    <form action="post.process.php" method="post">
                        <input type="text" name="task" class="form-control" placeholder="New task" autofocus required>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                            <td class="col-9 task"><?php echo $task["task"] ?></td>
                            <td class="col-1 edit text-center">
                                <!-- data-bs-toggle="modal" data-bs-target="#edit" -->
                                <a href="editTask.php?edit=<?php echo $task["id"] ?>" class="btn btn-warning edit">Edit</a>
                            </td>
                            <td class="col-1 delete text-center">
                                <a href="./post.process.php?id=<?php echo $task["id"] ?>" class="btn btn-danger delete">[x]</a>
                            </td>
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