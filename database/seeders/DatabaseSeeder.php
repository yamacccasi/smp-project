<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Retailer;
use App\Models\ScrappingSession;
use App\Models\ScrappedData;
use App\Models\Product;
use App\Models\ProductRetailer;
use App\Models\UserRetailer;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Створюємо рітейлерів, продукти та користувачів
        $retailers = Retailer::factory(10)->create();
        $products = Product::factory(1000)->create();
        $users = User::factory(5)->create();

        // Сесії скрапінгу
        foreach ($retailers as $retailer) {
            for ($i = 0; $i < 365; $i++) {
                ScrappingSession::factory()->create([
                    'retailer_id' => $retailer->id,
                    'session_date' => now()->subDays($i)->toDateString(),
                ]);
            }
        }

        // Заповнення таблиці scrapped_data
        $sessions = ScrappingSession::all(); // Отримуємо всі сесії

        foreach ($products as $product) {
            foreach ($retailers as $retailer) {
                // Вибираємо випадкові 30 сесій для кожного продукту та рітейлера
                $randomSessions = $sessions->random(min(30, $sessions->count()));
                foreach ($randomSessions as $session) {
                    ScrappedData::factory()->create([
                        'product_id' => $product->id,
                        'retailer_id' => $retailer->id,
                        'session_id' => $session->id,
                    ]);
                }
            }
        }

        // Заповнення таблиці product_retailer
        foreach ($products as $product) {
            $retailersToAssociate = $retailers->random(rand(1, 3)); // Випадкове число рітейлерів для асоціації
            foreach ($retailersToAssociate as $retailer) {
                $product->retailers()->attach($retailer->id);
            }
        }

        // Асоціації між користувачами та рітейлерами
        foreach ($users as $user) {
            $retailersToAssociate = $retailers->random(rand(1, 3));
            foreach ($retailersToAssociate as $retailer) {
                $user->retailers()->attach($retailer->id);
            }
        }
    }};
