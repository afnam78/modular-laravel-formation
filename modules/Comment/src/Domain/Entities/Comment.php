<?php

namespace Modules\Comment\src\Domain\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Comment\Database\Factories\CommentFactory;
use Modules\Publication\src\Domain\Entities\Publication;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function publication(): BelongsTo
    {
        return $this->belongsTo(Publication::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function factory($count = null, $state = []): CommentFactory
    {
        $factory = static::newFactory() ?: CommentFactory::class;
        return $factory::new()->count($count)->state($state);
    }
    protected static function newFactory(): string
    {
        return CommentFactory::class;
    }
}
