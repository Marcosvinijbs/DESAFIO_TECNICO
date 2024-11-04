<?php

// database/seeders/TransactionTypeSeeder.php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    public function run()
    {
        TransactionType::insert([
            ['name' => 'Aluguel'],
            ['name' => 'Pagamento'],
            ['name' => 'Prolabore'],
        ]);
    }
}
