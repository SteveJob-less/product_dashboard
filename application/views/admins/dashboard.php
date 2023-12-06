
</style>
    <main class="">
        <div class="col-md-10 d-flex flex-row py-2 mx-auto justify-content-between">
            <h2 class="col-md-5">Manage Products</h2>
            <div class="col-md-5 px-5 text-end py-2 ">
                <a class="bg-primary rounded border border-dark py-2 px-3 text-white" href="<?= base_url('products/new_product') ?>">Add product</a>
            </div>
        </div>
        <div class="table w-75 py-3 px-5 mx-auto text-center">
            <ul class="list-unstyled m-0 p-0 mx-auto col-md-12 d-flex border border-dark">
                <li class="d-inline-block border border-dark fw-bold col-md-1">ID</li>
                <li class="d-inline-block border border-dark fw-bold col-md-4">Name</li>
                <li class="d-inline-block border border-dark fw-bold col-md-2">Stock</li>
                <li class="d-inline-block border border-dark fw-bold col-md-2">Sold</li>
                <li class="d-inline-block border border-dark fw-bold col-md-3">Action</li>
            </ul>
<?php   foreach($products as $product) : ?>
            <ul class="list-unstyled m-0 p-0 mx-auto col-md-12 d-flex border-bottom border-dark">
                <li class="d-inline-block col-md-1 align-self-center"><?= $product -> product_id ?? 'no product_id ' ?></li>
                <li class="d-inline-block col-md-4 align-self-center"><a href="<?= base_url('products/show/') .  $product -> product_id ?>"><?= $product -> name ?? 'no  name' ?></a></li>
                <li class="d-inline-block col-md-2 align-self-center"><?= $product -> stock ?? 'no stock' ?></li>
                <li class="d-inline-block col-md-2 align-self-center"><?= $product -> sold ?? 'no sold' ?></li>
                <li class="d-inline-block col-md-3 align-self-center d-flex justify-content-evenly px-5">
                    <a class="border border-dark text-decoration-none text-white py-0 px-2 my-2 rounded bg-primary" type="button" href="<?= base_url('products/edit_product/'). $product -> product_id ?>">Edit</a>
                    <a id="deleteButton<?= $product -> product_id ?>" class="border border-dark text-decoration-none text-white py-0 px-2 my-2 rounded bg-danger" type="button" href="<?= base_url('products/remove_product/'). $product -> product_id ?>">Delete</a>
                </li>
            </ul>
<?php   endforeach ; ?>
        </div>
    </main>
