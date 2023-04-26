<?php require_once ViewDir."/template/header.php"; ?>
<h1>Create New Item</h1>

    <div class=" d-flex justify-content-between my-2">
        <a href="<?= route("inventory") ?>" class=" btn btn-light shadow-sm">Show All Items</a>
    </div>

    <div class=" border rounded p-5">
        <form action="<?= route("inventory-store") ?>" method="post">
            <div class="row align-items-end">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class=" form-control" name="name" required>
                </div>
                <div class="col">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class=" form-control" name="price" required>
                </div>
                <div class="col">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class=" form-control" name="stock" required>
                </div>
                <div class="col">
                    <button class="btn btn-secondary shadow-sm w-50">Add Item</button>
                </div>
            </div>
        </form>
    </div>
    


<?php 
    // dd($lists);

 ?>

<?php require_once ViewDir."/template/footer.php"; ?>