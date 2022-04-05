<main class="page-container" id="products">
    <div class="container">

        
        <h1 class="page-title"><?php echo $title; ?></h1>
        <p class="text-success"><?php echo $success; ?></p>
        <p class="text-danger"><?php echo $error; ?></p>

        <a href="<?php echo site_url("add-product"); ?>" class="btn btn-success">Add Product</a>
        
        <?php if(count($products)>0): ?>

            <table class="table" style="margin: 1em 0;">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $product): ?>
                    <tr>
                        <td><?php echo $product["name"]; ?></td>
                        <td><?php echo $product["description"]; ?></td>
                        <td><?php echo $product["price"]; ?></td>
                        <td>
                            <a href="<?php echo site_url("edit-product/".$product["uid"]); ?>" class="btn btn-secondary">Edit</a>
                            <?php echo form_open(site_url("delete-product-exe"),array("class"=>"d-inline")); ?>
                            <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            <?php echo form_close(); ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
        <?php else: ?>

            <p style="margin: 2em 0;">No Products found</p>

        <?php endif; ?>


    </div>
</main>