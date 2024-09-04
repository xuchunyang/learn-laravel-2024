<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lol_champions', function (Blueprint $table) {
            $table->id();
            /*
{
  "version": "14.17.1",
  "id": "Aatrox",
  "key": "266",
  "name": "暗裔剑魔",
  "title": "亚托克斯",
  "blurb": "亚托克斯和他的同胞曾是为恕瑞玛对抗虚空的守护者一族。曾经满载荣誉的他们，却成了符文之地上更大的威胁，最后被人类设下的圈套所击败。在被囚禁数个世纪后，亚托克斯率先找到了重获自由的方法：他的精魂被封印在了那把神奇武器之中，而那些妄图挥舞它的愚昧之徒都会被他腐蚀、侵占。如今，他凭借偷来的身躯，以一种近似他曾经形态的凶残外表行走于符文之地，寻求着一次毁天灭地、迟来许久的复仇。",
  "info": {
    "attack": 8,
    "defense": 4,
    "magic": 3,
    "difficulty": 4
  },
  "image": {
    "full": "Aatrox.png",
    "sprite": "champion0.png",
    "group": "champion",
    "x": 0,
    "y": 0,
    "w": 48,
    "h": 48
  },
  "tags": [
    "Fighter"
  ],
  "partype": "鲜血魔井",
  "stats": {
    "hp": 650,
    "hpperlevel": 114,
    "mp": 0,
    "mpperlevel": 0,
    "movespeed": 345,
    "armor": 38,
    "armorperlevel": 4.8,
    "spellblock": 32,
    "spellblockperlevel": 2.05,
    "attackrange": 175,
    "hpregen": 3,
    "hpregenperlevel": 0.5,
    "mpregen": 0,
    "mpregenperlevel": 0,
    "crit": 0,
    "critperlevel": 0,
    "attackdamage": 60,
    "attackdamageperlevel": 5,
    "attackspeedperlevel": 2.5,
    "attackspeed": 0.651
  }
}

             */
            $table->string('uid')->unique();
            $table->string('name');
            $table->string('title');
            $table->text('blurb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lol_champions');
    }
};
