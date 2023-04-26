<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Questionnaires extends Model {
        use HasFactory;

        protected $fillable = ["name", "multipleVotes", "options", "timestamp", "senderIP"];
    }
