<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recipe = new Recipe();
        $recipe->name = 'Pistachio Twists';
        $recipe->description = "Originally a recipe from the 1960's that was meant to be served with drinks for a St. Paddy's day celebration. Personally, I think these are good for any occasion!";
        $recipe->image = 'Pistachio_Twists.jpg';
        $recipe->category_id = 1;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Frozen puff pastry, thawed']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('17.5 ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Egg white, beaten']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Finely chopped shelled pistachios']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('⅓ cup')]);
        $direction =new Direction();
        $direction->step = 'Preheat oven to 350 degrees F (175 degrees C). Line baking sheets with parchment paper.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = "Unfold the sheets of puff pastry, and brush tops with egg white. Sprinkle pistachios and salt over the egg white wash; flip the sheets, brush with egg white, and sprinkle with pistachios and salt. With a sharp knife, cut pastry into 3-inch long strips, about 3/4 inch wide. Twist the strips twice, then arrange on the prepared baking sheets so they don't touch.";
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Bake in the preheated oven until browned, about 15 minutes.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Air Mushrooms';
        $recipe->description = "These low-carb mushrooms are easy to make and cook in under 10 minutes in your air fryer.
         They make the perfect game-day snack, but also impress as a first course when having friends over for an elegant dinner.";
        $recipe->image = 'Air_Fryer.jpg';
        $recipe->category_id = 1;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Whole white button mushrooms']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('16 ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Scallions']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('2')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Cream cheese, softened']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('4 ounces')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Finely shredded sharp Cheddar cheese']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¼ cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Ground paprika']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¼ teaspoon')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Salt']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 pinch')]);
        $direction =new Direction();
        $direction->step = 'Using a damp cloth, gently clean mushrooms. Remove stems and discard.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = "Mince scallions and separate white and green parts.";
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Preheat an air fryer to 360 degrees F (182 degrees C).';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Combine cream cheese, Cheddar cheese, the white parts from the scallions, paprika, and salt in a small bowl. Stuff filling into the mushrooms, pressing it in to fill the cavity with the back of a small spoon.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Spray the air fryer basket with cooking spray and set mushrooms inside. Depending on the size of your air fryer, you may have to do 2 batches.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Cook mushrooms until filling is lightly browned, about 8 minutes. Repeat with remaining mushrooms.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Sprinkle mushrooms with scallion greens and let cool for 5 minutes before serving.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Spinach Roll-Ups';
        $recipe->description = "I got this recipe from a co-worker after having them at a baby shower.
         They are absolutely wonderful, even if you're like me and NOT fond of spinach. They are so easy to make.";
        $recipe->image = 'Spinach_RollUps.jpg';
        $recipe->category_id = 1;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Frozen chopped spinach, thawed and drained']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('20 ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Ranch dressing mix']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Mayonnaise']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Sour cream']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Bacon bits']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Chopped onions']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('3 tablespoons')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Flour tortillas']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('10')]);
        $direction =new Direction();
        $direction->step = 'In a medium-size mixing bowl, combine spinach, ranch mix, mayonnaise, sour cream, bacon bits and onion. Spread the mixture onto each tortilla and roll it up. Refrigerate the rolled tortillas until ready to serve.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = "Slice each roll-up into 1 inch servings no more than 3 hours before serving.";
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Simply Guacamole';
        $recipe->description = "This is so easy and so good. It's always the hit of the party and it's gone before anything else on the table.";
        $recipe->image = 'Guacamole.jpg';
        $recipe->category_id = 1;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Avocados - peeled, pitted, and mashed']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('5')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Fresh lemon juice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('2 tablespoons')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Minced green onion']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¾ cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Minced fresh cilantro']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ cup')]);
        $direction =new Direction();
        $direction->step = 'Stir together the avocado and lemon juice in a serving bowl; add the green onion and cilantro; mix well. Season with salt and pepper. Serve immediately or store covered in refrigerator with avocado pits in the bowl to keep from browning.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Tiramisu';
        $recipe->description = "Tiramisu is a classic Italian dessert. Ladyfinger cookies are dipped in coffee, then layered with mascarpone (a rich Italian cream cheese) and dusted with cocoa powder. It might become your new favorite dessert!";
        $recipe->image = 'Tiramisu.jpg';
        $recipe->category_id = 2;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Egg yolks']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('6')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'White sugar, divided']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Mascarpone cheese']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 pound')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Egg white, beaten']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('6')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Heavy cream']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¼ cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Kirschwasser']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('3 tablespoons')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Strong brewed coffee, cold']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1¼ cups')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Ladyfingers']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('25')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Unsweetened cocoa powder']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 tablespoon')]);
        $direction =new Direction();
        $direction->step = 'In a medium bowl beat together the egg yolks and 1/3 cup of sugar. Using a wooden spoon stir in mascarpone cheese, beaten egg whites, cream and kirschwasser; stir until smooth. Set aside.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Dissolve remaining 2/3 cup sugar in coffee. Quickly, to avoid complete saturation, dip ends of ladyfingers in coffee mixture. Place ladyfingers in a single layer in a 9 x 13 inch glass baking dish. Spread a layer of cheese mixture over the ladyfingers; repeat layers, ending with cheese mixture.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Cover and refrigerate for several hours. Sprinkle with cocoa just before serving.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Chocolate Puddino';
        $recipe->description = "Perfect for Valentine's Day, this rich and delicious chocolate pudding is made with a classic Italian method that they call 'budino.' The pudding has a glorious texture--firm enough to stay on the spoon and hold its shape, but at the same time, soft, smooth, and silky. It's a perfect balance between intense chocolate flavor, with just the right amount of sweetness, topped with a soft whipped cream topping that elevates it to a whole new level of amazingness!";
        $recipe->image = 'Puddino.jpg';
        $recipe->category_id = 2;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Dark chocolate chips']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('8 ounces')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Salt']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 pinch')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Cayenne pepper']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 pinch')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Large eggs']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('6')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'White sugar, divided']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('⅓ cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Whole milk']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Heavy cream']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1¼ cups')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Vanilla extract']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¼ teaspoon')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Unsalted butter']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 tablespoon')]);
        $direction =new Direction();
        $direction->step = 'Combine chocolate chips, salt, and cayenne in a heat-proof measuring cup; set aside.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Separate eggs by cracking one egg into your hand over a bowl. Open your fingers slightly and gently jiggle your hand until the egg white falls into the bowl below. Transfer the yolk to a skillet. Repeat with remaining eggs. Reserve egg whites for another use.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Add sugar, milk, and cream to egg yolks. Whisk thoroughly, breaking egg yolks first, until well combined.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Place skillet on the stove over medium or medium-low heat. Cook, stirring constantly with a silicone spoon, until very hot and thick enough to coat the back of the spoon, about 5 minutes. An instant-read thermometer should read at least 175 degrees F (79 degrees C). Remove from the heat.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Set a fine sieve over the bowl of reserved chocolate. Strain the custard sauce into the chocolate and let sit for 2 minutes. Whisk until chocolate has melted and custard sauce is smooth and shiny, about 2 minutes. Add vanilla and butter; stir until butter has melted, about 1 minute.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Pour warm custard sauce into 6 serving glasses. Tilt each glass and rotate it around so the warm chocolate coats another 1/2 inch of the glass. Cover with plastic and place in the refrigerator until completely chilled, at least 3 to 4 hours.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Combine cream and vanilla extract for topping in a metal bowl and whisk until thickened; make sure no peaks form. Spoon cream into the glasses, then tilt and twirl to coat the sides a bit.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Garnish with shaved chocolate and serve.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Stinger';
        $recipe->description = "There's no sting a cocktail made from crème de menthe and brandy can't heal. Shake up one of these classic cocktails before or after dinner.";
        $recipe->image = 'Stinger.jpg';
        $recipe->category_id = 3;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Brandy']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1½ fluid ounces')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'White creme de menthe']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Ice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $direction =new Direction();
        $direction->step = 'Combine brandy and creme de menthe in a cocktail shaker. Add ice; cover and shake until chilled. Strain into a chilled cocktail glass.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Singapore Sling';
        $recipe->description = "Variations of the classic Singapore Sling abound, but mix up one of these potent and sweet cocktails with this recipe and you'll be pleased with the results.";
        $recipe->image = 'Singapore.jpg';
        $recipe->category_id = 3;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Ice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Gin']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1½ fluid ounces')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Cherry-flavored brandy']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Triple sec']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¼ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Benedictine® liqueur']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('¼ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Pineapple juice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('4 fluid ounces')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Lime juice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Grenadine syrup']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Ice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Fresh pineapple']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 slice')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Maraschino cherry']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1')]);
        $direction =new Direction();
        $direction->step = 'Fill a Collins glass with 1 cup ice and set aside in the freezer.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Combine gin, cherry-flavored brandy, triple sec, Benedictine, pineapple juice, lime juice, and grenadine in a cocktail shaker. Add 1 cup ice, cover and shake until chilled. Strain into the prepared Collins glass.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Garnish with slice of pineapple and a cherry.';
        $direction->recipe_id = $recipe->id;
        $direction->save();

        $recipe = new Recipe();
        $recipe->name = 'Margarita';
        $recipe->description = "Served straight up or on the rocks, the margarita is one of the most popular cocktails of all time. And for good reason! It will cool you down on a hot day or warm you up on a cool day. Any day is a good day for a margarita.";
        $recipe->image = 'Margarita.jpg';
        $recipe->category_id = 3;
        $recipe->user_id = rand(1, 7);
        $recipe->save();
        $ingredient =Ingredient::firstOrNew(['name' => 'Kosher salt']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 tablespoon')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Tequila']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1½ fluid ounces')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Orange flavored liqueur (such as Cointreau®)']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Lime juice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('½ fluid ounce')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Ice']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1 cup')]);
        $ingredient =Ingredient::firstOrNew(['name' => 'Lime wheel']);
        $ingredient->save();
        $recipe->ingredients()->attach($ingredient, ['quantity' => trim('1')]);
        $direction =new Direction();
        $direction->step = 'Sprinkle salt on a small plate. Lightly wet the rim of a cocktail glass or margarita glass with a damp paper towel. Dip the moistened rim in salt to coat. Set aside.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Combine tequila, orange-flavored brandy, and lime juice in a cocktail shaker. Add ice and shake until chilled. Strain into a salt-rimmed cocktail glass or a salt-rimmed, ice-filled margarita glass.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
        $direction =new Direction();
        $direction->step = 'Garnish with a lime wheel.';
        $direction->recipe_id = $recipe->id;
        $direction->save();
    }
}
