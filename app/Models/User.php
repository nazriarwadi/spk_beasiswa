<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Seorang user bisa memiliki banyak pengajuan
    public function pengajuan()
    {
        return $this->hasOne(PengajuanBeasiswa::class, 'user_id');
    }

    // Seorang user bisa memiliki banyak hasil pengajuan
    public function hasilPengajuan()
    {
        return $this->hasMany(HasilPengajuan::class, 'user_id');
    }
}
