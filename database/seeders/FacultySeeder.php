<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\FacultyLeader;
use App\Models\Ormawa;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $data = '[
  {
    "fakultas": "Fakultas Ekonomi dan Bisnis",
    "program_studi": [
      "Manajemen",
      "Akuntansi",
      "Ilmu Ekonomi",
      "Ekonomi Pembangunan",
      "Ekonomi Syariah",
      "Bisnis Digital"
    ]
  },
  {
    "fakultas": "Fakultas Hukum",
    "program_studi": [
      "Ilmu Hukum",
      "Hukum Bisnis",
      "Hukum Pidana",
      "Hukum Tata Negara"
    ]
  },
  {
    "fakultas": "Fakultas Ilmu Sosial dan Ilmu Politik",
    "program_studi": [
      "Ilmu Komunikasi",
      "Hubungan Internasional",
      "Ilmu Politik",
      "Sosiologi",
      "Kriminologi",
      "Ilmu Pemerintahan"
    ]
  },
  {
    "fakultas": "Fakultas Ilmu Budaya",
    "program_studi": [
      "Sastra Indonesia",
      "Sastra Inggris",
      "Sastra Jepang",
      "Antropologi Budaya",
      "Sejarah"
    ]
  },
  {
    "fakultas": "Fakultas Psikologi",
    "program_studi": [
      "Psikologi"
    ]
  },
  {
    "fakultas": "Fakultas Ilmu Administrasi",
    "program_studi": [
      "Ilmu Administrasi Negara",
      "Ilmu Administrasi Bisnis",
      "Administrasi Fiskal"
    ]
  },
  {
    "fakultas": "Fakultas Keguruan dan Ilmu Pendidikan",
    "program_studi": [
      "Pendidikan Guru Sekolah Dasar (PGSD)",
      "Pendidikan Matematika",
      "Pendidikan Bahasa Inggris",
      "Pendidikan Biologi",
      "Pendidikan Kimia",
      "Bimbingan dan Konseling"
    ]
  },
  {
    "fakultas": "Fakultas Sains dan Teknologi",
    "program_studi": [
      "Sains Data",
      "Teknologi Pangan",
      "Statistika",
      "Matematika",
      "Biologi"
    ]
  },
  {
    "fakultas": "Fakultas Teknik",
    "program_studi": [
      "Teknik Sipil",
      "Teknik Mesin",
      "Teknik Elektro",
      "Teknik Industri",
      "Arsitektur",
      "Perencanaan Wilayah dan Kota",
      "Teknik Kimia"
    ]
  },
  {
    "fakultas": "Fakultas Ilmu Komputer",
    "program_studi": [
      "Informatika",
      "Sistem Informasi",
      "Teknologi Informasi",
      "Teknik Komputer"
    ]
  },
  {
    "fakultas": "Fakultas Pertanian",
    "program_studi": [
      "Agroteknologi",
      "Agribisnis",
      "Teknik Pertanian",
      "Ilmu Tanah"
    ]
  },
  {
    "fakultas": "Fakultas Kedokteran",
    "program_studi": [
      "Pendidikan Dokter",
      "Ilmu Gizi",
      "Keperawatan",
      "Farmasi"
    ]
  },
  {
    "fakultas": "Fakultas Kesehatan Masyarakat",
    "program_studi": [
      "Kesehatan Masyarakat",
      "Gizi Masyarakat"
    ]
  },
  {
    "fakultas": "Fakultas Kedokteran Gigi",
    "program_studi": [
      "Pendidikan Dokter Gigi",
      "Ilmu Kedokteran Gigi"
    ]
  },
  {
    "fakultas": "Fakultas Kedokteran Hewan",
    "program_studi": [
      "Pendidikan Dokter Hewan"
    ]
  },
  {
    "fakultas": "Fakultas Teknologi Pertanian",
    "program_studi": [
      "Ilmu dan Teknologi Pangan",
      "Teknik Pertanian dan Biosistem",
      "Teknologi Industri Pertanian"
    ]
  },
  {
    "fakultas": "Fakultas Perikanan dan Ilmu Kelautan",
    "program_studi": [
      "Ilmu Kelautan",
      "Akuakultur",
      "Teknologi Hasil Perikanan",
      "Manajemen Sumber Daya Perairan"
    ]
  },
  {
    "fakultas": "Fakultas Peternakan",
    "program_studi": [
      "Ilmu dan Teknologi Peternakan",
      "Nutrisi dan Teknologi Pakan"
    ]
  },
  {
    "fakultas": "Fakultas Kehutanan",
    "program_studi": [
      "Kehutanan",
      "Konservasi Sumber Daya Hutan dan Ekowisata"
    ]
  },
  {
    "fakultas": "Fakultas Seni Rupa dan Desain",
    "program_studi": [
      "Seni Rupa Murni",
      "Desain Komunikasi Visual",
      "Desain Interior",
      "Kriya Seni"
    ]
  },
  {
    "fakultas": "Fakultas Ilmu Keolahragaan",
    "program_studi": [
      "Pendidikan Jasmani",
      "Ilmu Keolahragaan",
      "Pendidikan Kepelatihan Olahraga"
    ]
  },
  {
    "fakultas": "Fakultas Ilmu Komunikasi",
    "program_studi": [
      "Ilmu Komunikasi",
      "Jurnalistik",
      "Hubungan Masyarakat",
      "Penyiaran"
    ]
  },
  {
    "fakultas": "Fakultas Pariwisata",
    "program_studi": [
      "Pariwisata",
      "Manajemen Perhotelan"
    ]
  },
  {
    "fakultas": "Fakultas Filsafat",
    "program_studi": [
      "Filsafat"
    ]
  },
  {
    "fakultas": "Fakultas Vokasi",
    "program_studi": [
      "Manajemen Perkantoran",
      "Akuntansi Keuangan Publik",
      "Manajemen Pemasaran"
    ]
  }
]';
        Faculty::truncate();
        StudyProgram::truncate();
        Student::truncate();
        foreach (json_decode($data, true) as $item) {
            Faculty::updateOrCreate([
                'name' => $item['fakultas'],
            ], [])->programs()->createMany(array_map(fn($program) => ['name' => $program], $item['program_studi']));
        }
        $students = '[
  {
    "nama": "Citra Lestari",
    "nim": "21081010001",
    "date_of_birth": "1999-05-12"
  },
  {
    "nama": "Budi Santoso",
    "nim": "21081010002",
    "date_of_birth": "2000-01-20"
  },
  {
    "nama": "Dewi Anggraini",
    "nim": "21081010003",
    "date_of_birth": "2001-08-30"
  },
  {
    "nama": "Fajar Pratama",
    "nim": "21081010004",
    "date_of_birth": "1999-11-05"
  },
  {
    "nama": "Kartika Sari",
    "nim": "21081010005",
    "date_of_birth": "2000-03-17"
  },
  {
    "nama": "Rizki Hidayat",
    "nim": "21081010006",
    "date_of_birth": "2001-02-28"
  },
  {
    "nama": "Siti Aminah",
    "nim": "21081010007",
    "date_of_birth": "2000-07-09"
  },
  {
    "nama": "Daffa Maulana",
    "nim": "21081010008",
    "date_of_birth": "1999-09-22"
  },
  {
    "nama": "Putri Ramadhani",
    "nim": "21081010009",
    "date_of_birth": "2001-04-01"
  },
  {
    "nama": "Yoga Prawira",
    "nim": "21081010010",
    "date_of_birth": "2000-06-15"
  },
  {
    "nama": "Wulan Febriani",
    "nim": "21081010011",
    "date_of_birth": "2001-03-11"
  },
  {
    "nama": "Dimas Nugroho",
    "nim": "21081010012",
    "date_of_birth": "1999-10-25"
  },
  {
    "nama": "Nadia Fitri",
    "nim": "21081010013",
    "date_of_birth": "2000-08-08"
  },
  {
    "nama": "Eko Susanto",
    "nim": "21081010014",
    "date_of_birth": "2001-01-19"
  },
  {
    "nama": "Maya Rahayu",
    "nim": "21081010015",
    "date_of_birth": "2000-12-04"
  },
  {
    "nama": "Aditya Wijaya",
    "nim": "21081010016",
    "date_of_birth": "1999-02-29"
  },
  {
    "nama": "Rina Wulandari",
    "nim": "21081010017",
    "date_of_birth": "2001-06-18"
  },
  {
    "nama": "Hendra Kurniawan",
    "nim": "21081010018",
    "date_of_birth": "2000-04-27"
  },
  {
    "nama": "Larasati Dewi",
    "nim": "21081010019",
    "date_of_birth": "2001-09-02"
  },
  {
    "nama": "Bayu Saputra",
    "nim": "21081010020",
    "date_of_birth": "1999-07-14"
  },
  {
    "nama": "Cindy Audina",
    "nim": "21081010021",
    "date_of_birth": "2000-05-23"
  },
  {
    "nama": "Fahmi Akbar",
    "nim": "21081010022",
    "date_of_birth": "2001-10-08"
  },
  {
    "nama": "Gina Permata",
    "nim": "21081010023",
    "date_of_birth": "2000-02-13"
  },
  {
    "nama": "Kevin Sanjaya",
    "nim": "21081010024",
    "date_of_birth": "2001-07-07"
  },
  {
    "nama": "Laila Nurmala",
    "nim": "21081010025",
    "date_of_birth": "1999-04-16"
  },
  {
    "nama": "Mirza Putra",
    "nim": "21081010026",
    "date_of_birth": "2000-11-29"
  },
  {
    "nama": "Nina Kusuma",
    "nim": "21081010027",
    "date_of_birth": "2001-01-06"
  },
  {
    "nama": "Panca Andika",
    "nim": "21081010028",
    "date_of_birth": "2000-09-24"
  },
  {
    "nama": "Qori Maulida",
    "nim": "21081010029",
    "date_of_birth": "1999-06-03"
  },
  {
    "nama": "Rizky Firmansyah",
    "nim": "21081010030",
    "date_of_birth": "2001-08-14"
  },
  {
    "nama": "Sarah Ayu",
    "nim": "21081010031",
    "date_of_birth": "2000-03-28"
  },
  {
    "nama": "Taufik Rahman",
    "nim": "21081010032",
    "date_of_birth": "2001-05-19"
  },
  {
    "nama": "Vina Octavia",
    "nim": "21081010033",
    "date_of_birth": "1999-12-07"
  },
  {
    "nama": "Wisnu Aditama",
    "nim": "21081010034",
    "date_of_birth": "2000-01-26"
  },
  {
    "nama": "Yuni Susanti",
    "nim": "21081010035",
    "date_of_birth": "2001-04-09"
  },
  {
    "nama": "Zaki Alfarizi",
    "nim": "21081010036",
    "date_of_birth": "2000-10-31"
  },
  {
    "nama": "Anisa Putri",
    "nim": "21081010037",
    "date_of_birth": "1999-08-01"
  },
  {
    "nama": "Dito Kurniawan",
    "nim": "21081010038",
    "date_of_birth": "2001-06-11"
  },
  {
    "nama": "Elisa Fitriani",
    "nim": "21081010039",
    "date_of_birth": "2000-05-09"
  },
  {
    "nama": "Gita Lestari",
    "nim": "21081010040",
    "date_of_birth": "2001-02-20"
  },
  {
    "nama": "Hafiz Maulana",
    "nim": "21081010041",
    "date_of_birth": "1999-09-18"
  },
  {
    "nama": "Indah Sari",
    "nim": "21081010042",
    "date_of_birth": "2000-07-27"
  },
  {
    "nama": "Joko Wicaksono",
    "nim": "21081010043",
    "date_of_birth": "2001-11-04"
  },
  {
    "nama": "Kiki Amalia",
    "nim": "21081010044",
    "date_of_birth": "2000-03-01"
  },
  {
    "nama": "Luthfi Adnan",
    "nim": "21081010045",
    "date_of_birth": "1999-12-25"
  },
  {
    "nama": "Mita Rahmawati",
    "nim": "21081010046",
    "date_of_birth": "2001-08-03"
  },
  {
    "nama": "Nova Susanti",
    "nim": "21081010047",
    "date_of_birth": "2000-06-20"
  },
  {
    "nama": "Oki Permana",
    "nim": "21081010048",
    "date_of_birth": "2001-01-10"
  },
  {
    "nama": "Putra Aditya",
    "nim": "21081010049",
    "date_of_birth": "2000-04-14"
  },
  {
    "nama": "Rani Amelia",
    "nim": "21081010050",
    "date_of_birth": "1999-07-28"
  },
  {
    "nama": "Rian Kusuma",
    "nim": "21081010051",
    "date_of_birth": "2001-10-05"
  },
  {
    "nama": "Silvi Nuraini",
    "nim": "21081010052",
    "date_of_birth": "2000-08-16"
  },
  {
    "nama": "Toni Setiawan",
    "nim": "21081010053",
    "date_of_birth": "2001-03-22"
  },
  {
    "nama": "Ulfa Damayanti",
    "nim": "21081010054",
    "date_of_birth": "1999-05-08"
  },
  {
    "nama": "Vicky Maulana",
    "nim": "21081010055",
    "date_of_birth": "2000-02-19"
  },
  {
    "nama": "Winda Septiani",
    "nim": "21081010056",
    "date_of_birth": "2001-09-29"
  },
  {
    "nama": "Yudha Wijaya",
    "nim": "21081010057",
    "date_of_birth": "2000-11-13"
  },
  {
    "nama": "Zahra Permata",
    "nim": "21081010058",
    "date_of_birth": "1999-04-06"
  },
  {
    "nama": "Abdi Negara",
    "nim": "21081010059",
    "date_of_birth": "2001-06-25"
  },
  {
    "nama": "Bella Ayu",
    "nim": "21081010060",
    "date_of_birth": "2000-05-15"
  },
  {
    "nama": "Candra Firmansyah",
    "nim": "21081010061",
    "date_of_birth": "2001-02-04"
  },
  {
    "nama": "Dina Wulandari",
    "nim": "21081010062",
    "date_of_birth": "1999-10-10"
  },
  {
    "nama": "Eka Saputra",
    "nim": "21081010063",
    "date_of_birth": "2000-09-01"
  },
  {
    "nama": "Fitriani",
    "nim": "21081010064",
    "date_of_birth": "2001-07-12"
  },
  {
    "nama": "Galih Ramadhan",
    "nim": "21081010065",
    "date_of_birth": "1999-03-21"
  },
  {
    "nama": "Hani Pratiwi",
    "nim": "21081010066",
    "date_of_birth": "2000-04-07"
  },
  {
    "nama": "Iqbal Fadillah",
    "nim": "21081010067",
    "date_of_birth": "2001-11-17"
  },
  {
    "nama": "Jessica Tan",
    "nim": "21081010068",
    "date_of_birth": "2000-06-29"
  },
  {
    "nama": "Kurniawan",
    "nim": "21081010069",
    "date_of_birth": "2001-08-05"
  },
  {
    "nama": "Lia Aprilia",
    "nim": "21081010070",
    "date_of_birth": "1999-12-19"
  },
  {
    "nama": "Maulana Siddiq",
    "nim": "21081010071",
    "date_of_birth": "2000-01-03"
  },
  {
    "nama": "Nurfadillah",
    "nim": "21081010072",
    "date_of_birth": "2001-05-24"
  },
  {
    "nama": "Oscar Pratama",
    "nim": "21081010073",
    "date_of_birth": "2000-10-15"
  },
  {
    "nama": "Peni Wulandari",
    "nim": "21081010074",
    "date_of_birth": "1999-08-26"
  },
  {
    "nama": "Rizka Amelia",
    "nim": "21081010075",
    "date_of_birth": "2001-09-08"
  },
  {
    "nama": "Septian Haryadi",
    "nim": "21081010076",
    "date_of_birth": "2000-03-10"
  },
  {
    "nama": "Tiara Andini",
    "nim": "21081010077",
    "date_of_birth": "2001-07-21"
  },
  {
    "nama": "Umar Dzakwan",
    "nim": "21081010078",
    "date_of_birth": "1999-04-20"
  },
  {
    "nama": "Vina Rizky",
    "nim": "21081010079",
    "date_of_birth": "2000-11-02"
  },
  {
    "nama": "Wahyu Syahputra",
    "nim": "21081010080",
    "date_of_birth": "2001-01-31"
  },
  {
    "nama": "Yusuf Maulana",
    "nim": "21081010081",
    "date_of_birth": "2000-06-13"
  },
  {
    "nama": "Zara Faradila",
    "nim": "21081010082",
    "date_of_birth": "1999-09-28"
  },
  {
    "nama": "Ali Murtado",
    "nim": "21081010083",
    "date_of_birth": "2001-04-03"
  },
  {
    "nama": "Bella Salsabila",
    "nim": "21081010084",
    "date_of_birth": "2000-03-08"
  },
  {
    "nama": "Cahya Ramadhani",
    "nim": "21081010085",
    "date_of_birth": "2001-07-16"
  },
  {
    "nama": "Danu Prasetyo",
    "nim": "21081010086",
    "date_of_birth": "1999-10-29"
  },
  {
    "nama": "Erica Putri",
    "nim": "21081010087",
    "date_of_birth": "2000-09-05"
  },
  {
    "nama": "Gilang Mahendra",
    "nim": "21081010088",
    "date_of_birth": "2001-02-15"
  },
  {
    "nama": "Hana Safira",
    "nim": "21081010089",
    "date_of_birth": "1999-11-21"
  },
  {
    "nama": "Irfan Hakim",
    "nim": "21081010090",
    "date_of_birth": "2000-07-04"
  },
  {
    "nama": "Jihan Nabila",
    "nim": "21081010091",
    "date_of_birth": "2001-08-25"
  },
  {
    "nama": "Kevin Pratama",
    "nim": "21081010092",
    "date_of_birth": "2000-05-18"
  },
  {
    "nama": "Lia Fitri",
    "nim": "21081010093",
    "date_of_birth": "1999-06-09"
  },
  {
    "nama": "Mochammad Alif",
    "nim": "21081010094",
    "date_of_birth": "2001-03-24"
  },
  {
    "nama": "Naila Zahra",
    "nim": "21081010095",
    "date_of_birth": "2000-04-12"
  },
  {
    "nama": "Ojan Maulana",
    "nim": "21081010096",
    "date_of_birth": "2001-09-17"
  },
  {
    "nama": "Putri Lestari",
    "nim": "21081010097",
    "date_of_birth": "1999-01-02"
  },
  {
    "nama": "Rizki Febrian",
    "nim": "21081010098",
    "date_of_birth": "2000-12-08"
  },
  {
    "nama": "Santi Agustina",
    "nim": "21081010099",
    "date_of_birth": "2001-06-28"
  },
  {
    "nama": "Teddy Wijaya",
    "nim": "21081010100",
    "date_of_birth": "2000-07-30"
  },
  {
    "nama": "Andi Gunawan",
    "nim": "21081010101",
    "date_of_birth": "1999-03-05"
  },
  {
    "nama": "Bunga Citra",
    "nim": "21081010102",
    "date_of_birth": "2001-01-14"
  },
  {
    "nama": "Darmawan",
    "nim": "21081010103",
    "date_of_birth": "2000-04-20"
  },
  {
    "nama": "Elisa Fitri",
    "nim": "21081010104",
    "date_of_birth": "2001-08-01"
  },
  {
    "nama": "Fahri Hidayat",
    "nim": "21081010105",
    "date_of_birth": "1999-10-15"
  },
  {
    "nama": "Gita Kirana",
    "nim": "21081010106",
    "date_of_birth": "2000-02-23"
  },
  {
    "nama": "Hadi Pratama",
    "nim": "21081010107",
    "date_of_birth": "2001-09-07"
  },
  {
    "nama": "Ira Puspita",
    "nim": "21081010108",
    "date_of_birth": "2000-05-11"
  },
  {
    "nama": "Joni Pratama",
    "nim": "21081010109",
    "date_of_birth": "1999-07-25"
  },
  {
    "nama": "Lina Agustina",
    "nim": "21081010110",
    "date_of_birth": "2001-03-16"
  },
  {
    "nama": "Marwan Efendi",
    "nim": "21081010111",
    "date_of_birth": "2000-11-20"
  },
  {
    "nama": "Nia Ramadhani",
    "nim": "21081010112",
    "date_of_birth": "2001-06-04"
  },
  {
    "nama": "Panji Saputra",
    "nim": "21081010113",
    "date_of_birth": "1999-08-18"
  },
  {
    "nama": "Rina Lestari",
    "nim": "21081010114",
    "date_of_birth": "2000-09-29"
  },
  {
    "nama": "Sinta Dewi",
    "nim": "21081010115",
    "date_of_birth": "2001-04-22"
  },
  {
    "nama": "Tito Arianto",
    "nim": "21081010116",
    "date_of_birth": "1999-12-05"
  },
  {
    "nama": "Umi Farida",
    "nim": "21081010117",
    "date_of_birth": "2000-10-10"
  },
  {
    "nama": "Wahyu Pratama",
    "nim": "21081010118",
    "date_of_birth": "2001-02-09"
  },
  {
    "nama": "Yulia Safitri",
    "nim": "21081010119",
    "date_of_birth": "2000-01-28"
  },
  {
    "nama": "Zidan Maulana",
    "nim": "21081010120",
    "date_of_birth": "2001-05-27"
  },
  {
    "nama": "Agus Setiawan",
    "nim": "21081010121",
    "date_of_birth": "1999-06-08"
  },
  {
    "nama": "Bella Putri",
    "nim": "21081010122",
    "date_of_birth": "2000-08-17"
  },
  {
    "nama": "Cahya Puspita",
    "nim": "21081010123",
    "date_of_birth": "2001-03-03"
  },
  {
    "nama": "Diki Hidayat",
    "nim": "21081010124",
    "date_of_birth": "1999-09-20"
  },
  {
    "nama": "Evi Damayanti",
    "nim": "21081010125",
    "date_of_birth": "2000-04-18"
  },
  {
    "nama": "Fikri Ramadhan",
    "nim": "21081010126",
    "date_of_birth": "2001-07-09"
  },
  {
    "nama": "Gita Anggraini",
    "nim": "21081010127",
    "date_of_birth": "1999-11-12"
  },
  {
    "nama": "Hafiz Ridwan",
    "nim": "21081010128",
    "date_of_birth": "2000-01-30"
  },
  {
    "nama": "Irma Sari",
    "nim": "21081010129",
    "date_of_birth": "2001-10-06"
  },
  {
    "nama": "Joko Susilo",
    "nim": "21081010130",
    "date_of_birth": "2000-12-11"
  },
  {
    "nama": "Lia Fitriani",
    "nim": "21081010131",
    "date_of_birth": "1999-05-19"
  },
  {
    "nama": "Muhammad Iqbal",
    "nim": "21081010132",
    "date_of_birth": "2001-08-28"
  },
  {
    "nama": "Nida Farhanah",
    "nim": "21081010133",
    "date_of_birth": "2000-06-02"
  },
  {
    "nama": "Oki Saputra",
    "nim": "21081010134",
    "date_of_birth": "2001-01-21"
  },
  {
    "nama": "Puput Indah",
    "nim": "21081010135",
    "date_of_birth": "1999-07-04"
  },
  {
    "nama": "Rendy Maulana",
    "nim": "21081010136",
    "date_of_birth": "2000-02-14"
  },
  {
    "nama": "Shinta Dewi",
    "nim": "21081010137",
    "date_of_birth": "2001-09-25"
  },
  {
    "nama": "Tegar Yudha",
    "nim": "21081010138",
    "date_of_birth": "2000-11-08"
  },
  {
    "nama": "Uli Nurul",
    "nim": "21081010139",
    "date_of_birth": "1999-04-26"
  },
  {
    "nama": "Vicky Wibisono",
    "nim": "21081010140",
    "date_of_birth": "2001-06-15"
  },
  {
    "nama": "Winda Pratama",
    "nim": "21081010141",
    "date_of_birth": "2000-03-09"
  },
  {
    "nama": "Yoga Prayoga",
    "nim": "21081010142",
    "date_of_birth": "2001-08-04"
  },
  {
    "nama": "Zahra Salsabila",
    "nim": "21081010143",
    "date_of_birth": "1999-10-31"
  },
  {
    "nama": "Afifuddin",
    "nim": "21081010144",
    "date_of_birth": "2000-05-24"
  },
  {
    "nama": "Bunga Amelia",
    "nim": "21081010145",
    "date_of_birth": "2001-02-17"
  },
  {
    "nama": "Dede Rahmat",
    "nim": "21081010146",
    "date_of_birth": "1999-12-09"
  },
  {
    "nama": "Eka Wibowo",
    "nim": "21081010147",
    "date_of_birth": "2000-07-22"
  },
  {
    "nama": "Fira Laila",
    "nim": "21081010148",
    "date_of_birth": "2001-01-05"
  },
  {
    "nama": "Galuh Kusuma",
    "nim": "21081010149",
    "date_of_birth": "2000-04-11"
  },
  {
    "nama": "Hafiza Annisa",
    "nim": "21081010150",
    "date_of_birth": "1999-06-27"
  },
  {
    "nama": "Irfan Nugroho",
    "nim": "21081010151",
    "date_of_birth": "2001-05-09"
  },
  {
    "nama": "Jihan Putri",
    "nim": "21081010152",
    "date_of_birth": "2000-09-14"
  },
  {
    "nama": "Krisna Saputra",
    "nim": "21081010153",
    "date_of_birth": "2001-10-28"
  },
  {
    "nama": "Lia Kusuma",
    "nim": "21081010154",
    "date_of_birth": "1999-03-01"
  },
  {
    "nama": "Mega Lestari",
    "nim": "21081010155",
    "date_of_birth": "2000-08-06"
  },
  {
    "nama": "Naufal Andika",
    "nim": "21081010156",
    "date_of_birth": "2001-04-19"
  },
  {
    "nama": "Putri Maharani",
    "nim": "21081010157",
    "date_of_birth": "2000-01-24"
  },
  {
    "nama": "Ridwan Setiadi",
    "nim": "21081010158",
    "date_of_birth": "2001-07-13"
  },
  {
    "nama": "Salsabila Fitri",
    "nim": "21081010159",
    "date_of_birth": "1999-11-20"
  },
  {
    "nama": "Tommy Syahputra",
    "nim": "21081010160",
    "date_of_birth": "2000-06-25"
  },
  {
    "nama": "Umi Laila",
    "nim": "21081010161",
    "date_of_birth": "2001-05-02"
  },
  {
    "nama": "Vian Pratama",
    "nim": "21081010162",
    "date_of_birth": "1999-08-11"
  },
  {
    "nama": "Widi Astuti",
    "nim": "21081010163",
    "date_of_birth": "2000-10-18"
  },
  {
    "nama": "Yuda Wirawan",
    "nim": "21081010164",
    "date_of_birth": "2001-03-29"
  },
  {
    "nama": "Zaki Haryanto",
    "nim": "21081010165",
    "date_of_birth": "1999-04-04"
  },
  {
    "nama": "Andi Saputra",
    "nim": "21081010166",
    "date_of_birth": "2000-02-10"
  },
  {
    "nama": "Bintang Aditama",
    "nim": "21081010167",
    "date_of_birth": "2001-09-01"
  },
  {
    "nama": "Cahya Fitriani",
    "nim": "21081010168",
    "date_of_birth": "2000-07-20"
  },
  {
    "nama": "Dina Pratiwi",
    "nim": "21081010169",
    "date_of_birth": "2001-01-26"
  },
  {
    "nama": "Edo Wicaksono",
    "nim": "21081010170",
    "date_of_birth": "1999-06-19"
  },
  {
    "nama": "Fikri Maulana",
    "nim": "21081010171",
    "date_of_birth": "2000-05-03"
  },
  {
    "nama": "Gita Lestari",
    "nim": "21081010172",
    "date_of_birth": "2001-08-15"
  },
  {
    "nama": "Hendra Kurniawan",
    "nim": "21081010173",
    "date_of_birth": "2000-04-24"
  },
  {
    "nama": "Icha Fauziah",
    "nim": "21081010174",
    "date_of_birth": "2001-02-12"
  },
  {
    "nama": "Junaidi Arifin",
    "nim": "21081010175",
    "date_of_birth": "1999-10-09"
  },
  {
    "nama": "Kirana Safitri",
    "nim": "21081010176",
    "date_of_birth": "2000-03-21"
  },
  {
    "nama": "Lutfi Kurniawan",
    "nim": "21081010177",
    "date_of_birth": "2001-07-07"
  },
  {
    "nama": "Mira Handayani",
    "nim": "21081010178",
    "date_of_birth": "1999-11-28"
  },
  {
    "nama": "Nanda Permana",
    "nim": "21081010179",
    "date_of_birth": "2000-06-05"
  },
  {
    "nama": "Oktavia Sari",
    "nim": "21081010180",
    "date_of_birth": "2001-01-18"
  },
  {
    "nama": "Pandu Wibowo",
    "nim": "21081010181",
    "date_of_birth": "2000-09-02"
  },
  {
    "nama": "Rani Agustin",
    "nim": "21081010182",
    "date_of_birth": "2001-05-13"
  },
  {
    "nama": "Rio Aditya",
    "nim": "21081010183",
    "date_of_birth": "1999-03-27"
  },
  {
    "nama": "Selly Wulandari",
    "nim": "21081010184",
    "date_of_birth": "2000-12-01"
  },
  {
    "nama": "Taufiq Nurrohman",
    "nim": "21081010185",
    "date_of_birth": "2001-04-08"
  },
  {
    "nama": "Ulfa Sari",
    "nim": "21081010186",
    "date_of_birth": "1999-07-10"
  },
  {
    "nama": "Viktor Halim",
    "nim": "21081010187",
    "date_of_birth": "2000-11-22"
  },
  {
    "nama": "Wulan Lestari",
    "nim": "21081010188",
    "date_of_birth": "2001-06-21"
  },
  {
    "nama": "Yanto Firmansyah",
    "nim": "21081010189",
    "date_of_birth": "1999-09-06"
  },
  {
    "nama": "Zia Salsabila",
    "nim": "21081010190",
    "date_of_birth": "2000-08-29"
  },
  {
    "nama": "Ahmad Rizky",
    "nim": "21081010191",
    "date_of_birth": "2001-03-14"
  },
  {
    "nama": "Bella Febriani",
    "nim": "21081010192",
    "date_of_birth": "1999-02-05"
  },
  {
    "nama": "Cahyo Setiawan",
    "nim": "21081010193",
    "date_of_birth": "2000-10-03"
  },
  {
    "nama": "Dani Pratama",
    "nim": "21081010194",
    "date_of_birth": "2001-04-20"
  },
  {
    "nama": "Eka Nuraini",
    "nim": "21081010195",
    "date_of_birth": "2000-01-28"
  },
  {
    "nama": "Fajar Maulana",
    "nim": "21081010196",
    "date_of_birth": "2001-08-05"
  },
  {
    "nama": "Gina Fitriani",
    "nim": "21081010197",
    "date_of_birth": "1999-11-17"
  },
  {
    "nama": "Hadi Wijaya",
    "nim": "21081010198",
    "date_of_birth": "2000-06-22"
  },
  {
    "nama": "Inka Pratiwi",
    "nim": "21081010199",
    "date_of_birth": "2001-02-09"
  },
  {
    "nama": "Joko Susanto",
    "nim": "21081010200",
    "date_of_birth": "1999-05-18"
  }
]';
        $students = json_decode($students, true);
        StudyProgram::all()->each(function ($program, $i) use ($students) {
            try {
                $program->students()->create(
                    [
                        'name' => $students[$i]['nama'],
                        'nim' => $students[$i]['nim'],
                        'date_of_birth' => $students[$i]['date_of_birth'],
                    ]
                );
            } catch (\Exception $e) {
                \Log::error("Error creating student for program {$program->id}: {$e->getMessage()}");
            }
        });

        FacultyLeader::truncate();
        foreach (range(1, 100) as $index) {
            FacultyLeader::create([
                'name' => fake()->name(),
                'faculty_id' => rand(1, 10),
            ]);
        }

        $ormawa = '[
{
"id": 1,
"name": "Badan Eksekutif Mahasiswa (BEM) Universitas",
"jenis": "BEM",
"deskripsi": "Organisasi kemahasiswaan tertinggi di tingkat universitas."
},
{
"id": 2,
"name": "Himpunan Mahasiswa Teknik Informatika (HMTI)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah pengembangan mahasiswa jurusan Teknik Informatika."
},
{
"id": 3,
"name": "Unit Kegiatan Mahasiswa Pecinta Alam (UKM Mapala)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat dan bakat mahasiswa dalam kegiatan alam bebas."
},
{
"id": 4,
"name": "Korps Sukarela Palang Merah Indonesia (KSR PMI)",
"jenis": "UKM",
"deskripsi": "Unit kegiatan yang fokus pada kegiatan sosial dan kemanusiaan."
},
{
"id": 5,
"name": "Seni Tari Mahasiswa (Sekar Taji)",
"jenis": "UKM",
"deskripsi": "Mengembangkan seni dan budaya tari tradisional dan modern."
},
{
"id": 6,
"name": "Pers Mahasiswa (Persma)",
"jenis": "UKM",
"deskripsi": "Wadah bagi mahasiswa yang tertarik di dunia jurnalistik."
},
{
"id": 7,
"name": "Forum Studi Islam Mahasiswa (FSIM)",
"jenis": "UKM",
"deskripsi": "Membina spiritualitas dan keilmuan Islam bagi mahasiswa."
},
{
"id": 8,
"name": "Paduan Suara Mahasiswa (PSM)",
"jenis": "UKM",
"deskripsi": "Mengasah bakat vokal dan musikal mahasiswa dalam paduan suara."
},
{
"id": 9,
"name": "Komunitas Fotografi (Kofograf)",
"jenis": "UKM",
"deskripsi": "Mewadahi minat mahasiswa dalam seni fotografi."
},
{
"id": 10,
"name": "Badan Eksekutif Mahasiswa Fakultas (BEM F)",
"jenis": "BEM",
"deskripsi": "Organisasi kemahasiswaan di tingkat fakultas."
},
{
"id": 11,
"name": "Himpunan Mahasiswa Akuntansi (HMA)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Membantu pengembangan mahasiswa jurusan Akuntansi."
},
{
"id": 12,
"name": "English Debating Society (EDS)",
"jenis": "UKM",
"deskripsi": "Melatih kemampuan debat dan public speaking dalam bahasa Inggris."
},
{
"id": 13,
"name": "Koperasi Mahasiswa (Kopma)",
"jenis": "UKM",
"deskripsi": "Mengelola unit usaha berbasis koperasi bagi mahasiswa."
},
{
"id": 14,
"name": "Teater Mahasiswa (Teater O)",
"jenis": "UKM",
"deskripsi": "Wadah kreasi seni pertunjukan dan drama."
},
{
"id": 15,
"name": "Seni Bela Diri Karate (UKM Karate)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat bela diri dan kedisiplinan."
},
{
"id": 16,
"name": "Himpunan Mahasiswa Teknik Elektro (HMTE)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mewadahi mahasiswa yang memiliki minat di bidang elektronika."
},
{
"id": 17,
"name": "UKM Renang (UKM Renang)",
"jenis": "UKM",
"deskripsi": "Unit kegiatan yang berfokus pada olahraga renang."
},
{
"id": 18,
"name": "Komunitas Pecinta Otomotif (KPO)",
"jenis": "UKM",
"deskripsi": "Mengumpulkan mahasiswa yang memiliki hobi di bidang otomotif."
},
{
"id": 19,
"name": "Mahasiswa Pecinta Lingkungan (Malin)",
"jenis": "UKM",
"deskripsi": "Fokus pada isu-isu lingkungan hidup dan pelestarian alam."
},
{
"id": 20,
"name": "Himpunan Mahasiswa Sosiologi (HMS)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah diskusi dan pengembangan ilmu sosiologi."
},
{
"id": 21,
"name": "UKM Sepak Bola (UKM Sepak Bola)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat dan minat mahasiswa di olahraga sepak bola."
},
{
"id": 22,
"name": "Komunitas Astronomi (Astroun)",
"jenis": "UKM",
"deskripsi": "Mengkaji dan mengamati fenomena astronomi."
},
{
"id": 23,
"name": "Forum Mahasiswa Katolik (FMK)",
"jenis": "UKM",
"deskripsi": "Membina keilmuan dan spiritualitas bagi mahasiswa Katolik."
},
{
"id": 24,
"name": "Himpunan Mahasiswa Ilmu Komunikasi (Himakom)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah pengembangan mahasiswa jurusan Ilmu Komunikasi."
},
{
"id": 25,
"name": "UKM Badminton (UKM Badminton)",
"jenis": "UKM",
"deskripsi": "Mengembangkan bakat mahasiswa di bidang olahraga bulu tangkis."
},
{
"id": 26,
"name": "Komunitas Pecinta Film (Kofilm)",
"jenis": "UKM",
"deskripsi": "Mewadahi mahasiswa yang memiliki minat di dunia sinematografi."
},
{
"id": 27,
"name": "Himpunan Mahasiswa Biologi (Himabio)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan keilmuan dan minat mahasiswa di bidang Biologi."
},
{
"id": 28,
"name": "Mahasiswa Pencinta Seni Rupa (Marseni)",
"jenis": "UKM",
"deskripsi": "Wadah bagi mahasiswa yang memiliki minat di seni lukis dan rupa."
},
{
"id": 29,
"name": "Himpunan Mahasiswa Manajemen (Himamen)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada pengembangan pengetahuan di bidang manajemen."
},
{
"id": 30,
"name": "UKM Musik (UKM Musik)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat dan minat mahasiswa di bidang musik."
},
{
"id": 31,
"name": "Himpunan Mahasiswa Hukum (Himakum)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mewadahi diskusi dan pengembangan keilmuan di bidang hukum."
},
{
"id": 32,
"name": "UKM Catur (UKM Catur)",
"jenis": "UKM",
"deskripsi": "Mengasah strategi dan pemikiran di olahraga catur."
},
{
"id": 33,
"name": "Komunitas Desain Grafis (Kodesain)",
"jenis": "UKM",
"deskripsi": "Wadah bagi mahasiswa yang tertarik di bidang desain grafis."
},
{
"id": 34,
"name": "Himpunan Mahasiswa Kedokteran (Himdok)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Membantu pengembangan mahasiswa di bidang ilmu kedokteran."
},
{
"id": 35,
"name": "UKM Bola Basket (UKM Basket)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat mahasiswa di olahraga bola basket."
},
{
"id": 36,
"name": "Himpunan Mahasiswa Arsitektur (Himars)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah pengembangan mahasiswa jurusan Arsitektur."
},
{
"id": 37,
"name": "UKM Taekwondo (UKM Taekwondo)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat bela diri Taekwondo."
},
{
"id": 38,
"name": "Komunitas Bisnis Mahasiswa (Kobis)",
"jenis": "UKM",
"deskripsi": "Fokus pada pengembangan jiwa kewirausahaan."
},
{
"id": 39,
"name": "Himpunan Mahasiswa Psikologi (Himapsi)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah untuk pengembangan pengetahuan psikologi."
},
{
"id": 40,
"name": "UKM Jurnalistik (UKM Jurnalistik)",
"jenis": "UKM",
"deskripsi": "Melatih keterampilan menulis dan jurnalistik."
},
{
"id": 41,
"name": "Himpunan Mahasiswa Sastra Inggris (Himasing)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah bagi mahasiswa jurusan Sastra Inggris."
},
{
"id": 42,
"name": "UKM Voli (UKM Voli)",
"jenis": "UKM",
"deskripsi": "Mengembangkan bakat dan minat di olahraga bola voli."
},
{
"id": 43,
"name": "Himpunan Mahasiswa Pertanian (Himapertan)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada pengembangan ilmu pertanian."
},
{
"id": 44,
"name": "UKM Panahan (UKM Panahan)",
"jenis": "UKM",
"deskripsi": "Mengasah ketepatan dan konsentrasi di olahraga panahan."
},
{
"id": 45,
"name": "Komunitas Robotika (Koro)",
"jenis": "UKM",
"deskripsi": "Mewadahi mahasiswa yang tertarik di bidang robotika."
},
{
"id": 46,
"name": "Himpunan Mahasiswa Teknik Kimia (HMTK)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Membantu pengembangan mahasiswa di bidang Teknik Kimia."
},
{
"id": 47,
"name": "UKM Futsal (UKM Futsal)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat di olahraga futsal."
},
{
"id": 48,
"name": "Himpunan Mahasiswa Teknik Sipil (HMTS)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah pengembangan mahasiswa di bidang Teknik Sipil."
},
{
"id": 49,
"name": "UKM Tenis Meja (UKM Tenis Meja)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat di olahraga tenis meja."
},
{
"id": 50,
"name": "Himpunan Mahasiswa Teknik Mesin (HMTM)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah bagi mahasiswa di jurusan Teknik Mesin."
},
{
"id": 51,
"name": "UKM Debat Bahasa Indonesia (Debatindo)",
"jenis": "UKM",
"deskripsi": "Mengasah kemampuan debat dan berpikir kritis."
},
{
"id": 52,
"name": "Himpunan Mahasiswa Kimia (Himka)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan keilmuan di bidang Kimia."
},
{
"id": 53,
"name": "UKM Panjat Tebing (UKM Panjat Tebing)",
"jenis": "UKM",
"deskripsi": "Wadah bagi mahasiswa yang memiliki minat panjat tebing."
},
{
"id": 54,
"name": "Himpunan Mahasiswa Ekonomi Pembangunan (Himaep)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada keilmuan di bidang ekonomi pembangunan."
},
{
"id": 55,
"name": "UKM Bulutangkis (UKM Bulutangkis)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat di olahraga bulu tangkis."
},
{
"id": 56,
"name": "Himpunan Mahasiswa Matematika (Himamat)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah diskusi dan pengembangan ilmu matematika."
},
{
"id": 57,
"name": "UKM Wushu (UKM Wushu)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat bela diri Wushu."
},
{
"id": 58,
"name": "Himpunan Mahasiswa Gizi (Himagi)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada pengembangan pengetahuan di bidang gizi."
},
{
"id": 59,
"name": "UKM Taekwondo (UKM Taekwondo)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat bela diri Taekwondo."
},
{
"id": 60,
"name": "Himpunan Mahasiswa Teknik Industri (HMTI)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mewadahi mahasiswa di jurusan Teknik Industri."
},
{
"id": 61,
"name": "UKM Beladiri (UKM Beladiri)",
"jenis": "UKM",
"deskripsi": "Wadah bagi mahasiswa untuk mempelajari berbagai jenis beladiri."
},
{
"id": 62,
"name": "Himpunan Mahasiswa Geografi (Himagraf)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan pengetahuan di bidang geografi."
},
{
"id": 63,
"name": "UKM Musik Tradisional (Mustra)",
"jenis": "UKM",
"deskripsi": "Melestarikan dan mengembangkan seni musik tradisional."
},
{
"id": 64,
"name": "Himpunan Mahasiswa Fisika (Himafis)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Membantu pengembangan mahasiswa di bidang fisika."
},
{
"id": 65,
"name": "UKM Panahan (UKM Panahan)",
"jenis": "UKM",
"deskripsi": "Mengasah ketepatan dan konsentrasi di olahraga panahan."
},
{
"id": 66,
"name": "Himpunan Mahasiswa Hubungan Internasional (Himahi)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada isu-isu dan diplomasi internasional."
},
{
"id": 67,
"name": "UKM Jurnalistik (UKM Jurnalistik)",
"jenis": "UKM",
"deskripsi": "Melatih keterampilan menulis dan jurnalistik."
},
{
"id": 68,
"name": "Himpunan Mahasiswa Pertanian (Himapertan)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada pengembangan ilmu pertanian."
},
{
"id": 69,
"name": "UKM Debat Bahasa Inggris (Debating Society)",
"jenis": "UKM",
"deskripsi": "Mengasah kemampuan debat dalam bahasa Inggris."
},
{
"id": 70,
"name": "Himpunan Mahasiswa Seni Rupa (Himsur)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah pengembangan kreativitas di bidang seni rupa."
},
{
"id": 71,
"name": "UKM Basket (UKM Basket)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat di olahraga bola basket."
},
{
"id": 72,
"name": "Himpunan Mahasiswa Farmasi (Himafar)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah bagi mahasiswa di bidang farmasi."
},
{
"id": 73,
"name": "UKM Futsal (UKM Futsal)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat di olahraga futsal."
},
{
"id": 74,
"name": "Himpunan Mahasiswa Kehutanan (Himhut)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada isu-isu dan pengembangan ilmu kehutanan."
},
{
"id": 75,
"name": "UKM Tenis Meja (UKM Tenis Meja)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat di olahraga tenis meja."
},
{
"id": 76,
"name": "Himpunan Mahasiswa Keperawatan (Himaperta)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Membantu pengembangan mahasiswa di bidang keperawatan."
},
{
"id": 77,
"name": "UKM Voli (UKM Voli)",
"jenis": "UKM",
"deskripsi": "Mengembangkan bakat dan minat di olahraga bola voli."
},
{
"id": 78,
"name": "Himpunan Mahasiswa Psikologi (Himapsi)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah untuk pengembangan pengetahuan psikologi."
},
{
"id": 79,
"name": "UKM Bulutangkis (UKM Bulutangkis)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat di olahraga bulu tangkis."
},
{
"id": 80,
"name": "Himpunan Mahasiswa Ilmu Pemerintahan (Himip)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah diskusi dan pengembangan di bidang ilmu pemerintahan."
},
{
"id": 81,
"name": "UKM Catur (UKM Catur)",
"jenis": "UKM",
"deskripsi": "Mengasah strategi dan pemikiran di olahraga catur."
},
{
"id": 82,
"name": "Himpunan Mahasiswa Teknik Lingkungan (HMTL)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada isu lingkungan dan teknik."
},
{
"id": 83,
"name": "UKM Renang (UKM Renang)",
"jenis": "UKM",
"deskripsi": "Unit kegiatan yang berfokus pada olahraga renang."
},
{
"id": 84,
"name": "Himpunan Mahasiswa Ilmu Kelautan (Himaka)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan pengetahuan di bidang ilmu kelautan."
},
{
"id": 85,
"name": "UKM Sepak Bola (UKM Sepak Bola)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat dan minat mahasiswa di olahraga sepak bola."
},
{
"id": 86,
"name": "Himpunan Mahasiswa Antropologi (Himantrop)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah diskusi dan pengembangan ilmu antropologi."
},
{
"id": 87,
"name": "UKM Musik Tradisional (Mustra)",
"jenis": "UKM",
"deskripsi": "Melestarikan dan mengembangkan seni musik tradisional."
},
{
"id": 88,
"name": "Himpunan Mahasiswa Seni Tari (Himastari)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan minat di bidang seni tari."
},
{
"id": 89,
"name": "UKM Bela Diri Pencak Silat (UKM Silat)",
"jenis": "UKM",
"deskripsi": "Mengembangkan minat bela diri pencak silat."
},
{
"id": 90,
"name": "Himpunan Mahasiswa Seni Musik (Himamus)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah bagi mahasiswa di jurusan seni musik."
},
{
"id": 91,
"name": "UKM Bola Basket (UKM Basket)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat di olahraga bola basket."
},
{
"id": 92,
"name": "Himpunan Mahasiswa Teknologi Pangan (Himapang)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan pengetahuan di bidang teknologi pangan."
},
{
"id": 93,
"name": "UKM Fotografi (UKM Fotografi)",
"jenis": "UKM",
"deskripsi": "Mewadahi minat mahasiswa di dunia fotografi."
},
{
"id": 94,
"name": "Himpunan Mahasiswa Administrasi Publik (Himapub)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada pengembangan ilmu administrasi publik."
},
{
"id": 95,
"name": "UKM Kesenian (UKM Kesenian)",
"jenis": "UKM",
"deskripsi": "Wadah bagi mahasiswa yang memiliki minat di berbagai jenis kesenian."
},
{
"id": 96,
"name": "Himpunan Mahasiswa Ilmu Perpustakaan (Himpers)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Mengembangkan pengetahuan di bidang ilmu perpustakaan."
},
{
"id": 97,
"name": "UKM Tari (UKM Tari)",
"jenis": "UKM",
"deskripsi": "Menyalurkan bakat dan minat di seni tari."
},
{
"id": 98,
"name": "Himpunan Mahasiswa Pendidikan Bahasa (Himaba)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Wadah bagi mahasiswa di jurusan pendidikan bahasa."
},
{
"id": 99,
"name": "UKM Bahasa Asing (UKM Bahasa)",
"jenis": "UKM",
"deskripsi": "Mengasah kemampuan berbahasa asing bagi mahasiswa."
},
{
"id": 100,
"name": "Himpunan Mahasiswa Geofisika (Himafisika)",
"jenis": "Himpunan Mahasiswa Jurusan",
"deskripsi": "Fokus pada pengembangan ilmu geofisika."
}
]';
        $data = collect(json_decode($ormawa, true))
            ->map(fn($item) => [
                'id' => $item['id'],
                'name' => $item['name'],
            ])->toArray();
        // dd($data);
        Ormawa::truncate();
        Ormawa::insert($data);
        // dd(1);
    }
}
