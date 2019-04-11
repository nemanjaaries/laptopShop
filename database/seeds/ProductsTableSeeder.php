<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Laptops
        for($i = 1; $i < 31; $i++){
            Product::create([
                'name' => 'Laptop' . $i,
                'slug' => 'laptop-'. $i,
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, '. [1,2,3][array_rand([1,2,2])] .'TB SSD, 32GB RAM',
                'price' => rand(1299, 5799),
                'description' => 'Lorem ipsum '. $i .' dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis tincidunt rutrum. Ut eu dolor orci. Fusce fringilla lobortis elementum.'
            ])->categories()->attach(1);
        }

        $product = Product::find(1);
        $product->categories()->attach(2);

        // Desktops
        for($i = 1; $i < 31; $i++){
            Product::create([
                'name' => 'Desktop' . $i,
                'slug' => 'desktop-'. $i,
                'details' => [24,25,27][array_rand([24,25,27])] . ' inch, '. [1,2,3][array_rand([1,2,2])] .'TB SSD, 32GB RAM',
                'price' => rand(1299, 5799),
                'description' => 'Lorem ipsum '. $i .' dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis tincidunt rutrum. Ut eu dolor orci. Fusce fringilla lobortis elementum.'
            ])->categories()->attach(2);
        }

        // Phones
        for($i = 1; $i < 31; $i++){
            Product::create([
                'name' => 'Phone' . $i,
                'slug' => 'phone-'. $i,
                'details' => [16,32,64][array_rand([16,32,64])] . ' GB, 5.'. [7,8,9][array_rand([7,8,9])] .' inch screen, 4 GHz Quad Core',
                'price' => rand(200, 1700),
                'description' => 'Lorem ipsum '. $i .' dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis tincidunt rutrum. Ut eu dolor orci. Fusce fringilla lobortis elementum.'
            ])->categories()->attach(3);
        }

        // Tablets
        for($i = 1; $i < 31; $i++){
            Product::create([
                'name' => 'Tablet' . $i,
                'slug' => 'tablet-'. $i,
                'details' => [16,32,64][array_rand([16,32,64])] . ' GB, 5.'. [10,11,12][array_rand([10,11,12])] .' inch screen, 4 GHz Quad Core',
                'price' => rand(400, 2500),
                'description' => 'Lorem ipsum '. $i .' dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis tincidunt rutrum. Ut eu dolor orci. Fusce fringilla lobortis elementum.'
            ])->categories()->attach(4);
        }

        // Cameras
        for($i = 1; $i < 31; $i++){
            Product::create([
                'name' => 'Camera' . $i,
                'slug' => 'Camera-'. $i,
                'details' => 'Full Frame DSLR, with 18-55mm kit lens.',
                'price' => rand(300, 3500),
                'description' => 'Lorem ipsum '. $i .' dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis tincidunt rutrum. Ut eu dolor orci. Fusce fringilla lobortis elementum.'
            ])->categories()->attach(5);
        }

    }
}
