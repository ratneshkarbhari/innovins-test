<main class="page-container" id="products">
    <div class="container">
        <h1 class="page-title"><?php echo $title; ?></h1>
        <p class="text-success"><?php echo $success; ?></p>
        <p class="text-danger"><?php echo $error; ?></p>

        <?php echo form_open("update-product-exe"); ?>

        <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="<?php echo $product["name"]; ?>" name="name" id="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" value="<?php echo $product["uid"]; ?>" name="slug" id="slug" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"><?php echo $product["description"]; ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" value="<?php echo $product["price"]; ?>" id="price" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update Product</button>

    <?php echo form_close(); ?>


    </div>

    
</main>