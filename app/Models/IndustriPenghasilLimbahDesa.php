<?php

namespace App\Models;

use App\Models\Scopes\StatusVisibilityScope;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndustriPenghasilLimbahDesa
 *
 * @property $id
 * @property $id_kategori
 * @property $desa_id
 * @property $rt_rw_desa_id
 * @property $tahun
 * @property $jenis_industri
 * @property $created_by
 * @property $updated_by
 * @property $status
 * @property $reject_reason
 * @property $approved_by
 * @property $approved_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Desa $desa
 * @property RtRwDesa $rtRwDesa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class IndustriPenghasilLimbahDesa extends Model
{

    protected static function booted()
    {
        static::addGlobalScope(new StatusVisibilityScope);
    }


    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_kategori','desa_id', 'rt_rw_desa_id', 'tahun', 'jenis_industri', 'created_by', 'updated_by', 'status', 'reject_reason', 'approved_by', 'approved_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(\App\Models\Desa::class, 'desa_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rtRwDesa()
    {
        return $this->belongsTo(\App\Models\RtRwDesa::class, 'rt_rw_desa_id', 'id');
    }
    /**
     * Relasi ke model Kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'id_kategori', 'id');
    }
}
