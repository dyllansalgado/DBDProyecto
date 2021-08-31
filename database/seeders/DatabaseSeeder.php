<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Region;
use App\Models\Commune;
use App\Models\Followerfollowed;
use App\Models\Paymentmethod;
use App\Models\Donation;
use App\Models\Category;
use App\Models\Videocategory;
use App\Models\Video;
use App\Models\Commentary;
use App\Models\Uservideo;
use App\Models\Playlistvideo;
use App\Models\Playlist;
use App\Models\Serie;
use App\Models\Userplaylist;
use App\Models\Userrole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Country::factory(1)->create();
        Region::factory(3)->create();
        Commune::factory(8)->create();
        Role::factory(2)->create();
        User::factory(4)->create();
        Followerfollowed::factory(10)->create();
        Paymentmethod::factory(3)->create();
        Video::factory(6)->create();
        Donation::factory(10)->create();
        Category::factory(6)->create();
        Videocategory::factory(10)->create();
        Commentary::factory(10)->create();
        Uservideo::factory(10)->create();
        Serie::factory(10)->create();
        Playlist::factory(10)->create();
        Playlistvideo::factory(10)->create();
        Userplaylist::factory(10)->create();
        Userrole::factory(10)->create();
    }
}
