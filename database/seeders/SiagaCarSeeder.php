<?php

namespace Database\Seeders;

use App\Models\SiagaCar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SiagaCarSeeder extends Seeder
{
    /**
     * Generate a gravatar image URL based on the email address.
     * NOTE: Gravatar standard uses MD5.
     */
    public function generateImage(string $email): string
    {
        $address = strtolower(trim($email));
        $hash = md5($address);

        return 'https://www.gravatar.com/avatar/' . $hash;
    }

    public function run(): void
    {
        $model = new SiagaCar();
        $table = $model->getTable();

        if (!Schema::hasTable($table)) {
            return;
        }

        Schema::disableForeignKeyConstraints();
        SiagaCar::truncate();

        $faker        = \Faker\Factory::create('id_ID');
        $options      = array_values(get_options());
        $radioOptions = array_values(get_options(4));
        $pass         = bcrypt('password');

        // ✅ Ambil kolom tabel sekali saja (lebih hemat daripada Schema::hasColumn berkali-kali)
        $columns = Schema::getColumnListing($table);
        $colSet  = array_flip($columns); // untuk lookup cepat: isset($colSet['email'])

        $makeSelectArray = function () use ($options) {
            $count = Arr::random([1, 2, 3]);
            // ambil unik biar gak dobel
            return array_values(Arr::random($options, $count));
        };

        $rows = [];
        $total = 1;

        for ($i = 1; $i <= $total; $i++) {
            $email = $faker->email;

            $selectMultiple = $makeSelectArray();
            $checkbox       = $makeSelectArray();
            $checkbox2      = $makeSelectArray();

            // ✅ Build data only for existing columns
            $row = [];

            if (isset($colSet['text']))              $row['text'] = Str::random(10);
            if (isset($colSet['email']))             $row['email'] = $email;
            if (isset($colSet['number']))            $row['number'] = $faker->numberBetween(1, 1000);
            if (isset($colSet['currency']))          $row['currency'] = $faker->numberBetween(1, 10000);
            if (isset($colSet['currency_idr']))      $row['currency_idr'] = $faker->numberBetween(1000, 10000000);

            if (isset($colSet['select']))            $row['select'] = Arr::random($options);
            if (isset($colSet['select2']))           $row['select2'] = Arr::random($options);
            if (isset($colSet['select2_multiple']))  $row['select2_multiple'] = json_encode($selectMultiple);

            if (isset($colSet['textarea']))          $row['textarea'] = $faker->text(100);
            if (isset($colSet['radio']))             $row['radio'] = Arr::random($radioOptions);
            if (isset($colSet['checkbox']))          $row['checkbox'] = json_encode($checkbox);
            if (isset($colSet['checkbox2']))         $row['checkbox2'] = json_encode($checkbox2);
            if (isset($colSet['tags']))              $row['tags'] = implode(',', $checkbox2);

            if (isset($colSet['file']))              $row['file'] = "https://picsum.photos/300/200?random={$i}";
            if (isset($colSet['image']))             $row['image'] = "https://picsum.photos/300/200?random={$i}";

            if (isset($colSet['date']))              $row['date'] = $faker->date('Y-m-d');
            if (isset($colSet['time']))              $row['time'] = $faker->date('H:i:s');
            if (isset($colSet['color']))             $row['color'] = $faker->hexColor;

            if (isset($colSet['summernote_simple'])) $row['summernote_simple'] = $faker->text(100);
            if (isset($colSet['summernote']))        $row['summernote'] = $faker->randomHtml;
            if (isset($colSet['tinymce']))           $row['tinymce'] = $faker->randomHtml;
            if (isset($colSet['ckeditor']))          $row['ckeditor'] = $faker->randomHtml;

            if (isset($colSet['is_active']))         $row['is_active'] = Arr::random([true, false]);
            if (isset($colSet['barcode']))           $row['barcode'] = Str::random(10);
            if (isset($colSet['qr_code']))           $row['qr_code'] = $faker->ean13;

            if (isset($colSet['name']))              $row['name'] = $faker->name;
            if (isset($colSet['phone_number']))      $row['phone_number'] = $faker->phoneNumber;
            if (isset($colSet['birthdate']))         $row['birthdate'] = $faker->date('Y-m-d');
            if (isset($colSet['address']))           $row['address'] = $faker->address;

            if (isset($colSet['password']))          $row['password'] = $pass;
            if (isset($colSet['avatar']))            $row['avatar'] = $this->generateImage($email);

            // soft delete + audit fields (kalau kolomnya ada)
            if (isset($colSet['deleted_at']))         $row['deleted_at'] = Arr::random([null, $faker->dateTimeBetween('-1 month', 'now')]);
            if (isset($colSet['created_at']))         $row['created_at'] = $faker->dateTimeBetween('-1 month', 'now');
            if (isset($colSet['updated_at']))         $row['updated_at'] = $faker->dateTimeBetween('-1 month', 'now');
            if (isset($colSet['created_by_id']))      $row['created_by_id'] = Arr::random([null, 1]);
            if (isset($colSet['last_updated_by_id'])) $row['last_updated_by_id'] = Arr::random([null, 1]);

            // 'deleted_at' => null,

            // ini hasil generate dari make:module command
            $row['name'] = 'Mobil Siaga 1';

            $rows[] = $row;

            // ✅ Insert per 200/1000 kalau datanya gede. Di contoh ini 20 cukup.
            if (count($rows) >= 200) {
                SiagaCar::insert($rows);
                $rows = [];
            }
        }

        if (!empty($rows)) {
            SiagaCar::insert($rows);
        }

        Schema::enableForeignKeyConstraints();
    }
}
