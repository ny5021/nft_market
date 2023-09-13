<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nfts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('artiste');
            $table->string('description', 255);
            $table->string('adresse')->unique();
            $table->enum('token_standard',['ERC-721', 'ERC-1155', 'ERC-998'])->default('ERC-721');
            $table->float('price');
            $table->boolean('for_sale')->default(1);
            $table->string('image', 255);
            $table->foreignId('proprietaire_id')->nullable()->references('id')->on('users'); // personne ayant payé le nft
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(User::class); // personne qui crée le nft
            $table->softDeletes();
            $table->timestamps();                          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nfts');
    }
};
