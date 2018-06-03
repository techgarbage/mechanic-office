<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = array(
            0 => array('id' => '1', 'name' => 'Abarth', 'Slug' => 'abarth'),
            1 => array('id' => '2', 'name' => 'Alfa Romeo', 'Slug' => 'alfa-romeo'),
            2 => array('id' => '3', 'name' => 'Aro', 'Slug' => 'aro'),
            3 => array('id' => '4', 'name' => 'Asia', 'Slug' => 'asia'),
            4 => array('id' => '5', 'name' => 'Asia Motors', 'Slug' => 'asia-motors'),
            5 => array('id' => '6', 'name' => 'Aston Martin', 'Slug' => 'aston-martin'),
            6 => array('id' => '7', 'name' => 'Audi', 'Slug' => 'audi'),
            7 => array('id' => '8', 'name' => 'Austin', 'Slug' => 'austin'),
            8 => array('id' => '9', 'name' => 'Auverland', 'Slug' => 'auverland'),
            9 => array('id' => '10', 'name' => 'Bentley', 'Slug' => 'bentley'),
            10 => array('id' => '11', 'name' => 'Bertone', 'Slug' => 'bertone'),
            11 => array('id' => '12', 'name' => 'Bmw', 'Slug' => 'bmw'),
            12 => array('id' => '13', 'name' => 'Cadillac', 'Slug' => 'cadillac'),
            13 => array('id' => '14', 'name' => 'Chevrolet', 'Slug' => 'chevrolet'),
            14 => array('id' => '15', 'name' => 'Chrysler', 'Slug' => 'chrysler'),
            15 => array('id' => '16', 'name' => 'Citroen', 'Slug' => 'citroen'),
            16 => array('id' => '17', 'name' => 'Corvette', 'Slug' => 'corvette'),
            17 => array('id' => '18', 'name' => 'Dacia', 'Slug' => 'dacia'),
            18 => array('id' => '19', 'name' => 'Daewoo', 'Slug' => 'daewoo'),
            19 => array('id' => '20', 'name' => 'Daf', 'Slug' => 'daf'),
            20 => array('id' => '21', 'name' => 'Daihatsu', 'Slug' => 'daihatsu'),
            21 => array('id' => '22', 'name' => 'Daimler', 'Slug' => 'daimler'),
            22 => array('id' => '23', 'name' => 'Dodge', 'Slug' => 'dodge'),
            23 => array('id' => '24', 'name' => 'Ferrari', 'Slug' => 'ferrari'),
            24 => array('id' => '25', 'name' => 'Fiat', 'Slug' => 'fiat'),
            25 => array('id' => '26', 'name' => 'Ford', 'Slug' => 'ford'),
            26 => array('id' => '27', 'name' => 'Galloper', 'Slug' => 'galloper'),
            27 => array('id' => '28', 'name' => 'Gmc', 'Slug' => 'gmc'),
            28 => array('id' => '29', 'name' => 'Honda', 'Slug' => 'honda'),
            29 => array('id' => '30', 'name' => 'Hummer', 'Slug' => 'hummer'),
            30 => array('id' => '31', 'name' => 'Hyundai', 'Slug' => 'hyundai'),
            31 => array('id' => '32', 'name' => 'Infiniti', 'Slug' => 'infiniti'),
            32 => array('id' => '33', 'name' => 'Innocenti', 'Slug' => 'innocenti'),
            33 => array('id' => '34', 'name' => 'Isuzu', 'Slug' => 'isuzu'),
            34 => array('id' => '35', 'name' => 'Iveco', 'Slug' => 'iveco'),
            35 => array('id' => '36', 'name' => 'Iveco-pegaso', 'Slug' => 'iveco-pegaso'),
            36 => array('id' => '37', 'name' => 'Jaguar', 'Slug' => 'jaguar'),
            37 => array('id' => '38', 'name' => 'Jeep', 'Slug' => 'jeep'),
            38 => array('id' => '39', 'name' => 'Kia', 'Slug' => 'kia'),
            39 => array('id' => '40', 'name' => 'Lada', 'Slug' => 'lada'),
            40 => array('id' => '41', 'name' => 'Lamborghini', 'Slug' => 'lamborghini'),
            41 => array('id' => '42', 'name' => 'Lancia', 'Slug' => 'lancia'),
            42 => array('id' => '43', 'name' => 'Land-rover', 'Slug' => 'land-rover'),
            43 => array('id' => '44', 'name' => 'Ldv', 'Slug' => 'ldv'),
            44 => array('id' => '45', 'name' => 'Lexus', 'Slug' => 'lexus'),
            45 => array('id' => '46', 'name' => 'Lotus', 'Slug' => 'lotus'),
            46 => array('id' => '47', 'name' => 'Mahindra', 'Slug' => 'mahindra'),
            47 => array('id' => '48', 'name' => 'Maserati', 'Slug' => 'maserati'),
            48 => array('id' => '49', 'name' => 'Maybach', 'Slug' => 'maybach'),
            49 => array('id' => '50', 'name' => 'Mazda', 'Slug' => 'mazda'),
            50 => array('id' => '51', 'name' => 'Mercedes-benz', 'Slug' => 'mercedes-benz'),
            51 => array('id' => '52', 'name' => 'Mg', 'Slug' => 'mg'),
            52 => array('id' => '53', 'name' => 'Mini', 'Slug' => 'mini'),
            53 => array('id' => '54', 'name' => 'Mitsubishi', 'Slug' => 'mitsubishi'),
            54 => array('id' => '55', 'name' => 'Morgan', 'Slug' => 'morgan'),
            55 => array('id' => '56', 'name' => 'Nissan', 'Slug' => 'nissan'),
            56 => array('id' => '57', 'name' => 'Opel', 'Slug' => 'opel'),
            57 => array('id' => '58', 'name' => 'Peugeot', 'Slug' => 'peugeot'),
            58 => array('id' => '59', 'name' => 'Pontiac', 'Slug' => 'pontiac'),
            59 => array('id' => '60', 'name' => 'Porsche', 'Slug' => 'porsche'),
            60 => array('id' => '61', 'name' => 'Renault', 'Slug' => 'renault'),
            61 => array('id' => '62', 'name' => 'Rolls-royce', 'Slug' => 'rolls-royce'),
            62 => array('id' => '63', 'name' => 'Rover', 'Slug' => 'rover'),
            63 => array('id' => '64', 'name' => 'Saab', 'Slug' => 'saab'),
            64 => array('id' => '65', 'name' => 'Santana', 'Slug' => 'santana'),
            65 => array('id' => '66', 'name' => 'Seat', 'Slug' => 'seat'),
            66 => array('id' => '67', 'name' => 'Skoda', 'Slug' => 'skoda'),
            67 => array('id' => '68', 'name' => 'Smart', 'Slug' => 'smart'),
            68 => array('id' => '69', 'name' => 'Ssangyong', 'Slug' => 'ssangyong'),
            69 => array('id' => '70', 'name' => 'Subaru', 'Slug' => 'subaru'),
            70 => array('id' => '71', 'name' => 'Suzuki', 'Slug' => 'suzuki'),
            71 => array('id' => '72', 'name' => 'Talbot', 'Slug' => 'talbot'),
            72 => array('id' => '73', 'name' => 'Tata', 'Slug' => 'tata'),
            73 => array('id' => '74', 'name' => 'Toyota', 'Slug' => 'toyota'),
            74 => array('id' => '75', 'name' => 'Umm', 'Slug' => 'umm'),
            75 => array('id' => '76', 'name' => 'Vaz', 'Slug' => 'vaz'),
            76 => array('id' => '77', 'name' => 'Volkswagen', 'Slug' => 'volkswagen'),
            77 => array('id' => '78', 'name' => 'Volvo', 'Slug' => 'volvo'),
            78 => array('id' => '79', 'name' => 'Wartburg', 'Slug' => 'wartburg'),
        );
        //$faker = \Faker\Factory::create();
       // $generator = $faker = new Faker\Generator();
        //$faker->addProvider(new \MattWells\Faker\Vehicle\Provider($generator));
        /*for($i=0; $i<sizeof($brands); $i++){
            Brand::create([
                'name'=>$brands[$i]
            ]);
        }*/
        foreach ($brands as $brand){
            Brand::create([
                'id' => $brand['id'],
                'name' => $brand['name'],
            ]);
        }
    }
}
