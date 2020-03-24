

use WebforceHQ\ActiveCampaign\ActiveCampaign;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignCustomer;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrder;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrderDiscount;
use WebforceHQ\ActiveCampaign\models\ActiveCampaignOrderProduct;

$url = "<https://YOUR_USER.api-us1.com>";
$key = "<YOUR_TOKEN_KEY>";

$client = new ActiveCampaign();
$client->initialize($url, $key);

$product = new ActiveCampaignOrderProduct();
$product->setExternalId("PRODUPDATED100");
$product->setName("Demo Product One UPDATED");
$product->setPrice("49000");
$product->setQuantity(20);
$product->setCategory("Demos0");
$product->setSku("PDMO-120");
$product->setDescription("This is a demo product0");
$product->setImgUrl("https://picsum.photos/200/300");
$product->setProductUrl("https://picsum.photos/200/300");

$product2 = new ActiveCampaignOrderProduct();
$product2->setExternalId("PROD1010");
$product2->setName("Demo Product Two");
$product2->setPrice("49000");
$product2->setQuantity(20);
$product2->setCategory("Demos 0");
$product2->setSku("PDMO-120");
$product2->setDescription("This is a demo product 0");
$product2->setImgUrl("https://picsum.photos/200/300");
$product2->setProductUrl("https://picsum.photos/200/300");

$product3 = new ActiveCampaignOrderProduct();
$product3->setExternalId("PROD1020");
$product3->setName("Demo Product Three 0");
$product3->setPrice("49000");
$product3->setQuantity(20);
$product3->setCategory("Demos 0");
$product3->setSku("PDMO-120");
$product3->setDescription("This is a demo product 0");
$product3->setImgUrl("https://picsum.photos/200/300");
$product3->setProductUrl("https://picsum.photos/200/300");

$discount = new ActiveCampaignOrderDiscount();
$discount->setName("DEMOOFF0");
$discount->setType("order");
$discount->setDiscountAmount("1000");

$order = new ActiveCampaignOrder();
$order->setExternalId("ORDER-1010");
$order->setSource("1");
$order->setEmail("demouser@gmail.com");
$order->setOrderUrl("https://example.com/orders/3246315233");
$order->setExternalCreatedDate("2016-09-13T17:41:39-04:00");
$order->setExternalUpdatedDate("2020-03-23 19:27:00");
$order->setShippingMethod("UPS");
$order->setTaxAmount("1000");
$order->setDiscountAmount("1000");
$order->setCurrency("USD");
$order->setOrderNumber("12000");
$order->setConnectionid("2");
$order->setCustomerid("2");
$order->setShippingAmount(1000);
$order->setTotalPrice(91110);

$products = [$product, $product2, $product3];
$discounts = [$discount];

$order->setOrderProducts($products);
$order->setOrderDiscounts($discounts);

$orders = $client->orders();
try{
    $response = $orders->create($order);
    if($response->success){
        echo "Order successfully updated \n";
        var_dump($response->body->ecomOrderProducts);
    }else{
        if( isset($response->body->message) ){
            $response->body->message;
        }
        if( isset($response->body->errors) ){
            foreach($response->body->errors as $error){
                echo $error->title."\n";
                echo $error->detail."\n";
                echo $error->code."\n";
            }
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
}