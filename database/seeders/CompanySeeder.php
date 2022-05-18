<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'company_name' => 'Xeam',
            'company_address' => 'mohali 78',
            'incorporation' => 'Test',            
            'status' => '1',
            'federal_tax' => '25',
            'authority_name' => 'Auth',
            'disignation' => 'Sales',
            'phone' => '1254784512',
            'fax_no' => 'D20MA',
            'company_email' => 'company@gmail.com',
            'account_name' => 'Test Account',
            'account_email' => 'account@gmail.com',
            'account_phone' => '5632569865',
            'sales_name' => 'Tester Sale',
            'sales_email' => 'sale@gmail.com',
            'sales_phone' => '7865321245',
            'note' => 'As you can see from the above code we have the sam...',
        ]);
    }
}
