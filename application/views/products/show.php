
    <main class="d-flex flex-column">
        <div class="mt-4 details mx-auto col-md-8 d-flex flex-column">
            <div class="mb-3 col-md-12 d-flex flex-row">
                <h2 style="font-size: 60px" class="col-md-5"><?= $product -> name?? 'Unavailable Product' ?></h2> 
                <div style="height: 250px" class="col-md-7 d-flex justify-content-center align-items-center">
                    <img class="w-50 h-100 text-center border border-dark rounded" src="" alt="<?= $product -> name ?>.jpg">
                </div>
            </div>
            <div class="col-md-5 d-flex">
                <p class="col-md-5 my-auto py-2 px-1 fw-bold">Added since: </p>
                <p class="col-md-5 my-auto py-2 px-1 text-end"><?= $product -> created_at ?? 'unknown' ?></p>
            </div>
            <div class="col-md-5 d-flex">
                <p class="col-md-5 my-auto py-2 px-1 fw-bold">Product ID: </p>
                <p class="col-md-5 my-auto py-2 px-1 text-end"><?= $product -> product_id ?? '?' ?></p>
            </div>
            <div class="col-md-5 d-flex">
                <p class="col-md-5 my-auto py-2 px-1 fw-bold">Description: </p>
                <p class="col-md-5 my-auto py-2 px-1 text-end"><?= $product -> description ?? '...' ?></p>
            </div>
            <div class="col-md-5 d-flex">
                <p class="col-md-5 my-auto py-2 px-1 fw-bold">Price: </p>
                <p class="col-md-5 my-auto py-2 px-1 text-end"><?= $product -> price ?? 'unknown' ?>php</p>                
            </div>
            <div class="col-md-5 d-flex">
                <p class="col-md-5 my-auto py-2 px-1 fw-bold">Sold: </p>
                <p class="col-md-5 my-auto py-2 px-1 text-end"><?= $product -> sold ?? 'unknown' ?></p>                
            </div>
            <div class="col-md-5 d-flex">
                <p class="col-md-5 my-auto py-2 px-1 fw-bold">Stock: </p>
                <p class="col-md-5 my-auto py-2 px-1 text-end"><?= $product -> stock ?? 'unknown' ?></p>                
            </div>
        </div>
        <div class="feedbacks col-md-8 mx-auto mt-5">
            <h3 class="my-4">Leave a comment</h3>
            <form class="col-md-8 mx-auto" action="<?= base_url('products/comment') ?>" method="POST">
                <textarea class="w-100" name="comment" id="comment" placeholder="Leave some comment here..."></textarea>
                <div class="w-100 text-end p-2">
                    <input type="hidden" name="product_id" value="<?= $product -> product_id ?>">
                    <input class="bg-success border border-dark text-white rounded" type="submit" value="comment">
                </div>
            </form>
            <div class="feed-box col-md-8 mx-auto">
<?php   foreach($comments as $comment) : ?>
                <div id="<?= $comment -> comment_id ?>" class="comment_wrapper border-1 border-bottom d-flex flex-column">
                    <div style="font-size: 14px" class="comment-details d-flex flex-row pt-2 fw-bold">
                        <p class="col-md-8 px-2 py-0 m-0"><?= ucfirst($comment -> firstname)?> <?= ucfirst($comment -> lastname)?></p>
                        <p class="col-md-4 m-0 text-end px-2"><?= date('F j, Y', strtotime($comment->created_at)) ?></p>
                    </div>
                    <p class="comment<?= $comment -> comment_id ?? '0' ?>  px-3"><?= $comment -> comment ?? 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without' ?></p>   
<?php       foreach($comment -> replies as $reply) :?>
                    <div class="reply_wrapper border-1 border-top w-75 align-self-end mx-2">
                        <div style="font-size: 14px" class="reply-details d-flex flex-row py-0 m-0  fw-bold">
                            <p class="col-md-8 px-2 m-0"><?= ucfirst($reply -> firstname)?> <?= ucfirst($reply -> lastname)?></p>
                            <p style="font-size: 14px" class="col-md-4 text-end m-0">8:49am</p>
                        </div>
                        <p class="px-3"><?= $reply -> reply ?></p>
                    </div>
<?php       endforeach ; ?>
                    <form class="input-reply-box align-self-end mx-2 w-50" action="<?= base_url('products/reply') ?>" method="POST">
                        <textarea style="height: 40px" class="w-100" name="reply"></textarea>
                        <!-- DEBUGG THE REPLY FEATURE -->
                        <div class="w-100 text-end p-2">
                            <input type="hidden" name="product_id" value="<?= $product -> product_id ?>">
                            <input type="hidden" name="comment_id" value="<?= $comment -> comment_id ?>">
                            <input class="bg-success border border-dark text-white rounded" type="submit" value="reply">
                        </div>
                    </form>
                </div>
<?php   endforeach ; ?>
            </div>
        </div>
    </main>
