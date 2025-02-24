<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Goods;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // إنشاء بيانات وهمية
        $goods = Goods::firstOrCreate([
            'name' => 'Default Goods',
            'price' => 10.00,
        ]);

        $employee = Employee::firstOrCreate([
            'name' => 'Default Employee',
            'role' => 'Manager',
            'salary' => 1000.00,
        ]);

        Sale::create([
            'goods_id' => $goods->id,
            'employee_id' => $employee->id,
            'quantity' => 10,
            'total_price' => 100.50,
        ]);
    }
}
