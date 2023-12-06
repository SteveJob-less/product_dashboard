
    <main class="">
        <div class="col-md-10 d-flex flex-row py-2 mx-auto justify-content-between">
            <h2 class="col-md-5">All Products</h2>
        </div>
        <div class="table w-75 py-3 px-5 mx-auto text-center">
            <ul class="list-unstyled m-0 p-0 mx-auto col-md-12 d-flex border border-dark">
                <li class="d-inline-block border border-dark fw-bold col-md-2">ID</li>
                <li class="d-inline-block border border-dark fw-bold col-md-4">Name</li>
                <li class="d-inline-block border border-dark fw-bold col-md-3">Stock</li>
                <li class="d-inline-block border border-dark fw-bold col-md-3">Sold</li>
            </ul>
<?php   foreach($products as $product) : ?>
            <ul class="list-unstyled m-0 p-0 mx-auto col-md-12 d-flex border-bottom border-dark">
                <li class="d-inline-block col-md-2 align-self-center py-2"><?= $product -> product_id ?? '1xxx' ?></li>
                <li class="d-inline-block col-md-4 align-self-center py-2"><a href="<?= base_url('products/show/') .  $product -> product_id ?>"><?= $product -> name ?? 'no  name' ?></a></li>
                <li class="d-inline-block col-md-3 align-self-center py-2"><?= $product -> stock ?? 'xxx' ?></li>
                <li class="d-inline-block col-md-3 align-self-center py-2"><?= $product -> sold ?? 'xxx' ?></li>
            </ul>
<?php   endforeach ; ?>
        </div>
    </main>
