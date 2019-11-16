<?php


use Illuminate\Database\Seeder;
use App\User;


class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [               
               'name'=>'Alfredo',
               'carnet'=>'ss11013',
               'email'=>'ss11013@gmail.com',
                'is_admin'=>'1',
                'is_docente'=>'0',
               'password'=> bcrypt('123123123'),
            ],
            [               
                'name'=>'David',
                'carnet'=>'fg12004',
                'email'=>'fg12004@gmail.com',
                 'is_admin'=>'1',
                 'is_docente'=>'0',
                'password'=> bcrypt('123123123'),
             ],
             [               
                'name'=>'Eduardo',
                'carnet'=>'pe12000',
                'email'=>'pe12000@gmail.com',
                 'is_admin'=>'1',
                 'is_docente'=>'0',
                'password'=> bcrypt('123123123'),
             ],
            [               
                'name'=>'Docente',
                'carnet'=>'dc11013',
                'email'=>'docente1@gmail.com',
                 'is_admin'=>'0',
                 'is_docente'=>'1',
                'password'=> bcrypt('123123123'),
             ],
            [            
               'name'=>'abhiman',
               'carnet'=>'2019-SA-FT-001',
               'email'=>'user2@gmail.com',
                'is_admin'=>'0',
                'is_docente'=>'0',
               'password'=> bcrypt('123123123'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
