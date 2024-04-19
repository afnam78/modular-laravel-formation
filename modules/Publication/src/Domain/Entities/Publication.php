<?php

namespace Modules\Publication\src\Domain\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Publication\Database\Factories\PublicationFactory;

class Publication extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function factory($count = null, $state = [])
    {
        $factory = static::newFactory() ?: PublicationFactory::class;

        return $factory::new()->count($count)->state($state);
    }

    protected static function newFactory(): string
    {
        return PublicationFactory::class;
    }

}
