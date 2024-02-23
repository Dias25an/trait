<?php

    





<?php

    trait RestaurantManagementTrait{
        use IngredientManagementTrait, OrderTakingTrait, PaymentProcessingTrait, SpecialOffersTrait;
    }

    class RestaurantManager{
        use RestaurantManagementTrait;

        public function openForBusiness(){
            echo "Все хорошо";
        }
    }

trait SpecialOffersTrait{
    protected function applyDiscount($orderTotal, $discountRate){
        $discountedTotal = $orderTotal - ($orderTotal * $discountRate / 100);
        return $discountedTotal;
    }
}

class Manager{
    use SpecialOffersTrait{
        SpecialOffersTrait::applyDiscount as public appleDiscount;
    }

    public function createSpecialOffer($discountRate){
        echo "ВАША скидка составила $discountRate";
    }
}

trait MenuPlanningTrait{
    abstract public function planMenu();
}

trait HealthAndSafetyTrait{
    abstract public function conductHealthAndSafetyInspection();
}

class Chef{
    use MenuPlanningTrait, HealthAndSafetyTrait;

    public function planMenu() {
        echo "Меню планируем";
    }

    public function conductHealthAndSafetyInspection() {
        echo "Инспекция проведена";
    }
}

trait OrderTakingTrait{
    public function takeOrder($orderDetails){
        echo "Ваш заказ $this->orderDetails зарегистрирован";
    }
};
trait PaymentProcessingTrait{
    public function processPayment($amount){
        echo "Ваш платеж на сумму $amount обработан";
    }
};
class Waiter {
    use OrderTakingTrait, PaymentProcessingTrait;

    public function serveCustomer($customerName) {
        echo "Здравствуйте, $customerName!\n";
    }
}

trait IngredientManagementTrait {

    public function addIngredient($name, $quantity){
        echo "На склад добавлен ингредиент - '" . $name . "'<br>";
        echo "Количество $name увеличилось на: " . $quantity . "<br>";
    }

    public function useIngredient($name, $quantity){
        echo "Был использован ингредиент - '" . $name . "'<br>";
        echo "Количество $name уменьшилось на единицу: " . $quantity . "<br>";
    }
}

class Kitchen {
    use IngredientManagementTrait;
}

$apple = new Kitchen;
$apple->addIngredient("арбуз", 6);
echo $apple->skolko;









?>

