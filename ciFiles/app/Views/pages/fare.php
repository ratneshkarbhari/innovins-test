<main class="page-container" id="products">
    <div class="container">
        <h1 class="page-title"><?php echo $title; ?></h1>
       
        <h4>Base Fare: <?php echo $fare["BaseFare"]." ".$fare["Currency"]; ?></h4>
        <h4>Tax: <?php echo $fare["Tax"]." ".$fare["Currency"]; ?></h4>
        <h4>OtherCharges : <?php echo $fare["OtherCharges"]." ".$fare["Currency"]; ?></h4>
        <h4>Discount : <?php echo 0.1*$fare["BaseFare"]." ".$fare["Currency"]; ?></h4>
        <h4>Total: <?php echo $total = $fare["BaseFare"]+$fare["Tax"]+$fare["OtherCharges"]+(0.1*$fare["BaseFare"])." ".$fare["Currency"];  ?></h4>
        
    </div>
</main>