

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
$product->setExternalId("PROD100");
$product->setName("Demo Product One");
$product->setPrice("4900");
$product->setQuantity(2);
$product->setCategory("Demos");
$product->setSku("PDMO-12");
$product->setDescription("This is a demo product");
$product->setImgUrl("https://picsum.photos/200/300");
$product->setProductUrl("https://picsum.photos/200/300");

$product2 = new ActiveCampaignOrderProduct();
$product2->setExternalId("PROD101");
$product2->setName("Demo Product Two");
$product2->setPrice("4900");
$product2->setQuantity(2);
$product2->setCategory("Demos");
$product2->setSku("PDMO-12");
$product2->setDescription("This is a demo product");
$product2->setImgUrl("https://picsum.photos/200/300");
$product2->setProductUrl("https://picsum.photos/200/300");

$product3 = new ActiveCampaignOrderProduct();
$product3->setExternalId("PROD102");
$product3->setName("Demo Product Three");
$product3->setPrice("4900");
$product3->setQuantity(2);
$product3->setCategory("Demos");
$product3->setSku("PDMO-12");
$product3->setDescription("This is a demo product");
$product3->setImgUrl("https://picsum.photos/200/300");
$product3->setProductUrl("https://picsum.photos/200/300");

$discount = new ActiveCampaignOrderDiscount();
$discount->setName("DEMOOFF");
$discount->setType("order");
$discount->setDiscountAmount("100");

$order = new ActiveCampaignOrder();
$order->setExternalId("ORDER-101");
$order->setSource("1");
$order->setEmail("demouser@gmail.com");
$order->setOrderUrl("https://example.com/orders/3246315233");
$order->setExternalCreatedDate("2016-09-13T17:41:39-04:00");
$order->setExternalUpdatedDate("2020-03-23 19:27:00");
$order->setShippingMethod("UPS");
$order->setTaxAmount("100");
$order->setDiscountAmount("100");
$order->setCurrency("USD");
$order->setOrderNumber("1200");
$order->setConnectionid("2");
$order->setCustomerid("2");
$order->setShippingAmount(100);
$order->setTotalPrice(9111);

$products = [$product, $product2, $product3];
$discounts = [$discount];

$order->setOrderProducts($products);
$order->setOrderDiscounts($discounts);

$orders = $client->orders();
try{
    $response = $orders->create($order);
    if($response->success){
        echo "Order successfully created \n";
        var_dump($response->body->connections);
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