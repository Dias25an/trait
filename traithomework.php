<?php

    







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
    $apple->addIngredient("арбуз", 5);







?>