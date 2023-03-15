<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\User;
use Illuminate\Support\Facades\Hash;

class CheckTableController extends Controller
{
    public function __construct()
    {
        if (! Schema::hasTable('logs')) {

            Schema::create('logs', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->text('type');
                $table->text('user');
                $table->text('message')->nullable();
            });

            $add_user = new User;
            $add_user->password = Hash::make('Aa112233');
            $add_user->email = "install";
            $add_user->admin = 1;
            $add_user->remember_token = str_random(32);
            $add_user->save();
        }

        if (! Schema::hasTable('options')) {
            Schema::create('options', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('key');
                $table->text('value')->nullable();
            });
        }

        if (! Schema::hasColumn('movies', 'movie_hot')) {
            Schema::table('movies', function ($table) {
                $table->integer('movie_hot')->default(0);
            });
        }

        if (! Schema::hasColumn('ads', 'position')) {
            Schema::table('ads', function ($table) {
                $table->string('position')->default('A');
            });
        }

        if (! Schema::hasColumn('ads', 'show_ads')) {
            Schema::table('ads', function ($table) {
                $table->integer('show_ads')->default(1);
            });
        }

        if (! Schema::hasColumn('seos', 'front_seo')) {
            Schema::table('seos', function ($table) {
                $table->text('front_seo')->nullable();
            });
        }

        if (! Schema::hasColumn('ads', 'type')) {
            Schema::table('ads', function ($table) {
                $table->text('type')->nullable();
            });
        }

        if (! Schema::hasColumn('settings', 'streaming_1')) {
            Schema::table('settings', function ($table) {
                $table->text('streaming_1')->nullable();
                $table->text('streaming_2')->nullable();
            });
        }

        if (! Schema::hasColumn('movies', 'director')) {
            Schema::table('movies', function ($table) {
                $table->text('director')->nullable();
                $table->text('actors')->nullable();
            });
        }
    }
}
