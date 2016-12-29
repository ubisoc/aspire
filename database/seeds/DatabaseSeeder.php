<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('migrations')->delete();
        DB::table('password_resets')->delete();
        DB::table('users')->delete();
        DB::table('roles')->delete();
        DB::table('company_data')->delete();
        DB::table('student_data')->delete();
        DB::table('accounts')->delete();
        DB::table('users')->delete();
        DB::table('applications')->delete();
        DB::table('addresses')->delete();
        DB::table('notifications')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $migrate = Artisan::call('migrate', array('--path' => 'app/migrations'));

        \File::cleanDirectory('storage');

        // $address = factory(App\Address::class)->make();
        // $account = factory(App\Account::class, 'student')->create();
        // $user = factory(App\User::class)->make();
        // $account->users()->save($user);
        // $user->address()->save($address);

        factory(App\Account::class, 'student', 50)->create()->each(function ($a) {
            $user = factory(App\User::class)->make();
            $a->users()->save($user);
            $user->address()->save(factory(App\Address::class)->create());
            $a->studentData()->save(factory(App\StudentData::class)->make());
        });

        factory(App\Account::class, 'company', 15)->create()->each(function ($a) {
            $user = factory(App\User::class)->make();
            $a->users()->save($user);
            $address = factory(App\Address::class)->create();
            $user->address()->save($address);
            $companyData = factory(App\CompanyData::class)->make();
            $a->companyData()->save($companyData);
            $companyData->tradingAddress()->save($address);
            $companyData->billingAddress()->save($address);
            $roles = factory(App\Role::class, 3)->make();
            foreach($roles as $role) {
              $role->company_name = $companyData->name;
              $companyData->roles()->save($role);
            }
        });
    }
}
