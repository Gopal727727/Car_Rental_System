<body>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <?php
        $amount = $_GET['pay'];
    ?>
        <script>
            var config = {
    publicKey: "test_public_key_4798bcf91d6c4d3b9284ae8e83b6d136",
    productIdentity: "12345",
    productName: "Car Rental System",
    productUrl: "http://example.com/test",
    eventHandler: {
        onSuccess (payload) {
            console.log(payload);
            alert("payment recieved");
        },
        onError (error) {
            console.log(error);
        },
        onClose () {
            console.log('Widget is closed');

        }
    }
};

var checkout = new KhaltiCheckout(config);
    checkout.show({ amount:<?php echo $amount/100; ?> });
 </script>
</body>