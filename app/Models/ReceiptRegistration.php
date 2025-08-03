<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReceiptRegistration extends Model
{
    protected $fillable = [
        'participant_name',
        'email',
        'phone',
    'store_id',
        'receipt_number',
        'purchase_date',
        'receipt_image_path',
        'contest_answer',
        'consent_regulations',
        'consent_rodo',
        'consent_external',
        'referrer',
        'landing_url',
        'ip_address'
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'consent_regulations' => 'boolean',
        'consent_rodo' => 'boolean',
        'consent_external' => 'boolean',
    ];

    public function dailyRankings() : hasMany
    {
        return $this->hasMany(DailyRanking::class, 'submission_id');
    }

    public function finalAward() : hasOne
    {
        return $this->hasOne(FinalAward::class, 'submission_id');
    }

    public function winnerContactRequest()
    {
        return $this->hasOne(WinnerContactRequest::class, 'submission_id');
    }

  public static function winners()
  {
    return SELF::whereNotNull('prize')
      ->with('store')
      ->get()
      ->groupBy('prize');
  }

  public function store()
  {
    return $this->belongsTo(Store::class);
  }
}
