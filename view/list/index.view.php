<?php require_once ViewDir."/template/header.php"; ?>
<h1>List</h1>

    <div class=" d-flex justify-content-between my-2">
        <a href="<?= route("list-create") ?>" class=" btn btn-secondary shadow-sm"> + Create</a>
        <form action="" method="get">
             <div class=" input-group">
                <input type="text" name="q" value="<?php if(isset($_GET['q'])): ?><?= sanitizer($_GET['q'],true) ?><?php endif; ?>" class=" form-control">
                <button class=" btn btn-secondary">Search</button>
            </div>
        </form>
    </div>
    <?php if(isset($_GET['q'])): ?>
        <div class="row align-items-center justify-content-between py-2 border border border-2 mx-0 mb-3">                    
            <p class="col-6 d-inline-block mb-0"><b><?= $lists["total"] ?></b> results for name matching <b><?= sanitizer($_GET['q'],true) ?></b> </p>
            <div class="col-6 text-end">
                <a href="<?= route("list") ?>" class="btn btn-secondary d-inline-block">
                    <i class="bi bi-x"></i> Clear filter
                </a>
            </div>
        </div>
    <?php endif; ?>
    <table class=" table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>debt</th>
                <th>Created At</th>
                <th>Control</th>
            </tr>
        </thead>
        <tbody>
                    <!-- from listcontroller index -->
            <?php foreach($lists["data"] as $list) : ?> 
                <tr>
                    <td>
                        <?= $list['id'] ?>
                    </td>
                    <td>
                        <?= $list['name'] ?>
                    </td>
                    <td>
                        <?= $list['debt'] ?>
                    </td>
                    <td>
                        <?= $list['created_at'] ?>
                    </td>
                    <td>
                        <a href="<?= route("list-edit",["id" => $list['id']]) ?>" class="btn btn-primary btn-sm mx-3">  Edit  </a>
                                        <!-- convert into uri -->
                        <form action="<?= route("list-delete") ?>" method="post" class=" d-inline-block">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="id" value="<?=  $list['id'] ?>">
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <!-- <a href="<?= route("list-delete",["id" => $list['id']]) ?>" class="btn btn-danger btn-sm">Delete</a> -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= paginator($lists) ?>
                
    <!-- <div class=" d-flex justify-content-between">
        <p class="mb-0">Total : <?= $lists["total"] ?></p>
        <nav aria-label="Page navigation example">
            <ul class=" pagination">
                <?php foreach($lists["links"] as $link): ?>
                <li class=" page-item"><a href="<?= $link['url'] ?>" class=" page-link <?= $link["is_active"] ?>"><?=  $link["page_number"]?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div> -->
   

<?php 
    // dd($lists);

 ?>

<?php require_once ViewDir."/template/footer.php"; ?>