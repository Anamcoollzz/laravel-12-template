<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SchoolClassSeeder extends Seeder
{

    /**
     * Generate a gravatar image URL based on the email address.
     *
     * @param string $email
     * @return string
     */
    public function generateImage($email)
    {
        $address = strtolower(trim($email));

        // Create an SHA256 hash of the final string
        $hash = hash('sha256', $address);

        // Grab the actual image URL
        return 'https://gravatar.com/avatar/' . $hash;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable((new SchoolClass())->getTable()) == false) {
            return;
        }
        Schema::disableForeignKeyConstraints();
        $data         = [];
        $faker        = \Faker\Factory::create('id_ID');
        $options      = array_values(get_options());
        $radioOptions = array_values(get_options(4));
        $now          = now();
        $pass = bcrypt('password');
        // $jobs = file_get_contents(database_path('seeders/data/jobs.json'));
        // $jobs = json_decode($jobs, true);
        SchoolClass::truncate();
        // foreach ($jobs as $job) {
        //     $data[] = [
        //         'job_name' => $job['pekerjaan'],
        //         'department' => $job['departemen'] ?? null,
        //         'created_at'         => $now,
        //         'updated_at'         => $now,
        //         'created_by_id'      => 1,
        //         'last_updated_by_id' => null,
        //     ];
        // }
        $table                 = (new SchoolClass())->getTable();
        $isHasText             = Schema::hasColumn($table, 'text');
        $isHasEmail            = Schema::hasColumn($table, 'email');
        $isHasNumber           = Schema::hasColumn($table, 'number');
        $isHasCurrency         = Schema::hasColumn($table, 'currency');
        $isHasCurrencyIdr      = Schema::hasColumn($table, 'currency_idr');
        $isHasSelect           = Schema::hasColumn($table, 'select');
        $isHasSelect2          = Schema::hasColumn($table, 'select2');
        $isHasSelect2Multiple  = Schema::hasColumn($table, 'select2_multiple');
        $isHasTextarea         = Schema::hasColumn($table, 'textarea');
        $isHasRadio            = Schema::hasColumn($table, 'radio');
        $isHasCheckbox         = Schema::hasColumn($table, 'checkbox');
        $isHasCheckbox2        = Schema::hasColumn($table, 'checkbox2');
        $isHasTags             = Schema::hasColumn($table, 'tags');
        $isHasFile             = Schema::hasColumn($table, 'file');
        $isHasImage            = Schema::hasColumn($table, 'image');
        $isHasDate             = Schema::hasColumn($table, 'date');
        $isHasTime             = Schema::hasColumn($table, 'time');
        $isHasColor            = Schema::hasColumn($table, 'color');
        $isHasSummernoteSimple = Schema::hasColumn($table, 'summernote_simple');
        $isHasSummernote       = Schema::hasColumn($table, 'summernote');
        $isHasTinymce          = Schema::hasColumn($table, 'tinymce');
        $isHasCkeditor         = Schema::hasColumn($table, 'ckeditor');
        $isHasIsActive         = Schema::hasColumn($table, 'is_active');
        $isHasBarcode          = Schema::hasColumn($table, 'barcode');
        $isHasQrCode           = Schema::hasColumn($table, 'qr_code');
        $isHasName             = Schema::hasColumn($table, 'name');
        $isHasPhoneNumber      = Schema::hasColumn($table, 'phone_number');
        $isHasBirthdate        = Schema::hasColumn($table, 'birthdate');
        $isHasAddress          = Schema::hasColumn($table, 'address');
        $isHasPassword         = Schema::hasColumn($table, 'password');
        $isHasAvatar           = Schema::hasColumn($table, 'avatar');
        $isHasDeletedAt        = Schema::hasColumn($table, 'deleted_at');

        $classes = [
            'Java',
            'Python',
            'C++',
            'JavaScript',
            'Ruby',
            'PHP',
            'Swift',
            'Kotlin',
            'C#',
            'Go',
            'R',
            'TypeScript',
        ];

        foreach ($classes as $i => $class) {
            $selectMultiple = [];
            foreach (range(1, Arr::random(range(1, 3))) as $j) {
                array_push($selectMultiple, $options[$j - 1]);
            }
            $checkbox = [];
            foreach (range(1, Arr::random(range(1, 3))) as $j) {
                array_push($checkbox, $options[$j - 1]);
            }
            $checkbox2 = [];
            foreach (range(1, Arr::random(range(1, 3))) as $j) {
                array_push($checkbox2, $options[$j - 1]);
            }
            $newData = [
                // ini boleh dikomen nanti ya kalau tidak digunakan
                'text'               => Str::random(10),
                'email'              => $email = $faker->email,
                'number'             => $faker->numberBetween(1, 1000),
                'currency'           => $faker->numberBetween(1, 10000),
                'currency_idr'       => $faker->numberBetween(1000, 10000000),
                'select'             => Arr::random($options),
                'select2'            => Arr::random($options),
                'select2_multiple'   => json_encode($selectMultiple),
                'textarea'           => $faker->text(100),
                'radio'              => Arr::random($radioOptions),
                'checkbox'           => json_encode($checkbox),
                'checkbox2'          => json_encode($checkbox2),
                'tags'               => implode(',', $checkbox2),
                'file'               => 'https://picsum.photos/300/200?random=' . $i,
                'image'              => 'https://picsum.photos/300/200?random=' . $i,
                'date'               => $faker->date('Y-m-d'),
                'time'               => $faker->date('H:i:s'),
                'color'              => $faker->hexColor,
                'summernote_simple'  => $faker->text(100),
                'summernote'         => $faker->randomHtml,
                'tinymce'            => $faker->randomHtml,
                'ckeditor'           => $faker->randomHtml,
                'is_active'          => Arr::random([true, false]),
                'barcode'            => Str::random(10),
                'qr_code'            => $faker->ean13,
                'name'               => $faker->name,
                'password'           => $pass,
                'avatar'             => $this->generateImage($email),
                'phone_number'       => $faker->phoneNumber,
                'birthdate'          => $faker->date('Y-m-d'),
                'address'            => $faker->address,
                // 'deleted_at' => null,

                // ini hasil generate dari make:module command
                'class_name' => $class,
                'deleted_at'         => Arr::random([null, $faker->dateTimeBetween('-1 month', 'now')]),
                'created_at'         => $faker->dateTimeBetween('-1 month', 'now'),
                'updated_at'         => $faker->dateTimeBetween('-1 month', 'now'),
                'created_by_id'      => Arr::random([null, 1]),
                'last_updated_by_id' => Arr::random([null, 1]),
            ];

            if (!$isHasText) {
                unset($newData['text']);
            }
            if (!$isHasEmail) {
                unset($newData['email']);
            }
            if (!$isHasNumber) {
                unset($newData['number']);
            }
            if (!$isHasCurrency) {
                unset($newData['currency']);
            }
            if (!$isHasCurrencyIdr) {
                unset($newData['currency_idr']);
            }
            if (!$isHasSelect) {
                unset($newData['select']);
            }
            if (!$isHasSelect2) {
                unset($newData['select2']);
            }
            if (!$isHasSelect2Multiple) {
                unset($newData['select2_multiple']);
            }
            if (!$isHasTextarea) {
                unset($newData['textarea']);
            }
            if (!$isHasRadio) {
                unset($newData['radio']);
            }
            if (!$isHasCheckbox) {
                unset($newData['checkbox']);
            }
            if (!$isHasCheckbox2) {
                unset($newData['checkbox2']);
            }
            if (!$isHasTags) {
                unset($newData['tags']);
            }
            if (!$isHasFile) {
                unset($newData['file']);
            }
            if (!$isHasImage) {
                unset($newData['image']);
            }
            if (!$isHasDate) {
                unset($newData['date']);
            }
            if (!$isHasTime) {
                unset($newData['time']);
            }
            if (!$isHasColor) {
                unset($newData['color']);
            }
            if (!$isHasSummernoteSimple) {
                unset($newData['summernote_simple']);
            }
            if (!$isHasSummernote) {
                unset($newData['summernote']);
            }
            if (!$isHasTinymce) {
                unset($newData['tinymce']);
            }
            if (!$isHasCkeditor) {
                unset($newData['ckeditor']);
            }
            if (!$isHasIsActive) {
                unset($newData['is_active']);
            }
            if (!$isHasBarcode) {
                unset($newData['barcode']);
            }
            if (!$isHasQrCode) {
                unset($newData['qr_code']);
            }
            if (!$isHasName) {
                unset($newData['name']);
            }
            if (!$isHasPhoneNumber) {
                unset($newData['phone_number']);
            }
            if (!$isHasBirthdate) {
                unset($newData['birthdate']);
            }
            if (!$isHasAddress) {
                unset($newData['address']);
            }
            if (!$isHasPassword) {
                unset($newData['password']);
            }
            if (!$isHasAvatar) {
                unset($newData['avatar']);
            }
            if (!$isHasDeletedAt) {
                unset($newData['deleted_at']);
            }

            array_push($data, $newData);
        }

        foreach (collect($data)->chunk(20) as $chunkData) {
            SchoolClass::insert($chunkData->toArray());
        }
    }
}
