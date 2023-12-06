
<style>
    * {
        /* outline: 1px solid black; */
    }
</style>
    <main class="">
        <div class="col-md-10 d-flex flex-row py-2 mx-auto justify-content-between">
            <h2 class="col-md-10"><?= $title ?? 'aasdasdasd' ?></h2>
        </div>
        <div class="col-md-10 mx-auto mt-4">
            <form class="d-flex flex-column rounded col-md-5 py-3 mt-3 position-relative border border-2 border-dark justify-content-center" action="<?= base_url() ?><?= $url ?>" method="POST">
                <h3 style="margin-top: -20px" class="position-absolute text-center bg-white w-50 top-0 align-self-center"><?= $title ?></h3>
                <input type="hidden" name="product_id" value="<?= $product -> product_id ?? '' ?>">
                <label class="mx-auto mb-2 col-md-9" for="name">
                    <p class="py-0 mb-0 fw-bolder text-start">Name</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="name" id="name" value="<?= $product -> name ?? '' ?>">
                </label>
                <label class="mx-auto mb-2 col-md-9" for="description">
                    <p class="py-0 mb-0 fw-bolder text-start">Description</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="description" id="description" value="<?= $product -> description ?? '' ?>">
                </label>
                <label class="mx-auto mb-1 col-md-9" for="price">
                    <p class="py-0 mb-0 fw-bolder text-start">Price</p>
                    <input class="w-100 py-1 px-2 border border-dark rounded" type="text" name="price" id="price" value="<?= $product -> price ?? '' ?>">
                </label>
                <label class="mx-auto mb-2 col-md-9" for="quantity">
                    <p class="py-0 mb-0 fw-bolder text-start">Quantity</p>
                    <select name="quantity" id="quantity"> 
<?php           for($i = 1; $i <= 100; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>    
<?php           endfor ; ?>                    
                    </select>
                </label>
                <div class="w-100 text-end px-5">
                    <input class="py-1 px-3 rounded bg-primary text-white border border-dark" type="submit" value="<?= $action ?>">
                </div>
            </form>
        </div>
    </main>
